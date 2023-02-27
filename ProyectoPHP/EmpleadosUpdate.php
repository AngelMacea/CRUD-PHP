<?php
 include 'conn.php';
 $con = new conexion();
 $estadocon = $con->getCon();

 session_start();
 $empleadoID = $_POST['txtIDU'];
 $empleadoCodigo =  "EMP".$_POST['txtCodigoU'];
 $empleadoNombres = $_POST['txtNombresU'];
 $empleadoApellidos = $_POST['txtApellidosU'];
 $empleadoEdad = $_POST['txtEdadU'];

 if ($_POST['txtCodigoU'] =="" || $empleadoNombres =="" || $empleadoApellidos =="" || $empleadoEdad =="") {
     $_SESSION['Titulo'] = "Advertencia";
     $_SESSION['Mensaje'] = "Rellene un campo";
     $_SESSION['ValidacionWarning'] = true;
     header('location: index.php');
 }else{
     $_SESSION['ValidacionError'] = false;
     $queryUpdate = "EXEC Gene.UDP_tbEmpleados_Update $empleadoID,'$empleadoCodigo','$empleadoNombres','$empleadoApellidos',$empleadoEdad,1";
     $result = sqlsrv_prepare($estadocon, $queryUpdate);
     if(sqlsrv_execute($result))
         {
             $_SESSION['ValidacionSuccess'] = true;
             header('location: index.php');
         }
         else
         {
             $_SESSION['Titulo'] = "Error";
             $_SESSION['Mensaje'] = "No se pudo realizar la acción.";
             $_SESSION['ValidacionError'] = true;
             header('location: index.php');
         }
 }

  

  

?>