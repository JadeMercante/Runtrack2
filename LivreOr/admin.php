<?php
    session_start();
    if (isset($_SESSION['login'])) {
        $login = $_SESSION['login'];
    }
    $mysqli = mysqli_connect("localhost", "root", "", "livreor");
    $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");

    foreach($result as $user) {
        if ($login == $user['login']) {
            $admin = $user['admin'];
        }
    }

    if ($admin == 0) {
        header("Location: ./index.php");
        exit();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <title>Document</title>


    <style>

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }

        body{
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            
        }


    </style>
</head>
    <a href = "./index.php"><button>Back to index</button></a>
    <h1> Welcome <?php echo $login ?> </h1>
    <h2> User Table </h2>
    <table>
        <thead>
            <tr>
                <th>login</th>
                <th>password</th>
                <th>admin</th>
                <th colspan = "2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($mysqli, "SELECT * FROM `utilisateurs`");
            foreach($result as $user) {
                echo "<tr>";
                echo "<td>" . $user['login'] . "</td>";
                echo "<td>" . $user['password'] . "</td>";
                echo "<td>" . $user['admin'] . "</td>";
                echo "<td> <a href = 'deleteuser.php?id=" . $user['id'] . "'> <button class = 'btn-delete'> Delete </button> </a> </td>";
                echo "<td> <a href = 'updateuser.php?id=" . $user['id'] . "'> <button class = 'btn-update'> Update </button> </a> </td>";   
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>