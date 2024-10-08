<?php
session_start();
include('include/config.php');
include('include/checklogin.php');
check_login();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>menú principal</title>
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
								<h2 style="font-weight: 600;color: #1369F5;">Usuario | Menú Principal</h2>
							</div>
							<ol class="breadcrumb">
								<li>
									<span>Usuario</span>
								</li>
								<li class="active">
									<span>Nombre</span>
								</li>
							</ol>
						</div>
					</section>
					<!-- end: PAGE TITLE -->
					<!-- start: BASIC EXAMPLE -->
					<div class="container-fluid container-fullw bg-white">
						<div class="row no-gutters mx-4">
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body" style="background: white;font-weight: 600;">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-smile-o fa-stack-1x fa-inverse"></i> </span>
										<h2 style="font-weight: 600;color: #000;">Mi Perfil</h2>
										<p class="links cl-effect-1">
											<a href="edit-profile.php">
												Modificar Perfil
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center border-0">
									<div class="panel-body" style="background: white;font-weight: 600;">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-paperclip fa-stack-1x fa-inverse"></i> </span>
										<h2 style="font-weight: 600;color: #000;">Mis Citas</h2>

										<p class="cl-effect-1">
											<a href="appointment-history.php">
												Ver Historial Citas
											</a>
										</p>
									</div>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="panel panel-default no-radius text-center borde-0">
									<div class="panel-body" style="background: white;font-weight: 600;">
										<span class="fa-stack fa-2x"> <i class="fa fa-square fa-stack-2x text-primary"></i> <i class="fa fa-book fa-stack-1x fa-inverse"></i> </span>
										<h2 style="font-weight: 600;color: #000;"> Reserve mi Cita</h2>

										<p class="links cl-effect-1">
											<a href="book-appointment.php">
												Reserva una Cita
											</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					
					</div>
					<!-- end: SELECT BOXES -->	
					<section id="page-title">
						<div class="row">
							<div class="col-sm-8">
								<h2 style="font-weight: 600;color: #1369F5;">ARTICULOS VETERINARIOS</h2>
								<h2 style="font-size: 20px;font-weight: 100;color: #000;">Encuentre aqui información compartida por nuestros profesionales.</h2>
							</div>
						</div>
					</section>
					<?php 

	$sql = mysqli_query($con, "SELECT * FROM article");

	// Verificar si hay resultados para los artículos
	if(mysqli_num_rows($sql) > 0) {
	?>
		<div class="container-fluid" style="overflow-y: scroll; max-height: 600px;">
			<?php 
			// Iterar sobre cada fila de resultados para los artículos
			while ($data = mysqli_fetch_array($sql)) {
			?>
            <div class="container-fluid container-fullw bg-white">
                <div class="row no-gutters mx-4">
                        <div class="panel panel-default no-radius text-left border-0">
                            <div class="panel-body" style="background: white;">
                                <h1 style="color: #1369F5; font-weight: bold; border-radius: 10px; background-color: #f0f0f0; padding: 10px;"><?php echo $data["Title"]; ?></h1>
                                <br>
                                <p style="border-radius: 10px;color: #000; padding: 10px;"><?php echo $data["Content"]; ?></p>
                                <br>
                                <h1 style="color: #1369F5; font-weight: bold; border-radius: 10px; background-color: #f0f0f0; padding: 10px;">Tratamiento</h1>
                                <br>
                                <p style="border-radius: 10px;color: #000; padding: 10px;"><?php echo $data["Treatment"]; ?></p>
                                
                                <?php 
                                // Obtener el doctorId del artículo actual
                                $did = $data['doctorId'];
                                
                                // Hacer la consulta a la base de datos para obtener el doctor
                                $sql_doctor = mysqli_query($con, "SELECT * FROM doctors WHERE id='$did'");
                                
                                // Verificar si hay resultados para el doctor
                                if(mysqli_num_rows($sql_doctor) > 0) {
                                    // Iterar sobre cada fila de resultados para el doctor
                                    while ($doctor_data = mysqli_fetch_array($sql_doctor)) {
                                ?>
                                        <h4 style="border-radius: 10px;font-size: 15px; background-color: #f0f0f0; padding: 10px;">Articulo escrito por el doctor: <?php echo htmlentities($doctor_data['doctorName']); ?></h4>
                                <?php 
                                    }
                                } else {
                                    echo "No hay articulos disponibles.";
                                }
                                ?>
                            </div>
                        </div>
                </div>
            </div>
        <?php 
        }
        ?>
    </div>
<?php 
} else {
    echo "No hay resultados para los artículos.";
}
?>

				
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