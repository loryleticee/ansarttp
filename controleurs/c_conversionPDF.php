<?php
if(isset($_REQUEST['action']))
    {
    $action = $_REQUEST['action'];
}
else{$action = 'afficher';}
$idVisiteur = $_SESSION['idVisiteur'];
$login = $_SESSION['login'];
$mdp = $_SESSION['mdp'];
switch($action){
        case 'genererPDF':{
            $visiteur = $pdo->getInfosVisiteur($login, $mdp);
            include ("vues/v_conversion_PDF.php");
            break;
        }
        
}