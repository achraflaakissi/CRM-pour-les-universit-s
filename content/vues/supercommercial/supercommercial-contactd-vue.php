<?php

if(isset($_GET['id']))
{
    if(empty($_GET['id']))
    {
        header("Location: ./");
    }
}
else
{
    header("Location: ./");
}
if(isset($_SESSION['user'])) {
    include('content/config.php');
    


    if ($_SESSION['user']['profile'] == sha1(md5('supercommercial' . $salt))) {
        require('content/controller/class.Remplissage.php');
        $rempisage = new Remplissage();
        $getLyceeEtablissement = $rempisage->getFunctions("getLyceeEtablissement",$_GET['id'],'D');
        $getProfessionpere = $rempisage->getFunctions("getProfessionpere",$_GET['id'],'D');
        $getProfessionmere = $rempisage->getFunctions("getProfessionmere",$_GET['id'],'D');
        $getnumerods = $rempisage->getFunctions("getnumerods",$_GET['id'],'D');
        
        $getFormationDemander = $rempisage->getFunctions("getFormationDemander",$_GET['id'],'D');
        $getGroupeFormation = $rempisage->getFunctions("getGroupeFormation",$_GET['id'],'D');
        $getNiveauEtudes = $rempisage->getFunctions("getNiveauEtudes",$_GET['id'],'D');
        $getSeriebac = $rempisage->getFunctions("getSeriebac",$_GET['id'],'D');
        $getDiplomesObtenus = $rempisage->getFunctions("getDiplomesObtenus",$_GET['id'],'D');
        $getRecuPar = $rempisage->getFunctions("getRecuPar",$_GET['id'],'D');
        $getVille = $rempisage->getFunctions("getVille",$_GET['id'],'D');
        $getNatureContact = $rempisage->getFunctions("getNatureContact",$_GET['id'],'D');
        $getNationalite = $rempisage->getFunctions("getNationalite",$_GET['id'],'D');
        $getPays = $rempisage->getFunctions("getPays",$_GET['id'],'D');
        $test = $rempisage->getFunctions('gettest',$_GET['id'],'D');
        $getinscriptionrecupar=$rempisage->getFunctions("getinscriptionrecupar",$_GET['id'],'D');
        $langue1 = $rempisage->getFunctions('getlangue1',$_GET['id'],'D');
        $langue2 = $rempisage->getFunctions('getlangue2',$_GET['id'],'D');
        $langue3 = $rempisage->getFunctions('getlangue3',$_GET['id'],'D');
        $getetetatdossier = $rempisage->getFunctions("getetetatdossier",$_GET['id'],'D');
        $getmotif = $rempisage->getFunctions("getmotif",$_GET['id'],'D');
        $getresultat = $rempisage->getFunctions("getresultat",$_GET['id'],'D');
        $getsuivipar = $rempisage->getFunctions("getContactsuivipar",$_GET['id'],'D');
        $agent = $rempisage->getFunctions('getAgent',$_GET['id'],'D');
        $etatedossier = $rempisage->getFunctions('getetetatdossier',$_GET['id'],'D');
        $niveaudemade = $rempisage->getFunctions('getNiveauDemande',$_GET['id'],'D');
        $contactsuitea = $rempisage->getFunctions('getcontactsuitea',$_GET['id'],'D');
        $marche = $rempisage->getFunctions('getMarche',$_GET['id'],'D');
        $anneuniv = $rempisage->getFunctions('getAnneeUniv',$_GET['id'],'D');
        $anneObtention = $rempisage->getFunctions('getAnneeObtention',$_GET['id'],'D');
        $nationalite = $rempisage->getFunctions('getPays',$_GET['id'],'D');

        //print_r($_POST);exit;
        include_once('content/controller/class.contact-direct.php');

        $cd = new ContactDirect();
        if(count($_POST)>0) {
            foreach ($_POST as $key => $va) {
                if (is_null($_POST[$key]) || $_POST[$key] == '') {
                    $_POST[$key] = null;
                }
            }//64
            $cd->setId($_GET['id']);
            $cd->setCivilite($_POST['civilite']);
            $cd->setNom($_POST['nom']);
            $cd->setPrenom($_POST['prenom']);
            $cd->setDateNaissance($_POST['datenaissance']);
            $cd->setStatutContact($_POST['stautcontact']);
            $cd->setInscrit($_POST['inscrit']);
            $cd->setLieuDeNaissance($_POST['lieunaissance']);
            $cd->setEmail($_POST['email']);
            $cd->setGsm($_POST['gsm']);
            $cd->setReçuPar(100);
            $cd->setDateDuContact($_POST['datecontact']);
            $cd->setNationalite($_POST['nationalite']);
            $cd->setTelephone($_POST['telephone']);
            $cd->setVille($_POST['ville']);
            $cd->setAdresse($_POST['adresse']);
            $cd->setNomprenommere($_POST['nomprenommere']);
            $cd->setNomprenompere($_POST['nomprenompere']);
           if($_POST['professionpere']!="")
                {
              $rempisage->addToTable($_POST['professionpere'],'profession','profession');
               $cd->setProfessionpere($_POST['professionpere']);
             }
            $cd->setProfessionpere($_POST['professionpere']);
            $cd->setProfessionmere($_POST['professionmere']);
            $cd->setNumeroDossier($_POST['numerodossier']);
            $cd->setTelMere($_POST['telmere']);
            $cd->setTelPere($_POST['telpere']);
            $cd->setMailMere($_POST['mailmere']);
            $cd->setMailPere($_POST['mailpere']);
            $cd->setAdresseparents($_POST['adresseparents']);
            $cd->setNiveauDesEtudes($_POST['niveauetudes']);
            $cd->setDiplomesObtenus($_POST['diplomesobtenus']);
            $cd->setAnneeObtentionDiplome($_POST['anneeobtention']);
            $cd->setSerieBac($_POST['seriebac']);
            $cd->setEtatDossier($_POST['etatdossier']);
            $cd->setFormationDemandee($_POST['formationdemande']);
            $cd->setNiveauDemande($_POST['niveaudemande']);
            $cd->setObservation($_POST['observations']);
            $cd->setVisite($_POST['visite']);
            $cd->setLyceePublic($_POST['lyceepublic']);
            $cd->setLyceePrive($_POST['lyceeprive']);
            $cd->setLyceeMission($_POST['lyceemission']);
            $cd->setContactSuiteA($_POST['contacsuitea']);
            $cd->setContactSuivipar($_POST['suivipar']);
            $cd->setDateFrais($_POST["datefrais"]);
            $cd->setTest($_POST['test']);
            $cd->setDateTest($_POST['datetest']);
            $cd->setMarche($_POST['marche']);
            $cd->setAnneeUniv($_POST['anneeuniv']);
            $cd->setNatureContact($_POST['natureconatct']);
            $cd->setId($_GET['id']);
            
            $cd->MettreAjour(1);
            exit;
        }
        include "content/modules/header-inc.php";
    }
}

