<?php
/************************************************************************************
 * Nom : creerPdfReservation ********************************************************
 * But : Cette fonction gÉnÉre une version PDF d'une rÉservation É partir d'un ******
 * tableau d'informations fournit en paramÉtre **************************************
 * depuis la base de donnÉes ********************************************************
 * Retour : aucun *******************************************************************
 ************************************************************************************/


function creerPdfReservation($lesThemes,$lesDoc,$lesSign,$chantier,$observation,$Date,$animateur){
    // permet d'inclure la bibliothÉque fpdf
    require('include/fpdf/fpdf.php');

$file = utf8_decode($chantier['libelle']).' '.utf8_decode($chantier['numero']).'.pdf';
    // instancie un objet de type FPDF qui permet de crÉer le PDF
	
    $pdf = new FPDF();
    // ajoute une page
    $pdf->AddPage();
    // dÉfinit la police courante
    $pdf->SetLeftMargin(25);
    $pdf->Image('include/images/logo.png',10,10, 24, 15);
    //decallage
    $pdf->Cell(50);
    // Titre encadrÉ
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(90,10,utf8_decode('ACCUEIL SECURITÉ'),1,0,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Ln(15);
    $pdf->Cell(25);
    $pdf->Cell(140,10,'Chantier: '.utf8_decode($chantier['numero']).' '.utf8_decode($chantier['libelle']),1,0,'L');
    $pdf->Ln(11);
    $pdf->Cell(25);
    $pdf->Cell(140,10,'Animateur: '.utf8_decode($animateur["nom"]).' '.utf8_decode($animateur["prenom"]).'                             Date: '.$Date,1,0,'L');
    $pdf->Ln(11);
    $pdf->SetFont('Arial','B',8);
    $tab = array(150);
    $pdf->Cell($tab[0],7,utf8_decode("LES THEMES ABORDÉES"),1,0,'C');
    $pdf->Ln(5);
    foreach ($lesThemes as $aTheme) {
        $pdf->Cell($tab[0],10,utf8_decode($aTheme['libelle']),'LR');
        $pdf->Ln(5);
    }
    $pdf->Ln(3);
    $pdf->Cell(array_sum($tab),2,'','B');
    $pdf->Ln(3);
    $pdf->Cell($tab[0],7,utf8_decode("LES DOCUMENTS MIS À DISPOSITION À LA BASE DE VIE"),1,0,'C');
    $pdf->Ln(5);
    foreach($lesDoc as $aDoc) {
         $pdf->Cell($tab[0],10,utf8_decode($aDoc['libelle']),'LR');
         $pdf->Ln(5);
    }
    $pdf->Ln(3);
    $pdf->Cell(array_sum($tab),2,'','B');
    $pdf->Ln(3);
    // affiche du texte
    if (!empty($observation)) {
        $pdf->Cell(40,10,'OBSERVATIONS : '.utf8_decode($observation['observation']));
    }
    $pdf->Ln(8);
    $pdf->Cell($tab[0],7,"LE PERSONNEL",1,0,'C');
    $pdf->Ln(8);
    $p=array(40,40);
    $pdf->Cell($p[0],7,"Nom prenom",1,0,'C');
    $pdf->Cell($p[1],7,"Signature",1,0,'C');
    $pdf->Ln(10);
        //////////////////////////////////////////////////////////1 themes
    if (count($lesThemes)==1 && count($lesDoc)==0) {
            $i=98;
    }
    if (count($lesThemes)==1 && count($lesDoc)==1) {
            $i=103;
    }
    if (count($lesThemes)==1 && count($lesDoc)==2) {
            $i=108;
    }
    if (count($lesThemes)==1 && count($lesDoc)==3) {
            $i=113;
    }
    if (count($lesThemes)==1 && count($lesDoc)==4) {
            $i=118;
    }
    if (count($lesThemes)==1 && count($lesDoc)==5) {
            $i=123;
    }
    if (count($lesThemes)==1 && count($lesDoc)==6) {
            $i=128;
    }
    if (count($lesThemes)==1 && count($lesDoc)==7) {
            $i=133;
    }
    if (count($lesThemes)==1 && count($lesDoc)==8) {
            $i=138;
    }
    if (count($lesThemes)==1 && count($lesDoc)==9) {
            $i=143;
    }
    if (count($lesThemes)==1 && count($lesDoc)==10) {
            $i=148;
    }
    //////////////////////////////////////////////////////////2 themes
    if (count($lesThemes)==2 && count($lesDoc)==0) {
            $i=103;
    }
    if (count($lesThemes)==2 && count($lesDoc)==1) {
            $i=108;
    }
    if (count($lesThemes)==2 && count($lesDoc)==2) {
            $i=113;
    }
    if (count($lesThemes)==2 && count($lesDoc)==3) {
            $i=118;
    }
    if (count($lesThemes)==2 && count($lesDoc)==4) {
            $i=123;
    }
    if (count($lesThemes)==2 && count($lesDoc)==5) {
            $i=128;
    }
    if (count($lesThemes)==2 && count($lesDoc)==6) {
            $i=133;
    }
    if (count($lesThemes)==2 && count($lesDoc)==7) {
            $i=138;
    }
    ///////////////////////////////////////////////////////3 themes
    if (count($lesThemes)==3 && count($lesDoc)==0) {
            $i=108;
    }
    if (count($lesThemes)==3 && count($lesDoc)==1) {
            $i=113;
    }
    if (count($lesThemes)==3 && count($lesDoc)==2) {
            $i=118;
    }
    if (count($lesThemes)==3 && count($lesDoc)==3) {
            $i=123;
    }
    if (count($lesThemes)==3 && count($lesDoc)==4) {
            $i=128;
    }
    if (count($lesThemes)==3 && count($lesDoc)==5) {
            $i=133;
    }
    if (count($lesThemes)==3 && count($lesDoc)==6) {
            $i=138;
    }
    if (count($lesThemes)==3 && count($lesDoc)==7) {
            $i=143;
    }
    if (count($lesThemes)==3 && count($lesDoc)==8) {
            $i=148;
    }
    if (count($lesThemes)==3 && count($lesDoc)==9) {
            $i=153;
    }
    if (count($lesThemes)==3 && count($lesDoc)==10) {
            $i=158;
    }
    /////////////////////////////////////////////////////////////////////4 themes
    if (count($lesThemes)==4 && count($lesDoc)==0) {
            $i=113;
    }
    if (count($lesThemes)==4 && count($lesDoc)==1) {
            $i=118;
    }
    if (count($lesThemes)==4 && count($lesDoc)==2) {
            $i=123;
    }
    if (count($lesThemes)==4 && count($lesDoc)==3) {
            $i=128;
    }
    if (count($lesThemes)==4 && count($lesDoc)==4) {
            $i=133;
    }
    if (count($lesThemes)==4 && count($lesDoc)==5) {
            $i=138;
    }
    if (count($lesThemes)==4 && count($lesDoc)==6) {
            $i=143;
    }
    if (count($lesThemes)==4 && count($lesDoc)==7) {
            $i=148;
    }
    if (count($lesThemes)==4 && count($lesDoc)==8) {
            $i=153;
    }
    if (count($lesThemes)==4 && count($lesDoc)==9) {
            $i=158;
    }
    if (count($lesThemes)==4 && count($lesDoc)==10) {
            $i=163;
    }
    /////////////////////////////////////////////////////////////////////5 themes
    if (count($lesThemes)==5 && count($lesDoc)==0) {
            $i=118;
    }
    if (count($lesThemes)==5 && count($lesDoc)==1) {
            $i=123;
    }
    if (count($lesThemes)==5 && count($lesDoc)==2) {
            $i=128;
    }
    if (count($lesThemes)==5 && count($lesDoc)==3) {
            $i=133;
    }
    if (count($lesThemes)==5 && count($lesDoc)==4) {
            $i=138;
    }
    if (count($lesThemes)==5 && count($lesDoc)==5) {
            $i=143;
    }
    if (count($lesThemes)==5 && count($lesDoc)==6) {
            $i=148;
    }
    if (count($lesThemes)==5 && count($lesDoc)==7) {
            $i=153;
    }
    if (count($lesThemes)==5 && count($lesDoc)==8) {
            $i=158;
    }
    if (count($lesThemes)==5 && count($lesDoc)==9) {
            $i=163;
    }
    if (count($lesThemes)==5 && count($lesDoc)==10) {
            $i=168;
    }
    /////////////////////////////////////////////////////////////////////6 themes
    if (count($lesThemes)==6 && count($lesDoc)==0) {
            $i=123;
    }
    if (count($lesThemes)==6 && count($lesDoc)==1) {
            $i=128;
    }
    if (count($lesThemes)==6 && count($lesDoc)==2) {
            $i=133;
    }
    if (count($lesThemes)==6 && count($lesDoc)==3) {
            $i=138;
    }
    if (count($lesThemes)==6 && count($lesDoc)==4) {
            $i=143;
    }
    if (count($lesThemes)==6 && count($lesDoc)==5) {
            $i=148;
    }
    if (count($lesThemes)==6 && count($lesDoc)==6) {
            $i=153;
    }
    if (count($lesThemes)==6 && count($lesDoc)==7) {
            $i=158;
    }
    if (count($lesThemes)==6 && count($lesDoc)==8) {
            $i=163;
    }
    if (count($lesThemes)==6 && count($lesDoc)==9) {
            $i=168;
    }
    if (count($lesThemes)==6 && count($lesDoc)==10) {
            $i=173;
    }
        /////////////////////////////////////////////////////////////////////7 themes
    if (count($lesThemes)==7 && count($lesDoc)==0) {
            $i=128;
    }
    if (count($lesThemes)==7 && count($lesDoc)==1) {
            $i=133;
    }
    if (count($lesThemes)==7 && count($lesDoc)==2) {
            $i=138;
    }
    if (count($lesThemes)==7 && count($lesDoc)==3) {
            $i=143;
    }
    if (count($lesThemes)==7 && count($lesDoc)==4) {
            $i=148;
    }
    if (count($lesThemes)==7 && count($lesDoc)==5) {
            $i=153;
    }
    if (count($lesThemes)==7 && count($lesDoc)==6) {
            $i=158;
    }
    if (count($lesThemes)==7 && count($lesDoc)==7) {
            $i=163;
    }
    if (count($lesThemes)==7 && count($lesDoc)==8) {
            $i=168;
    }
    if (count($lesThemes)==7 && count($lesDoc)==9) {
            $i=173;
    }
    if (count($lesThemes)==7 && count($lesDoc)==10) {
            $i=178;
    }
    /////////////////////////////////////////////////////////////////////8 themes
    if (count($lesThemes)==8 && count($lesDoc)==0) {
            $i=133;
    }
    if (count($lesThemes)==8 && count($lesDoc)==1) {
            $i=138;
    }
    if (count($lesThemes)==8 && count($lesDoc)==2) {
            $i=143;
    }
    if (count($lesThemes)==8 && count($lesDoc)==3) {
            $i=148;
    }
    if (count($lesThemes)==8 && count($lesDoc)==4) {
            $i=153;
    }
    if (count($lesThemes)==8 && count($lesDoc)==5) {
            $i=158;
    }
    if (count($lesThemes)==8 && count($lesDoc)==6) {
            $i=163;
    }
    if (count($lesThemes)==8 && count($lesDoc)==7) {
            $i=168;
    }
    if (count($lesThemes)==8 && count($lesDoc)==8) {
            $i=173;
    }
    if (count($lesThemes)==8 && count($lesDoc)==9) {
            $i=178;
    }
    if (count($lesThemes)==8 && count($lesDoc)==10) {
            $i=183;
    }
        /////////////////////////////////////////////////////////////////////9 themes
    if (count($lesThemes)==9 && count($lesDoc)==0) {
            $i=138;
    }
    if (count($lesThemes)==9 && count($lesDoc)==1) {
            $i=143;
    }
    if (count($lesThemes)==9 && count($lesDoc)==2) {
            $i=148;
    }
    if (count($lesThemes)==9 && count($lesDoc)==3) {
            $i=153;
    }
    if (count($lesThemes)==9 && count($lesDoc)==4) {
            $i=158;
    }
    if (count($lesThemes)==9 && count($lesDoc)==5) {
            $i=163;
    }
    if (count($lesThemes)==9 && count($lesDoc)==6) {
            $i=168;
    }
    if (count($lesThemes)==9 && count($lesDoc)==7) {
            $i=173;
    }
    if (count($lesThemes)==9 && count($lesDoc)==8) {
            $i=178;
    }
    if (count($lesThemes)==9 && count($lesDoc)==9) {
            $i=183;
    }
    if (count($lesThemes)==9 && count($lesDoc)==10) {
            $i=188;
    }
            /////////////////////////////////////////////////////////////////////10 themes
    if (count($lesThemes)==10 && count($lesDoc)==0) {
            $i=143;
    }
    if (count($lesThemes)==10 && count($lesDoc)==1) {
            $i=148;
    }
    if (count($lesThemes)==10 && count($lesDoc)==2) {
            $i=153;
    }
    if (count($lesThemes)==10 && count($lesDoc)==3) {
            $i=158;
    }
    if (count($lesThemes)==10 && count($lesDoc)==4) {
            $i=163;
    }
    if (count($lesThemes)==10 && count($lesDoc)==5) {
            $i=168;
    }
    if (count($lesThemes)==10 && count($lesDoc)==6) {
            $i=173;
    }
    if (count($lesThemes)==10 && count($lesDoc)==7) {
            $i=178;
    }
    if (count($lesThemes)==10 && count($lesDoc)==8) {
            $i=183;
    }
    if (count($lesThemes)==10 && count($lesDoc)==9) {
            $i=188;
    }
    if (count($lesThemes)==10 && count($lesDoc)==10) {
            $i=193;
    }
                /////////////////////////////////////////////////////////////////////11 themes
    if (count($lesThemes)==11 && count($lesDoc)==0) {
            $i=148;
    }
    if (count($lesThemes)==11 && count($lesDoc)==1) {
            $i=153;
    }
    if (count($lesThemes)==11 && count($lesDoc)==2) {
            $i=158;
    }
    if (count($lesThemes)==11 && count($lesDoc)==3) {
            $i=163;
    }
    if (count($lesThemes)==11 && count($lesDoc)==4) {
            $i=168;
    }
    if (count($lesThemes)==11 && count($lesDoc)==5) {
            $i=173;
    }
    if (count($lesThemes)==11 && count($lesDoc)==6) {
            $i=178;
    }
    if (count($lesThemes)==11 && count($lesDoc)==7) {
            $i=183;
    }
    if (count($lesThemes)==11 && count($lesDoc)==8) {
            $i=188;
    }
    if (count($lesThemes)==11 && count($lesDoc)==9) {
            $i=193;
    }
    if (count($lesThemes)==11 && count($lesDoc)==10) {
            $i=198;
    }
                    /////////////////////////////////////////////////////////////////////12 themes
    if (count($lesThemes)==12 && count($lesDoc)==0) {
            $i=153;
    }
    if (count($lesThemes)==12 && count($lesDoc)==1) {
            $i=158;
    }
    if (count($lesThemes)==12 && count($lesDoc)==2) {
            $i=163;
    }
    if (count($lesThemes)==12 && count($lesDoc)==3) {
            $i=168;
    }
    if (count($lesThemes)==12 && count($lesDoc)==4) {
            $i=173;
    }
    if (count($lesThemes)==12 && count($lesDoc)==5) {
            $i=178;
    }
    if (count($lesThemes)==12 && count($lesDoc)==6) {
            $i=183;
    }
    if (count($lesThemes)==12 && count($lesDoc)==7) {
            $i=188;
    }
    if (count($lesThemes)==12 && count($lesDoc)==8) {
            $i=193;
    }
    if (count($lesThemes)==12 && count($lesDoc)==9) {
            $i=198;
    }
    if (count($lesThemes)==12 && count($lesDoc)==10) {
            $i=203;
    }
                    /////////////////////////////////////////////////////////////////////13 themes
    if (count($lesThemes)==13 && count($lesDoc)==0) {
            $i=158;
    }
    if (count($lesThemes)==13 && count($lesDoc)==1) {
            $i=163;
    }
    if (count($lesThemes)==13 && count($lesDoc)==2) {
            $i=168;
    }
    if (count($lesThemes)==13 && count($lesDoc)==3) {
            $i=173;
    }
    if (count($lesThemes)==13 && count($lesDoc)==4) {
            $i=178;
    }
    if (count($lesThemes)==13 && count($lesDoc)==5) {
            $i=183;
    }
    if (count($lesThemes)==13 && count($lesDoc)==6) {
            $i=188;
    }
    if (count($lesThemes)==13 && count($lesDoc)==7) {
            $i=193;
    }
    if (count($lesThemes)==13 && count($lesDoc)==8) {
            $i=198;
    }
    if (count($lesThemes)==13 && count($lesDoc)==9) {
            $i=203;
    }
    if (count($lesThemes)==13 && count($lesDoc)==10) {
            $i=208;
    }
                    /////////////////////////////////////////////////////////////////////14 themes
    if (count($lesThemes)==14 && count($lesDoc)==0) {
            $i=163;
    }
    if (count($lesThemes)==14 && count($lesDoc)==1) {
            $i=168;
    }
    if (count($lesThemes)==14 && count($lesDoc)==2) {
            $i=173;
    }
    if (count($lesThemes)==14 && count($lesDoc)==3) {
            $i=178;
    }
    if (count($lesThemes)==14 && count($lesDoc)==4) {
            $i=183;
    }
    if (count($lesThemes)==14 && count($lesDoc)==5) {
            $i=188;
    }
    if (count($lesThemes)==14 && count($lesDoc)==6) {
            $i=193;
    }
    if (count($lesThemes)==14 && count($lesDoc)==7) {
            $i=198;
    }
    if (count($lesThemes)==14 && count($lesDoc)==8) {
            $i=203;
    }
    if (count($lesThemes)==14 && count($lesDoc)==9) {
            $i=208;
    }
    if (count($lesThemes)==14 && count($lesDoc)==10) {
            $i=213;
    }
                    /////////////////////////////////////////////////////////////////////15 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=168;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=173;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=178;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=183;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=188;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=218;
    }
                        /////////////////////////////////////////////////////////////////////16 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=173;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=178;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=183;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=188;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=218;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=223;
    }
                        /////////////////////////////////////////////////////////////////////17 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=178;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=183;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=188;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=218;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=223;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=228;
    }
                        /////////////////////////////////////////////////////////////////////18 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=183;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=188;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=218;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=223;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=228;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=233;
    }
                        /////////////////////////////////////////////////////////////////////19 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=188;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=218;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=223;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=228;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=233;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=238;
    }
                        /////////////////////////////////////////////////////////////////////20 themes
    if (count($lesThemes)==15 && count($lesDoc)==0) {
            $i=193;
    }
    if (count($lesThemes)==15 && count($lesDoc)==1) {
            $i=198;
    }
    if (count($lesThemes)==15 && count($lesDoc)==2) {
            $i=203;
    }
    if (count($lesThemes)==15 && count($lesDoc)==3) {
            $i=208;
    }
    if (count($lesThemes)==15 && count($lesDoc)==4) {
            $i=213;
    }
    if (count($lesThemes)==15 && count($lesDoc)==5) {
            $i=218;
    }
    if (count($lesThemes)==15 && count($lesDoc)==6) {
            $i=223;
    }
    if (count($lesThemes)==15 && count($lesDoc)==7) {
            $i=228;
    }
    if (count($lesThemes)==15 && count($lesDoc)==8) {
            $i=233;
    }
    if (count($lesThemes)==15 && count($lesDoc)==9) {
            $i=238;
    }
    if (count($lesThemes)==15 && count($lesDoc)==10) {
            $i=243;
    }
    foreach ($lesSign as $aSign) {
        if ($aSign['signature']!= $animateur['signature']) {
            $pdf->Cell($p[0],10,utf8_decode(substr($aSign[1],0,10)).' '.utf8_decode($aSign[2]),'LR','R');
            $pdf->Cell($p[1],10,'','LR','R');
            if($aSign['signature']!=''){
                $pdf->Image($aSign['signature'],75,$i,24,8,'PNG');
            }
            $pdf->Ln(4);
        }
    }
    $pdf->Cell(array_sum($p),6,'','B');
    $pdf->Image($animateur['signature'],60,258,24,8,'PNG');
    $pdf->SetXY(15,256);
    $pdf->Cell(40,10,"Animateur: ".utf8_decode($animateur["nom"]).' '.utf8_decode($animateur["prenom"])."                                 Conducteur de Travaux : ");//ATP SECU
    $pdf->SetXY(15,260);
    $pdf->Cell(40,10,utf8_decode("Date: ".date("d-m-Y")."                 Visa:                                                 Date:                      Visa:                 "));
    $pdf->SetXY(0,262);
    $pdf->ln(4);
    $pdf->Cell(1,10,"ATP SECU 036");
    // Police Arial italique 8
    $pdf->SetFont('Arial','I',8);
    $pdf->AliasNbPages();
    // NumÉro de page
    $pdf->Cell(280,5,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
    ob_get_clean();
    $pdf->Output($file,'D');
}
$create=creerPdfReservation($lesThemes,$lesDoc,$lesSign,$chantier,$observation,$Date,$animateur);