<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
require('content/controller/class.Remplissage.php');
    $rem = new Remplissage();

if(isset($_POST['formationdemandee']) && $_POST['formationdemandee']!="")
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $niv =  $bdd->query("select distinct  niveau from param_formations where formation_demande  =  '".$_POST['formationdemandee']."' ");
        $var = "<option></option>";
        foreach($niv->fetchAll() as $n)
        {
            $var.="<option>".$n['niveau']."</option>";
        }
        echo $var;exit;
    }

    if(isset($_POST['nom_find']))
    {
        header('Content-Type: application/json');
        require('content/controller/class.contact-indirecte.php');
        $contact_indirecte = new contact_indirecte();
        $test=$contact_indirecte->findbyname($_POST['nom_find'],$_POST['prenom_find']);
        echo $test;exit;
    }
    if(isset($_POST['civilite']))
    {
        include('content/controller/class.contact-direct.php');
        $cd = new ContactDirect();
        //print_r($_POST);exit;
        foreach($_POST as $key=>$va)
        {
            if(is_null($_POST[$key]) || $_POST[$key]=='')
            {
                $_POST[$key]=null;
            }
        }
        $cd->setNatureContact($_POST['natureconatct']);
        $cd->setDateDuContact($_POST['datecontact']);
        $cd->setTypeRésidence($_POST['typeresidence']);
        $cd->setResident($_POST['resident']);
        $cd->setEtatDossier($_POST['etatdossier']);
        $cd->setFormationDemandee($_POST['formationdemande']);
        $cd->setNiveauDemande($_POST['niveaudemande']);
        $cd->setContactSuiteA($_POST['contacsuitea']);
        
        $cd->setCivilite($_POST['civilite']);
        $cd->setNom($_POST['nom']);
        $cd->setPrenom($_POST['prenom']);
        $cd->setDateNaissance($_POST['datenaissance']); 
        $cd->setLieuDeNaissance($_POST['lieunaissance']);
        $cd->setEmail($_POST['email']);
        $cd->setGsm($_POST['gsm']);
        $cd->setTelephone($_POST['telephone']);
        $cd->setNationalite($_POST['nationalite']);
        $cd->setVille($_POST['ville']);
        $cd->setAdresse($_POST['adresse']);
        $cd->setNomprenommere($_POST['nomprenommere']);
        $cd->setNomprenompere($_POST['nomprenompere']);
        if($_POST['professionpere']!="")
        {
        $rem->addToTable($_POST['professionpere'],'profession','profession');
        $cd->setProfessionpere($_POST['professionpere']);
        }
           if($_POST['professionmere']!="")
         {
         $rem->addToTable($_POST['professionmere'],'profession','profession');
        $cd->setProfessionmere($_POST['professionmere']);
        }
        $cd->setTelMere($_POST['telmere']);
        $cd->setTelPere($_POST['telpere']);
        $cd->setMailMere($_POST['mailmere']);
        $cd->setMailPere($_POST['mailpere']);
        $cd->setAdresseparents($_POST['adresseparents']);
        $cd->setObservation($_POST['observations']);
        $cd->setContactSuiviPar($_POST['contactsuivipar']);
        $cd->setReçuPar(100);
      
        try
        {
            echo $cd->add(1);exit;
        }
        catch(Exception $ex)
        {
            echo $ex->getMessage();exit;
        }
        
     /*   if($cd->add())
        {
            echo 'oui';
        }
        else
        {
            echo 'non';
        }
        exit;*/
        
    }
    if ($_SESSION['user']['profile'] == sha1(md5('supercommercial' . $salt))) {
        require('content/controller/class.remlpiration.php');
        $rempisage = new rempliration();
        $getLyceeEtablissement = $rempisage->getFunctions("getLyceeEtablissement");
        $getProfession = $rempisage->getFunctions("getProfession");
        $getFormationDemander = $rempisage->getFunctions("getFormationDemander");
        $getGroupeFormation = $rempisage->getFunctions("getGroupeFormation");
        $getNiveauEtudes = $rempisage->getFunctions("getNiveauEtudes");
        $getSeriebac = $rempisage->getFunctions("getSeriebac");
        $getDiplomesObtenus = $rempisage->getFunctions("getDiplomesObtenus");
        $getRecuPar = $rempisage->getFunctions("getRecuPar");
        $getVille = $rempisage->getFunctions("getVille");
        //$getNatureContact = $rempisage->getFunctions("getNatureContact");
        $getPays = $rempisage->getFunctions("getPays");
        $langues = $rempisage->getFunctions('getlangues');
        $agent = $rempisage->getFunctions('getagents');
        $etatedossier = $rempisage->getFunctions('getetetatdossier');
        $niveaudemade = $rempisage->getFunctions('getNiveauDemande');
        $contactsuitea = $rempisage->getFunctions('getcontactsuitea');
        $typeresidence = $rempisage->getFunctions("gettyperesidence");
        $marche = $rempisage->getFunctions('getmarche');
        $gettest= $rempisage->getFunctions('gettest');
        include "content/modules/header-inc.php";
    }
}
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
                <div class="row" >
                    <div class="col-md-6 col-lg-offset-3" id="message-div">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-4 alert alert-success" style="display: none;" id="etatajout">
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Autres</h3>
                            </div>
                            <div class="box-body">

                                <div class="form-group">
                                    <label>Nature de contact</label>
                                    <select class="form-control select2" required="required" id="naturecontact" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <option>E-Mail</option>
                                       <option>Facebook</option>
                                        <option>Site Internet</option>
                                        <option>Landing Page</option>
                                        <option>Téléphone</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Date de contact</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datecontact" name="datecontact" value="<?php echo date('Y-m-d'); ?>" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="resident"> Résident
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Type de résidence</label>
                                    <input type="text" class="form-control" id="typeresidence" required="required" style="width: 100%;" />
                                    <!-- <select class="form-control select2" id="typeresidence" style="width: 100%;">
                                       <?php echo $typeresidence; ?>
                                    </select> -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Etat dossier</label>
                                    <select class="form-control" id="etatdossier" style="width: 100%;">
                                        <?php echo $etatedossier; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Formation Demandée </label>
                                    <select class="form-control select2" required="required" id="formationdemandee">
                                        <option></option>
                                        <?php echo $getFormationDemander; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                
                               

                                  <div class="form-group">
                                    <label>Niveau Demandé</label>
                                    <select class="form-control select2" id="niveaudemande" required="required" style="width:      100%;">
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>contact suite à </label>
                                    <select class="form-control select2"  required="required" id="contactsuitea">
                                       <?php echo $contactsuitea; ?>
                                      
                                    </select>
                                </div><!-- /.form-group -->
                                 
                                <div class="form-group">
                                    <label>Reçu Par</label>
                                    <select class="form-control select2" id="recupar" style="width: 100%;">
                                        <option></option>
                                        <?php echo  $getRecuPar; ?>
                                    </select>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Renseignements Personnels</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Civilité</label>
                                    <select class="form-control" id="civilite" required="required"  style="width: 100%;">
                                        <option selected="selected">M.</option>
                                        <option>Mlle</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input type="text" required="required" id="nom" class="form-control input-group" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Prenom</label>
                                    <input type="text" id="prenom" required="required" class="form-control input-group input-group-sm" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Date de Naissance</label>
                                    <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datenaissance" name="datenaissance" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Lieu de Naissance</label>
                                    <input type="text" id="lieunaissance" required="required" class="form-control input-group input-group-sm" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" id="mail"  required="required" class="form-control input-group input-group-sm" style="width: 100% !important;" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Marche</label>
                                    <select class="form-control select2" required="required" id="marche" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $marche; ?>
                                    </select>
                                </div><!-- /.form-group -->
