@extends("layout")
@section('content')
    <script>
                            
        Swal.fire('En este espacio encontrarás todo lo necesario para crecer como proveedor')

    </script>


    <section class="section section-md bg-gray-100">
        <div class="container">
          <div class="isotope row row-30" data-isotope-layout="masonry" data-isotope-group="about">
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
              <div class="block-ratio block-ratio-1">
                <div class="block-ratio-dummy"></div>
                <div class="block-ratio-content">
                  <div class="box-custom-1">
                    <h2>Recursos</h2>
                    <h4>Descarga e informate</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
                <div class="block-ratio block-ratio-1">
                    <div class="block-ratio-dummy"></div>
                <div class="block-ratio-content bg-image" style="background-image: url(images/biblioteca.jpg);"></div><a href="{{ route('biblioteca') }}" target=_blank>Biblioteca</a> <!--770x426 -->
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
                <div class="block-ratio block-ratio-1">
                    <div class="block-ratio-dummy"></div>
                    <div class="block-ratio-content bg-image" style="background-image: url(images/requerimientos.jpg);"></div><a href="{{ route('requerimientominera') }}" target=_blank>Requerimientos Mineras</a> <!--770x426 -->
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
                <div class="block-ratio block-ratio-1">
                    <div class="block-ratio-dummy"></div>
                    <div class="block-ratio-content bg-image" style="background-image: url(images/licitaciones.jpg);"></div><a href="{{ route('formatolicitaciones') }}" target=_blank>Formatos Licitaciones</a> <!--770x426 -->
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
                <div class="block-ratio block-ratio-1">
                    <div class="block-ratio-dummy"></div>
                    <div class="block-ratio-content bg-image" style="background-image: url(images/prevension.png);"></div><a href="{{ route('formatoprevension') }}" target=_blank>Formatos Prevención de Riesgo</a> <!--770x426 -->
                </div>
            </div>
        
            <div class="col-12 col-sm-6 col-md-4 isotope-item">
                <div class="block-ratio block-ratio-1">
                    <div class="block-ratio-dummy"></div>
                    <div class="block-ratio-content bg-image" style="background-image: url(images/calificacion.jpg);"></div><a href="{{ route('formatocalificacion') }}" target=_blank>Formatos Calificación Proveedores</a> <!--770x426 -->
                </div>
            </div>

          </div>
        </div>
      </section>


@endsection
