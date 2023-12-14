<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
    <!-- Css y bootstrap -->
    <link rel="stylesheet" type="text/css" href="SASS/css/styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <!-- Iconos footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">
</head>

<body>
    <div id="main-container">

        <!-- Header -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5" aria-label="Tenth navbar example">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="index.php"><img src="images/logoBlanco.png" alt="Logo"></a>
                    <div class="collapse navbar-collapse py-2 justify-content-end text-center text-lg-start"
                        id="navbarsExample08">
                        <ul class="navbar-nav">
                            <li class="nav-item mx-2">
                                <a class="nav-link active" aria-current="page" href="cuentasAdmin.php">USUARIOS</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link active" aria-current="page" href="prestamosAdmin.php">PRÉSTAMOS</a>
                            </li>

                            <li class="nav-item dropdown bg-warning rounded px-1 mx-2">
                                <a class="nav-link dropdown-toggle active btn-amarillo text-dark" href="#"
                                    id="dropdown08" data-bs-toggle="dropdown" aria-expanded="false">Hola,
                                    <?php include_once("consultas/consultaNombre.php"); ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdown08">
                                    <li><a class="dropdown-item" href="contactoAdmin.php">Bandeja de entrada</a></li>
                                    <li><a class="dropdown-item" href="consultas/cerrarSesion.php">Cerrar sesión</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Fin header -->

        <section id="cuentasAdmin">
            <div class="contenedorAreaPersonal">
                <h1 class="text-center p-2 text-white">CONSULTA DE USUARIOS</h1>
                <div class="centrarImagen">;
                    <?php include("consultas/consultarUsuarios.php"); ?>
                </div>
                <div class="areaPersonal">
                    <?php include("consultas/mostrarUsuariosAdmin.php"); ?>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center text-lg-start bg-dark text-white">
            <section class="">
                <div class="container text-center text-md-start p-2">
                    <div class="row mt-3">
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto">
                            <img src="images/logoBlanco.png" alt="Logo" class="mb-4">
                            <p>Con Boso Financial Services puedes sacar dinero en muchos lugares. Encuentra tu cajero
                                más cercano.</p>
                        </div>

                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                            <h6 class="text-uppercase fw-bold">NUESTRA WEB</h6>
                            <p><a href="index.php" class="text-reset">Inicio</a></p>
                            <p><a href="preguntas.php" class="text-reset">Preguntas frecuentes</a></p>
                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                            <h6 class="text-uppercase fw-bold">USUARIOS</h6>
                            <p><a href="acceder.php" class="text-reset">Iniciar sesión</a></p>
                            <p><a href="datosPersonales.php" class="text-reset">Registro nuevos usuarios</a></p>
                        </div>

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
                            <h6 class="text-uppercase fw-bold">CONTACTO</h6>
                            <p><i class="fas fa-home me-3"></i>Avenida de Alemania, Sevilla</p>
                            <p><i class="fas fa-envelope me-3"></i>info@bfs.com</p>
                            <p><i class="fas fa-phone me-3"></i> + 34 672 12 04 12</p>
                        </div>
                    </div>
                </div>

                <div class="text-center p-2">© 2021 Copyright: Marta Borreguero Soria</div>
            </section>
        </footer>
        <!-- Fin footer -->
    </div>
</body>

</html>