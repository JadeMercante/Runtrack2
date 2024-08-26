
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            color: white;
            background-color: black;
        }
        span{
            animation: noel 3s linear infinite;
            background-color: green;
        }

        .trunkes{
            background-color: maroon;
        }

        @keyframes noel{
            0%{
                color: red;
            }
            20%{
                color: orange;
            }
            40%{
                color: yellow;
            }
            60%{
                color: green;
            }
            80%{
                color: blue;
            }
            100%{
                color: purple;
            }
        }
    </style>
</head>
<body>
<?php 
function top($height) {
    $boules = array("&nbsp; ", "&nbsp; ", "&nbsp; ", "&nbsp; ", "<span>o</span>", "&nbsp; ", "&nbsp; ", "&nbsp; ", "&nbsp; ");
    
    for ($i = 0; $i < $height; $i++) {
        for ($j = 0; $j < $height - $i; $j++) {
            echo "&nbsp;&nbsp;";
        }
        echo "/";
        for ($k = 0; $k < $i * 2; $k++) {
            $rand = rand(1, 8);
            echo "<span>". $boules[$rand] . "</span>";
        }
        echo "\\";
        echo "<br />";
    }
}

function leaves($height) {
    $boules = array("&nbsp; ", "&nbsp; ", "&nbsp; ", "&nbsp; ", "<span>o</span>", "&nbsp; ", "&nbsp; ", "&nbsp; ", "&nbsp; ");
    for ($i = 0; $i < $height; $i++) {
        if ($i < 6) {
        }
        else {
            for ($j = 0; $j < $height - $i; $j++) {
                echo "&nbsp;&nbsp;";
            }
            echo "/";
            for ($k = 0; $k < $i * 2; $k++) {
                $rand = rand(1, 8);
                echo "<span>". $boules[$rand] . "</span>";
            }
            echo "\\";
            echo "<br />";
        }
}
}
function trunks($height) {
    for ($i = 0; $i < $height; $i++) {
        if ($i == 0 || $i == $height - 1) {
            for ($j = 0; $j < $height; $j++) {
                echo "&nbsp;";
            }
        echo ("|");
        for ($j = 0; $j < $height; $j++) {
            echo "<span class = 'trunkes'>&nbsp; </span>";
        }
        echo ("|");
        echo "<br />";
    }
}
}

function pinetree($totalheight) {
    top($totalheight);
    leaves($totalheight);
    leaves($totalheight);
    trunks($totalheight);
    }

if (isset($_POST['number'])) {
    $number = $_POST['number'];
    if (isset($_POST['Height'])) {
        $Height = $_POST['Height'];
        for ($i = 0; $i < $number; $i++) {
            pinetree($Height);
        }
    }
}
else {
    echo("Please, put values in both fields");
}


?>

<form action="" method="post">
    <input type="number of trees" name="number" id="number" placeholder ="number of trees">
    <input type="Height" name="Height" id="number" placeholder ="Height">
    <input type="submit">
</form>
</body>
</html>
