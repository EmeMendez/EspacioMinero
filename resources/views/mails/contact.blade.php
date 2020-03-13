<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


</head>
<body>

        
       <div class="contenedor">
            <div class="fondo">
                <img class="logo" src="https://espacioindustria.cl/recursos/images/logo_blanco.png">
            </div>
            
            <div class="contenido">

                <h1 class="titulo">Soporte Espacio Industrial Minero</h1>
                <p  class="texto">

                Un usuario llamado: <b>{{$nom}}</b> con rut de: <b>{{$ru}}</b> necesita ayuda con el siguiente asunto: <b>{{$men}}</b>. <br><br>
                Su correo de contaco es: <a style= "color:#0033a0"href="mailto:{{$cor}}">{{$cor}}</a>

                </p>


            </div>

            <div>
                <div class="fondo">
                    
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
        background-image: url(https://espacioindustria.cl/recursos/images/correo2.jpg);
        width: 600px;
        height: 100px;
        margin: auto;
    }
    .logo{
        width: 120px;
        height: 100;
        margin-left: 10%;
        margin-top: 5%;
    }
    .contenido{

        margin: auto;

    }
    .titulo{
        margin-top: 5%;
        color: #0033a0; 
        text-align: center;
    }
    .texto{
        margin-top: 10%;
        margin: auto;
        text-align: justify;
        width: 80%;
        padding-bottom: 100px;
        padding-left: 20px;
        padding-right: 20px;

        
    }
    .contenedor{
        border: gray 1px solid;
        width: 600px;
        height: auto;
        margin: auto;
    }
    

</style>
</html>