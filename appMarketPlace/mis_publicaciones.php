
<?php 
	require_once "controllers/SeguridadController.php";
	require_once "controllers/ArticulosController.php";
	require_once "models/ArticulosModelo.php";
	require_once "controllers/CategoriasController.php";
	require_once "models/CategoriasModelo.php";
	


 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <base href="views/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mis publicaciones.</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" href="dist/css/estilos.css">
</head>
<body>

<?php require_once 'views/barraNavegacion.php'; ?>

<div class="container-xl mt-3">
	
	<div class="row">
			<div class="col-md-6">
				<h1>Publicaciones</h1>
			</div>

			<div class="col-md-6 d-flex justify-content-end">
				<div>
					<button id="btnCrearPublicacion"class="btn" data-bs-toggle="modal" data-bs-target="#modalCrearPublicaciones">
						<i class="fas fa-plus-circle"></i> 
						Crear nueva publicación
					</button>
				</div>
			</div>
	</div>
	<div class="row">
		
			<table class="table">
				<thead> <!-- Cabecera de la tabla -->
					<tr> <!-- títulos de las filas -->
						<th>ID</th>
						<th>Título</th>
						<th>Precio</th>
						<th>Disponibilidad</th>
						<th>Categoria</th>
						<th>Acciones</th> <!-- Aquí van botones, eliminar o editar -->
					</tr>
				</thead>
				<tbody>
						<?php 

						/*mostrando los resultados de las publicaciones del usuario dentro de la tabla*/
							$articulos = ArticulosController::listarArticulosPorUsuario($_SESSION["idUsuario"]);
							while ($fila=$articulos->fetch_array()) {

								echo '<tr>
										<td>'.$fila[0].'</td>
										<td>'.$fila[1].'</td>
										<td>'.$fila[2].'</td>
										<td>'.$fila[3].'</td>
										<td>'.$fila[4].'</td>
										<td>
											<button class="btn btn-primary">Editar</button>
											<button class="btn btn-danger">Eliminar</button>
										</td>
									</tr>';
							} 

						 ?>
					
				</tbody>
			</table>
	</div>
	<hr>

</div>



	<?php require 'views/modales.php'; ?> <!-- CON ESTE REQUIRE, TENGO TODOS LOS ARCHIVOS DE LOS MODALES, ENTONCES SIN ESTO, LOS MODALES NO ME ABRIRÍAN, OJO PELAO AHÍ -->
	<script src="dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

