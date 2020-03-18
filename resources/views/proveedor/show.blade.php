@extends('layout')
@section('content')

<section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Informacion del proveedor</h3><br>
    </div>
</section>
      <!-- Fin section -->

<div class="container mt-md-5 mt-2">
  <div class="row">

    <div class="col-md-3 col-12">
      <div class="col-12 text-center">
        <img height="255" width="255" src="/{{ $proveedor->imagen}}"  />
      </div>
        <div class="col-12 d-md-none d-block">
          <h3 class="" style="font-size: 25px">{{ $proveedor->nombre }} </h3>
        </div>
      <div class="col-12 text-justify mt-4">
        {{ $proveedor->descripcion}} 

      </div> 
      <div class="col-12 mt-4 pb-5">
        <h5 class="mb-2">Servicios</h5>
        @foreach($tags as $tag)
        <span  class="badge badge-primary py-1 mt-2 mr-2 font-weight-light" style="border-radius:5px;font-size:10px">{{$tag->nombre}}</span>
         
        @endforeach

      </div>      
    </div>
    {{-- fin columna 1 --}}
    <div class="col-md-6 col-12">
    <div class="col-12">
      <h3 class="d-none d-md-block" style="font-size: 35px">{{ $proveedor->nombre }} </h3>
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

          @if(count($certificacion) == 0)
            <h5>El proveedor no registra certificaciones</h5>
          @endif



      </div>

      @if(Auth::guard('invitado')->check())


      @else

        <div class="col-12 mt-5 pb-5">
          <p class="h4 ">Correo</p>
          <?php
          $contador = 0;
          $contador2 = 1;
          $oli = 'chale';
          $chale = 'oli';
          ?>
          @foreach($correo  as $em)
          <?php
         $contador = $contador + 1;
         $contador2 = $contador2 + 1;
          ?>
              <div class="row my-0">
              <form style="width:100%" action="{{ route('send') }}" method="POST">
                  @csrf
                <div class="col-md-12 p-2 mt-0">
                
                  @if($em->email!='')
                  <div class="row my-0 align-items-center">
                    <div class="col-8">
                      <p class="mt-1">Correo {{$em->des}}</p>
                      <input type="hidden" name="user-correo" value="{{$em->email}}">
                      <input  type="hidden" name="rut" value="{{ $em->proveedor_rut }}">
                      <input type="hidden" name="prov-nom" value="{{ $em->nombre }}">
                    </div>

                    @if(Auth::check())

                      @if ($em->proveedor_rut == auth()->user()->rut)
                    

                      @else
                        <div class="col-4">
                          <button id="button-addon1" onclick="event.preventDefault()" class=" button button-block button-primary px-2 py-2"  data-toggle="modal" data-target="#{{$oli.$contador}}">MATCH</button>
                        </div>
                      @endif

                    @endif





                  </div>  

                  <div class="modal fade" id="{{$oli.$contador}}" tabindex="-1" role="dialog" aria-labelledby="{{$chale.$contador2}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="{{$chale.$contador2}}">Personaliza tu mensaje</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <textarea  class="form-input" name="user-mensaje"  cols="20" rows="10"></textarea>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">CERRAR</button>
                          <button type="submit" class="btn btn-primary" style="border-radius:25px">MATCH</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  @else
                  <div class="row my-0">
                  <div class="col-md-8 col-12">
                    <p class="mt-2">Correo {{$em->des}}</p>
                  </div>
                  <div class="col-md-4 col-12">
                    <input disabled class=" button button-block button-primary px-2 ml-0 py-1 mt-md-0 mt-1" value="Sin Registrar">
                  </div>
                </div>            
                @endif
                </div> 
            
            </div>

            







           
          </form>
          @endforeach
          


        

          


        </div>
      
      @endif



    </div>
    </div>
    {{-- fin columna 2 --}}

        {{-- fin columna 2 --}}

        <div class="col-md-3 col-12">
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
            <div class="col-12">
              <b>Teléfonos de contacto</b>
            </div>
            @foreach ($telefono as $tel)
              <div class="col-7 col-md-12 mt-1 pr-0 ">
              <strong style="color: #757575">{{$tel->des}}: </strong> 
              </div>
              <div class="col-5 col-md-12 pl-0 pl-md-2">
                <a href="tel:{{$tel->telefono}}">{{$tel->telefono}}</a>
              </div>
            @endforeach
                             
            
          </div>
        </div>



        {{-- fin columna 3 --}}


        

  </div>
</div>













@endsection
