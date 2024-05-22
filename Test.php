<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <?php
       function test($x) {
            if($x % 2 == 0) {
                return $x . " est pair";
            }
            else {
                return $x . " est impair";
            }
        }
    ?>
</head>
<body>
    <h1>Test</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="number">Entrez un nombre : </label>
        <input type="number" name="number" id="number">
        <input type="submit" value="Envoyer">
    </form>

    <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo test($_POST['number']);
    }
    ?>
</body>
</html>