include('content/config.php');
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());

$query = $bdd->query('SELECT * from `contact_direct` WHERE md5(id)=\''.$_GET['id'].'\'');
$contc = $query->fetchAll();


?>



<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Fiche de contact direct
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <form role="form">
                <div class="row">
                    <div class="col-md-6 col-md-offset-4 alert alert-danger" style="display: none;" id="erreur">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-4 alert alert-success" style="display: none;" id="etatmodif">
                    </div>
                </div>
                <div class="row" >
                    <div class="col-md-6 col-lg-offset-3" id="message-div" >
                        <div class="alert alert-success alert-dismissable"  style="display: none;">
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            Les informations ont été bien ajoutées
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Informations Contact</h3>
                        <div class="box-tools">
                        <a href="#createrdv" class="btn btn-primary btn-sm" data-toggle="modal">Nouveau rendez-vous</a>
                    </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date de contact</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datecontact" name="datecontact" type="text"  value="<?php echo $contc[0]['date_du_contact']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Nature de contact</label>
                                    <select class="form-control select2" id="naturecontact" required="required" style="width: 100%;">
                                        <option></option>
                                        <?php 
                                        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                                        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
                                        
                                        $query = $bdd->query('SELECT Nature_de_Contact from `contact_direct` WHERE md5(id)=\''.$_GET['id'].'\'');
                                        $query=$query->fetchAll();
                                        
                                        ?>
                                        <option selected ><?php echo $query[0]['Nature_de_Contact']; ?></option>
                                        <option>E-Mail</option>
                                        <option>Facebook</option>
                                        <option>Site Internet</option>
                                        <option>Landing Page</option>
                                        <option>Téléphone</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Formation Demandée </label>
                                    <select class="form-control select2"  style="width: 100%;" required="required" id="formationdemandee">
                                        <option selected="selected"></option>
                                        <?php echo $getFormationDemander; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Niveau Demandé</label>
                         <select class="form-control select2" id="niveaudemande" required="required" style="width: 100%;">
                                      <option></option>
                                     <?php $res =  $bdd->query("select distinct  niveau from param_formations where formation_demande= '".addslashes ($contc[0]['Formation_Demmandee'])."'"); foreach($res->fetchAll() as $s ) { ?>

                                         <option <?php if($s['niveau']==$contc[0]['niveau_demande']) echo "selected"; ?> ><?php echo $s['niveau']; ?></option>
                               <?php } ?>
                                    </select>
                                    
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>contact suite à </label>
                                    <select class="form-control select2"  style="width: 100%;" required="required" id="contactsuitea">
                                        <option></option>
                                        <option>Autres</option>
                                        <?php echo $contactsuitea; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                
                               
                                
                                <div class="form-group">
                                    <label>Civilité</label>
                                    <select class="form-control" id="civilite" required="required"  style="width: 100%;">
                                        <option <?php if($contc[0]['Civilite']=='M.')  echo 'selected="selected"';?> > M.</option>
                                        <option <?php if($contc[0]['Civilite']=='Melle/Mme')  echo 'selected="selected"';?>>Melle/Mme</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" required="required" value="<?php echo $contc[0]['Nom']; ?>" id="nom" class="form-control input-group" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" id="prenom" required="required" value="<?php echo $contc[0]['Prenom']; ?>" class="form-control input-group input-group-sm" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datenaissance" name="datenaissance" type="text"  value="<?php echo $contc[0]['Date_de_Naissance']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Lieu de Naissance</label>
                                    <input type="text" id="lieunaissance" required="required"  value="<?php echo $contc[0]['Lieu_de_Naissance']; ?>" class="form-control input-group input-group-sm" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="mail"  required="required" class="form-control input-group input-group-sm" value="<?php echo $contc[0]['E-Mail']; ?>" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>GSM</label>
                                    <input type="text" id="gsm" required="required" class="form-control" value="<?php echo $contc[0]['GSM']; ?>" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Statut Contact</label>
                                    <select class="form-control select2"  id="statutcontact" required="required" style="width: 100%;">
                                        <option <?php if($contc[0]['StatutContact']=='')  { ?> selected="selected" <?php }?></option>
                                        <option <?php if($contc[0]['StatutContact']=='Prospect')  { ?> selected="selected" <?php }?> value="Prospect">	Prospect	</option>
                                        <option <?php if($contc[0]['StatutContact']=='Candidat')  { ?> selected="selected" <?php }?> value="Candidat">	Candidat	</option>
                                        <option <?php if($contc[0]['StatutContact']=='Inscrit')  { ?> selected="selected" <?php }?> value="Inscrit">	Inscrit	</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <textarea class="form-control" required="required" id="adresse"  rows="5" id="adresse"><?php echo $contc[0]['Adresse']; ?></textarea>
                                </div><!-- /.form-group -->

                            </div><!-- /.col -->
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nom et Prenom Mère</label>
                                    <input type="text" id="nomprenommere" value="<?php echo $contc[0]['nomprenommere']; ?>" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Nom et Prenom père</label>
                                    <input type="text" class="form-control" value="<?php echo $contc[0]['nomprenompere']; ?>" required="required" id="nomprenompere" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Profession père</label>
                                    <select class="form-control select2" id="professpere"  required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getProfessionpere; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Profession mère</label>
                                    <select class="form-control select2" id="professmere"  required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getProfessionmere; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tél mère</label>
                                    <input type="text" id="telmere" required="required"  value="<?php echo $contc[0]['Tel_Mere']; ?>" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tél père</label>
                                    <input type="text" id="telpere" value="<?php echo $contc[0]['Tel_Pere']; ?>" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mail Mère</label>
                                    <input type="text" id="mailmere"  value="<?php echo $contc[0]['Mail_Mere']; ?>" class="form-control" required="required" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mail Père</label>
                                    <input type="text" id="mailpere" value="<?php echo $contc[0]['Mail_Pere']; ?>" class="form-control" required="required" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Adresse Parents</label>
                                    <textarea class="form-control"  rows="5" id="adresseparents" required="required" ><?php echo $contc[0]['adresseparents']; ?></textarea>
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label>Nationalité</label>
                                    <select class="form-control select2"  id="nationalite" required="required" style="width: 100%;">
                                    <option></option>
                                        <?php echo $getNationalite;?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" id="telephone" value="<?php echo $contc[0]['Tel']; ?>" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Niveau des Etudes</label>
                                    <select class="form-control select2"  id="niveauetudes" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getNiveauEtudes; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Diplome Obt.</label>
                                    <select class="form-control select2" id="diplomeobt"  style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getDiplomesObtenus; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Année obtention</label>
                                    <select class="form-control select2"  id="anneeobtention" style="width: 100%;">
                                        <option></option>
                                        <?php echo $anneObtention; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Année Univ</label>
                                    <select class="form-control select2"  id="anneeuniv" style="width: 100%;">
                                        <option selected ></option>
                                        <?php echo $anneuniv; ?>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input <?php if($contc[0]['Lycee_Public']=='1') echo 'checked'; ?> type="checkbox" id="lyceepublic"> Lycée public
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  <?php if($contc[0]['Lycee_Prive']=='1') echo 'checked'; ?> id="lyceeprive"> Lycée privée
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['Lycee_Mission']=='1') echo 'checked'; ?> id="lyceemission"> Lycée mission
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Etablissement</label>
                              
                                    <select class="form-control select2"  id="etablissement"  style="width: 100%;">
                                        <option></option>
                                        <?php  echo $getLyceeEtablissement; ?>
                                    </select>                                 
                               </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Série Bac</label>
                                    <select class="form-control select2"  id="seriebac" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getSeriebac; ?>
                                    </select>
                                </div><!-- /.form-group -->



                              

                             
                                <div class="form-group">
                                     
                                    <label>Contact Suivi Par</label>
                                    
                                    <select class="form-control select2" id="suivipar" style="width: 100%;">
                                       <option></option>

                                       <?php
                                       $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                                        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
                                        if($contc[0]['Contact_Suivi_par']!="")
                                        {
                                        $user = $bdd->query("select nom,prenom,id from users where id=".$contc[0]['Contact_Suivi_par']);
                                        $user= $user->fetchAll();
                                        ?>
                                        <option selected value='<?php  echo $user[0]['id']; ?>' >
                                            <?php  echo $user[0]['prenom'].' '.$user[0]['nom']; ?>
                                        </option>
                                        
                                        <?php  } ?>
                                        
                                        
                                        
                                        
                                        <?php $centres = $bdd->query("select distinct centre from users where profile='commercial' "); 
                                            $centres=$centres->fetchAll();
                                            
                                            foreach($centres as $c)
                                            {
                                                ?>
                                                <optgroup label="<?php echo $c['centre']; ?>" >
                                                        <?php 
                                                        $options = $bdd->query("select nom,prenom,id,centre from users where profile ='commercial' and centre='".$c['centre']."'");
                                                        $options=$options->fetchAll();
                                                        foreach($options as $o)
                                                        {
                                                            ?>
                                                                <option value='<?php echo $o['id']; ?>' > <?php echo $o['nom'].' '.$o['prenom']; ?></option>
                                                            <?php 
                                                        }
                                                        
                                                        ?>
                                                </optgroup>
                                                <?php
                                            }
                                        
                                        ?>
                                        
                                    </select>
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Obsérvations</label>
                                        <textarea class="form-control" rows="5" id="observations"><?php echo $contc[0]['Observation']; ?></textarea>
                                    </div><!-- /.form-group -->
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" <?php if($contc[0]['Visite']==1) echo 'checked'; ?> id="visite"> Visite
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ville</label>
                                    <select class="form-control select2"  id="ville" required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getVille; ?>
                                    </select>
                                </div><!-- /.form-group -->
                            </div><!--row -->
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row" >
                            <div class="col-md-4 col-md-offset-8">
                                <button type="button" class="btn btn-primary btn-md" onclick="MettreAjourSuperCommercial();" >Mettre A Jour</button>
                            </div>
                        </div>
                    </div>
                </div>
 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $( "#datecontact, #datenaissance" ).datepicker({dateFormat: "yy-mm-dd"});
  $( function() {
    $("#datecontact, #datenaissance").datepicker();
      
  });
  </script>
                
            </form>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    
    <div class="modal fade" id="createrdv" role="dialog">
        <div class="modal-dialog"  style="background: transparent;border: none !important;">
            <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                <div class="modal-body" style="background: transparent;border: none !important;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouveau rendez-vous</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Date Rendez-Vous :</label>
                                <input class="form-control " placeholder="Date Rendez-Vous " id="date_rdv" type="date" >
                            </div>
                            <div class="form-group">
                                <label>Heure Rendez-Vous :</label>
                                <input class="form-control " placeholder="Heure Rendez-Vous " id="heure_rdv" type="time" >
                            </div>
                            <div class="form-group">
                                <label>Type de Rendez-Vous :</label>
                                <select class="form-control " id="inscription_rdv" >
                                    <option value="">--</option>
                                    <option value="1">Inscription</option>
                                    <option value="Dépôt dossier">Dépôt dossier</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="box-footer">
                                <button style="width: 30% !important;" id="btnrdv" onclick="createrdv('<?php echo $_GET['id']; ?>','from_search')" class="btn btn-block btn-primary btn-sm pull-right">Nouveau rendez-vous</button>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                </div>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <a class="btn btn-default" data-dismiss="modal">Close</a>-->
            <!--            </div>-->
        </div>
    </div>
    <?php

    include "content/modules/footer-inc.php"; ?>