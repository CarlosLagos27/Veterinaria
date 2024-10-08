<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
$did = intval($_GET['id']); 
if (isset($_POST['submit'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$treatment = $_POST['treatment'];
	$sql = mysqli_query($con, "Update article set Title='$title',Content='$content',Treatment='$treatment' where id='$did'");
	if ($sql) {
		$msg = "Actualización exitosa";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Modificar Articulo</title>
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
								<h2 style="font-weight: 600;color: #1369F5;">Admin | Modificar Articulo</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Modificar información del articulo</span>
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
												<h5 class="panel-title">Modificar Información del articulo</h5>
											</div>
											<div class="panel-body">
												<?php $sql = mysqli_query($con, "select * from article where id='$did'");
												while ($data = mysqli_fetch_array($sql)) {
												?>
													<h4><?php echo htmlentities($data['Title']); ?>'s Article</h4>
													<?php if ($data['updationDate']) { ?>
													<?php } ?>
													<hr />
													<form role="form" name="adduser" method="post" onSubmit="return valid();">
													<div class="form-group">
															<label for="title">
																Titulo
															</label>
															<input type="text" name="title" class="form-control" value="<?php echo htmlentities($data['Title']); ?>">
														</div>
														<div class="form-group">
															<label for="content">
																Contenido
															</label>
															<textarea name="content" class="form-control"><?php echo htmlentities($data['Content']); ?></textarea>
														</div>
                                                        <div class="form-group">
															<label for="treatment">
																Tratamiento
															</label>
															<textarea name="treatment" class="form-control"><?php echo htmlentities($data['Treatment']); ?></textarea>
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