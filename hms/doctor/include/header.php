<?php error_reporting(0); ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">

	<title>Document</title>
</head>

<body>

	<header class="navbar navbar-static-top">
		<!-- start: NAVBAR HEADER -->
		<div class="navbar-header">
			<a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
				<i class="ti-align-justify"></i>
			</a>
			<a class="navbar-brand" href="#">
				<h2 style="color: #fff;font-weight: 600;">VETCOR</h2>
			</a>
			<a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
				<i class="ti-align-justify"></i>
			</a>
			<a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
				<span class="sr-only">Navegacion</span>
				<i class="ti-view-grid"></i>
			</a>
		</div>
		<!-- end: NAVBAR HEADER -->
		<!-- start: NAVBAR COLLAPSE -->
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-right">
				<!-- start: MESSAGES DROPDOWN -->
				<li class="dropdown current-user">
					<a href class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/doctor.jpg"> <span class="username">
							<?php $query = mysqli_query($con, "select doctorName from doctors where id='" . $_SESSION['id'] . "'");
							while ($row = mysqli_fetch_array($query)) {
								echo $row['doctorName'];
							}
							?> <i class="ti-angle-down"></i></span>
					</a>
					<ul class="dropdown-menu dropdown-dark">
						<li>
							<a href="edit-profile.php">
								Mi Perfil
							</a>
						</li>

						<li>
							<a href="change-password.php">
								Cambiar Contraseña
							</a>
						</li>
						<li>
							<a href="logout.php">
								Cerrar Sesion
							</a>
						</li>
					</ul>
				</li>
				<!-- end: USER OPTIONS DROPDOWN -->
			</ul>
			<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
			<div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
				<div class="arrow-left"></div>
				<div class="arrow-right"></div>
			</div>
			<!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
		</div>


		<!-- end: NAVBAR COLLAPSE -->
	</header>

</body>

</html>