<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Exercice 5</title>
</head>
<body>
        <?php
        $str = "On n'est pas le meilleur quand on le croit mais quand on le sait";
        $len = 0;

        for ($i = 0; isset($str[$i]); $i++) {
            $len++;
        }
        $voyelles = 0;
        $consonnes = 0;
        for ($i = 0; $i < $len; $i++) {
            if ($str[$i] == "a" || $str[$i] == "e" || $str[$i] == "i" || $str[$i] == "o" || $str[$i] == "u") {
                $voyelles = $voyelles + 1;

            }
            else {
                if ($str[$i] == " ") {
                    //Do Nothing
                }
                elseif ($str[$i] == "'") {
                    //Do Nothing
                }
                else{
                    $consonnes = $consonnes + 1;
                }

            }
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th>Voyelles</th>
                    <th>Consonnes</th>
                </tr>
            </thead>
            <tr>
                <td><?= $voyelles ?></td>
                <td><?= $consonnes ?></td>
            </tr>
        </table>
</body>
</html>

