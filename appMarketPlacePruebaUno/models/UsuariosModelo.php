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

		static public function registrarUsuarioNuevo($usuarioR, $apellidoR, $emailR, $passwordR, $rutaDestino, $ciudadR) {
			$conexion = Conexion::conectar();
			$passwordEncriptada = MD5($passwordR);
			$sql = "INSERT INTO usuarios  VALUES (NULL, '$usuarioR' ,'$apellidoR', '$emailR','$passwordEncriptada','$rutaDestino', '$ciudadR')";
			$result = $conexion->query($sql);
 			return $result;
		}

		static public function UsuarioExistente($emailR) {

			$conexion = Conexion::conectar();
			$sql = "SELECT * FROM usuarios WHERE correoUsuario ='$emailR'";
			$result = $conexion->query($sql);
 			return $result;
		}

	}