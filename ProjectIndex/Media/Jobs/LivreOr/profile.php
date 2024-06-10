<?php
session_start();
$bcrypt = new Bcrypt();
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
    $newPass = $bcrypt->hash($newPass);
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
        .container {max-width: 400px; display: flex; flex-direction: column; align-items: center; padding: 10px;}
        .row {border: 1px solid black; max-width: 240px;}
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
                    <?php $password = substr($password, 0, 8); 
                    $password = str_split($password);
                    for ($i = 0; $i < count($password); $i++) {
                        $password[$i] = "*";
                    }
                    $password = implode("", $password);
                    
                    ?>
                    Password: <?php echo $password; ?>
                    <input type="button" value="Edit" onclick="toggleEditPass()">
                    <input type="password" id="PassInput" name="PassInput" placeholder="Write new Pass" hidden>
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


<?php
class Bcrypt{
    private $rounds;
    public function getOriginalPassword($hashedPassword) {
        $salt = substr($hashedPassword, 0, 29);
        $digestSize = 23;
        $rounds = str_pad(substr($salt, 4, 2), 2, '0', STR_PAD_LEFT);
        $rounds = (int) $rounds;

        $seed = substr($hashedPassword, 0, $digestSize);
        $input = '';

        for ($i = 0; $i < strlen($seed); $i += 4) {
            $input .= substr(pack('N', hexdec(bin2hex(substr($seed, $i, 4)))), 1, 4);
        }

        $input = $this->decodeBytes($input);

        $password = '';
        $j = 0;

        for ($i = 0; $i < strlen($input); $i++) {
            $byte = ord($input[$i]);
            $password .= $this->itoa64[$byte >> 2];

            $byte = ($byte & 0x03) << 4;
            if ($i >= $digestSize) {
                $j++;
                $byte |= ord($input[$i + 1]) >> 4;
            }

            $password .= $this->itoa64[$byte >> 2];

            if ($j >= 16) {
                $j = 0;
            }
        }

        return $password;
    }

    private $itoa64 = './ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

    private function decodeBytes($input) {
        $output = '';
        $i = 0;

        do {
            $c1 = strpos($this->itoa64, $input[$i++]);
            $c2 = strpos($this->itoa64, $input[$i++]);
            $c3 = $i < strlen($input) ? strpos($this->itoa64, $input[$i++]) : 64;
            $c4 = $i < strlen($input) ? strpos($this->itoa64, $input[$i++]) : 64;

            $output .= pack('N', ($c1 << 18) | ($c2 << 12) | ($c3 << 6) | $c4);
        } while ($i < strlen($input));

        return $output;
    }
  
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