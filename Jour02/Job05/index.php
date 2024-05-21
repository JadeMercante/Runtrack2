<?php
$Nombre = 0;
$i = 1;
while($Nombre < 1001) {
    while ($i < 1001) {
        if ($Nombre % $i == 0) {
            if ($i == $Nombre) {
                $i = $i + 1;
                break;
            }
            elseif ($i == 1) {
                $i = $i + 1;
                break;
            }
            else {
                echo $Nombre . "<br />";
                $i = $i + 1;
            }
        }
    }
    $Nombre++;
}
?>
