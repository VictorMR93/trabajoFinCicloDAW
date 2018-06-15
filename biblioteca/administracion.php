<?php

    require_once ('SistemaLogin.php');

    session_start();
    
    //si no existe sesión de usuario, que imprima el mensaje de aviso
    if(!isset($_SESSION['usuario'])){
        die("<center><img src='imagenes/error.png' width='150px' height='150px'></img><br><span style='font-size: 22px; color:red'>Acceso denegado. Debe <a href='index.php'><b>identificarse</b></a> primero.<span></center>");
    }
    
    //si se ha pulsado el botón desconectar...
    if(isset($_REQUEST['desconectar'])){
        //eliminamos la sesión y redirigimos al index
        session_unset();
        header("Location: index.php");   
    }

?>

<!DOCTYPE html>
<html>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Administracion</title>

    <style>
        
        header{
            background: url("imagenes/admin.png") no-repeat 95%;
        }

        #nLibros, #nUsuarios, #nPrestamos, #nNoticias{
            font-size: 30px;
        } 

        #pLibros, #pUsuarios, #pPrestamos, #pNoticias{
            font-size: 25px;
        } 

        #nLibros, #pLibros{
            color: blue;
        }

        #nUsuarios, #pUsuarios{
            color: red;
        }

        #nPrestamos, #pPrestamos{
            color: rgb(98, 10, 156);
        }

        .card:hover{
            transform:scale(1.05);
            transition: all 0.2s ease;
        }

        #btinicio{
            position: fixed;
            top: 0;
            right: 0;
            margin: 23px 5px 0 0;
            width: 120px;
        }

        #btdesconectar{
            position: fixed;
            top: 0;
            right: 0;
            margin: 63px 5px 0 0;
            width: 120px;
        }

    </style>

    <script src="js/jquery-3.3.1.min.js"></script>
    <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">

        $(function(){
            recopilaEstadisticas();
        }); 

        function recopilaEstadisticas(){

            var datos = {
                servicio: "recEstadisticas"
            };

            $.ajax({
                url: "servidor.php",  
                type: "post",
                data: JSON.stringify(datos),
                dataType: "json",
                success: muestraEstadisticas,
                error: function(res){alert("Ha habido un error: " + JSON.stringify(res));}
            });

        }

        function muestraEstadisticas(resp){
            console.log(resp);
            $("#nLibros").html(resp[0][0]["count(*)"]);
            $("#nUsuarios").html(resp[1][0]["count(*)"]);
            $("#nPrestamos").html(resp[2][0]["count(*)"]);
            $("#nNoticias").html(resp[3][0]["count(*)"]);
        }
    
    </script>

  </head>

  <body>

    <div class="container">

      <header class="jumbotron my-4">
        <p class="lead">Bienvenido a la administración de la Biblioteca de Mairena del Aljarafe.</p>
        <p class="lead">Estadísticas generales: <span id="nLibros"></span> <span id="pLibros">libros</span>, <span id="nUsuarios"></span> <span id="pUsuarios">usuarios</span>, <span id="nPrestamos"></span> <span id="pPrestamos">préstamos</span>, <span id="nNoticias"></span> <span id="pNoticias">noticias</span></p>
      </header>

      <div class="row text-center">

        <div class="col-lg-3">
          <div class="card">
            <center><img class="card-img-top" src="imagenes/libro.png" style="width: 120px; height: 120px"></center>
            <div class="card-body">
              <h4 class="card-title">Libros</h4>
              <p class="card-text">Visualiza, modifica, elimina e inserta libros en la base de datos</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(to top right, rgb(3, 61, 119), rgb(6, 78, 221))">
              <a href="librosBIBLIOTECA.html" class="btn btn-primary">Ir a gestión Libros</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card">
            <center><img class="card-img-top" src="imagenes/usuarios.png" style="width: 120px; height: 120px"></center>
            <div class="card-body">
              <h4 class="card-title">Usuarios</h4>
              <p class="card-text">Visualiza, modifica, elimina e inserta usuarios en la base de datos</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(to top right, rgb(3, 61, 119), rgb(6, 78, 221))">
              <a href="usuariosBIBLIOTECA.html" class="btn btn-primary">Ir a gestión Usuarios</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
          <div class="card">
                <center><img class="card-img-top" src="imagenes/prestamos.png" style="width: 240px; height: 120px"></center>
            <div class="card-body">
              <h4 class="card-title">Préstamos</h4>
              <p class="card-text">Visualiza, modifica, elimina e inserta préstamos en la base de datos</p>
            </div>
            <div class="card-footer" style="background: linear-gradient(to top right, rgb(3, 61, 119), rgb(6, 78, 221))">
              <a href="prestamosBIBLIOTECA.html" class="btn btn-primary">Ir a gestión Préstamos</a>
            </div>
          </div>
        </div>

        <div class="col-lg-3">
            <div class="card">
                  <center><img class="card-img-top" src="imagenes/noticias.png" style="width: 120px; height: 120px"></center>
              <div class="card-body">
                 <h4 class="card-title">Noticias:</h4>
                 <p class="card-text">Visualiza, modifica, elimina e inserta noticias para la biblioteca</p>
              </div>
              <div class="card-footer" style="background: linear-gradient(to top right, rgb(3, 61, 119), rgb(6, 78, 221))">
                <a href="noticiasBIBLIOTECA.html" class="btn btn-primary">Ir a gestión Noticias</a>
              </div>  
            </div>
        </div>

        <form class="form" action="administracion.php" method="post">
            <a href="index.php" class="btn btn-primary" id="btinicio">Ir al inicio</a> 
            <button type="submit" id="btdesconectar" name="desconectar" class="btn btn-danger">Desconectar</button>   
        </form>

        </div>        

      </div>

    </div>

  </body>

</html>