@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Buscar Proveedor</h3><br>

    <!-- Buscardor proveedor -->
    <div class="container">
      <div class="form-group row">
        <div class="col-sm-2">               
        </div>        <div class="col-sm-7">
          <div class="form-wrap">
            <input placeholder="Nombre" class="form-input" id="provider-name" type="text" name="user-name" >
          </div>
        </div>
          <div class="col-sm-3">
            <div class="form-wrap">
              <a class="button button-sm button-default-outline button-winona" href="#"> Buscar Proveedor</a>            
            </div>                   
          </div>
      </div>
    </div>
    <!-- Fin Buscador -->
    @foreach ($proveedor as $pro)
    <!-- inicio de la lista -->
    <div class="card mb-3">
      <div class="row no-gutters">
        <div class="col-md-2">
          <img src="https://www.cidere.cl//sites/default/files/gbb-uploads/Logo800x600-ta2vqm.png" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title">{{$pro['nombre']}}</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <a class="button button-sm button-default-outline button-winona" href="{{route('show-provider')}}"> Más Información</a>            
          </div>
        </div>
      </div>
    </div>
    <!-- fin de la lista -->        
    @endforeach


  </div>
</section>
@endsection
