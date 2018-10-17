<?php
require_once ("./include/class.pdoansart.inc.php");
$day =date("Y-m-d");
if (!isset($_SESSION["numba"])) {
	$_SESSION["numba"]=0;
	$numba = $_SESSION["numba"];
}else{
	$numba=$_SESSION["numba"];
}
if (isset($_SESSION["date"])) {
    $day = $_SESSION["date"];
}
include("vues/v_sommaire.php");//var_dump($_POST);?>
<div id="contenu">
	<div id="resultat">
<?php if (!isset($_SESSION["date"])) {?>
			<input type="text" name="ladate" size="8" maxlength="8" id="ladate" onfocus="alert('Entrez la date sous la forme 20140211 pour le 11 fevrier 2014');">
			<input type="button" class="button" value="Dater" style="width:200px;height:40px;" onclick="createSDate(getElementById('ladate').value);">
			<?php }else{	$aDay=$_SESSION['date'];	?>
				<input type="text" name="ladate" size="8" value="<?php echo "$aDay"; ?>" maxlength="8" id="ladate" onfocus="alert('Entrez la date sous la forme 20140211 pour le 11 fevrier 2014');">
			<input type="button" class="button" value="Dater" style="width:200px;height:40px;" onclick="createSDate(getElementById('ladate').value);">
		<?php	}?>
	</div><div id="resAccueil"></div><div id="fiche"></div>
	<div id="myAccueil">
		<?php 
				if (isset($_SESSION["numFicheAsc"])) {
					$numFich=$pdo->getNumbaFiche($_SESSION["numFicheAsc"],$day,$idVisiteur,$numba);
               		if($numFich["signature"]!=''){
                		$numba = $numFich["numero"]+1;
						$_SESSION["numba"] = $numba;
					}

					$lesSalOfAsc = $pdo->getSalAsc($_SESSION["numFicheAsc"],$day,$numba);
					$etat = $pdo->getEtatFiche($_SESSION["numFicheAsc"],$day,$numba);
					if ($etat["etat"]!="Cloturé") {
						if (!empty($lesSalOfAsc)) {?>
							<table><!-Affichage de listes des Salarie pour cet Fiche accueil->
							<caption><b>LE PERSONNEL</b></caption>
							<tr><th><center>Nom</center></th></tr>
							<form action="#" method="POST">
					<?php 	foreach ($lesSalOfAsc as $unSal) {
								$id = $unSal["id"];
								$nom = $unSal ["nom"];
								$prenom = $unSal ["prenom"];
								$dejaSigne = $pdo->getSignaturePers($_SESSION["numFicheAsc"],$day,$id,$numba);
								if ($dejaSigne["signature"]=='') {?>
									<tr>
										<p><td><input type="text" id="<?php echo  $id?>" size="20" name="<?php echo  $id?>" value="<?php echo $nom;?>" />
										<input type="text" id="<?php echo  $id?>" size="20" name="<?php echo  $id?>" value="<?php echo $prenom;?>"/></td>	
									</tr>
									<tr><td><a href="index.php?uc=admin&action=signer&id=<?php echo $id;?>"><input type="button" value ="SIGNER" style="width:285px;height:50px;"></a></td></tr>
<?php 							}?>
<?php 						}?>
							</form>
							</table><br><br><br>
							<form action="index.php?uc=admin&action=cloturer&id=<?php echo $_SESSION['idVisiteur']?>" method="POST">
								<input type="submit" class="button" style="width:285px;height:50px;color:white;" value="CLOTURER">
							</form>
<?php 					}else{ echo "<div class='erreur'><center>Aucun personnel ajouté<center></div>";}
					}else {echo "<div class='erreur'><center>Fiche Cloturé<center></div>";
					}
				}else{echo "<div class='erreur'><center>Selectionner un chantier<center></div>";}?>
	</div>
	<?php if(isset($_POST["valider_themes"]) && isset($_SESSION["numFicheAsc"])){?>
					<!-Ajouter du personnel->			
				Ajouter un salarié: <input id="text" type="text" class="search" name="search" 
				value="Rechercher..." onfocus="this.value=''" onKeyup="searchOuvrierAccueil(document.getElementById('text').value);" 
				onblur="this.value=''" autocomplete="off"/>
				<input type="button" class="button" onclick="addOdaSal();" value="Autre salarié">
			<!-End->
	<?php }?>
<?php 	if (isset($_POST["chant"])) {
			//var_dump($_POST["chant"]);
		}?>
	<!-Début du premier tableau->
<div id="myTheme"><table>
	<caption><b>ACCUEIL SECURITE</b></caption>
	<tr>
    	<th><center>THEMES ABORDÉS</center></th></tr>	
<form enctype="multipart/form-data" action="index.php?uc=admin&action=securite" method="post">
	<!-Choix du chantier->
	<p><tr><td><select id="listChantier"  onchange='createSessionChantier(this.value);changeListSal(this.value);' name='chant' style='width:100%;'><option value="0"  selected>Selectionner un chantier</option>
<?php 		foreach ($lesChant as $unChant) {
				$idChant = $unChant["id"];
				$libChant = $unChant ["libelle"];
					if(isset($_SESSION["chantier"])){
			 			if ($idChant==$_SESSION["chantier"] ) {			 		
							echo "<option selected='selected' value='$idChant'>".$libChant."</option>";
						}else{
							echo "<option value='$idChant'>".$libChant."</option>";
						}
					}elseif(isset($_SESSION["numFicheAsc"])){
						if ($idChant==$_SESSION["numFicheAsc"]) {
							echo "<option value='$idChant' selected='selected'>".$libChant."</option>";
						}
						else{
							echo "<option value='$idChant'>".$libChant."</option>";
						}
					}else{
						echo "<option value='$idChant'>".$libChant."</option>";
					}
							
			}?></select></td></tr></p>
	<!-end->
			<?php if(isset($lesThemes)){
				foreach ($lesThemes as $aTheme) {
					$lib = $aTheme["libelle"];?>
					<p><tr><td><?php echo "$lib";?></td></tr><?php
				}}?>
			<p><tr><td><textarea  id="newTheme" size="40" name="newTheme" value="Nouveau theme ..." onclick="this.value=''"></textarea></td></tr></p>
			<!-end->
			<!-Affichage de la liste des document mis a disposition à la base vie->
			<p><tr><td><center>DOCUMENTS MIS A DISPOSITION A LA BASE DE VIE</center></td></tr></p>
						<?php if(isset($lesDocs)){
				foreach ($lesDocs as $aDoc) {
					$lib = $aDoc["libelle"];?>
					<p><tr><td><?php echo "$lib";?></td></tr></p>
		<?php 	}}?>
			<tr><td><textarea id="autreDoc" name="autreDoc" onclick="alert('Séparez les documents avec le signe Deux point (:)\n EXEMPLE \n EPI:PGC\nPour ne plus revoir ce message à la prochaine sasie ,appuyer dans la case pendant 1 seconde');"></textarea></tr></p>
			<tr><td>OBSERVATION<textarea id = "observation" name ="observation"></textarea></td></tr></p>
			<!-end->
			<!-Bouton Valider les themes->
<p><tr><td><input type="submit" style="width:500px;height:50px" id="valider_themes" size="60" name="valider_themes" value="Valider les themes et ajouter des ouvriers" onmouseover="changeListSal(document.getElementById('listChantier').value)"></td></tr></p>
			<!-end->
</form>
</table>
</div>
	<!-Fin du premier tableau->
</div>