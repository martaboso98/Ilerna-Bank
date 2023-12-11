<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco</title>
  <link rel="stylesheet" type="text/css" href="SASS/css/styles.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Agrega los scripts necesarios para Bootstrap al final del body -->
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
  <script src="js/contrasenya.js" defer></script>

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

  <section id="cambiarDatos">

    <div class="container px-5 my-5">
      <div class="row">
        <div class="col-md-6">
          <form action="consultas/insertarOtrosDatos.php" method="POST" enctype="multipart/form-data">
            <p class="text-white">¿Deseas cambiar tus datos?</p>
            <div class="mb-3">
              <label class="form-label text-white" for="nombre">Nombre</label>
              <input class="form-control" name="nombre" id="nombre" type="text">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="apellidos">Apellidos</label>
              <input class="form-control" name="apellidos" id="apellidos" type="text">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="fecha">Fecha de nacimiento</label>
              <input class="form-control" name="fecha" id="fecha" type="date">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="codigo_postal">Código postal</label>
              <input class="form-control" name="codigo_postal" id="codigo_postal" type="int">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="direccion">Dirección</label>
              <input class="form-control" name="direccion" id="direccion" type="text">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="ciudad">Ciudad</label>
              <input class="form-control" name="ciudad" id="ciudad" type="text">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="provincia">Provincia</label>
              <input class="form-control" name="provincia" id="provincia" type="text">
            </div>
            <div class="mb-3">
              <label class="form-label text-white" for="pais">País</label>
              <input class="form-control" name="pais" id="pais" type="text">
            </div>
            <div class="mb-3">
              <input type="file" id="imagen" name="imagen" class="text-white">
              <small class="form-text text-gray">Seleccione una imagen (formatos: jpg, png, jpeg).</small>
            </div>
            <div class="mb-3">
              <input type="submit" name="enviar" value="Enviar" class="btn btn-amarillo text-dark btn-block">
            </div>
          </form>
        </div>

        <div class="col-md-6">
          <form action="consultas/cambiarContrasenya.php" method="POST">
            <p class="text-white">¿Deseas cambiar tu contraseña?</p>
            <div class="mb-3 text-white">
              <label class="form-label" for="contrasenya">Introduce tu contraseña actual:</label>
              <input class="form-control" name="contrasenya" id="contrasenya" type="password" id="password" required>
              <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña
            </div>
            <div class="mb-3 text-white">
              <label class="form-label" for="nuevaContrasenya">Introduce tu contraseña nueva:</label>
              <input class="form-control" id="nuevaContrasenya" name="nuevaContrasenya" type="password" required>
              <input type="checkbox" onclick="mostrarContrasenya('nuevaContrasenya')"> Mostrar Contraseña
            </div>
            <div class="mb-3 text-white">
              <label class="form-label" for="nuevaContrasenyaComprobar">Repite tu contraseña nueva:</label>
              <input class="form-control" id="nuevaContrasenyaComprobar" name="nuevaContrasenyaComprobar"
                type="password" required>
              <input type="checkbox" onclick="mostrarContrasenya('nuevaContrasenya')"> Mostrar Contraseña
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
    </div>
  </section>

</body>

</html>