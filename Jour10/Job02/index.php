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
$result = mysqli_query($mysqli, "SELECT id, nom, capacité FROM `salles`");
$column = mysqli_query($mysqli, "SHOW COLUMNS FROM `salles`");

echo "<table>";
echo "<thead>";
foreach ($column as $row2) {
    if ($row2["Field"] == "id_etage") { continue; }
    echo "<th>" . $row2["Field"] . "</th>";
}
echo "</thead>";
echo "<tbody>";
foreach ($result as $row) {

    echo "<tr>";
    foreach ($row as $value) {
        echo "<td>" . $value . "</td>";
    }
    echo "</tr>";
}
?>
</body>
</html>
