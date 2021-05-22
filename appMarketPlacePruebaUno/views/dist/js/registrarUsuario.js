let formularioRegistroUsuario = document.getElementById('formularioRegistrarse')

formularioRegistroUsuario.addEventListener('submit', registrarUsuario)

function registrarUsuario (e) {

	e.preventDefault()
	let datos = new FormData(formularioRegistroUsuario)

	fetch('../controllers/registrarUsuarioController.php' , {

		method : 'POST',

		body : datos

	})
	.then(respuesta=>respuesta.text())
	.then(a => {

		switch (a) {
			case "Correo existente":
				Swal.fire({
			 	 icon: 'error',
			 	 title: 'Oops...',
			 	 text: 'Este correo ya existe, vuelva a intentar',
			 	 showConfirmButton: true
			})
			break;
			case "Usuario registrado":
				Swal.fire({
				  icon: 'success',
				  title: 'Felicidades',
				  text: 'Usuario registrado con éxito',
				  showConfirmButton: false,
				  timer: 3000
				})
				setTimeout(function() { window.location.reload()}, 1000)
				break;
			/*case "Seleccion correctamente la imagen":
				Swal.fire({
			  icon: 'error',
			  title: 'Oops...',
			  text: 'Error al subir la imagen',
			  showConfirmButton: true
			})
			break;*/
			default:
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Error, formato de imagen invalido',
				  showConfirmButton: true
				})
				break;
		}

	})
}