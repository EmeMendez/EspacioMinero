@extends('layout')
@section('content')

<section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Informacion del proveedor</h3><br>
    </div>
</section>
      <!-- Fin section -->

<div class="container mt-5">
  <div class="row">

    <div class="col-3">
      <div class="col-12 text-center">
        <img height="255" width="255" src="{{ Storage::url($proveedor->imagen)}}"  />
      </div>
      <div class="col-12 text-justify mt-4">
        {{ $proveedor->descripcion}} 
      </div>      
    </div>
    {{-- fin columna 1 --}}
    <div class="col-6">
    <div class="col-12">
      <h3 class="">{{ $proveedor->nombre }} </h3>
    </div>
    <div class="col-12">
      <hr class="my-3 text-dark">

        <div class="col-12">

          <p class="h4 ">Certificaciones</p>
          @foreach ($certificacion as $cer)
            <p class="mt-3"><img src="https://www.nicepng.com/png/detail/443-4439064_blue-check-mark-icon-png-check-mark-circle.png" alt="" width="30" height="30">
              {{$cer->nombre}}
            </p>
          @endforeach



      </div>

      <div class="col-12 mt-5">
        <p class="h4 ">Correo</p>
        @foreach($correo as $em)
        <div class="row my-0">
        <form style="width:100%" action="{{ route('send') }}" method="POST">
            @csrf
          <div class="col-md-12 p-2 mt-0">
            <p>Correo {{$em->des}}</p>
            @if($em->email!='')
            <div class="row my-0">
              <div class="col-8">
                <input class="form-input" readonly class="pt-3 pb-3 pl-0" name="correo" value="{{$em->email}}">
                <input  type="hidden" name="rut" value="{{ $em->proveedor_rut }}">
                <input type="hidden" name="prov-nom" value="{{ $em->nombre }}">
              </div>
              <div class="col-4">
                <button id="button-addon1" class=" button button-block button-primary px-2 py-3" type="submit">MATCH</button>
              </div>
            </div>  
            @else
            <div class="row my-0">
            <div class="col-8">
              <input class="form-input" readonly class="pt-3 pb-3 pl-0" name="correo" value="Sin registrar">
            </div>
            <div class="col-4">
              <input disabled class=" button button-block button-primary px-2 py-3 bg-light text-primary" value="MATCH">
            </div>
          </div>            
           @endif
          </div> 
      </form>
      </div>
        @endforeach
      </div>
    </div>
    </div>
    {{-- fin columna 2 --}}

        {{-- fin columna 2 --}}

        <div class="col-3">
          <h5 class="text-md-left text-center">Datos del Proveedor</h5>
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12">
              <b>Sitio Web</b>
            </div>
            <div class="col-6 col-md-12">
              <span>{{ $proveedor->sitio_web }}</span>               
            </div>
          </div>
    
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12 ">
              <b>Ciudad</b>
            </div>
            <div class="col-6 col-md-12">
              
            <span>{{ $proveedor->ciudad}}</span>               
            </div>
          </div>
    
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12 ">
              <b>Dirección</b>
            </div>
            <div class="col-6 col-md-12">
              <span>{{ $proveedor->direccion }}</span>               
            </div>
          </div>
    
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12 ">
              <b>Tamaño Empresa</b>
            </div>
            <div class="col-6 col-md-12">
            <span>{{ $proveedor->tamanio_empresa}}</span>               
            </div>
          </div>
    
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12 ">
              <b>Tipo de Proveedor</b>
            </div>
            <div class="col-6 col-md-12">
              <span>{{$proveedor->categoria}}</span>               
            </div>
          </div>      
          <div class="row my-2 my-md-3">
            <div class="col-6 col-md-12 ">
              <b>Teléfonos de contacto</b>
            </div>
            @foreach ($telefono as $tel)
            <div class="col-6 col-md-12 mt-1">
             <strong style="color: #757575">{{$tel->des}}: </strong> 
            </div>
            <div class="col-6 col-md-12">
              <a href="tel:{{$tel->telefono}}">{{$tel->telefono}}</a>
            </div>
            @endforeach
                             
            
          </div>
        </div>



        {{-- fin columna 3 --}}


        

  </div>
</div>













@endsection
