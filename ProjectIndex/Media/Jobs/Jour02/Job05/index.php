
<?php
function CheckPrime($n)
{
    if ($n < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

for ($i = 2; $i <= 1000; $i++) {
    if (CheckPrime($i)) {
        echo $i . "<br />";
    }
}

?>
