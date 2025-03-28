<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech Events</title>
    <link rel="stylesheet" href="NexTech.css">
    <script src="https://kit.fontawesome.com/8f62a99cf0.js" crossorigin="anonymous"></script>
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
            <?php if ($_SESSION["logged"] == false) { ?>
                <div class="login_register">
                    <div class="register">
                        <a href="NexTech_register.php">Register</a>
                    </div>
                    <div class="login">
                        <a href="NexTech_login.php">Login</a>
                    </div>
                </div>
            <?php } else if ($_SESSION["logged"] == true) { ?>
                <div class="logout">
                    <form action="../Controller/UserController.php" method="post">
                        <input type="submit" name="logout" value="Log out">
                    </form>
                </div>
            <?php } ?>
        </div>
    </header>

    <section>
        <div class="section">
            <div id="contentCarrusel">
                <div class="evento_destacado" id="eventoDes1">
                    <div class="tarjeta" id="tarjeta1">
                        <p class="titulo">Próximos eventos</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes3"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes2"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="evento_destacado" id="eventoDes2">
                    <div class="tarjeta" id="tarjeta2">
                        <p class="titulo">CiberNext</p>
                        <p class="fecha">Fecha: 15 y 16 de junio de 2025</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes1"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes3"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="evento_destacado" id="eventoDes3">
                    <div class="tarjeta" id="tarjeta3">
                        <p class="titulo">DevNext:

                        </p>
                        <p class="fecha">Fecha: 04 de julio de 2025</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes2"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes1"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="eventos-grid">
                <div class="evento1 evento">
                    <h3>CiberNext: <br> Internacional de Seguridad Cibernética </h3>
                    <p> <span> Fecha: </span> 04 de julio de 2025</p>
                    <p><span>Lugar:</span> Centro Tecnológico de Innovación, Barcelona, España</p>
                    <span>Temas</span>
                    <p> Ciberdefensa y resiliencia</p>
                    <p>Ciberdelitos emergentes</p>
                    <p>Blockchain en ciberseguridad</p>
                </div>
                
                    <div class="evento2 evento">
                    <a class="event_des" href="Nextech_event_1.php">
                        <h3>DevNext: <br> Cumbre Internacional de Desarrollo de Software</h3>
                        <p><span>Fecha:</span> 04 de julio de 2025</p>
                        <p><span>Lugar:</span> Centro Tecnológico de Innovación, Barcelona, España</p>
                        <span>Temas</span>
                        <p>Arquitectura de Software Escalable</p>
                        <p>Programación de Interfaces Interactivas</p>
                        <p>Desarrollo Ágil y DevOps</p>
                    </a>
                    </div>

                <div class="evento3 evento">
                    <h3> AIMinds:<br> Cumbre Internacional de Inteligencia Artificial </h3>
                    <p> <span> Fecha: </span> 25 de noviembre de 2025</p>
                    <p><span>Lugar:</span> Centro de Futuro Tecnologico, Madrid, España</p>
                    <span>Temas</span>
                    <p>AI en la Transformación Digital</p>
                    <p>Machine Learning y Big Data:</p>
                    <p>Ética en la Inteligencia Artificial</p>
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