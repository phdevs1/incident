<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{

    public function byProject($id){
        return Level::where('project_id',$id)->get();
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'name' => 'required'
    		],[
    		'name.required' => 'es necesario ingresar el nombre para el nivel'
    		]);

    	Level::create($request->all());

    	return back()->with('notification','se creo el nivel');
    }

    public function update(Request $request){
    	$this->validate($request,[
    		'name' => 'required'
    		],[
    		'name.required' => 'es necesario ingresar el nombre de la categoria'
    		]);

    	$level_id = $request->input('level_id');

    	$level = Level::find($level_id);
    	$level->name = $request->input('name');
    	$level->save();

    	return back();
    }

    public function delete($id){
    	Level::find($id)->delete();
    	return back();
    }
}
