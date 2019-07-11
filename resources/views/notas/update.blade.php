@extends('plantilla')

@section('seccion')

@if (!(1==1))
  <div class="container" >
    @component('alert')
    </div>
    @endcomponent
@endif
@endsection
