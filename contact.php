<?php
include_once('hms/include/config.php');
if (isset($_POST['submit'])) {
	$name = $_POST['fullname'];
	$email = $_POST['emailid'];
	$mobileno = $_POST['mobileno'];
	$dscrption = $_POST['description'];
	$query = mysqli_query($con, "insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
	echo "<script>alert('tu información se ha enviado correctamente');</script>";
	echo "<script>window.location.href ='contact.php'</script>";
}


?>
<!DOCTYPE HTML>
<html>

<head>
	<title>VETCOR</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/style.css" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">


	<!--bootstrap y fontawesome-->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/94b15666b0.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	

</head>

<body style="font-family: Poppins;">
	<!--start-wrap-->

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
						<a class="nav-link active" aria-current="page" href="index.html">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="./pages/about.html">Sobre nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contact.php">Contacto</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Iniciar sesión
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="hms/user-login.php">Usuario</a></li>
							<li><a class="dropdown-item" href="hms/doctor/">Médico veterinario</a></li>
							<li><a class="dropdown-item" href="hms/admin/">Administrador</a></li>
						</ul>
					</li>
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="hms/registration.php">¡crear una cuenta!</a>
					</li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-primary" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-12">
				<div class="well well-sm">
					<form class="form-horizontal" method="post">
						<fieldset>
							<legend class="text-center header">Contáctanos</legend>
							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
								<div class="col-md-8">
									<span><input class="form-control" type="text" name="fullname" required="true" value="" placeholder="Nombre"></span>
								</div>
							</div>

							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
								<div class="col-md-8">
									<span><input class="form-control" type="text" name="emailid" required="true" value="" placeholder="Correo electronico"></span>
								</div>
							</div>

							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
								<div class="col-md-8">
									<span><input class="form-control" type="text" name="mobileno" required="true" value="" placeholder="Telefono"></span>
								</div>
							</div>

							<div class="form-group">
								<span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i> Introduza el mensaje</span>
								<div class="col-md-8">
									<span><textarea class="form-control" type="text "name="description" required="true" placeholder="Introduzca aquí su mensaje. Nos comunicaremos con usted dentro de 2 días hábiles."> </textarea></span>
								</div>
							</div>

							<div class="form-group">
								<div class="col-md-12 text-center">
									<span><input type="submit" name="submit" value="Enviar" class="btn btn-primary btn-lg"></span>
								</div>
							</div>

							<div class="card" style="width: 18rem;">
								<div class="card-body">
									<h5 class="card-title" style="color:dodgerblue">Dirección:</h5>
									<p>500 Lorem Ipsum Dolor Sit,</p>
									<p>22-56-2-9 Sit Amet, Lorem,</p>
									<p>Telefono:(00) 222 666 444</p>
									<p>Ruc: (000) 000 00 00 0</p>
									<p>Email: <span>vetcor@gmail.com</span></ </div>
								</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!--end-wrap-->
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
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

	<!--end-wrap-->
</body>

</html>