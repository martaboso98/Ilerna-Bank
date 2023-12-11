<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco</title>
  <link rel="stylesheet" type="text/css" href="SASS/css/styles.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="js/contrasenya.js" defer></script>
</head>

<body>

<?php
session_start();
?>

  <!-- Header -->

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a href="banner.php"><img src="images/logoBlanco.png" alt="Logo"></a>
        <div class="collapse navbar-collapse py-2 justify-content-end" id="navbarsExample08">
          <ul class="navbar-nav">
          <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="banner.php">INICIO</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="preguntas.php">PREGUNTAS FRECUENTES</a>
            </li>
            <div class="text-end">
              <a href="index.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
              <a href="datosPersonales.php"><button type="button" class="btn btn-amarillo">Crear usuario</button></a>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  <!-- Fin header -->

  <section id="datosPersonales">
    <div class="container px-5 my-5"> 
      <h1 class="text-center text-white"> Mis datos personales </h1>
      <div class="row">
        <form action="consultas/insertarDatos.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
              <label class="form-label text-white" for="dni">DNI</label>
              <input class="form-control" name="dni" id="dni" type="text" required>
          </div>
          <div class="mb-3 text-white">
              <label class="form-label text-white" for="contrasenya">Contraseña</label>
              <input class="form-control" name="contrasenya" id="contrasenya" type="password" required>
              <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña
          </div>
          <div class="mb-3">
              <label class="form-label text-white" for="nombre">Nombre</label>
              <input class="form-control" name="nombre" id="nombre" type="text" required>
          </div>
          <div class="mb-3">
              <label class="form-label text-white" for="apellidos">Apellidos</label>
              <input class="form-control" name="apellidos" id="apellidos" type="text" required>
          </div>
          <div class="mb-3">
              <label class="form-label text-white" for="pais">País</label>
              <input class="form-control" name="pais" id="pais" type="text" required>
          </div>
          <div class="mb-3">
              <label class="form-label text-white" for="correo">Correo</label>
              <input class="form-control" name="correo" id="correo" type="email" required>
          </div>
          <div class="mb-3">
              <select name="moneda" id="moneda" required>
                <option value="Euros">Euros</option>
                <option value="Dólares">Dólares</option>
                <option value="Yenes">Yenes</option>
                <option value="Libras">Libras</option>
                <option value="Rublos">Rublos</option>
              </select>          
          </div>
          <div class="mb-3">
              <input type="file" id="imagen" name="imagen" class="text-white">   
              <small class="form-text text-white" >Seleccione una imagen (formatos: jpg, png, jpeg).</small>
          </div>
          <?php
          if (isset($_SESSION["error"])) {
            foreach ($_SESSION["error"] as $key => $value) {
              echo "<p class='bg-danger p-2 text-white'>" . $value . "</p>";
            }
            unset($_SESSION["error"]);
          }
          ?>
          <div class="mb-3">
              <input type="submit" name="enviar" value="Enviar" class="btn btn-amarillo text-dark btn-block">
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>