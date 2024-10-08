<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if (isset($_POST['submit'])) {
	$specilization = $_POST['Doctorspecialization'];
	$doctorid = $_POST['doctor'];
	$userid = $_SESSION['id'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['apptime'];
	$userstatus = 1;
	$docstatus = 1;

	$dayOfWeek = date('N', strtotime($appdate));
	if ($dayOfWeek >= 6) {
		echo "<script>alert('Lo sentimos, solo se permiten citas de lunes a viernes');</script>";
	} else {
		// Validar la hora (7 am a 12 pm y de 2 pm a 5pm)
		$hour = date('G', strtotime($time));
		if (($hour < 7 || $hour > 11) && ($hour < 14 || $hour > 17)) {
			echo "<script>alert('Las citas solo están disponibles de 7 AM a 12 PM y de 2 PM a 5 PM.');</script>";
		} else {
			// Verificar si la fecha y hora ya existen en la base de datos
			$checkQuery = mysqli_query($con, "SELECT * FROM appointment WHERE appointmentDate = '$appdate' AND appointmentTime = '$time'");
			if (mysqli_num_rows($checkQuery) > 0) {
				echo "<script>alert('La cita para esta fecha y hora ya está reservada');</script>";
			} else {
				$query = mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
				if ($query) {
					echo "<script>alert('Su Cita Reservada Con Exito!!');</script>";
				} else {
					echo "<script>alert('Error al reservar la cita');</script>";
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Usuario | Reservar Cita</title>

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
	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>
	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function(data) {
					$("#fees").html(data);
				}
			});
		}
	</script>

</head>

<body style="font-family: Poppins;">
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
								<h2 style="font-weight: 600;color: #1369F5;"> Usuario | Reservar citas</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Usuario</span>
								</li>
								<li class="active">
									<span>Reservas Cita</span>
								</li>
							</ol>
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
												<h5 class="panel-title">Reservas Cita</h5>
											</div>
											<div class="panel-body">
												<p style="color:green;font-weight: 600;font-size: 20px;"><?php echo htmlentities($_SESSION['msg1']); ?>
													<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
												<form role="form" name="book" method="post">
													<div class="form-group">
														<label for="DoctorSpecialization">
															Especialidad Doctor
														</label>
														<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
															<option value="">Seleccionar Especialidad</option>
															<?php $ret = mysqli_query($con, "select * from doctorspecilization");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['specilization']); ?>">
																	<?php echo htmlentities($row['specilization']); ?>
																</option>
															<?php } ?>
														</select>
													</div>
													<div class="form-group">
														<label for="doctor">
															Doctor
														</label>
														<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
															<option value="">Seleccionar Doctor</option>
														</select>
													</div>
													<div class="form-group">
														<label for="consultancyfees">
															Tarifas Consultorias
														</label>
														<select name="fees" class="form-control" id="fees" readonly>

														</select>
													</div>

													<div class="form-group">
														<label for="AppointmentDate">
															Fecha
														</label>
														<input class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd">
													</div>
													<div class="form-group">
														<label for="Appointmenttime">
															Hora
														</label>
														<input class="form-control" name="apptime" id="timepicker1" required="required">Las citas solo están disponibles de 7 AM a 12 PM y de 2 PM a 5 PM. De lunes a viernes
													</div>
													<button type="submit" name="submit" class="btn btn-o btn-primary">
														Reservar Cita
													</button>
												</form>
											</div>
										</div>
									</div>

								</div>
							</div>

						</div>
					</div>

					<!-- end: BASIC EXAMPLE -->
					<!-- end: SELECT BOXES -->

				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

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
	<script>
		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
		});
		</script>
	</script>
	<script type="text/javascript">
		$('#timepicker1').timepicker();
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->



</body>

</html>