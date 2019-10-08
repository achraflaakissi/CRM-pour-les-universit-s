<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        include('content/lib/PHPExcel.php');
        if(isset($_POST['exporter']))
        {
            $contact_CDI="";
            $links = array();
            ini_set('max_execution_time', 123456);
            if(isset($_POST['btn_direct']))
            {
                
            ///////////////////////////////////////////////////////////////////////////////////////////////////contact_direct
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'"); 
            $req = $bdd->query("SELECT id,Nom,`Prenom`,`GSM`,`Tel`,`E-Mail`,`Formation_Demmandee`,`niveau_demande`,`nTel`,`nEmail`,Contact_Suivi_par,Nature_de_Contact,contact_suite_a,date_du_contact,depot_dossier,date_depot,test,Test_Passe,date_test,Resultat,Inscrit,ville,pays,Marche,numero_dossier,StatutContact,Etape_Phoning1,Etape_Phoning2,Etape_Phoning3,Etape_Phoning4,Etape_Phoning5,Etape_Phoning,Date_Phoning1,Date_Phoning2,Date_Phoning3,Date_Phoning4,Date_Phoning5,Etape_Phoning6,Etape_Phoning7,Etape_Phoning8,Etape_Phoning9,Etape_Phoning10,Date_Phoning6,Date_Phoning7,Date_Phoning8,Date_Phoning9,Date_Phoning10
,`Campagne1` , `Campagne2` , `Campagne3` , `Campagne4` , `Campagne5` , `Campagne6` , `Campagne7`, `Campagne8` , `Campagne9` , `Campagne10` , `TA1` , `TA2` , `TA3` , `TA4` , `TA5` , `TA6` , `TA7` , `TA8` , `TA9` , `TA10` , `centre`,`Observation` FROM `contact_direct`  ");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Nom');
            $activesheet->setCellValue('C1', 'Prenom');
            $activesheet->setCellValueExplicit('D1', 'GSM', PHPExcel_Cell_DataType::TYPE_STRING);
            $activesheet->setCellValueExplicit('E1', 'Tel', PHPExcel_Cell_DataType::TYPE_STRING);
            $activesheet->setCellValue('F1', 'E-Mail');
            $activesheet->setCellValue('G1', 'Formation_Demmandee');
            $activesheet->setCellValue('H1', 'niveau_demande');
            $activesheet->setCellValue('I1', 'nTel');
            $activesheet->setCellValue('J1', 'nEmail');
            $activesheet->setCellValue('K1', 'Contact_Suivi_par');
            $activesheet->setCellValue('L1', 'Nature de contact');
            $activesheet->setCellValue('M1', 'Contact Suite a ');
            $activesheet->setCellValue('N1', 'Date de Contact');
            $activesheet->setCellValue('O1', 'Depot de dossier');
            $activesheet->setCellValue('P1', 'date depot de dossier');
            $activesheet->setCellValue('Q1', 'Test');
            $activesheet->setCellValue('R1', 'Test passé');
            $activesheet->setCellValue('S1', 'Date test ');
            $activesheet->setCellValue('T1', 'Resultat');
            $activesheet->setCellValue('U1', 'Inscrit');
            
            $activesheet->setCellValue('V1', 'Ville');
            $activesheet->setCellValue('W1', 'pays');
            $activesheet->setCellValue('X1', 'Marche');
            $activesheet->setCellValue('Y1', 'Numero Dossier');
            $activesheet->setCellValue('Z1', 'Statut Contact');
            
            $activesheet->setCellValue('AA1', '	Etape_Phoning1');
            $activesheet->setCellValue('AB1', 'Etape_Phoning2');
            $activesheet->setCellValue('AC1', 'Etape_Phoning3');
            $activesheet->setCellValue('AD1', 'Etape_Phoning4');
            $activesheet->setCellValue('AE1', 'Etape_Phoning5');
            $activesheet->setCellValue('AF1', 'Etape_Phoning');
            $activesheet->setCellValue('AG1', 'Date_Phoning1');
            $activesheet->setCellValue('AH1', 'Date_Phoning2');
            $activesheet->setCellValue('AI1', 'Date_Phoning3');
            $activesheet->setCellValue('AJ1', 'Date_Phoning4');
            $activesheet->setCellValue('AK1', 'Date_Phoning5');
            $activesheet->setCellValue('AL1', 'Etape_Phoning6');
            $activesheet->setCellValue('AM1', 'Etape_Phoning7');
            $activesheet->setCellValue('AN1', 'Etape_Phoning8');
            $activesheet->setCellValue('AO1', 'Etape_Phoning9');
            $activesheet->setCellValue('AP1', 'Etape_Phoning10');
            $activesheet->setCellValue('AQ1', 'Date_Phoning6');
            $activesheet->setCellValue('AR1', 'Date_Phoning7');
            $activesheet->setCellValue('AS1', 'Date_Phoning8');
            $activesheet->setCellValue('AT1', 'Date_Phoning9');
            $activesheet->setCellValue('AU1', 'Date_Phoning10');
            $activesheet->setCellValue('AV1', 'Campagne1');
            $activesheet->setCellValue('AW1', 'Campagne2');
            $activesheet->setCellValue('AX1', 'Campagne3');
            $activesheet->setCellValue('AY1', 'Campagne4');
            $activesheet->setCellValue('AZ1', 'Campagne5');
            $activesheet->setCellValue('BA1', 'Campagne6');
            $activesheet->setCellValue('BB1', 'Campagne7');
            $activesheet->setCellValue('BC1', 'Campagne8');
            $activesheet->setCellValue('BD1', 'Campagne9');
            $activesheet->setCellValue('BE1', 'Campagne10');
            $activesheet->setCellValue('BF1', 'TA1');
            $activesheet->setCellValue('BG1', 'TA2');
            $activesheet->setCellValue('BH1', 'TA3');
            $activesheet->setCellValue('BI1', 'TA4');
            $activesheet->setCellValue('BJ1', 'TA5');
            $activesheet->setCellValue('BK1', 'TA6');
            $activesheet->setCellValue('BL1', 'TA7');
            $activesheet->setCellValue('BM1', 'TA8');
            $activesheet->setCellValue('BN1', 'TA9');
            $activesheet->setCellValue('BO1', 'TA10');
            $activesheet->setCellValue('BP1', 'centre');
            $activesheet->setCellValue('BP1', 'Observation');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValueExplicit('D' . $pos, $data[3], PHPExcel_Cell_DataType::TYPE_STRING);
                $activesheet->setCellValueExplicit('E' . $pos, $data[4], PHPExcel_Cell_DataType::TYPE_STRING);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('N' . $pos, $data[13]);
                $activesheet->setCellValue('O' . $pos, $data[14]);
                $activesheet->setCellValue('P' . $pos, $data[15]);
                $activesheet->setCellValue('Q' . $pos, $data[16]);
                $activesheet->setCellValue('R' . $pos, $data[17]);
                $activesheet->setCellValue('S' . $pos, $data[18]);
                $activesheet->setCellValue('T' . $pos, $data[19]);
                $activesheet->setCellValue('U' . $pos, $data[20]);
                
                $activesheet->setCellValue('V' . $pos, $data[21]);
                $activesheet->setCellValue('W' . $pos, $data[22]);
                $activesheet->setCellValue('X' . $pos, $data[23]);
                $activesheet->setCellValue('Y' . $pos, $data[24]);
                $activesheet->setCellValue('Z' . $pos, $data[25]);
                
                $activesheet->setCellValue('AA'. $pos, $data[26]);
                $activesheet->setCellValue('AB'. $pos, $data[27]);
                $activesheet->setCellValue('AC'. $pos, $data[28]);
                $activesheet->setCellValue('AD'. $pos, $data[29]);
                $activesheet->setCellValue('AE'. $pos,$data[30]);
                $activesheet->setCellValue('AF'. $pos, $data[31]);
                $activesheet->setCellValue('AG'. $pos, $data[32]);
                $activesheet->setCellValue('AH'. $pos, $data[33]);
                $activesheet->setCellValue('AI'. $pos, $data[34]);
                $activesheet->setCellValue('AJ'. $pos, $data[35]);
                $activesheet->setCellValue('AK'. $pos, $data[36]);
                $activesheet->setCellValue('AL'. $pos, $data[37]);
                $activesheet->setCellValue('AM'. $pos, $data[38]);
                $activesheet->setCellValue('AN'. $pos, $data[39]);
                $activesheet->setCellValue('AO'. $pos, $data[40]);
                $activesheet->setCellValue('AP'. $pos, $data[41]);
                $activesheet->setCellValue('AQ'. $pos, $data[42]);
                $activesheet->setCellValue('AR'. $pos,$data[43]);
                $activesheet->setCellValue('AS'. $pos, $data[44]);
                $activesheet->setCellValue('AT'. $pos, $data[45]);
                $activesheet->setCellValue('AU'. $pos, $data[46]);
                $activesheet->setCellValue('AV'. $pos, $data[47]);
                $activesheet->setCellValue('AW'. $pos, $data[48]);
                $activesheet->setCellValue('AX'. $pos, $data[49]);
                $activesheet->setCellValue('AY'. $pos, $data[50]);
                $activesheet->setCellValue('AZ'. $pos, $data[51]);
                $activesheet->setCellValue('BA'. $pos, $data[52]);
                $activesheet->setCellValue('BB'. $pos, $data[53]);
                $activesheet->setCellValue('BC'. $pos, $data[54]);
                $activesheet->setCellValue('BD'. $pos, $data[55]);
                $activesheet->setCellValue('BE'. $pos, $data[56]);
                $activesheet->setCellValue('BF'. $pos, $data[57]);
                $activesheet->setCellValue('BG'. $pos, $data[58]);
                $activesheet->setCellValue('BH'. $pos, $data[59]);
                $activesheet->setCellValue('BI'. $pos, $data[60]);
                $activesheet->setCellValue('BJ'. $pos, $data[61]);
                $activesheet->setCellValue('BK'. $pos, $data[62]);
                $activesheet->setCellValue('BL'. $pos, $data[63]);
                $activesheet->setCellValue('BM'. $pos, $data[64]);
                $activesheet->setCellValue('BN'. $pos, $data[65]);
                $activesheet->setCellValue('BO'. $pos, $data[66]);
                $activesheet->setCellValue('BP'. $pos, $data[67]);
                $activesheet->setCellValue('BQ'. $pos, $data[68]);
                
                
            }
            //PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/contact_direct_export_FZ.xlsx";
            array_push($links,$file);
            $objWriter->save($file);
            }
            if(isset($_POST['btn_indirect']))
            {
            ini_set('max_execution_time', 123456);
            ini_set('memory_limit', '-1');
            $contact_CDI=$contact_CDI.'0';
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT id,`Nom`,`Prenom`,`Tel`,`E-Mail`,`GSM`,`Formation_Demmandee`,`Ntel`,`Nemail`,Etape_Phoning1,Etape_Phoning2,Etape_Phoning2,
            Etape_Phoning3,Etape_Phoning4,Etape_Phoning5,Etape_Phoning6,Etape_Phoning7,Etape_Phoning8,Etape_Phoning9,Etape_Phoning10
,`Campagne1` , `Campagne2` , `Campagne3` , `Campagne4` , `Campagne5` , `Campagne6` , `Campagne7`, `Campagne8` , `Campagne9` , `Campagne10` , 
`TA1` , `TA2` , `TA3` , `TA4` , `TA5` , `TA6` , `TA7` , `TA8` , `TA9` , `TA10` , `centre`,Contact_Suivi_par,Observations,`Profession_Mere` , 
`Profession_Pere` , `Mail_Mere` , `Mail_Pere` , `Tel_Mere` , `Tel_Pere` , `Annee_Etude` , `Ville` , `Nature_de_Contact` , `Ville_Lycee` , `Marche` ,`Date` , 
`Etablissement` , `Ntel` , `Nemail` , `Date_Phoning1` , `Date_Phoning2` , `Date_Phoning3` , `Date_Phoning4`
   , `Date_Phoning5` , `Date_Phoning6` , `Date_Phoning7` , `Date_Phoning8` , `Date_Phoning9` , `Date_Phoning10` FROM `contact_indirect`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Nom');
            $activesheet->setCellValue('C1', 'Prenom');
            $activesheet->setCellValue('D1', 'Tel');
            $activesheet->setCellValue('E1', 'E-Mail');
            $activesheet->setCellValue('F1', 'GSM');
            $activesheet->setCellValue('G1', 'Formation_Demmandee');
            $activesheet->setCellValue('H1', 'Ntel');
            $activesheet->setCellValue('I1', 'Nemail');
            $activesheet->setCellValue('J1', 'Etape_Phoning1');
            $activesheet->setCellValue('K1', 'Etape_Phoning2');
            $activesheet->setCellValue('L1', 'Etape_Phoning3');
            $activesheet->setCellValue('M1', 'Etape_Phoning4');
            $activesheet->setCellValue('N1', 'Etape_Phoning5');
            $activesheet->setCellValue('O1', 'Etape_Phoning6');
            $activesheet->setCellValue('P1', 'Etape_Phoning7');
            $activesheet->setCellValue('Q1', 'Etape_Phoning8');
            $activesheet->setCellValue('R1', 'Etape_Phoning9');
            $activesheet->setCellValue('S1', 'Etape_Phoning10');
            $activesheet->setCellValue('T1', 'Campagne1');
            $activesheet->setCellValue('U1', 'Campagne2');
            $activesheet->setCellValue('V1', 'Campagne3');
            $activesheet->setCellValue('W1', 'Campagne4');
            $activesheet->setCellValue('X1', 'Campagne5');
            $activesheet->setCellValue('Y1', 'Campagne6');
            $activesheet->setCellValue('Z1', 'Campagne7');
            $activesheet->setCellValue('AA1', 'Campagne8');
            $activesheet->setCellValue('AB1', 'Campagne9');
            $activesheet->setCellValue('AC1', 'Campagne10');
            $activesheet->setCellValue('AD1', 'TA1');
            $activesheet->setCellValue('AE1', 'TA2');
            $activesheet->setCellValue('AF1', 'TA3');
            $activesheet->setCellValue('AG1', 'TA4');
            $activesheet->setCellValue('AH1', 'TA5');
            $activesheet->setCellValue('AI1', 'TA6');
            $activesheet->setCellValue('AJ1', 'TA7');
            $activesheet->setCellValue('AK1', 'TA8');
            $activesheet->setCellValue('AL1', 'TA9');
            $activesheet->setCellValue('AM1', 'TA10');
            $activesheet->setCellValue('AN1', 'centre');
            $activesheet->setCellValue('AO1', 'Contact_Suivi_par');
            $activesheet->setCellValue('AQ1', 'Observations');
            $activesheet->setCellValue('AR1', 'Profession_Mere');
            $activesheet->setCellValue('AS1', 'Profession_Pere');
           $activesheet->setCellValue('AT1', 'Mail_Mere');
            $activesheet->setCellValue('AU1', 'Mail_Pere');
            $activesheet->setCellValue('AV1', 'Tel_Mere');
            $activesheet->setCellValue('AW1', 'Tel_Pere');
            $activesheet->setCellValue('AX1', 'Annee_Etude');
            $activesheet->setCellValue('AY1', 'Ville');
            $activesheet->setCellValue('AZ1', 'Nature_de_Contact');
            $activesheet->setCellValue('BA1', 'Ville_Lycee');
            $activesheet->setCellValue('BB1', 'Marche');
            $activesheet->setCellValue('BC1', 'Date');
            $activesheet->setCellValue('BD1', 'Etablissement');
            $activesheet->setCellValue('BE1', 'Ntel');
            $activesheet->setCellValue('BF1', 'Nemail');
            $activesheet->setCellValue('BG1', 'Date_Phoning1');
            $activesheet->setCellValue('BH1', 'Date_Phoning2');
            $activesheet->setCellValue('BI1', 'Date_Phoning3');
            $activesheet->setCellValue('BJ1', 'Date_Phoning4');
            $activesheet->setCellValue('BK1', 'Date_Phoning5');
            $activesheet->setCellValue('BL1', 'Date_Phoning6');
            $activesheet->setCellValue('BM1', 'Date_Phoning7');
            $activesheet->setCellValue('BN1', 'Date_Phoning8');
            $activesheet->setCellValue('BO1', 'Date_Phoning9');
            $activesheet->setCellValue('BP1', 'Date_Phoning10');
     
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('J'. $pos, $data[10]);
                $activesheet->setCellValue('K'. $pos, $data[11]);
                $activesheet->setCellValue('L'. $pos, $data[12]);
                $activesheet->setCellValue('M'. $pos, $data[13]);
                $activesheet->setCellValue('N'. $pos, $data[14]);
                $activesheet->setCellValue('O'. $pos, $data[15]);
                $activesheet->setCellValue('P'. $pos, $data[16]);
                $activesheet->setCellValue('Q'. $pos, $data[17]);
                $activesheet->setCellValue('R'. $pos, $data[18]);
                $activesheet->setCellValue('S'. $pos, $data[19]);
                $activesheet->setCellValue('T'. $pos, $data[20]);
                $activesheet->setCellValue('U'. $pos, $data[21]);
                $activesheet->setCellValue('V'. $pos, $data[22]);
                $activesheet->setCellValue('W'. $pos, $data[23]);
                $activesheet->setCellValue('X'. $pos, $data[24]);
                $activesheet->setCellValue('Y'. $pos, $data[25]);
                $activesheet->setCellValue('Z'. $pos, $data[26]);
                $activesheet->setCellValue('AA'. $pos, $data[27]);
                $activesheet->setCellValue('AB'. $pos, $data[28]);
                $activesheet->setCellValue('AC'. $pos, $data[29]);
                $activesheet->setCellValue('AD'. $pos, $data[30]);
                $activesheet->setCellValue('AE'. $pos, $data[31]);
                $activesheet->setCellValue('AF'. $pos, $data[32]);
                $activesheet->setCellValue('AG'. $pos, $data[33]);
                $activesheet->setCellValue('AH'. $pos, $data[34]);
                $activesheet->setCellValue('AI'. $pos, $data[35]);
                $activesheet->setCellValue('AJ'. $pos, $data[36]);
                $activesheet->setCellValue('AK'. $pos, $data[37]);
                $activesheet->setCellValue('AL'. $pos, $data[38]);
                $activesheet->setCellValue('AM'. $pos, $data[39]);
                $activesheet->setCellValue('AN'. $pos, $data[40]);
                $activesheet->setCellValue('AO'. $pos, $data[41]);
                $activesheet->setCellValue('AP'. $pos, $data[42]);
                $activesheet->setCellValue('AR'. $pos, $data[43]);
                $activesheet->setCellValue('AS'. $pos, $data[44]);
                $activesheet->setCellValue('AT'. $pos, $data[45]);
                $activesheet->setCellValue('AU'. $pos, $data[46]);
                $activesheet->setCellValue('AV'. $pos, $data[47]);
                $activesheet->setCellValue('AW'. $pos, $data[48]);
                $activesheet->setCellValue('AX'. $pos, $data[49]);
                $activesheet->setCellValue('AY'. $pos, $data[50]);
                $activesheet->setCellValue('AZ'. $pos, $data[51]);
                $activesheet->setCellValue('BA'. $pos, $data[52]);
                $activesheet->setCellValue('BB'. $pos, $data[53]);
                $activesheet->setCellValue('BC'. $pos, $data[54]);
                $activesheet->setCellValue('BD'. $pos, $data[55]);
                $activesheet->setCellValue('BE'. $pos, $data[56]);
                $activesheet->setCellValue('BF'. $pos, $data[57]);
                $activesheet->setCellValue('BG'. $pos, $data[58]);
                $activesheet->setCellValue('BH'. $pos, $data[59]);
                $activesheet->setCellValue('BI'. $pos, $data[60]);
                $activesheet->setCellValue('BJ'. $pos, $data[61]);
                $activesheet->setCellValue('BK'. $pos, $data[62]);
                $activesheet->setCellValue('BL'. $pos, $data[63]);
                $activesheet->setCellValue('BM'. $pos, $data[64]);
                $activesheet->setCellValue('BN'. $pos, $data[65]);
                $activesheet->setCellValue('BO'. $pos, $data[66]);
                $activesheet->setCellValue('BP'. $pos, $data[67]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/contact_indirect_export_FZ.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            }
            if(isset($_POST['btn']))
            {
                 ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT id,`nom`,`prenom`,`profile` FROM `users`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Nom');
            $activesheet->setCellValue('C1', 'Prenom');
            $activesheet->setCellValue('D1', 'profile');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/users_export_FZ.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
                 ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT `rdv_from_call_center`.*, u.nom as 'Nom TA',u.prenom as 'Prenom TA',cd.Nom as 'Nom contact',cd.Prenom as 'Prenom contact',cd.Date as 'date_du_contact' FROM rdv_from_call_center inner join users u on u.id=rdv_from_call_center.user inner join contact_indirect cd on cd.id=rdv_from_call_center.contact");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'user');
            $activesheet->setCellValue('C1', 'campagne');
            $activesheet->setCellValue('D1', 'contact');
            $activesheet->setCellValue('E1', 'type_contact');
            $activesheet->setCellValue('F1', 'rdv');
            $activesheet->setCellValue('G1', 'status');
            $activesheet->setCellValue('H1', 'date_saisie');
            $activesheet->setCellValue('I1', 'valider');
            $activesheet->setCellValue('J1', 'export');
            $activesheet->setCellValue('K1', 'Nom TA');
            $activesheet->setCellValue('L1', 'Prenom TA');
            $activesheet->setCellValue('M1', 'Nom Contact');
            $activesheet->setCellValue('N1', 'Prenom Contact');
            $activesheet->setCellValue('O1', 'date Contact');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
               
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('N' . $pos, $data[13]);
                $activesheet->setCellValue('O' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/rdv_from_call_center_export_CI_FZ.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>"; ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT `rdv_from_call_center`.*, u.nom as 'Nom TA',u.prenom as 'Prenom TA',cd.Nom as 'Nom contact',cd.Prenom as 'Prenom contact',cd.date_du_contact as 'Date Contact'  FROM rdv_from_call_center inner join users u on u.id=rdv_from_call_center.user inner join contact_direct cd on cd.id=rdv_from_call_center.contact");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'user');
            $activesheet->setCellValue('C1', 'campagne');
            $activesheet->setCellValue('D1', 'contact');
            $activesheet->setCellValue('E1', 'type_contact');
            $activesheet->setCellValue('F1', 'rdv');
            $activesheet->setCellValue('G1', 'status');
            $activesheet->setCellValue('H1', 'date_saisie');
            $activesheet->setCellValue('I1', 'valider');
            $activesheet->setCellValue('J1', 'export');
            $activesheet->setCellValue('K1', 'Nom TA');
            $activesheet->setCellValue('L1', 'Prenom TA');
            $activesheet->setCellValue('M1', 'Nom Contact');
            $activesheet->setCellValue('N1', 'Prenom Contact');
            $activesheet->setCellValue('O1', 'Date Contact');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
               
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('N' . $pos, $data[13]);
                $activesheet->setCellValue('O' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/rdv_from_call_center_export_CD_FZ.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT acr.*,u.nom,u.prenom,cd.Nom as 'Nom Contact',cd.Prenom as 'Prenom Contact' FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on acr.`id_rdv_table`=rfcc.id inner join contact_direct cd on cd.id=rfcc.contact inner join users u on u.id=cd.Contact_Suivi_par where rfcc.type_contact='CD'");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'id_rdv_table');
            $activesheet->setCellValue('C1', 'status');
            $activesheet->setCellValue('D1', 'observation');
            $activesheet->setCellValue('E1', 'rendez_vous');
            $activesheet->setCellValue('F1', 'heure');
            $activesheet->setCellValue('G1', 'date');
            $activesheet->setCellValue('H1', 'type_rdv');
            $activesheet->setCellValue('I1', 'date_saisie');
            $activesheet->setCellValue('J1', 'export');
            $activesheet->setCellValue('K1', 'validation rdv');
            $activesheet->setCellValue('L1', 'nom');
            $activesheet->setCellValue('M1', 'prenom');
            $activesheet->setCellValue('O1', 'Nom Contact');
            $activesheet->setCellValue('P1', 'Prenom Contact');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('O' . $pos, $data[13]);
                $activesheet->setCellValue('P' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/auto_cmp_rdv_CD_export_FZ.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT acr.*,u.nom,u.prenom,cd.Nom as 'Nom Contact',cd.Prenom as 'Prenom Contact' FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on acr.`id_rdv_table`=rfcc.id inner join contact_indirect cd on cd.id=rfcc.contact inner join users u on u.id=cd.Contact_Suivi_par where rfcc.type_contact='CDI'");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'id_rdv_table');
            $activesheet->setCellValue('C1', 'status');
            $activesheet->setCellValue('D1', 'observation');
            $activesheet->setCellValue('E1', 'rendez_vous');
            $activesheet->setCellValue('F1', 'heure');
            $activesheet->setCellValue('G1', 'date');
            $activesheet->setCellValue('H1', 'type_rdv');
            $activesheet->setCellValue('I1', 'date_saisie');
            $activesheet->setCellValue('J1', 'export');
            $activesheet->setCellValue('K1', 'validation rdv');
            $activesheet->setCellValue('L1', 'nom');
            $activesheet->setCellValue('M1', 'prenom');
            $activesheet->setCellValue('O1', 'Nom Contact');
            $activesheet->setCellValue('P1', 'Prenom Contact');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('O' . $pos, $data[13]);
                $activesheet->setCellValue('P' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/auto_cmp_rdv_CDI_export.xlsx";
            array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query('SELECT rf.`campagne`,rf.`type_contact`,rf.`rdv`,rf.`status`,rf.`date_saisie`,rf.`valider` ,ar.status as "status auto cmp",ar.`observation`,ar.`rendez_vous`,ar.`heure`,ar.`date`,
            ar.`type_rdv`,ar.`realisation_redez_vs`,cd.Nom as "nom contact",cd.Prenom as "prenom contact",cd.date_affectation,CONCAT(u.nom," ",u.prenom) as "CP" FROM `rdv_from_call_center` rf inner join auto_cmp_rdv ar on ar.id_rdv_table=rf.`id`
inner join contact_direct cd on cd.id=rf.`contact` 
inner join users u on u.id=cd.Contact_Suivi_par
WHERE `campagne` LIKE "appel"');
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'campagne');
            $activesheet->setCellValue('B1', 'type_contact');
            $activesheet->setCellValue('C1', 'rdv');
            $activesheet->setCellValue('D1', 'status');
            $activesheet->setCellValue('E1', 'date_saisie');
            $activesheet->setCellValue('F1', 'valider');
            $activesheet->setCellValue('G1', 'status auto cmp');
            $activesheet->setCellValue('H1', 'observation');
            $activesheet->setCellValue('I1', 'rendez_vous');
            $activesheet->setCellValue('J1', 'heure');
            $activesheet->setCellValue('K1', 'date');
            $activesheet->setCellValue('L1', 'type_rdv');
            $activesheet->setCellValue('M1', 'realisation_redez_vs');
            $activesheet->setCellValue('O1', 'Nom Contact');
            $activesheet->setCellValue('P1', 'Prenom Contact');
            $activesheet->setCellValue('Q1', 'date_affectation');
            $activesheet->setCellValue('R1', 'CP');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('O' . $pos, $data[13]);
                $activesheet->setCellValue('P' . $pos, $data[14]);
                $activesheet->setCellValue('Q' . $pos, $data[15]);
                $activesheet->setCellValue('R' . $pos, $data[16]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/Etat_CP_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query('SELECT rc.`campagne`,rc.`type_contact`,rc.`status`,rc.`date_saisie`,ac.observation , cd.Nom,cd.Prenom,cd.Formation_Demmandee,cd.niveau_demande, cd.`E-Mail`,cd.GSM,cd.Tel,cd.date_du_contact,cd.Nature_de_Contact,cd.contact_suite_a  FROM `rdv_from_call_center` rc inner join auto_cmp_rdv ac on ac.id_rdv_table=rc.id inner join contact_direct cd on cd.id=rc.`contact` WHERE `user` = 100');
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'campagne');
            $activesheet->setCellValue('B1', 'type_contact');
            $activesheet->setCellValue('C1', 'status');
            $activesheet->setCellValue('D1', 'date appel');
            $activesheet->setCellValue('E1', 'observation');
            $activesheet->setCellValue('F1', 'Nom Contact');
            $activesheet->setCellValue('G1', 'Prenom Contact');
            $activesheet->setCellValue('H1', 'Formation_Demmandee');
            $activesheet->setCellValue('I1', 'niveau_demande');
            $activesheet->setCellValue('J1', 'Mail');
            $activesheet->setCellValue('K1', 'GSM');
            $activesheet->setCellValue('L1', 'Tel');
            $activesheet->setCellValue('M1', 'date_du_contact');
            $activesheet->setCellValue('O1', 'Nature_de_Contact ');
            $activesheet->setCellValue('P1', 'contact_suite_a');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('O' . $pos, $data[13]);
                $activesheet->setCellValue('P' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/Mouna_realisation_CP_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query('SELECT rc.`campagne`,rc.`type_contact`,rc.`status`,rc.`date_saisie`,ac.observation , cd.Nom,cd.Prenom,cd.Formation_Demmandee,cd.niveau_demande, cd.`E-Mail`,cd.GSM,cd.Tel,cd.date_du_contact,cd.Nature_de_Contact,cd.contact_suite_a  FROM `rdv_from_call_center` rc inner join auto_cmp_rdv ac on ac.id_rdv_table=rc.id inner join contact_direct cd on cd.id=rc.`contact` WHERE `user` = 100');
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'campagne');
            $activesheet->setCellValue('B1', 'type_contact');
            $activesheet->setCellValue('C1', 'status');
            $activesheet->setCellValue('D1', 'date appel');
            $activesheet->setCellValue('E1', 'observation');
            $activesheet->setCellValue('F1', 'Nom Contact');
            $activesheet->setCellValue('G1', 'Prenom Contact');
            $activesheet->setCellValue('H1', 'Formation_Demmandee');
            $activesheet->setCellValue('I1', 'niveau_demande');
            $activesheet->setCellValue('J1', 'Mail');
            $activesheet->setCellValue('K1', 'GSM');
            $activesheet->setCellValue('L1', 'Tel');
            $activesheet->setCellValue('M1', 'date_du_contact');
            $activesheet->setCellValue('O1', 'Nature_de_Contact ');
            $activesheet->setCellValue('P1', 'contact_suite_a');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
                $activesheet->setCellValue('K' . $pos, $data[10]);
                $activesheet->setCellValue('L' . $pos, $data[11]);
                $activesheet->setCellValue('M' . $pos, $data[12]);
                $activesheet->setCellValue('O' . $pos, $data[13]);
                $activesheet->setCellValue('P' . $pos, $data[14]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/Mouna_realisation_CP_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query('SELECT cd.Nom,cd.Prenom,cd.Formation_Demmandee,cd.niveau_demande,cd.date_du_contact,cd.Nature_de_Contact,cd.Observation,rendez_vous.date,rendez_vous.heure,rendez_vous.date_saisie  FROM `rendez_vous` INNER join contact_direct cd on md5(cd.id)=rendez_vous.id_contact
where `inscription_rdv`=1 and cd.Resultat="Admis" and cd.Inscrit=0');
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'Nom');
            $activesheet->setCellValue('B1', 'Prenom');
            $activesheet->setCellValue('C1', 'Formation_Demmandee');
            $activesheet->setCellValue('D1', 'niveau_demande');
            $activesheet->setCellValue('E1', 'date_du_contact');
            $activesheet->setCellValue('F1', 'Nature_de_Contact');
            $activesheet->setCellValue('G1', 'Observation');
            $activesheet->setCellValue('H1', 'date rendez_vous');
            $activesheet->setCellValue('I1', 'heure rendez_vous');
            $activesheet->setCellValue('J1', 'date_saisie');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
                $activesheet->setCellValue('H' . $pos, $data[7]);
                $activesheet->setCellValue('I' . $pos, $data[8]);
                $activesheet->setCellValue('J' . $pos, $data[9]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/admin_RDV_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query('SELECT cd.Nom,cd.Prenom,cd.Formation_Demmandee,cd.niveau_demande,cd.date_du_contact,cd.Nature_de_Contact,cd.Observation  FROM `contact_direct` cd where md5(id) not in (select rendez_vous.id_contact from rendez_vous) and  cd.Resultat="Admis" and cd.Inscrit=0');
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'Nom');
            $activesheet->setCellValue('B1', 'Prenom');
            $activesheet->setCellValue('C1', 'Formation_Demmandee');
            $activesheet->setCellValue('D1', 'niveau_demande');
            $activesheet->setCellValue('E1', 'date_du_contact');
            $activesheet->setCellValue('F1', 'Nature_de_Contact');
            $activesheet->setCellValue('G1', 'Observation');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
                $activesheet->setCellValue('G' . $pos, $data[6]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file = "export/admin_NO_RDV_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file);
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file';
                        link.download = '$file';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            }
           
            
            
           
        }
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <form method="post">
                                <input type="hidden" value="exporter" name="exporter"/>
                                <input class="btn btn-primary btn-block btn-flat" type="submit" value="Exporter Contact Direct" name="btn_direct"/>
                            </form>
                        </div><!-- /.col --> 
                        <div class="col-md-3">
                            <form method="post">
                                <input type="hidden" value="exporter" name="exporter"/>
                                <input class="btn btn-primary btn-block btn-flat" type="submit" value="Exporter Contact Indirect" name="btn_indirect"/>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form method="post">
                                <input type="hidden" value="exporter" name="exporter"/>
                                <input class="btn btn-primary btn-block btn-flat" type="submit" value="Exporter" name="btn"/>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <a class="btn btn-primary btn-block btn-flat" href="export/contact_indirect_export_FZ.xlsx">Telecharger Contact Indirect</a>
                        </div><!-- /.col -->
                        <div class="col-md-2">
                            <a class="btn btn-primary btn-block btn-flat" href="export/contact_direct_export_FZ.xlsx">Telecharger Contact Direct</a>
                        </div><!-- /.col -->
                    </div>
                </section>
                
            </div>
        </div>




        

    <?php

    }

}

?>