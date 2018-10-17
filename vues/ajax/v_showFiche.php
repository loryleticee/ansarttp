<?php session_start();
require_once ("../../include/class.pdoansart.inc.php");
require_once ("../../include/fct.inc.php");
$pdo = PdoAnsart::getPdoAnsart();
if (isset($_POST['nFAS'])) {
    $lePost = explode('.', $_POST['nFAS']); 
    $idFiche = $lePost[0];
    if (!isset($lePost[1])) {
    	$date = date("Y-m-d");
    }else{
    	$date = $lePost[1];
	}
	$num = $lePost[2]; 
    //var_dump($date);
    //var_dump($idFiche);
    $idVisiteur = $_SESSION['idVisiteur'];
    //var_dump($idVisiteur);
    $libChantier = $pdo->getLibChantier($idFiche);
	$LesThemes= $pdo->getThemeAsc($idFiche,$date,$num);
	$LesDocBaseVie = $pdo->getDocBaseVieAsc($idFiche,$date,$num);
	$lesOuvriers = $pdo->getLesOuvrierAsc($idFiche,$date,$num);
	$observation = $pdo->getObservation($idFiche,$date,$num);
	//var_dump($observation);?>
	<?php if(!empty($LesThemes)) {?>
		<table>
		<caption><b>Fiche Accueil securité pour <?php echo $libChantier["libelle"]." du ".$date ?></b></caption>
		<tr><th><center>LES THEMES ABORDÉS</center></th></tr> 
		<form>
<?php
	foreach ($LesThemes as $unThemes) {
		$idThemes = $unThemes["idTheme"];
		$libThemes = $unThemes["libelle"];
		$dateFiche = $unThemes["jour_AS"];
		$observFiche = $unThemes["observation"];
		$idResponsable = $unThemes["idSal"];?>
		<tr><td><input type="text" name="<?php $idThemes ?>" size="60" value="<?php echo $libThemes?>"></td></tr>
<?php
	 }
		}else{
			echo "<br><div class='erreur'><center>Aucun themes pour cette fiche</center></div>";
		}
	?>
<?php if(!empty($LesDocBaseVie)) {?>
		<br><br><table>
		<tr><th><center>DOCUMENT MIS A DISPOSITION A LA BASE DE VIE</center></th></tr> 
		<form>
	<?php
	foreach ($LesDocBaseVie as $unDocBaseVie) {
		$idDoc = $unDocBaseVie["id"];
		$libDoc = $unDocBaseVie["libelle"];?>
		<tr><td><input type="text" name="<?php $idDoc?>" size="60" value="<?php echo $libDoc?>"></td></tr>
<?php
	}?>
</table>
</form>
<?php }else{
	echo "<br><div class='erreur'><center>Aucun document à la base vie pour cette fiche</center></div>";
}?>
<?php  if(!empty($lesOuvriers)) {?>
<table>
		<caption><b>SALARIES</b></caption>
	<tr>
    	<!--<th><center>Id</center></th>-->
		<th><center>NOM</center></th>
		<th><center>PRENOM</center></th>  
		<th><center>SIGNATURE</center></th>
		<th><center>SUPPRIMER</center></th>
	</tr> 
		<form>
		<?php $i=0;	
			foreach ($lesOuvriers as $unOuvriers) {
				$i+=1;
				$id = $unOuvriers["id"];
				$nom = $unOuvriers["nom"];
				$prenom = $unOuvriers["prenom"];
				$visa = $unOuvriers["signature"];
				$idFiche = $unOuvriers["idAssec"];
				$dateAsc = $unOuvriers["jour"];
				if ($nom.$prenom!=$_SESSION["nom"].$_SESSION["prenom"]) {?>
					<p><input type="hidden" id="ficheAsc" name="ficheAsc" value="<?php echo $idFiche?>"></p>
					<p><input type="hidden" id="dateAsc" name="dateAsc" value="<?php echo $dateAsc?>"></p>
					<tr><td><input type="text" id="nomSal<?php echo $i?>" name="<?php $nom ?>" size="20" value="<?php echo $nom?>"></td>
						<td><input type="text" id="prenomSal<?php echo $i?>"  name="<?php $prenom ?>" size="20" value="<?php echo $prenom?>"></td>
						<td><img src="<?php echo $visa?>"></td><center><td><img src="include/images/x.png" alt="prenomSal<?php echo $i?>" onclick="supSalToAsc(<?php echo $i?>);"></center></td></tr>
	<?php  		}	
			}?>
		</form>
		</table>
		<div id="answaSupSal"></div>

			<div id="pdf"><a href="index.php?uc=admin&action=pdfResa&numAsc=<?php echo $idFiche;?>&dateAsc=<?php echo $date;?>&num=<?php echo $num?>" title="PDF">TELECHARGER LE PDF</a>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="index.php?uc=admin&action=supFiche&numAsc=<?php echo $idFiche;?>&dateAsc=<?php echo $date;?>&num=<?php echo $num?>">SUPPRIMER<a/></div>

<?php }	else{
			echo "<br><div class='erreur'><center>Aucun salarié pour cette fiche</center></div>";
		}?>
<?php }else{
		echo "<div class='erreur'><center>Erreur veuillez contacter votre webmaster</center></div>";
}
		if($observation["observation"]!='') {?><br>
<table>
	<tr><th><center>OBSERVATION</center></th></tr>
		<form><?php
				$nom = $observation["observation"];?>
				<tr><td><input type="text" id="observation" name="observation" size="30" value="<?php echo $nom?>"></td></tr>
		</form>
</table>
<?php }	else{
			echo "<br><div class='erreur'><center>Aucune observation pour cette fiche</center></div>";
		}?><br><br>