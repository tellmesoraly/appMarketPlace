<!DOCTYPE html>
<html lang="en">
<head>
  <base href="views/">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MarketPlace - Compra y vende.</title>
	<link rel="stylesheet" href="dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" href="dist/css/estilos.css">
</head>
<body> 

  <?php 
    session_start();
    require_once 'barraNavegacion.php';

   ?>

	<div class="container-xl">
  		<div class="row">
  			<div class="col-lg-3 p-4"> <!-- Todo esto es lo nuevo en el div que ocupa 3 columnas de 12 -->
  				<form id="formBuscar">
  					<input type="search" placeholder="Ej: Bicicletas, Aro, Teclado..." name="palabraClave" class="form-control" required>
  					<div class="d-grid mt-2">
  						<button type="submit" id ="btnBuscar"class="btn" ><i class="fas fa-search"></i> Buscar</button>
  					</div>
  				</form>
           <hr>
          <form id="formFiltros">
            <select name="categorias" class ="form-select" required>
              <option value="">--Seleccionar categorías--</option>
              <?php 
                    
                    $resultado = CategoriasController::listarCategoriasCtl();
                    while ($fila = $resultado->fetch_assoc()) {
                   echo '<option value="'.$fila["idCategoria"].'">'  . $fila["nombreCategoria"] .  '</option>';
                    }    
                    ?>
            </select>
            <select name="order" class="form-select mt-2" required>
              <option value="asc">Ordenar de menor precio</option>
              <option value="desc">Ordenar de mayor precio</option>
            </select>
            <div class="d-grid mt-2">
              <button type="submit" id ="btnBuscar"class="btn" ><i class="fas fa-search"></i> Buscar</button>
            </div>
          </form>
  			</div> <!-- hasta aquí -->

  			<div class="col-lg-9">
  				<div class="row p-2"> <!-- Si agrego más articulos desde la base de datos, se cargan hacia abajo, no se vuelve un chechere -->

            <?php 

              if (isset ($_GET["categorias"])) {

                /*Mostrandito los artículos por categorías y order (ascendente o descendente)*/

                $idCategoria = $_GET ["categorias"];
                $order = $_GET["order"];
                $articulos = ArticulosController::listarArticulosPorCategoria($idCategoria, $order);
              } else if (isset ($_GET["palabraClave"])){

                    /*mostrando los articulos que busquen por palabraclave, letra, etc*/
                  $palabraClave = $_GET ["palabraClave"];
                  $articulos = ArticulosController:: listaArticulosPorPalabraClave($palabraClave);

              } else {
                /*aquí está mostrando los articulos*/
                   $articulos = ArticulosController::listarArticulosCtl();
              }
                /*aquí pregunta si $articulos tiene filas, si no es así, muestra un mensajito*/
               if ($articulos->num_rows == 0) {
                echo '<div class="alert alert-info" role="alert">
                        No se encontraron resultados.
                            </div>';
               } else {
                  /*if-else para preguntar sobre si existen los parámetros de categorias o palabraClave, para mostrar distintos mensajes, depende de lo que haga el usuario*/
                if (isset($_GET["categorias"]) || isset($_GET["palabraClave"]) ) {
              echo '<div class="alert alert-info" role="alert">
              Se encontraron ' . $articulos->num_rows . ' resultados para esta búsqueda
              </div>';
              } else {
              echo '<div class="alert alert-info" role="alert">
               Listando los ' . $articulos->num_rows . ' artículos publicados hoy.
              </div>';
              }
              /*muestra los artículos de manera dinámica desde la base de datos*/ /*$articulos = ArticulosController::listarArticulosCtl(); con esta mierda, funciona el while ok*/

                while ($fila = $articulos->fetch_array()) {
                 $disponibilidad = ($fila[3] == 1)? "Disponible":"Agotado";
                 $clase= ($fila[3] ==1)? "disponible":"agotado"; //en minúscula, como el nombre de la clase en la stylesheet
                echo '<div class="d-flex col-12 col-lg-3 col-md-6 g-2">
              <div class="card">
              <div class= "disponibilidadArticulo '. $clase .' ">'. $disponibilidad.' </div>
                <img src="'.$fila[4].'" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title">'.$fila[1].'</h5>
                    <p class="card-text text-truncate mb-0">'.$fila[6].'</p>
                    <p mb-0> $'. number_format($fila[2], 0, ",",".") .'</p>
                    <p mb-0> '. $fila[5] .' </p>
                    <div class="d-grid">
                      <a href="#" id ="verDetalles"class="btn">Ver detalles</a>
                     </div>
                     
                    </div>
                    </div>
                    </div> ';
               }

               }
             ?>
  				</div>
  			</div>	
  		</div>
  	</div>


<?php require 'modales.php'; ?>

        <script type="text/javascript" src="dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="dist/js/login.js"></script> <!-- archivo para que el usuario se pueda logear -->
</body>
</html>