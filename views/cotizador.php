<?php 
   include_once "controller/usuarios.controller.php";
   include_once "controller/usuarios.controller.php";
   include_once "controller/marcas.controller.php";
   $roles = ctrRoles::ctrGetRoles();
   $users = ctrUsers::ctrFetchUsers();
   $marcas = ctrMarcas::ctrGetMarcas();
   $categorias =ctrCat::ctrGetCat();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
 <link rel="stylesheet" href="views/resources/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Ionicons -->
  <link rel="stylesheet" href="views/resources/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="views/resources/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="views/resources/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="views/resources/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="views/resources/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="views/resources/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="views/resources/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="views/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!--Sweet Alert-->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include "modules/header.php";?>
  <?php include "modules/menu.php";?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   <?php 
    if(isset($_GET["pagina"])){
      $pagina = $_GET["pagina"];
      switch($pagina){
        case "marcas":
        case "categorias":
        case "usuarios":
        case "roles":  
        case "dashboard":
        case "reportes":
        include "pages/".$pagina.".php";
        break;
        default:
        echo "Pagina no encontrada";
        break;
      }
    }else{
      echo "Página no especificada";
    }
   
   ?>
  </div>
</div>
<!-- ./wrapper -->
<?php include "modules/footer.php";?>
<!-- jQuery 3 -->
<script src="views/resources/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="views/resources/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="views/resources/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="views/resources/bower_components/raphael/raphael.min.js"></script>
<script src="views/resources/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="views/resources/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="views/resources/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="views/resources/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="views/resources/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="views/resources/bower_components/moment/min/moment.min.js"></script>
<script src="views/resources/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="views/resources/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="views/resources/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="views/resources/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/resources/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/resources/dist/js/adminlte.min.js"></script>
<script src="views/js/users.js"></script>
<script src="views/js/roles.js"></script>
<script src="views/js/marcas.js"></script>
<script src="views/js/categorias.js"></script>
</body>
</html>
