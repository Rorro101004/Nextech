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
                            <a href="NexTech_create_event.php" style="color:rgb(147, 0, 233)">Create event</a>
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
            <div class="us">
                <div class="part">
                    <div>
                        <h2>Our Mission</h2>
                        <p>Technology events drive inspiration, collaboration, and progress. Our mission is to <strong>connect people with the best tech events</strong>, helping professionals, businesses, and enthusiasts find opportunities to engage with the industry’s most influential gatherings.</p>
                        <h2>What We Do</h2>
                        <p>We specialize in promoting:</p>
                        <ul>
                            <li>Tech conferences featuring leading industry speakers.</li>
                            <li>Startup showcases highlighting innovative companies.</li>
                            <li>Workshops and hackathons that boost creativity and technical skills.</li>
                            <li>Networking events that bring together professionals and visionaries.</li>
                        </ul>
                    </div>
                    <img class="fotos_genericas" src="Images/grupo-programadores-senior-hablando-amigos_988095-3223.jpg" alt="foto programadores">
                </div>
                <div class="part">
                    <img src="Images/planificadores-eventos-que-organizan-evento-corporativo-marina-antecedentes-tecnologicos_879736-14218.jpg" alt="organizers" class="fotos_genericas">
                    <div>
                        <h2>Why Choose Us?</h2>
                        <p>We provide a curated selection of **top-tier technology events**, ensuring that individuals and organizations can easily find and participate in **transformative experiences**. Our platform makes discovering opportunities simple and accessible.</p>
                        <h2>Join Us</h2>
                        <p>Looking for the sonnest big event in tech ? <strong>Nextech</strong> is here to keep you informed and connected. <a href="NexTech_events.php">Start exploring today!</></a>
                    </div>
                </div>
                <div style="text-align: center;">
                    <h1>Founders of Nextech</h1>
                </div>
                <div class="images">
                    <div class="member">
                        <img class="image" src="Images/generic_profile.png" alt="RodrigoC">
                        <p>RodrigoC</p>
                        <p>Especialist Backend</p>
                    </div>
                    <div class="member">
                        <img class="image" src="Images/generic_profile.png" alt="Joan">
                        <p>Joan</p>
                        <p>Product Manager</p>
                    </div>
                    <div class="member">
                        <img class="image" src="Images/generic_profile.png" alt="RodrigoM">
                        <p>RodrigoM</p>
                        <p>Especialist Frontend</p>
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