<?php
require_once  "setup/conexion.php";
$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : 'home';
if (isset($_GET['buscar'])) {$seccion = 'buscar'; }
require_once 'Layouts/header.php';
require_once 'Layouts/menu.php';
?>
<!-- Zona de post -->
<main>
	<!-- Templanes Para cargar contedino de l pagina segun lo que mande por get -->
	<?php
	switch ($seccion):
		case 'home':
			include('contenidos/home.php');
			break;
		case 'categoria':
			include('contenidos/categoria.php');
			break;
		case 'registro':
			include('contenidos/registro.php');
			break;
		case 'categorias':
			include('contenidos/categorias.php');
			break;
		case 'contacto':
			include('contenidos/contacto.php');
			break;
		case 'leer':
			include('contenidos/leer.php');
			break;
		case 'perfil':
			include('contenidos/perfil.php');
			break;
		case 'recuperar':
			include('contenidos/recuperar.php');
			break;
		case 'static':
			include('contenidos/static.php');
			break;
		case 'gracias':
			include('contenidos/gracias.php');
			break;
		case 'buscar':
			include('contenidos/busqueda.php');
			break;
		case 'error':
			include('contenidos/error.php');
		break;
		default:
			echo "<p class='error'>La seccion $seccion no exite</p>";
			include('contenidos/home.php');
			break;
	endswitch;
	?>
</main>
<!-- Aside -->
<aside>
	<!-- Buscador -->
	<form action="index.php?seccion=home" method="get">

		<h2>Buscador</h2>
		<div><input type="search" id="buscar" name="buscar" autocomplete="off" oninput="buscar_ajax()" /></div>
		<ul id="r1"></ul>
		<div><input type="submit" value="buscar" /></div>
	</form>
	<script>
		function buscar_ajax() {
			document.querySelector("#r1").innerHTML = '';
			let valor = document.getElementById("buscar").value;
			if (valor.length < 4) {
				return false;
			}
			const ajax1 = new XMLHttpRequest();
			ajax1.open('POST', 'Forms/buscar_ajax.php', true);
			ajax1.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			ajax1.send('buscar=' + valor);
			console.log(valor);

			ajax1.onreadystatechange = function() {
				if (ajax1.readyState == 4 && ajax1.status == 200) {

					// Tranformar el JSON a OBJETO
					var json = JSON.parse(ajax1.responseText);
					console.log(json);
					json.forEach(item => {
						var str = "<li>";
						str += `<a href='index.php?seccion=leer&id=${item.ID}'>`;
						str += item.TITULO;
						str += "</a>";
						str += "</li>";

						document.querySelector("#r1").innerHTML += str;

					});


				}
			}

		}
	</script>

	<!-- esto se muestra si el usuario no está logueado -->
	<?php if (!isset($_SESSION['NIVEL'])) : ?>
		<form action="Forms/login.php" method="post">
			<h2>Login</h2>
			<?php if (isset($_SESSION['login'])) {

				$error = $_SESSION['login'] == 'banneado' ? 'Tu cuenta esta suspendida' : 'Nombre O Contraseña incorrectas';

				echo '<p class="error">' . $error . '</p>';
				unset($_SESSION['login']);
			} ?>
			<div><input type="text" placeholder="usuario" name="usuario" id="usuario" /></div>
			<div><input type="password" placeholder="clave" name="clave" id="clave" /></div>
			<div class="center"><a href="/Blog-php/registro">Registro</a><a href="index.php?seccion=recuperar">Olvidé mi contraseña</a></div>
			<div><input type="submit" value="Ingresar" /></div>
		</form>
		<!-- esto se muestra si el usuario está logueado -->
	<?php else : ?>
		<div>
			<h2><?= $_SESSION['NOMBRE_USUARIO'] ?></h2>
			<img src="uploads/avatar-large/<?= $_SESSION['AVATAR'] ?>" alt="Avatar de Nombre usuario" />
			<div class="center">
				<a href="index.php?seccion=perfil">Editar perfil</a>
				<a href="forms/logaut.php">Cerrar sesión</a>
			</div>
		</div>

	<?php endif; ?>
</aside>
<!-- Footer -->
<footer>
	<div>
		<h2>About</h2>
		<img src="recursos/img/who_we_are.jpg" alt="Aida y Germán" />
		<ul>
			<li>Copyright &copy; 2018, Germán Rodríguez &amp;&amp; Aida Cortés</li>
			<li>Todos los derechos reservados BloomIT</li>
			<?php
			$carpeta = opendir('extras/textos/institucional');

			while ($file = readdir($carpeta)) :
				if ($file == '.' || $file == '..') :
					continue;

				endif;
				$nombre_archivo = pathinfo($file, PATHINFO_FILENAME);
			?>

				<li><a href="index.php?seccion=static&cual=<?= $nombre_archivo ?>"> <?= $nombre_archivo ?> </a></li>

			<?php endwhile; ?>
		</ul>
	</div>
	<div>
		<h2>Links Utiles</h2>
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="index.php?seccion=categorias">Categorias</a></li>
			<li><a href="index.php?seccion=contacto">Contacto</a></li>
			<li><span>Social</span>
				<ul>
					<li><a href="https://www.facebook.com/user">Facebook</a></li>
					<li><a href="https://www.twitter.com/user">Twitter</a></li>
					<li><a href="https://www.instagram.com/user">Instagram</a></li>
				</ul>
			</li>
		</ul>
	</div>
</footer>
</body>

</html>