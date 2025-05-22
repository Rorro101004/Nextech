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
                        <a href="NexTech_index.php"><img src="Images/NexTech logo.png" alt="Image Logo NexTech"></a>
                    </div>
                </div>
                <div class="options">
                    <div class="events">
                        <a href="NexTech_events.php" style="color:rgb(94, 6, 130)"><b>Events</b></a>
                    </div>
                    <div class="info">
                        <a href="Nextech_about_us.php" style="color:rgb(147, 0, 233)">About us</a>
                    </div>
                    <?php if ($_SESSION["admin"] == true) { ?>
                        <div class="event_manager">
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
                <div class="profile_logout">
                    <div class="profile_logged">
                        <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)"> <?php echo '<img class="profile_image" src="data:image/jpeg;base64,' . base64_encode($_SESSION["profile_image"]) . '" alt="Profile" >' ?></a>
                    </div>
                    <div class="logout">
                        <form action="../Controller/UserController.php" method="post">
                            <input type="submit" name="logout" value="Log out">
                        </form>
                    </div>
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
                        <div class="izqTitle">
                            <h2>Objectives: </h2>
                        </div>
                        
                        <div class="izqObjectives">
                            <ul>
                                <li><span>Learn</span> from renowned experts through talks and workshops.</li>
                                <li><span>Discover</span> innovative tools and practical strategies to improve your projects.</li>
                                <li><span>Establish</span> key contacts with other professionals in the sector, generating collaborations and job opportunities.</li>
                                In addition, it can be an excellent occasion to get inspired.
                            </ul>                        
                        </div>
                        
                        <img src="Images/OIP.jpg" alt="developers">
                        
                        <div class="izqTopicsTitle">
                            <h2>Topics to cover</h2>
                        </div>
                        <div class="izqTopics">
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
                        
                    </div>
                    <div class="linea"></div>
                    <div class="derecha">
                        <div class="derPlaceTitle">
                            <h2>Place:</h2>
                        </div>

                        <div class="derPlace">
                            <p>
                                <span>
                                    Center for Technological Innovation, Barcelona 
                                </span>, 
                                near the Jardines de Torre Girona park</p>
                            <iframe id="map-canvas" class="map_part" width="600" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%&amp;height=100%&amp;hl=en&amp;q=Center for Technological Innovation, Barcelona , near the Jardines de Torre Girona park&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">Powered by <a href="https://embedgooglemaps.com">how to embed google maps generator wordpress</a> and <a href="https://udenrofus.com/">online casino uden rofus</a></iframe>
                            <!-- Embed de google maps hecho con esta pagina https://embedgooglemaps.com/es/-->
                            </p>
                        </div>

                        <img src="Images/ubicacion.png" alt="location">
                        
                        <div class="derDateTitle">
                            <h2>Date</h2>
                        </div>

                        <div class="derDate">
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
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="wrapper">
                <div class="footer-widget">
                    <a href="#">
                        <img src="images/footerLogo.png" class="logo" />
                    </a>
                    <p class="desc">
                        NexTech connects you with the latest tech events, resources, and support. Explore, learn, and grow with our community!
                    </p>
                </div>
                <div class="footer-widget">
                    <h6>Quick Link</h6>
                    <div class="links">
                        <a href="NexTech_events.php">Events</a>
                        <a href="Nextech_about_us.php">About us</a>
                    </div>
                </div>
                <div class="footer-widget">
                    <h6>Help &amp; Support</h6>
                    <div class="links">
                        <p>Address: Calle Pelai 123, Barcelona, Spain</p>
                        <p>Phone number: +123 456 789</p>
                        <p>Email: infonextech@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper">
                <p>Design and Developed by <a href="#" target="blank">NexTech</a> 2024/2025</p>
            </div>
        </div>
    </footer>
</body>

</html>