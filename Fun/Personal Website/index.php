<?php
if (isset($_SESSION['login'])) {
    $login = $_SESSION['login'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Jadempinky's Website</title>
    <style>
        body {
            margin: 0;
            background-color: pink;
            color: white;
            display: flex;
            flex-direction: row;
            OVERFlOW: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            color: white;
        }

        a {
            color: white;
        }

        a:hover {
            color: black;
        }

        aside{
            display: flex;
            flex-direction: column;
            justify-content: top;
            align-items: center;
            background-color: blue;
            height: 100vh;
            color: white;
            padding-top: 20px;
            border-right: 1px solid white;
            width: 20vw;
            opacity: 1;
            left: -12vw;
            position: absolute;
        }

        aside:hover{
            animation: asideappear 0.9s forwards ease-in-out;
        }

        @keyframes asideappear{
            from {
                transform: translateX(0);
            }

            to {
                transform: translateX(12vw);

            }
        }

        aside button {
            color: white;
            background-color: blue;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            margin-top: 20px;
        }

        aside button:hover{
            background-color: rgba(255, 255, 255, 0.7);
            color: blue;
            animation: moveright 0.5s forwards;
        }

        @keyframes moveright {
            from {
                transform: translateY(0);
            }

            to {
                transform: scale(1.1);

            }
        }

        .MainPage{
            text-align: center;
            width: 100vw;
        }

        .avatar{
            border-radius: 50%;
            width: 7vw;
        }

        hr{
            width: 100vw;
        }
    </style>
</head>
<body>
    <aside style="float: left; width: 200px;">
        <img src="https://www.w3schools.com/howto/img_avatar.png" alt="Avatar" class = "avatar">
        <button onclick="window.location.href='index.php'">Home</button>
        <button onclick="window.location.href='#'">Guild</button>
        <button onclick="window.location.href='#'">Chat</button>
        <button onclick="window.location.href='#'">About Me</button>
    </aside>
    <section class = "MainPage">
    <h1>Welcome to Jadempinky's Lair</h1>
    <hr>
    </section>


</body>
</html>
