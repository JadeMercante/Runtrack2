<?php
session_start();
$bcrypt = new Bcrypt();
$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');
$id = $_GET['id'];
$mysqli = mysqli_connect('localhost', 'root', '', 'livreor');
$result = mysqli_query($mysqli, 'SELECT * FROM `utilisateurs`');


$login = $_SESSION['login'];

if (!isset($_SESSION['login'])) {
    header("Location: ./connexion.php");
    exit();
}
foreach($result as $user) {
    if ($user['login'] == $login) {
        if ($user['admin'] == 0) {
            header("Location: ./index.php");
        }
    }
}
foreach ($result as $user) {
    if ($user['id'] == $id) {
        $login = $user['login'];
        $password = $user['password'];
        $admin = $user['admin'];
    }
}



?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>


    <style>

        form{
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
            align-self: center;
            margin-top : 40vh;
        }

        body{
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn-submit{
            display: flex;
            background-color: lime;
            border: 1px solid black;
        }

        form{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        section{
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        

    </style>
</head>
<body>
    <form method='POST'>
        <p>Nom d'utilisateur : </p><input type='text' name='Login' value='<?= $login ?>'><br>
        <p>Mot de passe : </p><input type='password' name='password'><br>
        <?php if ($admin == '0') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user' checked>User";
            echo "<input type='radio' name = 'admin' value='moderator'>Moderator";
            echo "<input type='radio' name = 'admin' value='admin'>Admin";
            echo "</section>";
        }
        else if ($admin == '1') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user'>User";
            echo "<input type='radio' name = 'admin' value='moderator'>Moderator";
            echo "<input type='radio' name = 'admin' value='admin' checked>Admin";
            echo "</section>";
        }
        else if ($admin == '2') {
            echo "<section>";
            echo "<input type='radio' name = 'admin' value='user'>User";
            echo "<input type='radio' name = 'admin' value='moderator' checked>Moderator";
            echo "<input type='radio' name = 'admin' value='admin'>Admin";
            echo "</section>";
        }
        ?>
        <input type='submit' name='submit' value='submit' class = "btn-submit">
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $login = $_POST['Login'];
                if (isset($_POST['password'])) {
                $password = $_POST['password'];
                $password = $bcrypt->hash($password);
                }
                $admin = $_POST['admin'];
                if ($admin == 'user') {
                    $admin = 0;
                }
                else if ($admin == 'moderator') {
                    $admin = 2;
                }
                else if ($admin == 'admin') {
                    $admin = 1;
                }
                $sql = "UPDATE `utilisateurs` SET `login` = '$login', `password` = '$password', `admin` = '$admin' WHERE `utilisateurs`.`id` = $id";
                $result = mysqli_query($mysqli, $sql);
                header("Location: ./admin.php");
            }
        ?>
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