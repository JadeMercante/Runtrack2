<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<Style>
    td{
        border: 1px solid black;
    }
    table{
        margin-top : 20px;
    }
</Style>
<body>
    <?php

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $count = 0;
            if ($_GET["Nombre"] != "") {
                $count++;
            }
            if ($_GET["Nombre2"] != "") {
                $count++;
            }
            if ($_GET["Nombre3"] != "") {
                $count++;
            }
            if ($_GET["Nombre4"] != "") {
                $count++;
            }
            if ($_GET["Nombre5"] != "") {
                $count++;
            }
            if ($_GET["Nombre6"] != "") {
                $count++;
            }
            if ($_GET["Nombre7"] != "") {
                $count++;
            }
            if ($_GET["Nombre8"] != "") {
                $count++;
            }
            if ($_GET["Nombre9"] != "") {
                $count++;
            }
            $NombreDit = $count;
        }
    ?>

    <form method="GET">
    FirstNum: <input type="number" name="Nombre" value = "">
    SecondNum: <input type="number" name="Nombre2" value = "">
    ThirdNum: <input type="number" name="Nombre3" value = "">
    ForthNum: <input type="number" name="Nombre4" value = "">
    6thNum : <input type="number" name="Nombre5" value = "">
    7thNum : <input type="number" name="Nombre6" value = "">
    8thNum : <input type="number" name="Nombre7" value = "">
    9thNum : <input type="number" name="Nombre8" value = "">
    10thNum: <input type="number" name="Nombre9" value = "">
        <input type="submit">
    
    </form>

    <table>
        <?php
        echo "Il y a " . "$NombreDit" . " requettes get";
        ?>

    </table>
</body>
</html>