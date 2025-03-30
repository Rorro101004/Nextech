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
        echo "<p>Register button is clicked.</p>";
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
        $email = "";
        $name = "";
        $surname = "";

        // Check the database
        $stmt = $this->conn->prepare("SELECT username, password, email, name, surname FROM user WHERE username=? AND password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();

        $stmt->bind_result($username, $password, $email, $name, $surname);

        if ($stmt->fetch()) {
            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;

            echo "1";
            // Close connection
            $stmt->close();
            $this->conn->close();

            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else {
            $_SESSION["error_login"] = "WRONG USERNAME OR PASSWORD";
            header("Location: ../View/NexTech_login.php");
            exit();
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

    public function logout()
    {
        $_SESSION["logged"] = false;
        unset($_SESSION["username"]);
        unset($_SESSION["email"]);
        header("Location: ../View/NexTech_index.php");
    }


    public function register()
    {
        // Save the data
        $username = $_POST["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $password = $_POST["password"];
        $conf_password = $_POST["conf_password"];
        $email = $_POST["email"];

        if ($password != $conf_password) {
            $_SESSION["error_register"] = "THE PASSWORDS ARE NOT THE SAME";
            header("Location: ../View/NexTech_register.php");
            exit();
        }else{
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        }

        // Check the database
        $stmt = $this->conn->prepare("INSERT INTO user(username, name, surname, password, email) values (?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $username, $name, $surname, $password, $email);

        if ($stmt->execute()) {
            // Authentication successful
            $_SESSION["register_succes"] = "REGISTRATION SUCCESS";
            echo "1";
            // Close connection
            $stmt->close();
            $this->conn->close();

            // Redirect to home page
            header("Location: ../View/NexTech_login.php");
            exit();
        } else {
            $_SESSION["error_register"] = "ERROR WHILE REGISTERING";
            header("Location: ../View/NexTech_register.php");
            exit();
        }
    }
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