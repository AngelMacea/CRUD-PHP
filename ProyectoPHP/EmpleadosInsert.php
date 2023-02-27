<?php
    include 'conn.php';
    $con = new conexion();
    $estadocon = $con->getCon();

    //CREACION DEL CODIGO EN FORMATO "EMP000" OBTENIENDO EL ULTIMO DIGITO DE DB
    $queryCode = "EXEC Gene.UDP_tbEmpleados_Codigo";
    $resultCode = sqlsrv_query($estadocon,$queryCode);
    $rowCode = sqlsrv_fetch_array($resultCode);
    $lastEmpCode = $rowCode['Codigo'];  
    $newEmpCode = $lastEmpCode + 1;
    $newEmpCode = min($newEmpCode, 999);
    $newEmpCodeStr = str_pad($newEmpCode, 3, '0', STR_PAD_LEFT);
    $newEmpCodeFull = "EMP" .  $newEmpCodeStr;


    session_start();
    $empleadoCodigo =  $newEmpCodeFull;
    $empleadoNombres = $_POST['txtNombres'];
    $empleadoApellidos = $_POST['txtApellidos'];
    $empleadoEdad = $_POST['txtEdad'];

    if ($empleadoNombres== "" || $empleadoApellidos =="" || $empleadoEdad =="") {
        $_SESSION['Titulo'] = "Advertencia";
        $_SESSION['Mensaje'] = "Rellene un campo";
        $_SESSION['ValidacionWarning'] = true;
        header('location: index.php');
    }else{
        $_SESSION['ValidacionError'] = false;
        $queryInsert = "EXEC Gene.UDP_tbEmpleados_Insert '$empleadoCodigo','$empleadoNombres','$empleadoApellidos','$empleadoEdad',1";
        $result = sqlsrv_prepare($estadocon, $queryInsert);
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