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

                        <li class="nav-item dropdown btn-amarillo text-white rounded px-1 mx-2">
                            <a class="nav-link dropdown-toggle active btn-amarillo text-white" href="#" id="dropdown08"
                                data-bs-toggle="dropdown" aria-expanded="false">Hola,
                                <?php include("consultas/consultaNombre.php"); ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdown08">
                                <li><a class="dropdown-item" href="areapersonal.php">Área personal</a></li>
                                <li><a class="dropdown-item" href="prestamos.php">Solicitar préstamo</a></li>
                                <li><a class="dropdown-item" href="mensajes.php">Contacto</a></li>
                                <li><a class="dropdown-item" href="consultas/cerrarSesion.php">Cerrar sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <!-- Segundo encabezado -->
        <nav class="navbar navbar-expand-lg navbar-dark btn-amarillo" aria-label="Tenth navbar example">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active text-dark" aria-current="page" href="banco.php">Ver
                                movimientos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="moverDinero.php">Ingresar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="moverDinero.php" tabindex="-1"
                                aria-disabled="true">Retirar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-dark" href="misPrestamos.php" tabindex="-1"
                                aria-disabled="true">Mis préstamos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <!-- Fin header -->

    <section id="movimientos">
        <div class="container px-5 my-5">
            <h1 class="text-center p-2 text-white">MOVIMIENTOS</h1>
            <form action="consultas/ingresarRetirar.php" method="POST" id="cantidadConcepto">
                <div class="mb-3">
                    <label class="form-label text-white" for="importe">Cantidad</label>
                    <input class="form-control" id="importe" name="importe" type="float" required>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white" for="concepto">Concepto</label>
                    <input class="form-control" id="concepto" name="concepto" type="text" required>
                </div>
                <div class="row">
                    <div class="col-md-6 text-center p-2">
                        <!-- Para llamar a la acción del botón de ingresar y retirar -->
                        <input type="hidden" name="accion"
                            value="<?php echo isset($_GET['accion']) ? $_GET['accion'] : ''; ?>">
                        <input type="submit" name="enviar" value="Enviar" class="btn btn-warning text-dark btn-block">
                    </div>
                    <div class="col-md-6 text-center p-2">
                        <a href="banco.php"><button type="button"
                                class="btn btn-warning text-dark btn-block">Volver</button></a>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="js/validacion.js" type="text/javascript"></script>

</body>

</html>