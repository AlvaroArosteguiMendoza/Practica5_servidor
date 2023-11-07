<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i> 
            </div>
            <div class="input-box">
                <input name="password" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">               
                <p>Don't have an account? <a href="#">Register</a></p>
            </div>
        </form>
    </div>

    <!-- PARA PROCESAR EL FORMULARIO -->
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $contraseñaAdmin = "1234";

    session_start();

    if ($username === "admin" && $password === $contraseñaAdmin) {
        // Si el usuario es "admin" y la contraseña coincide, inicia sesión
        $_SESSION['username'] = $username;
        $_SESSION['access_time'] = date("Y-m-d H:i:s");
        header("Location: opciones.php");
        exit();
    } elseif ($username === "cliente1") {
        // Si el usuario es cliente1, no se verifica la contraseña, simplemente se inicia sesión
        $_SESSION['username'] = $username;
        $_SESSION['access_time'] = date("Y-m-d H:i:s");
        header("Location: opciones.php");
        exit();
    } else {
        echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
    }
}
    ?>
</body>
</html>

