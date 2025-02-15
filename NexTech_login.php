<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech Login</title>
    <link rel="stylesheet" href="Text.css">
    <style>
        <?php include 'Test.css'; ?>
        /*Enlace a archivo css*/
    </style>
</head>

<body>
    <header>
        <div class="header">
            <div class="inicio">
                <div class="imagenes">
                    <div>
                        <a href="NexTech_barra_lateral.php">Barras</a>
                    </div>
                    <div>
                        <img src="Images/NexTech logo.png" alt="Imagen Logo NexTech" width="100px">
                    </div>

                </div>
                <div class="opciones">
                    <div>
                        <a href="NexTech_menu.php">Menu</a>
                    </div>
                    <div>
                        <a href="NexTech_eventos.php">Eventos</a>
                    </div>
                    <div>
                        <p>Info</p>
                    </div>
                </div>
            </div>
            <div class="login">
                <div>
                    <a href="NexTech_login.php">Login</a>
                </div>
                <div>
                    <p>Register</p>
                </div>
            </div>
        </div>
        <hr>
    </header>

    <section>
        <br><br><br><br>
        <div class="forms">
            <form  method="post">
                <label>
                    Administrator<input type="radio" name="option" value="Administrator" required>
                </label>
                <label for="User">
                    User<input type="radio" name="option" value="User">
                </label><br>
                <label for="username">Username</label>
                <input type="text" name="username" required><br>
                <label for="email">Email</label>
                <input type="email" name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"><br>
                <label for="password">Password</label>
                <input type="password" name="password" required><br>
                <input type="submit" name="login" value="Login">
            </form>
        </div>
    </section>

    <footer>
    <div class="contact-info">
            <p>Dirección: Calle Pelai 123, Barcelona, España</p>
            <p>Teléfono: +123 456 7890</p>
            <p>Email: <a href="mailto:info@nextech.com">info@nextech.com</a></p>
    </div>
    </footer>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    echo "$username, $email, $password";
} if(isset($_POST["login"]) && isset($_POST["option"])){
    if ($_POST["option"]=="Administrador") {
        echo "<h1>¡Bienvenido, Administrador $username!</h1> <p> Que parte de Nextech quieres administrar </p>";
    } else {
    echo "<h1>¡Bienvenido a  Nextech!</h1> <h1> $username </h1>";
    echo "<p>Estamos encantados de tenerte aquí.
     Explora nuestras eventos disponibles o los no disponibles; o creas los tuyos propios.</p>";
     echo "<a href='inicio.html' class='button'>Empezar</a>";
    }
}
?>