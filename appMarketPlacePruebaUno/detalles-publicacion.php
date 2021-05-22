
<?php 
	require_once 'controllers/ArticulosController.php';
	require_once 'models/ArticulosModelo.php';

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <base href="views/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Detalles.</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" href="dist/css/estilos.css">
</head>
<body>
	<?php require_once 'views/barraNavegacion.php'; ?>

	<div class="container-xl mt-3">
		<div class="row mt-3">
			<?php 

				if(!isset($_GET["idArticulo"])) {

					
				} else {
					$idArticulo = $_GET ["idArticulo"];
					$mostrarDetalles = ArticulosController::mostrarDetalles($idArticulo);

					while ($filas = $mostrarDetalles->fetch_array()) {

						$disponibilidadArt = $filas[4]==1? "Disponible":"Agotado";

						/*if ($filas[6]== 1) {
							echo "Nuevo";
						} else if ($filas[6]==2){
							echo "Casi nuevo";
						} else if ($filas[6]==3){
							echo "En buen estado";
						} else if ($filas[6]==4) {
							echo "Aceptable";
						}*/

						echo '<div class="col-md-6">
										<img src="'.$filas[11].'" title="Naruto" id="imagenN">
									</div>

									<div class="col-md-6">

											<div class="titulos">
												<h3>'.$filas[1].'</h3>
												<h6>Fecha de publicación: '.$filas[2].'</h6>
												<h6>$'. number_format($filas[3], 0, ",",".").' </h6>
												<h6>'.$disponibilidadArt.'</h6>
											<div class="zzz">
												<h6>Categoria: '.$filas[5].'</h6>
												<h6 id="estado">Estado: '.$filas[6].'</h6>
											</div>
											<h6>Descripción: </h6>
												<p>'.$filas[7].'</p>
										</div>
										<hr>
											<div>
													<h5>Datos del vendedor: </h5>
														<div class="vendedor">
															<div class="imgV">
																<img id="imgVendedor" src="'.$filas[8].'" alt="">	
															</div>
																<div class="contacto">
																	<h6>'.$filas[9].'</h6>
																	<h6>'.$filas[10].'</h6>
																</div>
														</div>
											</div>
										<div class="mt-4">				
										<a href="../index.php" id="volverIndex" >Volver</a>
									</div>
								</div>
							</div>';
					}
				}

			 ?>

			
	</div>


	<?php require_once 'views/modales.php'; ?> <!-- CON ESTE REQUIRE, TENGO TODOS LOS ARCHIVOS DE LOS MODALES, ENTONCES SIN ESTO, LOS MODALES NO ME ABRIRÍAN, OJO PELAO AHÍ -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script type="text/javascript" src="dist/js/login.js"></script> <!-- archivo para que el usuario se pueda logear -->
        <script type="text/javascript" src="dist/js/registrarUsuario.js"></script>

</body>
</html>