<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$sql = "SELECT * FROM `etudiants`";
$mysqli = mysqli_connect("localhost", "root", "", "jour09");
$result = mysqli_query($mysqli, "SELECT * FROM `etudiants`");
$column = mysqli_query($mysqli, "SHOW COLUMNS FROM `etudiants`");

echo "<table>";
echo "<thead>";
echo "<th> Number of students</th>";
echo "</thead>";
echo "<tbody>";
$count = 0;
foreach ($result as $row) {
    $count++;
}
echo "<td>" . $count . "</td>";
?>
</body>
</html>
