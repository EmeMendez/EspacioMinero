@extends('layout')
@section('content')
<section class="breadcrumbs-custom">
  <img src="images/img/contact.jpg">
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
<section class="section section-md">
  <div class="container tituloAbout">
    <div class="row row-50">
      <div class="col-xl-5">


          <!--==========================================
          =            INFORMACION CONTACTO            =
          ===========================================-->

          <div class="inset-1">
            <h2>Nuestro contacto</h2>
            <p class="big">Visaitanos a nuestra oficina.</p>
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
                    <div class="unit-body"><a class="text-primary" href="mailto:proyectobpe@cidere.cl">proyectobpe@cidere.cl</a></div>
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
        <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-zoom="5" data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#46bcec&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]" data-icon="images/gmap_marker.png" data-icon-active="images/gmap_marker_active.png">
          <div class="google-map"></div>
          <ul class="google-map-markers"> 
            <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow"></li>
          </ul>
        </div>
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

          <form class="rd-mailform rd-form" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
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
                  <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@PhoneNumber">
                  <label class="form-label" for="contact-phone">telefono</label>
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