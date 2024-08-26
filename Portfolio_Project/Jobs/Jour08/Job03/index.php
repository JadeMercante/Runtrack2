<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();



echo "Ajouter a la liste : ";
echo "<br />";
echo "<form method='post'>";
echo "<input type='text' name='name' />";
echo "<button name='Send'>Add</button>";
echo "<br />";
echo "<button name='Delete'>Delete</button>";
echo "</form>";
echo "<br />";
echo "<br />";
echo "Liste : ";
echo "<br />";
for($i = 0; isset($_SESSION['names' . $i]); $i++) {
    echo "- " . $_SESSION['names' . $i];
    echo "<br />";
}
if (isset($_POST['Send'])) {
    $_SESSION['names' . $i] = $_POST['name'];
    header("Refresh:0");
}
if (isset($_POST['Delete'])) {
    for($i = 0; isset($_SESSION['names' . $i]); $i++) {
        unset($_SESSION['names' . $i]);
    }
    header("Refresh:0");
}


?>
</body>
</html>
