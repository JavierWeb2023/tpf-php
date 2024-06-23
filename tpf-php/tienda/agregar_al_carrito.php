<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $producto_id = $_POST['id'];
    $producto_nombre = $_POST['servicio'];
    $producto_imagen = $_POST['imagen'];
    $producto_precio = $_POST['precio'];

    $producto = array(
        'id' => $producto_id,
        'nombre' => $producto_nombre,
        'imagen' => $producto_imagen,
        'precio' => $producto_precio,
        'cantidad' => 1
    );

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    }

    $carrito = $_SESSION['carrito'];

    $existe = false;
    foreach ($carrito as &$item) {
        if ($item['id'] == $producto_id) {
            $item['cantidad']++;
            $existe = true;
            break;
        }
    }

    if (!$existe) {
        $carrito[] = $producto;
    }

    $_SESSION['carrito'] = $carrito;
}

header('Location: carrito.php');
exit();
?>

