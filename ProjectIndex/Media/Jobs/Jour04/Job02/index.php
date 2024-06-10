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
            $FirstNum = $_GET["FirstNum"];
            $SecondNum = $_GET["SecondNum"];
            $ThirdNum = $_GET["ThirdNum"];
            $ForthNum = $_GET["ForthNum"];
        }
    ?>

    <form method="get">
    FirstNum: <input type="text" name="FirstNum" value = "200">
    SecondNum: <input type="text" name="SecondNum" value = "204">
    ThirdNum: <input type="text" name="ThirdNum" value = "173">
    ForthNum: <input type="text" name="ForthNum" value = "98">
        <input type="submit">
    </form>

    <table>
        <?php
            echo "<thead>";
            echo "<td> Variable 1</td>";
            echo "<td> Variable 2</td>";
            echo "</thead>";
            echo "<tr>";
            echo "<td>" . $FirstNum . "</td>";
            echo "<td>" . $SecondNum . "</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>" . $ThirdNum . "</td>";
            echo "<td>" . $ForthNum . "</td>";
            echo "</tr>";
        ?>
    </table>
</body>
</html>