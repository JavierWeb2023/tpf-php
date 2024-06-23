<?php
include('../assets/includes/conexion.php');

$name = $_POST['name'];
$surename = $_POST['surename'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, surename, email, username, password) VALUES ('$name', '$surename', '$email', '$username', '$password')";

$result=mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NUEVO USUARIO</title>
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
    include '../assets/includes/header.php';
    ?>

    <!-- =============== FIN DEL HEADER =============== -->

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="centrado">NUEVO USUARIO</h1>
            </div>
        </div>
    </div>

    <div class="content">
        <?php
        if ($result) {
        ?>
        <h2>Usuario creado exitosamente.</h2>
        <div>
            <p>Se ha creado un nuevo usuario con la siguiente informaci&oacute;n</p>
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><?= $username ?></td>
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
                    <td>Email:</td>
                    <td><?= $email ?></td>
                </tr>
                <tr>
                    <td><a href="acceder.php"><button type="button" class="btn">INICIAR SESI&Oacute;N</button></a></td>
                </tr>
            </table>
        </div>
        <?php 
        }
        else {
        ?>
        <h2>Hubo un error, no se pudo crear el usuario.</h2>
        <?php }?>
    </div>

<?php 
$conn->close();
?>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>