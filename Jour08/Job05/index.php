<!DOCTYPE html>
<html lang="en">

<?php

session_start();

if (!isset($_SESSION['locked'])) {
    $locked = "enabled";
    $_SESSION['locked'] = $locked;
}


$user = $_SESSION['user'];

function victory() {
    $locked = "disabled";
    $_SESSION['locked'] = $locked;
}

$locked = $_SESSION['locked'];

if (!isset($_SESSION['victory'])) {
    $victory = "";
    $_SESSION['victory'] = $victory;
}



for ($i = 1; $i <= 3; $i++) {
    if ($i == 1) {
        $letter = "A";
    }
    if ($i == 2) {
        $letter = "B";
    }
    if ($i == 3) {
        $letter = "C";
    }
    for ($j = 1; $j <= 3; $j++) {
        if (!isset($_SESSION[ "'" . $letter . $j . "'"])) {
            ${$letter . $j} = "-";
            $_SESSION["'" . $letter . $j . "'"] = 0;
        }
        if (isset($_SESSION["'" . $letter . $j . "'"])) {
            ${$letter . $j} = $_SESSION["'" . $letter . $j . "'"];
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 1) {
            ${$letter . $j . "S"} = "X";
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 2) {
            ${$letter . $j . "S"} = "O";
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 0) {
            ${$letter . $j . "S"} = "-";
        }
    }
}


for ($i = 1; $i <= 3; $i++) {
    if ($i == 1) {
        $letter = "A";
    }
    if ($i == 2) {
        $letter = "B";
    }
    if ($i == 3) {
        $letter = "C";
    }
    for ($j = 1; $j <= 3; $j++) {
        if (isset($_POST[$letter . $j]) && ${$letter . $j . "S"} == "-" || (isset($_POST[$letter . $j]) && ${$letter . $j . "S"} == " ")) {
            ${$letter . $j} = 1 * $user;
            $user++;
            if ($user >= 3) {
                $user = 1;
            }
            $_SESSION["'" . $letter . $j . "'"] = ${$letter . $j};
            $_SESSION['user'] = $user;

            header("Refresh:0");
        }

    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    body{
        text-align : center;
    }

    table{
        margin-top : 20px;
        margin-bottom : 20px;
        margin-left : auto;
        margin-right : auto;
        border : 1px solid black;
    }

    td{
        border : 1px solid black;
        text-align : center;
        padding : 5px;
    }

    button{
        padding : 5px;
        padding-left : 10px;
        padding-right : 10px;
        font-size : 20px;
    }

    button:disabled{
        background-color : grey;
        color : white;
    }

    button:hover{
        background-color : black;
        color : white;
    }

</style>
</head>
<body>
<?php


echo "Jeu de morpion";

echo "<form method='post'>";
echo "<table>";
echo "<tr> <td><button name='A1' class = 'A1' $locked>$A1S</button></td><td><button name='A2' class = 'A2' $locked>$A2S</button></td><td><button name='A3' class = 'A3' $locked>$A3S</button></td> </tr>";
echo "<tr> <td><button name='B1' class = 'B1' $locked>$B1S</button></td><td><button name='B2' class = 'B2' $locked>$B2S</button></td><td><button name='B3' class = 'B3' $locked>$B3S</button></td> </tr>";
echo "<tr> <td><button name='C1' class = 'C1' $locked>$C1S</button></td><td><button name='C2' class = 'C2' $locked>$C2S</button></td><td><button name='C3' class = 'C3' $locked>$C3S</button></td> </tr>";
echo "</table>";
echo "</form>";
echo $_SESSION['victory'];
echo "<br />";
echo "<form method='post'>";
echo "<button name='reset'>Reset</button>";
echo "</form>";
echo "user : " . $user . "<br />";







// Diago1
if ($_SESSION["'A1'"] == $_SESSION["'B2'"] && $_SESSION["'B2'"] == $_SESSION["'C3'"] && $_SESSION["'A1'"] != 0) {
    $player = ($_SESSION["'A1'"] == 1) ? "Le joueur 1" : "Le joueur 2";
    $_SESSION['victory'] = "$player a gagné";
    victory();
}

// Diago2
elseif ($_SESSION["'A3'"] == $_SESSION["'B2'"] && $_SESSION["'B2'"] == $_SESSION["'C1'"] && $_SESSION["'A3'"] != 0) {
    $player = ($_SESSION["'A3'"] == 1) ? "Le joueur 1" : "Le joueur 2";
    $_SESSION['victory'] = "$player a gagné";
    victory();
}

for ($j = 1; $j <= 3; $j++) {
    // Collones
    if ($_SESSION["'A" . $j . "'"] == $_SESSION["'B" . $j . "'"] && $_SESSION["'B" . $j . "'"] == $_SESSION["'C" . $j . "'"] && $_SESSION["'A" . $j . "'"] != 0) {
        $player = ($_SESSION["'A" . $j . "'"] == 1) ? "Le joueur 1" : "Le joueur 2";
        $_SESSION['victory'] = "$player a gagné";
        victory();
    }
}

for ($i = 1; $i <= 3; $i++) {
    if ($i == 1) {
        $letter = "A";
    } elseif ($i == 2) {
        $letter = "B";
    } else {
        $letter = "C";
    }

    // lignes
    if ($_SESSION["'" . $letter . "1'"] == $_SESSION["'" . $letter . "2'"] && $_SESSION["'" . $letter . "2'"] == $_SESSION["'" . $letter . "3'"] && $_SESSION["'" . $letter . "1'"] != 0) {
        $player = ($_SESSION["'" . $letter . "1'"] == 1) ? "Le joueur 1" : "Le joueur 2";
        $_SESSION['victory'] = "$player a gagné";
        victory();
    }
}

if (isset($_POST['reset'])) {
    $_SESSION['user'] = 1;
    for ($i = 1; $i <= 3; $i++) {
        if ($i == 1) {
            $letter = "A";
        }
        if ($i == 2) {
            $letter = "B";
        }
        if ($i == 3) {
            $letter = "C";
        }
        for ($j = 1; $j <= 3; $j++) {
            if (!isset($_SESSION[ "'" . $letter . $j . "'"])) {
            }
            else {
                unset($_SESSION["'" . $letter . $j . "'"]);
            }
        }
    }
    $locked = "enabled";
    $_SESSION['locked'] = $locked;
    unset($_SESSION['victory']);
    header("Refresh:0");
}


?>
</body>
</html>
