<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    

</head>
<body>

    <div class="image ml-4">
        <img class="fondo" src="https://espacioindustria.cl/recursos/images/correo.jpg" alt="Mi titulo de la imagen">
         <h1><span>¡Felicitaciones!</span></h1>
         <h2><span>Una Empresa Minera quiere contactarse contigo</span> </h3>
    </div>


    {{-- <h2>Hiciste MATCH UWU</h2>

    <div>
        <h1>Felicitaciones, haz hecho match!</h1>
        <h3>La Empresa Minera: {{$fromnme}}</h3>
        <h3>Correo Empresa Minera: {{$frm}}</h3>
        <h3>Sitio Web: {{$sw}}</h3>

        
    </div> --}}
</body>
<style>
    .image {
    position: relative;
    width: 100%; /* for IE 6 */
    margin-left: 26%;
    }
    h1 {
    position: absolute;
    color: #f5a800;
    top: 200px;
    margin-left: 15%;
    
    width: 100%;
    }
    h2 {
    position: absolute;
    color: #fff;
    top: 250px;
    margin-left: 7%;
    
    width: 100%;
    }
    .fondo{
        margin-left: auto;
        margin-right: auto;
    }


</style>
</html>