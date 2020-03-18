<!-- Page Header-->
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="sweetalert2.all.min.js"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
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

        <!--=====================================
        =            HEADER CIA MINERA          =
        ======================================-->

            @if(Auth::guard('admin')->check())
            <ul class="rd-navbar-nav ">
                        
                <li class="rd-nav-item {{setActive('home')}}">   <a class="rd-nav-link" href="{{route('home')}}" >INICIO</a> </li>
                    <li class="rd-nav-item {{setActive('proveedor.index')}}">  <a class="rd-nav-link" href="{{route('proveedor.index')}}" >PROVEEDORES</a> </li>
                    <li class="rd-nav-item {{setActive('minera.index')}}">   <a class="rd-nav-link" href="{{ route('minera.index') }}">MINERAS</a> </li>
                    <li class="rd-nav-item {{setActive('contact')}}"><a class="rd-nav-link" href="{{route('contact')}}">CONTÁCTANOS</a> </li>
                    
            </ul>

            <div class="rd-navbar-tel">

                <ul class="rd-navbar-nav">
                    <li class="rd-nav-item {{setActive('minera.edit')}}"><img class="mr-2" src="/images/info-nose2.png" width="30px" height="30px"> <a class="rd-nav-link" href="{{route('minera.edit', auth()->guard('admin')->user()->url )}}" >PERFIL</a> </li>
                    <li class="rd-nav-item"><a href="#" class="rd-nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">CERRAR SESIÓN</a></li>
                </ul>

            </div>  

         <!--====  End of HEADER CIA MINERA ====-->


        <!--=====================================
        =            HEADER PROVEEDOR           =
        ======================================-->

            @elseif(Auth::check())

            <ul class="rd-navbar-nav ">
                    
                <li class="rd-nav-item {{setActive('home')}}">   <a class="rd-nav-link" href="{{route('home')}}" >INICIO</a> </li>
                <li class="rd-nav-item {{setActive('proveedor.index')}}">  <a class="rd-nav-link" href="{{route('proveedor.index')}}" >PROVEEDORES</a> </li>
                <li class="rd-nav-item {{setActive('proveedor.recursos')}}">   <a class="rd-nav-link" href="{{ route('proveedor.recursos') }}" >BIBLIOTECA</a> </li>
                <li class="rd-nav-item {{setActive('contact')}}"><a class="rd-nav-link" href="{{route('contact')}}">CONTÁCTANOS</a> </li>
                
            </ul>

            <div class="rd-navbar-tel">

                <ul class="rd-navbar-nav">
                    <li class="rd-nav-item {{setActive('proveedor.edit')}}"> <img class="mr-2" src="/images/provider2.png" width="30px" height="30px"><a class="rd-nav-link" href="{{route('proveedor.edit', auth()->user()->url )}}" >PERFIL</a> </li>
                    <li class="rd-nav-item"><a href="#" class="rd-nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">CERRAR SESIÓN</a></li>
                </ul>

            </div> 

        <!--====  End of HEADER PROVEEDOR ====-->


        <!--=====================================
        =            HEADER INVITADO            =
        ======================================-->

        @elseif(Auth::guard('invitado')->check())    
            <ul class="rd-navbar-nav ">
                
                <li class="rd-nav-item {{setActive('home')}}">   <a class="rd-nav-link" href="{{route('home')}}" >INICIO</a> </li>
                <li class="rd-nav-item {{setActive('proveedor.index')}}">   <a class="rd-nav-link" href="{{route('proveedor.index')}}" >PROVEEDORES</a> </li>
                <li class="rd-nav-item {{setActive('proveedor.recursos')}}">  <a class="rd-nav-link" href="{{route('proveedor.recursos')}}" >BIBLIOTECA</a> </li>
                <li class="rd-nav-item {{setActive('contact')}}"><a class="rd-nav-link" href="{{route('contact')}}">CONTÁCTANOS</a> </li>
                
            </ul>

            <div class="rd-navbar-tel">

                <ul class="rd-navbar-nav">
                    <li class="rd-nav-item"><span class="mr-1" style="color: #f5a800"><i class="fa fa-users">   </i> </span> <a class="rd-nav-link" href="#" onclick="event.preventDefault()">INVITADO</a> </li>
                    
                    <li class="rd-nav-item"><a href="#" class="rd-nav-link" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">CERRAR SESIÓN</a></li>
                </ul>

            </div> 
            

        <!--====  End of HEADER INVITADO   ====-->


        <!--=====================================
        =            HEADER GUEST            =
        ======================================-->

        @else    
        <ul class="rd-navbar-nav ">
            
            <li class="rd-nav-item {{setActive('home')}}">   <a class="rd-nav-link" href="{{route('home')}}" >INICIO</a> </li>
            <li class="rd-nav-item {{setActive('about')}}">  <a class="rd-nav-link" href="{{route('about')}}" >NOSOTROS</a> </li>
            <li class="rd-nav-item {{setActive('proveedor.index')}}">   <a class="rd-nav-link" href="{{route('proveedor.index')}}" >PROVEEDORES</a> </li>
            <li class="rd-nav-item {{setActive('contact')}}"><a class="rd-nav-link" href="{{route('contact')}}">CONTÁCTANOS</a> </li>
            
        </ul>

        <div class="rd-navbar-tel">

            <ul class="rd-navbar-nav">
                <li class="rd-nav-item {{setActive('session')}}"><a class="rd-nav-link" href="{{route('session')}}" >INICIAR SESIÓN</a> </li>
                <li class="rd-nav-item {{setActive('options')}} {{setActive('guest.create')}} {{setActive('proveedor.create')}}"><a class="rd-nav-link" href="{{route('options')}}" >REGISTRARSE</a> </li>
            </ul>

        </div>
        @endif  

    <!--====  End of HEADER GUEST   ====-->



        <div class="rd-navbar-dummy"></div>
    </div>
    </nav>
</div>
</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf</form>