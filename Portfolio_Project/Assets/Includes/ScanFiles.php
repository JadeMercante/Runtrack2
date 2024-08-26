<?php
function scanfiles($folder) {
    $files = array();
    $dir = opendir($folder);
    while ($file = readdir($dir)) {
        if ($file != "." && $file != "..") {
            if (is_dir($folder . "/" . $file)) {
                $files[$file] = scanfiles($folder . "/" . $file);
            } else {
                $files[] = $file;
            }
        }
    }
    return $files;
}


?>