<?php
session_name('jadempinkyweb');
session_start();
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html>
<?php include('./Media/Include/head.php'); ?>
<body class = "bodyIndex    ">
    <?php include './Media/Include/Aside.php'; ?>
    <section class = "MainPage">
    <?php 
        echo "<h1>Welcome to Jadempinky's Lair</h1>";
        echo "<hr>";
    if (isset($login)) {
            
        }
    else{
    echo "<section class = 'NotLogged'>";
    echo "<h2>Create your own guilds, chat with other players, and have fun!</h2>";
    echo "<h3>Log in to get started!</h3>";
    echo "<div class = 'notlogged2'>";
    $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
    $result = mysqli_query($mysqli, "SELECT * FROM `globalvars`");
    foreach ($result as $row) {
        if ($row['id'] == 1) {
        $numplayer = $row['Num_Players'];
        $numguild = $row['Num_Guilds'];
        $numquest = $row['Num_Quests'];
        }
    }
    echo "<div class = 'Global_Stats'>
        <h2>Global Stats</h2>
        <p>Players: $numplayer</p>
        <p>Guild Created: $numguild</p>
        <p>Quest Created: $numquest</p>
        </div>";
    echo "<div class = 'rankings'>
        <h2>Rankings</h2>
        <p> #1: NPC Guild</p>
        <p> #2: NPC Guild</p>
        <p> #3: NPC Guild</p>
        </div>";
    echo "</div>";
    echo "</section>";
    }
    ?>
    </section>


</body>
</html>
