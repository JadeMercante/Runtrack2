<?php
if (!isset($_SESSION['day'])) {
$_SESSION['day'] = "Jour01";
}
$currentday = $_SESSION['day'];

$Welcome = "Bienvenue A l'usine de Jade Mercante!";
$Home = "Accueil";
$About = "Curriculum Vitae";
$Contact = "Contact";
$Language = "Français";
$Intro = "Sur cette page, vous pouvez acceder a tout mes traveaux en toute facilitée!";
$desc = "Voici une liste non-exhaustive des projets que j'ai creer";
$day = "Jour";
$daytext = "Projets faits";
$Welcomeday = "Voici la liste de fichier dans '$currentday'";
$Jobs = "Jobs";
?>