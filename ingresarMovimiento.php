<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco</title>
  <link rel="stylesheet" type="text/css" href="SASS/css/styles.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Favicon -->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
</head>

<body>

  <?php
  session_start();
  ?>


  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a href="index.php"><img src="images/logoBlanco.png" alt="Logo"></a>
        <div class="collapse navbar-collapse py-2 justify-content-end" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="banco.php">MOVIMIENTOS</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="misPrestamos.php">MIS PRÉSTAMOS</a>
            </li>

            <li class="nav-item dropdown btn-amarillo text-white rounded px-1 mx-2">
              <a class="nav-link dropdown-toggle active btn-amarillo text-dark" href="#" id="dropdown08"
                data-bs-toggle="dropdown" aria-expanded="false">Hola,
                <?php include("consultas/consultaNombre.php"); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="areapersonal.php">Área personal</a></li>
                <li><a class="dropdown-item" href="prestamos.php">Solicitar préstamo</a></li>
                <li><a class="dropdown-item" href="mensajes.php">Bandeja de entrada</a></li>
                <li><a class="dropdown-item" href="consultas/cerrarSesion.php">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Fin header -->

  <section id="movimientos">
    <div class="container px-5 my-5">
      <h1 class="text-center p-2 text-white">MOVIMIENTOS</h1>
      <form action="consultas/ingresar.php" method="POST">
        <div class="mb-3">
          <label class="form-label text-white" for="importe">Cantidad</label>
          <input class="form-control" id="importe" name="importe" type="number" required>
        </div>
        <div class="mb-3">
          <label class="form-label text-white" for="concepto">Concepto</label>
          <input class="form-control" id="concepto" name="concepto" type="text" required>
        </div>
        <?php
        if (isset($_SESSION["error"])) {
          foreach ($_SESSION["error"] as $key => $value) {
            echo "<p class='bg-danger p-2 text-white'>" . $value . "</p>";
          }
          unset($_SESSION["error"]);
        }
        ?>
        <div class="row">
          <div class="col-md-6 text-center p-2">
            <input type="submit" name="enviar" value="Enviar" class="btn btn-warning text-dark btn-block">
          </div>
          <div class="col-md-6 text-center p-2">
            <a href="banco.php"><button type="button" class="btn btn-warning text-dark btn-block">Volver</button></a>
          </div>
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-white">
    <section class="">
      <div class="container text-center text-md-start p-2">
        <div class="row mt-3">
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <img src="images/logoBlanco.png" alt="Logo" class="mb-4">
            <p>Con Boso Financial Services puedes sacar dinero en muchos lugares. Encuentra tu cajero más cercano.</p>
          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">NUESTRA WEB</h6>
            <p><a href="index.php" class="text-reset">Inicio</a></p>
            <p><a href="preguntas.php" class="text-reset">Preguntas frecuentes</a></p>
          </div>

          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <h6 class="text-uppercase fw-bold mb-4">USUARIOS</h6>
            <p><a href="acceder.php" class="text-reset">Iniciar sesión</a></p>
            <p><a href="datosPersonales.php" class="text-reset">Registro nuevos usuarios</a></p>
          </div>

          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <h6 class="text-uppercase fw-bold mb-4">CONTACTO</h6>
            <p><i class="fas fa-home me-3"></i>Avenida de Alemania, Sevilla</p>
            <p><i class="fas fa-envelope me-3"></i>info@bfs.com</p>
            <p><i class="fas fa-phone me-3"></i> + 34 672 12 04 12</p>
          </div>
        </div>
      </div>

      <div class="text-center p-4">© 2021 Copyright: Marta Borreguero Soria</div>
    </section>
  </footer>
  <!-- Fin footer -->

</body>

</html>