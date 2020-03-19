<footer>
  <hr class="mb-5">
    <div class="container my-5">
        <div class="row justify-content-between">
            {{-- start first col --}}          
            <div class="col-12 col-md-3 px-4 mt-3">
              <a  href="index.html">
                <img  class="pl-md-0" src="/images/logo-eim.png" alt="" width="199" height="41"/>
              </a>
              <p>Creamos instancias de participación que contribuyen al desarrollo sustentable de la Región de Coquimbo.</p>             
              <a class="button button-default-outline button-winona ml-0 mt-0 mt-4" href="{{route('about')}}">Nosotros</a>
            </div>{{-- end first col --}}
            {{-- start secont col --}}          
            <div class="col-12 col-md-3 px-4 mt-3">
              <h4 class="footer-classic-title">Enlaces rápidos</h4>   
              <ul class="mt-3">
                <li class="mb-2"><a href="{{ route('about') }}">Nosotros</a></li>
                <li class="mb-2"><a href="{{ route('contact') }}">Contactanos</a></li>
                <li class="mb-2"><a href="{{ route('proveedor.index') }}">Proveedores</a></li>
              </ul>          
            </div>{{-- end second col --}}
            {{-- start third col --}}          
            <div class="col-12 col-md-3 px-4 mt-3">
              <h4 class="footer-classic-title">Contáctanos</h4>
              <ul class="mt-3">
                <li class="mb-2"><a href="mailto:proyectobpe@cidere.cl">proyectobp@cidere.cl</a></li>
                <li class="mb-2"><a href="tel:51-2223090">51-2223090</a></li>
              </ul> 
            </div>{{-- end third col --}}
            {{-- start fourth col --}}          
            <div class="col-12 col-md-3 px-4 mt-3">
              <h4 class="footer-classic-title">Redes Sociales</h4>
              <div class="group group-xs"><a class="link link-social-1 mdi mdi-linkedin" href="#"></a><a class="link link-social-1 mdi mdi-instagram" href="#"></a></div>
            </div>{{-- end fourth col --}}
        </div>{{-- end row --}}
    </div>{{-- end container col --}}
    <div class="footer-classic-aside">
      <div class="container">
        <p class="rights"><span>&copy;&nbsp;</span><span class="copyright-year"></span> Espacio Industrial Minero. Todos los Derechos Reservados</p>
      </div>
    </div>{{-- end footer-classic-aside --}}  
</footer>{{-- end footer --}}  



