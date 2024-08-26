<?php
$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$len = 0;

for ($i = 0; isset($str[$i]); $i++) {
    $len++;
}


for ($i = 0; $i < $len - 1; $i++) {
    if ($i == $len - 2) {

        
        echo $str[$i + 1];
        echo $str[$i - $len + 2];
    }
    else {
        echo $str[$i + 1];
    }
}

?>
