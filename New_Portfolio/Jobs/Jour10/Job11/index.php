<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$mysqli = mysqli_connect("localhost", "root", "", "jour09");
$result = mysqli_query($mysqli, "SELECT * FROM `salles` ORDER BY capacité DESC");
$column = mysqli_query($mysqli, "SHOW COLUMNS FROM `salles`");

echo "<table>";
echo "<thead>";
echo "<th> Average capacity</th>";
echo "</thead>";
echo "<tbody>";
$count = 0;
$average = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $count++;
    $average = $average + $row["capacité"];
}
echo "<td>" . $average / $count . "</td>";
echo "</tbody>";
echo "</table>";
?>
</body>
</html>