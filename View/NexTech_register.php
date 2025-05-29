<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
}
if (!isset($_SESSION["error_register"])) {
    $_SESSION["error_register"] = "";
}
if (!isset($_POST["type"])) {
    $_POST["type"] = "";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech Login</title>
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
                            <a href="Nextech_read_eventMANAGER.php" style="color:rgb(147, 0, 233)">Event manager</a>
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
            <div class="box">
                <div class="forms_register">
                    <div class="register">
                        <h1>REGISTER</h1>
                    </div>
                    <div class="error">
                        <p><b><?php echo $_SESSION["error_register"];
                                unset($_SESSION["error_register"]); ?></b></p>
                    </div>
                    <div class="type">
                        <form method="post">
                            <input type="submit" name="type" value="User">
                            <input type="submit" name="type" value="Administrator">
                        </form>
                    </div>
                    <div class="form_register">
                        <form action="../Controller/UserController.php" method="post" enctype="multipart/form-data">
                            <div class="inputs">
                                <label for="username">Username</label><br>
                                <input type="text" name="username" required><br>
                                <label for="email">Email</label><br>
                                <input type="email" name="email" required><br>
                                <label for="name">Name</label><br>
                                <input type="text" name="name" required><br>
                                <label for="username">Surname</label><br>
                                <input type="text" name="surname" required><br>
                                <label for="password">Password</label><br>
                                <input type="password" name="password" required><br>
                                <label for="conf_password">Confirm password</label><br>
                                <input type="password" name="conf_password" required><br>
                                <?php if ($_POST["type"] == "Administrator") { ?>
                                    <label for="profile_image" class="image">Profile image</label><br>
                                    <input type="file" name="profile_image" accept="image/*" required>
                                    <input type="hidden" name="admin">
                                <?php } ?>
                            </div>
                            <div>
                                <input type="submit" name="register" value="Register">
                            </div>
                        </form>
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