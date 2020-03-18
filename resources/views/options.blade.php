@extends('layout')
@section('content')
  <div class="bg-light py-4">
    <h3 class="text-center">¡Únete y haz tu busqueda más simple!</h3>
  </div><!-- end bg-light -->
    <div class="container">
        <div class="row my-5">
                <div class="col-6 text-center">
                    <a  class="img-hover-zoom" href="{{route('proveedor.create')}}"> 
                        <img class="w-50" src="/images/provider.png">   
                    </a> 
                    <h4 class="font-weight-bold my-3">Empresas</h4>
                    <h6>(Proveedores)</h6>
                </div><!-- end col-6 -->
                <div class="col-6 text-center">
                    <a  class="img-hover-zoom" href="{{route('guest.create')}}">
                        <img class="w-50" src="/images/users.png">
                    </a>
                    <h4 class="font-weight-bold my-3">Personas</h4>
                </div><!-- end col-6 -->
        </div><!-- end row -->
    </div><!-- end container -->
    <style>
        .img-hover-zoom {
        overflow: hidden; 
        }
        .img-hover-zoom img {
        transition: transform .5s ease;
        }
        /* [3] Finally, transforming the image when container gets hovered */
        .img-hover-zoom:hover img {
        transform: scale(1.1);
        }
    </style>
 @endsection