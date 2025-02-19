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
        if ($_POST["option"] == "administrator") {
            if ($_POST["password"] == $password) {
                header("Location: NexTech_menu_admin.html");
            } else {
                header("Location: NexTech_menu_noadmin.html");
            }
        }
        if ($_POST["option"] == "user") {
            header("Location: NexTech_menu_user.html");
        }
    } else {
        header("Location: NexTech_menu_nologin.html");
    }
    ?>
</body>

</html>