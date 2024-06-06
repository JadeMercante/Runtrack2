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
?>





<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>
    <link rel="stylesheet" href="./media/css/basic.css">

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
  
  <section class = 'containerall'>
  <h1> Jadempinky's Homemade Golden Book </h1>
<?php
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $comment = mysqli_query($mysqli, "SELECT * FROM `commentaires`");
    $user = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
    echo "<div class = 'Commentcontainer'>";
    foreach ($comment as $row) {
        $id_user2 = 99999;
        $usercomment = "";
        echo "<div class = 'Comment'>";
        foreach ($user as $row2) {
            
            $adminedit = false;
            if ($row['id_utilisateur'] == $row2['id']) {
                $id_user2 = $row2['id'];
                if (!$guest) {
                if ($row2['login'] == $login) {
                    echo "<a href = './edit.php?id=$row[id]' class = 'edit-btn'>Edit</a>";
                    echo "<a href='./delete.php?id=$row[id]' class = 'delete-btn'>Delete</a>";
                    $_SESSION['admin'] = $admin;
                    $_SESSION['usertodelete'] = $row2['login'];
                }
                elseif ($admin == 1) {
                    echo "<a href='./delete.php?id=$row[id]' class = 'delete-btn'>Delete</a>";
                }
                }
                if ($row2['admin'] == 1) {
                    echo "<p> <strong> Administrator </strong>$row2[login] $row[date]</p>";
                }
                elseif ($row2['admin'] == 2) {
                    echo "<p> <strong> Moderator </strong>$row2[login] $row[date]</p>";
                }
                else{
                echo "<p> $row2[login] $row[date]</p>";
                }
            }
            else {
            }
        }
        if ($row['id_utilisateur'] != $id_user2) {
        
        if ($admin == 1) {
            echo "<a href='./delete.php?id=$row[id]' class = 'delete-btn'>  Delete</a>";
        }
        echo "<p><strong> [Deleted user] </strong>$row[date]</p>";
        //If I want to delete the instead, add the code here.
        }
        echo "<p> $row[commentaire]</p>";
        if ($row['edited'] == 1) {
            echo "<p> (Edited)</p>";
        }
        echo "</div>";
        }

    echo "</div>";
    if (!$guest) {
        echo "<form method='post'>
        <div class = 'comment-container'>
        <textarea name='comment' class = 'comment-textarea' placeholder='Your comment'></textarea>
        <input type='submit' name='submit' value='Submit' class = 'comment-submit'>
        </div>
        </form>";

        if (isset($_POST['submit'])) {
            $empty = true;
            $mysqli = mysqli_connect("localhost", "root", "", "livreor");
            $user = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
            foreach ($user as $row3) {
                if ($row3['login'] == $_SESSION['login']) {
                    $id_user = $row3['id'];
                }
            }
            $comment = $_POST['comment'];
            if (isset($comment) && !empty($comment)) {
                $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                foreach (range(0, strlen($comment) - 1) as $i) {
                    foreach (range(0, strlen($alphabet) - 1) as $j) {
                        if ($comment[$i] == $alphabet[$j]) {
                            $empty = false;
                        }
                    }
                }
            }
            if ($empty == true) {
                $comment = "No Comment";
            }
            else{
                
            $mysqli = mysqli_connect("localhost", "root", "", "livreor");
            $escapedComment = mysqli_real_escape_string($mysqli, $comment);

            $insert = mysqli_query($mysqli, "INSERT INTO `commentaires` (`id`, `commentaire`, `id_utilisateur`, `date`) VALUES (NULL, '$escapedComment', '$id_user', current_timestamp())");
            $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
            $stmt = $mysqli->prepare("UPDATE utilisateurs SET nbcomment = nbcomment + 1 WHERE login = ?");
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $stmt->close();
            mysqli_close($mysqli);
            echo "<script>window.location.replace('./livredor.php');</script>";
        }
        }
    }
    else{
        echo "You must be logged in to comment.";
    }

?>
</section>
</body>
</html>