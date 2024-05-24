<?php
$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";
$len = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}

for ($i = 0; $i < $len; $i++) {
    if ($i % 2 == 0) {
        echo $str[$i];
    }
    else {
        echo "*";
    }
}
?>







