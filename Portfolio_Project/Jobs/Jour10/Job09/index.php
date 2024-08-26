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
foreach ($column as $row2) {
    echo "<th>" . $row2["Field"] . "</th>";
}
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["id_etage"] . "</td>";
    echo "<td>" . $row["capacité"] . "</td></tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>
</html>