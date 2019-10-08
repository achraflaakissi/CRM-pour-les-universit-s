<?php
if(count($_POST)>0 && !is_null($_POST['civilite']) && !is_null($_POST['nom']) && !is_null($_POST['prenom']) && !is_null($_POST['datenaissance']) && !is_null($_POST['lieunaissance']) && !is_null($_POST['email']) && !is_null($_POST['gsm']) && !is_null($_POST['nationalite']) && !is_null($_POST['telephone']) && !is_null($_POST['ville']) && !is_null($_POST['adresse']) && !is_null($_POST['nationalite']) && !is_null($_POST['natureconatct']) && !is_null($_POST['formationdemande']) && !is_null($_POST['visite']) &&  !is_null($_POST['niveaudemande']) && !is_null($_POST['datecontact']))
{
    include_once('class.contact-direct.php');
    $cd = new ContactDirect();

    //print_r($_POST);exit;
    foreach($_POST as $key=>$va)
    {
        if(is_null($_POST[$key]) || $_POST[$key]=='')
        {
            $_POST[$key]=null;
        }
    }
    $cd->setCivilite($_POST['civilite']);
    $cd->setNom($_POST['nom']);
    $cd->setPrenom($_POST['prenom']);
    $cd->setDateNaissance($_POST['datenaissance']);
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
    $cd->setProfessionpere($_POST['professionpere']);
    $cd->setProfessionmere($_POST['professionmere']);
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
    $cd->setReçuPar($_POST['recupar']);
    $cd->setObservation($_POST['observations']);
    $cd->setLangue1($_POST['langue1']);
    $cd->setLangue2($_POST['langue2']);
    $cd->setLangue3($_POST['langue3']);
    $cd->setVisite($_POST['visite']);
    $cd->setLyceePublic($_POST['lyceepublic']);
    $cd->setLyceePrive($_POST['lyceeprive']);
    $cd->setLyceeMission($_POST['lyceemission']);
    $cd->setContactSuiteA($_POST['contacsuitea']);
    $cd->setTest($_POST['test']);
    $cd->setDateTest($_POST['datetest']);
    $cd->setMarche($_POST['marche']);
    $cd->setAnneeUniv($_POST['anneeuniv']);

    if($cd->add())
    {
        echo 'oui';
    }
    else
    {
        echo 'non';
    }

}