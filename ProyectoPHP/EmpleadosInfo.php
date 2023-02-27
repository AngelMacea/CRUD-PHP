<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Angel Macea - ProyectoPHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/iziToast-master/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"
        integrity="sha512-2bMhOkE/ACz21dJT8zBOMgMecNxx0d37NND803ExktKiKdSzdwn+L7i9fdccw/3V06gM/DBWKbYmQvKMdAA9Nw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php 
        session_start(); 
        $id = $_POST['txtIDI'];
        include 'conn.php';

        $con = new conexion();
        $estadocon = $con->getCon();
                    
        $query = "EXEC Gene.UDP_tbEmpleados_Find $id";
        $result = sqlsrv_query($estadocon,$query);
        $row = sqlsrv_fetch_array($result);

        
    ?>
    <header class="p-3 text-bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="index.php" class="nav-link px-2 text-white">Angel Macea - ProyectoPHP</a></li>

                </ul>
            </div>
        </div>
    </header>
    <div class="container mt-4 margen">
        <a href="index.php" class="btn btn-primary mb-3">Regresar</a>
        <div class="card text-center">
            <div class="card-header">
                
            </div>
            <div class="card-body">
               <div class="row">
               
                    <div class="col-3">
                    <caption>Código</caption>
                    <label class="form-control mt-2"><?php echo isset($row['Codigo']) ? $row['Codigo'] : ""; ?></label>
                    </div>
                    <div class="col-3">
                    <caption>Empleado</caption>
                        <label class="form-control mt-2"><?php echo isset($row['Empleado']) ? $row['Empleado'] : ""; ?></label>
                    </div>
                    <div class="col-3">
                    <caption>Edad</caption>
                        <label class="form-control mt-2"><?php echo isset($row['Edad']) ? $row['Edad'] : ""; ?></label>
                    </div>
               </div>
               <div class="row mt-5">
                    <div class="col-3">
                    <caption>Usuario Creación</caption>
                        <label class="form-control mt-2"><?php echo isset($row['UsuarioCreacion']) ? $row['UsuarioCreacion'] : "N/A"; ?></label>
                    </div>
                    <div class="col-3">
                    <caption>Fecha Creación</caption>
                        <label class="form-control mt-2"><?php echo isset($row['FechaCreacion']) ? $row['FechaCreacion']->format('Y-m-d H:i:s') : "N/A"; ?></label>
                    </div>
                    <div class="col-3">
                    <caption>Usuario Modificación</caption>
                        <label class="form-control mt-2"><?php echo isset($row['UsuarioModifica']) ? $row['UsuarioModifica'] : "N/A"; ?></label>
                    </div>
                    <div class="col-3">
                    <caption>Fecha Modificación</caption>
                        <label class="form-control mt-2"><?php echo isset($row['FechaModifica']) ? $row['FechaModifica']->format('Y-m-d H:i:s') : "N/A"; ?></label>
                    </div>
               </div>
            </div>
            <div class="card-footer text-muted">
                
            </div>
        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="assets/iziToast-master/dist/js/iziToast.min.js" type="text/javascript"></script>
    <script src="assets/js/alerts.js"></script>
</body>

</html>