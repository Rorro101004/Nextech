<?php
session_start();
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
            <div class="inicio">
                <div class="imagenes">
                    <div>
                        <input type="checkbox" id="menu-toggle" class="menu-toggle">
                        <label for="side_bar" class="menu">☰</label>
                    </div>
                    <div class="side_bar">
                        <p>d</p>
                        <p>d</p>
                        <p>d</p>
                    </div>
                    <div class="logo">
                        <a href="NexTech_index.html"><img src="Images/NexTech logo.png" alt="Image Logo NexTech"
                                width="100px"></a>
                    </div>
                </div>
                <div class="opciones">
                    <div class="eventos">
                        <a href="NexTech_events.html" style="color:rgb(94, 6, 130)"><b>Events</b></a>
                    </div>
                    <div class="perfil">
                        <a href="NexTech_profile.php" style="color:rgb(147, 0, 233)">Profile</a>
                    </div>
                    <div class="info">
                        <p style="color:rgb(147, 0, 233)">Info</p>
                    </div>
                </div>
            </div>
            <div class="login_register">
                <div class="register">
                    <a href="NexTech_register.html">Register</a>
                </div>
                <div class="login">
                    <a href="NexTech_login.php">Login</a>
                </div>
            </div>
        </div>
    </header>

    <section>
        <div class="section">
            <div class="forms">
                <div class="error">
                    <p></p>
                </div>
                <div class="login">
                    <p>lOGIN</p>
                </div>
                <div class="form">
                    <form action="../Controller/UserController.php" method="post">
                        <div class="inputs">
                            <label for="username">USERNAME</label>
                            <input type="text" name="username" required><br>
                            <label for="password">PASSWORD</label>
                            <input type="password" name="password" required><br>
                        </div>
                        <div>
                            <input type="submit" name="login" value="Login">
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