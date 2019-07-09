<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class PagesController extends Controller{
    public function Index(){
      $notas = App\Nota::paginate(2);
      return view('welcome',compact('notas'));
    }

    public function detalle($id){
      $nota = App\Nota::findOrFail($id);
      return view('notas.detalle',compact('nota'));
    }

    public function  crear(Request $req)
    {
    //  return $req->all();
      $req->validate(['nombre'=>'required',
      'descripcion'=>'required']);
     $notanueva= new App\Nota;
     $notanueva->nombre=$req->nombre;
     $notanueva->descripcion=$req->descripcion;
     $notanueva->save();
     return back()->with('mensaje','registro realizado! '.$req->nombre." agregado");
    }

    public function  editar($id){
        $nota = App\Nota::findOrFail($id);
      return view('notas.editar',compact('nota'));
    }

    public function  update(Request $req, $id){
        $notaUpdate = App\Nota::findOrFail($id);
        $notaUpdate->nombre=$req->nombre;
        $notaUpdate->descripcion=$req->descripcion;
        $notaUpdate->save();
      return back()->with('message','valores actualizados');
    }

    public function  delete(Request $req, $id){
        $notaUpdate = App\Nota::findOrFail($id);
        $notaUpdate->delete();
      return back()->with('message','registro eliminado');
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