<div class="form-group">
                                    <label>GSM</label>
                                    <input type="text" id="gsm" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Téléphone</label>
                                    <input type="text" id="telephone" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                
                                <div class="form-group">
                                    <label>Nationalité</label>
                                    <select class="form-control select2" id="nationalite" required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <option>	Albanais	</option>
                                        <option>	Algérien	</option>
                                        <option>	Allemand	</option>
                                        <option>	Américain	</option>
                                        <option>	Angolais	</option>
                                        <option>	Argentin	</option>
                                        <option>	Arménien	</option>
                                        <option>	Australien	</option>
                                        <option>	Autrichien	</option>
                                        <option>	Bangladais	</option>
                                        <option>	Belge	</option>
                                        <option>	Béninois	</option>
                                        <option>	Bosniaque	</option>
                                        <option>	Botswanais	</option>
                                        <option>	Bhoutan	</option>
                                        <option>	Brésilien	</option>
                                        <option>	Britannique	</option>
                                        <option>	Bulgare	</option>
                                        <option>	Burkinabè	</option>
                                        <option>	Cambodgien	</option>
                                        <option>	Camerounais	</option>
                                        <option>	Canadien	</option>
                                        <option>	Chilien	</option>
                                        <option>	Chinois	</option>
                                        <option>	Colombien	</option>
                                        <option>	Congolais	</option>
                                        <option>	Cubain	</option>
                                        <option>	Danois	</option>
                                        <option>	Ecossais	</option>
                                        <option>	Egyptien	</option>
                                        <option>	Espagnol	</option>
                                        <option>	Estonien	</option>
                                        <option>	Européen	</option>
                                        <option>	Finlandais	</option>
                                        <option>	Français	</option>
                                        <option>	Gabonais	</option>
                                        <option>	Georgien	</option>
                                        <option>	Grec	</option>
                                        <option>	Guinéen	</option>
                                        <option>	Haïtien	</option>
                                        <option>	Hollandais	</option>
                                        <option>	Hong-Kong	</option>
                                        <option>	Hongrois	</option>
                                        <option>	Indien	</option>
                                        <option>	Indonésien	</option>
                                        <option>	Irakien	</option>
                                        <option>	Iranien	</option>
                                        <option>	Irlandais	</option>
                                        <option>	Islandais	</option>
                                        <option>	Israélien	</option>
                                        <option>	Italien	</option>
                                        <option>	Ivoirien	</option>
                                        <option>	Jamaïcain	</option>
                                        <option>	Japonais	</option>
                                        <option>	Kazakh	</option>
                                        <option>	Kirghiz	</option>
                                        <option>	Kurde	</option>
                                        <option>	Letton	</option>
                                        <option>	Libanais	</option>
                                        <option>	Liechtenstein	</option>
                                        <option>	Lituanien	</option>
                                        <option>	Luxembourgeois	</option>
                                        <option>	Macédonien	</option>
                                        <option>	Madagascar	</option>
                                        <option>	Malaisien	</option>
                                        <option>	Malien	</option>
                                        <option>	Maltais	</option>
                                        <option>	Marocain	</option>
                                        <option>	Mauritanien	</option>
                                        <option>	Mauricien	</option>
                                        <option>	Mexicain	</option>
                                        <option>	Monégasque	</option>
                                        <option>	Mongol	</option>
                                        <option>	Néo-Zélandais	</option>
                                        <option>	Nigérien	</option>
                                        <option>	Nord Coréen	</option>
                                        <option>	Norvégien	</option>
                                        <option>	Pakistanais	</option>
                                        <option>	Palestinien	</option>
                                        <option>	Péruvien	</option>
                                        <option>	Philippins	</option>
                                        <option>	Polonais	</option>
                                        <option>	Portoricain	</option>
                                        <option>	Portugais	</option>
                                        <option>	Roumain	</option>
                                        <option>	Russe	</option>
                                        <option>	Sénégalais	</option>
                                        <option>	Serbe	</option>
                                        <option>	Serbo-croate	</option>
                                        <option>	Singapour	</option>
                                        <option>	Slovaque	</option>
                                        <option>	Soviétique	</option>
                                        <option>	Sri-lankais	</option>
                                        <option>	Sud-Africain	</option>
                                        <option>	Sud-Coréen	</option>
                                        <option>	Suédois	</option>
                                        <option>	Suisse	</option>
                                        <option>	Syrien	</option>
                                        <option>	Tadjik	</option>
                                        <option>	Taïwanais	</option>
                                        <option>	Tchadien	</option>
                                        <option>	Tchèque	</option>
                                        <option>	Thaïlandais	</option>
                                        <option>	Tunisien	</option>
                                        <option>	Turc	</option>
                                        <option>	Ukrainien	</option>
                                        <option>	Uruguayen	</option>
                                        <option>	Vénézuélien	</option>
                                        <option>	Vietnamien	</option>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Ville</label>
                                    <select class="form-control select2" id="ville" required="required" style="width: 100%;">
                                        <option></option>
                                        <?php echo $getVille; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Adresse</label>
                                    <textarea class="form-control" required="required" id="adresse" rows="5" id="adresse"></textarea>
                                </div><!-- /.form-group -->
                            </div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Parents</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group">
                                    <label>Nom et Prenom Mère</label>
                                    <input type="text" id="nomprenommere" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Nom et Prenom père</label>
                                    <input type="text" class="form-control" required="required" id="nomprenompere" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Profession père</label>
                                    <select class="form-control select2" id="professpere" required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getProfession; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Profession mère</label>
                                    <select class="form-control select2" id="professmere" required="required" style="width: 100%;">
                                        <option selected="selected"></option>
                                        <?php echo $getProfession; ?>
                                    </select>
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tél mère</label>
                                    <input type="text" id="telmere" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Tél père</label>
                                    <input type="text" id="telpere" required="required" class="form-control" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mail Mère</label>
                                    <input type="text" id="mailmere" class="form-control" required="required" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Mail Père</label>
                                    <input type="text" id="mailpere" class="form-control" required="required" />
                                </div><!-- /.form-group -->
                                <div class="form-group">
                                    <label>Adresse Parents</label>
                                    <textarea class="form-control"  rows="5" id="adresseparents" required="required" ></textarea>
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
                                        <label>Obsérvations</label>
                                        <textarea class="form-control" rows="5" id="observations"></textarea>
                                    </div><!-- /.form-group -->
                                
                                
                            </div>
                        </div>
                    </div>
