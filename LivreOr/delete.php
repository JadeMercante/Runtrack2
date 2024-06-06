<?php
if (!isset($_SESSION['login'])) {
    header("Location: ./index.php");
}
if (!isset($_SESSION['admin'])) {
    header("Location: ./livredor.php");
}
if (!isset($_SESSION['usertodelete'])) {
    header("Location: ./livredor.php");
}

if ($_SESSION['admin'] == 1 || $_SESSION['usertodelete'] == $_SESSION['login']) {
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM `commentaires` WHERE `id` = $id");
    header("Location: ./livredor.php");
}

unset($_SESSION['usertodelete']);
unset($_SESSION['admin']);

?>