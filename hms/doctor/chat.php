<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); // get user id
if (isset($_POST['submit'])) {
	$incoming_id = $did;
	$outcoming_id = $_SESSION['id'];
	$message = $_POST['msg'];
	$sql = mysqli_query($con, "insert into messages(incoming_msg_id,outgoing_msg_id,msg) values('$incoming_id','$outcoming_id','$message')");
	if ($sql) {
		echo "<script>alert('mensaje enviado!');</script>";
		header("Location: " . $_SERVER['REQUEST_URI']);
        exit();

	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Doctor | Chat</title>

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

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/94b15666b0.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">



</head>

<body style="font-family: Poppins;">
	<div id="app">
		<?php include('include/sidebar.php'); ?>
		<div class="app-content">
			<?php include('include/header.php'); ?>

			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;"> Doctor | Chat</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Paciente</span>
								</li>
								<li class="active">
									<span>Chatear con Paciente</span>
								</li>
							</ol>
						</div>
					</section>
						<section style="background-color: #eee;">
						<div class="container py-5">
							<div class="row d-flex justify-content-center">
								<div class="col-md-8 col-lg-6 col-xl-4">
									<div class="card">
										<div class="card-header d-flex justify-content-between align-items-center p-3" style="border-top: 4px solid blue;">
											<?php 
											$sql = mysqli_query($con, "select * from users where id='$did'");
											while ($data = mysqli_fetch_array($sql)) {
											?>
											<h4>Chat con: <?php echo htmlentities($data['fullName']); ?></h4>
											<?php } ?>
										</div>
										<div class="card-body" style="position: relative; height: 400px; overflow-y: auto;">
											<!-- Contenido del chat -->
											<?php
											$sql2 = mysqli_query($con, "select * from messages where incoming_msg_id='$did' and outgoing_msg_id='" . $_SESSION['id'] . "' or incoming_msg_id='" . $_SESSION['id'] . "' and outgoing_msg_id='$did'");
											while ($row = mysqli_fetch_array($sql2)) {
												$outgoing_id = $row['outgoing_msg_id'];
												$name = '';      
												$doctorQuery = mysqli_query($con, "SELECT doctorName FROM doctors WHERE id='$outgoing_id'");
												if (mysqli_num_rows($doctorQuery) > 0) {
													$doctorData = mysqli_fetch_assoc($doctorQuery);
													$name = $doctorData['doctorName'];
												} else {
													$userQuery = mysqli_query($con, "SELECT fullName FROM users WHERE id='$outgoing_id'");
													if (mysqli_num_rows($userQuery) > 0) {
														$userData = mysqli_fetch_assoc($userQuery);
														$name = $userData['fullName'];
													}
												}
												$message = $row['msg'];
												$message_class = $outgoing_id == $_SESSION['id'] ? 'text-white bg-primary' : 'text-muted bg-light';
											?>
											<div class="d-flex justify-content-between">
													<p class="small mb-1"><?php echo $name; ?></p>
													<?php
														// Convertir el timestamp a un formato de hora legible
														$timestamp = strtotime($row['Time']);
														$formatted_time = date('d M g:i A', $timestamp);
													?>
													<p class="small mb-1 text-muted"><?php echo $formatted_time; ?></p>
												</div>
											<div class="d-flex flex-row justify-content-<?php echo $outgoing_id == $_SESSION['id'] ? 'end' : 'start'; ?> mb-4 pt-1">
												<div>
													<p class="small p-2 <?php echo $message_class; ?> rounded-3"><?php echo $message; ?></p>
												</div>
											</div>
											<?php } ?>
										</div>
										<div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
											<form role="form" name="chat" method="post" onSubmit="return valid();" style="width: 100%;">
												<div class="input-group mb-0">
													<textarea class="form-control" name="msg" placeholder="Escriba su mensaje" aria-label="Recipient's username" aria-describedby="button-addon2"><?php echo htmlentities($data['msg']); ?></textarea>
													<button class="btn btn-primary" type="submit" name="submit">Enviar</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

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