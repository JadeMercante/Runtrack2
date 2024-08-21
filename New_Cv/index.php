<?php
include('./Assets/Includes/info.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jade Mercante CV</title>
    <link rel="stylesheet" href="./Assets/Css/Main_Cv.css?v=<?php echo time(); ?>">
    <link href="/Assets/Css/print.css" media="print" rel="stylesheet" />
</head>
<body>
    <div class="BlackScreen" id="BlackScreen"></div>
    <h1>CV Jade MERCANTE</h1>
    <div class="Wormhole"></div>
    <img id="hole-image" src="Assets/Images/hole.png" alt="Hole in the website" class="img-hole" onclick="animateAndRedirect()">


    </div>

    
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="Assets/Images/Jade.jpg" alt="Jade's picture" class="img-me" onclick="Wormhole()">
                <h2>Informations personnelles</h2>
                <p>
                    <strong>Nom :</strong> <?php echo $nom; ?><br>
                    <strong>Date de naissance :</strong> <?php echo $naissance; ?><br>
                    <strong>Adresse :</strong> <?php echo $adresse; ?><br>
                    <strong>Numéro de téléphone :</strong> <?php echo $tel; ?><br>
                    <strong>Adresse e-mail :</strong> <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                    <button onclick="print()" class="btn">Imprimer</button>
                </p>
            </div>
            <div class="col-md-8">
                <h2>Compétences</h2>
                <ul>
                    <?php foreach($competence as $c) { ?>
                        <li><?php echo $c; ?></li>
                    <?php } ?>
                </ul>
                <h2>Langues orales</h2>
                <ul>
                    <?php foreach($langueOral as $langue => $niveau) { ?>
                        <li><?php echo $langue . " : " . $niveau; ?></li>
                    <?php } ?>
                </ul>
                <h2>Langues ecrites</h2>
                <ul>
                    <?php foreach($langueEcrit as $langue => $niveau) { ?>
                        <li><?php echo $langue . " : " . $niveau; ?></li>
                    <?php } ?>
                </ul>
                <h2>Loisirs</h2>
                <ul>
                    <li>Jeux vidéos</li>
                    <li>Coder</li>
                    <li>Lire</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2>Diplôme</h2>
                <?php foreach($formation as $f) { ?>
                    <p>
                        <strong>Brevet des colleges :</strong> : <?php echo current($f) . " | " . next($f) . " | " . end($f); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="col-md-8">
                <h2>Description</h2>
                <p id="Desc">
            Je suis une personne motivée et enthousiaste,
            avec un peu d’expérience dans le code,
            j’aime bien créer des bots dans mon temps libre.
            Les bots que je faisais n’étaient pas forcément essentiels,
            c'était simplement des petits projets, en python,
            pour automatiser des actions répétitives ou compliquées.
            Sinon, je fait des petits projets de site webs dans mon temps libre.
            Je suis motivée pour acquérir de nouvelles compétences,
            et connaissances, afin d’élargir mes aptitudes.
        </p>
            </div>
        </div>
    </div>

    <div class="XpTravail">
        <h3>Experience de travail</h3>
        <?php foreach($xpTravail as $xt) { ?>
            <div class="ListeInfo">
                <ul>
                    <li class="NomEntreprise"><?php echo $xt["nom"]; ?></li>
                    <li class="Adress"><?php echo $xt["adresse"]; ?></li>
                    <li class="Date"><?php echo $xt["date"]; ?></li>
                </ul>
            </div>
        <?php } ?>
    </div>

    <script>
function animateAndRedirect() {
  window.document.documentElement.scrollTop = 0;
  const holeImage = document.getElementById('BlackScreen');
  //Give the body a class
  
  document.body.classList.add('stop-scrolling');

  
  
  holeImage.classList.add('animate-hole');

  
  
  setTimeout(() => {
    // Redirect the user to the Status_Window page
    errormessage();
    
  }, 3000); // 500ms matches the animation duration
}

function errormessage() {
    if (confirm("ERROR, Please leave the page, do not cancel.")) {
        errormessage();
    } else {
        window.location.href = './Status_window/index.php';
    }
}

</script>

</body>
</html>
