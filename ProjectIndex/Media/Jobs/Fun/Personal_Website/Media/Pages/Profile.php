<?php
session_name('jadempinkyweb');
session_start();

if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('../Include/head.php'); ?>
<body class = "bodyIndex">
    <?php include('../Include/Aside.php'); ?>
    <section class = "MainPage">
    <section class = "profile">
    <?php 
    if (isset($_SESSION['login'])) {
    ?>
    <h1><?php echo $login ?></h1>
    <?php include('../Include/ProfilePic.php'); ?>
    <form method = "POST"  enctype = "multipart/form-data">
        <input type = "file" name = "avatar">
        <input type = "submit" name = "upload" value = "upload">
    </form>
    <?php

    if (isset($_POST['upload'])) {
        echo $_FILES['avatar']['name'] . "<br>"; /* nom du avatar */ 
        echo $_FILES['avatar']['tmp_name'] . "<br>"; /* chemin temporaire */
        echo $_FILES['avatar']['size'] . "<br>"; /* taille du fichier */

        
            if ($_FILES['avatar']['size'] < 1200000) {
                $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
                $allowed = ['jpg', 'jpeg', 'png'];
                if (in_array($ext, $allowed)) {
                    $path = $_FILES['avatar']['tmp_name'];
                    $new_name = uniqid() . '.' . $ext;
                    $destination = '../Images/Uploads/' . $new_name;
                    move_uploaded_file($path, $destination);
                    $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
                    $result = mysqli_query($mysqli, "UPDATE `users` SET avatar = '$new_name' WHERE username = '$login'");
                    mysqli_close($mysqli);
                    if ($result) {
                        header("Location: ./Profile.php");
                    }
                }
            } else {
                echo "Le fichier est trop volumineux";
            }
    }


    ?>
    <div class = "Titles">
        <h2>Titles</h2>
        <?php
        $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
        $result = mysqli_query($mysqli, "SELECT * FROM `users` WHERE username = '$login'");
        $row = mysqli_fetch_assoc($result);
        if ($row == null) {
            echo "No titles";
        } else {
        $titles = explode(",", $row['Titles']);
        if (count($titles) == 0) {
            echo "No titles";
        }
        else {
        echo '<ul>';
        foreach ($titles as $title) {
            echo "<li>$title</li>";
        }
        echo '</ul>';
        }
        }
        ?>
            </div>
        <FORM method = "POST">
            <input type = "submit" name = "logout" value = "Logout">
        </FORM>
        <?php 

        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: ./Profile.php");
        }
        ?>



    <?php } else { ?>
        <h1>You are not logged in.</h1>
        <a href = "../../index.php"><button>Back to index</button></a>
        <a href = "./login.php"><button>Login</button></a>
        <a href = "./register.php"><button>Register</button></a>
    <?php } ?>
    </section>
    </section>
</body>
</html>