
let formuIniciarSesion = document.getElementById('formularioInicioSesion')

formuIniciarSesion.addEventListener('submit', iniciarSesion)

function iniciarSesion (e) {
	
	e.preventDefault()
	let datos = new FormData(formuIniciarSesion)

	fetch('../controllers/LoginController.php' , {

		method : 'POST',

		body : datos

	})
	.then(respuesta => respuesta.text())
	.then(loQueSea => {

		console.log(loQueSea)
		if (loQueSea == "oka") {

			window.location.reload()

		} else {
			
			let mensaje = document.getElementById('titulo')
			mensaje.innerText  = 'Intente de nuevo'
			mensaje.classList.add('text-danger')
		} 
		
	})
	
} 

