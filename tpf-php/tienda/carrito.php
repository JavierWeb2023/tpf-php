<?php
// confirmar sesion

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: index.php');
    exit;
}

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARRITO DE COMPRAS</title>
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
            <div class="row productos content">
                <div class="col">
                    <h1>CARRITO</h1>
                    <?php if (empty($carrito)){ ?>
                        <p>Tu carrito est&aacute; vac&iacute;o.</p>
                    <?php } else{ ?>
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($carrito as $item) {
                                    $subtotal = $item['precio'] * $item['cantidad'];
                                    $total += $subtotal;
                                ?>
                                    <tr>
                                        <td><img src="<?php echo $item['imagen']; ?>" alt="<?php echo $item['nombre']; ?>"></td>
                                        <td><?php echo $item['nombre']; ?></td>
                                        <td>AR$ <?php echo $item['precio']; ?></td>
                                        <td><?php echo $item['cantidad']; ?></td>
                                        <td>AR$ <?php echo $subtotal; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <p>Total: AR$ <?php echo $total; ?></p>
                        <form method="post" action="borrar_carrito.php">
                            <button type="submit" class="btn">VACIAR CARRITO</button>
                        </form>
                        <br>
                        <a href="index.php"><button class="btn">SEGUIR COMPRANDO</button></a>
                    <?php } ?>
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