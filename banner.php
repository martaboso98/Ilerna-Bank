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

  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a href="banner.php"><img src="images/logoBlanco.png" alt="Logo"></a>
        <div class="collapse navbar-collapse py-2 justify-content-end" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="banner.php">INICIO</a>
            </li>
            <li class="nav-item mx-2">
              <a class="nav-link active" aria-current="page" href="preguntas.php">PREGUNTAS FRECUENTES</a>
            </li>
            <div class="text-end">
              <a href="index.php"><button type="button" class="btn btn-outline-light me-2">Acceder</button></a>
              <a href="datosPersonales.php"><button type="button" class="btn btn-warning">Crear usuario</button></a>
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
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/banco.jpg" class="card-img-top" alt="Banco de España">
            <div class="card-body">
              <h5 class="card-title">Actualidad del Banco de España</h5>
              <p class="card-text">Visita nuestros vídeos sobre el Banco de España para saber más sobre nuestra
                economía.</p>
            </div>
            <div class="card-footer">
              <a href="#videos">Más información</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/logoGrande.png" class="card-img-top" alt="Seguros BFS">
            <div class="card-body">
              <h5 class="card-title">Seguros BFS</h5>
              <p class="card-text">Infórmate sobre BFS seguros para acceder a otro de nuestros servicios de calidad.</p>
            </div>
            <div class="card-footer">
              <a href="#videos">Más información</a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card h-100 black-shadow">
            <img src="images/carnejoven.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Programa Joven</h5>
              <p class="card-text">Si eres menor de 25 años, abre tu cuenta joven y ahorra.</p>
            </div>
            <div class="card-footer">
              <a href="#videos">Más información</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Vídeos -->
  <section id="videos" class="p-5">
    <div class="container">
      <div class="row">
        <h1 class="text-white text-center py-5">ACTUALIDAD</h1>
        <div class="col-md-6">
          <!-- Primer video -->
          <iframe width="600" height="280" src="https://www.youtube.com/embed/IhKpFUCdE8Y"
            title="Visita virtual al Banco de España" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>

        <div class="col-md-6">
          <!-- Segundo video -->
          <iframe width="600" height="280" src="https://www.youtube.com/embed/nfmnOe6isYU"
            title="Funciones del Banco de España. Informe Institucional 2022" frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <footer class="text-center text-lg-start bg-dark text-white">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-reset">React</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


</body>

</html>