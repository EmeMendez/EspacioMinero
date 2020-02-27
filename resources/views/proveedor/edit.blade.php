@extends('layout')
@section('content')


<section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Mi Perfil</h3><br>
    </div>
</section>
      <!-- Fin Buscador -->
<hr>

    @if(count($errors)> 0)
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
        </div>
    @endif

    @if (\Session::has('success'))
        <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
        </div>
    @endif

<form action={{ route('proveedor.update',$proveedor) }} method="POST">
    @method('PATCH')
    @csrf 
    <div class="container">
        <div class="row">
            <div class="col-3 ">

                 <img height="260" width="255" src="{{ Storage::url($proveedor->imagen)}}"  />
                 <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Informacion Generas</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Teléfonos</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Correos</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">certificaciones</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">Cambiar Contraseña</a>
                </div>
                 
            </div>
            <div class="col-9 ">
                <div class="row">
                    <div class="tab-content" id="v-pills-tabContent">

                        <!--=================================================
                        =            SECCION INFORMACION GENERAL            =
                        ==================================================-->

                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <h5 class="text-md-left text-center">Informacion General</h5>
                            <div class="col-12">
                                <span>nombre</span>
                                <input type="text" value="{{$proveedor->nombre}}" name="user-name">
                                <input type="hidden" value="{{$proveedor->rut}}" name="user-rut">
                            </div>
                            <div class="col-12">
                                <span>Descripción</span>
                                <textarea name="user-descripcion" id="descripcion"  cols="100" rows="5">{{ $proveedor->descripcion}}</textarea>
                            </div>
                            <div class="col-12">
                                <span>Ciudad</span>
                                <select name="user-city">
                                    @foreach ($ciudades as $c)
                                    <option @if($c->id == $proveedor->ciudad_id) selected   @endif value="{{$c->id}}">{{$c->nombre}}</option>
                                    @endforeach
                                </select> 
                            </div> 
                            <div class="col-12">
                                <span>Tamaño empresa</span>
                                <select name="user-tamanio">
                                    @foreach ($tamanio_empresa as $tae)
                                    <option  @if($tae->id == $proveedor->tamanio_empresa_id) selected   @endif value="{{$tae->id}}">{{$tae->nombre}}</option>
                                    @endforeach
                                </select> 
                            </div> 
                            <div class="col-12">
                                <span>Tipo de empresa</span>
                                <select name="user-cat">
                                    @foreach ($categorias as $cat)
                                    <option  @if($cat->id == $proveedor->categoria_id) selected   @endif value="{{$cat->id}}">{{$cat->nombre}}</option>
                                    @endforeach
                                </select> 
                            </div>                       
                            <h5 class="text-md-left text-center">Datos de contacto</h5>
                            <div class="col-12">
                                <span>Sitio web</span>
                                <input name="user-sitio" type="text" value="{{$proveedor->sitio_web}}">
                            </div>                     
                            <div class="col-12">
                                <span>Dirección</span>
                                <input name="user-address" type="text" value="{{$proveedor->direccion}}">
                            </div> 
                                
                            <div class="form-wrap form-button">
                                <button class="button button-block button-primary pl-0" id="btnEnviar" type="submit">Actualizar</button>
                            </div>
                        </div>

                        <!--====  End of SECCION INFORMACION GENERAL  ====-->

                        

                        <!--=====================================
                        =            SECCION TELEFONO           =
                        ======================================-->


                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            Mis teléfonos
                        </div>


                        <!--====  End of SECCION TELEFONO  ====-->

                        <!--=============================================
                        =            SECCION CERTIFICACIONES            =
                        ==============================================-->

                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            Mis certificaciones
                        </div>

                        <!--====  End of SECCION CERTIFICACIONES  ====-->

                        <!--=====================================
                        =            SECCION CORREO            =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                            Mis cositllas
                        </div>

                        <!--====  End of SECCION CORREO  ====-->

                        <!--=====================================
                        =            CAMBIAR CONTRASEÑA            =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                            uwu
                        </div>

                        <!--====  End of CAMBIAR CONTRASEÑA  ====-->

                      </div>

                </div>
            </div>
        </div>
    </div>
</form>
@endsection

