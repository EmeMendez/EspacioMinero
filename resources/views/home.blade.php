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

<!-- Our Solutions-->
<section class="section section-lg bg-gray-100 text-center" id="solutions">
<div class="container">
    <h3 class="wow fadeIn" data-wow-delay=".1s">Professional Marketing Solutions</h3>
    <div class="row row-30 row-md-50 row-xl-60">
    <div class="col-sm-6 col-lg-4 wow fadeIn">
        <!-- Box Modern-->
        <article class="box-modern" data-anime="circles-1">
        <div class="box-modern-media">
            <div class="box-modern-icon mdi mdi-comment-text"></div>
            <div class="box-modern-circle box-modern-circle-1"></div>
            <div class="box-modern-circle box-modern-circle-2"></div>
        </div>
        <p class="box-modern-title">Copywriting</p>
        <div class="box-modern-text">
            <p>Our copywriters can provide your website with proper texts.</p>
        </div>
        </article>
    </div>
    <div class="col-sm-6 col-lg-4 wow fadeIn" data-wow-delay=".1s">
        <!-- Box Modern-->
        <article class="box-modern box-modern_alternate" data-anime="circles-2">
        <div class="box-modern-media">
            <div class="box-modern-icon mdi mdi-chart-pie"></div>
            <div class="box-modern-circle box-modern-circle-1"></div>
            <div class="box-modern-circle box-modern-circle-2"></div>
        </div>
        <p class="box-modern-title">Analytics & Research</p>
        <div class="box-modern-text">
            <p>A&R services of LeadGen guarantee successful marketing results.</p>
        </div>
        </article>
    </div>
    <div class="col-sm-6 col-lg-4 wow fadeIn" data-wow-delay=".2s">
        <!-- Box Modern-->
        <article class="box-modern" data-anime="circles-1">
        <div class="box-modern-media">
            <div class="box-modern-icon mdi mdi-basket"></div>
            <div class="box-modern-circle box-modern-circle-1"></div>
            <div class="box-modern-circle box-modern-circle-2"></div>
        </div>
        <p class="box-modern-title">Sales Growth</p>
        <div class="box-modern-text">
            <p>Our innovative marketing tools provide great sales growth.</p>
        </div>
        </article>
    </div>
    </div>
</div>
</section>

<!-- Counters-->
<section class="section section-md text-center">
    <div class="container">
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

<!-- What We Do-->
<section class="section section-xl bg-gray-900" id="what-we-do">
<div class="container">
    <div class="row row-50 justify-content-center justify-content-xl-between align-items-center">
    <div class="col-sm-10 col-lg-5">
        <h3>Let Us Help You Attract More Clients</h3>
        <!-- Bootstrap tabs-->
        <div class="tabs-custom tabs-horizontal tabs-line tabs-line_1 block-8" id="tabs-1">
        <!-- Nav tabs-->
        <ul class="nav nav-tabs">
            <li class="nav-item" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab"><span>What You Get</span></a></li>
            <li class="nav-item" role="presentation"><a class="nav-link" href="#tabs-1-2" data-toggle="tab"><span>How We Work</span></a></li>
        </ul>
        <!-- Tab panes-->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="tabs-1-1">
            <p class="big">Working with us you can lift the web reputation of your company higher than ever. We can offer you all advantages of e-marketing including:</p>
            <ul class="list-marked list-marked_secondary">
                <li>Faster response to the end user;</li>
                <li>Increased exposure of products and services;</li>
                <li>Boundless universal accessibility.</li>
            </ul><a class="button button-default button-winona" href="#">Learn More</a>
            </div>
            <div class="tab-pane fade" id="tabs-1-2">
            <p class="big">Our agency works to ensure the best quality of marketing solutions for our clients and their businesses. Our approach features:</p>
            <ul class="list-marked list-marked_secondary">
                <li>Initial consultation with the client;</li>
                <li>Planning & analysis;</li>
                <li>Marketing campaign implementation.</li>
            </ul><a class="button button-default button-winona" href="#">Learn More</a>
            </div>
        </div>
        </div>
    </div>
    <div class="col-sm-10 col-lg-7 wow fadeIn text-center" data-wow-delay=".2s"><img src="/images/home-02-594x493.png" alt="" width="594" height="493"/>
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
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_cidere.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_adp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_cap.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_corfo.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_crdp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_mlp.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_sg.png" alt="" width="200" height="200"/></a></div>
    <div class="wow clipInLeft" data-wow-delay=".1s"><a class="link-image-1" href="#"><img src="/images/img/eim_teck.png" alt="" width="200" height="200"/></a></div>
    </div>

</div>
</section>



@endsection
