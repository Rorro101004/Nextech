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
    <title>Event</title>
    <link rel="stylesheet" href="NexTech.css">
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
            <div class="event_unic">
                <div class="tit">
                    <h2>DevNext: </h2>
                    <p class="generico"> Conoce programadores destacados en el ámbito teconologico </p>
                </div>
                <div class="topico">
                    <div class="izquierda">
                        <h3>Objetivos : </h3>
                        <ul>
                            <li>Aprender de expertos de renombre mediante charlas y talleres.</li>
                            <li>Descubrir herramientas innovadoras y estrategias prácticas para mejorar tus proyectos.</li>
                            <li>Establecer contactos clave con otros profesionales del sector, generando colaboraciones y oportunidades laborales.</li>
                            <li>Además, puede ser una excelente ocasión para inspirarte.</li>
                        </ul>
                        <img src="Images/OIP.jpg" alt="desarrolladores">
                        <h3>Temáticas a tocar</h3>
                        <ul>
                            <li>
                                <span>Desarrollo ágil y metodologías de gestión de proyectos:</span>
                                <br>
                                Exploraremos cómo mejorar la eficiencia y colaboración en equipos mediante enfoques ágiles como Scrum o Kanban.
                            </li>
                            <li>
                                <span>Inteligencia artificial aplicada en el desarrollo de software:</span>
                                <br>
                                Descubre cómo integrar herramientas de IA en tus proyectos para optimizar procesos y tomar decisiones más inteligentes.
                            </li>
                            <li>
                                <span>Seguridad y privacidad en aplicaciones modernas:</span>
                                <br>
                                Aprende las mejores prácticas para proteger datos sensibles y cumplir con regulaciones de seguridad en el software.
                            </li>
                            <li>
                                <span>Herramientas avanzadas para desarrolladores:</span>
                                <br>
                                Conoce las últimas herramientas y entornos de desarrollo que facilitan la creación y mantenimiento de aplicaciones.
                            </li>
                            <li>
                                <span>Innovación y tendencias en lenguajes de programación:</span>
                                <br>
                                Mantente actualizado sobre los lenguajes emergentes y cómo pueden transformar el futuro del desarrollo de software.
                            </li>
                        </ul>
                    </div>
                    <div class="linea"></div>
                    <div class="derecha">
                        <h3>Lugar:</h3>
                        <p><span>Centro Tecnológico de Innovación, Barcelona </span>, cerca del parque Jardines de Torre Girona</p>
                        <img src="Images/ubicacion.png" alt="ubicacion">
                        </p>
                        <h2>Fecha</h2>
                        <p>
                            04 de julio de 2025
                        </p>
                        <p>
                            <span>18:00</span>
                        </p>
                        <img src="Images/fecha.png" alt="fecha">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="contact-info only">
            <p>&copy; 2025 NexTech.com. All rights reserved.</p>
            <p>Address: Calle Pelai 123, Barcelona, Spain</p>
            <p>Phone number: +123 456 789</p>
            <p>Email: infonextech@gmail.com</p>
        </div>
    </footer>

</body>

</html>