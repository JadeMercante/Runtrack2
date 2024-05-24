<?php
$str = "Les choses que l'on possede finissent par nous posseder";
$firstLetter = $str[0];
$len = 0;
$newstr = "";

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}

$lastLetter = $str[$len - 1];

for ($i = 0; $i < $len - 1; $i++) {
    $str[$i] = $str[$i + 1];
}

for ($i = 0; $i < $len - 2; $i++) {
    $newstr .= $str[$i];
}
$fixedStr = $lastLetter . $newstr . $firstLetter;
echo $fixedStr;
?>
