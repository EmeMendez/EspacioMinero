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
        <form enctype="multipart/form-data" name="f1" class="rd-mailform rd-form" method="POST" action="{{ route('proveedor.store') }}">
          @csrf

            <div class="col-12 col-md-7 mx-auto mt-5">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Rut Proveedor</p>
                  <input placeholder="Ejemplo 12345678-9" class="form-input" id="contact-rut" type="text" name="user-rut" onblur="validarRut()">
                  <p class="text-danger my-0 pb-1 pl-4" id="msgerror">&nbsp</p>
                </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Nombre</p>                    
                  <input class="form-input" id="contact-name" type="text" name="user-name" >
                  <p class="text-danger my-0 pb-1 pl-4" id="msgerror">&nbsp</p>               
                </div>
            </div> 

            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Correo Electrónico</p>                    
                <input  class="form-input" id="contact-address" type="text" name="user-address" >
                <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>                               
              </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Región</p>                    
                  <select id="inputState" class="form-input" name="user-city">
                      @foreach ($ciudad as $ciu)
                        <option value="{{$ciu['id']}}">{{$ciu['nombre']}}</option>
                      @endforeach            
                    </select>
                    <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>
              </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Ciudad</p>                    
                  <select id="inputState" class="form-input" name="user-city">
                      @foreach ($ciudad as $ciu)
                        <option value="{{$ciu['id']}}">{{$ciu['nombre']}}</option>
                      @endforeach            
                    </select>
                    <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>
              </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
                  <div class="form-wrap">
                    <p class="pl-4 mb-2">Dirección</p>                    
                    <input class="form-input" id="contact-address" type="text" name="user-address" >
                    <p class="text-danger my-0 pb-1 pl-4" id="msgerror">&nbsp</p>                               
                  </div>
            </div>
            
            {{-- COPIA NO BORRAR <div class="col-12">
              <div class="form-wrap">
                  <input class="form-input" id="contact-repass" type="password" name="user-repass" onblur="comparacion()">
                  <label class="form-label" for="contact-repass">Confirmar Contraseña</label>
                  <p class="text-danger" id="msgerrorp"></p>
              </div>
          </div> --}}

            <div class="col-12 col-md-7 mx-auto ">
                    <div class="form-wrap">
                      <p class="pl-4 mb-2">Tamaño Empresa</p>                    
                        <select id="inputState" class="form-input " name="user-tamanio">
                          @foreach ($tamanioempresa as $te)
                            <option value="{{$te['id']}}">{{$te['nombre']}}</option>
                          @endforeach                        
                          </select>
                          <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>                                                 
                    </div>
            </div>

            <div class="col-12 col-md-7 mx-auto">
                <div class="form-wrap">
                  <p class="pl-4 mb-2">Tipo de Empresa</p>                    
                    <select id="inputState" class="form-input" name="user-cat">
                      @foreach ($categoria as $cat)
                        <option value="{{$cat['id']}}">{{$cat['nombre']}}</option>
                      @endforeach                         
                      </select>
                      <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>                                                 

                </div>
            </div>


            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Descripción de la empresa</p>                    
                <textarea class="form-input" id="contact-description" name="user-descripcion"></textarea>
                <p class="text-danger my-0 pb-1 pl-4">&nbsp</p>                                                               
              </div>
            </div> 
            
            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Sitio web</p>                    
                <input class="form-input" id="contact-web" type="text" name="user-sitio" >
                <p class="text-danger my-0 pb-1 pl-4" id="msgerror">&nbsp</p>                                                 
              </div>
            </div>


            <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                <p class="pl-4 mb-2">Contraseña</p>                    
                  <input class="form-input" id="contact-pass" type="password" name="user-pass" onblur="minp()">
                  <p class="text-danger my-0 pb-1 pl-4" id="msgerrorps">&nbsp</p>                                                 
              </div>
          </div>

          <div class="col-12 col-md-7 mx-auto">
              <div class="form-wrap">
                  <p class="pl-4 mb-2">Confirmar contraseña</p>                    
                  <input class="form-input" id="contact-repass" type="password" name="user-repass" onblur="comparacion()">
                  <p class="text-danger my-0 pb-3 pl-4" id="msgerrorp">&nbsp</p>                                                 
              </div>
          </div>

          <div class="col-12 col-md-7 mx-auto">
            <div class="form-wrap">
                <p class=" text-center pl-4 mb-2">Al hacer clic en <b>Registrarse</b>, aceptas nuestras <a class="text-primary" href="#">Condiciones y la Política de privacidad de datos.</a></p>                    
            </div>
        </div>
            
            <div class="col-12 col-md-7 mx-auto mt-3 mb-5">
                <div class="form-wrap form-button">
                  <button class="button button-block button-primary col-md-6 col-12 mx-auto" id="btnEnviar" type="submit">Registrarse</button>
                </div>
            </div>

        </form>
      </div>
    </div>

    
  </div>
@endsection
<style>
  select {

-webkit-appearance: button;

-moz-border-radius: 5px;
-webkit-border-radius: 5px;
border-radius: 5px;
}
i{
	position: absolute;
	right: 20px;
	top: calc(50% - 13px);
	width: 16px;
	height: 16px;
	display: block;
	border-left:4px solid #f5a800;
	border-bottom:4px solid #f5a800;
	transform: rotate(-45deg); 
	transition: all 0.25s ease;
}

.btn-circle {
    width: 50px;
    height: 50px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 20px;
    line-height: 1.42857;
}
.plus{
    font-size: 25px;
    text-decoration: none;
}
</style>

<script>

  var Fn = {
      // Valida el rut con su cadena completa "XXXXXXXX-X"
      validaRut : function (rutCompleto) {
          rutCompleto = rutCompleto.replace("‐","-");
          if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
              return false;
          var tmp     = rutCompleto.split('-');
          var digv    = tmp[1]; 
          var rut     = tmp[0];
          if ( digv == 'K' ) digv = 'k' ;
          
          return (Fn.dv(rut) == digv );
      },
      dv : function(T){
          var M=0,S=1;
          for(;T;T=Math.floor(T/10))
              S=(S+T%10*(9-M++%6))%11;
          return S?S-1:'k';
      }
  }


  function validarRut(){
      if (Fn.validaRut( $("#contact-rut").val() )){
          $("#msgerror").html("&nbsp");
      } else {
          $("#msgerror").html("El Rut ingresado no es válido ");
      }
  };

  function comparacion(){
    
    if(document.getElementById("contact-pass").value != document.getElementById("contact-repass").value){
      $("#msgerrorp").html("Las contraseñas no coinciden");
    }else{
      $("#msgerrorp").html("&nbsp");
    }

  }

  function minp(){
    if(document.getElementById("contact-pass").value.length < 8){
      $("#msgerrorps").html("La contraseña debe tener almenos 8 caracteres");
    }else{
      $("#msgerrorps").html("&nbsp");
    }
  }

</script>