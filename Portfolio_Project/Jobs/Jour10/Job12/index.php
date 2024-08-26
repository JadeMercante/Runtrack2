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
$curdate = date("Y-m-d");

echo "<table>";
echo "<thead>";
foreach ($column as $row2) {
    echo "<th>" . $row2["Field"] . "</th>";
}
echo "</thead>";
echo "<tbody>";
foreach ($result as $row) {
    echo "<tr>";
    foreach ($row as $value) {
        if ($row["naissance"] > "1998-01-01" && $row["naissance"] < "2018-12-31") {
        echo "<td>" . $value . "</td>";
        }
        else { 
        continue; }
    }
echo "</tr>";
}
?>
</body>
</html>
