<?php
session_start();
if ($_SESSION['rol_idrol'] != 2) {
  header("Location:../../../index.php");
}
require_once("../../../Database/consult.php");
require_once("../../../Database/connection.php");

// $objmarca = new Crud();
// $datamarca = $objmarca->setMarca();

// $objproveedor = new Crud();
// $dataproveedor = $objproveedor->setProveedor();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Raffinert Admin-genero</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script> 
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/index.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/Logo/favicon.ico" />
  </head>
  <body>
    <div class=" container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <!-- <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../assets/images/logo-mini.svg" alt="logo" /></a> -->
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <!-- <div class="search-field d-none d-md-block">
            <form class="d-flex align-items-center h-100" action="#">
              <div class="input-group">
                <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>
                </div>
                <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
              </div>
            </form>
          </div> -->
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
              <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <!-- <div class="nav-profile-img">
                  <img src="../../assets/images/faces/face1.jpg" alt="image">
                  <span class="availability-status online"></span>
                </div> -->
                <div class="nav-profile-text">
                  <p class="mb-1 text-black"><?=$_SESSION['nombre_usuario'];?></p>
                </div>
              </a>
              <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                <!-- <a class="dropdown-item" href="#">
                  <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a> -->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="../../../Controller/signOff.php">
                  <i class="mdi mdi-logout mr-2 text-primary"></i> Cerrar sesi??n </a>
              </div>
            </li>
            <!-- <li class="nav-item d-none d-lg-block full-screen-link">
              <a class="nav-link">
                <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-email-outline"></i>
                <span class="count-symbol bg-warning"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <h6 class="p-3 mb-0">Messages</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                    <p class="text-gray mb-0"> 1 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a message</h6>
                    <p class="text-gray mb-0"> 15 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="../../assets/images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture updated</h6>
                    <p class="text-gray mb-0"> 18 Minutes ago </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">4 new messages</h6>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell-outline"></i>
                <span class="count-symbol bg-danger"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <h6 class="p-3 mb-0">Notifications</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-calendar"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Event today</h6>
                    <p class="text-gray ellipsis mb-0"> Just a reminder that you have an event today </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-settings"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Settings</h6>
                    <p class="text-gray ellipsis mb-0"> Update dashboard </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-link-variant"></i>
                    </div>
                  </div>
                  <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                    <h6 class="preview-subject font-weight-normal mb-1">Launch Admin</h6>
                    <p class="text-gray ellipsis mb-0"> New admin wow! </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <h6 class="p-3 mb-0 text-center">See all notifications</h6>
              </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-power"></i>
              </a>
            </li>
            <li class="nav-item nav-settings d-none d-lg-block">
              <a class="nav-link" href="#">
                <i class="mdi mdi-format-line-spacing"></i>
              </a>
            </li> -->
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="https://img.icons8.com/bubbles/2x/admin-settings-male.png" alt="profile">
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2"><?=$_SESSION['nombre_usuario'];?></span>
                  <span class="text-secondary text-small">Gerente de proyecto</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <span class="menu-title">Productos</span>
                <i class="mdi mdi-shopping menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <span class="menu-title">Basic UI Elements</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li> -->
            <li class="nav-item active">
              <a class="nav-link" href="genero.php">
                <span class="menu-title">G??nero</span>
                <i class="mdi mdi-human-male-female menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../marca/marca.php">
                <span class="menu-title">Marca</span>
                <i class="mdi mdi-emoticon menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../proveedor/proveedor.php">
                <span class="menu-title">Proveedor</span>
                <i class="mdi mdi-truck menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../usuario/usuario.php">
                <span class="menu-title">Usuarios</span>
                <i class="mdi mdi-account menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../ventas/ventas.php">
                <span class="menu-title">Ventas</span>
                <i class="mdi mdi-cash-multiple menu-icon"></i>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
                <span class="menu-title">Sample Pages</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-medical-bag menu-icon"></i>
              </a>
              <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                  <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
                </ul>
              </div>
            </li> -->
            <!-- <li class="nav-item sidebar-actions">
              <span class="nav-link">
                <div class="border-bottom">
                  <h6 class="font-weight-normal mb-3">Projects</h6>
                </div>
                <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                <div class="mt-4">
                  <div class="border-bottom">
                    <p class="text-secondary">Categories</p>
                  </div>
                  <ul class="gradient-bullet-list mt-4">
                    <li>Free</li>
                    <li>Pro</li>
                  </ul>
                </div>
              </span>
            </li> -->
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <button class="btn btn-gradient-info btn-fw" data-toggle="modal" data-target="#Modal">Registrar g??nero</button>
              <!-- <h3 class="page-title"> Material design icons </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Icons</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Material design icons</li>
                </ol>
              </nav> -->
              <!-- MODAL REGISTRAR PRODUCTO -->
                <div class="modal" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar g??nero</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="genero.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-md-12">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control shadow-sm bg-white rounded" name="nombre" placeholder="Digite nombre del g??nero" required id="nombre">
                            </div>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-gradient-info">Registrar</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- LOGICA DE ENVIO -->
                <?php 
                  if(isset($_POST['submit'])){
                    $nombre=$_POST['nombre'];
                    $objgeneroInsert = new Crud();
                    $datageneroInsert = $objgeneroInsert->getGenero($nombre);
                    if($datageneroInsert !== ""){
                      echo '<script> 
                                  swal({
                                    title: "G??nero guardado exitosamente!",
                                    text: "You clicked the button!",
                                    type: "success",
                                    button: "Ok!",
                                  });
                          </script>';
                    }else{
                        echo '<script> 
                                swal({
                                    title: "Error al registrar g??nero!",
                                    text: "You clicked the button!",
                                    type: "error",
                                    button: "Ok!",
                                });
                            </script>';
                    }
                  }
                ?>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin">
              <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Genero</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> ID </th>
                            <th> Nombre </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $objgenero = new Crud();
                            $datagenero = $objgenero->setGenero();
                          ?>
                          <?php foreach($datagenero as $f){ ?>
                          <tr>
                            <td>
                              <?=$f['idgenero']; ?>
                            </td>
                            <td> 
                              <?=$f['nombre_genero']; ?>
                            </td>
                            <td> 
                              <a href="generoform.php?idgenero=<?=$f['idgenero'];?>">
                                <i class="mdi mdi-tooltip-edit menu-icon" style="cursor: pointer; font-size:20px; color: #047edf;" data-toggle="tooltip" data-placement="right" title="Actualizar g??nero"></i>
                              </a>
                            </td>
                            <td> 
                              <a href="" data-toggle="modal" data-target="#exampleModal<?=$f['idgenero'];?>">
                                <i  class="mdi mdi-delete-circle menu-icon" style="cursor: pointer; font-size:20px; color: #047edf;" data-toggle="tooltip" data-placement="right" title="Eliminar g??nero"></i>
                              </a>
                            </td>
                          </tr>
                          <!-- Modal de verificacion delete-->
                          <div class="modal fade" id="exampleModal<?=$f['idgenero'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Verificaci??n de eliminaci??n</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <i>??Estas seguro de eliminar este dato?</i>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    <a class="btn btn-primary" href="genero.php?id=<?=$f['idgenero'];?>">
                                      Aceptar
                                    </a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          <?php
                            } 
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>  
              </div>
            </div>
              <!-- LOGICA PARA ELIMINAR PRODUCTO -->
              <?php 
                if(isset($_GET['id'])){
                  $objDelete = new Crud;
                  $dataDelete = $objDelete->getGeneroDelete($_GET['id']);
                  if($dataDelete !== ""){
                    echo "<script> 
                            setTimeout(function() { 
                                swal({ 
                                    title: 'Producto eliminado!', 
                                    text: 'Message!', 
                                    type: 'success', 
                                    confirmButtonText: 'OK'
                                }, 
                                function(isConfirm){ 
                                    if (isConfirm) { 
                                        window.location.href = 'genero.php'; 
                                } 
                            }); }, 1000);
                        </script>";
                }else{
                    echo '<script> 
                            swal({
                                title: "Error al eliminar el producto!",
                                text: "You clicked the button!",
                                type: "error",
                                button: "Ok!",
                            });
                        </script>';
                }
                }
              ?>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer mt-5">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ?? 2020.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Raffiniert <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>