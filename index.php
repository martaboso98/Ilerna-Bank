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
  <!-- Favicon -->
  <link rel="icon" href="images/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

</head>

<body>

  <!-- Header -->

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a href="index.php"><img src="images/logoBlanco.png" alt="Logo"></a>
        <div class="collapse navbar-collapse py-2 justify-content-end" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="index.php">INICIO</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="preguntas.php">PREGUNTAS FRECUENTES</a>
            </li>
            <div class="text-end">
              <a href="acceder.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
              <a href="datosPersonales.php" class="btn btn-amarillo">Crear usuario</a>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Fin header -->

  <!-- Banner -->
  <section id="banner">
    <div class="container-fluid negro">
      <div class="text-center imagenBanner">
        <a href="index.php"><img src="images/tarjeta.png" alt="banner" class="banner img-fluid white-shadow"></a>
      </div>
    </div>
  </section>

  <!-- Info -->
  <section id="informacion" class="p-5 bg-dark">
    <div class="container">
      <h1 class="text-white text-center p-5">INFORMACIÓN DE INTERÉS</h1>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/seguro.png" class="card-img-top" alt="Seguros BFS">
            <div class="card-body">
              <h5 class="card-title">Seguros BFS</h5>
              <p class="card-text">Infórmate sobre BFS seguros para acceder a otro de nuestros servicios de calidad.</p>
            </div>
            <div class="card-footer">
              <a href="#videos" class="btn btn-amarillo">Más información</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/banco.png" class="card-img-top" alt="Banco de España">
            <div class="card-body">
              <h5 class="card-title">Actualidad del Banco de España</h5>
              <p class="card-text">Visita nuestros vídeos sobre el Banco de España para saber más sobre nuestra
                economía.</p>
            </div>
            <div class="card-footer">
              <a href="#videos" class="btn btn-amarillo">Más información</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/carnejoven.png" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Programa Joven</h5>
              <p class="card-text">Si eres menor de 25 años, abre tu cuenta joven y ahorra.</p>
            </div>
            <div class="card-footer">
              <a href="#videos" class="btn btn-amarillo">Más información</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vídeos -->
  <section id="videos" class="p-5">
    <div class="container">
        <h1 class="text-white text-center py-5">ACTUALIDAD</h1>
        <div class="contenedor-video">           
            <iframe src="https://www.youtube.com/embed/IhKpFUCdE8Y"
              title="Visita virtual al Banco de España" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe>
          </div>

          <div class="contenedor-video">
            <iframe src="https://www.youtube.com/embed/nfmnOe6isYU"
              title="Funciones del Banco de España. Informe Institucional 2022" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen></iframe>
        </div>
      </div>
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