<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use App\ProjectUSer;

class UserController extends Controller
{
    public function index(){
    	$users = User::where('role',1)->get();
    	return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request){
    	$rules = [
    		'name' => 'required|max:255',
    		'email' => 'required|email|max:255|unique:users',
    		'password' => 'required|min:6'
    	];
    	$messages = [
    		'name.required' => 'se necesita el nombre',
    		'email.required' => 'se necesita el correo',
    		'email.email' => 'el correo ingresado no es valid',
    		'email.unique' => 'este correo ya se encuentra en uso',
    		'password.required' => 'olvido ingresar la contraseña',
    		'password.min' => 'la contraseña debe tener al menos 6 caracetres'
    	];
    	$this->validate($request, $rules, $messages);

    	$user = new User();
    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
    	$user->password = bcrypt($request->input('password'));
    	$user->role = 1;
    	$user->save();
    	return back()->with('notification','usuario registrado exitosamente');
    }

    public function edit($id){
    	$user = User::find($id);
        $projects = Project::all();
        $projects_user = ProjectUser::where('user_id',$user->id)->get();
    	return view('admin.users.edit')->with(compact('user','projects','projects_user'));
    }

    public function update($id, Request $request){

    	$rules = [
    		'name' => 'required|max:255',
    		'password' => 'min:6'
    	];
    	$messages = [
    		'name.required' => 'es necesario ingresar el nombre del usuario',
    		'password.min' => 'la contraseña de tener al menos 6 caraceteres'
    	];
    	$this->validate($request, $rules, $messages);

    	$user = User::find($id);
    	$user->name = $request->input('name');
    	$password = $request->input('password');
    	if ($password) {
    		$user->password = bcrypt($password);
    	}

    	$user->save();
    	return back()->with('notification','usuario registrado exitosamente');
    }

    public function delete($id){
    	
    	$user = User::find($id);
    	$user->delete();

    	return back()->with('notification','el usuario se ha dado de baja correctamente');
    }
}
