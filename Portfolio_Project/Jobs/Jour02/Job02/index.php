<?php
$Nombre = 0;
$Nombre2 = 0;
$Nombre3 = 0;
while($Nombre < 1338) {
    /*
        if ($Nombre == 26, $Nombre == 37, $Nombre == 88, $Nombre == 1111, $Nombre == 3233) {
        echo "<br />";      J'aime me faire chier mdr
    }
    */
    if ($Nombre == 26) {
        echo "<br />";
    }
    elseif ($Nombre == 37) {
        echo "<br />";
    }
    elseif ($Nombre == 88) {
        echo "<br />";
    }
    elseif ($Nombre == 1111) {
        echo "<br />";
    }
    elseif ($Nombre == 3233) {
        echo "<br />"; //Jsp pk, dans tout les cas, sa s'arrete a 1337 ptdr
    }
    else {
        echo $Nombre . "<br />";
    }
    $Nombre++;
}
while($Nombre == 1338 && $Nombre2 < 1338) {
    
    switch ($Nombre2) {
        case 26:
            echo "<br />";
            break;
        case 37:
            echo "<br />";
            break;
        case 88:
            echo "<br />";
            break;
        case 1111:
            echo "<br />";
            break;
        case 3233:
            echo "<br />";
            break;
        default:
            echo "Nombre 2 :" . $Nombre2 . "<br />";
    }
    $Nombre2++;
}

while ($Nombre2 == 1338 && $Nombre3 < 1338) {

    $output = match ($Nombre3) {
        26 => "<br />",
        37 => "<br />",
        88 => "<br />",
        1111 => "<br />",
        3233 => "<br />",
        default => "Nombre 3 :" .  $Nombre3 . "<br />",
    };
    $Nombre3++;
    echo $output;
}
?>




