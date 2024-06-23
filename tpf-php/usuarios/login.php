<?php
session_start();
include('../assets/includes/conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE username = ? AND activo = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_name('home');
            $_SESSION['userid'] = $id;
            $_SESSION['username'] = $username;
            header("Location: ../tienda/");
            exit();
        } else {
            header("Location: acceder.php?mensaje=Clave incorrecta");
        }
    } else {
        header("Location: acceder.php?mensaje=Usuario no encontrado");
    }

    $stmt->close();
}
$conn->close();
?>
