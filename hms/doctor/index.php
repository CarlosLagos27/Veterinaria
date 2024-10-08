<?php
session_start();
include("include/config.php");
error_reporting(0);
if (isset($_POST['submit'])) {
	$ret = mysqli_query($con, "SELECT * FROM doctors WHERE docEmail='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$extra = "dashboard.php";
		$_SESSION['dlogin'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		$log = mysqli_query($con, "insert into doctorslog(uid,username,userip,status) values('" . $_SESSION['id'] . "','" . $_SESSION['dlogin'] . "','$uip','$status')");
		$host = $_SERVER['HTTP_HOST'];
		$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	} else {
		$host  = $_SERVER['HTTP_HOST'];
		$_SESSION['dlogin'] = $_POST['username'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into doctorslog(username,userip,status) values('" . $_SESSION['dlogin'] . "','$uip','$status')");
		$_SESSION['errmsg'] = "Contraseña y/o Usuario Incorrecta";
		$extra = "index.php";
		$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
		header("location:http://$host$uri/$extra");
		exit();
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>veterinario LOGIN</title>
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

</head>

<body style="font-family:Poppins; background: url(../../images/veterinaria.jpg) no-repeat;">
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
						<a class="nav-link active" aria-current="page" href="../../index.html">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/about.html">Sobre nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../contact.php">Contacto</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Iniciar sesión
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="../../hms/user-login.php">Usuario</a></li>
							<li><a class="dropdown-item" href="../doctor/index.php">Médico veterinario</a></li>
							<li><a class="dropdown-item" href="../admin/index.php">Administrador</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="../../hms/registration.php">¡crear una cuenta!</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-primary" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="row">
		<div class="main-login col-xs-7 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="box-login" style="margin-top: 125px;">

				<div class="logo margin-top-30">
					<a href="../../index.html">
						<h2 div class="margin-top-50" style="font-weight: 600;color: #000;">Inicio de sesión veterinario</h2>
					</a>
				</div>
				<form class="form-login" method="post">
					<fieldset>
						<p class="margin-top-30">
							Ingrese su Correo y Contraseña para Iniciar Sesion.<br />
							<span style="color:red;font-weight: 600;font-size: 18px;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
						</p>
						<div class="form-group">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Correo">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="form-group form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Contraseña">
								<i class="fa fa-lock"></i>
							</span>
							<a href="forgot-password.php">
								¿Olvidaste tu contraseña?
							</a>
						</div>
						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="submit">
								Iniciar Sesion <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>


					</fieldset>
				</form>

				<div class="copyright">
					&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> VETCOR</span>. <span>Todos los Derechos Reservados</span>
				</div>

			</div>

		</div>
	</div>

	<!--- footer-->
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
		<a class="text-body" href="index.html">Inicio</a>
		<a class="text-body" href="contact.php">Contacto</a>
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
			©VETCOR 2024 todos los derechos reservados
		</div>
		<!-- Copyright -->
	</footer>

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

</body>
<!-- end: BODY -->

</html>