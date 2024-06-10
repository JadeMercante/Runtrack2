<?php
session_name('globalindex');
session_start();

if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = "Francais";
}
$language = $_SESSION['language'];
include ("./Media/Include/" . $language . ".php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Media/Css/index.css?v=<?php echo time(); ?>">
    <title>Jade's Work</title>
</head>
<body>

    <?php
    include ("./Media/Include/nav3D.php");
    echo "<section class='mainPage'>";
    echo "<h1> $Welcome </h1>";
    echo "<h2> $Intro </h2>";
    echo "<h3> $desc </h3>";
    echo "</section>";
    ?>
</body>
</html>