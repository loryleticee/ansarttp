<?php
session_start();
require_once ("../../include/class.pdoansart.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
$chantier = $_SESSION['numFicheAsc'];
$lesCateg = $pdo->getLesEntreprise();
?>
<br><br>
Nom
<input type ="text" name ="nomOuv" id ="nomOuv" style="width:300px;"/>
prenom
<input type ="text" name ="prenomOuv" id ="prenomOuv" style="width:300px;"/>
Entreprise
 	<select id="group" name="group" >
			<option value="0"  selected>Selectionner une entreprise</option>
<?php
	foreach ($lesCateg as $uneCateg) {
		$idCateg = $uneCateg["id"];
		$libCateg = $uneCateg["raison"];
		if ($idCateg!='0') {
			echo "<option value='$idCateg'>$libCateg</option>";
		}
		
	}?>
		</select>
<input type="hidden" id="lieu" name="lieu" value="<?php echo $chantier?>">

<center><input type="button" class="button" onclick="addSalAccueil(getElementById('nomOuv').value+'.'+getElementById('prenomOuv').value+'.'+getElementById('group').value);changeListSal(<?php echo "$chantier";?>);" style="width:800px;height:100px" value="Ajouter"></center>
