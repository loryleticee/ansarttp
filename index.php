<?php
require_once("include/fct.inc.php");
require_once ("include/class.pdoansart.inc.php");
session_start();
include("vues/v_entete.php") ;
$pdo = PdoAnsart::getPdoAnsart();
$estConnecte = estConnecte();
$lesIpBani=$pdo->getLesBani(); 
$bani=false;
foreach ($lesIpBani as $anIp) {
	if ($_SERVER["REMOTE_ADDR"]==$anIp["adresse"]) {
		$bani=true;
	}
}
if ($bani!=true) {
if(!isset($_REQUEST['uc'])){
	if ($estConnecte) {
		 $_REQUEST['uc'] = 'admin';
	}
	else{
     	$_REQUEST['uc'] = 'connexion';
    }
}
else{	 
	if($_REQUEST['uc'] != "connexion" && $_REQUEST['uc'] != "admin"){
		if ($estConnecte) {
		 	$_REQUEST['uc'] = 'admin';
		}
		else{
			$_REQUEST['uc'] = "connexion";
		}

	}
}
$uc = $_REQUEST['uc'];
switch($uc){
	case 'connexion':{
		include("controleurs/c_connexion.php");break;
	}
    case 'admin' :{
        include("controleurs/c_administrer.php");break;
    }
}
include("vues/v_pied.php") ;
}else
{
	include("vues/v_out.php") ;
}?>