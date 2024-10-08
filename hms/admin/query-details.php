<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

//updating Admin Remark
if (isset($_POST['update'])) {
	$qid = intval($_GET['id']);
	$adminremark = $_POST['adminremark'];
	$isread = 1;
	$query = mysqli_query($con, "update tblcontactus set  AdminRemark='$adminremark',IsRead='$isread' where id='$qid'");
	if ($query) {
		echo "<script>alert('Admin ha actualizado con éxito.');</script>";
		echo "<script>window.location.href ='read-query.php'</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin | Detalle Consulta</title>
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

			<!-- end: TOP NAVBAR -->
			<div class="main-content">
				<div class="wrap-content container" id="container">
					<!-- start: PAGE TITLE -->
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;">Admin | Detalle consulta</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Admin</span>
								</li>
								<li class="active">
									<span>Detalle Consulta</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">


						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold">Detalle Consulta</span></h5>
								<table class="table table-hover" id="sample-table-1">

									<tbody>
										<?php
										$qid = intval($_GET['id']);
										$sql = mysqli_query($con, "select * from tblcontactus where id='$qid'");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>

											<tr>
												<th>Nombres</th>
												<td><?php echo $row['fullname']; ?></td>
											</tr>

											<tr>
												<th>Email</th>
												<td><?php echo $row['email']; ?></td>
											</tr>
											<tr>
												<th>Numero Contacto</th>
												<td><?php echo $row['contactno']; ?></td>
											</tr>
											<tr>
												<th>Mesajee</th>
												<td><?php echo $row['message']; ?></td>
											</tr>

											<?php if ($row['AdminRemark'] == "") { ?>
												<form name="query" method="post">
													<tr>
														<th>Comentario Administrador</th>
														<td><textarea name="adminremark" class="form-control" required="true"></textarea></td>
													</tr>
													<tr>
														<td>&nbsp;</td>
														<td>
															<button type="submit" class="btn btn-primary pull-left" name="update">
																Modificar <i class="fa fa-arrow-circle-right"></i>
															</button>

														</td>
													</tr>

												</form>
											<?php } else { ?>

												<tr>
													<th>Comentario Administrador</th>
													<td><?php echo $row['AdminRemark']; ?></td>
												</tr>

												<tr>
													<th>Fecha Ultima Actualizacion</th>
													<td><?php echo $row['LastupdationDate']; ?></td>
												</tr>

										<?php
											}
										} ?>
									</tbody>
								</table>
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