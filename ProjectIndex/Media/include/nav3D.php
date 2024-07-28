
<?php

$directory = __DIR__ . "./Media/Jobs/";
if (!is_dir($directory)) {
    $directory = "./Media/Jobs/";
}
if (!is_dir($directory)) {
    $directory = "../../Media/Jobs/";
}
if (!is_dir($directory)) {
    die ("Directory $directory does not exist");
}
$files1 = scandir($directory);

$num_files = count($files1);


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
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/CV.html'" class = "Home3D2 BlueText"><?php echo $Jobs ?>s</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/CV.html'" class = "Home3D3 BlueText"><?php echo $daytext ?></div>
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
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/CV.html'" class = "Home3D2 GreenText">CV</div>
                    <div onclick = "location.href = '/runtrack2/ProjectIndex/Media/Pages/CV.html'" class = "Home3D3 GreenText">Curriculum Vitae</div>
                </div>
            </div>
</nav>