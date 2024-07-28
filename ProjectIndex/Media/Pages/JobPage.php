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

$directory2 = "../Jobs/" . $curday;
if (!is_dir($directory2)) {
    die ("Directory $directory2 does not exist You dub bitch");
}

function displayFiles($directory) {
    $files = scandir($directory);
    $num_files = count($files);

    if ($num_files < 2) {
        die ("No files found in directory $directory");
    }

    echo "<ul class = 'FolderOpenMain'>";
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $directory . "/" . $file;
            if (is_dir($filePath)) {
                echo "<li>$file :</li>";
                echo "<ul class = 'FolderOpen'>";
                displayFiles($filePath);
                echo "</ul>";
            } else {
                if ($file == "index.php" || $file == "index.html") {
                    echo "<li><a class='Joblinkindex' href='/runtrack2/ProjectIndex/Media/Media/$filePath'>$file</a></li>";
                }
                elseif (substr($file, -4) == '.jpg' || substr($file, -5) == '.jpeg' || substr($file, -4) == '.png') {
                    echo "<li><a href='/runtrack2/ProjectIndex/Media/Media/$filePath'><img class='imgpreview' src='/runtrack2/ProjectIndex/Media/Media/$filePath'></img></a></li>";
                } else {
                echo "<li><a class='Joblink' href='/runtrack2/ProjectIndex/Media/Media/$filePath'>$file</a></li>";
                }
            }
        }
    }
    echo "</ul>";
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
    echo "<h1>$Welcomeday</h1>";
    echo "<section class = 'FileExplorer'>";
    displayFiles($directory2);
    echo "</section>";
    echo "</section>";
    ?>
</body>
</html>