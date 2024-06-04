<?php

$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');
$id = $_GET['id'];
$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');
$result = mysqli_query($mysqli, 'SELECT * FROM `utilisateurs`');

foreach($result as $user) {
    if ($user['id'] == $id) {
        $login = $user['login'];
        $password = $user['password'];
        $admin = $user['admin'];
    }
}



?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>


    <style>

        form{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
            align-self: center;
            margin-top : 40vh;
        }

        body{
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn-submit{
            display: flex;
            background-color: lime;
            border: 1px solid black;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        section{
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        

    </style>
</head>
<body>
    <form method='POST'>
        <p>Nom d'utilisateur : </p><input type='text' name='Login' value='<?= $login ?>'><br>
        <p>Mot de passe : </p><input type='text' name='password' value='<?= $password ?>'><br>
        <?php if ($admin == '0') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user' checked>User";
            echo "<input type='radio' name = 'admin' value='moderator'>Moderator";
            echo "<input type='radio' name = 'admin' value='admin'>Admin";
            echo "</section>";
        }
        else if ($admin == '1') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user'>User";
            echo "<input type='radio' name = 'admin' value='moderator'>Moderator";
            echo "<input type='radio' name = 'admin' value='admin' checked>Admin";
            echo "</section>";
        }
        else if ($admin == '2') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user'>User";
            echo "<input type='radio' name = 'admin' value='moderator' checked>Moderator";
            echo "<input type='radio' name = 'admin' value='admin'>Admin";
            echo "</section>";
        }
        ?>
        <input type='submit' name='submit' value='submit' class = "btn-submit">
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $login = $_POST['Login'];
                $password = $_POST['password'];
                $admin = $_POST['admin'];
                if ($admin == 'user') {
                    $admin = 0;
                }
                else if ($admin == 'moderator') {
                    $admin = 2;
                }
                else if ($admin == 'admin') {
                    $admin = 1;
                }
                $sql = "UPDATE `utilisateurs` SET `login` = '$login', `password` = '$password', `admin` = '$admin' WHERE `utilisateurs`.`id` = $id";
                $result = mysqli_query($mysqli, $sql);
                header("Location: ./admin.php");
            }
        ?>
</body>
</html>