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
if (!isset($_SESSION['nbvisites'])) {
    $nbvisites = 0;
    $_SESSION['nbvisites'] = $nbvisites;
}

$nbvisites = $_SESSION['nbvisites'];
$_SESSION['nbvisites']++;

echo "Nombre de visites : " . $_SESSION['nbvisites'];
echo "<br />";
echo "<form method='post'>";
echo "<button name='reset'>Reset</button>";
echo "</form>";

if (isset($_POST['reset'])) {
    $_SESSION['nbvisites'] = -1;
    header("Refresh:0");
}
?>
</body>
</html>
