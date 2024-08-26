<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Inscription</title>
    <style>
        body{text-align: center;}
        form{border: 1px solid black; display: flex; flex-direction: column; align-items: center; padding: 10px; max-width: 400px; margin: 0 auto;}
    </style>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password2" placeholder="Confirm Password"><br>
        <input type="submit" name="login" value="Inscription" class="btn btn-success">
    </form>
    <a href = "./connexion.php"><button>Log-in</button></a>

    <?php 
$mysqli = mysqli_connect("localhost", "root", "", "livreor");
$result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
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
          echo "Please use at least 1 number, 1 letter and 1 special character";
          }
          else{

              if ($password != $password2) {
                  echo "Les mots de passes ne sont pas identiques";
              }
              else {
                  foreach($result as $user) {
                      if ($login == $user['login']) {
                          $userexist = true;
                      }
                  }
                  if ($userexist) {
                      echo "Le nom d'utilisateur existe déjà";
                  }
                  else {
                  $bcrypt = new Bcrypt(15);
                  $password = $bcrypt->hash($password);
                  $sql = "INSERT INTO `utilisateurs` (login, password) VALUES ('$login', '$password')";
                  $mysqli = mysqli_connect("localhost", "root", "", "livreor");
                  $result = mysqli_query($mysqli, $sql);
                  if ($result) {
                      echo "Inscription reussie";
                      header("Location: ./connexion.php");
                  }
              }
        }
      }
      }
    }



    ?>
</body>
<?php
class Bcrypt{
    private $rounds;
  
    public function __construct($rounds = 12) {
      if (CRYPT_BLOWFISH != 1) {
        throw new Exception("bcrypt not supported in this installation. See http://php.net/crypt");
      }
  
      $this->rounds = $rounds;
    }
  
    public function hash($input){
      $hash = crypt($input, $this->getSalt());
  
      if (strlen($hash) > 13)
        return $hash;
  
      return false;
    }
  
    public function verify($input, $existingHash){
      $hash = crypt($input, $existingHash);
  
      return $hash === $existingHash;
    }
  
    private function getSalt(){
      $salt = sprintf('$2a$%02d$', $this->rounds);
  
      $bytes = $this->getRandomBytes(16);
  
      $salt .= $this->encodeBytes($bytes);
  
      return $salt;
    }
  
    private $randomState;
    private function getRandomBytes($count){
      $bytes = '';
  
      if (function_exists('openssl_random_pseudo_bytes') &&
          (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN')) { // OpenSSL is slow on Windows
        $bytes = openssl_random_pseudo_bytes($count);
      }
  
      if ($bytes === '' && is_readable('/dev/urandom') &&
         ($hRand = @fopen('/dev/urandom', 'rb')) !== FALSE) {
        $bytes = fread($hRand, $count);
        fclose($hRand);
      }
  
      if (strlen($bytes) < $count) {
        $bytes = '';
  
        if ($this->randomState === null) {
          $this->randomState = microtime();
          if (function_exists('getmypid')) {
            $this->randomState .= getmypid();
          }
        }
  
        for ($i = 0; $i < $count; $i += 16) {
          $this->randomState = md5(microtime() . $this->randomState);
  
          if (PHP_VERSION >= '5') {
            $bytes .= md5($this->randomState, true);
          } else {
            $bytes .= pack('H*', md5($this->randomState));
          }
        }
  
        $bytes = substr($bytes, 0, $count);
      }
  
      return $bytes;
    }
  
    private function encodeBytes($input){
      // The following is code from the PHP Password Hashing Framework
      $itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  
      $output = '';
      $i = 0;
      do {
        $c1 = ord($input[$i++]);
        $output .= $itoa64[$c1 >> 2];
        $c1 = ($c1 & 0x03) << 4;
        if ($i >= 16) {
          $output .= $itoa64[$c1];
          break;
        }
  
        $c2 = ord($input[$i++]);
        $c1 |= $c2 >> 4;
        $output .= $itoa64[$c1];
        $c1 = ($c2 & 0x0f) << 2;
  
        $c2 = ord($input[$i++]);
        $c1 |= $c2 >> 6;
        $output .= $itoa64[$c1];
        $output .= $itoa64[$c2 & 0x3f];
      } while (true);
  
      return $output;
    }
  }


?>
</html>
