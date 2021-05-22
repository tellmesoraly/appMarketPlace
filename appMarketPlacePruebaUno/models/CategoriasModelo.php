<?php 

require_once 'Conexion.php';

class CategoriasModelo {

	static public function listarCategoriasModel () {
		$conexion = Conexion::conectar (); //deben estar asi pegaditas, si no, no funciona oyó
		$sql = "SELECT * FROM categorias";
		$resultado = $conexion->query($sql); //todo pegadito x2
		return $resultado;
	}
}