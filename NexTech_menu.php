<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech Menu</title>
    <link rel="stylesheet" href="Css/NexTech_menu.css">
    <style>
        <?php include 'Css/NexTech_menu.css'; ?>
        /*Enlace a archivo css*/
    </style>
</head>

<body>
    <header>
        <div class="header">
            <div class="inicio">
                <div class="imagenes">
                    <div class="barras">
                        <a href="NexTech_pages/NexTech_barra_lateral.php"><img src="Images/3 barras.png" alt="Imagen Barras" width="40px"></a>
                    </div>
                    <div class="logo">
                        <a href="NexTech_menu.php"><img src="Images/NexTech logo.png" alt="Imagen Logo NexTech" width="100px"></a>
                    </div>
                </div>
                <div class="opciones">
                    <div class="home">
                        <a href="NexTech_pages/NexTech_home.php" style="color:rgb(94, 6, 130)"><b>Home</b></a>
                    </div>
                    <div class="eventos">
                        <a href="NexTech_pages/NexTech_eventos.php" style="color:rgb(147, 0, 233)">Eventos</a>
                    </div>
                    <div class="info">
                        <p style="color:rgb(147, 0, 233)">Info</p>
                    </div>
                </div>
            </div>
            <div class="login_register">
                <div>
                    <p style="color:rgb(147, 0, 233)">Register</p>
                </div>
                <div class="login">
                    <a href="NexTech_login.php">Login</a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="section">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
                if ($_POST["option"] == "administrator") {
                    if ($_POST["password"] == 1234) { ?>
                        <div class="usuarios">
                            <h1>¡Bienvenido, Administrador <?php echo $_POST["username"] ?>!</h1>
                            <p>¿Que parte de NexTech quieres administrar?</p>
                            <p><a href="NexTech_login.php">Volver al inicio de sesión.</a></p>
                        </div>
                    <?php } else { ?>
                        <div class="usuarios">
                            <h1>Error al iniciar sesión</h1>
                            <p>Contraseña incorrecta para acceder al modo administrador.</p>
                            <p><a href="NexTech_login.php">Volver al inicio de sesión.</a></p>
                        </div>
                    <?php }
                }
                if ($_POST["option"] == "user") { ?>
                    <div class="usuarios">
                        <h1>¡Bienvenido de nuevo a NexTech，<?php echo $_POST["username"] ?>!</h1>
                        <p>Nos alegra verte aquí otra vez. Explora todo lo que hemos preparado para ti.</p>
                        <p>Descubre nuestros eventos destacados y únete a experiencias únicas.</p>
                        <p><a href="NexTech_login.php">Volver al inicio de sesión.</a></p>
                    </div>
                <?php }
            } else { ?>
                <div class="usuarios">
                    <h1>¡Bienvenido a NexTech!</h1>
                    <p>Estamos encantados de tenerte aquí. Explora todo lo que tenemos para ofrecerte.</p>
                    <p>Descubre nuestros eventos destacados y participa en experiencias únicas.</p>
                    <p>¿Aún no has iniciado sesion? <a href="NexTech_login.php">Inicia sesión ahora</a>.</p>
                </div>
            <?php }
            ?>
        </div>
    </section>

    <footer>
        <div class="contact-info">
            <p>&copy; 2025 NexTech.com. Todos los derechos reservados.</p>
            <p>Dirección: Calle Pelai 123, Barcelona, España</p>
            <p>Teléfono: +123 456 789</p>
            <p>Email: infonextech@gmail.com</p>
        </div>
    </footer>
</body>

</html>