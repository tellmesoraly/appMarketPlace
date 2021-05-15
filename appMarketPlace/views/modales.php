<!-- Modal -->

 <!-- ACÁ EMPIEZA LA MODAL DE LOGIN -->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titulo">Iniciar sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            
            <form id="formularioInicioSesion" >
               <div class="mb-3">
                <label for="usuarioCorreo" class="form-label">Correo electrónico</label>
                <input type="email" name ="usuarioCorreo" class="form-control" id="usuarioCorreo" aria-describedby="emailHelp" required>
                  </div>
                  <div class="mb-3">
                    <label for="usuarioContraseña" class="form-label">Contraseña</label>
                    <input type="password" name="usuarioContraseña" class="form-control" id="usuarioContraseña" required>
                  </div>
                      <div class="d-grid d-flex justify-content-md-end">
                        <button type="submit" id ="btnIngresarModal"class="btn">Ingresar</button>
                      </div>
                </form>
      </div>
    </div>
  </div>
</div>
<!-- ACÁ TERMINA LA MODAL LOGIN -->


<!-- ACÁ COMIENZA LA MODAL PARA CREAR PUBLICACIONES NUEVAS -->

<div class="modal fade" id="modalCrearPublicaciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear nueva publicación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formularioInsertarArticulo">

            <div class="row">
              <div class="col-md-9">
                <input type="text" class="form-control" placeholder="Título" name="titulo"required>
              </div>
              <div class="col-md-3">
                <input type="number" class="form-control" placeholder="Precio" name="precio">
              </div>
            </div>

            <div class="row mt-3">
              <div class="col-md-4">
                <select name="categorias" class ="form-select" required>
                  <option value="">--Seleccionar categorías--</option>
                    <?php 
                    
                      $resultado = CategoriasController::listarCategoriasCtl();
                        while ($fila = $resultado->fetch_assoc()) {
                        echo '<option value="'.$fila["idCategoria"].'">'  . $fila["nombreCategoria"] .  '</option>';
                        }    
                    ?>
            </select>
              </div>
              <div class="col-md-4">
                <select name="estado" class="form-select" required="">
                  <option value="">Seleccionar estado</option>
                  <option value="1">Nuevo</option>
                  <option value="2">Casi nuevo</option>
                  <option value="3">En buen estado</option>
                  <option value="4">Aceptable</option>
                </select>
              </div>
              <div class="col-md-4">
                <select name="disponibilidadProducto" class="form-select" required="">
                  <option value="1">Disponible</option>
                  <option value="0">Agotado</option>
                </select>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <textarea name="descripcion" rows="5" class="form-control" placeholder="Descripción del artículo"required ></textarea>
              </div>
              <div class="col-12 mt-2">
                <label for="formFile" class="form-label">Seleccionar archivo (Archivos sólo JPG, PNG, JPEG)</label>
                <input class="form-control" type="file" id="formFile">
              </div>  
            </div>
            <div class="row mt-2">
              <div class="col-12 d-grid">
                <button type="submit" id="btnCrearArticulo" class="btn"> Guardar artículo</button>
              </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- ACÁ TERMINA LA MODAL DEL CREAR PUBLICACIONES -->


<!-- ACÁ EMPIEZA LA MODAL DE REGISTRAR USUARIO -->

<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrarse</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formularioRegistrarse">
           <div class="row">
             <div class="col-md-6">
                <label for="nombreUsuarioRegistrar" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreUsuarioRegistrar" name="nombreUsuarioRegistrar" required>
              </div>
              <div class="col-md-6">
                <label for="apellidoUsuarioRegistrar" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellidoUsuarioRegistrar" name="apellidoUsuarioRegistrar"required>
              </div>
           </div> 
           <div class="row mt-3">
              <div class="col-md-12">
                <label for="emailUsuarioRegistrar" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="emailUsuarioRegistrar" name="emailUsuarioRegistrar" placeholder="example@example.com" required>
              </div>
           </div>
           <div class="row mt-3">
             <div class="col-md-12">
               <label for="inputPassword4" class="form-label">Contraseña</label>
               <input type="password" class="form-control" id="inputPassword4" required>
               <div id="mensajePassword" class="form-text">Su contraseña debe tener entre 8 y 20 caracteres, contener letras y números, y no debe contener espacios, caracteres especiales ni emoji.</div>
             </div>   
           </div>
           <div class="row mt-3">
             <div class="col-12">
                <label for="imgUsuarioRegistrar" class="form-label">Insertar una imagen (Archivos sólo JPG, PNG, JPEG)</label>
                <input class="form-control" type="file" id="imgUsuarioRegistrar" name="" required>
            </div>  
           </div>
           <div class="row mt-3">
             <div class="col-md-12">
                <label for="ciudadUsuarioRegistrar" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudadUsuarioRegistrar" name="ciudadUsuarioRegistrar"required>
             </div>
           </div>
           <div class="row mt-4">
              <div class="col-md-12 d-grid mx-auto">
                  <button type="submit" id ="btnRegistrarModal"class="btn">Registrarse</button>
              </div>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>