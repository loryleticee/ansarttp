<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$liste = $pdo->getOuvrier();
if (isset($_SESSION["date"])) {
    $day = $_SESSION["date"];
}else{
    $day = date("Y-m-d");
}
if (!isset($_SESSION["numba"])) {
    $_SESSION["numba"]=0;
    $numba = $_SESSION["numba"];
}else{
    $numba=$_SESSION["numba"];
}
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    if(strlen($id)<5){
 		$add = $pdo->addSalToAsc($id,$_SESSION["numFicheAsc"],$day,$numba);
    	echo "<div class='erreur'><center>".$_SESSION["nomOuvrierAccueil"].' '.$_SESSION["prenomOuvrierAccueil"]." a bien été ajouté</center></div>";
    }
    else{
    	$var = explode('.', $id);
    	$nom = $var[0];
    	$prenom = $var[1];
    	$ent = $var[2];

    	$lastId = $pdo->getLastIdSal();
        //L'identifiant du nouveau salarie
        $idUser = $lastId["id"]+1;
        //le prenom premier lettre en majuscule
        $lePrenom = strtoupper(substr($prenom, 0,1)).substr($prenom, 1,strlen($prenom));
        //enregistre le salarie interimaire
        $pdo->addSalInterim($idUser,strtoupper($nom),$lePrenom,$ent);
        var_dump($_SESSION["numFicheAsc"]);
        $add = $pdo->addSalToAsc($idUser,$_SESSION["numFicheAsc"],$day,$numba);
    	echo "<div class='erreur'><center>".$nom.' '.$lePrenom." a bien été ajouté</center></div>";
    }
}
else {
    echo "pas de post";
}
?>