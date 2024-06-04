<?php

$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$id = $_GET['id'];
$user = $_GET['user'];
$result = mysqli_query($mysqli, "DELETE FROM `commentaires` WHERE `id` = $id");
header("Location: ./userprofile.php?user=$user");

?>