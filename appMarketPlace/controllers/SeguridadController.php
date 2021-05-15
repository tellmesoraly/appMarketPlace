<?php 
	session_start();

	if ($_SESSION["autenticado"] != true) { //Como autenticado es distinto de verdadero, entonces se ejecuta que lo redireccione a la página principal, juju

		echo '<script> window.location.href = "index.php" </script>';
	}

 ?>

 <!-- Puedo requerir este documento en los archivos que quiera proteger, cuando un usuario no logeado, no se registre o inicie sesión, entonces automáticamente lo redirigirá a la página principal  -->