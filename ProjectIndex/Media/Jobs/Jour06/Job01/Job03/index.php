<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $data = array(); // Initialize an empty array to store the form data

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $age = $_POST["age"];

            //save the values inside of a list as different variables
            $data[] = array("firstname" => $firstname, "lastname" => $lastname, "age" => $age);
            
        }
    ?>

    <form method="post">
        First name: <input type="text" name="firstname"><br>
        Last name: <input type="text" name="lastname"><br>
        Age: <input type="number" name="age"><br>
        <input type="submit">
    </form>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
        </tr>
        <?php
        foreach ($data as $row) {
            // Display the data in a table
            echo "<tr>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>