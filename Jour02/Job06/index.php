
    <?php
    $width = 20;
    $height = 10;

    for ($J = 0; $J < $height; $J++) {
        echo "|";
        if ($J == 0 || $J == $height - 1) {
            for ($i = 0; $i < $width; $i++) {
                echo "--";
            }
        } else {
        
        for ($j = 0; $j + 1 < $width - 1; $j++) {
            echo "&nbsp; &nbsp;";
        }

        }
        echo "|";
        echo "<br />";
    }
    ?>
