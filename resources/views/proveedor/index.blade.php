@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">

    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="container">
                    <div class="row justify-content-between">
                      <div class="col-md-3 col-12 mx-auto">
                        <h1 class="lead">Provincia</h1>
                          
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Elqui</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Limarí</label>
                        </div>                        
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Shoapa</label>
                        </div>                        
                      </div>
                      <div class="col-md-3 col-12 mx-auto">
                        <p class="lead">Tamaño empresa</p>

                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Elqui</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Limarí</label>
                        </div>                        
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Shoapa</label>
                        </div>                       

                      </div>
                      <div class="col-md-3 col-12 mx-auto">
                        <h1 class="lead">Otro filtro equis</h1>


                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Elqui</label>
                        </div>
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Limarí</label>
                        </div>                        
                        <div class="form-group form-check mb-0">
                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                          <label class="form-check-label" for="exampleCheck1">Shoapa</label>
                        </div>                         

                      </div>
                      <div class="col-md-3 col-12 mx-auto">
                        <h1 class="lead">Cuarto filtro</h1>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laboriosam, deserunt!</p>                    
                      </div>
                    </div>
          </div>




        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </div>
 
    <h3 class="text-center">Buscar Proveedor</h3><br>

    <div id="app">
        <proveedores-component></proveedores-component> 
    </div>
    {{-- @foreach ($proveedor as $p)
        <p>{{$p['nombre']}}</p>
    @endforeach --}}
   
    <style>
      .fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
    </style>



   </div>
</section>
@endsection
