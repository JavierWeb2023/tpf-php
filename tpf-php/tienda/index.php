<?php
// confirmar sesion

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>
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
    include '../assets/includes/headerlog.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->
    
    
    <!-- =============== SECCIÓN 1 =============== -->

    <section>
        <div class="container centrado">
            <div class="row">
                <div class="col"><h1>TIENDA RAMJAV</h1></div>
            </div>
            <div class="row productos">
                <div class="col content">
                    <div class="row">
                        <?php
                        $sql="SELECT * FROM productos";
                        $result=mysqli_query($conn,$sql);

                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                        <div class="col-4">
                            <div class="row">
                                <div class="col">
                                    <p><?php echo $mostrar['servicio']; ?></p>
                                    <img src="<?php echo $mostrar['imagen']; ?>" alt="<?php echo $mostrar['servicio']; ?>">
                                </div>
                                <div class="col-6"><p>$ <?php echo $mostrar['precio']; ?></p></div>
                                <div class="col-6">
                                    <form method="post" action="agregar_al_carrito.php">
                                        <input type="hidden" name="id" value="<?php echo $mostrar['id']; ?>">
                                        <input type="hidden" name="servicio" value="<?php echo $mostrar['servicio']; ?>">
                                        <input type="hidden" name="imagen" value="<?php echo $mostrar['imagen']; ?>">
                                        <input type="hidden" name="precio" value="<?php echo $mostrar['precio']; ?>">
                                        <button type="submit" class="btn">AGREGAR</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    <a href="carrito.php"><button type="button" class="btn">VER CARRITO</button></a>
                </div>
            </div>
        </div>
    </section>

    <!-- =============== FIN DE SECCIÓN 1 =============== -->

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>