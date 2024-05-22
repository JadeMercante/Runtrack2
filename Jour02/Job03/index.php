<?php
$Nombre = 0;
while($Nombre < 101) {
    if ($Nombre == 42) {
        echo "La Plateforme" . "<br />";
    }
    elseif ($Nombre < 21) {
        echo "<i>" . $Nombre . "</i><br />";
    }
    elseif ($Nombre < 51 && $Nombre > 20) {
        echo "<u>" . $Nombre . "</u><br />";
    }
    elseif ($Nombre == 42) {
        echo "La Plateforme" . "<br />";
    }
    else {
        echo $Nombre . "<br />";
    }
    $Nombre++;
}
?>
