<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
if (!isset($_COOKIE['nbvisites'])) {
    $nbvisites = 0;
}

$nbvisites = $_COOKIE['nbvisites'];
$nbvisites++;
setcookie("nbvisites", $nbvisites, time() + 3600);

echo "Nombre de visites : " . $nbvisites;
echo "<br />";
echo "<form method='post'>";
echo "<button name='reset'>Reset</button>";
echo "</form>";

if (isset($_POST['reset'])) {
    $nbvisites = -1;
    setcookie("nbvisites", $nbvisites, time() + 3600);
    header("Refresh:0");
}
?>
</body>
</html>
