<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get user id
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$gender = $_POST['gender'];

	$sql = mysqli_query($con, "Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='$did'");
	if ($sql) {
		$msg = "Actualización exitosa";
	}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Modificar Detalle usuario</title>
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


</head>

<body style="font-family: Poppins;">
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">

			<?php include('include/header.php'); ?>
			<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;">Admin | Modificar información del usuario</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Modificar información del usuario</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 style="color: green; font-size:18px; ">
									<?php if ($msg) {
										echo htmlentities($msg);
									} ?> </h5>
								<div class="row margin-top-30">
									<div class="col-lg-8 col-md-12">
										<div class="panel panel-white">
											<div class="panel-heading">
												<h5 class="panel-title">Modificar Información del usuario</h5>
											</div>
											<div class="panel-body">
												<?php $sql = mysqli_query($con, "select * from users where id='$did'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<h4><?php echo htmlentities($data['fullName']); ?>'s Profile</h4>
													<p><b>Fecha Registro Perfil: </b><?php echo htmlentities($data['regDate']); ?></p>
													<?php if ($data['updationDate']) { ?>
														<p><b>Fecha de Ultima Actualizacion Perfil: </b><?php echo htmlentities($data['updationDate']); ?></p>
													<?php } ?>
													<hr />
													<form role="form" name="adduser" method="post" onSubmit="return valid();">
													<div class="form-group">
															<label for="fname">
																Nombre Usuario
															</label>
															<input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']); ?>">
														</div>


														<div class="form-group">
															<label for="address">
																Direccion
															</label>
															<textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
														</div>
														<div class="form-group">
															<label for="city">
																Ciudad
															</label>
															<input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']); ?>">
														</div>

														<div class="form-group">
															<label for="gender">
																Sexo:
															</label>

															<select name="gender" class="form-control" required="required">
																<option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
																<option value="Masculino">Masculino</option>
																<option value="Femenino">Femenino</option>
																<option value="Ninguno">Ninguno</option>
															</select>

														</div>

														<div class="form-group">
															<label for="fess">
																Email user
															</label>
															<input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']); ?>">
														</div>
													<?php } ?>
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Modificar
													</button>
													</form>
											</div>
										</div>
									</div>

								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="panel panel-white">


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- end: BASIC EXAMPLE -->
			<!-- end: SELECT BOXES -->
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