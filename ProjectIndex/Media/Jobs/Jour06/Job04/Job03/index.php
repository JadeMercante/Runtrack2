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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FirstNum = $_POST["Nombre"];

            
            // Look if they are pair or not
            if ($FirstNum % 2 == 0) {
                $FirstNumPair = "{$FirstNum}";
            }
            else {
                $FirstNumPair = "{$FirstNum}";
            }
        }
    ?>

    <form method="POST">
    FirstNum: <input type="number" name="Nombre" value = "200">
        <input type="submit">
    </form>

    <table>
        <?php
        echo $FirstNumPair;
        ?>

    </table>
</body>
</html>