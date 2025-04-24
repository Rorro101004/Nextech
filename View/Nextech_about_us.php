<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false; // Establece un valor predeterminado si no está definido
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
                <div class="left">
                <h1>About Us</h1>
                <p>Welcome to <strong>NexTech</strong>, your go-to platform for discovering the most important technology events in Spain. We bring visibility to conferences, workshops, and networking opportunities that shape the future of innovation.</p>

                <h2>Our Mission</h2>
                <p>Technology events drive inspiration, collaboration, and progress. Our mission is to <strong>connect people with the best tech events</strong>, helping professionals, businesses, and enthusiasts find opportunities to engage with the industry’s most influential gatherings.</p>

                <h2>What We Do</h2>
                <p>We specialize in promoting:</p>
                <ul>
                    <li> <u>Tech conferences</u>  featuring leading industry speakers.</li>
                    <li><u>Startup showcases</u> highlighting innovative companies.</li>
                    <li><u>Workshops and hackathons</u> that boost creativity and technical skills.</li>
                    <li><u>Networking events</u> that bring together professionals and visionaries.</li>
                </ul>

                <h2>Why Choose Us?</h2>
                <p>We provide a curated selection of **top-tier technology events**, ensuring that individuals and organizations can easily find and participate in **transformative experiences**. Our platform makes discovering opportunities simple and accessible.</p>

                <h2>Join Us</h2>
                <p>Looking for the sonnest big event in tech ? <strong>Nextech</strong> is here to keep you informed and connected. Start exploring today!</p>

                </div>
                <div class="right">
                    <img class="image" src="Images/generic_profile.png" alt="RodrigoC">
                    <img class="image" src="Images/generic_profile.png" alt="Joan">
                    <img class="image" src="Images/generic_profile.png" alt="RodrigoM">
                </div>
                
                <video muted autoplay loop preload="auto" id="fondo">
                    <source src="Videos/RPReplay_Final1744481644.mp4" type="video/mp4">
                    Your browser does not support the video tag
                </video>
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