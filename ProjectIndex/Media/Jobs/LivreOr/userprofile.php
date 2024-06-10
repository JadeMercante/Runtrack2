<?php

session_start();
$guest = false;
if (!isset($_SESSION['login'])) {
    $guest = true;
}

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


$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$login2 = $_GET['user'];
$user = mysqli_query($mysqli, "SELECT * FROM `utilisateurs` WHERE login = '$login2'");
$exist = true;
if (!$login) {
    $exist = false;
}
if (!$user || mysqli_num_rows($user) == 0) {
    $exist = false;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>
    <style>
        body {text-align: center;}
        .container {border: 1px solid black; max-width: 400px; display: flex; flex-direction: column; align-items: center; padding: 10px;}
        .row {border: 1px solid black; max-width: 240px;}

        .Comment{
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
            border: 1px solid black;
        }

        .btn-delete{
            background-color: red;
            border: none;
            color: white;
            padding: 3px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 20px;
            border: 2px solid #4CAF50;
            cursor: pointer;
            transition-duration: 0.4s;
        }
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
    <?php
        if ($exist) {
            $user = mysqli_fetch_assoc($user);
            $user2 = $user;
            echo "<div class='container'>";
            echo "<h1>" . $user['login'] . "'s Profile</h1>";
            echo "<p> Username : " . $user['login'] . "</p>";
            echo "<p> Number of comments : " . $user['nbcomment'] . "</p>";
            echo "</div>";
            echo "<h1> $user[login]'s comments</h1>";
            $mysqli = mysqli_connect("localhost", "root", "", "livreor");
            $comment = mysqli_query($mysqli, "SELECT * FROM `commentaires`");
            $user = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

            foreach ($comment as $row) {
                foreach ($user as $row2) {
                    if ($row['id_utilisateur'] == $row2['id']) {
                        if ($row2['login'] == $login2) {
                            echo "<div class = 'Comment'>";
                            if ($row2['admin'] == 1) {
                                echo "<p> <strong> Administrator </strong>$row2[login] $row[date]</p>";
                            }
                            elseif ($row2['admin'] == 2) {
                                echo "<p> <strong> Moderator </strong>$row2[login] $row[date]</p>";
                            }
                            else{
                            echo "<p> $row2[login] $row[date]</p>";
                            }
                            echo "<p> $row[commentaire]</p>";
                            if (!$guest) {
                            if ($admin == 1) {
                                echo "<a href='./delete.php?id=$row[id]' class = 'btn-delete'>Delete</a>";
                            }
                            echo "</div>";   
                        }
                        
                        else {
                        }

                    }


                    }
                }             
            }
        }
        else {
            $someone = false;
            echo "<p>User not found</p>";
            echo "<p> Here are users close to your research :</p>";
            $mysqli = mysqli_connect("localhost", "root", "", "livreor");
            $userfinder = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
            foreach ($userfinder as $row) {
                similar_text(strtoupper($login2), strtoupper($row['login']), $percent);
                //echo "<p> Pertage of similarity of " . $login2 . " and " . $row['login'] . " : " . round($percent) . "%</p>";
                if ($percent > 65) {
                    $someone = true;
                    echo "<a href='./userprofile.php?user=" . $row['login'] . "'>" . $row['login'] . "</a> <br />";
                }
            }
            if (!$someone) {
                echo "No one";
            }
            
        }

    ?>
</body>

</html>