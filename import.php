<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="https://colegiograneros.cl/img/logo/log.png">
    <title>Importar Listado de Alumnos</title>
  </head>
  <body class="w-100 container" style="height: 100vh;">
  
        <div style="height: 100vh;" class="container d-flex flex-column justify-content-center">
                        <form action="" id="Form_Perimport">
                                        <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                                <img src="https://colegiograneros.cl/img/logo/log.png" width="200" alt="">  
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col">
                                    <h2 class="text-center">Importar Listado de Alumnos</h2>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-lg-12">
                                        <p>Importar un archivo CSV</p>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="file" id="file_Perimport" name="file_Perimport" accept="text/csv" required >
                                    </div>
                                    <div class="col-lg-3">
                                        <button id="btnPer_import" type="submit" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Subir</button>
                                    </div>
                            </div>    
                        </form>
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