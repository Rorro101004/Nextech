<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
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
                    <div class="info">
                        <a href="Nextech_about_us.php" style="color:rgb(147, 0, 233)">About us</a>
                    </div>
                    <?php if ($_SESSION["logged"] == true) { ?>
                        <div class="profile_logged">
                            <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)">Profile</a>
                        </div>
                    <?php } ?>
                    <?php if ($_SESSION["admin"] == true) { ?>
                        <div class="create_event">
                            <a href="NexTech_event_manager.php" style="color:rgb(147, 0, 233)">Event manager</a>
                        </div>
                    <?php } ?>
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
                    <h1>DevNext: </h1>
                    <p class="generico"> Meet outstanding programmers in the technological field </p>
                </div>
                <div class="topico">
                    <div class="izquierda">
                        <h2>Objectives: </h2>
                        <ul>
                            <li><span>Learn</span> from renowned experts through talks and workshops.</li>
                            <li><span>Discover</span> innovative tools and practical strategies to improve your projects.</li>
                            <li><span>Establish</span> key contacts with other professionals in the sector, generating collaborations and job opportunities.</li>
                            In addition, it can be an excellent occasion to get inspired.
                        </ul>
                        <img src="Images/OIP.jpg" alt="developers">
                        <h2>Topics to cover</h2>
                        <ul>
                            <li>
                                <span>Agile development and project management methodologies:</span>
                                <br>
                                We will explore how to improve efficiency and collaboration in teams through agile approaches such as Scrum or Kanban.
                            </li>
                            <li>
                                <span>Artificial intelligence applied to software development:</span>
                                <br>
                                Discover how to integrate AI tools into your projects to optimize processes and make smarter decisions.
                            </li>
                            <li>
                                <span>Security and privacy in modern applications:</span>
                                <br>
                                Learn best practices for protecting sensitive data and complying with software security regulations.
                            </li>
                            <li>
                                <span>Advanced tools for developers:</span>
                                <br>
                                Get to know the latest tools and development environments that facilitate the creation and maintenance of applications.
                            </li>
                            <li>
                                <span>Innovation and trends in programming languages:</span>
                                <br>
                                Stay updated on emerging languages and how they can transform the future of software development.
                            </li>
                        </ul>
                    </div>
                    <div class="linea"></div>
                    <div class="derecha">
                        <h2>Place:</h2>
                        <p><span>Center for Technological Innovation, Barcelona </span>, near the Jardines de Torre Girona park</p>
                        <img src="Images/ubicacion.png" alt="location">
                        </p>
                        <h2>Date</h2>
                        <p>
                            July 4, 2025
                        </p>
                        <p>
                            <span>18:00</span>
                        </p>
                        <img src="Images/fecha.png" alt="date">
                    </div>
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