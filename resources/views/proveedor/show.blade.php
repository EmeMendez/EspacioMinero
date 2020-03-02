@extends('layout')
@section('content')

<section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Informacion del proveedor</h3><br>
    </div>
</section>
      <!-- Fin Buscador -->
<hr>
<div class="container my-3 " >
    <div class="row  text-center text-md-left">
      <div class="col-12 col-md-3">
        <img height="255" width="255" src="{{ Storage::url($proveedor->imagen)}}"  />
      </div>
      <div class="col-12 col-md-9">
        <div class="row">
          <div class="col-12">
            <h3>{{ $proveedor->nombre }}</h3>
          </div>
          <div class="col-12">
          <p>{{ $proveedor->descripcion}}</p>
          </div>
        </div>       
      </div>
    </div>
      
      
    <div class="row">
        <div class="col-12 col-md-3">
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
        <div class="col-12 col-md-9">
            <h3>Ordered </h3>
            <p><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
                Certificacin 1
                </p>

                <p><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
                    Certificacin 1 la segunda
                </p>

                <p><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
                    Su certificacion
                </p>                

                <p><img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/Check_green_icon.svg" alt="" width="30" height="30">
                    Certificacin IQS 45
                </p>
            
                <P>
                    Occaecat deserunt amet est id aliqua ullamco eiusmod. Magna duis officia eu esse tempor velit ut in Lorem. Mollit irure aliquip excepteur consectetur reprehenderit exercitation consequat. Exercitation magna enim elit labore minim.
                </P>
<BR>
                    <h3>UnOrdered List</h3>
                    <div class="row row-50">
                      <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <ul class="list-marked">
                          <li>Bubos velum</li>
                          <li>Aonidess peregrinatione</li>
                          <li>Bursas cantare!</li>
                          <li>Domuss potus  </li>
                          <li>Vortexs accelerare</li>
                        </ul>
                      </div>
                      <div class="col-sm-6 col-md-5 col-lg-4 col-xl-3">
                        <ol class="list-ordered">
                          <li>Parmas cadunt</li>
                          <li>Genetrixs ortum</li>
                          <li>Fraticinidas credere</li>
                          <li>Solems cantare</li>
                          <li>Follas ridetis</li>
                        </ol>
                      </div>
                    </div>


                    <hr class="mt-3 mb-2">
                    <h3 class="ml-0 mt-3 pl-0">Contactar</h3>
                    <div class="col-12 mt-2 mt-2">

            
                      @foreach($correo as $em)
                      <div class="row">
                      <form action="{{ route('send') }}" method="POST">
                        @csrf
                      <div class="col-md-12 p-2 mt-0">
                        <p>Correo {{$em->des}}</p>
                        <input readonly class="pt-3 pb-3 pl-0 col-md-6 col-12" name="correo" value="{{$em->correo}}">
                        <button id="button-addon1" class=" button button-block button-primary col-md-3 d-inline mt-0 col-12 ml-0 mt-2 mt-md-0" type="submit">Contactar</button>
                      </div> 
                    </form>
                    </div>       
                      @endforeach
            
            
            
                    </div>
        </div>  
       

    </div>
    
<br>



</div>




@endsection
