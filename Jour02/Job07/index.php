<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>run track</title>
    <?php
    $Height = 50;
    $color = "#000000";
    $Height = $_GET['Height'];
    $color = $_GET['color'];
    ?>
    <style>
        body {
            margin: 30px;
            padding: 40px;
        }
        
        form {
            margin-bottom: 20px;
        }

        label {
            margin-right: 10px;
        }

        input[type="range"] {
            width: 200px;
        }

        input[type="color"] {
            margin-left: 10px;
        }

        .triangle {
            background-color: white;
            width: 0; /* Comment: Sets the width of the element to zero */
            height: 0; /* Comment: Sets the height of the element to zero */
            border-bottom: <?php echo $Height; ?>px solid 
            <?php echo $color; ?>; /* Comment: Creates the top border of the triangle with a specific color */
            border-left: 40px solid 
            transparent; /* Comment: Creates the left border of the triangle as transparent */
            border-right: 40px solid 
            transparent; /* Comment: Creates the right border of the triangle as transparent */
        }
    </style>
</head>
<body>


    <!-- Add a colorwheel to change the color of the border -->
    <form>
        <label for="Height">Height:</label>
        <input type="range" id="Height" name="Height" min="10" max="100" value="<?php echo $Height; ?>">
        <input type ="color" id="color" name="color" value="<?php echo $color; ?>">
        <input type="submit" value="Submit">
    </form>
    <div class="triangle"></div>
</body>
</html>