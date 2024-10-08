<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $nombrem = $_POST['nombrem'];
  $tmascota = $_POST['tmascota'];
  $weight = $_POST['weight'];
  $sex = $_POST['sex'];
  $pres = $_POST['pres'];
  $rmedica = $_POST['rmedica'];


  $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,NombreM,TMascota,Weight,Sex,MedicalPres,Rmedica)
                         value('$vid','$nombrem','$tmascota','$weight','$sex','$pres', '$rmedica')");
  if ($query) {
    echo '<script>alert("Historial medico agregado con exito!!!.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Algo ha ido mal. Vuelva a intentarlo")</script>';
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>veterinario | Gestionar mascotas</title>
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
      <div class="main-content">
        <div class="wrap-content container" id="container">
          <!-- start: PAGE TITLE -->
          <section id="page-title">
            <div class="row">
              <div class="col-sm-8">
                <h2>Veterinario | Gestionar mascotas</h2>
              </div>
              <ol class="breadcrumb">
                <li>
                  <span>Doctor</span>
                </li>
                <li class="active">
                  <span>Gestionar mascotas</span>
                </li>
              </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
              <div class="col-md-12">
                <h5 class="over-title margin-bottom-15">Gestionar <span class="text-bold"></span></h5>
                <?php
                $vid = $_GET['viewid'];
                $ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
                $cnt = 1;
                while ($row = mysqli_fetch_array($ret)) {
                ?>
                  <table border="1" class="table table-bordered">
                    <tr align="center">
                      <td colspan="4" style="font-size:20px;color:blue">
                        Información del dueño</td>
                    </tr>

                    <tr>
                      <th scope>Nombre</th>
                      <td><?php echo $row['PatientName']; ?></td>
                      <th scope>Email</th>
                      <td><?php echo $row['PatientEmail']; ?></td>
                    </tr>
                    <tr>
                      <th scope>Numero</th>
                      <td><?php echo $row['PatientContno']; ?></td>
                      <th>Direccion</th>
                      <td><?php echo $row['PatientAdd']; ?></td>
                    </tr>
                  <?php } ?>
                  </table>
                  <?php

                  $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");



                  ?>
                  <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <tr align="center">
                      <th colspan="8" style="font-size:20px;color:blue">Historial Medico de las mascotas</th>
                    </tr>
                    <tr>
                      <th>#</th>
                      <th>Nombre de la mascota</th>
                      <th>Raza de la mascota</th>
                      <th>Peso</th>
                      <th>Sexo</th>
                      <th>Diagnostico</th>
                      <th>Receta Medica</th>
                      <th>Fecha Visita</th>
                    </tr>
                    <?php
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                      <tr>
                        <td><?php echo $cnt; ?></td>
                        <td><?php echo $row['NombreM']; ?></td>
                        <td><?php echo $row['TMascota']; ?></td>
                        <td><?php echo $row['Weight']; ?>kg</td>
                        <td><?php echo $row['Sex']; ?></td>
                        <td><?php echo $row['MedicalPres']; ?></td>
                        <td><?php echo $row['Rmedica']; ?></td>
                        <td><?php echo $row['CreationDate']; ?></td>
                      </tr>
                    <?php $cnt = $cnt + 1;
                    } ?>
                  </table>

                  <p align="center">
                    <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Agregar Historial Medico</button></p>

                  <?php  ?>
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Agregar Historial Medico</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <table class="table table-bordered table-hover data-tables">

                            <form method="post" name="submit">

                              <tr>
                                <th>Nombre mascota:</th>
                                <td>
                                  <input name="nombrem" placeholder="Nombre" class="form-control wd-450" required="true"></td>
                              </tr>
                              <tr>
                                <th>Raza:</th>
                                <td>
                                  <input name="tmascota" placeholder="Raza" class="form-control wd-450" required="true"></td>
                              </tr>
                              <tr>
                                <th>Peso:</th>
                                <td>
                                  <input name="weight" placeholder="En kg" class="form-control wd-450" required="true"></td>
                              </tr>
                              <tr>
                                <th>Sexo:</th>
                                <td>
                                  <input name="sex" placeholder="masculino/femenino" class="form-control wd-450" required="true"></td>
                              </tr>
                              <tr>
                                <th>Diagnostico:</th>
                                <td>
                                  <textarea name="pres" placeholder="diagnostico Médico" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                              </tr>
                              <tr>
                                <th>Receta médica:</th>
                                <td>
                                  <textarea name="rmedica" placeholder="receta Médica" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                              </tr>

                          </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                          <button type="submit" name="submit" class="btn btn-primary">Aceptar</button>

                          </form>
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