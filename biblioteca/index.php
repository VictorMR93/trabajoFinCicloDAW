<?PHP

    require_once ('SistemaLogin.php');

    session_start();
    
    //si se ha pulsado el botón iniciar sesión...
    if(isset($_REQUEST['btIniciarSesion'])){
        
        //recogemos los campos de usuario y clave
        $usu = $_REQUEST['usuarioLogin'];
        $con = $_REQUEST['contrasenaLogin'];
           
        if (SistemaLogin::verificaUsuario($usu, $con)) {
            $_SESSION['usuario'] = $usu;
            $_SESSION['contrasena'] = $con;
            //redirecciono a administracion.php
            header("Location: administracion.php");
        }
        else{
            echo("<br><br><center><span id='aviso'><img src='imagenes/error.png' width='50px' height='50px'> El usuario indicado no existe</span></center>");      
        }       
        
    }
    
?>  

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <title>Índice Biblioteca</title>
    
	<style>

        /* Fuentes descargadas*/
        @font-face{
            font-family: 'Cinzel';
            src: url('fuentes/Cinzel-Regular.ttf'); 
        }

        @font-face{
            font-family: 'Pathway';
            src: url('fuentes/PathwayGothicOne-Regular.ttf'); 
        }

        @font-face{
            font-family: 'Viga';
            src: url('fuentes/Viga-Regular.ttf'); 
        }

        @font-face{
            font-family: 'Sintony';
            src: url('fuentes/Sintony-Regular.ttf'); 
        }
        /* fin fuentes descargadas*/

        body{
            background: url('imagenes/escudo2.png') no-repeat fixed;
            background-size: 350px 320px;
            background-position: -180px 0px;
        }

        @media screen and (max-width: 600px) { 
            body{           /* empequeñecer la imagen del fondo cuando se está por debajo de 600px de ancho pantalla*/
                background-size: 120px 100px;
                background-position: 0px 0px;
            }
        }
        

        thead, tfoot{
            text-align: center;
        }

        td{
            text-align: center;  
        }

        .dataTables_filter{
            font-size: 20px;
        }

        #divTabla{
            overflow-x:auto;
            margin: auto;
        }

        #aviso{
            border-left: 7px solid red;
            background-color: lightgrey;
            padding: 20px 20px 20px 5px;
        }

        .container {
            padding-left: 0px;
            padding-right: 0px;
            max-width: 100%;
        }

        #liWrap{
            margin-right: 5px;
        }

        #desplegar{
            color: black;
        }

        #imgPortada:hover{
            transform: scale(1.8);
        }

        #nombreBiblio{
            font-size: 40px;
            font-family: 'Cinzel', serif;
            position: absolute;
            margin: 20px 0 0 150px;
        }
    
        /*TABS*/
        .tab .nav-tabs li a{    /*los enlaces de las pestañas*/
            display: block;
            padding: 0px 20px 10px;
            font-size: 23px;
            font-weight: bold;
            color: #063072;
            text-align: center;       
        }

        #aTabs{
            font-family: 'Cinzel', serif;
        }
        /*FIN TABS*/

        #contSecciones{
            margin-left: 170px;
        }

        /*NOTICIAS*/
        #divfechaNot{
            background-color: #425FAB;
            height: 120px;
            width: 150px;
            padding: 30px 15px 15px 15px;   
        }

        #divNoticia{
            background-color: #e6e6ff;  
            padding: 0 25px 25px 25px;
        }

        #nFecha{
            color: white;
            font-size: 37px;
            font-family: 'Pathway', sans-serif;
        }

        #nTitulo{
            font-family: 'Sintony', sans-serif;
            
        }
        /*FIN NOTICIAS*/

        /*SLIDER ÚLTIMAS NOVEDADES*/
        /* pos horizontal cards en el carrusel */
        .carousel-inner>.row-equal.active{
            display: flex;
        }

        /* control altura cards */
        .controlaAltura {
            max-height: 250px;
            overflow: hidden;
        }
        
        #portada1, #portada2, #portada3, #portada4, #portada5, #portada6{
            height: 250px;
            padding: 15px;
        }

        #cardColor{
            background-color: #E6E6FF;
        }

        #titulo1, #titulo2, #titulo3, #titulo4, #titulo5, #titulo6{
            font-size: 20px;
            font-style: italic;
        }

        #tituloCarrusel, #postsCarrusel{
            margin-left: 200px;
        }

        @media screen and (max-width: 490px) { 
            #tituloCarrusel, #postsCarrusel{
                margin-left: 0px;
            }
        }

        #portada1:hover, #portada2:hover, #portada3:hover, #portada4:hover, #portada5:hover, #portada6:hover{
            transform:scale(1.2);
            transition: all 0.2s ease;
        }
        /*FIN SLIDER ÚLTIMAS NOVEDADES*/

        /*HORARIOS*/
        .horarios {
            box-shadow: 0 0 10px #f1f1f1;
            padding: 30px;
            text-align: center;
        }
 
        .horarios ul {
            line-height: 35px;
            list-style: outside none none;
            padding: 0;
        }

        .horarios h3 {
            font-size: 25px;
            font-weight: 300;
        }

        .gradiente-1 {
            background: #e62f17;
            background: linear-gradient(45deg, #e62f17 0%, #f2ba30 100%);
        }

        .gradiente-2 {
            background: #0a3466;
            background: linear-gradient(45deg, #0a3466 0%, #17b6e3 100%);
        }
        
        .gradiente-1, .gradiente-2{
            color: white;
            box-shadow: 0 0 10px #ccc
        }
        /*FIN HORARIOS*/

        /*SECCIÓN CONOCE LA BIBLIOTECA*/
        #imgBiblio1{
            width: 400px;
            height: 500px;
            float: right;
            padding-left: 30px;
        }

        #imgBiblio2{
            width: 400px;
            height: 300px;
            float: left;
            padding-right: 30px;
        }

        #imgBiblio3{
            width: 400px;
            height: 300px;
            float: left;
            padding-top: 30px;
            padding-right: 30px;
        }

        #listaHemeroteca > li{
            margin: 5px;
        }

        #imgBiblio4, #imgBiblio5, #imgBiblio6, #imgBiblio7{
            width: 460px;
            height: 300px;
            padding: 20px;
        }

        #imgBiblio2:hover, #imgBiblio3:hover, #imgBiblio4:hover, #imgBiblio5:hover, #imgBiblio6:hover, #imgBiblio7:hover{
            transform:scale(1.3);
            transition: all 0.2s ease;
        }

        /*#divmapa{ 
            height: 200px;
            width: 100%;
         }*/ /*no hace falta darle un tamaño al mapa predeterminado porque ya se lo está dando la row de bootstrap*/
        /*FIN SECCIÓN CONOCE LA BIBLIOTECA*/

    </style>
     
    <script src="js/jquery-3.3.1.min.js"></script>
    <link href="jquery-ui-1.12.1.custom/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script><!--para google maps-->

    <script type="text/javascript">

        $(function(){
            cargarTabla();
            recopilaNoticia();
            recopilaUltimasNovedades();
            miMapa();  /*google maps*/
        });

        function cargarTabla(){

          var datos = {
              servicio: "listarLibro"
          }

          $.ajax({
              url: "servidor.php",  
              type: "post",
              data: JSON.stringify(datos),
              dataType: "json",
              success: MuestraLibros,
              error: function(res){alert("Ha habido un error: " + JSON.stringify(res));}
          });

        }

        function LlenaTabla(rs){
            $('#tabla_libros').dataTable({
                "aaData": rs,
                "aoColumns": [
                    {
                        mRender: function(data, type, row){
                             var salFoto = '<img id="imgPortada" src="'+row.PORTADA+'" width="90px" height="140px">'; 
                             return salFoto;
                        }     
                    },
                    {"mDataProp": "ISBN"},
                    {"mDataProp": "TITULO"},
                    {"mDataProp": "AUTOR"},
                    {"mDataProp": "GENERO"},
                    {"mDataProp": "PUBLICACION"},
                    {"mDataProp": "EDITORIAL"}
                ],
                "language": {   /*traducción de la data table*/
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sZeroRecords": "No se encontraron resultados",
                    "sInfoEmpty": "Mostrando libros del 0 al 0 de un total de 0 libros",
                    "info": "Mostrando _START_ de _END_ de un total de _TOTAL_ libros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ libros)",
                    "lengthMenu": "Mostrar _MENU_ libros",
                    "search": "_INPUT_",
                    "searchPlaceholder": "Buscar libros...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                }, 
                "bDestroy": true   
            });            
        }

        function MuestraLibros(rs){
            $("#filas_tabla").html(" ");
            LlenaTabla(rs, $("#filas_tabla"));

        }

        function recopilaNoticia(){

            var datos = {
                servicio: "ultimaNoticia"
            };

            $.ajax({
                url: "servidor.php",  
                type: "post",
                data: JSON.stringify(datos),
                dataType: "json",
                success: muestraUltimaNoticia,
                error: function(res){alert("Ha habido un error: " + JSON.stringify(res));}
            });

        }

        function muestraUltimaNoticia(resp){
            //console.log(resp);
            $("#nFecha").html(resp[0]["FECHA_NOTICIA"]);
            $("#nTitulo").html(resp[0]["TITULO_NOTICIA"]);
            $("#nContenido").html(resp[0]["CONTENIDO"]);
        }

        function recopilaUltimasNovedades(){

            var datos = {
                servicio: "ultimasNovedades"
            };

            $.ajax({
                url: "servidor.php",  
                type: "post",
                data: JSON.stringify(datos),
                dataType: "json",
                success: muestraUltimasNovedades,
                error: function(res){alert("Ha habido un error: " + JSON.stringify(res));}
            });

        }

        function muestraUltimasNovedades(resp){
            console.log(resp);
            //Establecer los títulos a cada card de bootstrap desde la bbdd 
            $("#titulo1").html(resp[0]["TITULO"]);
            $("#titulo2").html(resp[1]["TITULO"]);
            $("#titulo3").html(resp[2]["TITULO"]);
            $("#titulo4").html(resp[3]["TITULO"]);
            $("#titulo5").html(resp[4]["TITULO"]);
            $("#titulo6").html(resp[5]["TITULO"]);

            //Establecer las portadas a cada card de bootstrap desde la bbdd
            $("#portada1").attr('src', resp[0]["PORTADA"]);
            $("#portada2").attr('src', resp[1]["PORTADA"]);
            $("#portada3").attr('src', resp[2]["PORTADA"]);
            $("#portada4").attr('src', resp[3]["PORTADA"]);
            $("#portada5").attr('src', resp[4]["PORTADA"]);
            $("#portada6").attr('src', resp[5]["PORTADA"]);
            
        }

        function miMapa() {
            var centro = new google.maps.LatLng(37.349708,-6.053235);
            var mapCanvas = document.getElementById("divmapa");
            var op = {center: centro, zoom: 16};
            var map = new google.maps.Map(mapCanvas, op);
            var marker = new google.maps.Marker({position:centro});
            marker.setMap(map);
        }  

    </script>
	
  </head>

  <body>

      <span id="nombreBiblio">Biblioteca pública José Saramago</span>  

      <!--BARRA CON LOGIN (por sencillez, solo la quiero para el botón de login, no para que sea una barra de navegación)-->  
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation">
        
            <div class="container">
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#barraColapsable">
                    <span id="desplegar">Desplegar</span>
                </button>
                <div class="collapse navbar-collapse" id="barraColapsable">
                    <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                        <li class="dropdown order-1">
                            <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">Conectar Bibliotecario <span class="caret"></span></button>
                            <ul class="dropdown-menu dropdown-menu-right mt-2">
                               <li class="px-3 py-2">
                                   <form class="form" role="form" action="index.php" method="post">
                                        <div class="form-group">
                                            <input id="usuarioLogin" name="usuarioLogin" placeholder="Usuario" class="form-control form-control-sm" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <input id="contrasenaLogin" name="contrasenaLogin" placeholder="Contraseña" class="form-control form-control-sm" type="password" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="btIniciarSesion" class="btn btn-primary btn-block">Iniciar sesión</button>
                                        </div>
                                   </form>
                               </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
      </nav>
      <!--FIN BARRA CON LOGIN-->  

      <br><br><br><br>

      <div class="container" id="contSecciones">
        <div class="row" >
            <div class="col-md-12">

                <div class="tab" role="tabpanel">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" ><a id="aTabs" href="#Seccion1" role="tab" data-toggle="tab"><span></span>Noticias</a></li>
                        <li role="presentation"><a id="aTabs" href="#Seccion2" role="tab" data-toggle="tab"><span></i></span>Catálogo de libros</a></li>
                        <li role="presentation"><a id="aTabs" href="#Seccion3" role="tab" data-toggle="tab"><span></span>Horarios</a></li>
                        <li role="presentation"><a id="aTabs" href="#Seccion4" role="tab" data-toggle="tab"><span></span>Conoce la biblioteca</a></li>
                    </ul>

                    <div class="tab-content tabs" >
                        <div role="tabpanel" class="tab-pane active" id="Seccion1">
                            <br>
                            <!--NOTICIAS-->
                                <div class="row">
                                    <div class="col-md-2" id="divfechaNot">
                                    <center><span id="nFecha"></span></center>
                                    </div>  
                                    <div class="col-md-10" id="divNoticia">
                                        <p  id="nTitulo" style="margin-top:20px; font-size:36px"></p>
                                        <div id="nContenido"></div>                                       
                                    </div> 
                                </div>
                            <!--FIN NOTICIAS-->
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="Seccion2">
                            <br>
                            <div id="divTabla" >
                                <table id="tabla_libros" class="table table-striped" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>PORTADA</th>
                                            <th>ISBN</th>
                                            <th>TITULO</th>
                                            <th>AUTOR</th>
                                            <th>GENERO</th>
                                            <th>PUBLICACION</th>
                                            <th>EDITORIAL</th>
                                        </tr>
                                    </thead>  
                                    
                                    <tbody id="filas_tabla">
                                    
                                    </tbody>

                                    <tfoot>
                                        <tr>
                                            <th>PORTADA</th>
                                            <th>ISBN</th>
                                            <th>TITULO</th>
                                            <th>AUTOR</th>
                                            <th>GENERO</th>
                                            <th>PUBLICACION</th>
                                            <th>EDITORIAL</th>
                                        </tr>
                                    </tfoot>

                                </table>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="Seccion3">
                            <br>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="horarios gradiente-1">
                                        <h3>Horario habitual</h3>
                                        <ul>
                                            <li><i><strong>Lunes a Viernes</strong></i> 8:00 - 21:30</li>
                                            <li><i><strong>Sábados</strong></i> 9:00 - 14:00</li>
                                            <li><i><strong>Domingo</strong></i> Cerrado</li>
                                            <br>
                                            <h4>Servicios Bibliotecarios</h4>
                                            <li><i><strong>Lunes a Viernes</strong></i> 8:30 - 20:30</li>
                                            <li><i><strong>Sábados</strong></i> 9:30 - 13:30</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="horarios gradiente-2">
                                        <h3>Fines de semana</h3>
                                        <ul>
                                            <li><strong>Enero</strong> 13, 14, 20, 21, 27 y 28</li>
                                            <li><strong>Febrero</strong> 3, 4, 10 y 11</li>
                                            <li><strong>Mayo</strong> 5, 6, 12, 13, 19, 20, 26 y 27</li>
                                            <li><strong>Junio</strong> 2, 3, 9, 10, 16, 23, 24 y 30</li>
                                            <li><strong>Agosto</strong> 18, 19, 25 y 26</li>
                                            <li><strong>Septiembre</strong> 1 y 2</li>
                                            <li><strong>Noviembre</strong> 17, 18, 24 y 25</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="Seccion4">
                            <br>

                            <img src="imagenes/imgBiblio1.jpg" id="imgBiblio1">    
                            <h3>Inauguración</h3><br>

                            El 5 de marzo de 2011 se inauguró la Biblioteca Pública Municipal "José Saramago".<br><br>
                            
                            La sala de Internet, la videoteca, la hemeroteca y una sala específica para los niños, entre otros espacios, hacen de
                            la Biblioteca Municipal José Saramago el lugar apropiado para responder a las demandas de los vecinos que quieren disfrutar
                            de la cultura.<br><br>

                            Son 1.726 metros cuadrados en los que encontrar ofertas culturales muy diferentes: libros, DVD, acceso a prensa, Internet,
                            un lugar diseñado para los niños... que dan cobertura a necesidades distintas.<br><br>

                            La Biblioteca Municipal José Saramago se encuentra en un lugar privilegiado, pues a menos de cien metros está situada la
                            estación de Metro de Ciudad Expo, la parada del futuro Tranvía del Aljarafe y el Intercambiador de Transportes. Y lo más
                            importante, en su entorno cercano hay tres institutos de educación secundaria, tres colegios, un colegio mayor, además
                            de otros centros de carácter educativo y culturales, y un Centro de Salud.<br><br><br><br>

                            <h3>Instalaciones</h3><br>

                            La biblioteca José Saramago cuenta con 1762 metros cuadrados disponibles para las distintas necesidades de los usuarios.<br><br>

                            <img src="imagenes/imgBiblio2.jpg" id="imgBiblio2">
                            Para realizar los préstamos y devoluciones de nuestros materiales se cuenta con dos puestos dirigidos por el personal
                            bibliotecario, situados en la entrada de la biblioteca y en la zona de mediateca.<br><br>

                            Pero igualmente podrán hacer uso de la máquina de autopréstamo situada junto al primer puesto, en la entrada de la biblioteca.<br><br>
                           
                            <br><br><br><br><br><br>
                            <img src="imagenes/imgBiblio3.jpg" id="imgBiblio3"><br>
                            En la hemeroteca podrás consultar la prensa diaria, así como revistas de diversa índole entre las que podrás encontrar:<br><br>
                             
                            <div class="row">
                                <div class="col-sm-10">
                                    <div>
                                        <ul id="listaHemeroteca">
                                            <li class="btn btn-danger">ADE Teatro</li>
                                            <li class="btn btn-info">Arte y parte</li>
                                            <li class="btn btn-warning">Claves</li>
                                            <li class="btn btn-success">Dirigido por...</li>
                                            <li class="btn btn-dark">El Ciervo</li>
                                            <li class="btn btn-secondary">I Love English</li>
                                            <li class="btn btn-info">Más Allá de la Ciencia</li>
                                            <li class="btn btn-success">Qué leer</li>
                                            <li class="btn btn-warning">Quimera</li>
                                            <li class="btn btn-danger">Ritmo</li>
                                            <li class="btn btn-dark">Topo</li>
                                            <li class="btn btn-success">Je Parle FranÇais!</li>
                                            <li class="btn btn-danger">... y muchos más</li>
                                        </ul>
                                    </div> 
                                </div>
                            </div>

                            <br><br>
                            La sala de lectura es la sección de mayor envergadura de toda la biblioteca y tiene capacidad para más de 140 personas.
                            ¡No te pierdas el resto de salas!

                            <br>

                            <div class="row">
                                <div class="col-sm-12">
                                    <center><img src="imagenes/imgBiblio4.jpg" id="imgBiblio4">
                                    <img src="imagenes/imgBiblio5.jpg" id="imgBiblio5"></center>
                                </div>
                                <div class="col-sm-12">
                                    <center><img src="imagenes/imgBiblio6.jpg" id="imgBiblio6">
                                    <img src="imagenes/imgBiblio7.jpg" id="imgBiblio7"></center>
                                </div>
                            </div>

                            <br>
                            <h3>¿Dónde encontrarnos?</h3><br>

                            <div class="row">
                                <div class="col-sm-6" id="divmapa"></div>
                                <div class="col-sm-6">
                                    <img src="imagenes/direccion.png" class="img-fluid"> <strong><font color="black">DIRECCIÓN:</font></strong> Plaza de las Naciones, Torre Norte<br> Mairena del Aljarafe, Sevilla, España 41927<br><br><br> 
                                    <img src="imagenes/telefono.png" class="img-fluid"> <strong><font color="black">TELEFONO:</font></strong> +34 954 18 72 00 <br><br><br>
                                    <img src="imagenes/enviar.png" class="img-fluid"> <strong><font color="black">EMAIL:</font></strong> biblioteca.josesaramago@mairenadelaljarafe.org<br><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>    

    <!--SLIDER ÚLTIMAS NOVEDADES (aparece en todas las secciones del inxed)-->
    <section class="container p-t-3" id="tituloCarrusel">
        <div class="row">
            <div class="col-lg-12">
                <h1>Últimas Novedades</h1>
            </div>
        </div>
    </section>
    
    <section class="carousel slide" data-ride="carousel" id="postsCarrusel">
        <div class="container p-t-0 m-t-2 carousel-inner">
            <div class="row row-equal carousel-item active m-t-0">
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada1" class="img-fluid" src="" alt="Carousel 1"></center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo1">Libro 1</span></center><br>            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada2" class="img-fluid" src="" alt="Carousel 2"></center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo2">Libro 2</span></center><br> 
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada3" class="img-fluid" src="" alt="Carousel 3"></center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo3">Libro 3</span></center><br>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-equal carousel-item m-t-0">
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada4" class="img-fluid" src="" alt="Carousel 4"></center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo4">Libro 4</span></center><br>  
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada5" class="img-fluid" src="" alt="Carousel 5"><center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo5">Libro 5</span></center><br>  
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" id="cardColor">
                        <div class="card-img-top controlaAltura">
                            <center><img id="portada6" class="img-fluid" src="" alt="Carousel 6"></center>
                        </div>
                        <div class="card-block p-t-2">
                            <center><span id="titulo6">Libro 6</span></center><br>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
    <!--FIN SLIDER-->

    <br><br>   

  </body>
</html>