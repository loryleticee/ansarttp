<script src="todataurl.js"></script>
<script src="include/signature.js"></script>
<script src="include/js.js"></script>
<center><div id="resultat"><?php echo "<div class='erreur'><center>Une petite signature ? <center></center></div>";?></div>
		<div id="canvas">
			<canvas class="roundCorners" id="newSignature"
			style="position: relative; margin: 0; padding: 0; border: 1px solid green;"></canvas>
		</div>

		<script>
			signatureCapture();
		</script>

		<button type="button" style="width:350px;height:50px;" onclick="signatureSave();">
			ENREGISTRER 
		</button>
		<button type="button" style="width:350px;height:50px;" onclick="signatureClear()">
			EFFACER 
		</button>
		<br>
		<img id="saveSignature" alt="Visa"/><br><br>
		<a href="index.php?uc=admin&action=securite"><input type="button" style="width:450px;height:50px" value="CONTINUER"></a>
</center>