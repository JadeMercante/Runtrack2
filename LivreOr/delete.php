<?php

$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM `commentaires` WHERE `id` = $id");
header("Location: ./livredor.php");

?>