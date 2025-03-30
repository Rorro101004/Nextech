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
            <div class="tit">
                <h3>DevNext: </h3>
                <p class="generico"> Conoce programadores destacados en el ámbito teconologico </p>
            </div>
            <div class="topico">
                <div class="izquierda">
                    <h2>Objetivos : </h2>
                    <ul>
                        <li>Aprender de expertos de renombre mediante charlas y talleres.</li>
                        <li>Descubrir herramientas innovadoras y estrategias prácticas para mejorar tus proyectos.</li>
                        <li>Establecer contactos clave con otros profesionales del sector, generando colaboraciones y oportunidades laborales.</li>
                        <li>Además, puede ser una excelente ocasión para inspirarte.</li>
                    </ul>
                    <img src="Images/OIP.jpg" alt="desarrolladores">
                    <h2>Temáticas a tocar</h2>
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
                    <h2>Lugar:</h2>
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
            <style>
                .section .tit {
                    margin: 10px;
                    color: purple;
                    border: 2px solid black;
                    background-image: url(Images/progra.jpg);
                    background-position: center;
                    background-size: cover;
                    height: 15vh;
                    text-align: center;
                }

                .generico {
                    color: whitesmoke;

                }

                h3 {
                    font-size: 40px;
                }

                .topico {
                    display: flex;
                    justify-content: space-between;
                    margin: 10px;
                    align-items: stretch;

                    img {
                        max-width: 40%;
                        max-height: 10%;
                        align-self: center;
                        /* Alinea la imagen horizontalmente al centro */
                        margin: auto 0;
                        /* Centra la imagen verticalmente dentro de su espacio */
                    }

                    span {
                        font-weight: bold;
                    }

                }

                .izquierda {
                    display: flex;
                    /* Activa flexbox en el contenedor izquierdo */
                    flex-direction: column;
                    /* Coloca los elementos en una columna */
                    justify-content: center;
                    /* Centra verticalmente el contenido */
                    align-items: center;
                    /* Mantiene los elementos alineados a la izquierda */
                    height: 100%;
                    /* Asegura que la columna ocupe toda la altura disponible */
                }

                /* Asegura que la columna ocupe toda la altura disponible */


                .derecha {
                    display: flex;
                    /* Activa flexbox en el contenedor izquierdo */
                    flex-direction: column;
                    /* Coloca los elementos en una columna */
                    justify-content: center;
                    /* Centra verticalmente el contenido */
                    align-items: center;
                    align-content: center;
                    /* Mantiene los elementos alineados a la izquierda */
                    height: 100%;

                }

                .izquierda,
.derecha {
    flex: 1; /* Ambas columnas ocupan el mismo espacio */
    padding: 10px;
}

.linea {
    width: 10px; /* Anchura de la línea divisoria */
    background-color: #ccc; /* Color de la línea */
    margin: 0 20px; /* Espaciado entre la línea y las columnas */
    align-self: stretch; /* Extiende la línea a la altura completa del contenedor */
}
            </style>
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