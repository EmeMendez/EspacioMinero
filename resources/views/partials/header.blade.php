<!-- Page Header-->
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<header class="section page-header">
<!-- RD Navbar-->
<div class="rd-navbar-wrap" >
    <nav class="rd-navbar rd-navbar-modern bg-dark" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="10px" data-xl-stick-up-offset="10px" data-xxl-stick-up-offset="10px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true" style="height: auto;min-height: 40px;">
    <div class="rd-navbar-main">
        <!-- RD Navbar Panel-->
        <div class="rd-navbar-panel ">
        <!-- RD Navbar Toggle-->
        <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
        <!-- RD Navbar Brand-->
        <div class="rd-navbar-brand logo-espacio " > <a class="brand" href="{{route('home')}}"><img class="logoE" src="/images/logo_blanco.png" alt=""/></a></div>
        </div>
        <div class="rd-navbar-nav-wrap" style="padding-bottom: 20px;">
        <!-- RD Navbar Nav-->
        <ul class="rd-navbar-nav ">
        <li class="rd-nav-item  {{setActive('home')}}"><a class="rd-nav-link " href="{{route('home')}}" >INICIO</a>
            </li>
            <li class="rd-nav-item {{setActive('about')}}"><a class="rd-nav-link" href="{{route('about')}}" >NOSOTROS</a>
            </li>
            <li class="rd-nav-item {{setActive('typo')}}"><a class="rd-nav-link" href="{{route('typo')}}" >TYPOGRAPHY</a>
            </li>
            <li class="rd-nav-item {{setActive('contact')}}"><a class="rd-nav-link" href="{{route('contact')}}" ">CONTÁCTANOS</a>
            </li>
        </ul>
        <div class="rd-navbar-tel">
            <ul class="rd-navbar-nav">
                <li class="rd-nav-item {{setActive('session')}}"><a class="rd-nav-link" href="{{route('session')}}" >INICIAR SESIÓN</a>
                    </li>
                    <li class="rd-nav-item {{setActive('sing-up')}}"><a class="rd-nav-link" href="{{route('sing-up')}}" >REGISTRARSE</a>
                    </li>
                </ul>
        </div>          
            <div class="rd-navbar-dummy"></div>
    </div>
    </nav>
</div>
</header>