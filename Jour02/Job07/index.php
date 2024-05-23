<?php
$height = 10; // Set the desired height of the triangle

for ($row = 0; $row < $height; $row++) {
    for ($space = 0; $space < $height - $row - 1; $space++) {
        echo "&nbsp";
    }

    for ($col = 0; $col < $row; $col++) {
        echo "/";
    }
    // Print the backward slashes for the triangle
    for ($col = $row; $col > 0; $col--) { // Decrement $col to print backward
        if ($col != 0) { // Skip the first slash (already printed)
            echo "\\";
        }
    }

    echo "<br />"; // Move to the next line after each row
}   
?>