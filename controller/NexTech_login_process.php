<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech login process</title>
</head>

<body>
    <?php
    $password = 1234;
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
        switch ($_POST["option"]) {
            case "administrator":
                if ($_POST["password"] == $password) {
                    header("Location: ../NexTech_menu/NexTech_menu_admin.html");
                } else {
                    header("Location: ../NexTech_menu/NexTech_menu_noadmin.html");
                }
                break;
            case "user":
                header("Location: ../NexTech_menu/NexTech_menu_user.html");
                break;
        }
    }
    ?>
</body>

</html>