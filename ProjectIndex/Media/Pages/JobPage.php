<?php
session_name('globalindex');
session_start();

if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = "Francais";
}

$curday = $_GET['day'];
$_SESSION['day'] = $curday;

$language = $_SESSION['language'];
include ("../Include/" . $language . ".php");


// Separation du code, car jsp c'est mieux

$directory2 = "../Jobs/" . $curday . "/";
if (!is_dir($directory2)) {
    die ("Directory $directory2 does not exist You dub bitch");
}

$files2 = scandir($directory2);

$num_files = count($files2);

if ($num_files < 2) {
    die ("No files found in directory $directory2");
}

foreach ($files2 as $keyC => $valueC) {
    if ($valueC == '.' || $valueC == '..') {
        unset($files2[$keyC]);
    }
    else{
    if (substr($files2[$keyC], -4) != '.php' || substr($files2[$keyC], -4) != '.css' || substr($files2[$keyC], -3) != '.js' || substr($files2[$keyC], -4) != '.sql' ) {
        $directory3 = "../Jobs/" . $curday . "/" . $files2[$keyC] . "/";
        if (!is_dir($directory3)) {
            die ("Directory $directory3 does not exist You dub bitchE");
        }
        
        $files3 = scandir($directory3);
        
        $num_files2 = count($files3);
        
        if ($num_files2 < 2) {
            die ("No files found in directory $directory3");
        }
        
    }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/index.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
    <?php
    include ("../Include/nav3D.php");
    echo "<section class='mainPage'>";
    echo "<h1> $Welcomeday</h1>";
    foreach ($files2 as $key => $value) {
        echo "<ul>";
        if ($value == '.' || $value == '..') {
            unset($files2[$key]);
        }
        else{
            if (substr($files2[$key], -4) == '.php' || substr($files2[$key], -4) == '.css' || substr($files2[$key], -3) == '.js' || substr($files2[$key], -4) == '.sql' ) {
            echo "<li><a class = 'Joblink' href = '/runtrack2/ProjectIndex/Media/Jobs/$curday/$files2[$key]'>$files2[$key] </a></li><br>";
        }
        else{
            echo "<li> $files2[$key] </li><br>";
            echo "<ul>";
            if (isset($files3)) {
                foreach ($files3 as $key2 => $value2) {
                    if ($value2 == '.' || $value2 == '..') {
                        unset($files3[$key2]);
                    }
                    else {
                    echo "<li><a class = 'Joblink' href = '/runtrack2/ProjectIndex/Media/Jobs/$curday/$files2[$key]/$files3[$key2]'>$files3[$key2] </a> </li>";
                    }
                }
                echo "</ul>";
            }
        }
    }
    echo "</ul>";
    }
    echo "</section>";
    ?>
</body>
</html>