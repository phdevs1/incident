<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Category;
use App\Incident;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getReport(){
        //$categories = Category::all() // estamos obteniendo todas las categorias
        $categories = Category::where('project_id',1)->get();
        return view('report')->with(compact('categories'));
    }
    public function postReport(Request $request){

        $rules = [
            'category_id' => 'sometimes|exists:categories,id',
            'severety' => 'required|in:M,N,A',
            'title' => 'required|min:5',
            'description' => 'required|min:15'
        ];

        $messages = [
            'title.required' => 'necesita colocar el titulo',
            'title.min' => 'el titulo debe tener al menos 5 caracteres',
            'description.required' => 'necesita colocar la descripcion',
            'descripcion.min' => 'la descripcion debe tener 15 carac min.'
        ];
        $this->validate($request,$rules,$messages);

        //return $request->input('severety');
        $incident = new Incident();
        $incident->category_id = $request->input('category_id')?:null;
        $incident->severety = $request->input('severety');
        $incident->title = $request->input('tittle');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
        $incident->save();
        
        return back();
    }
}
