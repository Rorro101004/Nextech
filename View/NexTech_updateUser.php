<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
if (!isset($_SESSION["admin"])) {
    $_SESSION["admin"] = false;
}
if (!isset($_SESSION["error_updateData"])) {
    $_SESSION["error_updateData"] = "";
}
if (!isset($_SESSION["error_updatePassword"])) {
    $_SESSION["error_updatePassword"] = "";
}
if (!isset($_POST["type"])) {
    $_POST["type"] = "";
}
if (!isset($_POST["updatedata"]) && !isset($_POST["updatepassword"])) {
    header("Location: NexTech_profile.php");
    exit();
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
            <div class="box">
                <?php if (isset($_POST["updatedata"])) { ?>
                    <div class="forms_updateData">
                        <div class="updateData">
                            <h1>UPDATE</h1>
                            <p>PROFILE</p>
                        </div>
                        <div class="error">
                            <p><b><?php echo $_SESSION["error_updateData"];
                                    unset($_SESSION["error_updateData"]); ?></b></p>
                        </div>
                        <div class="form_updateData">
                            <form action="../Controller/UserController.php" method="post" enctype="multipart/form-data">
                                <div class="inputs">
                                    <label for="username">Username</label><br>
                                    <input type="text" name="username" value="<?php echo $_SESSION["username"] ?>" required><br>
                                    <label for="email">Email</label><br>
                                    <input type="email" name="email" value="<?php echo $_SESSION["email"] ?>" required><br>
                                    <label for="name">Name</label><br>
                                    <input type="text" name="name" value="<?php echo $_SESSION["name"] ?>" required><br>
                                    <label for="username">Surname</label><br>
                                    <input type="text" name="surname" value="<?php echo $_SESSION["surname"] ?>" required><br>
                                </div>
                                <div>
                                    <input type="submit" name="updateData" value="Update Data">
                                </div>
                            </form>
                        </div>
                    </div>
                <?php } else if (isset($_POST["updatepassword"])) { ?>
                    <div class="forms_updatePassword">
                        <div class="updatePassword">
                            <h1>UPDATE</h1>
                            <p>PASSWORD</p>
                        </div>
                        <div class="error">
                            <p><b><?php echo $_SESSION["error_updatePassword"];
                                    unset($_SESSION["error_updatePassword"]); ?></b></p>
                        </div>
                        <div class="form_updatePassword">
                            <form action="../Controller/UserController.php" method="post" enctype="multipart/form-data">
                                <div class="inputs">
                                    <label for="password">Password</label><br>
                                    <input type="password" name="password" required><br>
                                    <label for="conf_password">Confirm Password</label><br>
                                    <input type="password" name="conf_password" required><br>
                                </div>
                                <div>
                                    <input type="submit" name="updatePassword" value="Update Password">
                                </div>
                            </form>
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