<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$liste = $pdo->getLesChantiers();
if (isset($_POST['lieu'])) {
    $lieu = $_POST['lieu'];
    $lieu = strtoupper($lieu);
    function generateOptions($lieu,$liste) {
        foreach ($liste as $element) {
         $id = $element['id'];
            $num = $element['numero'];
            $nom = $element['libelle'];
            if (substr($nom, 0, strlen($lieu)) == $lieu) {
                $_SESSION["chantier"]=$num.' '.$nom;
            }
        }
    }
    generateOptions($lieu,$liste);
    if(isset($_SESSION["chantier"])){
        $chantier=$_SESSION["chantier"];
    }
}else{
    echo "<div class='erreur'><center>Une erreur est survenu contacter votre webmaster <center></div>";
}?>