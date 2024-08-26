<?php
include './Assets/Includes/ScanFiles.php';


//set document root if not set
if (!isset($_SERVER['DOCUMENT_ROOT'])) {
    $_SERVER['DOCUMENT_ROOT'] = $_SERVER['PHP_SELF'];
}

$folder = "./Jobs";
session_name('Portfolio');
session_start();
unset($_SESSION['id']);
$_SESSION['id'] = 0;
$id = $_SESSION['id'];

function createFolderModal($id, $file, $filePath) {
    // Call displayFiles and capture its output
    $fileDisplay = displayFiles($filePath);

    // Separate the folder structure and modals
    $folderContent = $fileDisplay['output'];
    $modalsContent = $fileDisplay['modals'];

    return "
    <div class='modal' id='Folder_$id'>
        <div class='modal-content' draggable='true'>
            <span class='close' onclick='closeFolder($id)'>&times;</span>
            <h2>$file</h2>
            $folderContent
        </div>
    </div>
    $modalsContent";
}


function createWebModal($id, $filePath) {
    return "
    <div id='Web_$id' class='modal'>
        <div class='modal-content Content_Web' id='Content_Web'>
            <div class='modal-header Header_Web' id='Header_Web'>
                <p>Title</p>
            </div>
            <span class='close' onclick='closeWeb($id)'>&times;</span>
            <h2>$filePath</h2>
            <iframe
                class='webframe'
                src='$filePath'
                name='targetframe'
                allowTransparency='true'
                scrolling='yes'
                frameborder='0'
            >
            </iframe>
        </div>
    </div>";
}
function displayFiles($directory) {
    $id = $_SESSION['id'];
    $files = scandir($directory);
    $num_files = count($files);

    if ($num_files < 2) {
        die ("No files found in directory $directory");
    }

    $output = "<div class='FolderOpenMain folder-container Desktop_$id' id='GridSpace'>";
    $modals = "";  // To store all the modals separately
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            $filePath = $directory . "/" . $file;
            if (is_dir($filePath)) {
                $_SESSION['id'] = $_SESSION['id'] + 1;
                $id = $_SESSION['id'];
                $output .= "<div class='folder_icon' ondblclick='openFolder($id)' id='folder_icons_$id' draggable='true' onclick='addclickedclass($id)'>";
                $output .= "<span class='foldername'>$file</span></div>";
                $modals .= createFolderModal($id, $file, $filePath);  // Add modal to the modal string
            } else {
                $_SESSION['id'] = $_SESSION['id'] + 1;
                $id = $_SESSION['id'];
                if ($file == "index.php" || $file == "index.html") {
                    $output .= "<div class='WebFile' ondblclick='openWeb($id)'><span class='Joblinkindex'>$file</span></div>";
                    $modals .= createWebModal($id, $filePath);  // Add web modal to the modal string
                } elseif (substr($file, -4) == '.jpg' || substr($file, -5) == '.jpeg' || substr($file, -4) == '.png') {
                    $output .= "<p class='file'><a href='/runtrack2/ProjectIndex/Media/Media/$filePath'><img class='imgpreview' src='/runtrack2/ProjectIndex/Media/Media/$filePath'></img></a></li>";
                } else {
                    // $output .= "<p class='Joblink file'>$file</p>";
                }
            }
        }
    }
    $output .= "</div>";
    return ['output' => $output, 'modals' => $modals];  // Return both folder structure and modals separately
}

// To use the function and echo the result:


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Assets/Css/index.css?v=<?php echo time();?>">
    <title>Document</title>
</head>
<body>
    <div class="start-up"> 
        <h2>Loading...</h2> 
        <div class="loader_container"> 
            <div class="loader"></div>
        </div>
    </div>
    <section class="desktopbase">
        <h1>Portfolio Project</h1>
        <?php
            $result = displayFiles($folder); // displayFiles now returns an array
            echo $result['output'];          // Output the folder structure
        ?>
    </section>
    
    <!-- Output the modals at the end of the body -->
    <?php
        echo $result['modals'];              // Output the modals
    ?>

    <script src="./Assets/Js/index.js?v=<?php echo time(); ?>"></script>
</body>
</html>
