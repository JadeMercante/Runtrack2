<?php
session_name('jadempinkyweb');
session_start();

if (isset($_SESSION['login'])) {
    header("Location: ./profile.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<?php include('../Include/head.php'); ?>
<body class = "bodyLlogin">
    <h1>Log-In</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" name="login" value="login" class="btn btn-success">
    </form>
    <a href = "./register.php"><button>Inscription</button></a>

    <?php 
    $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
    $result = mysqli_query($mysqli, "SELECT * FROM `users`");

    if (isset($_POST['login'])) {
        $login = $_POST['Login'];
        $password = $_POST['password'];
        foreach($result as $user) {
            if ($login == $user['username']) {
                if (password_verify($password, $user['password'])) {
                    echo "Successfully Logged in";
                    $_SESSION["login"] = $login;
                    header("Location: ./Profile.php");
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
