@extends('layout')
@section('content')
<style>


</style>
<section class="breadcrumbs-custom">
  <img src="images/banners/contact.jpg">
    <div class="parallax-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-9">
            <h2 class="breadcrumbs-custom-title"></h2>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="breadcrumbs-custom-aside">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="{{route('home')}}">Home</a></li>
        <li class="active">Contáctanos</li>
      </ul>
    </div>
  </div>
</section>
@if(session('success'))
        <div class="col-12 px-0 mx-0">
          <div class="alert alert-success text-center">
            <p>{{\Session::get('success')}}</p>
          </div>
          </div>
        @endif
<section class="section section-md">
  <div class="container tituloAbout">
    <div class="row row-50">
      <div class="col-xl-5">
        
        

          <!--==========================================
          =            INFORMACION CONTACTO            =
          ===========================================-->

          <div class="inset-1">
            <h2>Nuestro contacto</h2>
            <p class="big">Visitanos a nuestra oficina.</p>
            <div class="row row-50">
              <div class="col-sm-6 col-xl-12">
                <p class="heading-7">Oficina Cidere</p>
                <ul class="list list-style-1">
                  <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-map-marker"></span>
                    <div class="unit-body"><a href="https://www.google.com/maps/place/CIDERE+Region+de+Coquimbo/@-29.9024627,-71.253033,17z/data=!4m5!3m4!1s0x9691ca7091c82fd3:0x71054dc991b78cff!8m2!3d-29.9024534!4d-71.2527487" target="_blank">Matta 401-495, La Serena, Coquimbo</a></div>
                  </li>
                  <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-cellphone"></span>
                    <div class="unit-body"><a href="tel:51-2223090">51-2223090</a></div>
                  </li>
                  <li class="unit"><span class="unit-left icon icon-sm text-primary mdi mdi-email-outline"></span>
                    <div class="unit-body"><a class="text-primary" href="mailto:proyectobp@cidere.cl">proyectobp@cidere.cl</a></div>
                  </li>
                </ul>
              </div>
            </div>
          </div>

          <!--====  FIN INFORMACION CONTACTO     ====-->

        
      </div>

      <!--=====================================
      =            API DE GOOGLE MAPS         =
      ======================================-->

      <div class="col-xl-7">
        <div id="googleMap" style="width:100%;height:400px;"></div>
 
        <script>
          function myMap() {
            var mapProp= {
              center:new google.maps.LatLng(-29.9024534,-71.2527487),
              zoom:18,
            };
            
            
            
            var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            var marker1 = new google.maps.Marker({
            position: {lat: -29.9024534, lng: -71.2527487},
            draggable: false
            });
            marker1.setMap(map);
          }
        
        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5J42TvVKRN9wyzD99G2kdBCXiFqLSUJM&callback=myMap"></script>

       

        
      </div>

      <!--==== FIN API DE GOOGLE MAPS  ====-->




    </div>
  </div>
</section>
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Contáctanos</h3>
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-9">
        <!-- RD Mailform-->

          <!--==========================================
          =            FORMULARIO CONTANCTO            =
          ===========================================-->

          <form class="rd-mailform rd-form" action="{{ route('sendcontact') }}" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
            @csrf
            <div class="row row-x-16 row-20">
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-name">Nombre completo</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Required @Email">
                  <label class="form-label" for="contact-email">Correo Electronico</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Mensaje</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap">
                  <input class="form-input" id="contact-phone" type="text" name="rut" data-constraints="@PhoneNumber @Required">
                  <label class="form-label" for="contact-phone">Rut</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-wrap form-button">
                  <button class="button button-block button-primary" type="submit">Enviar Mensaje</button>
                </div>
              </div>
            </div>
          </form>


          <!--====  FIN FORMULARIO CONTACTO  ====-->        


      </div>
    </div>
  </div>
</section>
@endsection