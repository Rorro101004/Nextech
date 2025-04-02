<?php
session_start();
if (!isset($_SESSION["logged"])) {
    $_SESSION["logged"] = false;
}
if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "";
}
if (!isset($_SESSION["email"])) {
    $_SESSION["email"] = "";
}
if (!isset($_SESSION["name"])) {
    $_SESSION["name"] = "";
}
if (!isset($_SESSION["surname"])) {
    $_SESSION["surname"] = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech</title>
    <link rel="stylesheet" href="NexTech.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
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
            <div class="profile">
                <div class="title">
                    <h1>User Profile</h1>
                </div>
                <div class="sides">
                    <div class="left">
                        <div>
                            <p>Username: <?php echo $_SESSION["username"] ?> </p>
                        </div>
                        <div>
                            <p>Email: <?php echo $_SESSION["email"] ?></p>
                        </div>
                        <div>
                            <p>Name: <?php echo $_SESSION["name"] ?></p>
                        </div>
                        <div>
                            <p>Surname: <?php echo $_SESSION["surname"] ?></p>
                        </div>
                    </div>
                    <div class="right">
                        <div>
                            <p>Image</p>
                        </div>
                        <div>
                            <img class="profile_image" src="Images/generic_profile.png" alt="generic_image">
                        </div>
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