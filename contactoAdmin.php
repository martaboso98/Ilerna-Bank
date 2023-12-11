<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banco</title>
    <link rel="stylesheet" type="text/css" href="SASS/css/styles.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="js/jquery.form.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript"></script>
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
                            <a class="nav-link active" aria-current="page" href="preguntas.php">PREGUNTAS FRECUENTES</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="cuentasAdmin.php">USUARIOS</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="prestamosAdmin.php">PREGUNTAS FRECUENTES</a>
                        </li>

                        <li class="nav-item dropdown bg-warning rounded px-1 mx-2">
                            <a class="nav-link dropdown-toggle active btn-amarillo text-white" href="#" id="dropdown08"
                                data-bs-toggle="dropdown" aria-expanded="false">Hola,
                                <?php include_once("consultas/consultaNombre.php"); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown08">
                                <li><a class="dropdown-item" href="contactoAdmin.php">Bandeja de entrada</a></li>
                                <li><a class="dropdown-item" href="consultas/cerrarSesion.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Fin header -->

    <section id="contactoAdmin">
        <div div class="container px-5 my-5">
            <form method="post" action="consultas/enviarMensaje.php">
                <h3 class="text-white text-center">Nuevo mensaje:</h3>
                <?php include("consultas/mensajeria.php"); ?>
            </form>
            <?php include("consultas/mostrarMensaje.php"); ?>
        </div>
    </section>


</body>

</html>