<div class="col-md-12">
                        
                    </div>
                   
                </div><!--row -->
                <div class="row">
                    <div class="col-md-6 col-lg-offset-3">
                        <div class="alert alert-danger alert-dismissable erreur" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                            Les informations sont incorrect !!
                        </div>
                    </div>
                </div>
                <div class="row"><div class="col-md-offset-11"><button type="button" id="submitsupercommercial" class="btn btn-primary submit">Valider</button></div></div>
            </form>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "content/modules/footer-inc.php"; ?>
    <!-- Page script -->
    <script>


        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();

            //Datemask dd/mm/yyyy
            $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
            //Datemask2 mm/dd/yyyy
            $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
            //Money Euro
            $("[data-mask]").inputmask();

            //Date range picker
            $('#reservation').daterangepicker();
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
            //Date range as a button

            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            //Red color scheme for iCheck
            $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                checkboxClass: 'icheckbox_minimal-red',
                radioClass: 'iradio_minimal-red'
            });
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass: 'iradio_flat-green'
            });

            //Colorpicker
            $(".my-colorpicker1").colorpicker();
            //color picker with addon
            $(".my-colorpicker2").colorpicker();

            //Timepicker
            $(".timepicker").timepicker({
                showInputs: false
            });
        });
    </script>
    
     <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
      $( "#datecontact, #datenaissance" ).datepicker({dateFormat: "yy-mm-dd"});
  $( function() {
    $("#datecontact, #datenaissance").datepicker();
      
  });
  </script>
</body>
</html>
