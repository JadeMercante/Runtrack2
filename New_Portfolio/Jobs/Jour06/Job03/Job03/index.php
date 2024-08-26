<?php
$str = "I'm sorry Dave I'm afraid I can't do that";
$len = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}

for ($i = 0; $i < $len; $i++) {
    if ($str[$i] == "a" || $str[$i] == "e" || $str[$i] == "i" || $str[$i] == "o" || $str[$i] == "u") {
        echo $str[$i];
    }
    else {
        echo " ";
    }
}
?>
