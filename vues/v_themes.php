<div id="contenu">
	<div id="resultat">
	</div>
<table>
	 <caption>LES THEMES</caption>
             <tr>
                <th><center>LIBELLE</center></th>
                <th><center>ACTION</center></th>
             </tr>
<form action="#" method="POST">
<?php
$i=0;
foreach ($lesThemes as $unTheme) {
	$id = $unTheme["id"];
	$nom = $unTheme["libelle"];
	?>
	
	<tr><p><input type="hidden" id="id<?php echo $i;?>"name ="id" value="<?php echo $id;?>"/></p>
	<p><td><input type="text" id="nomTheme<?php echo $i;?>" value="<?php echo $nom;;?>"size="50" name="nomTheme" required="required"/></td></p>
<p><td><input type="button" style="width:200px;height:50px" onclick="alterTheme(<?php echo $i?>);" name="modifierTheme" value="modifier" alt="modifier <?php echo $nom.' '.$num?>" title="modifier <?php echo $nom.' '.$num?>"><input type="button" name="supprimer" style="width:200px;height:50px" value="supprimer" onclick="delTheme(<?php echo $i ?>);"></td></p>
</tr>
<?php	
$i+=1;
}
?>
</form>
</table>
</div>