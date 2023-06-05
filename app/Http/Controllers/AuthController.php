<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Alert;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
class AuthController extends Controller
{

public function register(){
    return view('register');
}
//devuelve vista login
public function login(){
    return view('login');
}
public function home(Request $request)
{
    $user_id = session('user_id');
    $usuario = Usuario::find($user_id);

    if (!$usuario) {
        // El usuario no está autenticado, redirige a la página de inicio de sesión
        return redirect()->route('login');
    }

    $usuarios = Usuario::orderBy('name', 'ASC')->get();

    $query = DB::table('alerts')->orderBy('timestamp', 'DESC');

    if ($request->has('show_all')) {
        $alerts = $query->get();
    } else {
        $alerts = $query->limit(5)->get();
    }


    return view('section.home', compact('usuarios', 'alerts','usuario'));
}
//muestra toda la tabla
public function showFullTable(Request $request)
{
    $alerts = Alert::filter($request->collect());//DB::table('alerts')->orderBy('timestamp', 'DESC')->get();
    return view('reportesShow', compact('alerts'));
}
public function insertarUsuario(Request $request)
{
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
        'surnames' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
        'password' => 'required|min:8'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $usuario = new Usuario();
    $usuario->name = $request->input('name');
    $usuario->password = Hash::make($request->input('password'));
    $usuario->surnames = $request->input('surnames');
    $usuario->login = $request->input('login');
    $usuario->idStatus = $request->input('status');


    $usuario->save();
    return redirect()->intended('login')->with('success', 'user created well!');
}
//authentificar
public function authenticate(Request $request)
{
    $credentials = $request->only('name', 'password');

    $usuario = Usuario::where('name', $credentials['name'])->first();

    if ($usuario && Hash::check($credentials['password'], $usuario->password)) {
        session(['user_id' => $usuario->id, 'name' => $usuario->name]);
        return redirect()->intended('Home')->with('success', 'Inicio de sesión exitoso');
    }

    return back()->withErrors([
        'name' => 'Credenciales inválidas',
        'password' => 'Credenciales inválidas'
    ]);
}


public function index(){
    $usuario =[
     'id'=>'',
     'name'=>'',
     'surnames'=>'',
     'password'=>'',
    ];
    return view('register',['usuario'=>$usuario]);
 }

public function consultaUsuarios(){
    $usuarios = DB::table('usuarios')
        ->orderBy('name','ASC')
        ->get();

        return view('section.home',[
        'usuarios'=> $usuarios
    ]);
}
public function detail($id){
    $usuario =DB::table('usuarios')->where('id','=',$id)
    ->first();
        $editUsuario=["id"=>$usuario->id,
        "name"=>$usuario->name,
        "surnames"=>$usuario->surnames
       ];
        return view('section.home',['usuarios'=>$editUsuario]);
}

public function delete($id){
    $usuario=DB::table('usuarios')
    ->where('id','=',$id)
    ->delete();

    return redirect()->route('home')
        ->with('status','user deleted successfully');
}
public function update(Request $request){

    $usuario = DB::table('usuarios')
    ->where('id','=',$request->input('id'))
    ->update([
        'name'=>$request->input('name'),
        'surnames'=>$request->input('surnames'),
        'login' => $request->input('login'),
        'idStatus'=>$request->input('status')
    ]);
    return redirect()->route('home', ['id' => $request->input('id')])
        ->with('edit', 'successfully modified user');

}
public function editar($id){
    $usuario=DB::table('usuarios')
    ->where('id','=',$id)
    ->first();



    return view('edit', ['usuario' => $usuario]);

}

public function logout(Request $request)
{
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login')->with('logout', 'has left the session');
}


public function getLogs(Request $request)
    {
        $query = DB::table('logs');

        // Verifica si se proporcionó algún término de búsqueda
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($query) use ($searchTerm) {
                $query->where('ip', 'LIKE', $searchTerm != '' ? '%' . $searchTerm . '%' : '%')
                    ->where('id', 'LIKE', $searchTerm != '' ? '%' . $searchTerm . '%' : '%')
                    ->where('usuario', 'LIKE', $searchTerm != '' ? '%' . $searchTerm . '%' : '%')
                    ->where('fecha', 'LIKE', $searchTerm != '' ? '%' . $searchTerm . '%' : '%');
            });
        }

        $logs = $query->get();

        // Crear la respuesta con la vista
        $response = response()->view('nombre_de_tu_vista', ['logs' => $logs]);

        // Desactivar el almacenamiento en caché de la respuesta
        $response->header('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');

        // Devolver la respuesta
        return $response;
    }

    public function alerts(Request $request)
    {
        $log = $request->input('log');
        info($log);
        $parts = explode(' ', $log);
        $date = $parts[0];
        $description = str_replace("-", " ", $parts[4]);
        $classification = '';
        $priority = '';
        $protocol = '';
        $source = '';
        $destination = end($parts);

        // Extraer el valor entre corchetes
        preg_match('/\[Classification: \((.*?)\)\]/', $log, $matches);
        if (count($matches) > 0) {
            $classification = $matches[1];
            // Extraer el valor entre paréntesis y asignarlo a la variable $classification
            preg_match('/\((.*?)\)/', $classification, $parenthesesMatches);
            if (count($parenthesesMatches) > 0) {
                $classification = $parenthesesMatches[1];
            }
        }

        // Extraer el valor después de los dos puntos en [Priority: 3]
        preg_match('/\[Priority: (.*?)\]/', $log, $priorityMatches);
        if (count($priorityMatches) > 0) {
            $priority = $priorityMatches[1];
        }
        //protocol
        preg_match('/\{([^}]*)\}/', $log, $protocolMatches);
        if (count($protocolMatches) > 0) {
            $protocol = $protocolMatches[1];
        }

        // Extraer el valor antes de la flecha ->
        preg_match('/\} (.*?) ->/', $log, $sourceMatches);
        if (count($sourceMatches) > 0) {
            $source = $sourceMatches[1];
        }

        // Crear una instancia de la clase DateTime para formatear el timestamp
        $dateTime = Carbon::createFromFormat("m/d/Y-H:i:s.u", substr($date, 0, -4));
        $formattedTimestamp = $dateTime->format("Y-m-d H:i:s");

        // Crear una nueva instancia del modelo Alert
        $alert = new Alert();
        info($destination);
        // Asignar los valores extraídos a las propiedades del modelo Alert
        $alert->timestamp = $formattedTimestamp;
        $alert->alert_type = $description;
        $alert->classification =  $classification;
        $alert->priority = $priority;
        $alert->protocol = $protocol;
        $alert->src_address = $source;
        $alert->dest_address = $destination;

        // Guardar el modelo Alert en la base de datos
        $alert->save();
    }

}

