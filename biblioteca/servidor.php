<?php

	header('Content-Type: application/json');
	include("conexion.php");
	$conn = Conectar2("biblioteca", "tfc2018", "velazquez");

	$datos = file_get_contents('php://input');
	$objeto=json_decode($datos);

	if($objeto != null) {
		switch($objeto->servicio) {
			/*casos para los usuarios*/
			case "listar":
				print json_encode(listadoUsuarios());
				break;
			case "insertar":
				insertarUsuario($objeto);
				print json_encode(listadoUsuarios());
				break;
			case "borrar":
				borrarUsuario($objeto->id);
				print json_encode(listadoUsuarios());
				break;
			case "modificar":
				modificarUsuario($objeto);
				print json_encode(listadoUsuarios());
				break;	
			case "selUsuarioID":
				print json_encode(selUsuarioID($objeto->id));
				break;

			/*casos para los libros*/	
			case "listarLibro":
				print json_encode(listadoLibros());
				break;
			case "insertarLibro":
				insertarLibro($objeto);
				print json_encode(listadoLibros());
				break;
			case "borrarLibro":
				borrarLibro($objeto->id);
				print json_encode(listadoLibros());
				break;
			case "modificarLibro":
				modificarLibro($objeto);
				print json_encode(listadoLibros());
				break;	
			case "selLibroID":
				print json_encode(selLibroID($objeto->id));
				break;

			/*casos para los préstamos*/
			case "listarPrestamo":
				print json_encode(listadoPrestamos());
				break;
			case "insertarPrestamo":
				insertarPrestamo($objeto);
				print json_encode(listadoPrestamos());
				break;
			case "borrarPrestamo":
				borrarPrestamo($objeto->id_prestamo);
				print json_encode(listadoPrestamos());
				break;
			case "modificarPrestamo":
				modificarPrestamo($objeto);
				print json_encode(listadoPrestamos());
				break;	
			case "selPrestamoID":
				print json_encode(selPrestamoID($objeto->id_prestamo));
				break;
			case "encuentraTitulo":
				print json_encode(encuentraTitulo($objeto->isbn));
				break;

			/*casos para las noticias*/	
			case "listarNoticia":
				print json_encode(listadoNoticias());
				break;
			case "insertarNoticia":
				insertarNoticia($objeto);
				print json_encode(listadoNoticias());
				break;
			case "borrarNoticia":
				borrarNoticia($objeto->id_noticia);
				print json_encode(listadoNoticias());
				break;
			case "modificarNoticia":
				modificarNoticia($objeto);
				print json_encode(listadoNoticias());
				break;	
			case "selNoticiaID":
				print json_encode(selNoticiaID($objeto->id_noticia));
				break;	
			case "ultimaNoticia":	
				print json_encode(ultimaNoticia());	
				break;

			/*caso para la administración (recopilar estadísticas de la base de datos)*/	
			case "recEstadisticas":
				print json_encode(recEstadisticas());
				break;
				
			/*caso para las últimas novedades*/	
			case "ultimasNovedades":	
				print json_encode(ultimasNovedades());	
				
			
		}
	}

	/* FUNCIONES PARA EL CRUD DE USUARIOS ----------------------------------------------------------------------------------------------*/ 
	function listadoUsuarios() {
		global $conn;
		try {
			$sc = "Select * From usuarios Order By ID";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertarUsuario($objeto) {
		global $conn;
		try {
			$sql = "INSERT INTO usuarios(DNI, NOMBRE, APELLIDOS, TELEFONO, EMAIL, FECHA_NACIMIENTO, FECHA_ALTA) VALUES (?, ?, ?, ?, ?, ?, ?)";	
			$conn->prepare($sql)->execute(
				array(
					$objeto->dni,
					$objeto->nombre,
					$objeto->apellidos,
					$objeto->telefono,
					$objeto->email,
					$objeto->fecha_nacimiento,
					$objeto->fecha_alta
					)
				);
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function borrarUsuario($id){
		global $conn;
		try {
			$sql = "Delete From usuarios Where ID = ?";	
			$conn->prepare($sql)->execute(array($id));
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function modificarUsuario($objeto) {
		global $conn;
		try {
			$sql = "UPDATE usuarios SET 
								DNI			= ?,
								NOMBRE		= ?, 
								APELLIDOS	= ?,
								TELEFONO	= ?,
								EMAIL	= ?,
								FECHA_NACIMIENTO	= ?,
								FECHA_ALTA	= ?
							WHERE id = ?";
			$conn->prepare($sql)->execute(
			array(
				$objeto->dni,
				$objeto->nombre, 
				$objeto->apellidos, 
				$objeto->telefono,
				$objeto->email,
				$objeto->fecha_nacimiento,
				$objeto->fecha_alta,
				$objeto->id
				) 
			);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	function selUsuarioID($id) {
		global $conn;
		try {
			$sc = "Select * From usuarios Where ID = ?";
			$stm = $conn->prepare($sc);
			$stm->execute(array($id));
			return ($stm->fetch(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}	
	}
	/*FIN FUNCIONES PARA EL CRUD DE USUARIOS*/


	/*FUNCIONES PARA EL CRUD DE LIBROS ----------------------------------------------------------------------------------------------*/ 
	function listadoLibros() {
		global $conn;
		try {
			$sc = "Select * From libros Order By ID";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertarLibro($objeto) {
		global $conn;
		try {
			$sql = "INSERT INTO libros(PORTADA, ISBN, TITULO, AUTOR, GENERO, PUBLICACION, EDITORIAL, PAGINAS) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";	
			$conn->prepare($sql)->execute(
				array(
					$objeto->portada,
					$objeto->isbn,
					$objeto->titulo,
					$objeto->autor,
					$objeto->genero,
					$objeto->publicacion,
					$objeto->editorial,
					$objeto->paginas
					)
				);
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function borrarLibro($id){
		global $conn;
		try {
			$sql = "Delete From libros Where ID = ?";	
			$conn->prepare($sql)->execute(array($id));
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function modificarLibro($objeto) {
		global $conn;
		try {
			$sql = "UPDATE libros SET 
								PORTADA	= ?,	
								ISBN	= ?,
								TITULO	= ?, 
								AUTOR	= ?,
								GENERO	= ?,
								PUBLICACION	= ?,
								EDITORIAL	= ?,
								PAGINAS	= ?
							WHERE id = ?";
			$conn->prepare($sql)->execute(
			array(
				$objeto->portada,
				$objeto->isbn,
				$objeto->titulo, 
				$objeto->autor, 
				$objeto->genero,
				$objeto->publicacion,
				$objeto->editorial,
				$objeto->paginas,
				$objeto->id
				) 
			);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	function selLibroID($id) {
		global $conn;
		try {
			$sc = "Select * From libros Where ID = ?";
			$stm = $conn->prepare($sc);
			$stm->execute(array($id));
			return ($stm->fetch(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}	
	}
	/*FIN FUNCIONES PARA EL CRUD DE LIBROS*/

	/*FUNCIONES PARA EL CRUD DE PRESTAMOS ----------------------------------------------------------------------------------------------*/ 
	function listadoPrestamos() {
		global $conn;
		try {
			$sc = "Select * From prestamos Order By ID_PRESTAMO";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertarPrestamo($objeto) {
		global $conn;
		try {
			$sql = "INSERT INTO prestamos(DNI, ISBN, TITULO, FECHA_PRESTAMO, FECHA_DEVOLUCION) VALUES (?, ?, ?, ?, ?)";	
			$conn->prepare($sql)->execute(
				array(
					$objeto->dni,
					$objeto->isbn,
					$objeto->titulo,
					$objeto->fecha_prestamo,
					$objeto->fecha_devolucion
					)
				);
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function borrarPrestamo($id_prestamo){
		global $conn;
		try {
			$sql = "Delete From prestamos Where ID_PRESTAMO = ?";	
			$conn->prepare($sql)->execute(array($id_prestamo));
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function modificarPrestamo($objeto) {
		global $conn;
		try {
			$sql = "UPDATE prestamos SET 
								DNI	= ?,	
								ISBN	= ?,
								TITULO	= ?, 
								FECHA_PRESTAMO	= ?,
								FECHA_DEVOLUCION  = ?
							WHERE id_prestamo = ?";
			$conn->prepare($sql)->execute(
			array(
				$objeto->dni,
				$objeto->isbn,
				$objeto->titulo, 
				$objeto->fecha_prestamo, 
				$objeto->fecha_devolucion,
				$objeto->id_prestamo
				) 
			);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	function selPrestamoID($id_prestamo) {
		global $conn;
		try {
			$sc = "Select * From prestamos Where ID_PRESTAMO = ?";
			$stm = $conn->prepare($sc);
			$stm->execute(array($id_prestamo));
			return ($stm->fetch(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}	
	}

	function encuentraTitulo($isbn) {
		global $conn;
		try {
			$sc = "Select TITULO From libros Where ISBN = ?";
			$stm = $conn->prepare($sc);
			$stm->execute(array($isbn));
			return ($stm->fetch(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}	
	}
	/*FIN FUNCIONES PARA EL CRUD DE PRESTAMOS*/

	/*FUNCIONES PARA EL CRUD DE NOTICIAS*/
	function listadoNoticias() {
		global $conn;
		try {
			$sc = "Select * From noticias Order By ID_NOTICIA";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}

	function insertarNoticia($objeto) {
		global $conn;
		try {
			$sql = "INSERT INTO noticias(TITULO_NOTICIA, CONTENIDO, FECHA_NOTICIA) VALUES (?, ?, ?)";	
			$conn->prepare($sql)->execute(
				array(
					$objeto->titulo_noticia,
					$objeto->contenido,
					$objeto->fecha_noticia
					)
				);
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function borrarNoticia($id_noticia){
		global $conn;
		try {
			$sql = "Delete From noticias Where ID_NOTICIA = ?";	
			$conn->prepare($sql)->execute(array($id_noticia));
			return true;
		} catch (Exception $e) {
				die($e->getMessage());
				return false;
		}
	}

	function modificarNoticia($objeto) {
		global $conn;
		try {
			$sql = "UPDATE noticias SET 
								TITULO_NOTICIA	= ?, 
								CONTENIDO	= ?,
								FECHA_NOTICIA  = ?
							WHERE id_noticia = ?";
			$conn->prepare($sql)->execute(
			array(
				$objeto->titulo_noticia, 
				$objeto->contenido, 
				$objeto->fecha_noticia,
				$objeto->id_noticia
				) 
			);
			return true;
		} catch (Exception $e) {
			die($e->getMessage());
			return false;
		}
	}

	function selNoticiaID($id_noticia) {
		global $conn;
		try {
			$sc = "Select * From noticias Where ID_NOTICIA = ?";
			$stm = $conn->prepare($sc);
			$stm->execute(array($id_noticia));
			return ($stm->fetch(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}	
	}

	function ultimaNoticia() {
		global $conn;
		try {
			$sc = "Select * From noticias Order By ID_NOTICIA DESC LIMIT 1";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
	/*FIN FUNCIONES PARA EL CRUD DE NOTICIAS*/

	/*FUNCIÓN PARA ESTADÍSTICAS GENERALES*/
	function recEstadisticas() {
		global $conn;
		try {

			$sc = "Select count(*) from libros";
			$stm = $conn->prepare($sc);
			$stm->execute();

			$sc = "Select count(*) from usuarios";
			$stm2 = $conn->prepare($sc);
			$stm2->execute();

			$sc = "Select count(*) from prestamos";
			$stm3 = $conn->prepare($sc);
			$stm3->execute();

			$sc = "Select count(*) from noticias";
			$stm4 = $conn->prepare($sc);
			$stm4->execute();

			$arraystm = array($stm->fetchAll(PDO::FETCH_ASSOC), $stm2->fetchAll(PDO::FETCH_ASSOC), $stm3->fetchAll(PDO::FETCH_ASSOC), $stm4->fetchAll(PDO::FETCH_ASSOC));

			return ($arraystm);

		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
	/*FIN FUNCIÓN PARA ESTADÍSTICAS GENERALES*/

	/*FUNCIÓN PARA ÚLTIMAS NOVEDADES*/
	function ultimasNovedades() {
		global $conn;
		try {
			$sc = "Select PORTADA, TITULO From libros Order By ID DESC LIMIT 6";
			$stm = $conn->prepare($sc);
			$stm->execute();
			return ($stm->fetchAll(PDO::FETCH_ASSOC));
		} catch(Exception $e) {
			die($e->getMessage());
		}
	}
	/*FIN FUNCIÓN ÚLTIMAS NOVEDADES*/

?>