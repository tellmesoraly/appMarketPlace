<?php 

require_once "../models/ArticulosModelo.php";

$_titulo = $_POST["titulo"];
$_precio = $_POST["precio"];
$_categoria = $_POST["categorias"];
$_estado = $_POST["estado"];
$_disponibilidad = $_POST["disponibilidadProducto"];
$_descripcion = $_POST["descripcion"];
$_imagen = $_FILES["imagen"];
$_idUsuario = $_POST["idUsuario"];



if ($_imagen["type"]=="image/jpg"	|| 
	$_imagen["type"] == "image/jpeg"||
	$_imagen["type"] == "image/png"	||
	$_imagen["type"] == "image/JPG"	||
	$_imagen["type"] == "image/PNG"	||
	$_imagen["type"] == "image/JPEG") {
	//moviendo un archivo de la ruta temporal a un directorio de mi proyecto 
	//1) Capturar en una variable la ruta temporal
	$rutaTemporal = $_imagen["tmp_name"];
	//2) Establecer una ruta y nombre de destino
	$nombreImagen = md5($_imagen["tmp_name"]);
	$rutaDestino = "../views/imagenesArticulos/".$nombreImagen.".jpg";

	 $resultado = move_uploaded_file($rutaTemporal, $rutaDestino);

	 if ($resultado==true) {
	 	//realizar la inserción
	 		$respuesta = ArticulosModelo::InsertarArticuloModelo($_titulo, $_precio, $_categoria, $_estado,$_disponibilidad, $_descripcion, $rutaDestino, $_idUsuario);
	 		if ($respuesta == true) {
	 			echo "Cool";
	 		} else {
 				unlink($rutaDestino);
	 			echo "error";
	 		}
	 } 	else {
		echo "errorSubida";
	}	
}  		else {
		echo "errorFormato";
	}

 ?>