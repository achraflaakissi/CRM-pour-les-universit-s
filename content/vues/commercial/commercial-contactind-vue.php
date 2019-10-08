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
if ($_SESSION['user']['profile'] == sha1(md5('commercial' . $salt)) or $_SESSION['user']['profile'] == sha1(md5('saisie' . $salt))) {
require('content/controller/class.remlpiration.php');
require('content/controller/class.contact-indirecte.php');
$contact_indirecte = new contact_indirecte();
$rempisage = new rempliration();

if (isset($_POST['transferer']) && !empty($_POST['transferer'])) {
    header('Content-Type: application/json');
    $return = $contact_indirecte->TransfererContact($_POST['transferer'], $_SESSION['user']['id']);
    echo $return;
    exit;
}
$ci = new contact_indirecte();
if (isset($_POST['civilite'])) {
    foreach ($_POST as $key => $va) {
        if (is_null($_POST[$key]) || $_POST[$key] == '') {
            $_POST[$key] = null;
        }
    }//64
    $ci->setId($_GET['id']);
    $ci->setCivilite($_POST['civilite']);
    $ci->setInteressePar($_POST['interessepar']);
    $ci->setNom($_POST['nom']);
    $ci->setDate($_POST['date']);
    $ci->setPrenom($_POST['prenom']);
    $ci->setDateNaissance($_POST['datenaissance']);
    $ci->setStatutContact($_POST['stautcontact']);
    $ci->setEmail($_POST['email']);
    $ci->setCategorie($_POST['categorie']);
    $ci->setDiplomeObtenu($_POST['diplomesobtenus']);
    $ci->setNiveauetudes($_POST['niveauetudes']);
    $ci->setBranche($_POST['branche']);
    $ci->setGsm($_POST['gsm']);
    $ci->setVille($_POST['ville']);
    $ci->setAdresse($_POST['adresse']);
    $ci->setGroupeFormation($_POST['groupe_foramation']);
    $ci->setFormationDemmandee($_POST['formationdemande']);
    $ci->setTel($_POST['telephone']);
    $ci->setProfessionpere($_POST['professionpere']);
    $ci->setProfessionmere($_POST['professionmere']);
    $ci->setTelMere($_POST['telmere']);
    $ci->setTelPere($_POST['telpere']);
    $ci->setMailMere($_POST['mailmere']);
    $ci->setMailPere($_POST['mailpere']);
    $ci->setEtablissement($_POST['etablissement']);
    $ci->setNatureContact($_POST['natureconatct']);
    $ci->setReçuPar($_POST['recupar']);
    $ci->setLyceePublic($_POST['lyceepublic']);
    $ci->setLyceePrive($_POST['lyceeprive']);
    $ci->setLyceeMission($_POST['lyceemission']);
    $ci->setMarche($_POST['marche']);
    $ci->setAnneeUniv($_POST['anneeuniv']);
    $ci->setExperienceprofessionelle($_POST['experprof']);
    $ci->setObservations($_POST['observations']);
    $ci->setCP($_POST['cp']);
    $ci->setVilleLycee($_POST['villelycee']);
    $ci->setAnneeEtude($_POST['anneeetude']);
    $ci->setAnneeObtention($_POST['anneeobtention']);
    $ci->setLycee($_POST['lycee']);
    $ci->setLieuNaissance($_POST['lieunaissance']);
    $ci->sets1tc($_POST["s1tc"]);
    $ci->sets2tc($_POST["s2tc"]);
    $ci->setannuelletc($_POST["annuelletc"]);
    $ci->sets1bac1($_POST["s1bac1"]);
    $ci->sets2bac1($_POST["s2bac1"]);
    $ci->setannuellebac1($_POST["annuellebac1"]);
    $ci->setnoteregional($_POST["noteregional"]);
    $ci->sets1bac2($_POST["s1bac2"]);
    $ci->sets2bac2($_POST["s2bac2"]);
    $ci->setannuellebac2($_POST["annuellebac2"]);
    $ci->setnotenational($_POST["notenational"]);
    $ci->setnotegenerale($_POST["notegenerale"]);
    $ci->setID($_GET['id']);
    $ci->MettreAjour();exit;
}
require('content/controller/class.Remplissage.php');
$rempisage = new Remplissage();
$getLyceeEtablissement = $rempisage->getFunctions("getLyceeEtablissement", $_GET['id'],'I');
$getProfessionpere = $rempisage->getFunctions("getProfessionpere", $_GET['id'],'I');
$getProfessionmere = $rempisage->getFunctions("getProfessionmere", $_GET['id'],'I');
$getFormationDemander = $rempisage->getFunctions("getFormationDemander", $_GET['id'],'I');
$getGroupeFormation = $rempisage->getFunctions("getGroupeFormation", $_GET['id'],'I');
$getNiveauEtudes = $rempisage->getFunctions("getNiveauEtudes", $_GET['id'],'I');
$getSeriebac = $rempisage->getFunctions("getSeriebac", $_GET['id'],'I');
$getDiplomesObtenus = $rempisage->getFunctions("getDiplomesObtenus", $_GET['id'],'I');
$getRecuPar = $rempisage->getFunctions("getRecuPar", $_GET['id'],'I');
$getVille = $rempisage->getFunctions("getVille", $_GET['id'],'I');
$getNatureContact = $rempisage->getFunctions("getNatureContact", $_GET['id'],'I');
$getPays = $rempisage->getFunctions("getPays", $_GET['id'],'I');
$test = $rempisage->getFunctions('gettest', $_GET['id'],'I');
$getinscriptionrecupar = $rempisage->getFunctions("getinscriptionrecupar", $_GET['id'],'I');
$langue1 = $rempisage->getFunctions('getlangue1', $_GET['id'],'I');
$langue2 = $rempisage->getFunctions('getlangue2', $_GET['id'],'I');
$langue3 = $rempisage->getFunctions('getlangue3', $_GET['id'],'I');
$getetetatdossier = $rempisage->getFunctions("getetetatdossier", $_GET['id'],'I');
$getExperience_professionelle= $rempisage->getFunctions("getExperience_professionelle", $_GET['id'],'I');
$agent = $rempisage->getFunctions('getAgent', $_GET['id'],'I');
$etatedossier = $rempisage->getFunctions('getetetatdossier', $_GET['id'],'I');
$niveaudemade = $rempisage->getFunctions('getNiveauDemande', $_GET['id'],'I');
$contactsuitea = $rempisage->getFunctions('getcontactsuitea', $_GET['id'],'I');
$marche = $rempisage->getFunctions('getMarche', $_GET['id'],'I');
$anneuniv = $rempisage->getFunctions('getAnneeUniv', $_GET['id'],'I');
$anneObtention = $rempisage->getFunctions('getAnneeObtention', $_GET['id'],'I');
$Contactsuivipar = $rempisage->getFunctions('getContactsuivipar', $_GET['id'],'I');
$nationalite = $rempisage->getFunctions('getPays', $_GET['id'],'I');
$getanneetude = $rempisage->getFunctions('getanneetude', $_GET['id'],'I');
$getlieunaissance = $rempisage->getFunctions('getlieunaissance', $_GET['id'],'I');
$getVillelycee = $rempisage->getFunctions('getVillelycee', $_GET['id'],'I');
$getbanche = $rempisage->getFunctions('getbanche',$_GET['id'],'I');
$gets1tc = $rempisage->getFunctions('s1tc',$_GET['id'],'I');
$gets2tc = $rempisage->getFunctions('s2tc',$_GET['id'],'I');
$getannuelletc = $rempisage->getFunctions('annuelletc',$_GET['id'],'I');
$gets1bac1 = $rempisage->getFunctions('s1bac1',$_GET['id'],'I');
$gets2bac1 = $rempisage->getFunctions('s2bac1',$_GET['id'],'I');
$getannuellebac1 = $rempisage->getFunctions('annuellebac1',$_GET['id'],'I');
$getnoteregional = $rempisage->getFunctions('noteregional',$_GET['id'],'I');
$gets1bac2 = $rempisage->getFunctions('s1bac2',$_GET['id'],'I');
$gets2bac2 = $rempisage->getFunctions('s2bac2',$_GET['id'],'I');
$getannuellebac2 = $rempisage->getFunctions('annuellebac2',$_GET['id'],'I');
$getnotenational = $rempisage->getFunctions('notenational',$_GET['id'],'I');
$getnotegenerale = $rempisage->getFunctions('notegenerale',$_GET['id'],'I');


include('content/config.php');
$con = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
$query = $con->query('SELECT  `Civilite`, `Nom`, `Prenom`, `Tel`, `E-Mail`, Interesse_Par, `Profession_Mere`,Adresse,`Profession_Pere`,CP, `Mail_Mere`, `Mail_Pere`, `Tel_Mere`, `Tel_Pere`, `Annee_Etude`, `Annee_Univ`, `Formation_Demmandee`, `Ville`, `Date`, `Groupe_Formation`, `Etape_Phoning2`, `Date_de_Naissance`, `Nature_de_Contact`, `GSM`, `Etape_Phoning`, `Etape_Phoning3`, `Marche`, `Zone`, `Ville_Lycee`, `Etape_Phoning1`, `Niveau_des_etudes`, `Etablissement`, `Lieu_de_Naissance`, `Branche`, `Observations`, `Lycee_Public`,`Lycee`,  `Observation_Chef_de_produit`, `Date_Dern_Phoning`, `Etape_Phoning8`, `TA8`, `Date_Phoning9`, `Diplome_Obtenu`, `Date_Saisie`, `Lycee_Prive`, `Date_Phoning1`, `Dern_Campagne`, `Etape_Phoning9`, `TA9`, `Date_Phoning10`, `Annee_Obtention`, `Heure_Saisie`, `Lycee_Mission`, `Date_Phoning2`, `TA`, `Etape_Phoning10`, `TA10`, `TA1`, `Experience_professionelle`, `Formation`, `StatutContact`, `Date_Phoning3`, `E-mail-Phoning`, `Date_Phoning6`, `Campagne1`, `TA2`, `Reçu_par`, `Transfert_CD`, `Date_Phoning4`, `A_ne_pas_filtrer`, `Date_Phoning7`, `Campagne2`, `TA3`, `Operateur_Saisie`, `Abandon`, `Date_Phoning5`, `Etape_Phoning6`, `Date_Phoning8`, `Campagne3`, `TA4`, `Categorie`, `Source_Contact`  FROM `contact_indirect` WHERE md5(id)=\'' . $_GET['id'] . '\'');
$contc = $query->fetchAll();

include "content/modules/header-inc.php";
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-4 alert alert-success" style="display: none;" id="etatmodif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-offset-3">
                    <div class="alert alert-danger alert-dismissable erreur">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Les informations sont incorrect !!
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Contact Indirect :</h2>

                    <div class="box-tools">
                        <button class="btn btn-success btn-sm" id="transferer"
                                onclick="transferer('<?php echo $_GET['id']; ?>');">Transfert Vers Contact
                            Direct
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-4">

                        <div class="box-header with-border">
                            <h3 class="box-title">Etudiant :</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <!-- Horizontal Form -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <label for="civilite">Civilité : </label>
                                <select class="form-control select2" name="civilite" id="civilite"
                                        style="width: 100%;">
                                    <option <?php if ($contc[0]['Civilite'] == 'M.') echo 'selected="selected"'; ?> >
                                        M.
                                    </option>
                                    <option <?php if ($contc[0]['Civilite'] == 'Melle/Mme') echo 'selected="selected"'; ?>>
                                        Melle/Mme
                                    </option>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="nom">Nom</label>
                                <input class="form-control" id="nom" name="nom"
                                       value="<?php echo $contc[0]['Nom']; ?>" placeholder="Nom" type="text">
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="prenom">Prenom</label>
                                <input class="form-control" id="prenom"
                                       value="<?php echo $contc[0]['Prenom']; ?>" name="prenom"
                                       placeholder="Prenom" type="text">
                            </div>
<div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="gsm">GSM</label>
                                <input class="form-control" id="gsm" name="gsm" placeholder="GSM"
                                       value="<?php echo $contc[0]['GSM']; ?>" type="text">
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="tel">Tel</label>
                                <input class="form-control" id="tel" name="tel" placeholder="Tel"
                                       value="<?php echo $contc[0]['Tel']; ?>" type="text">
                            </div>
                            
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="email">E-mail</label>
                                <input class="form-control" id="email" name="email" placeholder="Email"
                                       value="<?php echo $contc[0]['E-Mail']; ?>" type="text">
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="marche">Marché</label>
                                <select id="marche" name="marche" class="form-control select2 "
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $marche; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="lycee">Lycee / Etablissement</label>
                                <input  id="lycee" name="lycee" class="form-control"  value="<?php echo $contc[0]['Lycee']; ?>" style="width: 100%;">
                                <!--<select id="lycee" name="lycee" class="form-control select2 "
                                        style="width: 100%;">
                                    <?php echo $getLyceeEtablissement; ?>
                                </select>-->
                            </div>
                            <div class="form-group" style="width: 100% !important; font-size: 12px !important;">
                                <label for="professeionpere">Profession pere</label>
                                <input type="text" class="form-control" id="professeionpere"
                                        name="professeionpere" value="<?php echo $contc[0]['Profession_Pere']; ?>" style="width: 100%;">
                                <!-- <select class="form-control select2 " id="professeionpere"
                                        name="professeionpere" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getProfessionpere; ?>
                                </select> -->
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="professeionmere">Profession mere</label>
                                <input type="text" class="form-control" id="professeionmere"
                                        name="professeionpere" value="<?php echo $contc[0]['Profession_Mere']; ?>" style="width: 100%;">
                                <!-- <select class="form-control select2 " id="professeionmere"
                                        name="professeionmere" style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getProfessionmere; ?>
                                </select> -->
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="telpere">Tel pere</label>
                                <input class="form-control" id="telpere"
                                       value="<?php echo $contc[0]['Tel_Pere']; ?>" name="telpere"
                                       placeholder="Tel pere" type="text">
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="telmere">Tel mere</label>
                                <input class="form-control" id="telmere"
                                       value="<?php echo $contc[0]['Tel_Mere']; ?>" name="telmere"
                                       placeholder="Tel mere" type="text">
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="mailpere">Mail pere</label>
                                <input class="form-control" id="mailpere" name="mailpere"
                                       value="<?php echo $contc[0]['Mail_Pere']; ?>" placeholder="mailpere"
                                       type="email">
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="mailmere">Mail mere</label>
                                <input class="form-control" id="mailmere" name="mailmere"
                                       value="<?php echo $contc[0]['Mail_Mere']; ?>" placeholder="mail mere"
                                       type="email">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box-header with-border">
                            <h3 class="box-title">Divers</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="date" class="text-danger">Date</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" id="date" name="date" type="date"
                                           value="<?php echo $contc[0]['Date']; ?>">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label class="text-danger">Groupe formation</label>
                                <select class="form-control select2" name="groupe_foramation"
                                        id="groupe_foramation">
                                    <option selected="selected"></option>
                                    <?php echo $getGroupeFormation; ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group" style="width: 100% !important;">
                                <label for="formationdemandee" class="text-danger">Formation demandee</label>
                                <select id="formationdemandee" name="formationdemandee"
                                        class="form-control select2 " style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getFormationDemander; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="anneeuniver">Année universitaire</label>
                                <select id="anneeuniver" name="anneeuniver" class="form-control select2">
                                    <option></option>
                                    <?php echo $anneuniv; ?>
                                </select>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group" style="width: 100% !important;">
                                <label for="anneeetude">Annee Etude</label>
                                <select id="anneeetude" name="anneeetude" class="form-control select2"
                                        style="width: 100%;">
                                    <option></option>
                                    <?php echo $getanneetude; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="ville">Ville</label>
                                <select id="ville" name="ville" class="form-control select2 "
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getVille; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="datenaissance">Date Naissance</label>

                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input class="form-control" id="datenaissance"
                                           value="<?php echo $contc[0]['Date_de_Naissance']; ?>" type="date">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="lieunaissance">Lieu de naissance</label>
                                <select id="lieunaissance" name="lieunaissance" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getlieunaissance; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                        <textarea class="form-control" rows="5" name="adresse"
                                                  id="adresse"> <?php echo $contc[0]['Adresse']; ?></textarea>
                            </div>


                            <div class="form-group" style="width: 100% !important;">
                                <label for="categorie">Cotegorie</label>
                                <input id="categorie" name="categorie" placeholder="Cotegorie"
                                       value="<?php echo $contc[0]['Categorie']; ?>" class="form-control ">
                            </div>
                            <!-- /.form-group -->

                            <div class="form-group" style="width: 100% !important;">
                                <label for="naturecontact">Nature de contact</label>
                                <select id="naturecontact" name="naturecontact" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getNatureContact; ?>
                                </select>
                            </div>


                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="cp">CP</label>
                                <input id="cp" name="cp" placeholder="CP ..." class="form-control "
                                       value="<?php echo $contc[0]['CP']; ?>" style="width: 100%;">
                            </div>

                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label>
                                    <input id="teyp1"
                                           name="type[]" <?php if ($contc[0]['Lycee_Public'] == '1') echo 'checked'; ?>
                                           value="public" type="checkbox"> Public
                                </label>&nbsp;&nbsp;
                                <label>
                                    <input id="teyp2"
                                           name="type[]" <?php if ($contc[0]['Lycee_Prive'] == '1') echo 'checked'; ?>
                                           value="privee" type="checkbox"> Privee
                                </label>&nbsp;&nbsp;
                                <label>
                                    <input id="teyp3"
                                           name="type[]" <?php if ($contc[0]['Lycee_Mission'] == '1') echo 'checked'; ?>
                                           value="mission" type="checkbox"> Mission
                                </label>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="ville_lycee">Ville Lycee</label>
                                <select name="ville_lycee" id="ville_lycee" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getVillelycee; ?>
                                </select>
                            </div>
                            <div class="input-group input-group-sm" style="width: 100% !important;">
                                <label for="interessepar">Interesse Par </label>
                                <input placeholder="Interesse Par" id="interessepar" name="interessepar"
                                       value="<?php echo $contc[0]['Interesse_Par']; ?>" class="form-control "
                                       style="width: 100%;">
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <div class="col-md-4">
                        <div class="box-header with-border">
                            <h3 class="box-title">Cursus des Etudes :</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group" style="width: 100% !important;">
                                <label for="niveauetudes">Niveau des etudes</label>
                                <select id="niveauetudes" name="niveauetudes" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getNiveauEtudes; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="branche">Branche</label>
                                <select id="branche" name="branche" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getbanche; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="diplomeobtenu">Diplome obtenu</label>
                                <select class="form-control select2" id="diplomeobtenu" name="diplomeobtenu"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getDiplomesObtenus; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="anneeobtention">Annee obtention</label>
                                <select id="anneeobtention" name="anneeobtention" class="form-control select2"
                                        style="width: 100%;">
                                    <option></option>
                                    <?php echo $anneObtention ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="experienceprof">Experience professionelle</label>
                                <select id="experienceprof" name="experienceprof" class="form-control select2"
                                        style="width: 100%;">
                                    <?php echo $getExperience_professionelle; ?>
                                </select>
                            </div>
                            <div class="form-group" style="width: 100% !important;">
                                <label for="recupar">Recu par</label>
                                <select id="recupar" name="recupar" class="form-control select2"
                                        style="width: 100%;">
                                    <option selected="selected"></option>
                                    <?php echo $getRecuPar; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="observations">Observations</label>
                                        <textarea class="form-control" rows="5" id="observations"
                                                  name="observations"><?php echo $contc[0]['Observations']; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
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
                                        <input type="text" class="form-control" value="<?php echo $gets1tc; ?>" id="s1tc" name="s1tc" placeholder="Note S1 TC " />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $gets2tc; ?>" size="45" id="s2tc" name="s2tc" placeholder="Note S2 TC " />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $getannuelletc; ?>" size="45" id="annuelletc" name="annuelletc" placeholder="Note Annuelle TC" />
                                    </td>
                                    <td align="center">-</td>
                                </tr>
                                <tr>
                                    <td>
                                        1 Année Bac
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $gets1bac1; ?>"  id="s1bac1" name="s1bac1" placeholder="Note S1 1 Bac " />
                                    </td>
                                    <td>
                                        <input type="text" placeholder="Note S2 1 Bac " value="<?php echo $gets2bac1; ?>" size="45" class="form-control" id="s2bac1" name="s2bac1" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" size="45" value="<?php echo $getannuellebac1; ?>"  id="annuellebac1" name="annuellebac1" placeholder="Note Annuelle 1 Année Bac" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" size="45" value="<?php echo $getnoteregional; ?>"  id="noteregional" name="noteregional" placeholder="Note Regional" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>2 Année Bac</td>
                                    <td>
                                        <input type="text" placeholder="Note S1 2 Bac "value="<?php echo $gets1bac2; ?>" class="form-control" id="s1bac2" name="s1bac2" />
                                    </td>
                                    <td>
                                        <input  placeholder="Note S2 2 Bac "  value="<?php echo $gets2bac2; ?>" type="text" size="45" class="form-control" id="s2bac2" name="s2ac2" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $getannuellebac2; ?>" size="45" id="annuellebac2" name="annuellebac2" placeholder="Note Annuelle 2 Année Bac" />
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" value="<?php echo $getnotenational; ?>" size="45" id="notenational" name="notenational" placeholder="Note National" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Note Générale du  Bac
                                    </td>
                                    <td colspan="1" >
                                        <input type="text" class="form-control" value="<?php echo $getnotegenerale; ?>"  id="notegenerale" name="notegenerale"  placeholder="Note Générale du Bac"/>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-offset-3">
                    <div class="alert alert-danger alert-dismissable erreur">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Les informations sont incorrect !!
                    </div>
                </div>
            </div>
        </section>
        <div class="box-footer">
            <button class="btn btn-primary pull-right" onclick="MettreAjour('I');" > Mettre à jour</button>
        </div>
    </div>
</div>

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
                                <label>Rendez-Vous Inscription :</label>
                                <select class="form-control " id="inscription_rdv" >
                                    <option value="">--</option>
                                    <option value="0">Non</option>
                                    <option value="1">Oui</option>
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

include "content/modules/footer-inc.php";
}
}


?>

