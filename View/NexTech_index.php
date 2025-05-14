<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
if (!isset($_SESSION["admin"])){
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
                    <div>
                        <h1>¡Welcome to NexTech!</h1>
                    </div>
                    <div class="body">
                        <div>
                            <p>The future of technology is waiting for you. At NexTech, we are passionate about connecting industry leaders with the brightest minds.
                                Here, you'll find the most exciting tech events designed to inspire, educate, and connect.</p>
                            <p>Join us and be part of the digital transformation shaping tomorrow.
                                You're just one click away from experiencing the next big technological revolution!</p>
                        </div>
                        <p><b>Not registered or logged in?</b></p>
                        <div class="links">
                            <div>
                                <a href="NexTech_register.php"><strong>Register</strong></a>
                            </div>
                            &nbsp;&nbsp;&nbsp;<p>|</p>&nbsp;&nbsp;&nbsp;
                            <div>
                                <a href="NexTech_login.php"><strong>Login</strong></a>
                            </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <div>
                        <h1>¡Welcome back to NexTech!</h1>
                    </div>
                    <div class="body">
                        <div>
                            <div>
                                <p>We're thrilled to have you with us. Explore the latest and most exciting technology events available to you.
                                    Stay ahead of the curve and connect with industry leaders, innovators, and enthusiasts.</p>
                            </div>
                            <div class="explore">
                                <div>
                                    <p>Check out the upcoming events and be part of the future of technology!</p>
                                    <a href="NexTech_events.php"><strong>Explore</strong></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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