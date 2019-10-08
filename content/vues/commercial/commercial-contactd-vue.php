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
    if(isset($_POST['date_rdv']))
    {
        header('Content-Type: application/json');
        require('content/controller/class.rendez-vous.php');
        $RendezVous=new RendezVous();
        $RendezVous->setDate($_POST['date_rdv']);
        $RendezVous->setHeure($_POST['heure_rdv']);
        $RendezVous->setUser($_SESSION['user']['id']);
        $RendezVous->setIdContact($_POST['id_rdv']);
        $RendezVous->setTypeContact($_POST['campagne_rdv']);
        $RendezVous->setInscription_rdv($_POST['inscription_rdv']);
        echo $RendezVous->createrdv();
        exit;
    }
if(isset($_POST['formationdemandee']) && $_POST['formationdemandee']!="")
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $niv =  $bdd->query("select distinct niveau from param_formations where formation_demande  =  '".$_POST['formationdemandee']."' ");
        $var = "<option></option>";
        foreach($niv->fetchAll() as $n)
        {
            $var.="<option>".$n['niveau']."</option>";
        }
        echo $var;exit;
    }

    if ($_SESSION['user']['profile'] == sha1(md5('commercial' . $salt))) {
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
        
        $Contactsuivipar = $rempisage->getFunctions("getContactsuivipar",$_GET['id'],'D');
        

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
            $cd->setDepotDossier($_POST['depotdossier']);
            $cd->setDateDepot($_POST['datedepotdossier']);
            $cd->setDateNaissance($_POST['datenaissance']);
            $cd->setDatePiece($_POST['datepieces']);
            $cd->setMotifAbsenceTest($_POST['motif']);
            $cd->setPieces($_POST['pieces']);
            $cd->setPays($_POST['pays']);
            $cd->setResultat($_POST['resultat']);
            $cd->setAbsTest($_POST['abstest']);
            $cd->setTestPasse($_POST['testpasse']);
            $cd->setFraisDossier($_POST['fraisdossier']);
            $cd->setStatutContact($_POST['stautcontact']);
            $cd->setEnvoiConvocation($_POST['envoiconvocation']);
            $cd->setInscrit($_POST['inscrit']);
            $cd->setInscReçuPar($_POST['inscriptionrecupar']);
            $cd->setLieuDeNaissance($_POST['lieunaissance']);
            $cd->setEmail($_POST['email']);
            $cd->setGsm($_POST['gsm']);
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
            $cd->setEtablissement($_POST['etablissement']);
            $cd->setNatureContact($_POST['natureconatct']);
            $cd->setResident($_POST['resident']);
            $cd->setTypeRésidence($_POST['typeresidence']);
            $cd->setEtatDossier($_POST['etatdossier']);
            $cd->setFormationDemandee($_POST['formationdemande']);
            $cd->setNiveauDemande($_POST['niveaudemande']);
            //$cd->setReçuPar($_POST['recupar']);
            $cd->setObservation($_POST['observations']);
            $cd->setLangue1($_POST['langue1']);
            $cd->setLangue2($_POST['langue2']);
            $cd->setLangue3($_POST['langue3']);
            $cd->setVisite($_POST['visite']);
            $cd->setLyceePublic($_POST['lyceepublic']);
            $cd->setLyceePrive($_POST['lyceeprive']);
            $cd->setLyceeMission($_POST['lyceemission']);
            $cd->setContactSuiteA($_POST['contacsuitea']);
            $cd->setDateFrais($_POST["datefrais"]);
            $cd->setTest($_POST['test']);
            $cd->setDateTest($_POST['datetest']);
            $cd->setMarche($_POST['marche']);
            $cd->setAnneeUniv($_POST['anneeuniv']);
            $cd->setS1bac1($_POST['s1bac1']);
            $cd->setS2bac1($_POST['s2bac1']);
            
            $cd->setContactSuiviPar($_POST['contactsuivipar']);
            

            
            $cd->setAnnuellebac1($_POST['annuellebac1']);
            $cd->setNoteregional($_POST['noteregional']);
            $cd->setS1bac2($_POST['s1bac2']);
            $cd->setS2bac2($_POST['s2bac2']);
            $cd->setAnnuellebac2($_POST['annuellebac2']);
            $cd->setNotenational($_POST['notenational']);
            $cd->setNotegenerale($_POST['notegenerale']);
            $cd->setS1tc($_POST['s1tc']);
            $cd->setS2tc($_POST['s2tc']);
            $cd->setAnnuelletc($_POST['annuelletc']);
            $cd->setId($_GET['id']);
            
            $cd->setDateInscription($_POST['dateinscription']);
            $cd->MettreAjour();
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
                                        <option selected="selected"></option>
                                        <?php echo $getNatureContact; ?>
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
                                    <label>Ville</label>
                                    <select class="form-control select2"  id="ville" required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getVille; ?>
                                    </select>
                                </div><!-- /.form-group -->
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
                                    <label>Langue1</label>
                                    <select class="form-control select2"  id="langue1" style="width: 100%;">
                                        <?php  echo $langue1; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Langue2</label>
                                    <select class="form-control select2"  id="langue2" style="width: 100%;">
                                        <?php  echo $langue2; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Langue3</label>
                                    <select class="form-control select2"  id="langue3" style="width: 100%;">
                                        <?php  echo $langue3; ?>
                                    </select>
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
                                    <label>Reçu Par</label>
                                    <select class="form-control select2"    id="recupar" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getRecuPar; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <?php
                                if($_SESSION['user']['role1']=="1")
                                { ?>
                                <div class="form-group">
                                    <label>Contact Suivi Par</label>
                                    <select class="form-control select2" id="suivipar" style="width: 100%;">
                                        <option></option>
                                     <?php   echo $Contactsuivipar; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <?php
                                }
                                ?>


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
                            </div><!--row -->
                        </div>
                    </div>
                </div>
<div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Les Notes</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr><th>Niveau</th><th>S1</th><th>S2</th><th>Note Finale</th><th>-</th></tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    Tronc Commun
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="s1tc" name="s1tc" value="<?php echo $contc[0]['s1tc']; ?>" placeholder="Note S1 TC " />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="s2tc" name="s2tc" value="<?php echo $contc[0]['s2tc']; ?>" placeholder="Note S2 TC " />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="annuelletc" name="annuelletc" value="<?php echo $contc[0]['annuelletc']; ?>" placeholder="Note Annuelle TC" />
                                </td>
                                <td align="center">-</td>
                            </tr>
                            <tr>
                                <td>
                                    1 Année Bac
                                </td>
                                <td>
                                    <input type="text" class="form-control" id="s1bac1" name="s1bac1" value="<?php echo $contc[0]['s1bac1']; ?>" placeholder="Note S1 1 Bac " />
                                </td>
                                <td>
                                    <input type="text" placeholder="Note S2 1 Bac "  size="45" class="form-control" id="s2bac1" value="<?php echo $contc[0]['s2bac1']; ?>" name="s2bac1" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="annuellebac1" name="annuellebac1" value="<?php echo $contc[0]['annuellebac1']; ?>" placeholder="Note Annuelle 1 Année Bac" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="noteregional" name="noteregional" value="<?php echo $contc[0]['noteregional']; ?>" placeholder="Note Regional" />
                                </td>
                            </tr>
                            <tr>
                                <td>2 Année Bac</td>
                                <td>
                                    <input type="text" placeholder="Note S1 2 Bac " class="form-control" id="s1bac2" value="<?php echo $contc[0]['s1bac2']; ?>" name="s1bac2" />
                                </td>
                                <td>
                                    <input  placeholder="Note S2 2 Bac " type="text" size="45" class="form-control" id="s2bac2" value="<?php echo $contc[0]['s2bac2']; ?>" name="s2ac2" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="annuellebac2" name="annuellebac2" value="<?php echo $contc[0]['annuellebac2']; ?>" placeholder="Note Annuelle 2 Année Bac" />
                                </td>
                                <td>
                                    <input type="text" class="form-control" size="45" id="notenational" name="notenational" value="<?php echo $contc[0]['notenational']; ?>" placeholder="Note National" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    Note Générale du  Bac
                                </td>
                                <td colspan="1" >
                                    <input type="text" class="form-control"   id="notegenerale" name="notegenerale"  value="<?php echo $contc[0]['notegenerale']; ?>" placeholder="Note Générale du Bac"/>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Dossier</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['depot_dossier']==1) echo 'checked'; ?> id="depotdossier">Depot Dossier
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Date Depôt Dossier</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datedepotdossier" name="datedepotdossier" type="text"  value="<?php echo $contc[0]['date_depot']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['Frais_Dossier']==1) echo 'checked'; ?> id="fraisdossier">Frais Dossier
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Date Frais</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datefrais" name="datefrais" type="text"  value="<?php echo $contc[0]['Date_Frais']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Date Test</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
                                            
			                      <input class="form-control" id="datetest" name="datetest" type="text"  value="<?php echo $contc[0]['date_test']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Test</label>
                                    <select class="form-control select2" id="test" style="width: 100%;">
                                        <?php echo $test; ?>
                                    </select>
                                    <!-- <input type="text"  class="form-control" id="test" required="required" value="<?php//  if(trim($contc[0]['test']!='Vide') and trim($contc[0]['test']!='vide')) {echo $contc[0]['test'];} ?>" style="width: 100%;"/> -->
                                   
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['Envoi_Convocation']==1) echo 'checked';   ?> id="envoiconvocation">Envoi convocation
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  <?php if($contc[0]['Test_Passe']==1) echo 'checked';   ?> id="testpasse">Test Passé
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['pieces']==1) echo 'checked';   ?> id="pieces">Pièces
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['AbsTest']==1) echo 'checked';   ?> id="abseTest">Absent Test
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Motif</label>
                                     
