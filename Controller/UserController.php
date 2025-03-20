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
        $username = $_POST["username"];
        $password = $_POST["password"];

        $passwordAdmin = 1234;
        if ($_POST["password"] == $passwordAdmin) {
            header("Location: ../View/NexTech_profile.php");
        } else {
            header("Location: ../View/NexTech_login.php");
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
</body>

</html>