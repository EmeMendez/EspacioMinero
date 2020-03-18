@extends('layout')
@section('content')
<section class="breadcrumbs-custom">
  <section class="section parallax-container breadcrumbs-custom-main context-dark" data-parallax-img="images/img/aso.jpg">
    <div class="parallax-content">
      <div class="container">
        <div class="row justify-content-center">

        </div>
      </div>
    </div>
  </section>
  <div class="breadcrumbs-custom-aside">
    <div class="container">
      <ul class="breadcrumbs-custom-path">
        <li><a href="{{route('home')}}">Inicio</a></li>
        <li class="active">Nosotros</li>
      </ul>
    </div>
  </div>
</section>

<!-- Who we Are-->
<section class="section section-md">
  <div class="container">
    <div class="row row-50 align-items-center">
      <div class="col-lg-6">
        <h3>Creamos instancias de participación que contribuyen al desarrollo sustentable de la Región de Coquimbo.</h3>
        <p>Mediante la visibilización
          de empresas proveedoras de uno o varios sectores a compañías mineras, constructoras o industriales,
          permitiendo de este modo aumentar y facilitar las compras a empresas de la región</p>
        <!-- Quote Light-->
        <blockquote class="quote-light quote-light_1">
          <div class="quote-light-mark linearicons-quote-open"></div>
          <div class="quote-light-text">
            <p>Es importante
              destacar que, con el propósito de reducir las problemáticas, exigencias y necesidades identificadas
              por los actores se gestionará anualmente a través de la plataforma un KPI de compras regional para
              los proveedores y compañías mineras, el cual será determinante en la toma de decisiones y en el
              futuro proceso de transformación y automatización de la industria 4.0. </p>
          </div>
        </blockquote>
      </div>
      <div class="col-lg-6"><img src="/images/logo-eim.png" alt="" width="635" height="455"/>
      </div>
    </div>
  </div>
</section>

<!-- About-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <div class="isotope row row-30" data-isotope-layout="masonry" data-isotope-group="about">
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content">
            <div class="box-custom-1">
              <h2>Participan</h2>
              <h4>Contamos con el apoyo de</h4>
            </div>
          </div>
        </div>
      </div>
      
      <div class="col-12 col-sm-6 col-md-8 isotope-item">
        <div class="block-ratio block-ratio-3">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_cap.png);"></div><a href="http://www.cap.cl" target=_blank>Sitio Web</a> <!--770x426 -->
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-2">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_adp.png);"></div><a href="http://www.altospunitaqui.cl/Home.php" target=_blank>Sitio Web</a> <!--369x432 -->
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_mlp.png);"></div><a href="http://web.pelambres.cl/" target=_blank>Sitio Web</a> <!--370x251 -->
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_sg.png);"></div><a href="http://www.cmsg.cl/" target=_blank>Sitio Web</a> <!--370x251 -->
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_teck.png);"></div><a href="https://www.teck.com/operaciones-es/chile-es/operaciones-es/carmen-de-andacollo-es/default-es-es" target=_blank>Sitio Web</a> <!--370x251 -->
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 isotope-item">
        <div class="block-ratio block-ratio-1">
          <div class="block-ratio-dummy"></div>
          <div class="block-ratio-content bg-image" style="background-image: url(images/img/eim_crdp.png);"></div><a href="http://crdp.cl/" target=_blank>Sitio Web</a> <!--370x251 -->
        </div>
      </div>
    </div>
  </div>
</section>




@endsection