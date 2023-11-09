<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Banco</title>
  <link rel="stylesheet" type="text/css" href="style3.css">
  <link href="bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">
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

  <main>
    <figure class="main_figure">
      <img src="" alt="main img">
    </figure>

    <button class="open_button" onclick="openForm()"><i class="bx bxs-chat"></i>Chat</button>

    <div class="chat_popup" id="myForm">
      <form action="#" class="form_container">
        <h2>Chatea con nosotros</h2>
        <label form="mgs"><b>Mensaje</b></label>
        <textarea name="msg" placeholder="Escribe tu mensaje aquí..." required></textarea>
        <button type="submit" class="btn">Enviar</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
      </form>
    </div>
  </main>

  <script src="main.js"></script>

</body>

</html>