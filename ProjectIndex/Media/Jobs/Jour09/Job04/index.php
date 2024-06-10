<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php


if (!isset($_COOKIE['name'])) {

echo "Log-In : ";
echo "<br />";
echo "<form method='post'>";
echo "<input type='text' name='name' />";
echo "<button name='Send'>Log-In</button>";
echo "<br />";
echo "</form>";
echo "<br />";
echo "VOUS N4ETES PAS CONNECTÉ !" . "<br />";


if (isset($_POST['Send'])) {
    setcookie("name", $_POST['name'], time() + 36000);
    header("Refresh:0");
}

}
else {
echo "Bonjour " . $_COOKIE['name'];
echo "<br />";
echo "<form method='post'>";
echo "<button name='Delete'>Log out</button>";
echo "</form>";
echo "<br />";


if (isset($_POST['Delete'])) {
    setcookie("name", $_POST['name'], time() - 36000);
    header("Refresh:0");
}

}



?>
</body>
</html>
