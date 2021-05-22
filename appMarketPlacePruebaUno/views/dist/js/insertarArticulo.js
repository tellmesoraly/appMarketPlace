let formularioInsertar = document.getElementById('formularioInsertarArticulo')

formularioInsertar.addEventListener('submit', InsertarArticulo)

function InsertarArticulo(e){

	e.preventDefault()

	let datos = new FormData(formularioInsertar)

	fetch('../controllers/insertarArticuloController.php', {
		method:'POST',
		body:datos
	})
	.then(respuesta=> respuesta.text())
	.then(contenido => {

		switch (contenido) {
			case "Cool":
				Swal.fire({
				  icon: 'success',
				  title: 'Felicidades',
				  text: 'Su publicación fue publicada con éxito',
				  showConfirmButton: false,
				  timer: 2000
				})
				setTimeout( function () { window.location.reload()}, 1000)
				break;
			case "errorFormato":
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Hubo un error, verifique el formato de imagen.',
				  showConfirmButton: true
				})
				break;
			default:
				Swal.fire({
				  icon: 'error',
				  title: 'Oops...',
				  text: 'Ocurrió un error, intente nuevamente',
				  showConfirmButton: true
				})
				break;
		}

	})

}