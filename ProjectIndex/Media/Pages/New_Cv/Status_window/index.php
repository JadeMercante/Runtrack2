
<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/Css/Cv.css?v=<?php echo time(); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="BlackScreen"></div>
    <div class ="status-window">
    <h1>Jade's Status window</h1>
        <div class="Top_box">
            <div class="basic_info">
                <p> Name : Jade Mercante </p>
                <p> Level : 20 </p>
                <p> Class : Apprentice Web Developer</p>
            </div>
            <div class="Picture">
                <img class ="mypic" src="../Assets/Images/Jade.jpg" alt="Jade's picture">
            </div>
        </div>
    <div class="Bottom_box">
        <div class="stats">
            <h2>Skills</h2>
            <ul>
                <div class="single_skill">
                    <li>Languages <span class="Lvl">Lvl.2</li>
                    <ul>
                        <div class="XpBar"><div class="Xpbarfill" style="width: 10%;"><span class="XpBarText">10%</span></div></div>
                        <li>English</li>
                        <li>French</li>
                    </ul>
                </div>
                <div class="single_skill">
                    <li>Learning <span class="Lvl">Lvl.1<span></li>
                    <ul>
                        <div class="XpBar"><div class="Xpbarfill" style="width: 50%;"><span class="XpBarText">50%</span></div></div>
                        <li>Capacity to learn</li>
                        <li>And adapt quickly</li>
                    </ul>
                </div>
                <div class="single_skill">
                    <li>Curiosity <span class="Lvl">Lvl.4<span></li>
                    <ul>
                        <div class="XpBar"><div class="Xpbarfill" style="width: 38%;"><span class="XpBarText">38%</span></div></div>
                        <li>Very curious about</li>
                        <li>new technologies</li>
                        <li>and how to use them</li>
                    </ul>
                </div>
                <div class="single_skill">
                    <li>Multitasking <span class="Lvl">Lvl.2<span></li>
                    <ul>
                        <div class="XpBar"><div class="Xpbarfill" style="width: 75%;"><span class="XpBarText">75%</span></div></div>
                        <li>Ability to multitask</li>
                        <li>and stay productive</li>
                        <li>while improving</li>
                    </ul>
                </div>
                <div class="single_skill">
                    <li>Determination<span class="Lvl">Lvl.6<span></li>
                    <ul>
                        <div class="XpBar"><div class="Xpbarfill" style="width: 90%;"><span class="XpBarText">90%</span></div></div>
                        <li>Always determined</li>
                        <li>and pushes through</li>
                        <li>any obstacles</li>
                    </ul>
                </div>
            </ul>
        </div>
        <div class="skills">
            <div id="radarChartContainer">
            <h2 class="chart-title">Stats</h2>
            <canvas id="radarChart"></canvas>
            </div>
        </div>
    </div>
    <div class="more-info">
    <?php
        if ($action == "more") {
            echo "<section class='more-info-section'>";
            echo "<h2> More information </h2>";
            echo "<section id='more-info-section' class='more-info-section description' onclick='Typings()'>";
            echo "<p id='Junior_web_developer'></p>";
            echo "<p id='Clickme'>CLick here to reveal...</p>";
            echo "<p id='Very_passionate'></p>";
            echo "</section>";
            echo "
            <div class='stats'>
            <h2>Work skills</h2>
            <ul>
                <div class='single_skill Job_Skill'>
                    <li>Web Developer <span class='Lvl'>Lvl.2</li>
                    <ul>
                        <div class='XpBar'><div class='Xpbarfill' style='width: 70%;'><span class='XpBarText'>70%</span></div></div>
                        <li>Lvl.1 : Capable of making average website, and fiddle with css.</li>
                        <li>Lvl.2 : Able to make interactive, responsive, and cool websites.</li>
                        <li>Lvl.3 : ???</li>
                    </ul>
                </div>
                <div class='single_skill Job_Skill'>
                    <li>Selling <span class='Lvl'>Lvl.2<span></li>
                    <ul>
                        <div class='XpBar'><div class='Xpbarfill' style='width: 15%;'><span class='XpBarText'>15%</span></div></div>
                        <li>Lvl.1 : Capable of making small sales through the phone.</li>
                        <li>Lvl.2 : Able to make average sales through the phone.</li>
                        <li>Lvl.3 : ???</li>
                    </ul>
                </div>
                <div class='single_skill Job_Skill'>
                    <li>Translation <span class='Lvl'>Lvl.1<span></li>
                    <ul>
                        <div class='XpBar'><div class='Xpbarfill' style='width: 38%;'><span class='XpBarText'>38%</span></div></div>
                        <li>Lvl.1 : Translating French to English and vice versa.</li>
                        <li>Lvl.2 : ???</li>
                    </ul>
                </div>
            </ul>
        </div>";
        echo "</section>";
        }
        else {
    ?>
    <form method="post" action="index.php?action=more">
        <input type="submit" name="more" value="Show more v" class="more">
    </form>
    <?php 
        }
    ?>
    </div>
    </div>
</body>

<script>
    function Typings() {
        document.getElementById("Clickme").style.display = "none";
        //Remove the "on click" proprety from the section
        document.getElementById("more-info-section").removeAttribute("onclick");

        typingEffect("Junior web developer, looking for a new challenge.", "Junior_web_developer");
        
        setTimeout(() => {
            typingEffect("Very passionate about coding, and love to learn new things.", "Very_passionate");
        }, 1800);
        
        
    }
    function typingEffect(txt, id) {
        var i = 0;
        var speed = 35; /* The speed/duration of the effect in milliseconds */

        typeWriter();
        function typeWriter() {
        if (i < txt.length) {
            document.getElementById(id).innerHTML += txt.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        }
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    var ctx = document.getElementById('radarChart').getContext('2d');
    var radarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ['Html', 'Css', 'Php', 'Js'],
            datasets: [{
                label: 'Current skills"',
                data: [18, 18, 25, 5],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'pink',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true
                }
            }
        }
    });

    function createCustomLegend(chart) {
  const legendContainer = document.querySelector('.chart-legend');
  legendContainer.innerHTML = ''; // Clear existing legend

  chart.data.datasets.forEach((dataset, index) => {
    const legendItem = document.createElement('div');
    legendItem.classList.add('legend-item');

    const colorBox = document.createElement('span');
    colorBox.classList.add('legend-color');
    colorBox.style.backgroundColor = dataset.borderColor;

    const labelText = document.createElement('span');
    labelText.textContent = dataset.label;

    legendItem.appendChild(colorBox);
    legendItem.appendChild(labelText);
    legendContainer.appendChild(legendItem);
  });
}

// Call this function after creating the chart
createCustomLegend(radarChart);
</script>






</html>