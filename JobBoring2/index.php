<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crud en php</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <h2>Crud en Php</h2>
            <a href="add.php" class="btn btn-success">Ajouter un user</a>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Firstname</th>
                        <th>Age</th>
                        <th>Tel</th>
                        <th>Email</th>
                        <th>Pays</th>
                        <th>Comment</th>
                        <th>Metier</th>
                        <th>Url</th>
                        <th class ="Editor">Edition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'database.php';
                    $pdo = Database::connect();
                    $sql = 'SELECT * FROM user ORDER BY id DESC';
                    foreach ($pdo->query($sql) as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['firstname'] . '</td>';
                        echo '<td>' . $row['age'] . '</td>';
                        echo '<td>' . $row['tel'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['pays'] . '</td>';
                        echo '<td>' . $row['comment'] . '</td>';
                        echo '<td>' . $row['metier'] . '</td>';
                        echo '<td>' . $row['url'] . '</td>';
                        echo '<td><a class="btn" href="edit.php?id=' . $row['id'] . '">Read</a> <a class="btn btn-success" href="update.php?id=' . $row['id'] . '">Update</a> <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                        echo '</tr>';
                    }
                    Database::disconnect();
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
