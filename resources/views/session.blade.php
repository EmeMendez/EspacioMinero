@extends('layout')
@section('content')
<!-- Get in Touch-->
<div class="bg-light py-4">
  <h3 class="text-center">Iniciar Sesión</h3>
</div>
<hr>
  <div class="container mt-5">

    <div class="row">

        @if(count($errors)> 0)
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
                
            @endforeach
          </ul>
        </div>
        @endif
        @if (\Session::has('error'))
        <div class="col-12 px-0 mx-0">
        <div class="alert alert-danger text-center">
          <p>{{\Session::get('error')}}</p>
        </div>
      </div>
        @endif
        @if (\Session::has('success'))
        <div class="col-12 px-0 mx-0">
        <div class="alert alert-success text-center">
          <p>{{\Session::get('success')}}</p>
        </div>
        </div>
        @endif

        <!-- RD Mailform-->
        
        <form class="col-12" method="post" action={{route('login')}}>
        @csrf
            <div class="col-12 col-md-5 mx-auto">
                <div class="form-wrap">
                    <p class="pl-4 my-2">Rut</p>                    
                    <input class="form-input" id="contact-name" type="text" name="user-name">
                  </div>
            </div>

            <div class="col-12 col-md-5 mx-auto">
              
                <div class="form-wrap">
                    <p class="pl-4 my-2">Contraseña</p>  
                    <div class="input-group" style="flex-wrap: nowrap;">                  
                    <input class="form-input" id="contact-email" type="password" name="user-pass" >                    
                    <button id="show_password" class="btn btn-outline-warning" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>              
                </div>
              </div>
            </div>
            
            <div class="col-12 col-md-5 mx-auto my-3">
              <div class="text-md-right text-center">
              <a class="mr-4" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
              </div>
            </div>


            <div class="col-12 mx-auto mb-5">
              <div class="form-wrap form-button">
                <button class="button button-block button-primary col-md-5 col-12 mx-auto" id="btnEnviar" type="submit">Iniciar Sesion</button>
              </div>
            </div>

        </form>
      </div>
    </div>

    <script type="text/javascript">
      function mostrarPassword(){
          var cambio = document.getElementById("contact-email");
          if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
          }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
          }
        } 
        
        $(document).ready(function () {
        //CheckBox mostrar contraseña
        $('#ShowPassword').click(function () {
          $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
      });
      </script>


@endsection