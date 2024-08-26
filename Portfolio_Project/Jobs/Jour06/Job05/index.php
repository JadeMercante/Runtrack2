<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <?php 
        if (isset($_POST['List'])) {
            echo "<link rel='stylesheet' href='./{$_POST['List']}.css'>";
        }
        ?>
    <title>Document</title>
</head>
<body>
    <form method="post"> 
        <select name="List" id="list-select">
        <option value="">--Please choose an option--</option>
        <option value="Style1">Style1</option>
        <option value="Style2">Style2</option>
        <option value="Style3">Style3</option>
        </select>
        <input type="submit" value="Submit">
</select>
    </form>
</body>
</html>