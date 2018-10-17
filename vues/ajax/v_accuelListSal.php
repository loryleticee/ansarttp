<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
require_once ("../../include/fct.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
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
$idVisiteur = $_SESSION['idVisiteur'];
if (isset($_POST['id'])) {
    $idChantier = $_POST['id'];
} 
else {
    echo "Pas de post";
}
if (isset($_SESSION["numFicheAsc"])) {
	$idChantier=$_SESSION["numFicheAsc"];
}
//var_dump($idChantier);var_dump($day);
	$lesSalOfAsc=$pdo->getSalAsc($idChantier,$day,$numba);
	$etat = $pdo->getEtatFiche($idChantier,$day,$numba);	
	if ($etat["etat"]!="Cloturé") {
		if (!empty($lesSalOfAsc)) {
?>
			<table>
				<caption><b>LE PERSONNEL</b></caption>
				<tr><th><center>Nom</center></th></tr>
				<form action="" method="POST">
		<?php 	foreach ($lesSalOfAsc as $unSal) {
					$id = $unSal["id"];
					$nom = $unSal ["nom"];
					$prenom = $unSal ["prenom"];
					$dejaSigne = $pdo->getSignaturePers($idChantier,date("Y-m-d"),$id,$numba);
					if ($dejaSigne["signature"]=='') {?>
						<tr><!-Affichage de listes des Salarie pour cet Fiche accueil->
							<p><td><input type="text" id="<?php echo  $id?>" size="10" name="<?php echo  $id?>" value="<?php echo $nom;?>" />
							<input type="text" id="<?php echo  $id?>" size="10" name="<?php echo  $id?>" value="<?php echo $prenom;?>"/></td>	
						</tr>
						<tr><td><a href="index.php?uc=admin&action=signer&id=<?php echo $id;?>"><input type="button" value ="SIGNER" style="width:255px;height:50px;"></a></td></tr>
<?php 				}?>
<?php 			}?>
				</form>
			</table><br><br><br>

<?php 	}
		else{ 
			echo "<div class='erreur'><center>Aucun personnel ajouté<center></div>";
		}?><?php if (isset($_SESSION["ouvrierAccueil"])) {?>
			<form action="index.php?uc=admin&action=cloturer&id=<?php echo $_SESSION['idVisiteur']?>" method="POST">
				<input type="submit" class="button" style="color:white;" value="CLOTURER"/>
			</form>
	<?php		}?>
<?php	}else  echo "<div class='erreur'><center>Fiche Cloturé<center></div>";?>