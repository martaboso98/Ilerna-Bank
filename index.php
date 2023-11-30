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
    <script src="js/contrasenya.js" defer></script>
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
              </ul>
      
              <div class="text-end">
                <a href="index.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
                <a href="datosPersonales.php"><button type="button" class="btn btn-warning">Crear usuario</button></a>
              </div>
            </div>
          </div>
        </header>
      
    <!-- Fin header -->

    <section id="datos_acceso">
        <p class="negrita">Hola, introduce tus datos de acceso:</p>
        
        <form action="consultas/consulta1.php" method="POST">
            <div>
            <label for="dni" class="label">Introduce tu DNI:</label>
              <input type="text" name="dni" id="dni" placeholder="DNI/NIE" required>
            </div>

            <div>
            <label for="contrasenya" class="label">Contraseña:</label>
              <input type="password" name="contrasenya" id="contrasenya" placeholder="Contraseña" required>
              <input type="checkbox" onclick="mostrarContrasenya('contrasenya')"> Mostrar Contraseña
            <!-- He olvidado mi contraseña:
            Si no recuerdas tu contraseña de acceso, desde esta página puedes solicitarla.<label DNI>
            Este servicio solo será válido si previamente no has bloqueado tus claves de acceso. En ese caso, deberás ponerte en contacto con tu oficina o con los servicios de atención de tu entidad.-->
            </div>

            <input type="submit" name="enviar" value="Enviar">
        </form>
        
        <p>Estás en un entorno seguro con Boso Financial Services (BFS).</p>

    </section>
</body>
</html>

