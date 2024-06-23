<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCESO A LA TIENDA</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/ba8d58fd8a.js" crossorigin="anonymous"></script>
</head>
<body>

    <!-- =============== HEADER =============== -->
    <?php
    include '../assets/includes/header.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    <div class="login">
        <h1>LOGIN</h1>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <label for="username"><i class="fa-solid fa-user"></i></label>
            <input type="text" name="username" placeholder="Usuario" id="username" required>

            <label for="password"><i class="fa-solid fa-lock"></i></label>
            <input type="password" name="password" placeholder="Contrase&ntilde;a" id="password" required>
            <input type="submit" value="ACCEDER">
        </form>
    </div>
    <div class="row nuevo centrado">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="row">
                <div class="col-6"><p>¿No tienes una cuenta?</p></div>
                <div class="col-6"><p><a href="registrarse.php">Registrate</a></p></div>
            </div>
        </div>
        <div class="col-4"></div>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>