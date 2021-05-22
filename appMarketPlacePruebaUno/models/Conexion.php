<?php  

require_once 'config.php';

class Conexion {

	static public function conectar () {
		$cn = new mysqli(SERVER, USER, PASS, DB);
		return $cn;
	}
}