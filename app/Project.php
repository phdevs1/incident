<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	use SoftDeletes;

    public static $rules = [
    	'name' => 'required',
    	'start' => 'date'
    ];

    public static $messages = [
    	'name.require' => 'es necesario ingresar el nombre del proyect',
    	'start.date' => 'la fecha no tienes un formato adecuado'
    ];

    protected $fillable = [
    	'name','description','start'
    ];

    public function categories(){
    	return $this->hasMany('App\Category');
    }

    public function levels(){
    	return $this->hasMany('App\Level');
    }
}
