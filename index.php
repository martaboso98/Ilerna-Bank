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
              <a href="datosPersonales.php"><button type="button" class="btn btn-warning">Crear usuario</button></a>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Fin header -->
  <section id="logIn">

    <div class="container">
      <p class="negrita text-center text-white">Hola, introduce tus datos de acceso:</p>
      <form action="consultas/consulta1.php" method="POST" id="miFormulario">
        <div class="mb-3">
          <label class="form-label text-white" for="dni">Introduce tu DNI:</label>
          <input class="form-control" id="dni" name="dni" type="text" placeholder="DNI sin letra" required>
        </div>
        <div class="mb-3 text-white">
          <label class="form-label" for="contrasenya">Contraseña</label>
          <input class="form-control" id="contrasenya" name="contrasenya" type="password" required>
          <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña
          <!-- He olvidado mi contraseña:
            Si no recuerdas tu contraseña de acceso, desde esta página puedes solicitarla.<label DNI>
            Este servicio solo será válido si previamente no has bloqueado tus claves de acceso. En ese caso, deberás ponerte en contacto con tu oficina o con los servicios de atención de tu entidad.-->
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
          <input type="submit" name="enviar" value="Enviar" class="btn btn-warning text-dark btn-block">
        </div>
      </form> <br>
      <p class="text-center text-white">Estás en un entorno seguro con Boso Financial Services (BFS).</p>
    </div>
  </section>

</body>

</html>