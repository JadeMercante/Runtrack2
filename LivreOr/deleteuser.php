<?php
session_start();

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
    }
}

$id = $_GET['id'];
mysqli_query($mysqli, "DELETE FROM `utilisateurs` WHERE id = $id");
header("Location: ./admin.php");


?>