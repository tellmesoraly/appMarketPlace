<?php 

require_once '../models/UsuariosModelo.php';

$usuarioR = $_POST["nombreUsuarioRegistrar"];
$apellidoR = $_POST["apellidoUsuarioRegistrar"];
$emailR = $_POST ["emailUsuarioRegistrar"];
$passwordR= $_POST ["passwordUsuarioRegistrar"];
$imagenR = $_FILES ["imagenUsuario"];
$ciudadR = $_POST ["ciudadUsuarioRegistrar"];

if ($imagenR["type"]=="image/jpg"	|| 
	$imagenR["type"] == "image/jpeg"||
	$imagenR["type"] == "image/png"	||
	$imagenR["type"] == "image/JPG"	||
	$imagenR["type"] == "image/PNG"	||
	$imagenR["type"] == "image/JPEG") {

	//Ruta temporal de la imagen
	$rutaTemporal = $imagenR ["tmp_name"];
	//Asignación de la encriptación de la imagen del usuario
	$nombreImagenUsuario = MD5($imagenR ["tmp_name"]);

	$rutaDestino = "../views/imagenesUsuarios/".$nombreImagenUsuario.".jpg";
	$respuestaImagen = move_uploaded_file($rutaTemporal, $rutaDestino);
	
	

if ($respuestaImagen){

	$consultar = UsuariosModelo::UsuarioExistente($emailR);

	if ($consultar->num_rows == 1) {
		unlink($rutaDestino);
		print ("Correo existente");

	} else {
		
		$result = UsuariosModelo::registrarUsuarioNuevo($usuarioR, $apellidoR, $emailR, $passwordR, $rutaDestino, $ciudadR);
		if ($result==true){
		print ("Usuario registrado");
		} else {
			print("error");
		}
} 

} else {
	echo "error, se estresó";
}

} else {

	print ("Seleccione correctamente la imagen");
}
	

?>