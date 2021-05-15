<?php 

	require_once 'Conexion.php';

	class UsuariosModelo {

		static public function loginUsuariosModel($usuario, $password) {

			$conexion = Conexion::conectar();
			$passwordEncriptada = MD5($password);
			$sql = " SELECT * FROM usuarios WHERE correoUsuario = '$usuario' AND passwordUsuario = '$passwordEncriptada' ";

			$result = $conexion->query($sql);
 			return $result;
		}
	}