<?php
$str = "Dans l'espace, personne ne vous entend crier";
$len = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}
echo "il y a " . "<strong>" . $len . "</strong>" . " caractères dans la chaine";

?>

