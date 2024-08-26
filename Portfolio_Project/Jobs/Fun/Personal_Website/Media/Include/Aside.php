<?php $path = $_SERVER['DOCUMENT_ROOT']; ?>
<aside style="float: left; width: 200px;">
<?php
    $mysqli = mysqli_connect("localhost", "root", "", "jadempinkyweb");
    $avatar = mysqli_query($mysqli, "SELECT avatar FROM `users` WHERE username = '$login'");
    $row = mysqli_fetch_assoc($avatar);
    ?>
        <a href="/runtrack2/Fun/Personal_Website/Media/Pages/Profile.php"><img src='/runtrack2/Fun/Personal_Website/Media/Images/Uploads/<?= $row['avatar'] ?>' alt='avatar' class = 'ProfilePic'></a>

        <button onclick="window.location.href='/runtrack2/Fun/Personal_Website/index.php'">Home <span class = 'iconmenu'>&#xF425;</span></button>
        <button onclick="window.location.href='#'">Guild <span class = 'iconmenu'>&#9876;</span></button>
        <button onclick="window.location.href='#'">Chat <span class = 'iconmenu'></span></button>
</aside>