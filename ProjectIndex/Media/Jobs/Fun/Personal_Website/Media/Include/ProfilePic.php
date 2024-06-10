<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
    $avatar = mysqli_query($mysqli, "SELECT avatar FROM `users` WHERE username = '$login'");
    $row = mysqli_fetch_assoc($avatar);
    $picture = "/runtrack2/Fun/Personal_Website/Media/Images/Uploads/" . $row['avatar'];

    echo "<img src='$picture' alt='avatar' class = 'ProfilePic'>"
?>