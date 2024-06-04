<?php
session_start()


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Log-In</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="login">
    </form>
    <a href = "./inscription.php"><button>Inscription</button></a>

    <?php 
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

    if (isset($_POST['login'])) {
        $login = $_POST['Login'];
        $password = $_POST['password'];
        foreach($result as $user) {
            if ($login == $user['login']) {
                if ($password == $user['password']) {
                    echo "Successfully Logged in";
                    $_SESSION["login"] = $login;
                    header("refresh:1; url=./index.php");
                }
            }
        }
    }



    ?>
</body>
</html>
