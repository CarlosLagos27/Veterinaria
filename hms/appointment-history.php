<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_GET['cancel'])) {
	mysqli_query($con, "update appointment set userStatus='0' where id = '" . $_GET['id'] . "'");
	$_SESSION['msg'] = "Tu Cita Fue Cancelado Con Exito!!";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Usuario | Historial Citas</title>

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
			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;"> Usuario | Historial citas</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Usuario </span>
								</li>
								<li class="active">
									<span>Historial Citas</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">

								<p style="color:green;font-size: 20px;font-weight: 600;"><?php echo htmlentities($_SESSION['msg']); ?>
									<?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th class="hidden-xs">Nombre Doctor</th>
											<th>Especialidad</th>
											<th>Cuota Consultoria</th>
											<th>Fecha/Hora Cita </th>
											<th>Fecha Creacion Cita </th>
											<th>Estado</th>
											<th>Accion</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql = mysqli_query($con, "select doctors.doctorName as docname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId where appointment.userId='" . $_SESSION['id'] . "'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['docname']; ?></td>
												<td><?php echo $row['doctorSpecialization']; ?></td>
												<td><?php echo $row['consultancyFees']; ?></td>
												<td><?php echo $row['appointmentDate']; ?> / <?php echo
																								$row['appointmentTime']; ?>
												</td>
												<td><?php echo $row['postingDate']; ?></td>
												<td>
													<?php
													$currentDateTime = new DateTime();
													$appointmentDateTime = new DateTime($row['appointmentDate'] . ' ' . $row['appointmentTime']);
													if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1) && ($currentDateTime > $appointmentDateTime)) {
														echo '<a href="chat.php?id=' . $row['doctorId'] . '">En Progreso</a>';
													} elseif (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
														echo "En Activa";
													}
													if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
														echo "Cancelada";
													}
													if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
														echo "Cancelada por Doctor";
													}

													?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
															<a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('¿Estas Seguro de que Quieres Cancelar Esta Cita?')" class="btn btn-transparent btn-xs tooltips" title="Cancelar Cita" tooltip-placement="top" tooltip="Remove">Cancelar Cita</a>
														<?php } else {
															echo "Cancelada";
														} ?>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group" dropdown is-open="status.isopen">
															<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
																<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
															</button>
															<ul class="dropdown-menu pull-right dropdown-light" role="menu">
																<li>
																	<a href="#">
																		Editar
																	</a>
																</li>
																<li>
																	<a href="#">
																		Compartir
																	</a>
																</li>
																<li>
																	<a href="#">
																		Eliminar
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</td>
											</tr>

										<?php
											$cnt = $cnt + 1;
										} ?>


									</tbody>
								</table>
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
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>

</html>