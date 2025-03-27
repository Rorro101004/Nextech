<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech</title>
    <link rel="stylesheet" href="NexTech.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header">
            <div class="start">
                <div class="images">
                    <div class="logo">
                        <a href="NexTech_index.php"><img src="Images/NexTech logo.png" alt="Image Logo NexTech"
                                width="100px"></a>
                    </div>
                </div>
                <div class="options">
                    <div class="events">
                        <a href="NexTech_events.php" style="color:rgb(94, 6, 130)"><b>Events</b></a>
                    </div>
                    <div class="profile">
                        <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)">Profile</a>
                    </div>
                    <div class="info">
                        <p style="color:rgb(147, 0, 233)">Info</p>
                    </div>
                </div>
            </div>
            <div class="login_register">
                <div class="register">
                    <a href="NexTech_register.php">Register</a>
                </div>
                <div class="login">
                    <a href="NexTech_login.php">Login</a>
                </div>
                <!-- <div class="logout">
                    <a href="NexTech_logout.php">Logout</a>
                </div> -->
            </div>
        </div>
    </header>

    <section>
        <div class="section">
            <div class="profile">
                <!-- Irá el nombre de la persona, correo ,cantidad de eventos apuntados-->
                <h1>Profile</h1>
                <div class="left">
                    <p>Foto </p>
                    <img class="foto_perfil" src="/Lenguaje_de_marcas/new%20Nextech/Nextech/View/Images/perfil_generico.png" alt="foto generica">
                    <p>Nombre generico Calderón Ye</p>
                </div>
                <div class="right">
                    <p>Correo generico</p>
                    <p>Eventos apuntados: 2</p>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="contact-info">
            <p>&copy; 2025 NexTech.com. All rights reserved.</p>
            <p>Address: Calle Pelai 123, Barcelona, Spain</p>
            <p>Phone number: +123 456 789</p>
            <p>Email: infonextech@gmail.com</p>
        </div>
    </footer>
</body>

</html>