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
          <div class="mb-3">
              <input type="submit" name="enviar" value="Enviar" class="btn btn-amarillo text-white btn-block">
          </div>
        </form>
      </div>
    </div>
  </section>

</body>

</html>