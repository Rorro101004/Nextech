<?php
session_start();

$user = new UserController;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["login"])) {
        echo "<p>Login button is clicked.</p>";
        $user->login();
    }
    if (isset($_POST["logout"])) {
        echo "<p>Logout button is clicked.</p>";
        $user->logout();
    }
    if (isset($_POST["register"])) {
        echo "<p>Login button is clicked.</p>";
        $user->register();
    }
}


class UserController
{
    private $conn;

    public function __construct() {}

    public function login()
    {
        $password = 1234;
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
            switch ($_POST["option"]) {
                case "administrator":
                    if ($_POST["password"] == $password) {
                        header("Location: ../View/NexTech_perfil.php");
                    } else {
                        $_SESSION["error"] = "Error ";
                        header("Location: ../View/NexTech_login.php");
                    }
                    break;
                case "user":
                    header("Location: ../View/NexTech_perfil.php");
                    break;
            }
        }
    }

    public function logout() {}

    public function register() {}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech login process</title>
</head>

<body>
    <?php
    /*
    $password = 1234;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        switch ($_POST["option"]) {
            case "administrator":
                if ($_POST["password"] == $password) {
                    header("Location: ../View/NexTech_menu_admin.html");
                } else {
                    header("Location: ../View/NexTech_menu_noadmin.html");
                }
                break;
            case "user":
                header("Location: ../View/NexTech_menu_user.html");
                break;
        }
    }
    */
    ?>
</body>

</html>