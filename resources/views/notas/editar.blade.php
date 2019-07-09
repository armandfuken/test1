@extends('plantilla')

@section('seccion')
<h1>Editar {{$nota->nombre}}</h1>

@if (session('message'))
 <div class="alert alert-success">{{session('message')}}</div>
@endif

<form action="{{route('notas.update',$nota->id)}}"method="POST" >
  @method('PUT')
  @csrf
  @error ('nombre')
    <div class="alert alert-danger"> el nombre es requerido
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden ="true">&times;</span>
      </button></div>

  @enderror

  @error ('descripcion')
       <div class="alert alert-danger"> la descripcion es requerido
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden ="true">&times;</span>
          </div>
  @enderror
<input type="text" name="nombre" placeholder="nombre" class="form-control mb-2"
   value="{{$nota->nombre}}">
<input type="text" name="descripcion" placeholder="descripcion" class="form-control mb-2"
 value="{{$nota->descripcion}}">
<button class="btn btn-primary" type="submit"> ADD</button>
</form>
@endsection
