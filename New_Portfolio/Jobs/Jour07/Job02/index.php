<?php
function hello($jour) {
    if ($jour == True) {
        echo "Bonjour";
    }
    else {
        echo "Bonsoir";
    }
}
$jour = False;
hello($jour);
?>