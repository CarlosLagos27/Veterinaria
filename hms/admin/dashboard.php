<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Administrador | Principal</title>
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

<body style="font-family:Poppins">
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
								<h2 style="font-weight: 600;color: #1369F5;">¡Bienvenido!</h2>
								<h2 style="font-weight: 600;color: #1369F5;">Admin | Menú Principal</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Inicio</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
										<h2 style="color: #000;font-weight: 600;">Administrar Usuario</h2>
										<p class="links cl-effect-1">
											<a href="manage-users.php">
												<?php $result = mysqli_query($con, "SELECT * FROM users ");
												$num_rows = mysqli_num_rows($result); {
												?>
													Total pacientes: <?php echo htmlentities($num_rows);
																} ?>
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
										<h2 style="color: #000;font-weight: 600;">Administrar Medicos</h2>

										<p class="cl-effect-1">
											<a href="manage-doctors.php">
												<?php $result1 = mysqli_query($con, "SELECT * FROM doctors ");
												$num_rows1 = mysqli_num_rows($result1); {
												?>
													Total doctores: <?php echo htmlentities($num_rows1);
																} ?>
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-users fa-stack-1x fa-inverse"></i> </span>
										<h2 style="color: #000;font-weight: 600;">Administrar citas</h2>
										<p class="links cl-effect-1">
											<a href="book-appointment.php">
												<a href="appointment-history.php">
													<?php $sql = mysqli_query($con, "SELECT * FROM appointment");
													$num_rows2 = mysqli_num_rows($sql); {
													?>
														Total de citas: <?php echo htmlentities($num_rows2);
																		} ?>
												</a>
											</a>
										</p>
									</div>
								</div>
							</div>

							<div class="col-sm-6">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
										<h2 style="color: #000;font-weight: 600;">Gestionar Pacientes</h2>
										<p class="links cl-effect-1">
											<a href="manage-patient.php">
												<?php $result = mysqli_query($con, "SELECT * FROM tblpatient ");
												$num_rows = mysqli_num_rows($result); {
												?>
													Total Patients: <?php echo htmlentities($num_rows);
																} ?>
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body">
										<span class="fa-stack fa-2x"><i class="fa fa-search fa-stack-2x text-primary"></i> </span>
										<h2 style="color: #000;font-weight: 600;"> Nuevas Consultas</h2>

										<p class="links cl-effect-1">
											<a href="book-appointment.php">
												
												<a href="unread-queries.php">
													<?php
													$sql = mysqli_query($con, "SELECT * FROM tblcontactus where  IsRead is null");
													$num_rows22 = mysqli_num_rows($sql);
													?>
													Total Nuevas Consultas: <?php echo htmlentities($num_rows22);   ?>
												</a>
											</a>
										</p>
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
		<>
			<!-- end: SETTINGS -->
	</div>
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