#!/usr/local/bin/php
<?php
header('Content-type: text/html; charset=ISO-8859-1'); 
//**********************************************************************************************************
include('fonctions/scripts.php');
//require('aws/class.phpmailer.php');
require('class.amazon.mail.php');
//**********************************************************************************************************
set_time_limit(0);
 
$hostname_conn = "10.0.231.158";
$database_conn = "optigedcvtheque";
$username_conn = "optigedcvtheque";
$password_conn = "Link@2biz";
 
$conn = mysqli_connect($hostname_conn, $username_conn, $password_conn) or die(mysqli_error());
mysqli_select_db($conn,"$database_conn");
//**********************************************************************************************************
$sql = "SELECT CURDATE() as dtsrv,CURTIME() as tmsrv"; $sql = mysqli_query($conn,$sql);	
$data = mysqli_fetch_array($sql); $date_srv = $data['dtsrv']; $time_srv = $data['tmsrv'];
//**********************************************************************************************************
$s1="SELECT * FROM statut WHERE IDStatut=10"; $s1=mysqli_query($conn,$s1); $d1=mysqli_fetch_array($s1);
$model_mail=$d1['Modele']; $sujet=$d1['Sujet']; mysqli_free_result($s1);
//**********************************************************************************************************
$n=0;
$s="SELECT * FROM candidature WHERE Courrier=0 AND IDStatut in (10,39) AND Email<>'' ORDER BY IDCandidature DESC LIMIT 100 ";
$s=mysqli_query($conn,$s); $n=mysqli_num_rows($s); $log="";
$fl=fopen("log.txt","a+"); 
if($n>0)
{
	//**********************************************************************************************************
	$j=0; $cnt=0;
	//**********************************************************************************************************
	while($d=mysqli_fetch_array($s))
	{
		$nom=$d['Nom']; $pnom=$d['prenom'];
		$modele=str_replace('[PRENOM]',$pnom,$model_mail); $modele=str_replace('[NOM]',$nom,$modele);
		$modele=str_replace('{Candidate.FullName}',$pnom." ".$nom,$modele); 
		list($dt,$tm)=explode(" ",$d['Date_Insertion']);
		$modele=str_replace('{Application.CompletedOrCreationDate}',datEnFr($dt),$modele);
		
		$ses = new SimpleEmailService("AKIAILITNEU4NLQAGQIQ", "bp6KbMWdb5My0fk3KfAN6XD+CluyEo/G/vWIwFNE");
		$mail = new SimpleEmailServiceMessage();
		$mail->addTo(str_replace(" ","",$d['Email']));
		//$mail->addTo("yassinemobile@gmail.com");
		$mail->setFrom('eef@optiged.fr');
		$mail->setSubject($sujet);
		$mail->setMessageFromString('',html_entity_decode($modele));		
		if($Mail_info=$ses->sendEmail($mail))
		{
			$sql="UPDATE candidature SET Courrier=1 WHERE IDCandidature=".$d['IDCandidature'].""; mysqli_query($conn,$sql); $cnt++;
			$log1=$date_srv." ".$time_srv."  - Envoi réussi  ::  ".$d['IDCandidature']." ----- ".$d['Nom']." --- ".$d['prenom']."    ----    ".$d['Email']."\n";	
			fwrite($fl,$log1); $log.=$log1;
			echo $Mail_info['MessageId'];
			log_to_mysql($d['IDCandidature'],$Mail_info['MessageId'],$conn);
		}
		else
		{
			$log2= $date_srv." ".$time_srv." - Envoi echec  ::  ".$d['IDCandidature']." ----- ".$d['Nom']." --- ".$d['prenom']."    ----    ".$d['Email'];	
			$log2.="  ::  ".$mail->ErrorInfo."\n";
			fwrite($fl,$log2);
		}
		$j++; if($j==10){sleep(30); $j=0;}
	}
	mysqli_free_result($s);
}
if($cnt>0)
{
	$ses = new SimpleEmailService("AKIAILITNEU4NLQAGQIQ", "bp6KbMWdb5My0fk3KfAN6XD+CluyEo/G/vWIwFNE");
	$mail = new SimpleEmailServiceMessage();
	$mail->addTo(array("frederic.lanciaux@optimail-solutions.com","sofian.lafram@data-embassy.com"));
	//$mail->addTo("yassine.kadda@data-embassy.com");
	$mail->setFrom('eef@optiged.fr');
	$mail->setSubject("Résumé des envois de mail aux candidats");
	$mail->setMessageFromString("Nombre de mail envoyés le ".$date_srv." à ".$time_srv." : ".$cnt."\n\n====================================\n".$log);		
	
	 $ses->sendEmail($mail);
 
}

function log_to_mysql($IDCandidature,$IDMessage,$conn){

$sql="insert into log_mailing values('','$IDCandidature','$IDMessage',CURRENT_TIMESTAMP,'1')"; 
mysqli_query($conn,$sql);
 
}

?>