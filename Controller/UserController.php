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

    public function __construct()
    {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nextech";

        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
    }

    public function login()
    {
        // Save the password and username from login
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Check the database
        $stmt = $this->conn->prepare("SELECT name, password FROM user   WHERE name=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        
        if ($stmt->fetch()) {
            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["user"] = $username;    
            echo "1";
            // Close connection
            $this->conn->close();

            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
        }else{
            header("Location: ../View/NexTech_login.php");
        }

        /*
        //test
        $_SESSION["error"] = "";
        $usernameAdmin = "admin";
        $passwordAdmin = "123";
        $usernameUser = "user";
        $passwordUser = "111";
        if ($username == $usernameAdmin && $password == $passwordAdmin) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else if ($username == $usernameUser && $password == $passwordUser) {
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            header("Location: ../View/NexTech_profile.php");
            exit();
        }else{
            $_SESSION["error"] = "Incorrect Username/Password";
            header("Location: ../View/NexTech_login.php");
        }
        */
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