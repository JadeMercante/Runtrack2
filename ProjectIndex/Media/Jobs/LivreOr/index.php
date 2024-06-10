<?php
    session_start();
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

    foreach($result as $user) {
        if ($login == $user['login']) {
            $admin = $user['admin'];
        }
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
  <style>

    body {text-align: center;}

  </style>

  </head>
<body>
<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
  <div class="container-fluid">
    <?php
    if (isset($_SESSION['login'])) {
      $loginuser = $_SESSION['login'];
      echo "<a class='navbar-brand' href='./profile.php'>$loginuser</a>";
    }
    else{
      echo "<a class='navbar-brand' href='./profile.php'>Log-In</a>";
    }
    ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="./index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./livredor.php">Golden Book</a>
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
    <h1> Jadempinky's Homemade Golden Book </h1>
    <?php
    if (isset($_SESSION['login'])) {
    if ($admin == 1) {
        echo "<a href='./admin.php'>Admin Panel</a>";
    }
    else {
        echo "<h1>Hello $login!!</h1>";
        echo "<p>Welcome to Jadempinky's Homemade Golden Book</p>";
        echo "<p> We are happy to see you here. </p>";
    }
    }
    else {
        echo "Greetings, you are not logged in, you can see the website, but not use it unless you are logged in.";
        echo "<br /><img src='./media/guest.gif' alt='Happy peoples dancing'>";
    }
    ?>
</body>
</html>