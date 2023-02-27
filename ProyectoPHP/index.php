
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angel Macea - ProyectoPHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="assets/iziToast-master/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
    <?php session_start(); ?>
    <header class="p-3 text-bg-dark">
        <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
            <li><a href="index.php" class="nav-link px-2 text-white">Angel Macea - ProyectoPHP</a></li>

            </ul>
        </div>
        </div>
    </header>
    <div class="container mt-5 margen">
    <!-- Button trigger modal -->
        
        <table id="TablaEmpleados" class="table table-striped caption-top">
            <caption>Listado de empleados</caption>
                <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Empleado</th>
                    <th scope="col">Edad</th>
                    <th width="300px" scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                include 'conn.php';

                    $con = new conexion();
                    $estadocon = $con->getCon();
                    
                    $query = "EXEC UDP_tbEmpleados_View";
                    $result = sqlsrv_query($estadocon,$query);

                        
                    if($row = sqlsrv_fetch_array($result)){

                        do{
                            if($row['ID'] != "")
                            {
                                print '<tr>';
                                print   '<td>' .$row['Codigo'] .'</td>';
                                print   '<td>' .$row['Empleado'] .'</td>';
                                print   '<td>' .$row['Edad'] .'</td>';
                                print   '<td>
                                            <div class="row">
                                                <div class="col-2">
                                                    <button class="btn btn-warning" onclick="UpdateModal(\''.$row['ID'].'\',\''.$row['Codigo'].'\',\''.$row['Nombres'].'\',\''.$row['Apellidos'].'\',\''.$row['Edad'].'\')" style="color: white;">
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2">
                                                    <button class="btn btn-danger" onclick="DeleteModal(\''.$row['ID'].'\',\''.$row['Codigo'].'\',\''.$row['Empleado'].'\')">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </div>
                                                <div class="col-2">
                                                    <form action="EmpleadosInfo.php" method="POST">
                                                    <input type="hidden" id="txtIDI"  name="txtIDI" value="'.$row['ID'].'">
                                                        <button class="btn btn-secondary">
                                                         <i class="fa-solid fa-circle-info"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>';
                                print '</tr>';
                                
                            }
                        }
                        while($row = sqlsrv_fetch_array($result));
                    
                    }
                    
                ?>
                </tbody>
               
            </table>
            <thead>
              
            </thead>
            <tbody>
                   
            </tbody>
            </table>
           
        <button type="button" class="btn btn-primary mt-3 mb-3" style="width: 200px;" data-bs-toggle="modal" data-bs-target="#InsertData">
           Agregar
        </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
    <script src="assets/js/alerts.js"></script>
   
    <script type="text/javascript" src="assets/js/main.js"></script>
    <?php include('validaciones.php');?>
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"> </script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"> </script>
</body>
</html>
<!-- Modal INSERT -->
<div class="modal fade" id="InsertData" tabindex="-1" aria-labelledby="InsertDataLabel" aria-hidden="true">
<form action="EmpleadosInsert.php" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="InsertDataLabel">Agrega un empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           
            <div class="input-group mb-3 row">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Nombres" id="txtNombres" name="txtNombres">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control ms-2" placeholder="Apellidos" id="txtApellidos" name="txtApellidos">
                </div>
            </div>

            <div class="input-group mb-3 row">
                <div class="col-12">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="2" class="form-control" placeholder="Edad" id="txtEdad"  name="txtEdad">
                </div>
                
            </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
  </form>
</div>

<!-- Modal UPDATE -->
<div class="modal fade" id="UpdateData" tabindex="-1" aria-labelledby="UpdateDataLabel" aria-hidden="true">
<form action="EmpleadosUpdate.php" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="InsertDataLabel">Actualiza un empleado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           
        <div class="input-group mb-3 row">
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="ID" id="txtIDU"  name="txtIDU">
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">EMP</span>
                        <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="3" minlength="3" class="form-control" placeholder="Codigo" id="txtCodigoU"  name="txtCodigoU">
                    </div>
                   
                </div>
            </div>
            <div class="input-group mb-3 row">
                <div class="col-6">
                    <input type="text" class="form-control" placeholder="Nombres" id="txtNombresU" name="txtNombresU">
                </div>
                <div class="col-6">
                    <input type="text" class="form-control ms-1 " placeholder="Apellidos" id="txtApellidosU" name="txtApellidosU">
                </div>
            </div>

            <div class="input-group mb-3 row">
                <div class="col-12">
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '')" maxlength="2" class="form-control" placeholder="Edad" id="txtEdadU"  name="txtEdadU">
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
  </form>
</div>

<!-- Modal DELETE -->
<div class="modal fade" id="DeleteData" tabindex="-1" aria-labelledby="DeleteDataLabel" aria-hidden="true">
<form action="EmpleadosDelete.php" method="POST">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
           <label class="form-control text-center"><span class="fs-4" style="color: red;">¿Está seguro de eliminar este registro?</span></label>
           <div class="container mt-3 mb-4">
            <input type="text" id="txtIDD" name="txtIDD"/>
           <div class="row ">
                    <div class="col-4">
                        <label>Código:</label>
                        <label id="lblCodigo"></label>
                    </div>
                    <div class="col-8">
                        <label>Empleado:</label>
                        <label id="lblEmpleado"></label>
                    </div>
            </div>
           </div> 
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-danger">Aceptar</button>
      </div>
    </div>
  </div>
  </form>
</div>