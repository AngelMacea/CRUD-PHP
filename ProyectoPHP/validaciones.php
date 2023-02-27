<?php
                if(!isset($_SESSION['ValidacionSuccess'])){

                    $_SESSION['ValidacionSuccess'] = false;

                 }
                 else if($_SESSION['ValidacionSuccess']){

                  print "<script>izzitoastSucces('Realizado', 'La acción se ha completado exitosamente');</script>";
                   $_SESSION['ValidacionSuccess'] = false;

                 }

                 if(!isset($_SESSION['ValidacionError'])){
                    $_SESSION['ValidacionError'] = false;

                  }
                 else  if($_SESSION['ValidacionError']){

                     $titulo  = $_SESSION['Titulo'];
                     $mensaje = $_SESSION['Mensaje'];
                    print "<script>izzitoastError('$titulo', '$mensaje');</script>";
                    $_SESSION['ValidacionError'] = false;

                 }       

                 if(!isset($_SESSION['ValidacionWarning'])){
                    $_SESSION['ValidacionWarning'] = false;

                  }
                 else  if($_SESSION['ValidacionWarning']){

                     $titulo  = $_SESSION['Titulo'];
                     $mensaje = $_SESSION['Mensaje'];
                    print "<script>izzitoastWarning('$titulo', '$mensaje');</script>";
                    $_SESSION['ValidacionWarning'] = false;

                 }     
                 
                 if(!isset($_SESSION['ValidacionDelete'])){

                    $_SESSION['ValidacionDelete'] = false;

                 }
                 else if($_SESSION['ValidacionDelete']){
                    $Codigo  = $_SESSION['Codigo'];
                    $Empleado = $_SESSION['Empleado'];
                  print "<script>ModalDelete('$Codigo', '$Empleado');</script>";
                   $_SESSION['ValidacionDelete'] = false;

                 }
         ?>