<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>run track</title>
    <?php
    $border = $_GET['border'];
    $color = $_GET['color'];
    $width = 20;
    $height = 20;
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

        .rectangle {
            background-color: white;
            width: <?php echo $width; ?>px;
            height: <?php echo $height; ?>px;
            border: <?php echo $border; ?>px solid <?php echo $color; ?>;
        }
    </style>
</head>
<body>


    <!-- Add a colorwheel to change the color of the border -->
    <form>
        <label for="width">Width:</label>
        <input type="range" id="border" name="border" min="2" max="10" value="<?php echo $border; ?>">
        <input type ="color" id="color" name="color" value="<?php echo $color; ?>">
        <input type="submit" value="Submit">
    </form>
    <div class="rectangle"></div>
</body>
</html>