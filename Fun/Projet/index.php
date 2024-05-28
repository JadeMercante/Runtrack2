<!DOCTYPE html>
<html lang="en">

<?php 

session_start();
$Dir_Path = '/laragon/www/Runtrack2/Fun/Projet/';
$File_Name = '';
$file_path = '';
$startingSold = 666;
$savings = 1200;
$totalall = $startingSold + $savings;

if (isset($_SESSION['File_Name'])) {
    $File_Name = $_SESSION['File_Name'];
    $file_path = $Dir_Path . $File_Name;
}

/*




https://getbootstrap.com/docs/4.0/components/modal/


AJOUTER UN MODAL POUR AJOUTER DES VALEURS







*/

if (isset($File_Name) && $File_Name != '') {
    $file_path = $Dir_Path . $File_Name;
    $rows = file($file_path);
    $num_vars = count($rows);
    if ($num_vars == 0) {
        $bottomhide = 'hidden';
    }
    else{
        $bottomhide = 'visible';
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
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


        .BottomForm{
            visibility: <?php echo $bottomhide; ?>;
        }

        .RemoveBtn{
            background-color: red;
        }

    </style>
</head>

<body>

<h1>Livre de Caisse.</h1>
<span>Solde de départ: <?php echo $startingSold ?> € (cashflow mensuel) + <?php echo $savings ?> € (economies)</span>
<p>Total: <?php echo $totalall ?> €</p>
<?php
echo "<form action='' method='POST'>";
echo "<input type='text' name='file_name' placeholder='Enter file name' class='NewVarfile'>";
echo "<button type='submit' name='FileSub' class='NewVarBtn'>Submit</button>";
echo "</form>";


if (isset($_POST['FileSub']) && $_POST['file_name'] != '') {
    $File_Name = $_POST['file_name'];
    $file_path = $Dir_Path . $File_Name;
    $Value_Var_POSTed = 0;
    $newVarDeclaration = $totalall . " = " . $Value_Var_POSTed;
    if (!file_exists($file_path)) {
        $myfile = fopen($file_path, "w") or die("Unable to open file!");
        fwrite($myfile, $newVarDeclaration);
    } else {
        $myfile = fopen($file_path, "a+") or die("Unable to open file!");
    }
    $_SESSION['File_Name'] = $File_Name;
    
    
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
        $rows = file($file_path);
        $num_vars = count($rows);

        if (file_exists($file_path) || $File_Name != '' || isset($_POST['Submit2'])) {
            $count = 0;
            $varhidden = "";
            foreach ($rows as $row) {
                $parteus = explode('\n', $row);
                $parts = explode('=', $parteus[0]);
                $varName = trim($parts[0] ?? '');
                $varValue = trim($parts[1] ?? '');
                $count++;
                $calcul[$count + 1] = $varValue;
                $total[$count] = $varName;



                if ($varValue[0] == 0 ) {
                    $varhidden = 'hidden';
                }
                else {
                    $varhidden = '';
                }

                if ($varValue == 0) {
                    $color = 1;
                    $signe = '';
                }
                elseif ($varValue > 0) {
                    $color = 2;
                    $signe = '+';
                }
                elseif ($varValue < 0) {
                    $color = 3;
                    $signe = ' ';
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
                    echo "<tr><td class = 'calcul$color' $varhidden>&nbsp {$signe}" . $calcul[$count + 1] . "</td></tr><td class = 'total$colorN'>= " . $total[$count]. " &nbsp</td></tr>";
                }

            }
            
            echo "<tr class = 'BottomForm'><td>";
           
            echo "<!-- Button trigger modal -->";
            echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#exampleModal'>";
            echo "Gain / Dépense";
            echo "</button>";
        
            echo "<!-- Modal -->";
            echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
                echo "<div class='modal-content'>";
                echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='exampleModalLabel'>Modal title</h5>";
                    echo "<button type='button' class='btn-close' data-dismiss='modal' aria-label='Close'>X</button>";
                echo "</div>";
                echo "<div class='modal-body'>";
                    echo "<form action='' method='POST' class = 'BottomForm'>";
                    echo "<input type='number' name='Value_Var_POSTed' placeholder='Enter A positive number' min='0' class='NewVarText'>";
                    echo "<input type='radio' name='radio' value='positive' required> + (Positif) <input type='radio' name='radio' value='negative'> - (Négagif) <br />";
                    echo "<button type='submit' name='Submit2' class='NewVarBtn'>Submit</button>";
                    echo "</form>";
                    echo "<form action='' method='POST' class = 'BottomForm'>";
                    echo "<button type='submit' name='Remove' class='RemoveBtn'>Remove Last</button>";
                    echo "</form>";
                echo "</div>";
                echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>";
                echo "</div>";
                echo "</div>";
            echo "</div>";
            echo "</div>";
        



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
