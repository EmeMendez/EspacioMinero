<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>holi</title>
</head>
<body style="background-color: white ">

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
                <h2 style="color: #f5a800; margin: 0 0 7px; text-align: center;">Soporte Espacio Industrial Minero</h2>
                <p style="margin: 2px; font-size: 15px">
                    Un usuario llamado: <b>{{$nom}}</b> con rut: <b>{{$ru}}</b> necesita ayuda con el siguiente asunto: <b>{{$men}}</b>. 
                </p>
				<ul style="font-size: 15px;  margin: 10px 0">
					<li>Su correo de contaco es: <a style= "color:#0033a0"href="mailto:{{$cor}}">{{$cor}}</a></li>
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
				</div>
				<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Espacio Industrial Minero 2020</p>
			</div>
		</td>
	</tr>
</table>
<!--hasta aquí-->

</body>
</html>



