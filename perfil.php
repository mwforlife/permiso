<?php
session_start();
require 'controller.php';
$c = new Controller();
if ($_SESSION['id']) {
    require 'phpqrcode/qrlib.php';
    
    $id = $_SESSION['id'];
    $nom = $c->buscardatos($id);
    $foto = $c->verificarPermiso($id);

    $dir = 'temp/';

      if (!file_exists($dir)) {
        mkdir($dir);
      }
      $filename = $dir."perfil$id.png";

      $tamanio = 10;
      $level = 'M';
      $frameSize = 3;
      $contenido = "https://colegiograneros.cl/API/validarJunaeb.php?id=".$id;

    // Ruta donde se guardarán las imágenes
    $filepath = 'temp/myimage.png';
    // Imagen (logotipo) a dibujar
    $logopath = 'https://colegiograneros.cl/img/logo/log.png';
    // contenido del código qr
    $codeContents = 'http://ourcodeworld.com';
    // Crea el archivo en la ruta proporcionada
    // Personaliza como quieras
    QRcode::png($contenido,$filepath , QR_ECLEVEL_H, 20);
    
    // Empezar a DIBUJAR LOGO EN QRCODE
    
    $QR = imagecreatefrompng($filepath);
    
    // EMPEZAR A DIBUJAR LA IMAGEN EN EL CÓDIGO QR
    $logo = imagecreatefromstring(file_get_contents($logopath));
    
    /**
     *  Arreglo para el fondo transparente
     */
    imagecolortransparent($logo , imagecolorallocatealpha($logo , 0, 0, 0, 127));
    imagealphablending($logo , false);
    imagesavealpha($logo , true);
    
    $QR_width = imagesx($QR);
    $QR_height = imagesy($QR);
    
    $logo_width = imagesx($logo);
    $logo_height = imagesy($logo);
    
    // Escale el logotipo para que quepa en el código QR
    $logo_qr_width = $QR_width/3;
    $scale = $logo_width/$logo_qr_width;
    $logo_qr_height = $logo_height/$scale;
    
    imagecopyresampled($QR, $logo, $QR_width/3, $QR_height/3, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
    
    // Guarde el código QR de nuevo, pero con el logotipo
    imagepng($QR,$filepath);
    
    // Fin DIBUJAR LOGO EN CÓDIGO QR
    $filename = $filepath;
    // Imagen de salida en el navegador
    //echo '<img src="'.$filepath.'" />';


/*

    QrCode::png($contenido, $filename, $level,$tamanio,$frameSize);
*/
    $_SESSION['codigo'] = $filename;

    
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
              <img style='border-radius:50%;' src="
              <?php 
              if ($foto==false){
                echo 'https://icon-library.com/images/student-icon/student-icon-15.jpg';
              }else 
              {
                echo 'https://pymstatic.com/44253/conversions/xavier-molina-medium.jpg';
              }   
              ?>
              " width="200" alt="">  
            </div>
        </div> 
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 text-center">
              <h3><?php echo $nom?></h3>
              <h4>Muestra Tu Codigo</h4>
              <img src="<?php echo $filename?>" width="200" alt="">  <br/>
              <a target="_blank" href="<?php echo $filename?>" download="" class="btn btn-outline-danger">Descargar Codigo</a><br/>
              <a href="close.php">Cerrar Sesión</a>
            </div>
        </div> 
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12 d-flex justify-content-center">
              
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


