<?php
session_start()


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Log-in</title>
    <style>
        body{text-align: center;}
        form{border: 1px solid black; display: flex; flex-direction: column; align-items: center; padding: 10px; max-width: 400px; margin: 0 auto;}
    </style>
</head>
<body>
    <h1>Log-In</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="login" class="btn btn-success">
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
                if (password_verify($password, $user['password'])) {
                    echo "Successfully Logged in";
                    $_SESSION["login"] = $login;
                    header("Location: ./index.php");
                }
                else {
                    echo "Wrong password";
                }
            }
        }
    }



    ?>
</body>

</html>
