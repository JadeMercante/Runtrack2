<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 


function gras($str) {
    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] == "A" || $str[$i] == "B" || $str[$i] == "C" || $str[$i] == "D" || $str[$i] == "E" || $str[$i] == "F" || $str[$i] == "G" || $str[$i] == "H" || $str[$i] == "I" || $str[$i] == "J" || $str[$i] == "K" || $str[$i] == "L" || $str[$i] == "M" || $str[$i] == "N" || $str[$i] == "O" || $str[$i] == "P" || $str[$i] == "Q" || $str[$i] == "R" || $str[$i] == "S" || $str[$i] == "T" || $str[$i] == "U" || $str[$i] == "V" || $str[$i] == "W" || $str[$i] == "X" || $str[$i] == "Y" || $str[$i] == "Z" ) {
            echo "<b>" . $str[$i] . "</b>";
            $bold = 1;
            $len = 0;
            while ($bold == 1) {
                $len++;
                if ($str[$i + $len] == " ") {
                    echo $str[$i + $len];
                    $bold = 0;
                    }
                else {
                    if ($bold == 1) {
                    echo "<b>" . $str[$i + $len] . "</b>";
                    }
                    else {
                    echo $str[$i + $len];
                    }
                }
            }
            $i = $i + $len;
        }
        else {

            echo $str[$i];
        }
    }
}

function cesar($str, $int) {
    $alphabetlower = "abcdefghijklmnopqrstuvwxyz";
    $alphabetupper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] == " ") {
            echo " ";
        }
        for ($j = 0; isset($alphabetupper[$j]); $j++) {
            if ($str[$i] == $alphabetupper[$j]) {
                $str[$i] = $alphabetupper[($j + $int) % 26];
                echo $str[$i];
                break;
            }
            else {
            }
        }
        for ($j = 0; isset($alphabetlower[$j]); $j++) {
            if ($str[$i] == $alphabetlower[$j]) {
                $str[$i] = $alphabetlower[($j + $int) % 26];
                echo $str[$i];
                break;
            }
            else {
            }
        }
    }
}

function plateforme($str) {
    for ($i = 0; isset($str[$i]); $i++) {
        if ($str[$i] == "m"){
            if ($str[$i + 1] == "e") {
                if ($str[$i + 2] == " ") {
                    $str[$i+2] = "_";
                }
            }
        }
        echo $str[$i];
    }
}

?>
<body>
    <form method="post">
        <label for="fname">Input text:</label><br>
        <input type="text" id="fname" name="fname"><br>
        <select name="select">
            <option value="0">"---Selectionnes une option---"</option>
            <option value="1">Gras</option>
            <option value="2">Cesar Text</option>
            <option value="3">3</option>
        </select>
        <input type="submit" value="Submit">
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST["fname"];
            for ($i = 0; isset($fname[$i]); $i++) {
                if ($fname[$i] == " ") {
                    $fname[$i] = " ";
                }
            }
            $select = $_POST["select"];
        }

        if ($select == 1) {
            gras($fname);
        }
        elseif ($select == 2) {
            cesar($fname, 2);
        }
        elseif ($select == 3) {
            plateforme($fname);
        }
    ?>
</body>
</html>