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
        // Verifie si la lettre est une majuscule (Ver 1)
        if ($str[$i] == "A" || $str[$i] == "B" || $str[$i] == "C" || $str[$i] == "D" || $str[$i] == "E" || $str[$i] == "F" || $str[$i] == "G" || $str[$i] == "H" || $str[$i] == "I" || $str[$i] == "J" || $str[$i] == "K" || $str[$i] == "L" || $str[$i] == "M" || $str[$i] == "N" || $str[$i] == "O" || $str[$i] == "P" || $str[$i] == "Q" || $str[$i] == "R" || $str[$i] == "S" || $str[$i] == "T" || $str[$i] == "U" || $str[$i] == "V" || $str[$i] == "W" || $str[$i] == "X" || $str[$i] == "Y" || $str[$i] == "Z" ) {
            echo "<b>" . $str[$i] . "</b>";
            // Si la lettre est une majuscule ecrit la en gras
            $bold = 1; // Set Gras a 1
            $len = 0; // Set len a 0
            while ($bold == 1) { //Tant que Gras = 1 alors
                $len++; //Ajoute 1 a len
                if (!isset($str[$i + $len  + 1]) || $str[$i + $len + 1] == " " || $str[$i + $len + 1] == "" || $str[$i + $len + 1] == NULL) {
                    // si la case suivante n'existe pas ou est vide ou un espace
                    echo $str[$i + $len];
                    // on affiche la lettre
                    $bold = 0;
                    // On remet Gras = 0
                    }
                else {
                    // si la case suivante existe et n'est pas vide ou un espace
                    if ($bold == 1) {
                    // si Gras = 1
                    echo "<b>" . $str[$i + $len] . "</b>";
                    // on affiche la lettre en gras
                    }
                    else {
                    // si Gras = 0
                    echo $str[$i + $len];
                    // on affiche la lettre sans gras
                    }
                }
            }
            $i = $i + $len;
            // Ajoute len a I pour skip le mot qui a deja été proccess
        }
        else {
                echo $str[$i];
                //Autrement, affice la lettre
        }
    }
}

function cesar($str, $int) {
    $alphabetlower = "abcdefghijklmnopqrstuvwxyz";
    $alphabetupper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    //Alphabet (Ver 2)
    for ($i = 0; isset($str[$i]); $i++) {
        //Compte le nombre de characteres dans le str
        if ($str[$i] == " ") {
            echo " ";
            //Si espace, echo espace
        }
        for ($j = 0; isset($alphabetupper[$j]); $j++) {
            //Compte le nombre de characteres dans l'alphabet
            if ($str[$i] == $alphabetupper[$j]) {
                // Si la lettre I du str correspond a la lettre J de l'alphabet
                $str[$i] = $alphabetupper[($j + $int) % 26];
                // Formule de calcule pour le code ceasar, Se refferer ici : https://fr.wikipedia.org/wiki/Chiffrement_par_décalage
                echo $str[$i];
                // Echo la nouvelle lettre
                break;
                // On sort de la boucle
            }
            else {
            }
        }
        for ($j = 0; isset($alphabetlower[$j]); $j++) {
            //Compte le nombre de characteres dans l'alphabet minuscule
            if ($str[$i] == $alphabetlower[$j]) {
                // Si la lettre I du str correspond a la lettre J de l'alphabet
                $str[$i] = $alphabetlower[($j + $int) % 26];
                // Formule de calcule pour le code ceasar, Se refferer ici : https://fr.wikipedia.org/wiki/Chiffrement_par_décalage
                echo $str[$i];
                // Echo la nouvelle lettre
                break;
                // On sort de la boucle
            }
            else {
            }
        }
    }
}

function plateforme($str) {
    for ($i = 0; isset($str[$i]); $i++) {
        // Compte le nombre de characteres dans le str
        if ($str[$i] == "m"){
            // Si la lettre est "m"
            if (isset($str[$i + 1]) && $str[$i + 1] == "e") {
                // Si la case suivante existe et est "e"
                if (isset($str[$i + 2]) && $str[$i + 2] == " ") {
                    // Si la case suivante existe et est un espace
                    $str[$i+2] = "_";
                }
                else {
                    // SI la case suivante n'existe pas
                    $str[$i+2] = "_";
                }
            }
        }
        echo $str[$i];
        // Echo la lettre
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