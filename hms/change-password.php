<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
date_default_timezone_set('Asia/Kolkata'); // change according timezone
$currentTime = date('d-m-Y h:i:s A', time());
if (isset($_POST['submit'])) {
	$sql = mysqli_query($con, "SELECT password FROM  users where password='" . md5($_POST['cpass']) . "' && id='" . $_SESSION['id'] . "'");
	$num = mysqli_fetch_array($sql);
	if ($num > 0) {
		$con = mysqli_query($con, "update users set password='" . md5($_POST['npass']) . "', updationDate='$currentTime' where id='" . $_SESSION['id'] . "'");
		$_SESSION['msg1'] = "Contraseña Cambiada con Éxito !!";
	} else {
		$_SESSION['msg1'] = "La Contraseña Anterior no Coincide !!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Usuario | Cambiar Contraseña</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
	<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<script type="text/javascript">
		function valid() {
			if (document.chngpwd.cpass.value == "") {
				alert("¡La contraseña actual está vacía!");
				document.chngpwd.cpass.focus();
				return false;
			} else if (document.chngpwd.npass.value == "") {
				alert("¡¡La nueva contraseña archivada está vacía !!");
				document.chngpwd.npass.focus();
				return false;
			} else if (document.chngpwd.cfpass.value == "") {
				alert("¡Confirmar contraseña El archivo está vacío!");
				document.chngpwd.cfpass.focus();
				return false;
			} else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
				alert("¡El campo Contraseña y Confirmar contraseña no coinciden!");
				document.chngpwd.cfpass.focus();
				return false;
			}
			return true;
		}
	</script>

</head>

<body  style="font-family: Poppins;">
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h1 class="mainTitle" style="color: #1369F5;">Usuario | Cambiar Contraseña</h1>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Usuario</span>
								</li>
								<li class="active">
									<span>Cambiar Contraseña</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">

								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Cambiar Contraseña</h5>
											</div>
											<div class="panel-body">
												<p style="color:green;font-size: 20px;font-weight: 600;"><?php echo htmlentities($_SESSION['msg1']); ?>
													<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
												<form role="form" name="chngpwd" method="post" onSubmit="return valid();">
													<div class="form-group">
														<label for="exampleInputEmail1">
															Contraseña Actual
														</label>
														<input type="password" name="cpass" class="form-control" placeholder="Contraseña Actual">
													</div>
													<div class="form-group">
														<label for="exampleInputPassword1">
															Nueva Contraseña
														</label>
														<input type="password" name="npass" class="form-control" placeholder="Nueva Contraseña">
													</div>

													<div class="form-group">
														<label for="exampleInputPassword1">
															Confirmar Contraseña
														</label>
														<input type="password" name="cfpass" class="form-control" placeholder="Confirmar Contraseña">
													</div>



													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Modificar
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>
	</div>
	<!-- end: SETTINGS -->
	<!-- start: MAIN JAVASCRIPTS -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<!-- end: MAIN JAVASCRIPTS -->
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
	<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
	<script src="vendor/autosize/autosize.min.js"></script>
	<script src="vendor/selectFx/classie.js"></script>
	<script src="vendor/selectFx/selectFx.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
	<!-- start: CLIP-TWO JAVASCRIPTS -->
	<script src="assets/js/main.js"></script>
	<!-- start: JavaScript Event Handlers for this page -->
	<script src="assets/js/form-elements.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>