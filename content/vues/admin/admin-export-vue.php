<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        include('content/lib/PHPExcel.php');
        $export=false;
        if(isset($_POST['exporter']) && isset($_POST['btn']))
        {
             ini_set('max_execution_time', 123456);
            $contact_CDI="";
            $links = array();
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM `rdv_from_call_center` WHERE `export`=0");
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
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                if($data["type_contact"]=="CDI")
                {
                    $contact_CDI.=$data["contact"].",";
                }
                $pos++;
                $reqe = $bdd->query("update `rdv_from_call_center` set `export`=1 WHERE `id`=".$data[0]);
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
            $file1 = "export/rdv_from_call_center_export.xlsx";
            //array_push($links,$file);
            
            $objWriter->save($file1);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file1';
                        link.download = '$file1';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT acr.*,u.nom,u.prenom FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on acr.`id_rdv_table`=rfcc.id inner join contact_direct cd on cd.id=rfcc.contact inner join users u on u.id=cd.Contact_Suivi_par where rfcc.type_contact='CD'");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
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
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $reqe = $bdd->query("update `auto_cmp_rdv` set `export`=1 WHERE `id`=".$data[0]);
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
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file2 = "export/auto_cmp_rdv_CD_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file2);
            $export=true;
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file2';
                        link.download = '$file2';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT acr.*,u.nom,u.prenom FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on acr.`id_rdv_table`=rfcc.id inner join contact_indirect cd on cd.id=rfcc.contact inner join users u on u.id=cd.Contact_Suivi_par where rfcc.type_contact='CDI'");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
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
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $reqe = $bdd->query("update `auto_cmp_rdv` set `export`=1 WHERE `id`=".$data[0]);
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
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file3 = "export/auto_cmp_rdv_CDI_export.xlsx";
            //array_push($links,$file);
           
            $objWriter->save($file3);
            $export=true;
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file3';
                        link.download = '$file3';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'"); 
            $req = $bdd->query("SELECT id,Nom,`Prenom`,`GSM`,`Tel`,`E-Mail`,`Formation_Demmandee`,`niveau_demande`,`nTel`,`nEmail`,Contact_Suivi_par,Nature_de_Contact,contact_suite_a,date_du_contact,depot_dossier,date_depot,test,Test_Passe,date_test,Resultat,Inscrit,ville,pays,Marche,numero_dossier,StatutContact,Etape_Phoning1,Etape_Phoning2,Etape_Phoning2,Etape_Phoning3,Etape_Phoning4,Etape_Phoning5,Etape_Phoning,Date_Phoning1,Date_Phoning2,Date_Phoning3,Date_Phoning4,Date_Phoning5,Etape_Phoning6,Etape_Phoning7,Etape_Phoning8,Etape_Phoning9,Etape_Phoning10,Date_Phoning6,Date_Phoning7,Date_Phoning8,Date_Phoning9,Date_Phoning10 FROM `contact_direct`  ");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
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
                
                
            }
            //PHPExcel_Shared_Font::setAutoSizeMethod(PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT);
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file4 = "export/contact_direct_export.xlsx";
            //array_push($links,$file);
           
            $objWriter->save($file4);
            $export=true;
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file4';
                        link.download = '$file4';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            $contact_CDI=$contact_CDI.'0';
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT id,`Nom`,`Prenom`,`Tel`,`E-Mail`,`GSM`,`Formation_Demmandee`,`Ntel`,`Nemail`,Contact_Suivi_par FROM `contact_indirect` WHERE id in (".$contact_CDI.")");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
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
            $activesheet->setCellValue('J1', 'Contact_Suivi_par');
    
    
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
            $file5 = "export/contact_indirect_export.xlsx";
            
            //array_push($links,$file);
            $objWriter->save($file5);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file5';
                        link.download = '$file5';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT id,`nom`,`prenom`,`profile` FROM `users`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
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
            $file6 = "export/users_export.xlsx";
            
            //array_push($links,$file);
            
            $objWriter->save($file6);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file6';
                        link.download = '$file6';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM `CD_CallCenter_NA`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
           $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Nom');
            $activesheet->setCellValue('C1', 'Prenom');
            $activesheet->setCellValue('D1', 'E-Mail');
            $activesheet->setCellValue('E1', 'GSM');
            $activesheet->setCellValue('F1', 'Tel');
            $activesheet->setCellValue('G1', 'Formation_Demmandee');
            $activesheet->setCellValue('H1', 'niveau_demande');
            $activesheet->setCellValue('I1', 'Contact_Suivi_par');
            $activesheet->setCellValue('J1', 'Nature_de_Contact');
            $activesheet->setCellValue('K1', 'Etape_Phoning');
            $activesheet->setCellValue('L1', 'Campagne');
            $activesheet->setCellValue('M1', 'TA');
            $activesheet->setCellValue('N1', 'Date_Phoning');
    
    
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
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file7 = "export/CD_CallCenter_NA_export.xlsx";
            //array_push($links,$file);
           
            $objWriter->save($file7);
            $export=true;
             echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file7';
                        link.download = '$file7';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM `CID_CallCenter_NA`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
           $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Nom');
            $activesheet->setCellValue('C1', 'Prenom');
            $activesheet->setCellValue('D1', 'E-Mail');
            $activesheet->setCellValue('E1', 'GSM');
            $activesheet->setCellValue('F1', 'Tel');
            $activesheet->setCellValue('G1', 'Formation_Demmandee');
            $activesheet->setCellValue('H1', 'Contact_Suivi_par');
            $activesheet->setCellValue('I1', 'Nature_de_Contact');
            $activesheet->setCellValue('J1', 'Etape_Phoning');
            $activesheet->setCellValue('K1', 'Campagne');
            $activesheet->setCellValue('L1', 'TA');
            $activesheet->setCellValue('M1', 'Date_Phoning');
    
    
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
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file8 = "export/CID_CallCenter_NA_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file8);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file8';
                        link.download = '$file8';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT count(`id`),`Formation_Demmandee`,`niveau_demande`,`Contact_Suivi_par` FROM `contact_direct` where Contact_Suivi_par is not null group by `Contact_Suivi_par`,Formation_Demmandee,`niveau_demande`");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
           $activesheet->setCellValue('A1', 'nbr contact');
            $activesheet->setCellValue('B1', 'Formation_Demmandee');
            $activesheet->setCellValue('C1', 'niveau_demande');
            $activesheet->setCellValue('D1', 'Contact_Suivi_par');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file9 = "export/NBR_CONTACT_DIRECT_BY_CP_NA_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file9);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file9';
                        link.download = '$file9';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT count(`id`),`Formation_Demmandee`,`Contact_Suivi_par` FROM `contact_indirect` where Contact_Suivi_par is not null group by `Contact_Suivi_par`,Formation_Demmandee");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
           $activesheet->setCellValue('A1', 'nbr contact');
            $activesheet->setCellValue('B1', 'Formation_Demmandee');
            $activesheet->setCellValue('C1', 'Contact_Suivi_par');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file10 = "export/NBR_CONTACT_INDIRECT_BY_CP_NA_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file10);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file10';
                        link.download = '$file10';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM `transfer_CDI_CD_Qualifié` ");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'id_contact');
            $activesheet->setCellValue('C1', 'new_id_contact');
            $activesheet->setCellValue('D1', 'id_user');
            $activesheet->setCellValue('E1', 'type');
            $activesheet->setCellValue('F1', 'date');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $reqe = $bdd->query("update `transfer_CDI_CD_Qualifié` set `exprter`=1 WHERE `id`=".$data[0]);
                $activesheet->setCellValue('A' . $pos, $data[0]);
                $activesheet->setCellValue('B' . $pos, $data[1]);
                $activesheet->setCellValue('C' . $pos, $data[2]);
                $activesheet->setCellValue('D' . $pos, $data[3]);
                $activesheet->setCellValue('E' . $pos, $data[4]);
                $activesheet->setCellValue('F' . $pos, $data[5]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file11 = "export/transfer_CDI_CD_Qualifie_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file11);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file11';
                        link.download = '$file11';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
            
            ///////////////////////////////////////////////////////////////////////////////////////////////////
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());$req = $bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT r.id,user,campagne,contact,type_contact,status,r.date_saisie,valider,nom,prenom,ville FROM `rdv_from_call_center_caravane` r inner join contact_indirect ci on ci.id=r.contact");
            $sheet = new PHPExcel();
            ini_set('memory_limit', '-1');
            ini_set('max_execution_time', 123456);
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'user');
            $activesheet->setCellValue('C1', 'campagne');
            $activesheet->setCellValue('D1', 'contact');
            $activesheet->setCellValue('E1', 'type_contact');
            $activesheet->setCellValue('F1', 'status');
            $activesheet->setCellValue('G1', 'date_saisie');
            $activesheet->setCellValue('H1', 'valider');
            $activesheet->setCellValue('I1', 'nom');
            $activesheet->setCellValue('J1', 'prenom');
            $activesheet->setCellValue('K1', 'ville');
    
    
            $pos = 1;
            while ($data = $req->fetch()) {
                $pos++;
                $reqe = $bdd->query("update `rdv_from_call_center_caravane` set `export`=1 WHERE `id`=".$data[0]);
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
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet, 'Excel2007');
            $file12 = "export/rdv_from_call_center_caravane_export.xlsx";
            //array_push($links,$file);
            $objWriter->save($file12);
            $export=true;
            echo "<script>
                        var link = document.createElement('a');
                        link.href = '$file12';
                        link.download = '$file12';
                        link.dispatchEvent(new MouseEvent('click'));
                        </script>";
        }
        
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-4">
                           
                        </div><!-- /.col -->
                        <div class="col-md-4">
                            <form method="post">
                                <input type="hidden" value="exporter" name="exporter"/>
                                <input type="submit" value="exporter" name="btn"/>
                                
                                
                                
                                
                            </form>
                        </div><!-- /.col -->
                    </div>
                </section>
            </div>
        </div>




        

    <?php
    
/*    $files = glob('path/to/temp/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}*/

    }

}

?>