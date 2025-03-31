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
        $email = $_POST["email"];
        $password = $_POST["password"];
        $username = "";
        $name = "";
        $surname = "";

        // Check the database
        $stmt = $this->conn->prepare("SELECT username, password, email, name, surname FROM user WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $stmt->bind_result($username, $password, $email, $name, $surname);

        if ($stmt->fetch()) {
            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;
            // Close connection
            $stmt->close();
            $this->conn->close();
            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else {
            // Close connection
            $stmt->close();
            $this->conn->close();
            $_SESSION["error_login"] = "WRONG USERNAME OR PASSWORD";
            header("Location: ../View/NexTech_login.php");
            exit();
        }
    }

    public function logout()
    {
        $_SESSION["logged"] = false;
        unset($_SESSION["username"]);
        unset($_SESSION["email"]);
        unset($_SESSION["name"]);
        unset($_SESSION["surname"]);
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
        $db_email = "";

        $stmt_email = $this->conn->prepare("SELECT email FROM user WHERE email=?");
        $stmt_email->bind_param("s", $email);
        $stmt_email->execute();

        $stmt_email->bind_result($db_email);
        if ($stmt_email->fetch()) {
            if ($email == $db_email) {
                header("Location: ../View/NexTech_register.php");
                $_SESSION["error_register"] = "THIS EMAIL IS ALREADY USED";
                exit();
            }
        }
        $stmt_email->close();

        if ($password != $conf_password) {
            $_SESSION["error_register"] = "THE PASSWORDS ARE NOT THE SAME";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        // Check the database
        $stmt = $this->conn->prepare("INSERT INTO user(username, name, surname, password, email) values (?, ?, ?, ?, ?);");
        $stmt->bind_param("sssss", $username, $name, $surname, $password, $email);

        if ($stmt->execute()) {
            // Authentication successful
            $_SESSION["register_succes"] = "REGISTRATION SUCCESS";
            // Close connection
            $stmt->close();
            $this->conn->close();

            // Redirect to home page
            header("Location: ../View/NexTech_login.php");
            exit();
        } else {
            // Close connection
            $stmt->close();
            $this->conn->close();
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