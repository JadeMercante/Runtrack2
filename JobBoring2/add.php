<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nameError = '';
    $firstnameError = '';
    $ageError = '';
    $telError = '';
    $emailError = '';
    $paysError = '';
    $commentError = '';
    $metierError = '';
    $urlError = '';

    $name = htmlentities(trim($_POST['name']));
    $firstname = htmlentities(trim($_POST['firstname']));
    $age = htmlentities(trim($_POST['age']));
    $tel = htmlentities(trim($_POST['tel']));
    $email = htmlentities(trim($_POST['email']));
    $pays = htmlentities(trim($_POST['pays']));
    $comment = htmlentities(trim($_POST['comment']));
    $metier = isset($_POST['metier']) ? $_POST['metier'] : '';
    $url = htmlentities(trim($_POST['url']));

    $valid = true;

    if (empty($name)) {
        $nameError = 'Please enter Name';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $nameError = "Only letters and white space allowed";
    }

    if (empty($firstname)) {
        $firstnameError = 'Please enter firstname';
        $valid = false;
    } else if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $firstnameError = "Only letters and white space allowed";
    }

    if (empty($email)) {
        $emailError = 'Please enter Email Address';
        $valid = false;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = 'Please enter a valid Email Address';
        $valid = false;
    }

    if (empty($age)) {
        $ageError = 'Please enter your age';
        $valid = false;
    }

    if (empty($tel)) {
        $telError = 'Please enter phone';
        $valid = false;
    } else if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#", $tel)) {
        $telError = 'Please enter a valid phone';
        $valid = false;
    }

    if (!isset($pays)) {
        $paysError = 'Please select a country';
        $valid = false;
    }

    if (empty($comment)) {
        $commentError = 'Please enter a description';
        $valid = false;
    }

    if (empty($metier)) {
        $metierError = 'Please select a job';
        $valid = false;
    }

    if (empty($url)) {
        $urlError = 'Please enter website url';
        $valid = false;
    } else if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
        $urlError = 'Enter a valid url';
        $valid = false;
    }

    if ($valid) {
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO user (name, firstname, age, tel, email, pays, comment, metier, url) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $q = $pdo->prepare($sql);
        $q->execute(array($name, $firstname, $age, $tel, $email, $pays, $comment, $metier, $url));

        Database::disconnect();
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Crud</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h3>Add a contact</h3>
    <form method="post" action="add.php">
        <div class="form-group <?php echo !empty($nameError) ? 'has-error' : ''; ?>">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?php echo !empty($name) ? $name : ''; ?>">
            <?php if (!empty($nameError)): ?>
                <span class="help-block"><?php echo $nameError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($firstnameError) ? 'has-error' : ''; ?>">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" value="<?php echo !empty($firstname) ? $firstname : ''; ?>">
            <?php if (!empty($firstnameError)): ?>
                <span class="help-block"><?php echo $firstnameError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($ageError) ? 'has-error' : ''; ?>">
            <label for="age">Age</label>
            <input type="date" class="form-control" name="age" value="<?php echo !empty($age) ? $age : ''; ?>">
            <?php if (!empty($ageError)): ?>
                <span class="help-block"><?php echo $ageError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($emailError) ? 'has-error' : ''; ?>">
            <label for="email">Email Address</label>
            <input type="email" class="form-control" name="email" value="<?php echo !empty($email) ? $email : ''; ?>">
            <?php if (!empty($emailError)): ?>
                <span class="help-block"><?php echo $emailError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($telError) ? 'has-error' : ''; ?>">
            <label for="tel">Telephone</label>
            <input type="tel" class="form-control" name="tel" value="<?php echo !empty($tel) ? $tel : ''; ?>">
            <?php if (!empty($telError)): ?>
                <span class="help-block"><?php echo $telError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($paysError) ? 'has-error' : ''; ?>">
            <label for="pays">Country</label>
            <select name="pays" class="form-control">
                <option value="paris" <?php if ($pays == "paris") echo "selected"; ?>>Paris</option>
                <option value="londres" <?php if ($pays == "londres") echo "selected"; ?>>Londres</option>
                <option value="amsterdam" <?php if ($pays == "amsterdam") echo "selected"; ?>>Amsterdam</option>
            </select>
            <?php if (!empty($paysError)): ?>
                <span class="help-block"><?php echo $paysError; ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group <?php echo !empty($metierError) ? 'has-error' : ''; ?>">
            <label for="metier">Metier</label>
            <div class="checkbox">
                <label><input type="checkbox" name="metier[]" value="dev" <?php if (in_array("dev", $metier)) echo "checked"; ?>> Dev</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"
