	<nav class="navbar navbar-expand-lg navbar-dark">
 	 <div class="container-xl">
    <a class="navbar-brand" href="../index.php">Compra y venda pues hp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
   		 <div id="btnsHome">

        <?php 
        /*Mostrando el nombre y apellido del usuario mediante cuando inicie sesión*/
             //session_start();
            if (isset($_SESSION ["nombreCompleto"])) {
              /*quita los botones de ingresar y registrarse, reemplazándolo por el nombre y apellido del usuario*/
              echo '<div class="dropdown">
                      <button id="btnMenuDesplegable"class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i> '.$_SESSION ["nombreCompleto"].'
                      </button> 
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="#"><i class="far fa-user"></i> Mi perfil</a></li>
                        <li><a class="dropdown-item" href="../mis_publicaciones.php"><i class="fas fa-images"></i> Mis publicaciones</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-shopping-cart"></i> Mi carrito</a></li>
                        <li><a class="dropdown-item" href="../controllers/CerrarSesion.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a></li>
                      </ul>
                    </div>';
                    /*Se añadió el $_SESSION entre la etiqueta button, porque es el título del menú desplegable, en éste, va el nombre y apellido del usuario*/
            } else {
              /*si el usuario no se ha logeado, por ende no existe la variable de session, entonces cargan los botones normalmente*/
            echo '<button id="btnIngresar"class="btn" data-bs-toggle="modal" data-bs-target="#ModalLogin">
                   <i class="fas fa-sign-in-alt"></i> Ingresar</button>
               <button id="btnRegistrar" data-bs-toggle="modal" data-bs-target="#modalRegistrar" class="btn">
               <i class="fas fa-user-plus"></i> Registrarse</button>';
            }
         ?>
  		
  		</div>
  	</div>
	</div>
	</nav>