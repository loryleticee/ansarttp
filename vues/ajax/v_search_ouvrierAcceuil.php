<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$liste = $pdo->getOuvrier();
if (isset($_POST['letta'])) {
    $debut = $_POST['letta'];
} 
else {
    $debut = "";
}

$debut = strtoupper($debut);
?><!--<select>--><?php
function generateOptions($debut,$liste) {
    foreach ($liste as $element) {
        $id = $element['id'];
        $nom = $element['nom'];
        $prenom = $element['prenom'];
        if (substr($nom, 0, strlen($debut)) == $debut) {
             $_SESSION["ouvrierAccueil"] = $nom.' '.$prenom;
             $_SESSION["nomOuvrierAccueil"] = $nom;
             $_SESSION["prenomOuvrierAccueil"] = $prenom;
        }
        elseif(substr($nom, 0, 1).substr($prenom,0,1) == $debut) {
            $_SESSION["ouvrierAccueil"] = $nom.' '.$prenom;
            $_SESSION["nomOuvrierAccueil"] = $nom;
            $_SESSION["prenomOuvrierAccueil"] = $prenom;
        }
        elseif (substr($prenom, 0, strlen($debut)) == $debut) {
             $_SESSION["ouvrierAccueil"] = $prenom.' '.$nom;
             $_SESSION["nomOuvrierAccueil"] = $nom;
             $_SESSION["prenomOuvrierAccueil"] = $prenom;
        }
        else{}
    }
}
generateOptions($debut,$liste);
if (isset($_SESSION["ouvrierAccueil"])) {
    $ouvrier = $_SESSION["ouvrierAccueil"];
    $getId=$pdo->getIdUser($_SESSION["nomOuvrierAccueil"],$_SESSION["prenomOuvrierAccueil"]);
    $NomEntier =$getId["id"];
}?>
<p><tr><td><input type ="text" name ="identifiant" id ="identifiant" value ="<?php if(isset($ouvrier)){echo $ouvrier;}else{echo'_-'.'`'.') J`ai rien trouvé';}?>" disabled ="disabled"/></tr></td>
<tr><td><input type ="hidden" name ="nomOuv" id ="nomOuv" value ="<?php if(isset($_SESSION['nomOuvrierAccueil'])){ echo $_SESSION['nomOuvrierAccueil'];}?>"/></tr></td>
<tr><td><input type ="hidden" name ="prenomOuv" id ="prenomOuv" value ="<?php if(isset($_SESSION['prenomOuvrierAccueil'])){echo $_SESSION['prenomOuvrierAccueil'];}?>" /></tr></td>
<!--<tr><td><canvas id="Canvas" name="canevas" ></canvas></tr></td></p>-->
<tr><td><input type="button" onclick="<?php if(isset($NomEntier)){?>addSalAccueil(<?php echo $NomEntier?>);changeListSal(document.getElementById('listChantier').value);<?php }?>"style="width:300px;height:25px" name="Ajouter" value="Ajouter"/></tr></td></p>
</form>