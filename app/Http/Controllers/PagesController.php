<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Index(){
      return view('welcome');
    }

    public function blog(){
      return view('blog');
    }

    public function galeria(){
      return view('fotos');
    }
    public function nosotros($nombre=null){
      $team= ['pedro','luyuis','tiare'];
      return view('nosotros',compact('team','nombre'));
      //return view('nosotros',['team' => $team],['nombre'=>$nombre]);
      }

}
