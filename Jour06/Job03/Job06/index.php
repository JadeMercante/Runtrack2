<?php
$str = "Les choses que l'on possede finissent par nous posseder.";
$len = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}

    echo "<pre>";

    for ($i = 0; $i < $len; $i++) {
        echo $str[$len - $i - 1];
        var_dump($i);
        var_dump($len);
    }
    echo "</pre>";
?>

