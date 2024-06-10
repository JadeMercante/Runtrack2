<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/quartz/bootstrap.min.css">
    <style>

        .resizable-input {
            height: 100px;  
            resize: none;
            width: 25vw;
            max-whidth: 25vw;
        }

    </style>
</head>
<body>
    <form method ="post">
        <input type="mail" name="Email" placeholder="Email"> <br />
        <textarea type="text" name="comment" class="form-control" class="resizable-input" placeholder="Comment"></textarea>
        <input type="submit" name="submit">
    </form>
    <?php 
        if (isset($_POST['submit'])) {
            $email = $_POST['Email'];
            $comment = $_POST['comment'];
            echo $email . $comment;
            mail("maxim.mercante+livredor@laplateforme.io", "Mail from $email", $comment);
        }

    ?>
</body>
</html>