<?php
$Nombre = 0;
while($Nombre < 101) {
    if ($Nombre < 21) {
        echo "<i>" . $Nombre . "</i><br />";
    }
    elseif ($Nombre < 51 && $Nombre > 20) {
        echo "<u>" . $Nombre . "</u><br />";
    }
    else {
        echo $Nombre . "<br />";
    }
    $Nombre++;
}
?>
