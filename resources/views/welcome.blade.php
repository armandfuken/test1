@extends('plantilla')
@section('seccion')
    <div class="container my-4">
        <h1 class="display-4">Notas</h1>
     </div>

     @if (session('message'))
       <div class="alert alert-success">
       {{session('message')}}</div>
     @endif
     <form action="{{route('notas.crear')}}"method="POST" >
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
     <input type="text" name="nombre" placeholder="nombre" class="form-control mb-2" value="{{old('nombre')}}">
     <input type="text" name="descripcion" placeholder="descripcion" class="form-control mb-2"
     value="{{old('descripcion')}}">
     <button class="btn btn-primary" type="submit"> ADD</button>
   </form>
     <table class="table">
       <thead>
         <tr>
           <th scope="col">id</th>
           <th scope="col">nombre</th>
           <th scope="col">descripcion</th>
           <th scope="col">Handle</th>
         </tr>
       </thead>
       <tbody>
         @foreach ($notas as $nota)
           <tr>
             <th scope="row">{{$nota->id}}</th>
             <td><a href="{{ route('notas.detalle',$nota )}}">{{$nota->nombre}}</a></td>
             <td>{{$nota->descripcion}}</td>
             <td>{{$nota->created_at}}</td>
             <td><a href="{{route('notas.editar', $nota)}}" class="button btn-warning btn-sm"> Editar</a>

            <form  action="{{{ route('notas.eliminar',$nota) }}}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
              </form>

             </td>

           </tr>
         @endforeach

       </tbody>
     </table>
     {{$notas->links()}}

     @endsection
