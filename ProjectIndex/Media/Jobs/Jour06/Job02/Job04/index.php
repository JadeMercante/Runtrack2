<?php
$Nombre = 0;
while($Nombre < 101) {
    if ($Nombre % 3 == 0 && $Nombre % 5 == 0) {
        echo "FizzBuzz" . "<br />";
    }
    elseif ($Nombre % 3 == 0) {
        echo "Fizz" . "<br />";
    }
    elseif ($Nombre % 5 == 0) {
        echo "Buzz" . "<br />";
    }
    else {
        echo $Nombre . "<br />";
    }
    $Nombre++;
}
?>
