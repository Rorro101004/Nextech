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
        $admin = 0;

        // Check the database
        $stmt = $this->conn->prepare("SELECT username, password, email, name, surname, admin FROM user WHERE email=? AND password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();

        $stmt->bind_result($username, $password, $email, $name, $surname, $admin);

        if ($stmt->fetch()) {
            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;
            if ($admin = 1) {
                $_SESSION["admin"] = true;
            } else {
                $_SESSION["admin"] = false;
            }
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
        session_unset();
        session_destroy();
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
        $admin = false;
        if (isset($_POST["admin"])) {
            $admin = true;
            $image = "";
        }

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

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error_register"] = "INVALID FORMAT OF THE EMAIL";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if (!preg_match("/^[a-zA-Z0-9]{5,}$/", $username)) {
            $_SESSION["error_register"] = "THE USERNAME MUST BE AT LEAST 5 CHARACTERS LONG AND CANNOT CONTAIN SPECIAL CHARACTERS";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if ($password != $conf_password) {
            $_SESSION["error_register"] = "THE PASSWORDS ARE NOT THE SAME";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if (strlen($password) < 8) {
            $_SESSION["error_register"] = "THE PASSWORD MUST BE AT LEAST 8 CHARACTERS LONG";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if (!preg_match("/[A-Z]/", $password)) {
            $_SESSION["error_register"] = "THE PASSWORD MUST CONTAIN A CAPITAL LETTER";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if (!preg_match("/\d/", $password)) {
            $_SESSION["error_register"] = "THE PASSWORD MUST CONTAIN A NUMBER";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        // Validar si no tiene caracteres especiales
        if (preg_match("/[^A-Za-z0-9]/", $password)) {
            $_SESSION["error_register"] = "THE PASSWORD CANNOT CONTAIN SPECIAL CHARACTERS";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        // Check the database
        if ($admin == false) {
            $stmt = $this->conn->prepare("INSERT INTO user(username, name, surname, password, email, admin, image) values (?, ?, ?, ?, ?, ?, ?);");
            $stmt->bind_param("sssssss", $username, $name, $surname, $password, $email, $admin, $image);

            if ($stmt->execute()) {
                // Authentication successful
                $_SESSION["register_success"] = "REGISTRATION SUCCESS";
                // Close connection
                $stmt->close();
                $this->conn->close();

                // Redirect to home page
                header("Location: ../View/NexTech_index.php");
                exit();
            } else {
                // Close connection
                $stmt->close();
                $this->conn->close();
                $_SESSION["error_register"] = "ERROR WHILE REGISTERING";
                header("Location: ../View/NexTech_register.php");
                exit();
            }
        } else if ($admin == true) {
            $stmt = $this->conn->prepare("INSERT INTO user(username, name, surname, password, email, admin) values (?, ?, ?, ?, ?);");
            $stmt->bind_param("sssss", $username, $name, $surname, $password, $email, $admin);

            if ($stmt->execute()) {
                // Authentication successful
                $_SESSION["register_success"] = "REGISTRATION SUCCESS";
                // Close connection
                $stmt->close();
                $this->conn->close();

                // Redirect to home page
                header("Location: ../View/NexTech_index.php");
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