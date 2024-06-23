<?php
// confirmar sesion

session_start();

if (!isset($_SESSION['userid'])) {

    header('Location: ../index.php');
    exit;
}

include('../assets/includes/conexion.php');

$stmt = $conn->prepare('SELECT name, surename, email, username, password, imagen FROM users WHERE id = ?');

$stmt->bind_param('i', $_SESSION['userid']);
$stmt->execute();
$stmt->bind_result($name, $surename, $email, $username, $password, $imagen);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL DEL USUARIO</title>
    <link rel="icon" href="../assets/images/favicon.webp" sizes="32x32">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    
    <!-- =============== HEADER =============== -->
    <?php
    include '../assets/includes/headerlog.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    <div class="content">
        <h2>Informaci&oacute;n del Usuario</h2>
        <div>
            <p>
                La siguiente es la informaci&oacute;n registrada de tu cuenta
            </p>
            <table>
                <tr>
                    <td>
                        <table class="centrado">
                            <tr>
                                <td>
                                    <img class="foto-perfil" src="<?= $imagen ?>" alt="Perfil">
                                    <p class="desc-foto">(resoluci&oacute;n m&aacute;xima 150px X 150px)</p>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="subir_foto.php"><button type="button" class="btn">A&Ntilde;ADIR FOTO</button></a></td>
                            </tr>
                            <tr>
                                <td><a href="eliminar_foto.php"><button type="button" class="btn">ELIMINAR FOTO</button></a></td>
                            </tr>
                        </table>  
                    </td>
                    <td>
                        <table>
                            <tr>
                                <td>Variable de sesi&oacute;n:</td>
                                <td><?= session_id() ?></td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td><?= $name ?></td>
                            </tr>
                            <tr>
                                <td>Apellido:</td>
                                <td><?= $surename ?></td>
                            </tr>
                            <tr>
                                <td>Usuario:</td>
                                <td><?= $_SESSION['username'] ?></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><?= $email ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="modificar.php?id=<?= $_SESSION['userid']; ?>"><button type="button" class="btn">MODIFICAR USUARIO</button></a>
                                    <a href="eliminar.php?id=<?= $_SESSION['userid']; ?>"><button type="button" class="btn">ELIMINAR USUARIO</button></a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>