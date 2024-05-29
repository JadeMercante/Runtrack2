<?php

function sting ($str, $char) {
    $len = 0; 

for ($i = 0; isset($str[$i]); $i++) {
    if ($str[$i] == $char) {
        echo $str[$i];
        $len++;
    }
    else {
        echo "_";
    }
}

echo "<br />There are " . $len . " occurances of the letter {$char} in the string";
}

sting("Certaines choses changent, et d'autres ne changeront jamais.", "a");
?>