<h1>Registrate</h1>
<p class="info">Completa el siguiente formulario para crear tu cuenta en este blog</p>
<form action="Forms/registro.php" method="POST">
	<div><span>Tu Email </span><input type="email" name="email" id="email" onblur="validar_email()"></div>

	<div><span>Tu Clave </span><input type="password" name="password"></div>
	<div><input class="aligned" type="submit" value="Registro" id="btn" /><span id="r"></span></div>
</form>

<script>
	function validar_email() {

		// Obtener el email que se esta escribiendo
		const email = document.getElementById("email").value;
		console.log(email);

		// crear mi objeto de ajax para mandar selos a php 
		const ajax = new XMLHttpRequest();
		ajax.open('POST', 'Forms/validar_email.php', true);
		ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		ajax.send("email=" + email);

		ajax.onreadystatechange = function() {

			if (ajax.readyState == 4 && ajax.status == 200) {

				// Obtengo mis objetos 
				let rta = ajax.responseText;
				let btn = document.querySelector("#btn");
				let divResp = document.querySelector("#r");

				// Validasmos si php encontro o el email que encontro el usurio
				if (rta == 'ok') {

					btn.disabled = false;
					divResp.innerHTML = '';

				} else {
					// Si la propiedad disable esta en true el boton no se podra dar click
					btn.disabled = true;
					divResp.innerHTML = 'El usuario ya exite';
				}

			}

		}





	}
</script>