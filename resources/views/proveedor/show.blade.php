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
      <div class="col-12 text-justify">
        {{ $proveedor->descripcion}} Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis praesentium eveniet totam ipsa dolor numquam possimus non. Laborum, error atque. Ratione repellat porro quibusdam asperiores fuga expedita tempore blanditiis quidem corrupti, omnis voluptatibus, consectetur, dolorum nesciunt ipsum esse nisi beatae.
      </div>      
    </div>
    {{-- fin columna 1 --}}
    <div class="col-6">
    <div class="col-12">
      <h3 class="text-center">{{ $proveedor->nombre }} A2 empresa super bonita LTDA</h3>
    </div>
    <div class="col-12">
      <hr class="my-3 text-dark">
        <div class="col-12">
        <p class="h4 ">Certificaciones</p>
        <p class="mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
          Certificacin Iso jiji equis de y no sé que más si tiuebne el medio nombre
        </p>
        <p class="mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
          Certificacin 1
        </p>      <p class="mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
          Certificacin 1
        </p>      <p class="mt-3"><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
          Certificacin 1
        </p>
      </div>
      <div class="col-12">
        <p class="h4 ">Correo</p>
        @foreach($correo as $em)
        <div class="row my-0">
        <form style="width:100%" action="{{ route('send') }}" method="POST">
            @csrf
          <div class="col-md-12 p-2 mt-0">
            <p>Correo {{$em->des}}</p>
            @if($em->correo!='')
            <div class="row my-0">
              <div class="col-8">
                <input class="form-input" readonly class="pt-3 pb-3 pl-0" name="correo" value="{{$em->correo}}">
                <input  type="hidden" name="rut" value="{{ $em->proveedor_rut }}">
              </div>
              <div class="col-4">
                <button id="button-addon1" class=" button button-block button-primary px-2 py-3" type="submit">Contactar</button>
              </div>
            </div>  
            @else
            <div class="row my-0">
            <div class="col-8">
              <input class="form-input" readonly class="pt-3 pb-3 pl-0" name="correo" value="Sin registrar">
            </div>
            <div class="col-4">
              <input disabled class=" button button-block button-primary px-2 py-3 bg-light text-primary" value="Contactar">
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
          <b>Teléfono de contacto</b>
        </div>
        <div class="col-6 col-md-12">
          <span>+569 88888888</span>               
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
    </div>
    {{-- fin columna 3 --}}

  </div>
</div>













@endsection
