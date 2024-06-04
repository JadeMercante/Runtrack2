<?php
session_start();

if (!isset($_SESSION["username"])) {
    $_SESSION["username"] = "Visitor";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href = "./connexion.php"><button>Log-in</button></a>
    <a href = "./inscription.php"><button>Inscription</button></a>
    <h1>Just a random memorial</h1>
    <p> Greetings <strong><?php echo $_SESSION["username"]?> </strong>, I see you came to my memorial, you see, life is a mysterious thing, and humans, are a mysterious thing... They could hear about the death of a fellow comrade, and yet, not even stop to wish him peace, anyways, I hope you have a great stay.</p>

<?php
    if (isset($_POST['gotologin'])) {
        header();
    }
    if (isset($_POST['gotoregister'])) {
        header("Location: inscription.php");
    }

    if ($_SESSION["username"] == "admin") {
        $mysqli = mysqli_connect("localhost", "root", "", "moduleconnexion");
        $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
        $column = mysqli_query($mysqli, "SHOW COLUMNS FROM `utilisateurs`");
        echo "Welcome Admin";

        echo "<table>";
        echo "<thead>";
        foreach ($column as $row2) {
            echo "<th>" . $row2["Field"] . "</th>";
        }
        echo "</thead>";
        echo "<tbody>";
        foreach ($result as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>";
    }

?>
</body>
</html>