<?php
// confirmar sesion

session_start();


include('../assets/includes/conexion.php');

if (( isset($_POST['Modificar']))) {
    
    extract($_POST);

    $sql = "UPDATE users SET name='$name', surename='$surename', email='$email' WHERE id='$id'";

    $result=mysqli_query($conn, $sql);

    header("Location: perfil.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR USUARIO</title>
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


    <div class="login">
        <h1>MODIFICAR</h1>
        <?php
        $id=$_REQUEST["id"];
        $sql="SELECT * FROM users WHERE id='$id'";
        $result=mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
        ?>
        <form action="modificar.php" method="post" enctype="multipart/form-data">
            <label for="name"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="name" name="name" value="<?php echo $row["name"]; ?>" required>

            <input name="id" type="hidden" value="<?php echo $row["id"]; ?>">

            <label for="surename"><i class="fa-solid fa-id-card"></i></label>
            <input type="text" id="surename" name="surename" value="<?php echo $row["surename"]; ?>" required>

            <label for="email"><i class="fa-solid fa-envelope"></i></label>
            <input type="text" id="email" name="email" value="<?php echo $row["email"]; ?>" required>

            <input type="submit" name="Modificar" value="MODIFICAR USUARIO">
        </form>
    </div>

    <!-- =============== FOOTER =============== -->

    <?php include '../assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>