<input type="text"  class="form-control" id="motif" required="required" value="<?php echo $contc[0]['Motif_Absence_Test']; ?>" style="width: 100%;"/>
                                        
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Marché</label>
                                    <select class="form-control select2"  id="marche" style="width: 100%;">
                                        <option></option>
                                        <?php echo $marche; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Résultat</label>
                                    <select class="form-control select2"  id="resultat" style="width: 100%;">
                                        <option></option>
                                        <?php echo $getresultat; ?>
                                    </select>
                                </div><!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Date Pièces</label>
                                     <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datepieces" name="datepieces" type="text"  value="<?php echo $contc[0]['date_piece']; ?>" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Numero Dossier</label>
                                    <input class="form-control" readonly value="<?php if($contc[0]['numero_dossier']!="" and $contc[0]['numero_dossier']!=0){echo $contc[0]['numero_dossier'];}else{ echo $getnumerods;} ?>" id="numerodossier"  >
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Inscription Reçu Par</label>
                                    <select class="form-control select2"  id="inscriptionrecupar" style="width: 100%;">
                                        <option selected></option>
                                        <?php echo $getinscriptionrecupar; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Pays</label>
                                    <select class="form-control select2" id="pays"  style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo  $getPays; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" <?php if($contc[0]['Inscrit']==1) echo 'checked';   ?> id="inscrit">Inscrit
                                    </label>
                                </div>
                                 <div class="form-group">
                                    <label>Date d'inscription</label>
                                    <input class="form-control" id="dateinscription" value="<?php echo $contc[0]['date_inscription']; ?>" name="dateinscription" type="text" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Etat Dossier</label>
                                    <select class="form-control select2"  id="etatdossier" style="width: 100%;">
                                        <option selected></option>
                                        <?php echo $getetetatdossier; ?>
                                    </select>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row" >
                            <div class="col-md-4 col-md-offset-8">
                                <button type="button" class="btn btn-primary btn-md" onclick="MettreAjour('D');" >Mettre A Jour</button>
                            </div>
                        </div>
                    </div>
                </div>
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