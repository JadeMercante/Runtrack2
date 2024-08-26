<?php
/* Database connexion */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'phpcrud');

/* Connexion à la base de données */
$link = mysqli_connect("localhost", "root", "", "JobBoring");

/* verifier connection */
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>