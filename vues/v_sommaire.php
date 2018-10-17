<!-- Division pour le sommaire -->
  <div id="menuGauche">
     <div id="infosUtil">
      </div>  
        <ul id="menuList">
			     <li >
				      <?php echo "<b>".$_SESSION['statut']."</b><br>".$_SESSION['prenom']." ".$_SESSION['nom']."<br><br>"  ?>
			     </li>
            <?php if($_SESSION['statut']=='Chef de chantier'){?>
                    <li class="smenu">
                     <a href="index.php?uc=admin&action=securite" title="Creer accueil securite" alt=><img src="include/images/SECURITE.png"></a>
                    </li><br>
                    <li class="smenu">
                     <a href="index.php?uc=admin&action=voirMesAccueil" title="voirMesAccueil" alt=><img src="include/images/addprol.png"></a>
                    </li><br>
                  <br>
            <?php }?>
                        <?php if($_SESSION['statut']=='Conducteur de travaux'){?>
                    <li class="smenu">
                     <a href="index.php?uc=admin&action=securite" title="Creer accueil securite" alt="Creer accueil securite"><img src="include/images/SECURITE.png"></a>
                    </li><br>
                    <li class="smenu">
                     <a href="index.php?uc=admin&action=voirMesAccueil" title="voirMesAccueil" alt="voirMesAccueil"><img src="include/images/addprol.png"></a>
                    </li><br>
                     <li class="smenu">
                      <a href="index.php?uc=admin&action=addUnChantier" title="Ajouter un Chantier" alt="Ajouter un Chantier"><img src="include/images/addchantier.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnChantier" title="Modifier un chantier" alt="Modifier un chantier"><img src="include/images/MODIFIERCHANT.png"></a>
                  </li><br>
                    <li class="smenu">
                    <a href="index.php?uc=admin&action=ajouterUnEmploye" title="Ajouter un prolétaire" alt="Ajouter un prolétaire"><img src="include/images/addemp.png"></a>
                  </li><br>
                 <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnEmploye" title="Modifier un prolétaire" alt="Modifier un prolétaire"><img src="include/images/modifS.png"></a>
                  </li><br>
                  <li class="smenu">
                      <a href="index.php?uc=admin&action=addMateriel" title="Ajouter un materiel" alt="Ajouter un materiel"><img src="include/images/addMat.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnMateriel" title="Modifier un materiel" alt="Modifier un materiel"><img src="include/images/MODIFIERMAT.png"></a>
                  </li><br>
                    <li class="smenu">
                      <a href="index.php?uc=admin&action=addEntreprise" title="Ajouter une entreprise" alt="Ajouter une entreprise"><img src="include/images/addGroup.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUneEntreprise" title="Modifier une entreprise" alt="Modifier une entreprise"><img src="include/images/MODIFIERGROUP.png"></a>
                  </li><br>
                   <li class="smenu">
                    <a href="index.php?uc=admin&action=lesbanis" title="Les ip banni" alt="Modifier un document"><img src="include/images/bani.png"></a>
                    </li>
                  <br>
            <?php }?>
            <?php if($_SESSION['statut']=='Ouvrier'){?>
                    intrut!
           <?php }?>
           <?php if($_SESSION['statut']=='Cadre'){?>
                    <li class="smenu">
                     <a href="index.php?uc=admin&action=voirMesAccueil" title="voirMesAccueil" alt="voirMesAccueil"><img src="include/images/addprol.png"></a>
                    </li><br>
                    <li class="smenu">
                      <a href="index.php?uc=admin&action=addATheme" title="Ajouter un theme" alt="Ajouter un theme"><img src="include/images/ADDTHEME.png"></a>
                    </li><br>
                    <li class="smenu">
                      <a href="index.php?uc=admin&action=modifierUnTheme" title="Modifier un theme" alt="Modifier un theme"><img src="include/images/ALTERTHEME.png"></a>
                    </li><br>
                    <li class="smenu">
                      <a href="index.php?uc=admin&action=addDoc" title="Ajouter un document" alt="Ajouter un document"><img src="include/images/addDoc.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnDoc" title="Modifier un document" alt="Modifier un document"><img src="include/images/MODIFIERDOC.png"></a>
                  </li><br>
                     <li class="smenu">
                      <a href="index.php?uc=admin&action=addUnChantier" title="Ajouter un Chantier" alt="Ajouter un Chantier"><img src="include/images/addchantier.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnChantier" title="Modifier un chantier" alt="Modifier un chantier"><img src="include/images/MODIFIERCHANT.png"></a>
                  </li><br>
                    <li class="smenu">
                    <a href="index.php?uc=admin&action=ajouterUnEmploye" title="Ajouter un prolétaire" alt="Ajouter un prolétaire"><img src="include/images/addemp.png"></a>
                  </li><br>
                 <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUnEmploye" title="Modifier un prolétaire" alt="Modifier un prolétaire"><img src="include/images/modifS.png"></a>
                  </li><br>
                    <li class="smenu">
                      <a href="index.php?uc=admin&action=addEntreprise" title="Ajouter une entreprise" alt="Ajouter une entreprise"><img src="include/images/addGroup.png"></a>
                    </li><br>
                  <li class="smenu">
                    <a href="index.php?uc=admin&action=modifierUneEntreprise" title="Modifier une entreprise" alt="Modifier une entreprise"><img src="include/images/MODIFIERGROUP.png"></a>
                  </li><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>    
           <?php }?>
           
 	   <li class="smenu">
              <a title="Se déconnecter" onclick="comfirmerOut();"><img src="include/images/deco.png"></a>
           </li>
         </ul>   
</div>