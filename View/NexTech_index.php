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
    <title>NexTech Menu</title>
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
            <div class="message">
                <video muted autoplay loop preload="auto" id="fondo">
                    <source src="Videos/PresentationVideo.mp4" type="video/mp4">
                    Your browser does not support the video tag
                </video>
                <?php if ($_SESSION["logged"] == false) { ?>
                    <div class="body">
                        <div class="index">
                            <div>
                                <div>
                                    <h1>¡Welcome to NexTech!</h1>
                                </div>
                                <p>We're thrilled to have you with us. Explore the latest and most exciting technology events available to you.
                                    Stay ahead of the curve and connect with industry leaders, innovators, and enthusiasts.</p>
                                <div class="explore">
                                    <div>
                                        <p>Check out the upcoming events and be part of the future of technology!</p>
                                        <a href="NexTech_events.php"><strong>Explore</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="rocket">
                                <img src="SVG/Rocket.svg" class="rocket-img" />
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="body">
                        <div class="index">
                            <div>
                                <div>
                                    <h1 style="font-size: 55px;">¡Welcome back to NexTech!</h1>
                                </div>
                                <p>We're thrilled to have you with us. Explore the latest and most exciting technology events available to you.
                                    Stay ahead of the curve and connect with industry leaders, innovators, and enthusiasts.</p>
                                <div class="explore">
                                    <div>
                                        <p>Check out the upcoming events and be part of the future of technology!</p>
                                        <a href="NexTech_events.php"><strong>Explore</strong></a>
                                    </div>
                                </div>
                            </div>
                            <div class="rocket">
                                <img src="SVG/Rocket.svg" class="rocket-img" />
                            </div>
                        </div>
                    </div>
                <?php } ?>
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