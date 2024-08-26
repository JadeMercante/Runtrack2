<?php
$a = 1;
$operation = "+";
$b = 5;

if ($operation == "+") {
    $result = $a + $b;
}

if ($operation == "-") {
    $result = $a - $b;
}

if ($operation == "*") {
    $result = $a * $b;
}

if ($operation == "/") {
    $result = $a / $b;
}

echo $a . $operation . $b . " = " . $result . "\n";
?>

