<?php
    session_start();
    if (!$_SESSION['idusuario']) {
        header("Location:../../index.php");
    }
    require_once("../../Database/consult.php");
    require_once("../../Database/connection.php");

    $obj= new Crud();
    $data= $obj->setUsuario($_SESSION['idusuario']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Comprar producto-Raffiniert</title>
    <style>
    body{
      background: linear-gradient(rgba(20,30,48,.8), rgba(36,59,85,.7)),url('../../assets/images/bg9.jpg') no-repeat;
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
    .container{
      /* background: linear-gradient(rgba(15,32,39), rgba(32,58,67), rgba(44,83,100)); */
      background: white;
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
<body>
    <div class="container">
        <form action="updatedata.php" method="post">
            <div class="row">
                <div class="col-md-6">
                    <label for="nombre" class="mt-3">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $data['nombre_usuario']?>" pattern="[A-Za-z\s]{1,40}" title="Solo letras" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido" class="mt-3">Apellido</label>
                    <input type="text" class="form-control" name="apellido" id="apellido" value="<?= $data['apellido_usuario']?>" pattern="[A-Za-z\s]{1,40}" title="Solo letras" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="direccion">Direcci??n</label>
                    <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $data['direccion_usuario']?>" required>
                </div>

                <div class="col-md-6">
                    <label for="telefono">Tel??fono</label>
                    <input type="tel" class="form-control" name="telefono" id="telefono" value="<?= $data['telefono_usuario']?>" pattern="[0-9]{1,15}" title="Solo numeros" maxlength="10" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" name="ciudad" id="ciudad" value="<?= $data['ciudad_usuario']?>" pattern="[A-Za-z\s]{1,40}" title="Solo letras" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="email">Correo</label>
                    <input type="email" class="form-control" name="email" id="email" value="<?= $data['correo_usuario']?>" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="contrasenia">Digite su contrase??a actual para actualizar sus datos</label>
                    <input type="password" class="form-control" name="contrasenia" id="contrasenia" required>
                </div>
                <div class="col-md-12">
                    <!-- <input type="hidden" name="idusuario" value="<?=$data['idusuario'];?>"> -->
                    <input type="submit" name="submit" class="btn btn-primary btn-sm btn-block" value="Actualizar"/>
                </div> 
            </div>
        </form>
    </div>
    <?php 
    if (isset($_POST['submit'])) {
        require_once("../../Database/consult.php");
        require_once("../../Database/connection.php");
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $ciudad=$_POST['ciudad'];
        $email=$_POST['email'];
        $contrasenia=$_POST['contrasenia'];
        $idusuario=$_SESSION['idusuario'];
        $objValidar= new Crud();
        $dataValidar= $objValidar->setUsuario($idusuario);
        $usuario = $dataValidar['idusuario'];
        $password= $dataValidar['contrasenia_usuario'];
        if($usuario == $idusuario && $password == $contrasenia){
            $objActualizar = new Crud();
            $dataActualizar = $objActualizar->actualizarDatos($nombre,$apellido,$direccion,$telefono,$ciudad,$email,$contrasenia,$idusuario);
            if($dataActualizar !== ""){
                echo "<script> 
                        setTimeout(function() { 
                            swal({ 
                                title: 'Datos actualizados correctamente!', 
                                text: 'Message!', 
                                type: 'success', 
                                confirmButtonText: 'OK'
                            }, 
                            function(isConfirm){ 
                                if (isConfirm) { 
                                    window.location.href = 'myData.php'; 
                            } 
                        }); }, 1000);
                </script>";
            }else{
                echo '<script> 
                        swal({
                            title: "Error en la base de datos!",
                            text: "You clicked the button!",
                            type: "info",
                            button: "Ok!",
                        });
                      </script>';
            }
        }else{
            echo '<script> 
                    swal({
                        title: "Contrase??a no coincide!",
                        text: "You clicked the button!",
                        type: "error",
                        button: "Ok!",
                    });
                  </script>';
        }
        

    }  
    ?>
</body>
</html>