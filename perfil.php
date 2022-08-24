<?php
session_start();
require 'controller.php';
$c = new Controller();
if ($_SESSION['id']) {
    require 'phpqrcode/qrlib.php';
    $dir = 'temp/';
    if (!file_exists($dir)) {
        mkdir($dir);
    }
    $id = $_SESSION['id'];
    $nom = $c->buscardatos($id);
    $filename = $dir."perfil$id.png";

    $tamanio = 10;
    $level = 'M';
    $frameSize = 3;
    $contenido = "https://colegiograneros.cl/permiso/revisar.php?id=".$id;

    QrCode::png($contenido, $filename, $level,$tamanio,$frameSize);

    
}else{
    header("Location: index.php");
}
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://colegiograneros.cl/img/logo/log.png">
    <title>Permisos!</title>
  </head>
  <body class="w-100" style="height: 100vh;">
    <div style="height: 100vh;" class="container d-flex flex-column justify-content-center">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 d-flex justify-content-center">
              <img src="<?php echo $filename?>" width="200" alt="">  
            </div>
        </div> 
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 text-center">
              <h3><?php echo $nom?></h3>
              <h4>Muestra Tu Codigo</h4>
              <a href="close.php">Cerrar Sesión</a>
            </div>
        </div> 
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

      <script src="jquery-3.6.0.js"></script>
      <script src="jquery.mask.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
        $(".rut").mask("00.000.000-A");
        $(".rut").attr("placeholder","11.111.111-A")
      </script>
      <script src="query.js"></script>
      <script src="sweetalert2.all.min.js"></script>
  </body>
</html>


