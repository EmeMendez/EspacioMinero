<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


</head>
<body>


        
        <div class="fondo">
            <img class="logo" src="https://espacioindustria.cl/recursos/images/logo_blanco.png">
            <h1><span><b>¡Felicitaciones!</b> </span></h1>
            <div class="sub-titulo">
                <h2><span>@if($tip == 1) Una Empresa Minera quiere contactarse contigo @else Un proveedor quiere contactarse contigo  @endif </span> </h3>
            </div>

            <div class="nombre">
                <h3 class="name"><span><b> Hola {{$np}}, </b><br></span></h3>
            </div>
            
            <div class="center">
                <div class="contacto">
                    <span style="color:white">@if($tip == 1) la Empresa Minera <b>{{$fromnme}} </b> @else el Proveedor {{$fromnme}}  @endif quiere contactarse contigo. A continuacion la información necesaria de la empresa:</span>
                </div>
                <div class="foot">
                    <div class="correo">
                        <h4><span>Correo Electronico: <a href="mailto:{{$frm}}">{{$frm}}</a></span></h4>
                    </div>
                    <div class="web">
                        <h4><span>Sitio Web: <a href="http://{{$sw}}">{{$sw}}</a> </span></h4>
                    </div>

                    @if($msj!='')

                    <div class="mensaje">
                        <h3 style="color:white">La Empresa ha querido añadir: </h3>
                        <p style="color:white">{{$msj}}</p>

                    </div>


                    @else
                        

                    @endif

                </div>
            </div>

        </div>


</body>
<style>
    @import url('https://fonts.googleapis.com/css?family=Lato:300&display=swap');
    *{
        font-family: 'Lato', sans-serif;
    }
    .fondo {
        background-image: url(https://espacioindustria.cl/recursos/images/correo.jpg);
        width: 620px;
        height: auto + 10%;
        margin: auto;
    }
    a{
        color: #f5a800;
    }
    .logo{
        width: 120px;
        height: 100;
        margin-left: 10%;
        margin-top: 10%;
    }
    .center{
        text-align: center;
    }
    h1{
        font-weight: bold;
        color: #f5a800; 
        text-align: center;
        margin-top: 10%;
    }
    h2{
        color: #fff;
        text-align: center;
    }
    h3{
        color: #fff;
    }
    h4{
        color: #fff;
    }
    .sub-titulo{
        width: 350px;
        margin: auto;
    }
    .nombre{
        width: 350px;
        margin: auto;
    }
    .con-n{
        font-weight: bold;
    }
    .name{
        text-align: center;
    }
    .contacto{
        width: 350px;
        margin: auto;
    }
    .mensaje{
        width: 350px;
        margin: auto;
    }
    .correo{
        width: 350px;
        margin: auto;
    }
    .web{
        width: 350px;
        margin: auto;
    }
    .foot{
        margin-top: 50px;
        padding-bottom: 5%;
    }

</style>
</html>