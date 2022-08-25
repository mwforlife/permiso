<?php

require 'controller.php';
$c = new Controller();
$Objecto="";
if (isset($_GET['id']) && isset($_GET['tipo'])) {

    if (is_numeric($_GET['id'])) {
      $id = $_GET['id'];
      $rest = $c->verificarPermiso($id);
      if ($rest==false) {
        $nom = $c->buscardatos($id);
        $Objecto = array("result"=>2,"nombre"=>$nom);
        echo json_encode($Objecto);

      }else if($rest==1){
        $nom = $c->buscardatos($id);
        $Objecto = array("result"=>1,"nombre"=>$nom);
        echo json_encode($Objecto);
        
      }else if($rest==2){
        $nom = $c->buscardatos($id);
        $Objecto = array("result"=>2,"nombre"=>$nom);
        echo json_encode($Objecto);
      }
    }else{
      $Objecto = array("result"=>3);
      echo json_encode($Objecto);
    }
}else if (isset($_GET['id'])) {
  if (is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $rest = $c->verificarPermiso($id);
    if ($rest==false) {
        $nom = $c->buscardatos($id);
        $nom .= "<br/> No tiene permiso Habilitado";
        $texto = "<div class='alert alert-danger' role='alert'>
        "
        .$nom.
        "
        </div>";
    }else if($rest==1){
        $nom = $c->buscardatos($id);
        $nom .= "<br/>Tiene permiso Habilitado";
        $texto = "<div class='alert alert-success' role='alert'>
        "
        .$nom.
        "
        </div>";
    }else if($rest==2){
        $nom = $c->buscardatos($id);
        $nom .= "<br/>No tiene permiso Habilitado";
        $texto = "<div class='alert alert-danger' role='alert'>
        "
        .$nom.
        "
        </div>";
    }


        echo "<!doctype html>";
        echo '<html lang="es">';
         echo ' <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="icon" href="https://colegiograneros.cl/img/logo/log.png">
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
            <title>Permisos!</title>
          </head>
          <body class="w-100" style="height: 100vh;">
            <div style="height: 100vh;" class="container d-flex flex-column justify-content-center">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                      <img src="https://colegiograneros.cl/img/logo/log.png" width="200" alt="">  
                    </div>
                </div> 
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-12 text-center">';
                   echo"   <h3>$texto</h3>
                    </div>
                </div> 
            </div>";
        
        echo '
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
        
        ';
    
    }else{
        $texto = "<div class='alert alert-danger'>Identificador Invalido</div>";

    }
}

?>