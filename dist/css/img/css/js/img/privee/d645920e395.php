<?php 
include('../../../../../../../content/lib/PHPExcel.php');include('../../../../../../../content/config.php')
;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
$req = $bdd->query("SELECT `Nom` , `Prenom` , `niveau_demande` , `Ville` , `GSM` , `Tel` , `E-Mail` , `numero_dossier` , `Resultat` , `Date_de_Naissance` , `test` FROM `contact_direct` where `date_test`='2017-08-29'")
;$sheet = new PHPExcel();





ini_set('memory_limit', '-1');
$activesheet = $sheet->getActiveSheet();
$activesheet->setCellValue('A1', 'Nom');
$activesheet->setCellValue('B1', 'Prenom');
$activesheet->setCellValue('C1', 'niveau_demande');
$activesheet->setCellValue('D1', 'Ville');
$activesheet->setCellValue('E1', 'GSM');
$activesheet->setCellValue('F1', 'Tel');
$activesheet->setCellValue('H1', 'Mail');
$activesheet->setCellValue('I1', 'numero_dossier');
$activesheet->setCellValue('J1', 'Resultat');
$activesheet->setCellValue('K1', 'Date_de_Naissance');
$activesheet->setCellValue('L1', 'test');


    $pos = 1;
    while ($data = $req->fetch()) {
        $pos++;
        $activesheet->setCellValue('A' . $pos, $data[0]);
        $activesheet->setCellValue('B' . $pos, $data[1]);
        $activesheet->setCellValue('C' . $pos, $data[2]);
        $activesheet->setCellValue('D' . $pos, $data[3]);
        $activesheet->setCellValue('E' . $pos, $data[4]);
        $activesheet->setCellValue('F' . $pos, $data[5]);
        $activesheet->setCellValue('H' . $pos, $data[6]);
        $activesheet->setCellValue('I' . $pos, $data[7]);
        $activesheet->setCellValue('J' . $pos, $data[8]);
        $activesheet->setCellValue('K' . $pos, $data[9]);
        $activesheet->setCellValue('L' . $pos, $data[10]);
    }
    $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
    $file = "export" . date('Y-m-d-h-i-s') . date('exp') . ".xlsx";
    $objWriter->save($file);
?>