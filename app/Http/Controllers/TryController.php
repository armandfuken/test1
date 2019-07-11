<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TryController extends Controller{

    public function prueba(){

      return view('notas/update');
    }
}
