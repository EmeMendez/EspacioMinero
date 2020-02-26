@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Registrarse</h3>
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-9">
        <!-- RD Mailform-->
        <form enctype="multipart/form-data" name="f1" class="rd-mailform rd-form sig" method="POST" action="{{ route('proveedor.store') }}">
          @csrf

          <div class="row row-x-16 row-20" >
            <div class="col-7">
                <div class="form-wrap">
                    <input class="form-input" id="contact-rut" type="text" name="user-rut" onblur="validarRut()">
                    <label class="form-label" for="contact-rut">Rut ej: 12345678-9</label>
                    <p class="text-danger" id="msgerror"></p>
                </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-name" type="text" name="user-name" >
                        <label class="form-label" for="contact-name">Nombre</label>
                      </div>
                    </div> 
                <div class="col-7">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-address" type="text" name="user-address" >
                    <input type="hidden" name="user-status" value="1">
                    <label class="form-label" for="contact-address">Dirección</label>
                  </div>
                </div>        
                <div class="col-7">
                  <div class="form-wrap">
                    <input class="form-input" id="contact-web" type="text" name="user-sitio" >
                    <label class="form-label" for="contact-web">Sitio Web</label>
                  </div>
                </div>                                               
                <div class="col-7">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-pass" type="password" name="user-pass" onblur="minp()">
                        <label class="form-label" for="contact-pass">Contraseña</label>
                        <p class="text-danger" id="msgerrorps"></p>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-repass" type="password" name="user-repass" onblur="comparacion()">
                        <label class="form-label" for="contact-repass">Confirmar Contraseña</label>
                        <p class="text-danger" id="msgerrorp"></p>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input" name="user-city">
                            @foreach ($ciudad as $ciu)
                              <option value="{{$ciu['id']}}">{{$ciu['nombre']}}</option>
                            @endforeach            
                          </select>
                       
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input " name="user-tamanio">
                          @foreach ($tamanioempresa as $te)
                            <option value="{{$te['id']}}">{{$te['nombre']}}</option>
                          @endforeach                        
                          </select>
                      
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input" name="user-cat">
                          @foreach ($categoria as $cat)
                            <option value="{{$cat['id']}}">{{$cat['nombre']}}</option>
                          @endforeach                         
                          </select>
                         
                    </div>
                </div>
                <div class="col-7">
                  <div class="form-wrap">
                    <textarea class="form-input" id="contact-description" name="user-descripcion"></textarea>
                    <label class="form-label" for="contact-description">Descripción de su empresa</label>
                  </div>
                </div>   
            <div class="col-md-7">
                <div class="form-wrap form-button">
                  <button class="button button-block button-primary" id="btnEnviar" type="submit">Registrarse</button>
                </div>
              </div>
          </div>
        </form>
      </div>
    </div>

    
  </div>
</section>
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
          $("#msgerror").html("");
      } else {
          $("#msgerror").html("El Rut ingresado no es válido ");
      }
  };

  function comparacion(){
    
    if(document.getElementById("contact-pass").value != document.getElementById("contact-repass").value){
      $("#msgerrorp").html("Las contraseñas no coinciden");
    }else{
      $("#msgerrorp").html("");
    }

  }

  function minp(){
    if(document.getElementById("contact-pass").value.length < 8){
      $("#msgerrorps").html("La contraseña debe tener almenos 8 caracteres");
    }else{
      $("#msgerrorps").html("");
    }
  }

</script>