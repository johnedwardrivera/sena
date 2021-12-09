<?php
session_start();
if ($_SESSION['rol_idrol'] != 2) {
  header("Location:../index.php");
}
require_once("../../../Database/consult.php");
require_once("../../../Database/connection.php");
// $objmarca = new Crud();
// $datamarca = $objmarca->setMarca();

// $objgenero = new Crud();
// $datagenero = $objgenero->setGenero();

// $objproveedor = new Crud();
// $dataproveedor = $objproveedor->setProveedor();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Raffinert Actualizar marca</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <!-- plugins:css -->
    <!-- <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/Logo/favicon.ico" /> 
    <style>
    body{
      background: #f2edf3;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      height:100vh;
      /* width: 100%; */
      min-height: 100vh;
      padding-top:55px;
      margin-left:30px;
      margin-right:30px;
    }
    label{
      color:black;
    }

    .form-control {
    border: 1px solid #ced4da;
    font-family: "ubuntu-regular", sans-serif;
    font-size: 0.8125rem;
    }
    select.form-control {
    padding: .4375rem .75rem;
    border: 0;
    outline: 1px solid #ced4da;
    color: #c9c8c8;
   }
    .container{
      /* background: linear-gradient(rgba(15,32,39), rgba(32,58,67), rgba(44,83,100)); */
      background: #f2edf3;
      box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.28), 0 4px 3px -4px rgba(0, 0, 0, 0.2), 0 3px 7px 0 rgba(0, 0, 0, 0.12);
      padding-bottom: 22px;
      border-radius:10px;
     }
   @media (min-width: 1200px){
    .container {
      max-width: 500px;
    }
   }
  </style>
</head>
<body>
    <div class="container">
        <?php 
            if(isset($_GET['idproveedor'])){
                $objUpdate= new Crud();
                $dataUpdate= $objUpdate->setProveedorId($_GET['idproveedor']);
            }
        ?>
        <form action="proveedorform.php" method="post">
            <input type="hidden" name="veri" id="veri" value="<?= $dataUpdate['idproveedor'];?>">
            <div class="row">
                <div class="col-md-6 mt-3 mb-3">
                    <label for="nombre">Actualizar Nombre</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="nombre" value="<?= $dataUpdate['nombre_proveedor'];?>" placeholder="Digite nombre del proveedor o empresa" required id="nombre">
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <label for="direccion">Actualizar Dirección</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="direccion" value="<?= $dataUpdate['direccion_proveedor'];?>" placeholder="Digite direccion del proveedor o empresa" required id="direccion">
                </div>
                <div class="col-md-12 mt-3 mb-3">
                    <label for="correo">Actualizar correo</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="correo" value="<?= $dataUpdate['correo_proveedor'];?>" placeholder="Digite el correo" required id="correo">
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <label for="correo">Actualizar ciudad</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="ciudad" value="<?= $dataUpdate['ciudad_proveedor'];?>" placeholder="Digite la ciudad" required id="ciudad">
                </div>
                <div class="col-md-6 mt-3 mb-3">
                    <label for="telefono">Actualizar télefono</label>
                    <input type="text" class="form-control shadow-sm bg-white rounded" name="telefono" value="<?= $dataUpdate['telefono_proveedor'];?>" placeholder="Digite el telefono" required id="telefono">
                </div>
            </div>
                <button type="submit" name="submit" class="btn btn-gradient-info btn-block">Actualizar</button>
        </form>
    </div>
    <?php 
        if(isset($_POST['submit'])){
            $nombre=$_POST['nombre'];
            $direccion=$_POST['direccion'];
            $correo = $_POST['correo'];
            $ciudad = $_POST['ciudad'];
            $telefono = $_POST['telefono'];
            $veri= $_POST['veri'];
            $objEviarUpdate = new Crud;
            $dataEnviarUpdate= $objEviarUpdate->getProveedorUpdate($nombre,$direccion,$correo,$ciudad, $telefono, $veri);
            if($dataEnviarUpdate == true){
                echo "<script> 
                        setTimeout(function() { 
                            swal({ 
                                title: 'Actualizado exitosamente!', 
                                text: 'Message!', 
                                type: 'success', 
                                confirmButtonText: 'OK'
                            }, 
                            function(isConfirm){ 
                                if (isConfirm) { 
                                    window.location.href = 'proveedor.php'; 
                            } 
                        }); }, 1000);
                    </script>";
            }else{
                echo '<script> 
                        swal({
                            title: "Error al actualizar!",
                            text: "You clicked the button!",
                            type: "error",
                            button: "Ok!",
                        });
                    </script>';
            }
            
        }
    ?>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- Custom js for this page -->
    <script src="../../assets/js/file-upload.js"></script>
</body>
</html>