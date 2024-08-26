<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<Style>
    td{
        border: 1px solid black;
    }
    table{
        margin-top : 20px;
    }
</Style>
<body>
    
    <?php
        $Answer = "";
        $Username = "";
        $Password = "";
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Username = $_POST["Username"];
            $Password = $_POST["Password"];
            if ($Username == "" || $Password == "") {
                $Answer = "Please, input your log-in informations...";
            }
            else {
            
            // Look if they are pair or not
            if ($Username == "John") {
                if ($Password == "Rambo") {
                    $Answer = "C'est pas ma guerre!";
                }

                elseif ($Password == "Cena") {
                    $Answer = "AND HIS NAME IS JOHN CEEEEEEENAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA!!!!!!!!!";
                    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/XgUB3lF9IQA?si=K6JIoWGtC01jZBwA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay = "true"; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                }
                else {
                    $Answer = "Votre pire cauchemar!";
                }
            }
            else {
                    $Answer = "Votre pire cauchemar!";
            }
            
        }
        }
    ?>

    <form method="POST">
    Username: <input type="text" name="Username" value = "" placeholder = "Username">
    Password: <input type="password" name="Password" value = "" placeholder = "Password">
        <input type="submit">
    </form>

    <table>
        <?php
        echo $Answer;
        ?>

    </table>
</body>
</html>