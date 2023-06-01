<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Usuario;

class AuthController extends Controller
{
public function register(){
    return view('register');
}
public function login(){
    return view('login');
}
public function authenticate(Request $request)
{
    $credentials = $request->only('name', 'password');

    $usuario = Usuario::where('name', $credentials['name'])->first();

    if ($usuario && Hash::check($credentials['password'], $usuario->password)) {
        Auth::login($usuario);
        return redirect()->intended('usuarios');
    }

    return back()->withErrors([
        'name' => 'Credenciales inválidas.',
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
    return view('lista',[
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
        return view('lista',['usuarios'=>$editUsuario]);
}
public function save(Request $request){
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
        'surnames' => 'required|max:255|regex:/^[A-Za-z\s]+$/',
        'password' => 'required|min:8'
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    $usuario = DB::table('usuarios')->insert([
        'name'=>$request->input('name'),
        'surnames'=>$request->input('surnames'),
        'password'=>$request->input('password'),
        'login' => $request->input('login'),
        'idStatus'=>$request->input('status')
    ]);

   return redirect()->route('login');
}

public function delete($id){
    $usuario=DB::table('usuarios')
    ->where('id','=',$id)
    ->delete();

    return redirect()->route('consultaUsuarios')
        ->with('status','Usuario eliminado exitosamente');
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
        ->with('status', 'Usuario modificado exitosamente');

}
public function editar($id){
    $usuario=DB::table('usuarios')
    ->where('id','=',$id)
    ->first();

    return view('edit', ['usuario' => $usuario]);
}

}
