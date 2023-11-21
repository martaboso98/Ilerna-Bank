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
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
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

    <section id="datosPersonales">

    <h1> Mis datos personales </h1>
        <form action="consultas/insertarDatos.php" method="POST" enctype="multipart/form-data">
            <label for="dni" class="label">DNI:</label>
                <input type="text" name="dni" id="dni" required>

            <label for="contrasenya" class="label">Contraseña:</label>
                <input type="text" name="contrasenya" id="contrasenya" required>

            <label for="nombre" class="label">Nombre: </label>
                <input type="text" name="nombre" id="nombre" required>

            <label for="apellidos" class="label">Apellidos: </label>
                <input type="text" name="apellidos" id="apellidos" required>   

            <label for="pais" class="label">País: </label>
                <input type="text" name="pais" id="pais" required> 

            <label for="correo" class="label">Correo: </label>
                <input type="email" name="correo" id="correo" required>

            <input type="file" id="imagen" name="imagen" accept="image/*">   
            <small class="form-text text-muted">Seleccione una imagen (formatos: jpg, png, jpeg).</small>

            <input type="submit" name="enviar" value="Enviar">
        </form>
    </section>

</body>
</html>
