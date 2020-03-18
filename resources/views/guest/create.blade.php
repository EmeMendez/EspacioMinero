@extends('layout')
@section('content')
<!-- Get in Touch-->
{{-- <section class="section section-md bg-gray-100">
</section> --}}


<div class="bg-light py-4">
  <h3 class="text-center">Registrarse</h3>
</div>
<hr>
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <!-- RD Mailform-->
        <form id="form_register" enctype="multipart/form-data" name="f1" class="rd-mailform rd-form" method="POST" action="{{ route('guest.store') }}">
          @csrf

            <div class="col-12 col-md-7 mx-auto mt-5">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Rut</p>
                  <input id="user_rut" placeholder="Ejemplo 12345678-9" class="form-input"  type="text" name="user-rut" value="{{ old('user-rut') }}">
                  <p  id="user_rut_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>
                  @if(\Session::has('error'))
                  <div class="alert alert-danger" role="alert">
                    Rut ya registrado
                  </div>
                  @endif
                </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Nombre</p>                    
                  <input id="user_name" class="form-input"  type="text" name="user-name" value="{{ old('user-name') }}">
                  <input type="hidden" name="user-status" value="1">
                  <p class="text-danger my-0 pb-1 pl-4 small" id="user_name_error">&nbsp</p>   
                  @if(\Session::has('error2'))
                  <div class="alert alert-danger" role="alert">
                    Nombre ya registrado
                  </div>
                  @endif            
                </div>
            </div> 

            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Correo Electrónico</p>  
                <div class="input-group flex-nowrap">                 
                <input  class="form-input " id="user_email" type="text" name="user-email" value="{{ old('user-email') }}">
                <span class="mt-3 ml-2" style="color: #0033a0;" data-toggle="tooltip" data-placement="top" title="Este correo estará asociado a tu cuenta. Cuando quieras restablecer contraseña, se te informará a este email. Lo puedes cambiar cuando quieras dentro de tu perfil">
                  <i class="far fa-question-circle"></i>
                </span>
              </div>
                
                <p id="user_email_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>  
                @if(\Session::has('error3'))
                  <div class="alert alert-danger" role="alert">
                    Email ya registrado
                  </div>
                  @endif                             
              </div>
            </div>


            <div class="col-12 col-md-7 mx-auto">
                  <div class="form-wrap">
                    <p class="pl-4 mb-2">Telefono</p>                    
                    <input id="user_address" class="form-input" id="contact-address" type="text" name="user-phone" value="{{ old('user-phone') }}">
                    <p id="user_address_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>                               
                  </div>
            </div>



            <div class="col-12 col-md-7 mx-auto mb-3">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Ocupacion</p>    
                <select name="user-ocupacion" class="form-input">
                  @foreach ($tipos as $ocu)
                    <option value='{{$ocu->id}}'>{{$ocu->nombre}}</option>
                  @endforeach  
                </select>                
                                                           
              </div>
            </div> 


            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Contraseña</p>                    
                  <input class="form-input" id="user_pass" type="password" name="user-pass" >
                  <p id="user_pass_error" class="text-danger my-0 pb-1 pl-4 small" >&nbsp</p>                                                 
              </div>
          </div>

          <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                  <p class="pl-4 mb-2">Confirmar contraseña</p>                    
                  <input id="user_repass" class="form-input" type="password" name="user-repass" >
                  <p id="user_repass_error" class="text-danger my-0 pb-3 pl-4 small" >&nbsp</p>                                                 
              </div>
          </div>

          <div class="col-12 col-md-7 mx-auto">
            <div class="form-wrap">
                <p class=" text-center pl-4 mb-2">Al hacer clic en <b>Registrarse</b>, aceptas nuestras <a class="text-primary" href="#">Condiciones y la Política de privacidad de datos.</a></p>                    
            </div>
        </div>

            <div class="col-12 col-md-7 mx-auto mt-3 mb-5">
              <p  id="user_button_error" class="text-danger my-0 pb-1 pl-4 small text-center font-weight-bold">&nbsp</p>
                <div class="form-wrap form-button">
                  <button id="user_button" class="button button-block button-primary col-md-6 col-12 mx-auto" type="submit">Registarse</button> 
                </div> 
            </div>

        </form>
      </div>
    </div>    
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="/js/app.form.js"></script>
@endsection



 
