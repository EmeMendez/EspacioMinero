@extends('layout')
@section('content')


{{-- <section class="section section-xs bg-gray-100">
    <div class="container">
      <h3 class="text-center">Mi Perfil</h3><br>
    </div>
</section> --}}
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <h3 class="navbar-brand pl-3">Mis datos</h3>
        

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active py-2" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><span class="ml-3">Informacion General</span></a>
                <a class="nav-link py-2" id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo" aria-selected="false"><span class="ml-3">Logo Empresarial</span></a>                   
                <a class="nav-link py-2" id="v-pills-phone-tab" data-toggle="pill" href="#v-pills-phone" role="tab" aria-controls="v-pills-phone" aria-selected="false"><span class="ml-3">Teléfonos</span></a>
                <a class="nav-link py-2" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false"><span class="ml-3">Correos</span></a>
                <a class="nav-link py-2" id="v-pills-certification-tab" data-toggle="pill" href="#v-pills-certification" role="tab" aria-controls="v-pills-certification" aria-selected="false"><span class="ml-3">Certificaciones</span></a>
                <a class="nav-link py-2" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false"><span class="ml-3">Cambiar Contraseña</span></a>
                <a class="nav-link py-2" id="v-pills-cancel-account-tab" data-toggle="pill" href="#v-pills-cancel-account" role="tab" aria-controls="v-pills-cancel-acount" aria-selected="false"><span class="ml-3">Cerrar Cuenta</span></a>               
            </div>               
          </ul>
        </div>
      </nav>

    <div class="container">
        <div class="row mt-4 ">
            <div class="col-12 col-md-3 d-none d-md-block">
                <div class=" text-center">
                    <img class="rounded border border-light img-fluid" height="150" width="150" src="{{ Storage::url($proveedor->imagen)}}"  />
                </div>

                 <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active py-2 pl-3" id="v-pills-general-tab" data-toggle="pill" href="#v-pills-general" role="tab" aria-controls="v-pills-general" aria-selected="true"><span >Informacion General</span></a>
                    <a class="nav-link py-2 pl-3" id="v-pills-logo-tab" data-toggle="pill" href="#v-pills-logo" role="tab" aria-controls="v-pills-logo" aria-selected="false"><span>Logo Empresarial</span></a>                   
                    <a class="nav-link py-2 pl-3" id="v-pills-phone-tab" data-toggle="pill" href="#v-pills-phone" role="tab" aria-controls="v-pills-phone" aria-selected="false"><span >Teléfonos</span></a>
                    <a class="nav-link py-2 pl-3" id="v-pills-email-tab" data-toggle="pill" href="#v-pills-email" role="tab" aria-controls="v-pills-email" aria-selected="false"><span >Correos</span></a>
                    <a class="nav-link py-2 pl-3" id="v-pills-certification-tab" data-toggle="pill" href="#v-pills-certification" role="tab" aria-controls="v-pills-certification" aria-selected="false"><span >Certificaciones</span></a>
                    <a class="nav-link py-2 pl-3" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false"><span >Cambiar Contraseña</span></a>
                    <a class="nav-link py-2 pl-3" id="v-pills-cancel-account-tab" data-toggle="pill" href="#v-pills-cancel-account" role="tab" aria-controls="v-pills-cancel-acount" aria-selected="false"><span >Cerrar Cuenta</span></a>               
                </div>
                 
            </div>
            <div class="col-12 col-md-9 ">
                <div class="row ml-2 mt-2">
                    <div class="tab-content" id="v-pills-tabContent">

                        
                        <!--=================================================
                        =            SECCION INFORMACION GENERAL            =
                        ==================================================-->

                        <div class="tab-pane fade show active" id="v-pills-general" role="tabpanel" aria-labelledby="v-pills-general-tab">
                            <form action={{ route('proveedor.update',$proveedor) }} method="POST">
                                @method('PATCH')
                                @csrf 
                                    <h3 class="text-center">Mis Datos de Proveedor</h3><br>
                                    <h5 class="py-3 text-center">Informacion General</h5>
                                

                                <div class="col-12 pl-0 mb-3">
                                    <p class="pl-4 mb-2">Nombre</p>
                                    <input class="form-input" size="40" type="text" value="{{$proveedor->nombre}}" name="user-name">
                                    <input type="hidden" value="{{$proveedor->rut}}" name="user-rut">
                                </div>
                                <div class="col-12  pl-0 mb-3">
                                    <p class="pl-4 mb-2">Descripción</p>
                                    <textarea placeholder="Proporciona una descripción para tu empresa" class="form-input" name="user-descripcion" id="descripcion"  cols="100" rows="5">{{ $proveedor->descripcion}}</textarea>
                                </div>
                                <div class="col-12 pl-0 mb-3">
                                    <p class="pl-4 mb-2">Ciudad</p>
                                    <select name="user-city" class="form-input">
                                        @foreach ($ciudades as $c)
                                        <option @if($c->id == $proveedor->ciudad_id) selected   @endif value="{{$c->id}}">{{$c->nombre}}</option>
                                        @endforeach
                                    </select> 
                                </div>
                                <div class="col-12  pl-0 mb-3">
                                    <p class="pl-4 mb-2">Dirección</p>
                                    <input placeholder="Dirección Empresarial" class="form-input" name="user-address" type="text" value="{{$proveedor->direccion}}">
                                </div>                                  
                                <div class="col-12  pl-0 mb-3">
                                    <p class="pl-4 mb-2">Tamaño empresa</p>
                                    <select name="user-tamanio" class="form-input">
                                        @foreach ($tamanio_empresa as $tae)
                                        <option  @if($tae->id == $proveedor->tamanio_empresa_id) selected   @endif value="{{$tae->id}}">{{$tae->nombre}}</option>
                                        @endforeach
                                    </select> 
                                </div> 
                                <div class="col-12  pl-0 mb-3">
                                    <p class="pl-4 mb-2">Tipo de empresa</p>
                                    <select name="user-cat" class="form-input">
                                        @foreach ($categorias as $cat)
                                        <option  @if($cat->id == $proveedor->categoria_id) selected   @endif value="{{$cat->id}}">{{$cat->nombre}}</option>
                                        @endforeach
                                    </select> 
                                </div>                       
                                <div class="col-12  pl-0 mb-3">
                                    <p class="ml-4 mb-2">Sitio web</p>
                                    <input placeholder="www.ejemplo.cl" class="form-input" name="user-sitio" type="text" value="{{$proveedor->sitio_web}}">
                                </div>                     


                                <div class="col-12 pl-0 mb-3 text-center pt-4">
                                            <button class="button button-block button-primary col-md-4 col-12 p-2 mx-auto" id="btnEnviar" type="submit">Actualizar Datos</button>
                                </div> 

                            </form>

                            </div>

                        <!--====  End of SECCION INFORMACION GENERAL  ====-->


                        <!--=====================================
                        =            SECCION LOGO           =
                        ======================================-->

                            
                        <div class="tab-pane fade" id="v-pills-logo" role="tabpanel" aria-labelledby="v-pills-logo-tab">
                            <div class="row">
                            <div class="col-12">
                                    <h3 class="text-center">Logo empresarial</h3><br>
                                    <h5 class="pb-3 text-center">Toco sobre la imagen para cambiar</h5>
                                    <div id="app">
                                    <imagen-component></imagen-component>
                            </div>
                            <div class="col-12 pl-0 mb-3 text-center pt-4">
                                <button class="button button-block button-primary col-md-4 col-8 p-2 mx-auto" id="btnEnviar" type="submit">Guardar</button>
                            </div>                                                              
                            </div>    
                            </div>               
                        </div>


                        <!--====  End of SECCION LOGO  ====-->

                        <!--=============================================
                        =            SECCION TELEFONOS           =
                        ==============================================-->

                        <div class="tab-pane fade" id="v-pills-phone" role="tabpanel" aria-labelledby="v-pills-phone-tab">

                            <h3 class="text-center">Mis datos de Contácto</h3><br>
                            <h5 class="pb-3 text-center">Informacion de contácto Telefónico</h5>
                        

                            <div class="col-12 pl-0 pt-3 mb-3">
                                <p class="pl-4 mb-2">Teléfono área Comercial</p>
                                <input placeholder="02 55 55" class="form-input" size="40" type="text" value="espacio@industria.cl" name="user-name">
                            </div>
                            <div class="col-12 pl-0 mb-3">
                                <p class="pl-4 mb-2">Teléfono área administrativa</p>
                                <input placeholder="02 55 55" class="form-input" size="40" type="text" value="espacio@industria.cl" name="user-name">
                            </div>
                            <div class="col-12 pl-0 mb-3">
                                <p class="pl-4 mb-2">Teléfono área técnica</p>
                                <input placeholder="02 55 55" class="form-input" size="40" type="text" value="espacio@industria.cl" name="user-name">
                            </div>
                            <div class="col-12 pl-0 mb-3 text-center pt-4">
                                <button class="button button-block button-primary col-md-4 col-12 p-2 mx-auto" id="btnEnviar" type="submit">Guardar</button>
                            </div>




                        </div>

                        <!--====  End of SECCION PHONE  ====-->

                        <!--=====================================
                        =            SECCION EMAIL           =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-email" role="tabpanel" aria-labelledby="v-pills-phone-tab">

                            <h3 class="text-center">Mis datos de Contácto</h3>
                            <h5 class="pb-3 text-center">Informacion de Correo Electrónico</h5>
                        

                        <div class="col-12 pl-0 pt-3 mb-3">
                            <p class="pl-4 mb-2">Correo electrónico área Comercial</p>
                            <input placeholder="espaco@industria.cl" class="form-input" size="40" type="text" value="espaco@industria.cl" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3">
                            <p class="pl-4 mb-2">Correo electrónico administrativa</p>
                            <input placeholder="espaco@industria.cl" class="form-input" size="40" type="text" value="espaco@industria.cl" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3">
                            <p class="pl-4 mb-2">Correo electrónico área técnica</p>
                            <input placeholder="espaco@industria.cl" class="form-input" size="40" type="text" value="espaco@industria.cl" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3 text-center pt-4">
                            <button class="button button-block button-primary col-md-4 col-12 p-2 mx-auto" id="btnEnviar" type="submit">Guardar</button>
                        </div> 


                        </div>

                        <!--====  End of SECCION EMAIL  ====-->

                        <!--=====================================
                        =            CAMBIAR CERTIFICACIONES           =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-certification" role="tabpanel" aria-labelledby="v-pills-certification-tab">
                            MIS CERTIFICACIONES
                        </div>

                        <!--====  End of CAMBIAR CERTIFICACIONES  ====-->


                        <!--=====================================
                        =            CAMBIAR PASSWORD          =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
                            <h3 class="text-center">Seguridad de la Cuenta</h3><br>
                        

                        <div class="col-12 pl-0 pt-3 mb-3">
                            <p class="pl-4 mb-2">Contraseña Actual</p>
                            <input class="form-input" size="40" type="password" value="" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3">
                            <p class="pl-4 mb-2">Nueva contraseña</p>
                            <input class="form-input" size="40" type="password" value="" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3">
                            <p class="pl-4 mb-2">Confirmar nueva contraseña</p>
                            <input  class="form-input" size="40" type="password" value="" name="user-name">
                        </div>
                        <div class="col-12 pl-0 mb-3 text-center pt-4">
                            <button class="button button-block button-primary col-md-4 col-12 p-2 mx-auto" id="btnEnviar" type="submit">Guardar</button>
                        </div>                        
                    </div>

                        <!--====  End of PASSWORD  ====--> 
                        
                        <!--=====================================
                        =            CAMBIAR CANCEL ACCOUNT          =
                        ======================================-->

                        <div class="tab-pane fade" id="v-pills-cancel-account" role="tabpanel" aria-labelledby="v-pills-cancel-account-tab">
                            cancel account
                        </div>

                        <!--====  End of CANCEL ACCOUND ====-->                         

                      </div>
                </div> <!--====  End ROW ====-->  
            </div><!--====  End COL-9 ====-->
        
        
        </div>
    </div>
@endsection

