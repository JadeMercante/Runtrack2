<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cdpi_groupe1_dev1</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css?v=<?php echo time();?>" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;
$Error = "None";
if (isset($_GET['Error'])) {
    $Error = $_GET['Error'];
}

try {
    $pdo = new PDO('mysql:host=136.243.172.164:30005;dbname=cdpi_groupe1_dev1', 'cdpi_groupe1_dev1', 'cdpi_groupe1_dev1');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM restaurants LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (empty($rows)){
        echo "There is nothing to see here...";
        exit;
    }
    echo "<table class='table table-striped'>";
    echo "<thead><tr>
            <th>ID</th>
            <th>RESTAURANT NAME</th>
            <th>CITY</th>
            <th>CREATION</th>
            <th>EDIT DATE</th>
            <th>NB CUTLERY MAX</th>
            <th>OPENING DAYS</th>
            <th>OPENING HOUR</th>
            <th>CLOSING HOUR</th>
            <th class='hide_button'>Add/Amend/Delete</th>
        </tr></thead><tbody>";
    
    foreach ($rows as $row) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['city']}</td>
                <td>{$row['creation_date']}</td>
                <td>{$row['edit_date']}</td>
                <td>{$row['nb_cutlery_max']}</td>
                <td>{$row['open_days']}</td>
                <td>{$row['open_hour_begin']}</td>
                <td>{$row['open_hour_end']}</td>
                <td><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-{$row['id']}'>
                Edit
                </button></td>
                </tr>";
    }
    echo "</tbody></table>";
    
    $stmt = $pdo->prepare("SELECT * FROM restaurants LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    $rows2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($rows2 as $row2) {
        echo "<div class='modal fade' id='modal-{$row2['id']}' tabindex='-1' role='dialog' aria-labelledby='modalLabel-{$row2['id']}' aria-hidden='true'>
                    <div class='modal-dialog' role='document'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <h5 class='modal-title' id='modalLabel-{$row2['id']}'>{$row2['name']}</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <!-- Add your form or content here -->
                                <h1>Edit restaurant</h1>
                    <form method='post' action=''>
                <h2> Choose which restaurant to edit </h2>";
            echo "<br />";
            echo "<label for='name'>New name:</label>";
            echo "<input type='text' name='nameRestaurant' id='name' value = '" . $row2['name'] . "'><br />";
            echo "<label for='address'>New Address:</label>";
            echo "<input type='text' name='address' id='address' value = '" . $row2['city'] . "'><br />";
            echo "<label for='MaxTables'>New Max Tables:</label>";
            echo "<input type='number' name='MaxTables' id='MaxTables' value = '" . $row2['nb_cutlery_max'] . "'><br />";
            echo "<label>Please, choose the new days you are opened</label>";
            echo "<br />";

            $opendayscheck = $row2['open_days'];
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            foreach ($days as $day) {
                $checked = (strpos($opendayscheck, $day) !== false) ? 'checked' : '';
                echo "<input type='checkbox' id='$day' name='openDays[]' value='$day' $checked />";
                echo "<label for='$day'>$day</label>";
            }
            ?>

            <label for='openingTime'>New Opening Time:</label>
            <input type='time' name='openingTime' id='openingTime' value = "<?php echo htmlspecialchars($row2['open_hour_begin']); ?>" />
            <label for='closingTime'>New Closing Time:</label>
            <input type='time' name='closingTime' id='closingTime' value = "<?php echo htmlspecialchars($row2['open_hour_end']); ?>"><br /><br />
            <br />
        
            <input type='submit' value='Confirm' name='submit'>
            </form>
            <?php 
            if ($Error == "InvalidRestaurantName") {
                echo "Error: Invalid restaurant name, must follow these instructions.";
                echo "<ul>
                        <li>Start with a letter</li>
                        <li>Must not end with a space</li>
                        <li>Max 50 characters</li>
                      </ul>";
            }
            if ($Error == "InvalidCityName") {
                echo "Error: Invalid city name.";
            }
    
    if(isset($_POST['submit'])) {
        $nameRestaurantToEdit = $_POST['nameRestaurantToEdit'];
        $nameRestaurant = null;
        $address = null;
        $MaxTables = null;
        $openDays = null;
        $openingTime = null;
        $closingTime = null;
        if (isset($_POST['nameRestaurant'])) {
            $nameRestaurant = $_POST['nameRestaurant'];
        }
        if (isset($_POST['address'])) {
            $address = $_POST['address'];
        }
        if (isset($_POST['MaxTables'])) {
            $MaxTables = $_POST['MaxTables'];
        }
        if (isset($_POST['openDays'])) {
            $openDays = implode('-', $_POST['openDays']);
        }
        if (isset($_POST['openingTime'])) {
            $openingTime = $_POST['openingTime'];
        }
        if (isset($_POST['closingTime'])) {
            $closingTime = $_POST['closingTime'];
        }
        
        header("Location: ./Pages/ManageRestaurant.php?Mode=Edit&nameRestaurantToEdit=$nameRestaurantToEdit&name=$nameRestaurant&city=$address&openingDate=$openingTime&closingDate=$closingTime&maxTables=$MaxTables&openDays=$ImplodedDays&openingHour=$openingTime&closingHour=$closingTime");
    }
           
                        echo "</div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                            <button type='button' class='btn btn-primary'>Save changes</button>
                        </div>
                    </div>
                </div>
            </div>";
    }

    if ($page > 1) {
        echo "<a href='?page=" . ($page - 1) . "'>Previous</a>";
    }

    $offset2 = ($page) * $recordsPerPage;
    $stmt = $pdo->prepare("SELECT * FROM restaurants LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $recordsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset2, PDO::PARAM_INT);
    $stmt->execute();

    $rows3 = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($rows3) > 0) {
        echo "<a href='?page=" . ($page + 1) . "'>Next</a>";
    }

} catch(PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

</body>
</html>