 <div id="contenu">
 	<?php if (!empty($lesChantierWhichGetAsc )) {?>
     <center> <h3>Sélectionner un chantier : </h3>
 	<label for="listYear" accesskey="n">CHANTIER : </label>
		<select id="listYear" name="listYear" onchange="showMonth();">
			<option value="0"  selected>Selectionner un chantier</option>
<?php
foreach ($lesChantierWhichGetAsc as $unChantier) {
		$idFiche= $unChantier["id"];
		$libelle=$unChantier["libChantier"];
		$date=$unChantier["jour"];

		//var_dump($annee);
		echo "<option value='$idFiche'>$libelle</option>";
}
?>
		</select></center>
<div id="lstMounth"></did>
<?php }else{
	echo "<div class='erreur'><center>Aucune fiche Accueil crée<center></div>";
}?>
</div>