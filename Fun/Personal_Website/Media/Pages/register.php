<!DOCTYPE html>
<html lang="en">
<?php include('../Include/head.php'); ?>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password2" placeholder="Confirm Password"><br>
        <input type="submit" name="login" value="Inscription" class="btn btn-success">
    </form>
    <a href = "./login.php"><button>Log-in</button></a>

    <?php 
$mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
$result = mysqli_query($mysqli, "SELECT * FROM `users`");
$userexist = false;

    if (isset($_POST['login'])) {
        $login = $_POST['Login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if (preg_match('/^[a-zA-Z0-9]{5,20}$/', $login) == false) {
        echo "The username is invalid";
        }
        else{
          if (preg_match('/^(?=.*[\W_])(?=.*[0-9]).{8,40}$/', $password) == false) {
          echo "The password is invalid <br />";
          echo "Please use at least 1 number, 1 letter and 1 special character, and at least 8 characters long";
          }
          else{

              if ($password != $password2) {
                  echo "Les mots de passes ne sont pas identiques";
              }
              else {
                  foreach($result as $user) {
                      if ($login == $user['username']) {
                          $userexist = true;
                      }
                  }
                  if ($userexist) {
                      echo "Le nom d'utilisateur existe déjà";
                  }
                  else {
                  $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
                  $password = password_hash($password, PASSWORD_BCRYPT);
                  $escapedPass = mysqli_real_escape_string($mysqli, $password);
                  $sql = "INSERT INTO `users` (username, password, friends_id, Titles, Inventory, Creation_date, Last_Seen) VALUES ('$login', '$password', '', 'New Begginings', '', CURDATE(), current_timestamp())";
                  $varinsert = "UPDATE `globalvars` SET `Num_Players` = Num_Players + 1 WHERE `id` = 1";
                  $result = mysqli_query($mysqli, $sql);
                  $result = mysqli_query($mysqli, $varinsert);
                  if ($result) {
                      echo "Inscription reussie";
                      header("Location: ./login.php");
                  }
              }
        }
      }
      }
    }



    ?>
</body>

</html>
