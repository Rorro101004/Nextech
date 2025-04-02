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
                        <p class="titulo">Upcoming events</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes3"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes2"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="evento_destacado" id="eventoDes2">
                    <div class="tarjeta" id="tarjeta2">
                        <p class="titulo">CiberNext</p>
                        <p class="fecha">Date: June 15 and 16, 2025</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes1"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes3"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="evento_destacado" id="eventoDes3">
                    <div class="tarjeta" id="tarjeta3">
                        <p class="titulo">DevNext:</p>
                        <p class="fecha">Date: July 4, 2025</p>
                    </div>
                    <div class="flechas">
                        <a href="#eventoDes2"><i class="fa-solid fa-arrow-left"></i></a>
                        <a href="#eventoDes1"><i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="eventos-grid">
                <div class="evento1 evento">
                    <h3>CiberNext: <br> International Cybersecurity Summit </h3>
                    <p> <span>Date:</span> June 15 and 16, 2025</p>
                    <p><span>Place:</span> Center for Technological Innovation, Barcelona, Spain</p>
                    <span>Topics</span>
                    <p>Cyber defense and resilience</p>
                    <p>Emerging cybercrimes</p>
                    <p>Blockchain in cybersecurity</p>
                </div>
                <div class="evento2 evento">
                    <a class="event_des" href="Nextech_event_1.php">
                        <h3>DevNext: <br> International Software Development Summit</h3>
                        <p><span>Date:</span> July 4, 2025</p>
                        <p><span>Place:</span> Center for Technological Innovation, Barcelona, Spain</p>
                        <span>Topics</span>
                        <p>Scalable Software Architecture</p>
                        <p>Interactive Interface Programming</p>
                        <p>Agile Development and DevOps</p>
                    </a>
                </div>
                <div class="evento3 evento">
                    <h3>AIMinds:<br> International Artificial Intelligence Summit</h3>
                    <p> <span>Date:</span> November 25, 2025</p>
                    <p><span>Place:</span> Center for Technological Future, Madrid, Spain</p>
                    <span>Topics</span>
                    <p>AI in Digital Transformation</p>
                    <p>Machine Learning and Big Data:</p>
                    <p>Ethics in Artificial Intelligence</p>
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