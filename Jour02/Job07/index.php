<?php
$height = 10; // Set the desired height of the triangle

for ($row = 0; $row < $height; $row++) {
    // Print leading spaces for indentation
    for ($space = 0; $space < $height - $row - 1; $space++) {
        echo "&nbsp";
    }

    // Print the forward slashes for the triangle
    for ($col = 0; $col <= $row; $col++) {
        echo "/";
    }

    // Print the backslash for the apex (only for the first row)
    if ($row == 0) {
        echo "^";
    }

    // Print the backward slashes for the triangle
    for ($col = $row; $col >= 0; $col--) { // Decrement $col to print backward
        if ($col != 0) { // Skip the first slash (already printed)
            echo "\\";
        }
    }

    echo "<br />"; // Move to the next line after each row
}
?>