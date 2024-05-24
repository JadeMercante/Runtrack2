
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="Width=device-Width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            color: white;
            background-color: black;
        }
        span{
            color: black;
        }

        .trunks{
            color: black;
        }

    </style>
</head>
<body>
<?php 
function top($Height, $Width) { 
    for ($i = 0; $i < $Height; $i++) {
        for ($j = 0; $j < $Height - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        echo "/";
        for ($k = 0; $k < $i * 2; $k++) {
            echo "_";
        }
        echo "\\";
        echo "<br />";
    }
}

function trunks($Height, $Width) {
    $Width = $Width - 2;
    for ($J = 0; $J < $Width; $J++) {
        echo "|";
        echo "<span>/</span>";
        if ($Height < 0) {}
        for ($j = 0; $j + 1 < $Height; $j++) {
            echo "<span>__</span>";
        }
        echo "<span>\</span>";
        echo "|";
        echo "<br />";
    }
}


function pinetree($Height, $Width) {
    top($Height, $Width);
    trunks($Height, $Width);
    }

if (isset($_POST['Width'])) {
    $Width = $_POST['Width'];
    if (isset($_POST['Height'])) {
        $Height = $_POST['Height'];
        pinetree($Height, $Width);
    }
}
else {
    echo("Please, put values in both fields");
}


?>

<form action="" method="post">
    <input type="Width" name="Width" id="number" placeholder ="Width">
    <input type="Height" name="Height" id="number" placeholder ="Height">
    <input type="submit">
</form>
</body>
</html>
