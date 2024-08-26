<?php

function displayFiles($directory) {
    $files = scandir($directory);
    $num_files = count($files);

    if ($num_files < 2) {   
        echo "<li>No files found in directory $directory</li>";
        return;
    }

    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $directory . "/" . $file;
            if (is_dir($filePath)) {
                echo "<li class='folder'>$filePath</li><ul>";
                displayFiles($filePath);
                echo "</ul>";
            } else {
                echo "<li class='file'>";
                if ($file == "index.php" || $file == "index.html") {
                    echo "<iframe class='card' src='$filePath' allowTransparency='true' width='300px' height='500px' scrolling='yes' frameborder='2px'></iframe>";
                } elseif (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
                    echo "<img src='$filePath' alt='$file' class='thumbnail' />";
                } else {
                    echo "<a href='$filePath' target='_blank'>$file</a>";
                }
                echo "</li>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jade's Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        ul {
            list-style-type: none;
            padding-left: 20px;
        }
        li.folder {
            font-weight: bold;
            margin-top: 10px;
        }
        li.file {
            margin-bottom: 10px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .thumbnail {
            max-width: 300px;
            max-height: 200px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Jade's Portfolio</h1>
    <ul>
        <?php
        displayFiles("./Jobs");
        ?>
    </ul>
</body>
</html>
