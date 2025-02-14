<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nextech</title>
</head>

<body>


    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $correo = htmlspecialchars($_POST['correo']);
        $usuario = htmlspecialchars($_POST['usuario']);
        $contraseña = htmlspecialchars($_POST['contraseña']);
        if ($contraseña == "12345") {
            echo "Bienvenido administrador " . $usuario;
        } else {
            echo "Tu correo es: " . $correo . "<br>Tu nombre de u0suario es: " . $usuario . "<br>Tu contraseña es confidencial <br>";
            echo "<img src='ruta_de_la_imagen' alt='Descripción de la imagen'>";
        }
    }
    ?>





    <h2>User Login</h2>
    <form method="post">
        <label for="correo">Correo </label>
        <input type="email" name="correo" required> <br>
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" required> <br>
        <label for="contraseña">Contraseña</label>
        <input type="password" name="contraseña" required> <br>
        <input type="submit" value="Enviar"> <br>
    </form>
</body>

</html>