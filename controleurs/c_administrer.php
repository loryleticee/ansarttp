<?php
require_once("include/fct.inc.php");
if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'accueil';
}
if ($_REQUEST['action'] != "ajouterUnEmploye" && $_REQUEST['action'] != "cloturer" && $_REQUEST['action'] != "accueil" && $_REQUEST['action'] 
    != "modifierUnEmploye" && $_REQUEST['action'] != "securite" && $_REQUEST['action'] != "addMateriel" && $_REQUEST['action'] != "modifierUnMateriel" 
    && $_REQUEST['action'] != "addATheme" && $_REQUEST['action'] 
    != "addUnChantier" && $_REQUEST['action'] !="modifierUnChantier" && $_REQUEST['action']
     !="modifierUnTheme" && $_REQUEST['action'] !="voirMesAccueil" && $_REQUEST['action'] !="v" &&
      $_REQUEST['action']!="pdfResa" && $_REQUEST['action']!="modifierUnTheme" && $_REQUEST['action']!="signer"
     && $_REQUEST['action']!="addDoc" && $_REQUEST['action']!="modifierUnDoc" && $_REQUEST['action']!="addEntreprise" 
     && $_REQUEST['action']!="modifierUneEntreprise" && $_REQUEST['action']!="supFiche") {
    $_REQUEST['action'] = "accueil";
}
if (isset($_SESSION['idVisiteur'])) {
    $idVisiteur = $_SESSION['idVisiteur'];
}
if (isset($_SESSION["date"])) {
    $var = explode('-',$_SESSION["date"]);
  $day = $var[0].$var[1].$var[2];
}else{
    $day = date("Ymd");
}
$action = $_REQUEST['action'];
$url = "";
$estConnecte = estConnecte();
if ($estConnecte) {
    switch ($action) {
        case 'ajouterUnEmploye': {
            if (isset($_POST["valider"])) {
                //Récupere le dernier identifiant des salariés sous un tableau associatif 
                $getId=$pdo->getLastIdSal();
                //Le dernier identifiant des salariés 
                $id = $getId["id"]+1;
                //Met en majuscule la premiere lettre du nom
                $firstLettaNom=strtoupper(substr(addslashes($_POST["nom"]), 0,1));
                //Met en majuscule le nom
                $nom =strtoupper($firstLettaNom.substr(addslashes($_POST["nom"]), 1));
                $firstLettaPrenom=strtoupper(substr(addslashes($_POST["prenom"]), 0,1));
                //Pareil pour le prenom
                $prenom =$firstLettaPrenom.substr(addslashes($_POST["prenom"]), 1);
                $login = addslashes($_POST["login"]);
                $mdp = addslashes($_POST["mdp"]);
                $mdp1 = addslashes($_POST["mdp1"]);
                $email = strtolower(addslashes($_POST["email"]));
                $type = $_POST["type"];
                if (isset($_POST["group"])) {
                   $entreprise = $_POST["group"];
                }else{
                    $entreprise = 0;
                }
                //Si c'est un employé on change les identifiants entrés par l'utilisateur
                if ($type=="1") {
                    $login="Ceci01Est02Un03login04Generer05Automatiquement";
                    $mdp1="Ceci01Est02Un03Mot04De05Passe06Generer07Automatiquement";
                    $mdp="Ceci01Est02Un03Mot04De05Passe06Generer07Automatiquement";
                }
                $validMdp = passwordValid($mdp, $mdp1);
                $validMail = verifForm($email);
                if ($id=='' && $nom==''&&$prenom==''&&$login==''&&$mdp==''&&$mdp1==''&&$tel==''&&$tauxHoraire==''){
                echo "<div class='erreur'>Peut être vous manque -t-il une case à remplir </div><br>";
                }
                if ($validMdp == false && $validMail == false) {
                    echo "<div class='erreur'>Les mots de passe ne sont pas identiques
					ou l'adresse mail n'est pas valide</div><br>";
                    include("vues/v_sommaire.php");
                    $lastId = $pdo->getLastIdSal();
                    $lesType = $pdo->getLesTypes();
                    include("vues/v_ajouterUnEmploye.php");
                } else {
                    $secure = $pdo->hash_password($mdp);
                    $ajouter = $pdo->addSal($id, $nom, $prenom, $login, $secure, $email, $entreprise,$type);

                    if (!$ajouter) {
                        echo "<div class='erreur'>$nom a bien été ajouté</div><br> ";
                    } else {
                        echo "<div class='erreur'>Ne tardez pas, joignez votre webmaster<loryleticee@gmail.com></div><br>";
                    }
                    include("vues/v_sommaire.php");
                    $lastId = $pdo->getLastIdSal();
                    $lesTypes = $pdo->getLesTypes();
                    include("vues/v_ajouterUnEmploye.php");
                }
            } else {
                $lesEntreprise = $pdo->getLesEntreprise();
                $lesTypes = $pdo->getLesTypes();
                $lastId = $pdo->getLastIdSal();
                include("vues/v_sommaire.php");
                include("vues/v_ajouterUnEmploye.php");
            }
            break;
        }
        case 'modifierUnEmploye': {
            include("vues/v_sommaire.php");
            $lesSal = $pdo->getLesSal();
            include("vues/v_modifSal.php");
            break;
        }
                case 'addMateriel': {
            $lesEngins = $pdo->getEnginAnsart();
            if (isset($_POST["valider"])) {
               // var_dump($lastId);
                $id = 0;
                $nom = strtoupper(addslashes($_POST["nom"]));
                $num = addslashes($_POST["numero"]);
                if ($nom=='' && $num=='') {
                    echo "<div class='erreur'><center>Calme toi ,c'est surement une fausse manip...</center></div>";
                }
                else{
                    $add = $pdo->addEngin($id,$num,$nom);                  
                    echo "<div class='erreur'><center>$nom $num enregistré avec succès</center></div>";
                }


            }
            include("vues/v_sommaire.php");
            include("vues/v_addAEngin.php");

                break;
        }
        case 'modifierUnMateriel': {
                include("vues/v_sommaire.php");
                $lesEngins = $pdo->getEnginAnsart();
                $lesEnginsAutre = $pdo->getEngin();
                include("vues/v_Materiel.php");
                break;
        }
        case 'addUnChantier': {
            $lesChantier = $pdo->getLesChantiers();
            $lesConduc = $pdo->getLesConduc();
            if (isset($_POST["valider"])) {
                if($_POST["lstConduc"]!="9999"){
                $lastId = $pdo->getLastChantier();
               // var_dump($lastId);
                $id = $lastId['id']+1;
                $nom = strtoupper(addslashes($_POST["nom"]));
                $num = addslashes($_POST["numero"]);
                $resp =$_POST["lstConduc"]; 
                //var_dump($id);
                //var_dump($nom);
                //var_dump($num);
                if ($nom=='' && $num=='') {
                    echo "<div class='erreur'><center>Calme toi ,c'est surement une fausse manip...</center></div>";
                }
                else{
                    $add = $pdo->addChantier($id,$num,$nom,$resp);                  
                    echo "<div class='erreur'><center>$nom $num enregistré avec succès</center></div>";
                }
            }else{
                     echo"<div class='erreur'><center> _-')Je ne connais pas le responsable du chantier </center></div>";
                }

            }
            include("vues/v_sommaire.php");
            include("vues/v_addAChantier.php");

                break;
        }
        case 'modifierUnChantier': {
                include("vues/v_sommaire.php");
                $lesChantier = $pdo->getLesChantiers();
                include("vues/v_Chantier.php");
                break;
        }
        case 'addATheme': {
            if (isset($_POST["valider"])) {
                $lid = $pdo->getLastTheme();
                $id = $lid["id"]+1;
                $nom = addslashes($_POST["libelle"]);
                if ($nom=='') {
                    echo "<div class='erreur'><center>Calme toi ,c'est surement une fausse manip...</center></div>";
                }
                else{
                    $add = $pdo->addTheme($id, $nom);
                }
                if ($add) {
                    echo "<div class='erreur'><center>Le themes n'a pas été enregistré</center></div>";
                }
                else{
                    echo "<div class='erreur'><center>Le themes a bien été enregistré</center></div>";
                }
            }   
            include("vues/v_sommaire.php");
            include("vues/v_addATheme.php");
            break;
        }
        case 'modifierUnTheme': {
                include("vues/v_sommaire.php");
                $lesThemes = $pdo->getLesThemes();
                include("vues/v_themes.php");
                break;
        }
        case 'addEntreprise':{
            if (isset($_POST["valider"])) {
                $lid = $pdo->getLastGroup();
                $id = $lid["id"]+1;
                $nom = addslashes($_POST["libelle"]);
                if ($nom=='') {
                    echo "<div class='erreur'><center>Calme toi ,c'est surement une fausse manip...</center></div>";
                }
                else{
                    $add = $pdo->addGroup($id,$nom);
                }
                if ($add) {
                    echo "<div class='erreur'><center>L'entreprise n'a pas été enregistré</center></div>";
                }
                else echo "<div class='erreur'><center>L'entreprise a bien été enregistré</center></div>";
            }   
            include("vues/v_sommaire.php");
            include("vues/v_addAGroup.php");
            break;
        }
        case 'modifierUneEntreprise':{
                include("vues/v_sommaire.php");
                $lesGroup = $pdo->getLesEntreprise();
                include("vues/v_group.php");
                break;
        }
        case 'addDoc':{
            if (isset($_POST["valider"])) {
                $lid = $pdo->getLasOtherDoc();
                $id = $lid["id"]+1;
                $nom = addslashes($_POST["libelle"]);
                if ($nom=='') {
                    echo "<div class='erreur'><center>Calme toi ,c'est surement une fausse manip...</center></div>";
                }
                else{
                    $add = $pdo->addDoc($id, $nom);
                }
                if ($add) {
                    echo "<div class='erreur'><center>Le document n'a pas été enregistré</center></div>";
                }
                else echo "<div class='erreur'><center>Le document a bien été enregistré</center></div>";
            }   
            include("vues/v_sommaire.php");
            include("vues/v_addADoc.php");
            break;
        }
        case 'modifierUnDoc':{
                include("vues/v_sommaire.php");
                $lesDoc = $pdo->getLesdocBaseVie();
                include("vues/v_doc.php");
                break;
        }
        case 'alterEngin':{
                include("vues/v_sommaire.php");
                $lesChantier = $pdo->getLesChantiers();
                include("vues/v_Chantier.php");
                break;
        }
        case 'signer':{
            $_SESSION["identUser"] = $_REQUEST['id']; 
            include("vues/v_sommaire.php");
            include("vues/ajax/v_signature.php");
            break;
        }
        case 'securite': {
            $lesChant = $pdo->getLesChantiers();
            /* Si le boutton valider themes a été cliqué
             * Verifie pour chaque themes ,si il a été coché 
             * Et dans ce derniers cas ajoute le themes a la fiche d'acceuil securité 
             */     
            if (isset($_POST["valider_themes"])) {
                $themes = explode(':',addslashes($_POST["newTheme"]));
                $docs = explode(':',addslashes($_POST["autreDoc"]));
                $observation = addslashes($_POST["observation"]);
                $leChantier = $_POST["chant"];
                if ($leChantier!='0') {
                    if (!isset($_SESSION["numba"])) {
                        $_SESSION["numba"]=0;
                        $numba = $_SESSION["numba"];
                    }else{
                        $numba=$_SESSION["numba"];
                    }
                    //Regarder si il faut crée une fiche Acceuil securité
                    $createOrNotAS = $pdo->getLastAssec($leChantier,$day);
                    //Si on doit la crée
                    if ($createOrNotAS == false) {
                        $num = $leChantier;
                        $numFich=$pdo->getNumbaFiche($leChantier,$day,$idVisiteur,$numba);
                        if($numFich["signature"]!=''){
                            $numba = $numFich["numero"]+1;
                            $_SESSION["numba"] = $numba;
                            $createASec = $pdo->createAs($num,$day,$observation,$idVisiteur,$numba);
                            echo "<div class='erreur'><center>Les themes on bien été validés-Ajouter du personnel<center></div>";
                        }else{
                            $createASec = $pdo->createAs($num,$day,$observation,$idVisiteur,$numba);
                            echo "<div class='erreur'><center>Les themes on bien été validés-Ajouter du personnel<center></div>";
                        }
                    }//Sinon
                    else {
                            $num = $leChantier;
                            $numba = $_SESSION["numba"];
                            $_SESSION["numba"] = $numba;
                            $createASec = $pdo->createAs($num,$day,$observation,$idVisiteur,$numba);
                            echo "<div class='erreur'><center>Les themes on bien été validés-Ajouter du personnel<center></div>";

                        echo "<div class='erreur'><center>Ajouter du personnel <center></div>";
                    }
                /**
                                GESTION DES DOCS A LA BASE DE VIE
                */
                    if ($_POST["autreDoc"]!='') {
                        for ($i = 0; $i<count($docs); $i++) { 
                            $doc=addslashes(firstLetta($docs[$i]));
                            //var_dump($f);
                            $leDoc = $pdo->getLasOtherDoc();
                            //var_dump($leTheme);
                            $id = $leDoc["id"]+1;
                            $add = $pdo->addDoc($id,$doc);
                            if (isset($_SESSION["numFicheAsc"])) {
                            $addToAsc = $pdo->addOtherDocToAsc($id,$_SESSION["numFicheAsc"],$day,$numba);
                            }else{
                                $addToAsc = $pdo->addOtherDocToAsc($id,$_SESSION["chantier"],$day,$numba);
                            } 
                        }
                    }
/**
                            GESTION DES THEMES
*/
                    if ($_POST["newTheme"]!='') {
                        for ($i = 0; $i<count($themes); $i++) { 
                            $theme=addslashes(firstLetta($themes[$i]));
                            //var_dump($f);
                            $leTheme = $pdo->getLastTheme();
                            //var_dump($leTheme);
                            $id = $leTheme["id"]+1;
                            $add = $pdo->addTheme($id,$theme);
                            if (isset($_SESSION["numFicheAsc"])) {
                                $addToAsc = $pdo->AddAtheme($_SESSION["numFicheAsc"],$id,$day,$numba);
                            }else{
                                $addToAsc = $pdo->AddAtheme($_SESSION["chantier"],$id,$day,$numba);
                            } 
                        }
                    }
                    if (isset($_SESSION["numFicheAsc"])) {
                        $lesDocs = $pdo->getDocBaseVieAsc($_SESSION["numFicheAsc"],$day,$numba);
                        $lesThemes = $pdo->getThemeAsc($_SESSION["numFicheAsc"],$day,$numba);
                    }else{
                        $lesDocs = $pdo->getDocBaseVieAsc($_SESSION["chantier"],$day,$numba);
                        $lesThemes = $pdo->getThemeAsc($_SESSION["chantier"],$day,$numba);
                    }
                }
                 else{
                    echo "<div class='erreur'><center>Veuillez selectionner un chantier <center></div>";
                }
            }

            if (isset($_SESSION["numFicheAsc"])) {
                if (!isset($_SESSION["numba"])) {
                    $_SESSION["numba"]=0;
                    $numba = $_SESSION["numba"];
                }else{
                    $numba=$_SESSION["numba"];
                }
                //var_dump($_SESSION["numFicheAsc"]);
                $lesSalOfAsc = $pdo->getSalAsc($_SESSION["numFicheAsc"],$day,$numba);
               // var_dump($lesSalOfAsc);
                $lesDocs = $pdo->getDocBaseVieAsc($_SESSION["numFicheAsc"],$day,$numba);
                $lesThemes = $pdo->getThemeAsc($_SESSION["numFicheAsc"],$day,$numba);
            }
            $lesSal = $pdo->getLesSal();
            include("vues/v_securite.php");
            break;
        }
        case 'voirMesAccueil':{         
            include("vues/v_sommaire.php");
            if($_SESSION["statut"]=="Conducteur de travaux"){
                $lesChantierWhichGetAsc = $pdo->getAllChantAsc();
            }else{
                $lesChantierWhichGetAsc = $pdo->getChantAsc($idVisiteur);
            }
            include ("vues/v_myAccueil.php");
            break;
        }
        case 'pdfResa' :{
            $numAsc = $_REQUEST['numAsc'];
            $dateAsc = $_REQUEST['dateAsc'];
            $numba = $_REQUEST['num'];
            //Recupere les themes de la fiche Accueil
            $lesThemes = $pdo->getThemeAsc($numAsc,$dateAsc,$numba);
            $lesSign = $pdo->getLesSignatureAsc($numAsc,$dateAsc,$numba);
            $lesDoc = $pdo->getLesDoc($numAsc,$dateAsc,$numba);
            $chantier = $pdo->getLibChantier($numAsc,$numba);
            $observation = $pdo->getObservation($numAsc,$dateAsc,$numba);
            $existOdaAnimator = $pdo->verifOdaAnimator($numAsc,$dateAsc,$numba);
            //Si une autre personne à validé la fiche
            if($existOdaAnimator["id"]!="NULL"){
                //recupere les infos du redacteur
                $animateur = $pdo->getOtherAnimateur($numAsc,$dateAsc,$numba);
            }else{
                //recupere les infos du redacteur
                $animateur = $pdo->getAnimateur($numAsc,$dateAsc,$numba);        
            }
            $Date = dateAnglaisVersFrancais($dateAsc);
            $idUser = $animateur['id']; 
            include("vues/v_pdf_resa.php");     
            break;  
        }
        case 'cloturer':{
            $_SESSION["identUser"] = $_REQUEST['id']; 
            include("vues/v_sommaire.php");
            include("vues/v_signature.php");
            break;
        }
        case 'accueil':{
            include("vues/v_sommaire.php");
            include("vues/v_accueil.php");
            break;
        }

        case 'supFiche':{
            $date = $_REQUEST["dateAsc"];
            $fiche = $_REQUEST["numAsc"];
            $deleteT = $pdo->supThemeAsc($fiche,$date);//Supprime les themes associé à une fiche accueil 
            $deleteD = $pdo->supDocAsc($fiche,$date);//Supprime les documents à la base vie associé à une fiche accueil 
            $deleteS = $pdo->supSalAsc($fiche,$date);//Supprime les salariés associé à une fiche accueil 
            $deleteA = $pdo->supAS($fiche,$date);//Supprime à une fiche accueil 
            include("vues/v_sommaire.php");
            include("vues/v_myAccueil.php");
              echo "<div class='erreur'><center>Fiche Supprimé<center></div>";
            break;
        }
    }
}else{
    include("vues/v_connexion.php");
}