<?php 
 require_once 'Conexion.php';

 class ArticulosModelo { 
 
 	static public function listarArticulosModel () {

 		$conexion = Conexion::conectar();
 		$sql = "SELECT a.idArticulo, a.tituloArticulo, a.precioArticulo, a.disponibilidadArticulo, a.imgArticulo, c.nombreCategoria, a.descripcionArticulo

			FROM articulos a 

			INNER JOIN categorias c

			ON a.idCategoria = c.idCategoria

			ORDER BY a.fechaPublicacionArticulo DESC
			";
 		$resultado = $conexion->query($sql);
 		return $resultado;
 	}

 	static public function listarArticulosPorCategoriaModel ($idCategoria, $order) {

 		$conexion = Conexion::conectar();
 		$sql = "SELECT a.idArticulo, a.tituloArticulo, a.precioArticulo, a.disponibilidadArticulo, a.imgArticulo, c.nombreCategoria, a.descripcionArticulo

			FROM articulos a 

			INNER JOIN categorias c

			ON a.idCategoria = c.idCategoria

			WHERE a.idCategoria = $idCategoria 

			ORDER BY a.precioArticulo $order
			";
 		$resultado = $conexion->query($sql);
 		return $resultado;
 	}

 	static public function listarArticulosPorPalabraClaveModel($palabraClave) {

 		$conexion = Conexion::conectar();
 		$sql = "SELECT a.idArticulo, a.tituloArticulo, a.precioArticulo, a.disponibilidadArticulo, a.imgArticulo, c.nombreCategoria, a.descripcionArticulo

			FROM articulos a 

			INNER JOIN categorias c

			ON a.idCategoria = c.idCategoria

			WHERE a.tituloArticulo LIKE '%$palabraClave%'
			";
 		$resultado = $conexion->query($sql);
 		return $resultado;
 	}

 	static public function listarArticulosPorUsuarioModel($idUsuario) {

 		$conexion = Conexion::conectar();
 		$sql = "SELECT a.idArticulo, a.tituloArticulo, a.precioArticulo, a.disponibilidadArticulo, c.nombreCategoria
			FROM articulos a 
			INNER JOIN categorias c
			ON a.idCategoria = c.idCategoria
			WHERE a.idUsuario = $idUsuario
			";
 		$resultado = $conexion->query($sql);
 		return $resultado;
	}

	static public function InsertarArticuloModelo($_titulo, $_precio, $_categoria, $_estado,$_disponibilidad, $_descripcion, $rutaDestino, $_idUsuario) {

		$conexion = Conexion::conectar();
 		$sql = "INSERT INTO articulos VALUES (null, '$_titulo', $_precio, $_estado, $_disponibilidad, '$_descripcion', NOW(), $_idUsuario, $_categoria, '$rutaDestino') 
			";
 		$resultado = $conexion->query($sql);
 		return $resultado;
	}

	static public function mostrarDetallesModel ($idArticulo) {

		$conexion = Conexion::conectar();
		$sql = "SELECT a.idArticulo, a.tituloArticulo, a.fechaPublicacionArticulo, a.precioArticulo, a.disponibilidadArticulo, c.nombreCategoria, a.estadoArticulo, a.descripcionArticulo, u.imgUsuario, CONCAT(u.nombreUsuario,' ', u.apellidoUsuario) as Datos, u.correoUsuario, a.imgArticulo
			FROM articulos a
			INNER JOIN categorias c
			ON a.idCategoria = c.idCategoria
			INNER JOIN usuarios u
			ON a.idUsuario = u.idUsuario
			WHERE a.idArticulo = $idArticulo";
		$resultado = $conexion->query($sql);
 		return $resultado;
	}
 }