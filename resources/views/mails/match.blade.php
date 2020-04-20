<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>holi</title>
</head>
<body style="background-color: black ">

<!--Copia desde aquí-->
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">

	<tr>
		<td style="padding: 0">
			<img style="padding: 0; display: block" src="https://espacioindustria.cl/recursos/images/correos.jpg" width="100%">
		</td>
	</tr>
	
	<tr>
		<td style="background-color: #ecf0f1">
			<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                <h2 style="color: #f5a800; margin: 0 0 7px; text-align: center;">¡Felicitaciones!</h2>
                <h3 style="color: #f5a800; margin: 0 0 7px; text-align: center;">@if($tip == 1) Una Empresa Minera quiere contactarse contigo @else Un proveedor quiere contactarse contigo  @endif</h3>
				<p style="margin: 2px; font-size: 15px">
                    Hola {{$np}}, <br> 
                    @if($tip == 1) la Empresa Minera <b>{{$fromnme}} </b> @else el Proveedor {{$fromnme}}  @endif quiere contactarse contigo. A continuacion la información necesaria de la empresa:                   </p>
				<ul style="font-size: 15px;  margin: 10px 0">
					<li>Correo Electronico: <a style= "color:#0033a0" href="mailto:{{$frm}}">{{$frm}}</a></li>
					<li>Sitio Web: <a style= "color:#0033a0" href="http://{{$sw}}">{{$sw}}</a> </li>
                </ul>
                @if($msj!='')

				<div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                    <h3 style="color:white">La Empresa ha querido añadir: </h3>
                    <p style="color:white">{{$msj}}</p>
				</div>


                @else

                <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
				</div>

                @endif





				<div style="width: 100%; text-align: center">
					<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db" href="https://www.espacioindustria.cl">Ir a la página</a>	
				</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Espacio Industrial Minero 2020</p>
			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->

</body>
</html>



