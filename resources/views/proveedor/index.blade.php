@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Buscar Proveedor</h3><br>

    <div id="app">
        <proveedores-component></proveedores-component> 
    </div>
    {{-- @foreach ($proveedor as $p)
        <p>{{$p['nombre']}}</p>
    @endforeach --}}
   
   </div>
</section>
@endsection
