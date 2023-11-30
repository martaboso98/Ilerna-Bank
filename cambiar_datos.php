<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
          aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse py-2 justify-content-end" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="contacto.php">CONTACTO</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="preguntas.php">PREGUNTAS FRECUENTES</a>
            </li>

            <li class="nav-item dropdown bg-warning rounded px-1 mx-2">
              <a class="nav-link dropdown-toggle active" href="#" id="dropdown08" data-bs-toggle="dropdown"
                aria-expanded="false">Hola,
                <?php include("consultas/consultaNombre.php"); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="dropdown08">
                <li><a class="dropdown-item" href="areapersonal.php">Área personal</a></li>
                <li><a class="dropdown-item" href="mensajes.php">Contacto</a></li>
                <li><a class="dropdown-item" href="consultas/cerrarSesion.php">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <!-- Segundo encabezado -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08"
          aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active text-dark" aria-current="page" href="banco.php">Ver movimientos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-dark" href="moverDinero.php">Ingresar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-dark" href="moverDinero.php" tabindex="-1" aria-disabled="true">Retirar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-dark" href="prestamos.php" tabindex="-1" aria-disabled="true">Préstamos</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>
    <form action="consultas/insertarOtrosDatos.php" method="POST">

    <p>¿Deseas cambiar tus datos?</p>
      <label for="nombre" class="label">Nombre:</label>
        <input type="text" name="nombre" id="nombre" >

      <label for="apellidos" class="label">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" >
      
      <label for="fecha" class="label">Fecha de nacimiento:</label>
        <input type="date" name="fecha" id="fecha" >

      <label for="direccion" class="label">Dirección:</label>
        <input type="text" name="direccion" id="direccion" >
      
      <label for="codigo_postal" class="label">Código Postal:</label>
        <input type="int" name="codigo_postal" id="codigo_postal" >

      <label for="ciudad" class="label">Ciudad:</label>
        <input type="text" name="ciudad" id="ciudad" >

      <label for="provincia" class="label">Provincia:</label>
        <input type="text" name="provincia" id="provincia" >

      <label for="pais" class="label">País:</label>
        <input type="text" name="pais" id="pais" >

      <input type="file" id="imagen" name="imagen" accept="image/*">   
        <small class="form-text text-muted">Seleccione una imagen (formatos: jpg, png, jpeg).</small>

      <input type="submit" name="enviar" value="Enviar">
    </form>  
    
    <form action="consultas/cambiarContrasenya.php" method="POST">
      <p>¿Deseas cambiar tu contraseña?</p>
      <label for="contrasenya" class="label">Introduce tu contraseña actual:</label>
      <input type="password" name="contrasenya" id="contrasenya" required>
      <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña

      <label for="nuevaContrasenya" class="label">Introduce tu nueva contraseña:</label>
      <input type="password" name="nuevaContrasenya" id="nuevaContrasenya" required>
      <input type="checkbox" onclick="mostrarContrasenya('nuevaContrasenya')"> Mostrar Contraseña

      <label for="nuevaContrasenyaComprobar" class="label">Repite tu nueva contraseña:</label>
      <input type="password" name="nuevaContrasenyaComprobar" id="nuevaContrasenyaComprobar" required>
      <input type="checkbox" onclick="mostrarContrasenya('nuevaContrasenya')"> Mostrar Contraseña

      <input type="submit" name="enviar" value="Enviar">
    </form> 
    

</body>

</html>