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
        $data = array(); // Initialize an empty array to store the form data

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $FirstNum = $_POST["FirstNum"];
            $SecondNum = $_POST["SecondNum"];
            $ThirdNum = $_POST["ThirdNum"];
            $ForthNum = $_POST["ForthNum"];
            $Fithnum = $_POST["Fithnum"];
            $SixthNum = $_POST["SixthNum"];
            $SeventhNum = $_POST["SeventhNum"];

            //save the values inside of a list as different variables
            $data[] = array("FirstNum" => $FirstNum, "SecondNum" => $SecondNum, "ThirdNum" => $ThirdNum, "ForthNum" => $ForthNum, "Fithnum" => $Fithnum, "SixthNum" => $SixthNum, "SeventhNum" => $SeventhNum);
            
            // Look if they are pair or not
            if ($FirstNum % 2 == 0) {
                $FirstNumPair = "True";
            }
            else {
                $FirstNumPair = "False";
            }
            if ($SecondNum % 2 == 0) {
                $SecondNumPair = "True";
            }
            else {
                $SecondNumPair = "False";
            }
            if ($ThirdNum % 2 == 0) {
                $ThirdNumPair = "True";
            }
            else {
                $ThirdNumPair = "False";
            }
            if ($ForthNum % 2 == 0) {
                $ForthNumPair = "True";
            }
            else {
                $ForthNumPair = "False";
            }
            if ($Fithnum % 2 == 0) {
                $FithnumPair = "True";
            }
            else {
                $FithnumPair = "False";
            }
            if ($SixthNum % 2 == 0) {
                $SixthNumPair = "True";
            }
            else {
                $SixthNumPair = "False";
            }
            if ($SeventhNum % 2 == 0) {
                $SeventhNumPair = "True";
            }
            else {
                $SeventhNumPair = "False";    
            }
            $data2[] = array("FirstNumPair" => $FirstNumPair, "SecondNumPair" => $SecondNumPair, "ThirdNumPair" => $ThirdNumPair, "ForthNumPair" => $ForthNumPair, "FithnumPair" => $FithnumPair, "SixthNumPair" => $SixthNumPair, "SeventhNumPair" => $SeventhNumPair);
        }
    ?>

    <form method="post">
    FirstNum: <input type="number" name="FirstNum" value = "200">
    SecondNum: <input type="number" name="SecondNum" value = "204">
    ThirdNum: <input type="number" name="ThirdNum" value = "173">
    ForthNum: <input type="number" name="ForthNum" value = "98">
    Fithnum: <input type="number" name="Fithnum" value = "171">
    SixthNum: <input type="number" name="SixthNum" value = "404">
    SeventhNum: <input type="number" name="SeventhNum" value = "459">
        <input type="submit">
    </form>

    <table>
        <?php
        foreach ($data as $row) {
            // Display the data in a table
            echo "<tr>";
            echo "<td>" . $row["FirstNum"] . "</td>";
            echo "<td>" . $row["SecondNum"] . "</td>";
            echo "<td>" . $row["ThirdNum"] . "</td>";
            echo "<td>" . $row["ForthNum"] . "</td>";
            echo "<td>" . $row["Fithnum"] . "</td>";
            echo "<td>" . $row["SixthNum"] . "</td>";
            echo "<td>" . $row["SeventhNum"] . "</td>";
            echo "</tr>";
        }
        ?>
        <?php
        foreach ($data2 as $row) {
            // Display the data in a table
            echo "<tr>";
            echo "<td>" . $row["FirstNumPair"] . "</td>";
            echo "<td>" . $row["SecondNumPair"] . "</td>";
            echo "<td>" . $row["ThirdNumPair"] . "</td>";
            echo "<td>" . $row["ForthNumPair"] . "</td>";
            echo "<td>" . $row["FithnumPair"] . "</td>";
            echo "<td>" . $row["SixthNumPair"] . "</td>";
            echo "<td>" . $row["SeventhNumPair"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>