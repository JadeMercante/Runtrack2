<!DOCTYPE html>
<html lang="en">

<?php

session_start();

// Si la session lock n'existe pas
if (!isset($_SESSION['locked'])) {
    // Donne la valeur "enabled" a la session
    $locked = "enabled";
    $_SESSION['locked'] = $locked;
}

// Récupère la valeur de la session user
$user = $_SESSION['user'];
//Defnir la fonction victory, en cas de victoire
function victory() {
    $locked = "disabled";
    //Quand la fonction est appelée, on donne la valeur "disabled" a la session
    $_SESSION['locked'] = $locked;
}
// Récupère la valeur de la session locked et la met dans la variable
$locked = $_SESSION['locked'];

// Récupère la valeur de la session victory si elle n'existe pas
if (!isset($_SESSION['victory'])) {
    $victory = "";
    $_SESSION['victory'] = $victory;
}


// Fait un for de 1 a 3 pour chaqu'une des lettres de A a C.
for ($i = 1; $i <= 3; $i++) {
    if ($i == 1) {
        $letter = "A";
        // Si la variable I = 1 alors on choisit la lettre A
    }
    if ($i == 2) {
        // Si la variable I = 2 alors on choisit la lettre B
        $letter = "B";
    }
    if ($i == 3) {
        // Si la variable I = 3 alors on choisit la lettre C
        $letter = "C";
    }
    for ($j = 1; $j <= 3; $j++) {
        // Refait un for de 1 a 3 poir les nombres apres la lettres (Example : A1, B3, C2)
        if (!isset($_SESSION[ "'" . $letter . $j . "'"])) {
            // Si la variable $_SESSION["'" . $letter . $j . "'"] n'existe pas (Exemple : if(!isset($_SESSION['A1']))  )
            ${$letter . $j} = "-";
            // On lui donne la valeur "-"
            $_SESSION["'" . $letter . $j . "'"] = 0;
            // On lui donne la valeur 0
        }
        if (isset($_SESSION["'" . $letter . $j . "'"])) {
            ${$letter . $j} = $_SESSION["'" . $letter . $j . "'"];
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 1) {
            // Si c'est 1 alors, sa deviens X
            ${$letter . $j . "S"} = "X";
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 2) {
            // Si c'est 2 alors, sa deviens O
            ${$letter . $j . "S"} = "O";
        }
        if ($_SESSION["'" . $letter . $j . "'"] == 0) {
            // Rectifie l'erreur du sessus car jsp, j'avais pas vraiment penser que j'aurais juste pu y faire, mais bref mdr
            ${$letter . $j . "S"} = "-";
        }
    }
}


for ($i = 1; $i <= 3; $i++) {
    // Noubeau for (Il y en aura pleins mdr)
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
            // Si $_post[$letter . $j] existe et que ${$letter . $j . "S"} = "-" ou ${$letter . $j . "S"} = " " alors
            ${$letter . $j} = 1 * $user;
            // On lui donne la valeur 1 et on multiplie par le user
            // Le user etant un nombre de 1 a 2, donc la valeur sera de 1 ou 2 en fonction de quel user clique
            $user++;
            // On ajoute 1 au user et si il est superieur ou egal a 3 on remet le user a 1
            if ($user >= 3) {
                $user = 1;
            }

            // On met a jour la session
            $_SESSION["'" . $letter . $j . "'"] = ${$letter . $j};
            $_SESSION['user'] = $user;
            // On actualise la page
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
        font-size : 40px;
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
        padding-left : 40px;
        padding-right : 40px;
        font-size : 70px;
        border-radius : 5px;
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
// Affiche le tableau du jeu de morpion avec des valeurs dedans, le $locked pour desactiver le bouton sur demande
// Le user est le $user qui va changer de valeur en fonction de la valeur de $user
// Les valeurs de A1 a C3 sont pour definir chaque cases individuellement
// le victory est just pour dire qui gagne
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







// Ce if sert a verifier si 3 valeurs en diagonales sont les mêmes, et affichent le gagnant si c'st le cas
if ($_SESSION["'A1'"] == $_SESSION["'B2'"] && $_SESSION["'B2'"] == $_SESSION["'C3'"] && $_SESSION["'A1'"] != 0) {
    // Si la case A1 (QUi est a même valeurs que les autre) est 1 on affiche le joueur 1 sinon le joueur 2
    $player = ($_SESSION["'A1'"] == 1) ? "Le joueur 1" : "Le joueur 2";
    $_SESSION['victory'] = "$player a gagné";
    // On appelle la fonction victory
    victory();
}

// ce if sert a verifier si 3 valeurs en diagonales sont les mêmes, et affichent le gagnant si c'st le cas
elseif ($_SESSION["'A3'"] == $_SESSION["'B2'"] && $_SESSION["'B2'"] == $_SESSION["'C1'"] && $_SESSION["'A3'"] != 0) {
    // Tout pareil
    $player = ($_SESSION["'A3'"] == 1) ? "Le joueur 1" : "Le joueur 2";
    $_SESSION['victory'] = "$player a gagné";
    victory();
}
// On a fait un for ici, pour verifier facilement les 3 colones
for ($j = 1; $j <= 3; $j++) {
    if ($_SESSION["'A" . $j . "'"] == $_SESSION["'B" . $j . "'"] && $_SESSION["'B" . $j . "'"] == $_SESSION["'C" . $j . "'"] && $_SESSION["'A" . $j . "'"] != 0) {
        $player = ($_SESSION["'A" . $j . "'"] == 1) ? "Le joueur 1" : "Le joueur 2";
        $_SESSION['victory'] = "$player a gagné";
        victory();
    }
}
// Celui la pour les lignes
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
// Le bouton reset
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
        // Reset chaque case 1 par 1
        for ($j = 1; $j <= 3; $j++) {
            if (!isset($_SESSION[ "'" . $letter . $j . "'"])) {
            }
            else {
                unset($_SESSION["'" . $letter . $j . "'"]);
            }
        }
    }
    // Reset les variables importantes
    $locked = "enabled";
    $_SESSION['locked'] = $locked;
    unset($_SESSION['victory']);
    header("Refresh:0");
}

// Fin du code :D
?>
</body>
</html>
