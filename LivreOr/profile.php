<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: ./connexion.php");
    exit();
}

$login = $_SESSION["login"];

$mysqli = new mysqli("localhost", "root", "", "livreor");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$stmt = $mysqli->prepare("SELECT password FROM utilisateurs WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$stmt->bind_result($password);
$stmt->fetch();
$stmt->close();

if (isset($_POST['NameSub'])) {
    $newName = $_POST['nomInput'];
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
    foreach ($result as $user) {
        if (strtolower($newName) == strtolower($user['login'])) {
            echo "Le nom d'utilisateur existe déjà";
            $newName = $login;
            header("refresh:1; url=./profile.php");
        }
    }
    $stmt = $mysqli->prepare("UPDATE utilisateurs SET login = ? WHERE login = ?");
    $stmt->bind_param("ss", $newName, $login);
    $stmt->execute();
    $stmt->close();
    $login = $newName;
    $_SESSION["login"] = $newName;
    header("Location: ./profile.php");
}

if (isset($_POST['PassSub'])) {
    $newPass = $_POST['PassInput'];
    $stmt = $mysqli->prepare("UPDATE utilisateurs SET password = ? WHERE login = ?");
    $stmt->bind_param("ss", $newPass, $login);
    $stmt->execute();
    $stmt->close();
    header("Location: ./profile.php");
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {text-align: center;}
        .container {border: 1px solid black; max-width: 400px; display: flex; flex-direction: column; align-items: center; padding: 10px;}
        .row {border: 1px solid black; max-width: 240px;}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./profile.php">Profile</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./livredor.php">Golden Book</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <form method = "post" class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search" name = "search">
        <input type="submit" name = "searchbtn">
        <?php 
            if (isset($_POST['searchbtn'])) {
                if (isset($_POST['search'])) {
                $search = $_POST['search'];
                header("Location: ./userprofile.php?user=$search");
                }
            }
        ?>
      </form>
    </div>
  </div>
</nav>

    <h1><?php echo $login ?>'s Profile</h1>
    <div class="container">
        <div class="row">
            <h2>Informations</h2>
            <form method="post">
                <p>
                    Name: <?php echo $login ?>
                    <input type="button" value="Edit" onclick="toggleEditName()">
                    <input type="text" id="nomInput" name="nomInput" placeholder="Write new Name" hidden>
                    <input type="submit" value="Submit" name="NameSub" hidden>
                </p>
                <p>
                    Password: <?php echo $password; ?>
                    <input type="button" value="Edit" onclick="toggleEditPass()">
                    <input type="text" id="PassInput" name="PassInput" placeholder="Write new Pass" hidden>
                    <input type="submit" value="Submit" name="PassSub" hidden>
                </p>
            </form>
        </div>
        <form method = "post">
            <input type = "submit" name = "LogOut" value = "Log Out" class = "btn btn-danger"> 
        </form>
        <?php 

        if(isset($_POST["LogOut"])) {
            unset($_SESSION["login"]);
            unset($login);
            unset($password);
            session_destroy();
            header("Location: ./index.php");
        }
        ?>
    </div>

    <script>
        function toggleEditName() {
            document.getElementById('nomInput').toggleAttribute('hidden');
            document.querySelector('input[name="NameSub"]').toggleAttribute('hidden');
        }

        function toggleEditPass() {
            document.getElementById('PassInput').toggleAttribute('hidden');
            document.querySelector('input[name="PassSub"]').toggleAttribute('hidden');
        }
    </script>
</body>
</html>