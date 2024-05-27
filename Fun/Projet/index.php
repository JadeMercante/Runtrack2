<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }
    


    </style>
</head>

<body>

<?php
session_start();

$Dir_Path = '/laragon/www/Projets_Cool/Language/';
$File_Name = '';
$file_path = '';

if (isset($_SESSION['File_Name'])) {
    $File_Name = $_SESSION['File_Name'];
    $file_path = $Dir_Path . $File_Name;
}



echo "<form action='' method='post'>";
echo "<input type='text' name='file_name' placeholder='Enter file name' class='NewVarfile'>";
echo "<button type='submit' name='FileSub' class='NewVarBtn'>Submit</button>";
echo "</form>";

echo "<form action='' method='post'>";
echo "Adding variable to file {$file_path} <br />:";
echo "<input type='number' name='New_Var' placeholder='Enter TOtal Money' class='NewVarText'>";
echo "<input type='number' name='Value_Var_Posted' placeholder='Enter positive, or negative number' class='NewVarText'>";
echo "<button type='submit' name='Submit' class='NewVarBtn'>Submit</button>";
echo "</form>";

$NewVar = 0;
$newVarDeclaration = 0;

if (isset($_POST['FileSub']) && $_POST['file_name'] != '') {
    $File_Name = $_POST['file_name'];
    $file_path = $Dir_Path . $File_Name;
    echo "File name : {$File_Name}";
    if (!file_exists($file_path)) {
        $myfile = fopen($file_path, "w") or die("Unable to open file!");
        fwrite($myfile, "\n");
    } else {
        $myfile = fopen($file_path, "a+") or die("Unable to open file!");
    }
    $_SESSION['File_Name'] = $File_Name;
}

if (isset($_POST['Submit']) && isset($_POST['New_Var']) && isset($_POST['Value_Var_Posted']) && $File_Name != '') {
    $NewVar = $_POST['New_Var'];
    $Value_Var_Posted = $_POST['Value_Var_Posted'];
    if (isset($NewVar) && isset($Value_Var_Posted) && $NewVar != NULL && $Value_Var_Posted != NULL) {
        $newVarDeclaration = $NewVar . " = " . $Value_Var_Posted . "\n";
        
        if ($File_Name != '' && isset($File_Name)) {
            $file_path = $Dir_Path . $File_Name;
            $myfile = fopen($file_path, "a+") or die("Unable to open file!");
            file_put_contents($file_path, $newVarDeclaration, FILE_APPEND);
            
        }
        
    }
}
?>

<table>
    <thead>
        <tr>
            <th>Total</th>
            <th> </th>
            <th>+/-</th>
        </tr>
    </thead>
    <tbody>
        <?php    if (isset($File_Name) && $File_Name != '') {
        $file_path = $Dir_Path . $File_Name;
        echo " <br /> File path :" . $file_path . "<br />";
        $rows = file($file_path);
        $num_vars = count($rows);
        echo "Destination file : $file_path <br>";
        echo "Number of variables: " . $num_vars . "<br>";

        if (isset($_POST['Submit']) && file_exists($file_path) || isset($_POST['FileSub'])) {
            foreach ($rows as $row) {
                $parts = explode('=', $row);
                $varName = trim($parts[0] ?? '');
                $varValue = trim($parts[1] ?? '');
                if ($varName != '' && $varValue != '' && $varName[0] != '<?php') {
                    echo "<tr><td>$varName</td><td>=</td><td>$varValue</td></tr>";
                }
            }
            unset($_POST["Submit"]);
            $varName = NULL;
            $varValue = NULL;
        }
    } else {
        echo "File name not set";
    }
        ?>
    </tbody>
</table>
</body>

</html>