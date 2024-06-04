<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form method="POST">
        <input type="text" name="Login" placeholder="Username"><br>
        <input type="text" name="prenom" placeholder="Prénom"><br>
        <input type="text" name="nom" placeholder="Nom"><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="password" name="password2" placeholder="Confirm Password"><br>
        <input type="submit" name="login" value="Inscription">
    </form>
    <a href = "./connexion.php"><button>Log-in</button></a>

    <?php 

$mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
$result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

    if (isset($_POST['login'])) {
        $login = $_POST['Login'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

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
            $sql = "INSERT INTO `utilisateurs` (login, prenom, nom, password) VALUES ('$login', '$prenom', '$nom', '$password')";
            $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
            $result = mysqli_query($mysqli, $sql);
            if ($result) {
                echo "Inscription reussie";
                header("Location: ./connexion.php");
            }
        }
        }
    }



    ?>
</body>
</html>
