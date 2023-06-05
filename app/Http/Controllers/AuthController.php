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
public function home()
{
    $user_id = session('user_id');
    $usuario = Usuario::find($user_id);

    if (!$usuario) {
        // El usuario no está autenticado, redirige a la página de inicio de sesión
        return redirect()->route('login');
    }

    $usuarios = Usuario::orderBy('name', 'ASC')->get();

    return view('section.home', compact('usuarios'));
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
        session(['user_id' => $usuario->id]);
        $nombreUsuario = $usuario->name;
        return redirect()->intended('Home')->with('success', 'Inicio de sesion exitoso');

    }

    return back()->withErrors([
        'name' => 'invalid credentials',
        'password'=>'invalid credentials.'
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
    return redirect()->route('consultaUsuarios', ['id' => $request->input('id')])
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
    
        $data = json_decode($log, true); // Decodificar el JSON en un array asociativo
    
        // Acceder a los campos específicos
        $timestamp = $data['timestamp'];  // "2023-06-05T00:32:52.520640+0000"
        $srcIp = $data['src_ip'];  // "192.168.1.84"
        $srcPort = $data['src_port'];  // 44328
        $destIp = $data['dest_ip'];  // "192.168.1.90"
        $destPort = $data['dest_port'];  // 8000
        $protoco = $data['proto'];  // "TCP"

        $alert = new Alert();

        $alert->timestamp   =   $timestamp;
        $alert->src_ip      =   $srcIp;
        $alert->src_port    =   $srcPort;
        $alert->dest_ip     =   $destIp;
        $alert->dest_port   =   $destPort;
        $alert->protocol    =   $protocol;

        $alert->save();
    }
}

