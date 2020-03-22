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
        <form id="form_register" enctype="multipart/form-data" name="f1" class="rd-mailform rd-form" method="POST" action="{{ route('proveedor.store') }}">
          @csrf

            <div class="col-12 col-md-7 mx-auto mt-5">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Rut Proveedor</p>
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

            <div id="ciudad">
              <select-ciudad-component></select-ciudad-component>
            </div>

            <div class="col-12 col-md-7 mx-auto">
                  <div class="form-wrap">
                    <p class="pl-4 mb-2">Dirección</p>                    
                    <input id="user_address" class="form-input" id="contact-address" type="text" name="user-address" value="{{ old('user-address') }}">
                    <p id="user_address_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>                               
                  </div>
            </div>



            {{-- <div class="input-group col-12 col-md-7 mb-3 mx-auto">
              <div class="input-group-prepend">
                <span class="input-group-text ">Direccion</span>
              </div>
              <input type="text" aria-label="First name" class="form-control" placeholder="Calle: Direccion Ejemplo">
              <input type="text" aria-label="Last name" class="form-control" placeholder="Numero: #16742">
            </div> --}}
            
            {{-- COPIA NO BORRAR <div class="col-12">
              <div class="form-wrap">
                  <input class="form-input" id="contact-repass" type="password" name="user-repass" onblur="comparacion()">
                  <label class="form-label" for="contact-repass">Confirmar Contraseña</label>
                  <p class="text-danger" id="msgerrorp"></p>
              </div>
          </div> --}}

            <div id="app">

                <uf-component></uf-component>

            </div>
            
            <div class="col-12 col-md-7 mx-auto">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Tipo de Empresa</p>                    
                    <select id="user_tipo_empresa" class="form-input" name="user-cat">
                      <option selected disabled value="">Seleccione tipo de empresa</option>
                      @foreach ($categoria as $cat)
                      @if(old('user-cat') == $cat['id']){
                        <option value="{{$cat['id']}}" selected>{{$cat['nombre']}}</option>
                      }@endif
                        <option value="{{$cat['id']}}">{{$cat['nombre']}}</option>
                      @endforeach                         
                    </select>
                    <p id="user_tipo_empresa_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>                                                 
                </div>
            </div>


            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Descripción de la empresa</p>                    
                <textarea class="form-input" id="user_description" name="user-descripcion" value="{{ old('user-descripcion') }}"></textarea>
                <p id="user_description_error" class="text-danger my-0 pb-1 pl-4 small">&nbsp</p>                                                               
              </div>
            </div> 
            
            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Sitio web</p>                    
                <input placeholder="www.example.cl" class="form-input" id="contact-web" type="text" name="user-sitio" value="{{ old('user-sitio') }}">
                <p class="text-danger my-0 pb-1 pl-4 small" id="msgerror">&nbsp</p>                                                 
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
                <p class=" text-center pl-4 mb-2" data-toggle="modal" data-target="#exampleModalScrollable">Al hacer clic en <b>Registrarse</b>, aceptas nuestras <a class="text-primary" href="#">Condiciones y la Política de privacidad de datos.</a></p>                    
            </div>

            
            <!-- Modal -->
            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Condiciones y Política de privacidad de datos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Los proveedores ("Nosotros", "nos") del servicio provisto por este sitio web ("Servicio") no son responsables de ningún contenido generado por cualquier usuario ni de sus cuentas ("Contenido"). El contenido remitido expresa el punto de vista de su autor sólamente.</p>

                      <p>Acepta no usar este servicio para publicar o enlazar a cualquier material difamatorio, abusivo, de odio, amenazador, spam o similar a spam, susceptible de ofender, sea contenido para adultos o censurable, contenga información personal de otros, infrinja los derechos de autor, estimule la actividad ilegal, o que viole de cualquier otra manera cualquier ley.</p>


                      <p>Toda la información o contenido que se remita o suba puede ser revisado por los miembros de la Dirección o equipo. No debe remitir cualquier contenido o información que considere privada o confidencial.</p>

                      <p>Estos términos pueden cambiar en cualquier momento y sin aviso.</p>

                      <p>Los datos que se soliciten ser fidedignos, solamente será utilizada para temas confidenciales del proyecto “Espacio Industrial Minero”. En ningún momento se hará público algun dato ingresado, ni será comercializado.</p>
                 </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
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



 
