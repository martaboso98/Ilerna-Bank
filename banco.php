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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

  <!-- Header -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a href="banner.php"><img src="images/logoBlanco.png" alt="Logo"></a>
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
                <li><a class="dropdown-item" href="mensajes.php">Contacto</a></li>
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
    <div class="contenedorMovimientos text-white">

      <h3>Hola
        <?php include("consultas/consultaNombre.php"); ?>, hoy es
        <?php include("consultas/consultaDiaSemana.php"); ?>
      </h3>

      <div class="row">
        <div class="col-md-6">
          <p class="iban">IBAN:
            <?php include_once("consultas/consultaIban.php"); ?>
          </p>
        </div>

        <div class="col-md-4">
          <h1 class="blanco">SALDO TOTAL: <br>
            <?php include("consultas/saldo_total.php"); ?>
          </h1>
        </div>

        <div class="col-md-2">
          <!-- Cuando pulsas ingresar te suma la cantidad y cuando pulsas retirar te la resta-->
          <a href="moverDinero.php?accion=ingreso"><button type="button" class="btn btn-amarillo text-dark px-4">Ingresar</button></a>
          <a href="moverDinero.php?accion=retiro" class="p-3"><button type="button" class="btn btn-amarillo text-dark px-4">Retirar</button></a>
        </div>
      </div>

      <h3>Movimientos en cuenta</h3>
      <div class="movimientos">
        <?php include_once("consultas/mostrarMovimientos.php"); ?>
      </div>

    </div>
  </section>


</body>

</html>