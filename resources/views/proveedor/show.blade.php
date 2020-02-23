@extends('layout')
@section('content')

<section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Buscar Proveedor</h3><br>
  
      <!-- Buscardor proveedor -->
      <div class="container">
        <div class="form-group row">
          <div class="col-sm-2">               
          </div>        
          <div class="col-sm-7">
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
    </div>
</section>
      <!-- Fin Buscador -->
<hr>
<br>
<div class="container" >
    <div class="row">
        <div class="col-sm-3">
            <div class="container">
                <div class="row">
                    <div class="col-xs-7">
                        <img src="https://aurigae.com/blog/wp-content/uploads/2018/06/SPRING-1.png" class="rounded-circle" />
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-sm-9">
            <h3>Nombre de la Empresa</h3>
            <p>Incididunt voluptate eiusmod ullamco dolore ea pariatur. Velit dolore ea elit nulla. Proident et sunt ut culpa cillum eiusmod enim amet occaecat cillum labore tempor.</p>
            <button class="button button-block button-primary col-4" type="submit">Contactar</button> 
        </div>
    </div>
      
      
    <div class="row">
        <div class="col-3">

            <h5>Datos del Proveedor</h5>
            <p><b>Dirección</b><br>Calle Arturo Prat 564</p>
            <p><b>Teléfono de contacto</b><br> +569 88888888</p>
            <p><b>Comuna</b><br> La Serena</p>
            <p><b>Dirección</b><br>Calle Arturo Prat 564</p>
            <p><b>Teléfono de contacto</b><br> +569 88888888</p>
            <p><b>Comuna</b><br> La Serena</p>
        </div>
        <div class="col-sm-9">
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
        
        </div>
    </div>
    
<br>



</div>



@endsection
