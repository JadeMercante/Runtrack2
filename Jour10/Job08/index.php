<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$sql = "SELECT * FROM `salles`";

$mysqli = mysqli_connect("localhost", "root", "", "jour09");
$result = mysqli_query($mysqli, "SELECT * FROM `salles`");
$column = mysqli_query($mysqli, "SHOW COLUMNS FROM `salles`");

echo "<table>";
echo "<thead>";
echo "<th> Capacitée totale</th>";
echo "</thead>";
echo "<tbody>";
$count = 0;
foreach ($result as $row) {
    $count = $count + $row["capacité"];
}
echo "<td>" . $count . "</td>";
?>
</body>
</html>
