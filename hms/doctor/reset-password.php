<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if (isset($_POST['change'])) {
	$cno = $_SESSION['cnumber'];
	$email = $_SESSION['email'];
	$newpassword = md5($_POST['password']);
	$query = mysqli_query($con, "update doctors set password='$newpassword' where contactno='$cno' and docEmail='$email'");
	if ($query) {
		echo "<script>alert('Contraseña actualizada exitosamente!.');</script>";
		echo "<script>window.location.href ='index.php'</script>";
	}
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Restablecer Contraseña</title>
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

	<script type="text/javascript">
		function valid() {
			if (document.passwordreset.password.value != document.passwordreset.password_again.value) {
				alert("Los campos Contraseña y Confirmar contraseña no coinciden !!");
				document.passwordreset.password_again.focus();
				return false;
			}
			return true;
		}
	</script>
</head>

<body class="login" style="font-family:Poppins;">
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<a href="../index.html">
					<h2> EHEALT | Restablecer contraseña Doctor</h2>
				</a>
			</div>

			<div class="box-login">
				<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
					<fieldset>
						<legend>
							Restablecer contraseña Doctor
						</legend>
						<p>
							Por favor, ingrese su nueva contraseña.<br />
							<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
						</p>

						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
								<i class="fa fa-lock"></i> </span>
						</div>


						<div class="form-group">
							<span class="input-icon">
								<input type="password" class="form-control" id="password_again" name="password_again" placeholder="Confirmar Contraseña" required>
								<i class="fa fa-lock"></i> </span>
						</div>


						<div class="form-actions">

							<button type="submit" class="btn btn-primary pull-right" name="change">
								Cambiar <i class="fa fa-arrow-circle-right"></i>
							</button>
						</div>
						<div class="new-account">
							¿Ya tienes una cuenta?
							<a href="index.php">
								iniciar sesión
							</a>
						</div>
					</fieldset>
				</form>

				<div class="copyright">
					&copy; <span class="current-year"></span><span class="text-bold text-uppercase"> EHEALT</span>. <span>Todos los derechos reservados</span>
				</div>

			</div>

		</div>
	</div>
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