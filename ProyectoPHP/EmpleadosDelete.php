<?php
    include 'conn.php';
    $con = new conexion();
    $estadocon = $con->getCon();

    session_start();
    $id = $_POST['txtIDD'];

    if ($id== "") {
        $_SESSION['Titulo'] = "Error";
        $_SESSION['Mensaje'] = "Ha ocurrido un error";
        $_SESSION['ValidacionError'] = true;
        header('location: index.php');
    }else{
        $_SESSION['ValidacionError'] = false;
        $queryDelete = "EXEC Gene.UDP_tbEmpleados_Delete '$id',1";
        $result = sqlsrv_prepare($estadocon, $queryDelete);
        if(sqlsrv_execute($result))
            {
                $_SESSION['ValidacionSuccess'] = true;
                header('location: index.php');
            }
            else
            {
                $_SESSION['Titulo'] = "Error";
                $_SESSION['Mensaje'] = "No se pudo realizar la acción.".$id;
                $_SESSION['ValidacionError'] = true;
                header('location: index.php');
            }
    }


?>