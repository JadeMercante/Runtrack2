<!DOCTYPE html>
<html lang="en">

<?php 

session_start();
$Dir_Path = '/laragon/www/Runtrack2/Fun/Projet/';
$File_Name = '';
$file_path = '';

if (isset($_SESSION['File_Name'])) {
    $File_Name = $_SESSION['File_Name'];
    echo "File name : {$File_Name}";
    $file_path = $Dir_Path . $File_Name;
}

if (isset($File_Name) && $File_Name != '') {
    $file_path = $Dir_Path . $File_Name;
    echo " <br /> File path :" . $file_path . "<br />";
    $rows = file($file_path);
    $num_vars = count($rows);
    if ($num_vars == 0) {
        $hide = 'visible';
        $bottomhide = 'hidden';
    }
    else{
        $hide = 'hidden';
        $bottomhide = 'visible';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border: 1px solid black;
        }

        td {
            border: 1px solid black;
        }

        .calcul3{
            color: red;
        }

        .calcul2{
            color: green;
        }

        .calcul1{
            color: blue;
        }
        
        .total1{
            color: blue;
        }

        .total2{
            color: green;
        }

        .total3{
            color: red;
        }

        .TopForm{
            visibility: <?php echo $hide; ?>;
        }

        .BottomForm{
            visibility: <?php echo $bottomhide; ?>;
        }

    </style>
</head>

<body>

<?php





echo "<form action='' method='POST'>";
echo "<input type='text' name='file_name' placeholder='Enter file name' class='NewVarfile'>";
echo "<button type='submit' name='FileSub' class='NewVarBtn'>Submit</button>";
echo "</form>";

echo "<form action='' method='POST' class='TopForm'>";
echo "Adding variable to file {$file_path} <br />:";
echo "<input type='number' name='New_Var' placeholder='Enter Total Money' class='TopForm'>";
echo "<button type='submit' name='Submit' class='NewVarBtn'>Submit</button>";
echo "</form>";

if (isset($_POST['FileSub']) && $_POST['file_name'] != '') {
    $File_Name = $_POST['file_name'];
    $file_path = $Dir_Path . $File_Name;
    echo "File name : {$File_Name}";
    if (!file_exists($file_path)) {
        $myfile = fopen($file_path, "w") or die("Unable to open file!");
        fwrite($myfile, "");
    } else {
        $myfile = fopen($file_path, "a+") or die("Unable to open file!");
    }
    $_SESSION['File_Name'] = $File_Name;
    
    
}
if (isset($_POST['Submit']) && isset($_POST['New_Var']) && $File_Name != '') {
    $NewVar = $_POST['New_Var'];
    $Value_Var_POSTed = 0;
    if (isset($NewVar) && $NewVar != NULL) {
        $newVarDeclaration = $NewVar . " = " . $Value_Var_POSTed;
        
        if ($File_Name != '' && isset($File_Name)) {
            $file_path = $Dir_Path . $File_Name;
            $myfile = fopen($file_path, "a+") or die("Unable to open file!");
            file_put_contents($file_path, $newVarDeclaration, FILE_APPEND);
            header("Refresh:0");
        }
    }
}
?>

<table>
    <thead>
        <tr>
            <th>Total</th>
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

        if (isset($_POST['Submit']) && file_exists($file_path) || $File_Name != '' || isset($_POST['Submit2'])) {
            $count = 0;
            foreach ($rows as $row) {
                $parteus = explode('\n', $row);
                $parts = explode('=', $parteus[0]);
                $varName = trim($parts[0] ?? '');
                $varValue = trim($parts[1] ?? '');
                $count++;
                $calcul[$count + 1] = $varValue;
                $total[$count] = $varName;
                
                if ($varValue == 0) {
                    $color = 1;
                }
                elseif ($varValue > 0) {
                    $color = 2;
                }
                elseif ($varValue < 0) {
                    $color = 3;
                }
                else{
                    $color = 1;
                }
                if ($varName == 0) {
                    $colorN = 1;
                }
                elseif ($varName > 0) {
                    $colorN = 2;
                }
                elseif ($varName < 0) {
                    $colorN = 3;
                }
                else{
                    $colorN = 1;
                }
                if ($varName != '' && $varValue != '') {
                    echo "<tr><td class = 'calcul$color'>&nbsp Calcul : " . $calcul[$count + 1] . "</td></tr><td class = 'total$colorN'>Total : " . $total[$count]. " &nbsp</td></tr>";
                }

            }
            
            echo "<tr class = 'BottomForm'><td>";
            echo "<form action='' method='POST' class = 'BottomForm'>";
            echo "Adding variable to file {$file_path} <br />:";
            echo "<input type='number' name='Value_Var_POSTed' placeholder='Enter positive, or negative number' class='NewVarText'>";
            echo "<input type='radio' name='radio' value='positive' required> + (Positif) <input type='radio' name='radio' value='negative'> - (Négagif) <br />";
            echo "<button type='submit' name='Submit2' class='NewVarBtn'>Submit</button>";
            echo "</form>";
            echo "<form action='' method='POST' class = 'BottomForm'>";
            echo "<button type='submit' name='Remove' class='NewVarBtn'>Remove Last</button>";
            echo "</form>";



            if(array_key_exists('Remove', $_POST)) {
                $lines = file($file_path, FILE_IGNORE_NEW_LINES);
                unset($lines[count($lines)-1]);
                file_put_contents($file_path, implode("\n", $lines));
                header("Refresh:0");
            }


            if (isset($_POST['Submit2']) && isset($_POST['Value_Var_POSTed']) && $File_Name != '') {
                $Value_Var_POSTed = $_POST["Value_Var_POSTed"];
                if ($Value_Var_POSTed < 0) {
                    echo "Please enter a positive number";
                }
                elseif ($Value_Var_POSTed > 0) {
                    if ($_POST['radio'] == 'negative') {
                        $Value_Var_POSTed = $Value_Var_POSTed * -1;
                    }
                    $NewVar = intval($total[$count]) + intval($Value_Var_POSTed);
                    echo "{$NewVar} = {$total[$count]} + {$calcul[$count]}";

                    
                    if (isset($Value_Var_POSTed) && $Value_Var_POSTed != NULL) {
                        $newVarDeclaration = "\n" . $NewVar . " = " . $Value_Var_POSTed;
                        
                        if ($File_Name != '' && isset($File_Name)) {
                            echo "Adding {NewVar} = {$Value_Var_POSTed} to {$File_Name}";
                            $file_path = $Dir_Path . $File_Name;
                            $myfile = fopen($file_path, "a+") or die("Unable to open file!");
                            file_put_contents($file_path, $newVarDeclaration, FILE_APPEND);
                            header("Refresh:0");
                        }
                    }
                }
            }
            echo "</td></tr>";
        }

    
    }
        ?>
    </tbody>
</table>
</body>

</html>
