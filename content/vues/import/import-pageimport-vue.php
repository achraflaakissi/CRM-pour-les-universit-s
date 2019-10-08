<?php

if(isset($_SESSION['user']))
{

    //$_SESSION['effectue']=null;
    //echo 'oui';exit;
    include("content/controller/class.contact-direct.php");
    include("content/controller/class.contact-indirecte.php");
    include 'biblio/Classes/PHPExcel.php';
    include 'biblio/Classes/PHPExcel/IOFactory.php';
    
    include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        
 $cnt = new ContactDirect();
   

    if(isset($_POST['valdirect']) && isset($_FILES['importdirects'])) {
        $ext = pathinfo($_FILES['importdirects']['name'], PATHINFO_EXTENSION);
        $file = $_FILES['importdirects']['tmp_name'];

       
       if($ext=='xlsx')
       {
           $excel_readers = array(
               'Excel5' ,
               'Excel2003XML' ,
               'Excel2007'
           );
           $reader = PHPExcel_IOFactory::createReader('Excel5');
           $excel = PHPExcel_IOFactory::load($file);
           $writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
           $writer->save($file.'.csv');

           if (($handle = fopen($file.'.csv', "r")) !== FALSE) {
               while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                   if(!empty($data[0]) &&  !is_numeric($data[0]))
                   {

                       continue;

                   }
                   // $feuille->getCell('H'.($i+2))->getValue(),$feuille->getCell('I'.($i+2))->getValue(),$feuille->getCell('G'.($i+2))->getValue())
                   
                   
                  
                   
                   $formation =  $bdd->query('select distinct formation_demande  from param_formations where formation_site like  "%'.$data[2].'%" ');
                   $formation=$formation->fetchAll();
                      if($formation[0][0]=="")
                   {
                       $cnt->setFormationDemandee($data[2]);
                   }
                   else
                   {
                       $cnt->setFormationDemandee($formation[0][0]);
                   }
                    
                    $niveau =  $bdd->query('select distinct niveau  from param_formations where formation_site like  "%'.$data[2].'%" and niveau_site like "%'.$data[3].'%" ');
                    $niveau=$niveau->fetchAll();
                    
                            
                       if($niveau[0][0]=="")
                   {
                       $cnt->setNiveauDemande($data[3]);
                   }
                   else
                   {
                       $cnt->setNiveauDemande($niveau[0][0]);
                   }
                   $cnt->setPrenom($data[4]);
                   $cnt->setNom($data[5]);
                   if ($data[7]!="" && $data[8]!="" && $data[6]!="") {
                       $cnt->setDateNaissance(date('Y-m-d',strtotime($data[6].'-'.$data[7].'-'.$data[8])));

                   }
                   // A B C d e f g h i j k l m n o p q r s t u v w x y z
                   $cnt->setLieuDeNaissance($data[9]);
                   $cnt->setNationalite($data[10]);
                   $cnt->setAdresse($data[11]);
                   $cnt->setVille($data[13]);
                   $cnt->setPays($data[14]);
                   $cnt->setTelephone($data[15]);
                   $cnt->setGsm($data[16]);
                   $cnt->setEmail($data[17]);
                   $cnt->setProfessionpere($data[18]);
                   $cnt->setTelPere($data[19]);
                   $cnt->setProfessionmere($data[20]);
                   $cnt->setTelMere($data[21]);
                   $cnt->setLangue1($data[32]);
                   $cnt->setLangue2($data[36]);
                   $cnt->setLangue2($data[36]);
                   $cnt->setLangue3($data[40]);
                   
                    $cnt->setReçuPar(100);
                  
                   $cnt->setNatureContact("Site Internet");
                   $cnt->setSaisiPar(56);
                   $cnt->setAnneeUniv(date('Y').'-'.(date('Y')+1));
                   $cnt->setDateDuContact(("20".explode('-',$data[50])[2]).'-'.(explode('-',$data[50])[0]).'-'.(explode('-',$data[50])[1]));


                   try{
                      $cnt->add();
                       $_SESSION['effectue']=true;

                   }
                   catch(Exception $exc)
                   {

                       $_SESSION['effectue']=false;

                   }

               }
               fclose($handle);
           }



       }
        else if($ext=='csv')
        {

            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if(!empty($data[0]) &&  !is_numeric($data[0]))
                    {
                        continue;

                    }
                     $formation =  $bdd->query('select distinct formation_demande  from param_formations where formation_site like  "%'.$data[2].'%" ');
                   $formation=$formation->fetchAll();
                     if($formation[0][0]=="")
                   {
                       $cnt->setFormationDemandee($data[2]);
                   }
                   else
                   {
                       $cnt->setFormationDemandee($formation[0][0]);
                   }
                    
                    $niveau =  $bdd->query('select distinct niveau  from param_formations where formation_site like  "%'.$data[2].'%" and niveau_site like "%'.$data[3].'%" ');
                    $niveau=$niveau->fetchAll();
                    
                            
                       if($niveau[0][0]=="")
                   {
                       $cnt->setNiveauDemande($data[3]);
                   }
                   else
                   {
                       $cnt->setNiveauDemande($niveau[0][0]);
                   }
                   
                   
                   
                    $cnt->setPrenom($data[4]);
                    $cnt->setNom($data[5]);
                    if ($data[7]!="" && $data[8]!="" && $data[6]!="") {
                        $cnt->setDateNaissance(date('Y-m-d',strtotime($data[6].'-'.$data[7].'-'.$data[8])));

                    }
                    // A B C d e f g h i j k l m n o p q r s t u v w x y z
                    $cnt->setLieuDeNaissance($data[9]);
                    $cnt->setNationalite($data[10]);
                    $cnt->setAdresse($data[11]);
                    $cnt->setVille($data[13]);
                    $cnt->setPays($data[14]);
                    $cnt->setTelephone($data[15]);
                    $cnt->setGsm($data[16]);
                    $cnt->setEmail($data[17]);
                    $cnt->setProfessionpere($data[18]);
                    $cnt->setTelPere($data[19]);
                    $cnt->setProfessionmere($data[20]);
                    $cnt->setTelMere($data[21]);
                    $cnt->setLangue1($data[32]);
                    $cnt->setLangue2($data[36]);
                    $cnt->setLangue3($data[40]);
                    $cnt->setSaisiPar(56);


                    $cnt->setReçuPar(100);


                    $cnt->setNatureContact("Site Internet");
                    $cnt->setSaisiPar(56);
                    $cnt->setAnneeUniv(date('Y').'-'.(date('Y')+1));
                    $cnt->setDateDuContact(date('Y-m-d', strtotime($data[50])));
                        
                        try{
                              
                            $cnt->add();
                            $_SESSION['effectue']=true;

                        }
                        catch(Exception $exc)
                        {
                             $_SESSION['effectue']=false;
                        }

                }
                fclose($handle);
            }
        }

    }
    /////////////////////////////////////////////////////////////////////////////////////////
    else if(isset($_POST['valindirect']) && isset($_FILES['importindirects'])) {
        $ext = pathinfo($_FILES['importindirects']['name'], PATHINFO_EXTENSION);
        $file = $_FILES['importindirects']['tmp_name'];

        $cni = new contact_indirecte();
        if($ext=='xlsx')
        {
            $excel_readers = array(
                'Excel5' ,
                'Excel2003XML' ,
                'Excel2007'
            );
            $reader = PHPExcel_IOFactory::createReader('Excel5');
            $excel = PHPExcel_IOFactory::load($file);
            $writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
            $writer->save($file.'.csv');

            if (($handle = fopen($file.'.csv', "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    // $feuille->getCell('H'.($i+2))->getValue(),$feuille->getCell('I'.($i+2))->getValue(),$feuille->getCell('G'.($i+2))->getValue())
                    if(!empty($data[0]) &&  !is_numeric($data[0]))
                    {

                        continue;

                    }
                     $formation =  $bdd->query('select distinct formation_demande  from param_formations where formation_site like  "%'.$data[2].'%" ');
                     $formation=$formation->fetchAll();
                    if($formation[0][0]=="")
                   {
                       $cnt->setFormationDemandee($data[2]);
                   }
                   else
                   {
                       $cnt->setFormationDemandee($formation[0][0]);
                   }
                   
                    $groupe =  $bdd->query('select distinct groupe_formation  from param_formations where formation_demande like  "%'.$formation[0][0].'%" ');
                    $groupe=$groupe->fetchAll();
                   if($groupe[0][0]=="")
                   {
                       
                   }
                   else
                   {
                       //$cnt->setGroupeFormation($groupe[0][0]);
                   }
                    
                    
                    $cnt->setPrenom($data[4]);
                    $cnt->setNom($data[5]);


                    if ($data[7]!="" && $data[8]!="" && $data[6]!="") {
                        $cnt->setDateNaissance(date('Y-m-d',strtotime($data[6].'-'.$data[7].'-'.$data[8])));

                    }
                    // A B C d e f g h i j k l m n o p q r s t u v w x y z
                    $cnt->setLieuDeNaissance($data[9]);
                    $cnt->setNationalite($data[10]);
                    $cnt->setAdresse($data[11]);
                    $cnt->setVille($data[13]);
                    $cnt->setPays($data[14]);
                    $cnt->setTelephone($data[15]);
                    $cnt->setGsm($data[16]);
                    $cnt->setEmail($data[17]);
                    $cnt->setProfessionpere($data[18]);
                    $cnt->setTelPere($data[19]);
                    $cnt->setProfessionmere($data[20]);
                    $cnt->setTelMere($data[21]);
                    
                    $cnt->setReçuPar(100);
                    
                    date_default_timezone_set('UTC');
                   $cnt->setDateSaisie(date('Y-m-d'));
                   $cnt->setHeureSaisie(date("H:i:s"));
                    $cnt->setLangue1($data[32]);
                    $cnt->setLangue2($data[36]);
                    $cnt->setLangue2($data[36]);
                    $cnt->setLangue3($data[40]);
                   $cnt->setNatureContact("Site Internet");
                    $cnt->setSaisiPar(56);
                    $cnt->setAnneeUniv(date('Y').'-'.(date('Y')+1));
                $cnt->setDateDuContact(date('Y-m-d', strtotime($data[50])));


                    try{
                        
                       $cnt->add();
                        $_SESSION['effectue']=true;

                    }
                    catch(Exception $exc)
                    {
                        $_SESSION['effectue']=false;
                    }

                }
                //exit;
                fclose($handle);
            }



        }
        else if($ext=='csv')
        {

            
        }
    }
        include "content/modules/header-inc.php";
}

