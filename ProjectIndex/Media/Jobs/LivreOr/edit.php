<?php
session_start();
$mysqli = mysqli_connect("localhost", "root", "", "livreor");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$id = $_GET['id'];
$usertoedit = $_SESSION['usertodelete'];
$login = $_SESSION['login'];
$comment = mysqli_query($mysqli, "SELECT * FROM `commentaires`");
foreach ($comment as $comment) {
    if ($comment['id'] == $id) {
        $commenttoedit = $comment['commentaire'];
    }
}
if ($login != $usertoedit) {
    header("Location: ./livredor.php");
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
    <?php
    echo "<form method='post'>";
    echo "<input type='text' name='comment' value='$commenttoedit'>";
    echo "<input type='submit' name='submit' value='Submit'>";
    echo "</form>";

    if (isset($_POST['submit'])) {
        if ($login != $usertoedit) {
            echo "You can't edit this comment";
            header("refresh:1; url=./livredor.php");
        }
        else{
        $comment = $_POST['comment'];
        $escapedComment = mysqli_real_escape_string($mysqli, $comment);
        $stmt = $mysqli->prepare("UPDATE commentaires SET commentaire = ?, edited = 1 WHERE id = ?");
        $stmt->bind_param("si", $comment, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: ./livredor.php");
        }
    }

    ?>
</body>
</html>