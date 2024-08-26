<?php

function sting ($str) {

for ($i = 0; isset($str[$i]); $i++) {
    if ($str[$i] == "a") {
        $str[$i] = "4";
    }
    elseif ($str[$i] == "e") {
        $str[$i] = "3";
    }
    elseif ($str[$i] == "l") {
        $str[$i] = "1";
    }
    elseif ($str[$i] == "o") {
        $str[$i] = "0";
    }
    elseif ($str[$i] == "b") {
        $str[$i] = "8";
    }
    elseif ($str[$i] == "t") {
        $str[$i] = "7";
    }
    elseif ($str[$i] == "s") {
        $str[$i] = "5";
    }
    elseif ($str[$i] == "g") {
        $str[$i] = "6";
    }

    echo $str[$i];
}

}

sting("Certaines choses changent, et d'autres ne changeront jamais.");
?>