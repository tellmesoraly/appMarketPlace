<?php 
require_once '../models/UsuariosModelo.php';

$usuario = $_POST["usuarioCorreo"];
$password = $_POST["usuarioContraseña"];


$resultado = UsuariosModelo::loginUsuariosModel($usuario, $password);

if ($resultado->num_rows == 1) {
	$fila = $resultado->fetch_assoc();
	//Iniciando sesión
	session_start();
	//esta variable global va después del método para iniciar sesión, contiene la información del usuario, nombre y apellido.
	//Cuando inicie sesión, se reemplazará el botón de iniciar sesión y registrarse con la información del usuario.
	$_SESSION["nombreCompleto"] = $fila["nombreUsuario"] ." ". $fila["apellidoUsuario"]; 
	$_SESSION["autenticado"] = true; //variable global inicializada para que valide si el usuario o no está logeado, si no se ha logeado, existe, si se logeó, no existe, entonces ejecuta "SeguridadController"
	$_SESSION["idUsuario"] = $fila["idUsuario"];
	print 'oka';
} else {
	echo 'Datos incorrectos';
}
 ?>
