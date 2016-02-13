// aqui esta la prueba
<?php require_once('Connections/server_otb.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['form-username'])) {
  $loginUsername=$_POST['form-username'];
  $password=$_POST['form-password'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "modulos/controladores/identificador_usuario.php";
  $MM_redirectLoginFailed = "index.php?errorAute=1";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_server_otb, $server_otb);
  
  $LoginRS__query=sprintf("SELECT LOGIN, CI FROM usuario WHERE LOGIN=%s AND CI=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "double")); 
   
  $LoginRS = mysql_query($LoginRS__query, $server_otb) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema informacion OTB</title>
	<!-- MenuInicio CSS -->
<link rel="stylesheet" href="assets/css/styles_menu.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="assets/js/script_menu.js"></script>
    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/blog-home.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/form-elements_boton.css">
</head>
<?php
//Verificador de Pagina de Acceso "estado del sistema" si es 1 acceso normal y fuera otra numero acceso a notificacion
if(1==1)
	{
?>
<body>


    <?php
include('modulos/barra_menu.php');
 ?>

    <!-- Page Content -->
    <div class="container pagina11">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8"><!-- First Blog Post -->
			<div class="row fondotb">
	<div class="col-md-8">
	<?php
include('modulos/cuadro_fecha&hora.php');
 ?> 
	</div>
	<div class="col-md-4">
	   <?php
include('modulos/cuadro_autentificacion.php');
 ?>   
 </div>
 </div>

			<!-- Paginas contenidos -->
             <?php
include('modulos/controladores/paginas_contenidos_Inicio.php');
 ?> 
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">
	 <?php
include('modulos/cuadro_mapa.php');
 ?>
	    
	
   <?php
include('modulos/cuadro_notificaciones.php');
 ?>   
     <?php
include('modulos/cuadro_extra.php');
 ?>            

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <?php
include('modulos/barra_final.php');
 ?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
	}
	else{
		echo"<div class=\"alert alert-danger\" role=\"alert\">El sistema esta en mantenimiento</div>";
	}
?>