@extends("layout")
@section('content')
<!-- FScreen-->

@if(count($errors)> 0)
<div class="alert alert-danger">
    <ul>
         @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
    
        @endforeach
    </ul>
</div>
@endif

@if (\Session::has('success'))
<script>
                
    Swal.fire({
    icon: 'success',
    title: '¡Correo Enviado con Exito!',
    text: 'El correo ha sido enviado. Espere a que alguien se ponga en contacto con usted!',
    })
</script>
@elseif(\Session::has('error'))
<script>
                
Swal.fire({
icon: 'error',
title: '¡Ha habido un Error!',
text: 'Algo ha salido mal. Intentelo denuevo',
})
</script>

@endif

    
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        
    <div class="carousel-inner">
        @foreach($imagenes as $banner)
            <div class="carousel-item @if($loop->first) active @endif" >
            <img src="/{{ $banner->urlImagen }}" class="d-block w-100 h-25 d-inline-block" alt="...">
            </div>
        @endforeach
    </div>
   

    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
</div>

<!-- Services-->
<section class="section text-center">
    
    <div class="container">
        <hr class="mt-5">
      <div class="list-blocks-outer">
        <div class="list-blocks">
          <div class="list-blocks-item">
            <div class="list-blocks-item-inner">
              <div class="icon novi-icon icon-primary icon-xl mdi mdi-email-outline"></div>
              <p class="list-blocks-title">¡Haz Match!</p>
              <p>Contactate con un proveedor y empieza a expandir tu red</p>
            </div>
          </div>
          <div class="list-blocks-item">
            <div class="list-blocks-item-inner">
              <div class="icon novi-icon icon-primary icon-xl mdi mdi mdi-magnify"></div>
              <p class="list-blocks-title">Busca proveedores</p>
              <p>Puedes buscar y comparar tipos de proveedores</p>
            </div>
          </div>
          <div class="list-blocks-item list-blocks-item_caption">
            <div class="list-blocks-item-inner-check">
              
                @if(Auth::guard('admin')->check() || Auth::check() || Auth::guard('invitado')->check())
              
              
                    <h3>¿Tienes alguna duda?</h3>            
                    <p>¡Por cualquier consulta, no dudes en contactarnos!</p><a class="button button-primary button-winona" href="{{ route('contact') }}">Contactar</a>
                    
                    
                @else
                    
                    <h3>Sé parte de nosotros</h3>            
                    <p>Registrate y sé parte de esta comunidad</p><a class="button button-primary button-winona" href="{{ route('proveedor.create') }}">Registrarse</a>
  
                @endif
            
            </div>
          </div>
          <div class="list-blocks-item">
            <div class="list-blocks-item-inner">
              <div class="icon novi-icon icon-primary icon-xl mdi mdi-filter-outline"></div>
              <p class="list-blocks-title">Filtra proveedores</p>
              <p>Filtra por las categorias que tu necesitas</p>
            </div>
          </div>
          <div class="list-blocks-item">
            <div class="list-blocks-item-inner">
              <div class="icon novi-icon icon-primary icon-xl mdi mdi-tooltip-edit"></div>
              <p class="list-blocks-title">Edita tu perfil</p>
              <p>Edita tu perfil y posicionate entre las principales busquedas</p>
            </div>
          </div>
          <div class="list-blocks-item">
            <div class="list-blocks-item-inner">
              <div class="icon novi-icon icon-primary icon-xl mdi mdi-download"></div>
              <p class="list-blocks-title">Descarga recursos</p>
              <p>Como proveedor, descarga información de lo que te interese</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Our Team-->

<!-- Counters-->
<section class="section section-md text-center">
    <div class="container">
        <hr class="mb-3">
        <div class="layout-bordered-1">
        <div class="layout-bordered-1-item">
            <!-- Counter Classic-->
            <article class="counter-classic">
            <img height="150" width="150" class="mb-4" src="/images/info-match.png" />
            <div class="counter-classic-main">
            <div class="counter">{{$estadisticas}}</div>
            </div>
            <h4 class="counter-classic-title">Match Realizados</h4>
            </article>
        </div>
        <div class="layout-bordered-1-item">
            <!-- Counter Classic-->
            <article class="counter-classic">
            <img src="/images/info-providers.png" height="150" width="150" alt="" class="mb-4">
            <div class="counter-classic-main">
                <div class="counter">{{$proveedor}}</div><span class="small text-primary"></span>
            </div>
            <h4 class="counter-classic-title">Proveedores Registrados</h4>
            </article>
        </div>
        <div class="layout-bordered-1-item">
            <!-- Counter Classic-->
            <article class="counter-classic">
                <img src="/images/info-nose.png" height="150" width="150" alt="" class="mb-4">
            <div class="counter-classic-main">
                <div class="counter">{{$CiaMineraUsuario}}</div><span class="small text-primary"></span>
            </div>
            <h4 class="counter-classic-title">Mineras Registradas</h4>
            </article>
        </div>
        </div>
    </div>
    </section>


<!-- Our Clients-->
<section class="section section-xxl text-center bg-white" id="clients">
<div class="container">
    <h3>Participan</h3>
    <!-- Owl Carousel-->
    <div class="owl-carousel owl-carousel-centered" data-items="2" data-sm-items="3" data-md-items="4" data-lg-items="4" data-dots="true" data-nav="false" data-stage-padding="0" data-loop="true" data-margin="30" data-mouse-drag="true">
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://www.cidere.cl"><img src="/images/img/eim_cidere.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://www.altospunitaqui.cl/Home.php"><img src="/images/img/eim_adp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://www.cap.cl"><img src="/images/img/eim_cap.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="https://www.corfo.cl/sites/cpp/home"><img src="/images/img/eim_corfo.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://crdp.cl/"><img src="/images/img/eim_crdp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://web.pelambres.cl/"><img src="/images/img/eim_mlp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="http://www.cmsg.cl/"><img src="/images/img/eim_sg.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="https://www.teck.com/operaciones-es/chile-es/operaciones-es/carmen-de-andacollo-es/default-es-es"><img src="/images/img/eim_teck.png" alt="" width="200" height="200"/></a></div>
    </div>

</div>
</section>



@endsection
