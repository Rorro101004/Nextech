<?php 
    session_start();
    if(!isset($_POST["type"])){
        $_POST["type"] = "";
    }
    if (!isset($_SESSION["logged"])) {
        $_SESSION["logged"] = false;
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
                    <div class="profile">
                        <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)">Profile</a>
                    </div>
                    <div class="info">
                        <p style="color:rgb(147, 0, 233)">Info</p>
                    </div>
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
            <div class="forms">
                <div class="error">
                    <p></p>
                </div>
                <div class="register">
                    <p>rEGISTEr</p>
                </div>
                <div class="type">
                    <form method="post">
                        <input type="submit" name="type" value="User">
                        <input type="submit" name="type" value="Administrator">
                    </form>
                </div>
                    <div class="form_register">
                        <form action="../Controller/UserController.php" method="post">
                            <div class="inputs">
                                <label for="name">USERNAME</label>
                                <input type="text" name="username" required><br>
                                <label for="name">NAME</label>
                                <input type="text" name="name" required><br>
                                <label for="username">SURNAME</label>
                                <input type="text" name="surname" required><br>
                                <label for="username">USERNAME</label>
                                <input type="text" name="username" required><br>
                                <label for="password">PASSWORD</label>
                                <input type="password" name="password" required><br>
                                <?php if ($_POST["type"] == "Administrator") { ?>
                                    <label for="profile_image" class="image">PROFILE IMAGE</label>
                                    <input type="file" name="profile_image">
                                <?php } ?>
                            </div>
                            <div>
                                <input type="submit" name="register" value="Register">
                            </div>
                        </form>
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