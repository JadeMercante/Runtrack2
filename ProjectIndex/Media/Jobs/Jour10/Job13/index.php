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
$floor = mysqli_query($mysqli, "SELECT * FROM `etage`");
$column = mysqli_query($mysqli, "SHOW COLUMNS FROM `salles`");

echo "<table>";
echo "<thead>";
echo "<th> id</th>";
echo "<th> name</th>";
echo "<th> floor</th>";
echo "<th> Floor Name</th>";
echo "<th> capacity</th>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["nom"] . "</td>";
    echo "<td>" . $row["id_etage"] . "</td>";
    foreach ($floor as $row3) {
        if ($row["id_etage"] == $row3["id"]) {
            echo "<td>" . $row3["nom"] . "</td>";
        }
    }
    echo "<td>" . $row["capacité"] . "</td></tr>";
}
echo "</tbody>";
echo "</table>";
?>
</body>
</html>