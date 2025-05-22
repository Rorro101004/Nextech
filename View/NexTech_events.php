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
            <div class="body">
                <div class="carousel">
                    <div class="featured_event" id="upcoming">
                        <div class="background" id="background1">
                            <h1 class="title">Upcoming events</h1>
                        </div>
                        <div class="arrow">
                            <a href="#devnext"><i class="fa-solid fa-arrow-left"></i></a>
                            <a href="#cibernext"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="featured_event" id="cibernext">
                        <div class="background" id="background2">
                            <h1 class="title">CiberNext</h1>
                        </div>
                        <div class="arrow">
                            <a href="#upcoming"><i class="fa-solid fa-arrow-left"></i></a>
                            <a href="#devnext"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="featured_event" id="devnext">
                        <div class="background" id="background3">
                            <h1 class="title">DevNext</h1>
                        </div>
                        <div class="arrow">
                            <a href="#cibernext"><i class="fa-solid fa-arrow-left"></i></a>
                            <a href="#upcoming"><i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="events">
                    <div class="event1">
                        <a href="">
                            <div>
                                <h2>CiberNext</h2>
                                <h2>International Cybersecurity Summit</h2>
                            </div>
                            <div>
                                <b>Topics</b>
                            </div>
                            <div>
                                <p>Cyber defense and resilience</p>
                            </div>
                            <div>
                                <p>Emerging cybercrimes</p>
                            </div>
                            <div>
                                <p>Blockchain in cybersecurity</p>
                            </div>
                        </a>
                    </div>
                    <div class="event2">
                        <a class="event_des" href="Nextech_event_1.php">
                            <div>
                                <h2>DevNext</h2>
                                <h2>International Software Development Summit</h2>
                            </div>
                            <div>
                                <b>Topics</b>
                            </div>
                            <div>
                                <p>Scalable Software Architecture</p>
                            </div>
                            <div>
                                <p>Interactive Interface Programming</p>
                            </div>
                            <div>
                                <p>Agile Development and DevOps</p>
                            </div>
                        </a>
                    </div>
                    <div class="event3">
                        <a href="">
                            <div>
                                <h2>AIMinds</h2>
                                <h2>International Artificial Intelligence Summit</h2>
                            </div>
                            <div>
                                <b>Topics</b>
                            </div>
                            <div>
                                <p>AI in Digital Transformation</p>
                            </div>
                            <div>
                                <p>Machine Learning and Big Data:</p>
                            </div>
                            <div>
                                <p>Ethics in Artificial Intelligence</p>
                            </div>
                        </a>
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