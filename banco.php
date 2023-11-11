<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
  
  <!-- Header -->

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
            <use xlink:href="#bootstrap" />
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="index.php" class="nav-link px-2 text-white">INICIO</a></li>
          <li><a href="preguntas.php" class="nav-link px-2 text-white">PREGUNTAS FRECUENTES</a></li>
          <li><a href="contacto.php" class="nav-link px-2 text-white">CONTACTO</a></li>
        </ul>

        <div class="text-end">
          <a href="index.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
          <a href="index.php"><button type="button" class="btn btn-warning">Crear usuario</button></a>
        </div>
      </div>
    </div>
  </header>
      
    <!-- Fin header -->

    <section id="movimientos">
      <h3>Hola, <?php include_once("consultas/consultaNombre.php"); ?></h3>
      <h3>IBAN: <?php include_once("consultas/IBAN.php"); ?></h3>
      <h3>Saldo Total: <?php include_once("consultas/saldo_total.php"); ?></h3>

      <h1>Movimientos en cuenta</h1>

      <?php include_once("consultas/mostrarMovimientos.php"); ?>

      <!-- Cuando pulsas ingresar te suma la cantidad y cuando pulsas retirar te la resta-->
      <a href="moverDinero.php?accion=ingreso"><button type="button" class="btn btn-warning">Ingresar</button></a>
      <a href="moverDinero.php?accion=retiro"><button type="button" class="btn btn-danger">Retirar</button></a>

    </section>

</body>
</html>

