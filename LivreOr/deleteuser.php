<?php

$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$id = $_GET['id'];
mysqli_query($mysqli, "DELETE FROM `utilisateurs` WHERE id = $id");
header("Location: ./admin.php");
?>