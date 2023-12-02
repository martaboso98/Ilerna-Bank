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

  <!-- Header -->

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <img src="images/logoBlanco.png" alt="Logo">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="banner.php" class="nav-link px-2 text-white">INICIO</a></li>
          <li><a href="preguntas.php" class="nav-link px-2 text-white">PREGUNTAS FRECUENTES</a></li>
        </ul>

        <div class="text-end">
          <a href="index.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
          <a href="datosPersonales.php"><button type="button" class="btn btn-warning">Crear usuario</button></a>
        </div>
      </div>
    </div>
  </header>
  <!-- Fin header -->

  <section id="datosPersonales">

    <h1> Mis datos personales </h1>
    <form action="consultas/insertarDatos.php" method="POST" enctype="multipart/form-data">
      <label for="dni" class="label">DNI:</label>
      <input type="text" name="dni" id="dni" required>

      <label for="contrasenya" class="label">Contraseña:</label>
      <input type="password" name="contrasenya" id="contrasenya" required>
      <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña

      <label for="nombre" class="label">Nombre: </label>
      <input type="text" name="nombre" id="nombre" required>

      <label for="apellidos" class="label">Apellidos: </label>
      <input type="text" name="apellidos" id="apellidos" required>

      <label for="pais" class="label">País: </label>
      <input type="text" name="pais" id="pais" required>

      <label for="correo" class="label">Correo: </label>
      <input type="email" name="correo" id="correo" required>

      <label for="moneda" class="label">Tipo de Moneda:</label>
      <select name="moneda" id="moneda" required>
        <option value="Euros">Euros</option>
        <option value="Dólares">Dólares</option>
        <option value="Yenes">Yenes</option>
        <option value="Libras">Libras</option>
        <option value="Rublos">Rublos</option>
      </select>

      <input type="file" id="imagen" name="imagen" accept="image/*">
      <small class="form-text text-muted">Seleccione una imagen (formatos: jpg, png, jpeg).</small>

      <input type="submit" name="enviar" value="Enviar">
    </form>
  </section>

</body>

</html>