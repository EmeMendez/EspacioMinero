@extends('layout')
@section('content')
<!-- Get in Touch-->
<section class="section section-md bg-gray-100">
  <div class="container">
    <h3 class="text-center">Registrarse</h3>
    <div class="row justify-content-center">
      <div class="col-lg-11 col-xl-9">
        <!-- RD Mailform-->
        <form class="rd-mailform rd-form sig" method="POST" action="{{ route('proveedor.store') }}">
          @csrf
          <div class="row row-x-16 row-20"  >
            <div class="col-7">
                <div class="form-wrap">
                    <input class="form-input" id="contact-rut" type="text" name="user-rut">
                    <label class="form-label" for="contact-rut">Rut</label>
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
                        <input class="form-input" id="contact-pass" type="password" name="user-pass" >
                        <label class="form-label" for="contact-pass">Contraseña</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <input class="form-input" id="contact-repass" type="password" name="user-pass-confirm">
                        <label class="form-label" for="contact-repass">Confirmar Contraseña</label>
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input" name="user-city">
                            @foreach ($ciudad as $ciu)
                              <option value="{{$ciu['id']}}">{{$ciu['nombre']}}</option>
                            @endforeach            
                          </select>
                     <i></i>     
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input" name="user-tamanio">
                          @foreach ($tamanioempresa as $te)
                            <option value="{{$te['id']}}">{{$te['nombre']}}</option>
                          @endforeach                        
                          </select>
                     <i></i>     
                    </div>
                </div>
                <div class="col-7">
                    <div class="form-wrap">
                        <select id="inputState" class="form-input" name="user-cat">
                          @foreach ($categoria as $cat)
                            <option value="{{$cat['id']}}">{{$cat['nombre']}}</option>
                          @endforeach                         
                          </select>
                     <i></i>     
                    </div>
                </div>
            <div class="col-md-7">
              <div class="form-wrap form-button">
                <button type="button" class="btn btn-success btn-circle"><label class="plus" >+</label></b>
                </button>             
            </div>
            </div>

            <div class="col-md-7">
                <div class="form-wrap form-button">
                  <button class="button button-block button-primary" type="submit">Registrarse</button>
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