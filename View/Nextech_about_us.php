<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false; // Establece un valor predeterminado si no está definido
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
    <title>NexTech About us</title>
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
                        <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)"> <?php echo '<img class="profile_image" src="data:image/jpeg;base64,' . base64_encode($_SESSION["profile_image"]) . '" alt="Profile Image" >' ?></a>
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
            <div class="about_us">
                <div class="info">
                    <div class="part">
                        <div class="text">
                            <h2>Our Mission</h2>
                            <p>Technology events drive inspiration, collaboration and progress. Our mission is to <strong>connect people with the best tech events</strong>, helping professionals, businesses and enthusiasts find opportunities to engage with the industry’s most influential gatherings.</p>
                            <h2>What Do We Do?</h2>
                            <p>We specialize in promoting:</p>
                            <ul>
                                <li><strong>Tech conferences</strong> featuring leading industry speakers.</li>
                                <li><strong>Startup showcases</strong> highlighting innovative companies.</li>
                                <li><strong>Workshops and hackathons</strong> that boost creativity and technical skills.</li>
                                <li><strong>Networking events</strong> that bring together professionals and visionaries.</li>
                            </ul>
                        </div>
                        <div class="image">
                            <img src="Images/grupo-programadores-senior-hablando-amigos_988095-3223.jpg" alt="image of programmers">
                        </div>
                    </div>
                    <div class="part">
                        <div class="image">
                            <img src="Images/planificadores-eventos-que-organizan-evento-corporativo-marina-antecedentes-tecnologicos_879736-14218.jpg" alt="organizers" class="fotos_genericas">
                        </div>
                        <div class="text">
                            <h2>Our Values</h2>
                            <p>At <strong>NexTech</strong>, we are guided by a set of core values that define who we are and how we operate:</p>
                            <ul>
                                <li><strong>Innovation:</strong> We embrace events that promote creativity and forward-thinking to drive technological progress.</li>
                                <li><strong>Collaboration:</strong> We believe in the power of teamwork and partnerships to achieve great things.</li>
                                <li><strong>Integrity:</strong> We are committed to transparency, honesty, and ethical practices in everything we do.</li>
                                <li><strong>Inclusion:</strong> We strive to create an environment where everyone feels welcome and valued.</li>
                                <li><strong>Excellence:</strong> We aim to deliver the highest quality experiences for our community.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="part">
                        <div class="text">
                            <h2>Our Story</h2>
                            <p>NexTech started as a passion project in Barcelona, where we, Rodrigo Calderón, Joan Ye, and Rodrigo Mullisaca — three developers who met at <strong>STUCOM</strong> — wanted to create a space where programmers could connect, collaborate and grow.</p>
                            <p>Frustrated by how scattered tech communities were, we built <strong>NexTech</strong>: a platform designed to bring developers together through networking events, hackathons, and industry gatherings. Today, NexTech is a thriving hub where coders, engineers and tech enthusiasts, find inspiration, opportunities and meaningful connections.</p>
                        </div>
                        <div class="image">
                            <img src="Images/Student-IT-and-Tech-Support.png" alt="values" class="fotos_genericas">
                        </div>
                    </div>
                    <div class="part">
                        <div class="image">
                            <img src="Images/Data_Services_Constellation1.jpg" alt="values" class="fotos_genericas">
                        </div>
                        <div class="text">
                            <h2>Why Choose Us?</h2>
                            <p>We provide a curated selection of top-tier technology events, ensuring that individuals and organizations can easily find and participate in "transformative experiences". Our platform makes discovering opportunities simple and accessible, connecting you with the latest industry trends and innovations. Whether you're looking to expand your knowledge, network with industry leaders, or discover new technologies, NexTech offers the perfect space to grow and thrive.</p>
                            <h2>Join Us</h2>
                            <p>Looking for the next big tech event? <strong>NexTech</strong> is here to keep you informed and connected.</p>
                            <a href="NexTech_events.php">Start exploring today!</a>
                        </div>
                    </div>
                </div>

                <div class="founders">
                    <div>
                        <h1>Founders of Nextech</h1>
                    </div>
                    <div class="images">
                        <div class="member">
                            <img class="image" src="Images/imagen_rodrigo_curriculum_nou.png" alt="RodrigoC">
                            <h2>RodrigoC</h2>
                            <h3>Backend Especialist</h3>
                        </div>
                        <div class="member">
                            <img class="image" src="Images/joan_image.png" alt="Joan">
                            <h2>Joan</h2>
                            <h3>Full stack Especialist</h3>
                        </div>
                        <div class="member">
                            <img class="image" src="Images/FrontendEspecialist.png" alt="RodrigoM">
                            <h2>RodrigoM</h2>
                            <h3>Frontend Especialist</h3>
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