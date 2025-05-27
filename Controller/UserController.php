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
    if (isset($_POST["updateData"])) {
        echo "<p>Update Data button is clicked.</p>";
        $user->updateData();
    }
    if (isset($_POST["updatePassword"])) {
        echo "<p>Update Password button is clicked.</p>";
        $user->updatePassword();
    }
    if (isset($_POST["deleteAccount"])) {
        echo "<p>Delete Account button is clicked.</p>";
        $user->deleteAccount();
    }
}


class UserController
{
    private $conn;

    public function __construct()
    {
        // Database connection data
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nextech";

        /* MySQLi connection
        // Create connection
        $this->conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        echo "Connected successfully";
        */

        // PDO connection
        try {
            // Create connection
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function login()
    {
        // Save the password and username from login
        $email = $_POST["email"];
        $password = $_POST["password"];
        // Check the database
        $stmt = $this->conn->prepare("SELECT username, password, email, name, surname, admin, image FROM user WHERE email=:email AND password=:password");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            // Authentication successful
            $_SESSION["logged"] = true;
            $_SESSION["username"] = $userData["username"];
            $_SESSION["email"] = $userData["email"];
            $_SESSION["name"] = $userData["name"];
            $_SESSION["surname"] = $userData["surname"];
            $_SESSION["profile_image"] = $userData["image"];
            if ($userData["admin"] == 1) {
                $_SESSION["admin"] = true;
            } else if ($userData["admin"] == 0) {
                $_SESSION["admin"] = false;
            }
            // Close connection
            $this->conn = null;
            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else {
            // Close connection
            $this->conn = null;
            $_SESSION["error_login"] = "WRONG USERNAME OR PASSWORD";
            header("Location: ../View/NexTech_login.php");
            exit();
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: ../View/NexTech_login.php");
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
        }

        $stmt_email = $this->conn->prepare("SELECT email FROM user WHERE email=:email");
        $stmt_email->bindParam(":email", $email);
        $stmt_email->execute();

        // Get the email if exists
        $db_email = $stmt_email->fetchColumn();

        if ($db_email !== false) {
            header("Location: ../View/NexTech_register.php");
            $_SESSION["error_register"] = "THIS EMAIL IS ALREADY USED";
            exit();
        }

        $stmt_email = null;

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
        if ($admin == true) {
            if (isset($_FILES["profile_image"]) && $_FILES["profile_image"]["error"] == 0) {
                var_dump($_FILES["profile_image"]);
                $image = file_get_contents($_FILES["profile_image"]["tmp_name"]); // Convierte la imagen en datos binarios
            } else {
                $image = ""; // Si no se sube una imagen, deja el campo como NULL
            }
            $stmt = $this->conn->prepare("INSERT INTO user(username, name, surname, password, email, admin, image) values 
            (:username, :name, :surname, :password, :email, :admin, :image);");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':admin', $admin);
            $stmt->bindParam(':image', $image);

            if ($stmt->execute()) {
                // Authentication successful
                $_SESSION["register_success"] = "REGISTRATION SUCCESS";
                // Close connection
                $this->conn = null;

                // Redirect to home page
                header("Location: ../View/NexTech_index.php");
                exit();
            } else {
                // Close connection
                $this->conn = null;
                $_SESSION["error_register"] = "ERROR WHILE REGISTERING";
                header("Location: ../View/NexTech_register.php");
                exit();
            }
        } else if ($admin == false) {
            $stmt = $this->conn->prepare("INSERT INTO user (username, name, surname, password, email, admin) values 
            (:username, :name, :surname, :password, :email, :admin);");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':surname', $surname);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':admin', $admin);

            if ($stmt->execute()) {
                // Authentication successful
                $_SESSION["register_success"] = "REGISTRATION SUCCESS";
                // Close connection
                $this->conn = null;

                // Redirect to home page
                header("Location: ../View/NexTech_index.php");
                exit();
            } else {
                // Close connection
                $this->conn = null;
                $_SESSION["error_register"] = "ERROR WHILE REGISTERING";
                header("Location: ../View/NexTech_register.php");
                exit();
            }
        }
    }

    public function updateData()
    {
        // Save the data
        $username = $_POST["username"];
        $name = $_POST["name"];
        $surname = $_POST["surname"];
        $email = $_POST["email"];

        if (!preg_match("/^[a-zA-Z0-9]{5,}$/", $username)) {
            $_SESSION["error_register"] = "THE USERNAME MUST BE AT LEAST 5 CHARACTERS LONG AND CANNOT CONTAIN SPECIAL CHARACTERS";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["error_register"] = "INVALID FORMAT OF THE EMAIL";
            header("Location: ../View/NexTech_register.php");
            exit();
        }

        $stmt = $this->conn->prepare("UPDATE user SET username = :username, name = :name, surname = :surname, email = :email WHERE email = :email2");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':email2', $_SESSION["email"]);

        if ($stmt->execute()) {
            // Authentication successful
            $_SESSION["updateData_success"] = "SUCCESSFUL DATA CHANGE";
            $_SESSION["username"] = $username;
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;
            $_SESSION["email"] = $email;
            // Close connection
            $this->conn = null;

            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else {
            // Close connection
            $this->conn = null;
            $_SESSION["error_register"] = "ERROR WHILE CHANGING THE USER DATA";
            $_SESSION["updatedata"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }
    }

    public function updatePassword()
    {
        $new_password = $_POST["new_password"];
        $conf_new_password = $_POST["conf_new_password"];

        if ($new_password != $conf_new_password) {
            $_SESSION["error_updatePassword"] = "THE PASSWORDS ARE NOT THE SAME";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }

        if (strlen($new_password) < 8) {
            $_SESSION["error_updatePassword"] = "THE PASSWORD MUST BE AT LEAST 8 CHARACTERS LONG";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }

        if (!preg_match("/[A-Z]/", $new_password)) {
            $_SESSION["error_updatePassword"] = "THE PASSWORD MUST CONTAIN A CAPITAL LETTER";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }

        if (!preg_match("/\d/", $new_password)) {
            $_SESSION["error_updatePassword"] = "THE PASSWORD MUST CONTAIN A NUMBER";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }

        // Validar si no tiene caracteres especiales
        if (preg_match("/[^A-Za-z0-9]/", $new_password)) {
            $_SESSION["error_updatePassword"] = "THE PASSWORD CANNOT CONTAIN SPECIAL CHARACTERS";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }

        $stmt = $this->conn->prepare("UPDATE user SET password = :password WHERE email = :email");
        $stmt->bindParam(':password', $new_password);
        $stmt->bindParam(':email', $_SESSION["email"]);

        if ($stmt->execute()) {
            // Authentication successful
            $_SESSION["updatePassword_success"] = "SUCCESSFUL PASSWORD CHANGE";
            // Close connection
            $this->conn = null;

            // Redirect to home page
            header("Location: ../View/NexTech_profile.php");
            exit();
        } else {
            // Close connection
            $this->conn = null;
            $_SESSION["error_register"] = "ERROR WHILE CHANGING THE PASSWORD";
            $_SESSION["updatepassword"] = true;
            header("Location: ../View/NexTech_updateUser.php");
            exit();
        }
    }

    public function deleteAccount() {}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech User Controller</title>
</head>

<body>
</body>

</html>