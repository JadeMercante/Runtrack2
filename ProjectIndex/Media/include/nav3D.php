
<?php

//if root isn't available set it

$directory = __DIR__ . "./Media/Jobs/";
if (!is_dir($directory)) {
    $directory = "./Media/Jobs/";
}
if (!is_dir($directory)) {
    $directory = "../../Media/Jobs/";
}
if (!is_dir($directory)) {
    die ("Directory $directory does not exist");
} else {
    $directory = "./Media/Jobs/";
}
$files1 = scandir($directory);

$num_files = count($files1);

$_SESSION['num_files'] = $num_files;
function randomFolder($directory) {
    // Check if the directory exists and is readable
    if (!is_dir($directory) || !is_readable($directory)) {
        throw new Exception("Directory does not exist or is not readable: $directory");
    }

    // Scan the directory
    $files = scandir($directory);

    // Remove '.' and '..' from the list
    $files = array_diff($files, array('.', '..'));

    // Check if there are any folders
    if (empty($files)) {
        throw new Exception("No folders found in directory: $directory");
    }

    // Filter to keep only directories
    $folders = array_filter($files, function($file) use ($directory) {
        return is_dir($directory . DIRECTORY_SEPARATOR . $file);
    });

    // Check if there are any folders after filtering
    if (empty($folders)) {
        throw new Exception("No folders found in directory: $directory");
    }

    // Pick a random folder
    $randomFolder = array_rand($folders);

    return $folders[$randomFolder];
}

$random = randomfolder("./Jobs");
?>

<nav>
            <div class = "Home3D">
                <div class = "part1">
                    <div class = "Home3D1">Home</div>
                    <div  onclick = "location.href = '/runtrack2/ProjectIndex/index.php'" class = "Home3D2">Home</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/index.php'" class = "Home3D3">The Home Page</div>
                </div>
            </div>


            <div class = "Home3D">
                <div class = "part1">
                    <div class = "Home3D1 Blue"><?php echo $Jobs ?></div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/JobPage.php?day=<?php echo $random ?>'" class = "Home3D2 BlueText"><?php echo $Jobs ?>s</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/JobPage.php?day=<?php echo $random ?>'" class = "Home3D3 BlueText"><?php echo $daytext ?></div>
                </div>
                <div class = "Home3D4">
                    <?php
                    while ($num_files > 2) {
                        $num_files = $num_files - 1;
                        echo "<a class = 'Home3D5' href = '/runtrack2/ProjectIndex/Media/Pages/JobPage.php?day=" . $files1[$num_files] . "'>" . $files1[$num_files] . "</a><br>";
                    }
                    ?>
                </div>
            </div>

            <div class = "Home3D">
                <div class = "part1">
                    <div class = "Home3D1 Green">CV</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/New_CV/index.php'" class = "Home3D2 GreenText">CV</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/New_CV/index.php'" class = "Home3D3 GreenText">Curriculum Vitae</div>
                </div>
            </div>
</nav>