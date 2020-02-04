@extends('layout')
@section('content')
<section class="breadcrumbs-custom">
  <section class="section parallax-container breadcrumbs-custom-main context-dark" data-parallax-img="images/bg-image-1.jpg">
    <div class="parallax-content">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-9">
            <h3 class="breadcrumbs-custom-title">Quienes somos</h3>
          </div>
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
              <h2>Asociados</h2>
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

<!-- Services-->
<section class="section text-center">
  <div class="container">
    <div class="list-blocks-outer">
      <div class="list-blocks">
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-email-outline"></div>
            <p class="list-blocks-title">Creative Space</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-comment-text-outline"></div>
            <p class="list-blocks-title">Copywriting</p>
            <p>Ei sumo eruditi praesent sadipscing nec, scripta epicurei ut eam.</p>
          </div>
        </div>
        <div class="list-blocks-item list-blocks-item_caption">
          <div class="list-blocks-item-inner">
            <h3>Services</h3>
            <p>What we do</p><a class="button button-primary button-winona" href="contacts.html">Get a Quote</a>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-magnify"></div>
            <p class="list-blocks-title">Research</p>
            <p>Vel nihil praesent oportere ei. Fugit option oportere est in, te</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-clipboard-outline"></div>
            <p class="list-blocks-title">Analytics</p>
            <p>Te partem omnesque eligendi has, nam ex persius lobortis.</p>
          </div>
        </div>
        <div class="list-blocks-item">
          <div class="list-blocks-item-inner">
            <div class="icon novi-icon icon-primary icon-xl mdi mdi-flag-outline"></div>
            <p class="list-blocks-title">Sales Growth</p>
            <p>Ei tollit euismod cum, augue labore euripidis mel ex, ut</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Our Team-->

<section class="section section-md bg-gray-100 text-center">
        <!-- Profile Modern-->

  <div class="container">
    <h3>Nuestro equipo</h3>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-carousel_profile-modern" data-items="1" data-sm-items="2" data-lg-items="3" data-xl-items="4" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="false">
     
        <!-- Profile Modern-->
        <article class="profile-modern">
          <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/gerente.jpg" alt="" width="369" height="315"/>
          </figure>
          <div class="profile-modern-main">
            <div class="profile-modern-main-item profile-modern-main-item_primary">
              <h5 class="profile-modern-name">LUIS ENRIQUE VALDEBENITO
              </h5>
              <p class="profile-modern-position">Gerente</p>
            </div>
            <div class="profile-modern-main-item profile-modern-main-item_secondary">
              <h5 class="profile-modern-main-title">Redes</h5>
              <ul class="list-inline list-inline-xs">
                <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
                <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
              </ul>
              <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
            </div>
          </div>
        </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/daniel.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">DANIEL MÁS VALDÉS</h5>
            <p class="profile-modern-position">Presidente</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/francisco.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">FRANCISCO PUGA MEDINA</h5>
            <p class="profile-modern-position">Vice Presidente</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/gaston.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">GASTÓN YVER HUDSON</h5>
            <p class="profile-modern-position">Secretario</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/yerko.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">YERCO RENDIC VLADISLAV</h5>
            <p class="profile-modern-position">Tesorero</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/luis.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">LUIS CARMONA AMENÁBAR</h5>
            <p class="profile-modern-position">Director</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/jorge.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">JORGE CONTADOR ARAYA</h5>
            <p class="profile-modern-position">Director</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <!-- Profile Modern-->
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/franco.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">FRANCO DALBOSCO</h5>
            <p class="profile-modern-position">Director</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/delfo.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">DELFO MUÑOZ VASQUEZ</h5>
            <p class="profile-modern-position">Jefe Administrativo</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
      <article class="profile-modern">
        <figure class="profile-modern-figure"><img class="profile-modern-image" src="images/img/team/secretario.jpg" alt="" width="369" height="315"/>
        </figure>
        <div class="profile-modern-main">
          <div class="profile-modern-main-item profile-modern-main-item_primary">
            <h5 class="profile-modern-name">FERNANDO TAPIA TAPIA</h5>
            <p class="profile-modern-position">Secretario</p>
          </div>
          <div class="profile-modern-main-item profile-modern-main-item_secondary">
            <h5 class="profile-modern-main-title">Redes</h5>
            <ul class="list-inline list-inline-xs">
              <li><a class="icon icon-md mdi mdi-facebook" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-twitter" href="#"></a></li>
              <li><a class="icon icon-md mdi mdi-instagram" href="#"></a></li>
            </ul>
            <div class="profile-modern-toggle mdi mdi-arrow-top-right"></div>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>
@endsection