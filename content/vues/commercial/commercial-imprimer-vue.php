<?php
session_start();

if(isset($_SESSION['user'])) {
    
    if($_SESSION['user']['profile']=='a10ad63b795b02cc0873f154fe4f3a62a1f1b7ed' ){

$_SESSION['userid']=$_SESSION['user']['id'];

require 'biblio/fpdf181/fpdf.php';

class PDF extends FPDF
{

   private  $nbimpr=0;

    /**
     * @return int
     */
    public function getNbimpr()
    {
        return $this->nbimpr;
    }

    /**
     * @param int $nbimpr
     */
    public function setNbimpr($nbimpr)
    {
        $this->nbimpr = $nbimpr;
    }
// Load data


   function Footer()
    {
        // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',7);
        $this->Cell(0,10,iconv("UTF-8", "CP1250//TRANSLIT","Université Privée de Marrakech, KM 13, route d’Amizmiz (Route du barrage lalla Takerkoust) 42312 – Marrakech – Maroc Tél :212 (0) 5 24 48 70 00 Fax :+212 (0) 5 24 48 38 49 "),"T",0,'C');
        $this->Ln();
        $this->Cell(-10,0,$this->getNbimpr(),0,0,'L');
    }







// Simple table


// Better table


// Colored table

}



include("biblio/Numbers/Words.php");
$nw = new Numbers_Words();



//$id = $_GET['id'];
include("content/config.php");

$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());

$donn = $bdd->query("select * from payementconcour where concat(md5(md5(id_contact)),md5(id_contact))='".$_GET['id']."'");

$id="";$nom="";$prenom="";$montant="";$NumRecu="";
$frais_dossier="";$test="";$date_test="";$date_frais="";$id_contact="";
$numero_dossier="";
$centre="";
foreach($donn as $d)
{
    $id=$d['id'];
    $anneuniv=$d['Annee_Univ'];
    $nom=$d['nom'];
    $prenom=$d['prenom'];
    $montant=$d['montant'];
    $NumRecu=$d['NumRecu'];
    $frais_dossier=$d['frais_dossier'];
    $test=$d['test'];
    $date_test=$d['date_test'];
    $date_frais=$d['date_frais'];
    $id_contact=$d['id_contact'];
    $numero_dossier=$d['numero_dossier'];
    $centre=$d['centre'];
    $niveau = $d['niveau'];
    $nbimprime=$d['recuimprime'];
    $docnum = $d['docnum'];

    $mode = $d['modepaiement'];
    $de = $d['versepar'];

}

$comercial = $bdd->query("select nom,prenom from users where id = ".$_SESSION['userid']);
$comercial= $comercial->fetchAll()[0];
if(count($comercial)>0)
{
    $comercial=$comercial['nom'].' '.$comercial['prenom'];
  
}

$centre = $bdd->query("select centre from users where id = ".$_SESSION['userid']);
$centre= $centre->fetchAll()[0];
if(count($centre)>0)
{
    $centre=$centre['centre'];
  
}




$pdf = new PDF();

$pdf->setNbimpr($nbimprime);

$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$pdf->SetMargins(10, 10);

$pdf->SetFont('Arial','',11);
$pdf->addPage('P');






//$pdf->Image( "http://localhost/finance/logoUPM.png", 0, 7, 100 );
//$pdf->Cell(160, 40, "Recu Numero : ".$NumRecu, 0,12, "R");

$pdf->Multicell(190,10,$pdf->Image( "dist/img/logoUPM.png", 0, 7, 100 )."\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t ".iconv("UTF-8", "CP1250//TRANSLIT","Numéro de reçu : ").$NumRecu,0,"R");
$pdf->Multicell(190,10,"\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  Exemplaire - Etudiant (e)",0,"R");


$pdf->Ln();


$pdf->Multicell(80,15,"Centre : ".$centre,0,"L");

$pdf->Multicell(80,15,utf8_decode("Année Univ : ".$anneuniv),0,'L');


$pdf->Multicell(190,15,"Nom  : ".$nom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Prenom : ".$prenom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Niveau : ".$niveau,0,"L");


$pdf->Multicell(100,15,utf8_decode("Montant Versé: ". $montant ."  ".$nw->toWords($montant,'fr')." Dirhams"),0,'L');

//$pdf->Multicell(80,10,"Prenom   : ".$prenom,1,"L");

$pdf->Multicell(80,15,"Mode Paiement  :". utf8_decode($mode),0,"L");

$pdf->Multicell(190,15,"Numero Doc : ".$docnum."   \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t    \t \t \t \t \t \t \t \t   de : ".utf8_decode($de),0,"L");


$pdf->Multicell(190,10,"Visa et Cachet du Conseiller en Orientation ","RLT","T");
$pdf->Multicell(190,10,utf8_decode($comercial),"LR","T");
$pdf->Multicell(190,60,"","RLB","L");


//Ce reçu n’est pas remboursable, ne bénéficie qu’au nom de la personne y est mentionnée, et n’engage UPM qu’après encaissement réel de la modalité de paiement indiquée


//$pdf->Footer();


//$pdf->Ln();










/*$pdf->Write(1,"Centre");
$pdf->Write(1,iconv("UTF-8", "CP1250//TRANSLIT","Année Univ : ".date('Y').'-'.(date('Y')-1)));*/

ob_get_clean();


$pdf->addPage('P');
$pdf->Multicell(190,10,$pdf->Image( "dist/img/logoUPM.png", 0, 7, 100 )."\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t ".iconv("UTF-8", "CP1250//TRANSLIT","Numéro de reçu : ").$NumRecu,0,"R");
$pdf->Multicell(190,10,"\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  Exemplaire - Etablissement --Copie(1) ",0,"R");


$pdf->Ln();


$pdf->Multicell(80,15,"Centre : ".$centre,0,"L");

$pdf->Multicell(80,15,utf8_decode("Année Univ : ".$anneuniv),0,'L');


$pdf->Multicell(190,15,"Nom  : ".$nom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Prenom : ".$prenom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Niveau : ".$niveau,0,"L");


$pdf->Multicell(100,15,utf8_decode("Montant Versé: ". $montant ."  ".$nw->toWords($montant,'fr')." Dirhams"),0,'L');

//$pdf->Multicell(80,10,"Prenom   : ".$prenom,1,"L");

$pdf->Multicell(80,15,"Mode Paiement  : ".utf8_decode($mode),0,"L");

$pdf->Multicell(190,15,"Numero Doc : ".$docnum."   \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t    \t \t \t \t \t \t \t \t   de : ".utf8_decode($de),0,"L");


$pdf->Multicell(190,10,"Visa et Cachet du Conseiller en Orientation ","RLT","T");
$pdf->Multicell(190,10,utf8_decode($comercial),"LR","T");
$pdf->Multicell(190,60,"","RLB","L");



ob_get_clean();


$pdf->addPage('P');
$pdf->Multicell(190,10,$pdf->Image( "dist/img/logoUPM.png", 0, 7, 100 )."\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t ".iconv("UTF-8", "CP1250//TRANSLIT","Numéro de reçu : ").$NumRecu,0,"R");
$pdf->Multicell(190,10,"\t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  Exemplaire - Etablissement -- Copie(2)  ",0,"R");


$pdf->Ln();


$pdf->Multicell(80,15,"Centre : ".$centre,0,"L");

$pdf->Multicell(80,15,utf8_decode("Année Univ : ".$anneuniv),0,'L');


$pdf->Multicell(190,15,"Nom  : ".$nom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Prenom : ".$prenom." \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t Niveau : ".$niveau,0,"L");


$pdf->Multicell(100,15,utf8_decode("Montant Versé: ". $montant ."  ".$nw->toWords($montant,'fr')." Dirhams"),0,'L');

//$pdf->Multicell(80,10,"Prenom   : ".$prenom,1,"L");

$pdf->Multicell(80,15,"Mode Paiement  : ".utf8_decode($mode),0,"L");

$pdf->Multicell(190,15,"Numero Doc : ".$docnum."   \t \t \t \t \t \t \t \t \t \t \t \t \t \t \t  \t \t \t \t \t \t \t    \t \t \t \t \t \t \t \t   de : ".utf8_decode($de),0,"L");


$pdf->Multicell(190,10,"Visa et Cachet du Conseiller en Orientation  ","RLT","T");
$pdf->Multicell(190,10,utf8_decode($comercial),"LR","T");
$pdf->Multicell(190,60,"","RLB","L");





$pdf->output();










}}
?>