?>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Importation des contacts
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            </br>
            <div class="row">
                <div class="row">
                    <div class = "col-md-6 col-md-offset-4 alert alert-success alert-dismissable" id="etatimport" <?php if(isset($_SESSION['effectue']) && $_SESSION['effectue']==1) echo "style='display:block ;'"; else echo "style='display:none ;'"; ?> >
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php if($_SESSION['effectue']==1) { echo "L'importation été bien effectuée "; $_SESSION['effectue']=null;} ?>
                    </div>
                    <div class = "col-md-6 col-md-offset-4 alert alert-danger alert-dismissable" id="etatimport2" <?php if(isset($_SESSION['effectue']) && $_SESSION['effectue']==0) echo "style='display: block;'"; else echo "style='display:none ;'"; ?> >
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php if($_SESSION['effectue']==0) { echo "L'importation n'été pas bien effectuée"; $_SESSION['effectue']=null;} ?>
                    </div>
                </div>

                <form method="post" enctype="multipart/form-data"  >
                    <div class="row">
                        <div class="col-md-5 col-md-offset-1">
                            <div class="panel panel-info">
                                <div class="panel-body">
                                    <input type="file" name="importdirects" id="importdirects" onchange="var ext = this.value.substr(this.value.lastIndexOf('.')+1,5);if(ext!='xlsx' && ext!='csv') {alert('Merci de Choisir un Fichier Excel ou Csv');this.value='';}" />
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-primary" name="valdirect">Importer Les Contacts Directs</button>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-5 col-md-offset-0">
                                <div class="panel panel-info">
                                    <div class="panel-body">
                                        <input type="file" name="importindirects" />
                                    </div>
                                    <div class="panel-footer">
                                        <button class="btn btn-primary" type="submit" name="valindirect"  >Importer Les Contacts Indirects</button>
 
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "content/modules/footer-inc.php"; ?>