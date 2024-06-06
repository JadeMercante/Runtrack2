<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');
$login = $_SESSION['login'];

if (!isset($_SESSION['login'])) {
    header("Location: ./connexion.php");
    exit();
}
foreach($result as $user) {
    if ($user['login'] == $login) {
        if ($user['admin'] == 0) {
            header("Location: ./index.php");
        }
        $admin = $user['admin'];
    }
}
$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$id = $_GET['id'];
$user = $_GET['user'];

if ($login != $user && $admin == 0) {
    header("Location: ./userprofile.php?user=$user");
}
$result = mysqli_query($mysqli, "DELETE FROM `commentaires` WHERE `id` = $id");
header("Location: ./userprofile.php?user=$user");

?>