<?php
/*

Getting the language and loading the files

*/
if (isset($_GET['lang'])) {
    $languagepage = strtolower($_GET['lang']);
} else {
    $languagepage = "fr";
}

if ($languagepage != "fr" && $languagepage != "en") {
    $languagepage = "fr";
}

if ($languagepage == "fr") {
    $langtogo = "en";
} else {
    $langtogo = "fr";
}
// Load the language and texts
include('./Assets/Includes/' . $languagepage . '.php');
// Load the informations in the corresponding language
include('./Assets/Includes/info' . $languagepage . '.php');

?>
<!DOCTYPE html>
<html lang="<?php echo $languagepage; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $CvJade; ?></title>
    <link rel="stylesheet" href="./Assets/Css/Main_Cv.css?v=<?php echo time(); ?>">
    <link href="/Assets/Css/print.css" media="print" rel="stylesheet" />
</head>
<body>
<!-- Flag to change the lanuage -->
<div class="languageflag <?php echo $langtogo; ?>" onclick="changeLanguage('<?php echo $langtogo; ?>')"></div>
    <!-- Black veil for transition -->
    <div class="BlackScreen" id="BlackScreen"></div>
    <h1><?php echo $CvJade; ?></h1>
    <div class="Wormhole"></div>
    <img id="hole-image" src="Assets/Images/hole.png" alt="Hole in the website" class="img-hole" onclick="animateAndRedirect()">


    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="Assets/Images/Jade.jpg" alt="Jade's picture" class="img-me" onclick="Wormhole()">
                <h2><?php echo $infoperso; ?></h2>
                <p>
                    <strong><?php echo $name; ?> :</strong> <?php echo $nom; ?><br>
                    <strong><?php echo $birth; ?>:</strong> <?php echo $naissance; ?><br>
                    <strong><?php echo $address; ?> :</strong> <?php echo $adresse; ?><br>
                    <strong><?php echo $phone; ?> :</strong> <?php echo $tel; ?><br>
                    <strong><?php echo $email; ?> :</strong> <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
                    <button onclick="print()" class="btn"><?php echo $print; ?></button>
                </p>
            </div>
            <div class="col-md-8">
                <h2><?php echo $skill; ?></h2>
                <ul>
                    <!-- Get all the info from the include -->
                    <?php foreach($competence as $c) { ?>
                        <li><?php echo $c; ?></li>
                    <?php } ?>
                </ul>
                <h2><?php echo $orallanguage; ?></h2>
                <ul>
                    <?php foreach($langueOral as $langue => $niveau) { ?>
                        <li><?php echo $langue . " : " . $niveau; ?></li>
                    <?php } ?>
                </ul>
                <h2><?php echo $writelanguage; ?></h2>
                <ul>
                    <?php foreach($langueEcrit as $langue => $niveau) { ?>
                        <li><?php echo $langue . " : " . $niveau; ?></li>
                    <?php } ?>
                </ul>
                <h2><?php echo $hobbytext; ?></h2>
                <ul>
                    <?php foreach($hobbies as $hobby) { ?>
                        <li><?php echo $hobby; ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <h2><?php echo $Diploma; ?></h2>
                <?php foreach($formation as $f) { ?>
                    <p>
                        <!-- Keeping it french, cuz idk it sounds better-->
                        <strong>Brevet des colleges :</strong> : <?php echo current($f) . " | " . next($f) . " | " . end($f); ?>
                    </p>
                <?php } ?>
            </div>
            <div class="col-md-8">
                <h2><?php echo $Description; ?></h2>
                <p id="Desc"><?php echo $descfull; ?></p>
            </div>
        </div>
    </div>

    <div class="XpTravail">
        <h3><?php echo $experiencetext; ?></h3>
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

function changeLanguage(lang) {
    window.location.href = "./index.php?lang=" + lang;
}


function animateAndRedirect() {
  window.document.documentElement.scrollTop = 0;
  const holeImage = document.getElementById('BlackScreen');
  //Give the body a class
  
  document.body.classList.add('stop-scrolling');

  
  
  holeImage.classList.add('animate-hole');

  
  
  setTimeout(() => {
    // Redirect the user to the Status_Window page
    errormessage();
    
  }, 3000); 
}

function errormessage() {
    if (confirm("ERROR, Please leave the page, do not cancel.")) {
        errormessage();
        //Jokes on you, you can't press OK
    } else {
        window.location.href = './Status_window/index.php';
    }
}

</script>

</body>
</html>
