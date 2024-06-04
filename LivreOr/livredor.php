<?php 
session_start();
$guest = false;
if (!isset($_SESSION['login'])) {
    $guest = true;
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>

    <style>
        .Comment{
            background-color: white;
            color: black;
            border: 1px solid black;
        }
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
      <form class="d-flex">
        <input class="form-control me-sm-2" type="search" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  <h1> Jadempinky's Homemade Golden Book </h1>
<?php
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $comment = mysqli_query($mysqli, "SELECT * FROM `commentaires`");
    $user = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

    foreach ($comment as $row) {
        echo "<div class = 'Comment'>";
        foreach ($user as $row2) {
            if ($row['id_utilisateur'] == $row2['id']) {
                echo "<p> $row2[login] $row[date]</p>";
            }
            else {
            }
        }
        echo "<p> $row[commentaire]</p>";
        echo "</div>";
    }

    if (!$guest) {
        echo "<form method='post'>
        <input type='text' name='comment' placeholder='Your comment'>
        <input type='submit' name='submit' value='Submit'>
        </form>";

        if (isset($_POST['submit'])) {
            foreach ($user as $row2) {
            $id_user = $row2['id'];
            }
            $comment = $_POST['comment'];
            $login = $_SESSION['login'];
            }

            $mysqli = mysqli_connect("localhost", "root", "", "livreor");
            $insert = mysqli_query($mysqli, "INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '$comment', '$id_user', current_timestamp())");
            header("Location: ./livredor.php");
    }

?>
</body>
</html>