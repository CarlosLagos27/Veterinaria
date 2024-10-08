<?php
include_once('include/config.php');
if (isset($_POST['submit'])) {
	$fname = $_POST['full_name'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$query = mysqli_query($con, "insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
	if ($query) {
		header('location:user-login.php');
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Registrarse</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />

	<script src="https://kit.fontawesome.com/94b15666b0.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<script type="text/javascript">
		function valid() {
			if (document.registration.password.value != document.registration.password_again.value) {
				alert("Los campos contraseña y confirmar contraseña no coinciden. Verifica e intenta de nuevo");
				document.registration.password_again.focus();
				return false;
			}
			return true;
		}
	</script>


</head>

<body style="font-family:Poppins; background: url(../images/veterinaria.jpg) no-repeat;">
	<!-- start: REGISTRATION -->

	<span class="border border-top-0" style="border: turquoise;"></span>
	<nav class="navbar navbar-expand-lg bg-body-tertiary border-top" style="background-color:rgb(248, 247, 247)">
		<div class="container-fluid">
			<a href="index.html" style="font-size: 30px;color: blue;font-weight: 600;" class="navbar-brand" href="#">VETCOR</a>
			<button class="navbar-toggler fa-solid fa-bars" style="color: #0ad006;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="../index.html">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../pages/about.html">Sobre nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../contact.php">Contacto</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Iniciar sesión
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../hms/user-login.php">Usuario</a></li>
							<li><a class="dropdown-item" href="../hms/doctor/">Médico veterinario</a></li>
							<li><a class="dropdown-item" href="../hms/admin/">Administrador</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="../hms/registration.php">¡crear una cuenta!</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="row">
		<div class="main-login col-xs-7 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-80">
				<a href="../index.html">
					<h2 class="text-align-center" style="font-weight: 600;color:dodgerblue;">Registrar usuarios</h2>
				</a>
			</div>
			<!-- start: REGISTER BOX -->
			<div class="box-register">
				<form name="registration" id="registration" method="post" onSubmit="return valid();">
					<fieldset>
						<p class="margin-top-30">
							Introduzca sus datos personales a continuación:
						</p>
						<div class="form-group">
							<input type="text" class="form-control" name="full_name" placeholder="Nombres y Apellidos" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="address" placeholder="Dirección" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" name="city" placeholder="Ciudad" required>
						</div>
						<div class="form-group">
							<label class="block">
								Sexo
							</label>
							<div class="clip-radio radio-primary">
								<input type="radio" id="rg-female" name="gender" value="female">
								<label for="rg-female">
									Femenino
								</label>
								<input type="radio" id="rg-male" name="gender" value="male">
								<label for="rg-male">
									Masculino
								</label>
							</div>
						</div>
						<p>
							Introduzca los datos de su cuenta:
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" placeholder="Correo" required>
								<i class="fa fa-envelope"></i> </span>
							<span id="user-availability-status1" style="font-size:12px;"></span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña de 7 carácteres" required>
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password_again" name="password_again" placeholder="Ingrese la contraseña nuevamente" required>
								<i class="fa fa-lock"></i> </span>
						</div>
						<div class="form-group">
							<div class="checkbox clip-check check-primary">
								<input type="checkbox" id="agree" value="agree" checked="true" readonly=" true">
								<label for="agree">
									Estoy de acuerdo
								</label>
							</div>
						</div>
						<div class="form-actions">
							<p>
								¿Ya tienes una cuenta?
								<a href="user-login.php">
									Iniciar sesión
								</a>
							</p>
							<button type="submit" class="btn btn-primary pull-right" id="continuarBtn" name="submit">
								Continuar <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <span class="current-year"></span><span class="text-bold text-uppercase">VETCOR</span>. <span>Todos los derechos reservadoss</span>
				</div>

			</div>

		</div>
	</div>

	<footer class="text-center bg-body-tertiary">
		<!-- Grid container -->
		<div class="container pt-4">
			<!-- Section: Social media -->
			<section class="mb-4">
				<!-- Facebook -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-facebook-f"></i></a>

				<!-- Twitter -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-twitter"></i></a>

				<!-- Google -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-google"></i></a>

				<!-- Instagram -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-instagram"></i></a>

				<!-- Linkedin -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-linkedin"></i></a>
				<!-- Github -->
				<a data-mdb-ripple-init class="btn btn-link btn-floating btn-lg text-body m-1" href="#!" role="button" data-mdb-ripple-color="dark"><i class="fab fa-github"></i></a>
			</section>
			<!-- Section: Social media -->
		</div>
		<!-- Grid container -->

		<!-- Copyright -->
		<a class="text-body" href="../index.html">Inicio</a>
		<a class="text-body" href="../contact.php">Contacto</a>
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
			©VETCOR 2024 todos los derechos reservados
		</div>
		<!-- Copyright -->
	</footer>

	<script>
		document.getElementById("continuarBtn").addEventListener("click", function() {
			// Muestra la ventana emergente con el mensaje "Registro exitoso"
			alert("Registro exitoso");

			// Redirige al usuario a la página dashboard.php
			window.location.href = "dashboard.php";
		});
	</script>

	<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>


	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>

</body>
<!-- end: BODY -->

</html>