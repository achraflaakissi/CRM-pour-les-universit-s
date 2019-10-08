<?php
ini_set('memory_limit', '-1');
class contact_indirecte
{
    private $Civilite;
    private $ID;
    private $EMail;
    private $EtapePhoning;
    private $EtapePhoning1;
    private $EtapePhoning2;
    private $EtapePhoning3;
    private $FormationDemmandee;
    private $GroupeFormation;
    private $Marche;
    private $Niveauetudes;
    private $DateNaissance;
    private $Zone;
    private $Etablissement;
    private $NatureContact;
    private $VilleLycee;
    private $AnneeUniv;
    private $Date;
    private $Ville;
    private $Nom;
    private $Prenom;
    private $Tel;
    private $TelPere;
    private $GSM;
    private $TelMere;
    private $LieuNaissance;
    private $Adresse;
    private $CP;
    private $AnneeEtude;
    private $Branche;
    private $DiplomeObtenu;
    private $AnneeObtention;
    private $Experienceprofessionelle;
    private $Reçupar;
    private $OperateurSaisie;
    private $Observations;
    private $DateSaisie;
    private $HeureSaisie;
    private $Formation;
    private $TransfertCD;
    private $Abandon;
    private $Categorie;
    private $ProfessionPere;
    private $ProfessionMere;
    private $LyceePublic;
    private $LyceePrive;
    private $LyceeMission;
    private $StatutContact;
    private $MailPere;
    private $MailMere;
    private $SourceContact;
    private $InteressePar;
    private $EtapePhoning4;
    private $EtapePhoning5;
    private $DatePhoning1;
    private $DatePhoning2;
    private $DatePhoning3;
    private $DatePhoning4;
    private $DatePhoning5;
    private $DateDernPhoning;
    private $DernCampagne;
    private $TA;
    private $EmailPhoning;
    private $Anepasfiltrer;
    private $EtapePhoning6;
    private $EtapePhoning7;
    private $EtapePhoning8;
    private $EtapePhoning9;
    private $EtapePhoning10;
    private $DatePhoning6;
    private $DatePhoning7;
    private $DatePhoning8;
    private $DatePhoning9;
    private $DatePhoning10;
    private $TA1;
    private $TA2;
    private $TA3;
    private $TA4;
    private $TA5;
    private $TA6;
    private $TA7;
    private $TA8;
    private $TA9;
    private $TA10;
    private $Campagne1;
    private $Campagne2;
    private $Campagne3;
    private $Campagne4;
    private $Campagne5;
    private $Campagne6;
    private $Campagne7;
    private $Campagne8;
    private $Campagne9;
    private $Campagne10;
    private $Script1;
    private $Script2;
    private $Script3;
    private $Script4;
    private $Script5;
    private $Script6;
    private $Script7;
    private $Script8;
    private $Script9;
    private $Script10;
    private $Valide;
    private $Lycee;
    private $EmailCmp;
    private $ContactSuiviPar;
    private $object;
    private $s1tc;
    private $s2tc;
    private $annuelletc;
    private $s1bac1;

    /**
     * @return mixed
     */
    public function getS1tc()
    {
        return $this->s1tc;
    }

    /**
     * @param mixed $s1tc
     */
    public function setS1tc($s1tc)
    {
        $this->s1tc = $s1tc;
    }

    /**
     * @return mixed
     */
    public function getS2tc()
    {
        return $this->s2tc;
    }

    /**
     * @param mixed $s2tc
     */
    public function setS2tc($s2tc)
    {
        $this->s2tc = $s2tc;
    }

    /**
     * @return mixed
     */
    public function getAnnuelletc()
    {
        return $this->annuelletc;
    }

    /**
     * @param mixed $annuelletc
     */
    public function setAnnuelletc($annuelletc)
    {
        $this->annuelletc = $annuelletc;
    }

    /**
     * @return mixed
     */
    public function getS1bac1()
    {
        return $this->s1bac1;
    }

    /**
     * @param mixed $s1bac1
     */
    public function setS1bac1($s1bac1)
    {
        $this->s1bac1 = $s1bac1;
    }

    /**
     * @return mixed
     */
    public function getS2bac1()
    {
        return $this->s2bac1;
    }

    /**
     * @param mixed $s2bac1
     */
    public function setS2bac1($s2bac1)
    {
        $this->s2bac1 = $s2bac1;
    }

    /**
     * @return mixed
     */
    public function getAnnuellebac1()
    {
        return $this->annuellebac1;
    }

    /**
     * @param mixed $annuellebac1
     */
    public function setAnnuellebac1($annuellebac1)
    {
        $this->annuellebac1 = $annuellebac1;
    }

    /**
     * @return mixed
     */
    public function getNoteregional()
    {
        return $this->noteregional;
    }

    /**
     * @param mixed $noteregional
     */
    public function setNoteregional($noteregional)
    {
        $this->noteregional = $noteregional;
    }

    /**
     * @return mixed
     */
    public function getS1bac2()
    {
        return $this->s1bac2;
    }

    /**
     * @param mixed $s1bac2
     */
    public function setS1bac2($s1bac2)
    {
        $this->s1bac2 = $s1bac2;
    }

    /**
     * @return mixed
     */
    public function getS2bac2()
    {
        return $this->s2bac2;
    }

    /**
     * @param mixed $s2bac2
     */
    public function setS2bac2($s2bac2)
    {
        $this->s2bac2 = $s2bac2;
    }

    /**
     * @return mixed
     */
    public function getAnnuellebac2()
    {
        return $this->annuellebac2;
    }

    /**
     * @param mixed $annuellebac2
     */
    public function setAnnuellebac2($annuellebac2)
    {
        $this->annuellebac2 = $annuellebac2;
    }

    /**
     * @return mixed
     */
    public function getNotenational()
    {
        return $this->notenational;
    }

    /**
     * @param mixed $notenational
     */
    public function setNotenational($notenational)
    {
        $this->notenational = $notenational;
    }

    /**
     * @return mixed
     */
    public function getNotegenerale()
    {
        return $this->notegenerale;
    }

    /**
     * @param mixed $notegenerale
     */
    public function setNotegenerale($notegenerale)
    {
        $this->notegenerale = $notegenerale;
    }
    private $s2bac1;
    private $annuellebac1;
    private $noteregional;
    private $s1bac2;
    private $s2bac2;
    private $annuellebac2;
    private $notenational;
    private $notegenerale;


/**
     * @return mixed
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param mixed $EmailCmp
     */
    public function setObject($Object)
    {
        $this->object= $Object;
    }

/**
     * @return mixed
     */
    public function getContactSuiviPar()
    {
        return $this->ContactSuiviPar;
    }

    /**
     * @param mixed $EmailCmp
     */
    public function setContactSuiviPar($ContactSuiviPar)
    {
        $this->ContactSuiviPar= $ContactSuiviPar;
    }

    /**
     * @return mixed
     */
    public function getEmailCmp()
    {
        return $this->EmailCmp;
    }

    /**
     * @param mixed $EmailCmp
     */
    public function setEmailCmp($EmailCmp)
    {
        $this->EmailCmp = $EmailCmp;
    }

    /**
     * @return mixed
     */
    public function getLycee()
    {
        return $this->Lycee;
    }

    /**
     * @param mixed $Lycee
     */
    public function setLycee($Lycee)
    {
        $this->Lycee = $Lycee;
    }

    /**
     * @return mixed
     */
    public function getValide()
    {
        return $this->Valide;
    }

    /**
     * @param mixed $Valide
     */
    public function setValide($Valide)
    {
        $this->Valide = $Valide;
    }

    /**
     * @return mixed
     */
    public function getScript1()
    {
        return $this->Script1;
    }

    /**
     * @param mixed $Script1
     */
    public function setScript1($Script1)
    {
        $this->Script1 = $Script1;
    }

    /**
     * @return mixed
     */
    public function getScript2()
    {
        return $this->Script2;
    }

    /**
     * @param mixed $Script2
     */
    public function setScript2($Script2)
    {
        $this->Script2 = $Script2;
    }

    /**
     * @return mixed
     */
    public function getScript3()
    {
        return $this->Script3;
    }

    /**
     * @param mixed $Script3
     */
    public function setScript3($Script3)
    {
        $this->Script3 = $Script3;
    }

    /**
     * @return mixed
     */
    public function getScript4()
    {
        return $this->Script4;
    }

    /**
     * @param mixed $Script4
     */
    public function setScript4($Script4)
    {
        $this->Script4 = $Script4;
    }

    /**
     * @return mixed
     */
    public function getScript5()
    {
        return $this->Script5;
    }

    /**
     * @param mixed $Script5
     */
    public function setScript5($Script5)
    {
        $this->Script5 = $Script5;
    }

    /**
     * @return mixed
     */
    public function getScript6()
    {
        return $this->Script6;
    }

    /**
     * @param mixed $Script6
     */
    public function setScript6($Script6)
    {
        $this->Script6 = $Script6;
    }

    /**
     * @return mixed
     */
    public function getScript7()
    {
        return $this->Script7;
    }

    /**
     * @param mixed $Script7
     */
    public function setScript7($Script7)
    {
        $this->Script7 = $Script7;
    }

    /**
     * @return mixed
     */
    public function getScript8()
    {
        return $this->Script8;
    }

    /**
     * @param mixed $Script8
     */
    public function setScript8($Script8)
    {
        $this->Script8 = $Script8;
    }

    /**
     * @return mixed
     */
    public function getScript9()
    {
        return $this->Script9;
    }

    /**
     * @param mixed $Script9
     */
    public function setScript9($Script9)
    {
        $this->Script9 = $Script9;
    }

    /**
     * @return mixed
     */
    public function getScript10()
    {
        return $this->Script10;
    }

    /**
     * @param mixed $Script10
     */
    public function setScript10($Script10)
    {
        $this->Script10 = $Script10;
    }

    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->Civilite;
    }

    /**
     * @param mixed $Civilite
     */
    public function setCivilite($Civilite)
    {
        $this->Civilite = $Civilite;
    }

    /**
     * @return mixed
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * @param mixed $ID
     */
    public function setID($ID)
    {
        $this->ID = $ID;
    }
    /**
     * @return mixed
     */
    public function getEMail()
    {
        return $this->EMail;
    }

    /**
     * @param mixed $EMail
     */
    public function setEMail($EMail)
    {
        $this->EMail = $EMail;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning()
    {
        return $this->EtapePhoning;
    }

    /**
     * @param mixed $EtapePhoning
     */
    public function setEtapePhoning($EtapePhoning)
    {
        $this->EtapePhoning = $EtapePhoning;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning1()
    {
        return $this->EtapePhoning1;
    }

    /**
     * @param mixed $EtapePhoning1
     */
    public function setEtapePhoning1($EtapePhoning1)
    {
        $this->EtapePhoning1 = $EtapePhoning1;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning2()
    {
        return $this->EtapePhoning2;
    }

    /**
     * @param mixed $EtapePhoning2
     */
    public function setEtapePhoning2($EtapePhoning2)
    {
        $this->EtapePhoning2 = $EtapePhoning2;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning3()
    {
        return $this->EtapePhoning3;
    }

    /**
     * @param mixed $EtapePhoning3
     */
    public function setEtapePhoning3($EtapePhoning3)
    {
        $this->EtapePhoning3 = $EtapePhoning3;
    }

    /**
     * @return mixed
     */
    public function getFormationDemmandee()
    {
        return $this->FormationDemmandee;
    }

    /**
     * @param mixed $FormationDemmandee
     */
    public function setFormationDemmandee($FormationDemmandee)
    {
        $this->FormationDemmandee = $FormationDemmandee;
    }

    /**
     * @return mixed
     */
    public function getGroupeFormation()
    {
        return $this->GroupeFormation;
    }

    /**
     * @param mixed $GroupeFormation
     */
    public function setGroupeFormation($GroupeFormation)
    {
        $this->GroupeFormation = $GroupeFormation;
    }

    /**
     * @return mixed
     */
    public function getMarche()
    {
        return $this->Marche;
    }

    /**
     * @param mixed $Marche
     */
    public function setMarche($Marche)
    {
        $this->Marche = $Marche;
    }

    /**
     * @return mixed
     */
    public function getNiveauetudes()
    {
        return $this->Niveauetudes;
    }

    /**
     * @param mixed $Niveauetudes
     */
    public function setNiveauetudes($Niveauetudes)
    {
        $this->Niveauetudes = $Niveauetudes;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }

    /**
     * @param mixed $DateNaissance
     */
    public function setDateNaissance($DateNaissance)
    {
        $this->DateNaissance = $DateNaissance;
    }

    /**
     * @return mixed
     */
    public function getZone()
    {
        return $this->Zone;
    }

    /**
     * @param mixed $Zone
     */
    public function setZone($Zone)
    {
        $this->Zone = $Zone;
    }

    /**
     * @return mixed
     */
    public function getEtablissement()
    {
        return $this->Etablissement;
    }

    /**
     * @param mixed $Etablissement
     */
    public function setEtablissement($Etablissement)
    {
        $this->Etablissement = $Etablissement;
    }

    /**
     * @return mixed
     */
    public function getNatureContact()
    {
        return $this->NatureContact;
    }

    /**
     * @param mixed $NatureContact
     */
    public function setNatureContact($NatureContact)
    {
        $this->NatureContact = $NatureContact;
    }

    /**
     * @return mixed
     */
    public function getVilleLycee()
    {
        return $this->VilleLycee;
    }

    /**
     * @param mixed $VilleLycee
     */
    public function setVilleLycee($VilleLycee)
    {
        $this->VilleLycee = $VilleLycee;
    }

    /**
     * @return mixed
     */
    public function getAnneeUniv()
    {
        return $this->AnneeUniv;
    }

    /**
     * @param mixed $AnneeUniv
     */
    public function setAnneeUniv($AnneeUniv)
    {
        $this->AnneeUniv = $AnneeUniv;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param mixed $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }

    /**
     * @return mixed
     */
    public function getVille()
    {
        return $this->Ville;
    }

    /**
     * @param mixed $Ville
     */
    public function setVille($Ville)
    {
        $this->Ville = $Ville;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->Nom;
    }

    /**
     * @param mixed $Nom
     */
    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * @param mixed $Prenom
     */
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $Tel
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    /**
     * @return mixed
     */
    public function getTelPere()
    {
        return $this->TelPere;
    }

    /**
     * @param mixed $TelPere
     */
    public function setTelPere($TelPere)
    {
        $this->TelPere = $TelPere;
    }

    /**
     * @return mixed
     */
    public function getGSM()
    {
        return $this->GSM;
    }

    /**
     * @param mixed $GSM
     */
    public function setGSM($GSM)
    {
        $this->GSM = $GSM;
    }

    /**
     * @return mixed
     */
    public function getTelMere()
    {
        return $this->TelMere;
    }

    /**
     * @param mixed $TelMere
     */
    public function setTelMere($TelMere)
    {
        $this->TelMere = $TelMere;
    }

    /**
     * @return mixed
     */
    public function getLieuNaissance()
    {
        return $this->LieuNaissance;
    }

    /**
     * @param mixed $LieuNaissance
     */
    public function setLieuNaissance($LieuNaissance)
    {
        $this->LieuNaissance = $LieuNaissance;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * @param mixed $Adresse
     */
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;
    }

    /**
     * @return mixed
     */
    public function getCP()
    {
        return $this->CP;
    }

    /**
     * @param mixed $CP
     */
    public function setCP($CP)
    {
        $this->CP = $CP;
    }

    /**
     * @return mixed
     */
    public function getAnneeEtude()
    {
        return $this->AnneeEtude;
    }

    /**
     * @param mixed $AnneeEtude
     */
    public function setAnneeEtude($AnneeEtude)
    {
        $this->AnneeEtude = $AnneeEtude;
    }

    /**
     * @return mixed
     */
    public function getBranche()
    {
        return $this->Branche;
    }

    /**
     * @param mixed $Branche
     */
    public function setBranche($Branche)
    {
        $this->Branche = $Branche;
    }

    /**
     * @return mixed
     */
    public function getDiplomeObtenu()
    {
        return $this->DiplomeObtenu;
    }

    /**
     * @param mixed $DiplomeObtenu
     */
    public function setDiplomeObtenu($DiplomeObtenu)
    {
        $this->DiplomeObtenu = $DiplomeObtenu;
    }

    /**
     * @return mixed
     */
    public function getAnneeObtention()
    {
        return $this->AnneeObtention;
    }

    /**
     * @param mixed $AnneeObtention
     */
    public function setAnneeObtention($AnneeObtention)
    {
        $this->AnneeObtention = $AnneeObtention;
    }

    /**
     * @return mixed
     */
    public function getExperienceprofessionelle()
    {
        return $this->Experienceprofessionelle;
    }

    /**
     * @param mixed $Experienceprofessionelle
     */
    public function setExperienceprofessionelle($Experienceprofessionelle)
    {
        $this->Experienceprofessionelle = $Experienceprofessionelle;
    }

    /**
     * @return mixed
     */
    public function getReçupar()
    {
        return $this->Reçupar;
    }

    /**
     * @param mixed $Reçupar
     */
    public function setReçupar($Reçupar)
    {
        $this->Reçupar = $Reçupar;
    }

    /**
     * @return mixed
     */
    public function getOperateurSaisie()
    {
        return $this->OperateurSaisie;
    }

    /**
     * @param mixed $OperateurSaisie
     */
    public function setOperateurSaisie($OperateurSaisie)
    {
        $this->OperateurSaisie = $OperateurSaisie;
    }

    /**
     * @return mixed
     */
    public function getObservations()
    {
        return $this->Observations;
    }

    /**
     * @param mixed $Observations
     */
    public function setObservations($Observations)
    {
        $this->Observations = $Observations;
    }

    /**
     * @return mixed
     */
    public function getDateSaisie()
    {
        return $this->DateSaisie;
    }

    /**
     * @param mixed $DateSaisie
     */
    public function setDateSaisie($DateSaisie)
    {
        $this->DateSaisie = $DateSaisie;
    }

    /**
     * @return mixed
     */
    public function getHeureSaisie()
    {
        return $this->HeureSaisie;
    }

    /**
     * @param mixed $HeureSaisie
     */
    public function setHeureSaisie($HeureSaisie)
    {
        $this->HeureSaisie = $HeureSaisie;
    }

    /**
     * @return mixed
     */
    public function getFormation()
    {
        return $this->Formation;
    }

    /**
     * @param mixed $Formation
     */
    public function setFormation($Formation)
    {
        $this->Formation = $Formation;
    }

    /**
     * @return mixed
     */
    public function getTransfertCD()
    {
        return $this->TransfertCD;
    }

    /**
     * @param mixed $TransfertCD
     */
    public function setTransfertCD($TransfertCD)
    {
        $this->TransfertCD = $TransfertCD;
    }

    /**
     * @return mixed
     */
    public function getAbandon()
    {
        return $this->Abandon;
    }

    /**
     * @param mixed $Abandon
     */
    public function setAbandon($Abandon)
    {
        $this->Abandon = $Abandon;
    }

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->Categorie;
    }

    /**
     * @param mixed $Categorie
     */
    public function setCategorie($Categorie)
    {
        $this->Categorie = $Categorie;
    }

    /**
     * @return mixed
     */
    public function getProfessionPere()
    {
        return $this->ProfessionPere;
    }

    /**
     * @param mixed $ProfessionPere
     */
    public function setProfessionPere($ProfessionPere)
    {
        $this->ProfessionPere = $ProfessionPere;
    }

    /**
     * @return mixed
     */
    public function getProfessionMere()
    {
        return $this->ProfessionMere;
    }

    /**
     * @param mixed $ProfessionMere
     */
    public function setProfessionMere($ProfessionMere)
    {
        $this->ProfessionMere = $ProfessionMere;
    }

    /**
     * @return mixed
     */
    public function getLyceePublic()
    {
        return $this->LyceePublic;
    }

    /**
     * @param mixed $LyceePublic
     */
    public function setLyceePublic($LyceePublic)
    {
        $this->LyceePublic = $LyceePublic;
    }

    /**
     * @return mixed
     */
    public function getLyceePrive()
    {
        return $this->LyceePrive;
    }

    /**
     * @param mixed $LyceePrive
     */
    public function setLyceePrive($LyceePrive)
    {
        $this->LyceePrive = $LyceePrive;
    }

    /**
     * @return mixed
     */
    public function getLyceeMission()
    {
        return $this->LyceeMission;
    }

    /**
     * @param mixed $LyceeMission
     */
    public function setLyceeMission($LyceeMission)
    {
        $this->LyceeMission = $LyceeMission;
    }

    /**
     * @return mixed
     */
    public function getStatutContact()
    {
        return $this->StatutContact;
    }

    /**
     * @param mixed $StatutContact
     */
    public function setStatutContact($StatutContact)
    {
        $this->StatutContact = $StatutContact;
    }

    /**
     * @return mixed
     */
    public function getMailPere()
    {
        return $this->MailPere;
    }

    /**
     * @param mixed $MailPere
     */
    public function setMailPere($MailPere)
    {
        $this->MailPere = $MailPere;
    }

    /**
     * @return mixed
     */
    public function getMailMere()
    {
        return $this->MailMere;
    }

    /**
     * @param mixed $MailMere
     */
    public function setMailMere($MailMere)
    {
        $this->MailMere = $MailMere;
    }

    /**
     * @return mixed
     */
    public function getSourceContact()
    {
        return $this->SourceContact;
    }

    /**
     * @param mixed $SourceContact
     */
    public function setSourceContact($SourceContact)
    {
        $this->SourceContact = $SourceContact;
    }

    /**
     * @return mixed
     */
    public function getInteressePar()
    {
        return $this->InteressePar;
    }

    /**
     * @param mixed $InteressePar
     */
    public function setInteressePar($InteressePar)
    {
        $this->InteressePar = $InteressePar;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning4()
    {
        return $this->EtapePhoning4;
    }

    /**
     * @param mixed $EtapePhoning4
     */
    public function setEtapePhoning4($EtapePhoning4)
    {
        $this->EtapePhoning4 = $EtapePhoning4;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning5()
    {
        return $this->EtapePhoning5;
    }

    /**
     * @param mixed $EtapePhoning5
     */
    public function setEtapePhoning5($EtapePhoning5)
    {
        $this->EtapePhoning5 = $EtapePhoning5;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning1()
    {
        return $this->DatePhoning1;
    }

    /**
     * @param mixed $DatePhoning1
     */
    public function setDatePhoning1($DatePhoning1)
    {
        $this->DatePhoning1 = $DatePhoning1;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning2()
    {
        return $this->DatePhoning2;
    }

    /**
     * @param mixed $DatePhoning2
     */
    public function setDatePhoning2($DatePhoning2)
    {
        $this->DatePhoning2 = $DatePhoning2;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning3()
    {
        return $this->DatePhoning3;
    }

    /**
     * @param mixed $DatePhoning3
     */
    public function setDatePhoning3($DatePhoning3)
    {
        $this->DatePhoning3 = $DatePhoning3;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning4()
    {
        return $this->DatePhoning4;
    }

    /**
     * @param mixed $DatePhoning4
     */
    public function setDatePhoning4($DatePhoning4)
    {
        $this->DatePhoning4 = $DatePhoning4;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning5()
    {
        return $this->DatePhoning5;
    }

    /**
     * @param mixed $DatePhoning5
     */
    public function setDatePhoning5($DatePhoning5)
    {
        $this->DatePhoning5 = $DatePhoning5;
    }

    /**
     * @return mixed
     */
    public function getDateDernPhoning()
    {
        return $this->DateDernPhoning;
    }

    /**
     * @param mixed $DateDernPhoning
     */
    public function setDateDernPhoning($DateDernPhoning)
    {
        $this->DateDernPhoning = $DateDernPhoning;
    }

    /**
     * @return mixed
     */
    public function getDernCampagne()
    {
        return $this->DernCampagne;
    }

    /**
     * @param mixed $DernCampagne
     */
    public function setDernCampagne($DernCampagne)
    {
        $this->DernCampagne = $DernCampagne;
    }

    /**
     * @return mixed
     */
    public function getTA()
    {
        return $this->TA;
    }

    /**
     * @param mixed $TA
     */
    public function setTA($TA)
    {
        $this->TA = $TA;
    }

    /**
     * @return mixed
     */
    public function getEmailPhoning()
    {
        return $this->EmailPhoning;
    }

    /**
     * @param mixed $EmailPhoning
     */
    public function setEmailPhoning($EmailPhoning)
    {
        $this->EmailPhoning = $EmailPhoning;
    }

    /**
     * @return mixed
     */
    public function getAnepasfiltrer()
    {
        return $this->Anepasfiltrer;
    }

    /**
     * @param mixed $Anepasfiltrer
     */
    public function setAnepasfiltrer($Anepasfiltrer)
    {
        $this->Anepasfiltrer = $Anepasfiltrer;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning6()
    {
        return $this->EtapePhoning6;
    }

    /**
     * @param mixed $EtapePhoning6
     */
    public function setEtapePhoning6($EtapePhoning6)
    {
        $this->EtapePhoning6 = $EtapePhoning6;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning7()
    {
        return $this->EtapePhoning7;
    }

    /**
     * @param mixed $EtapePhoning7
     */
    public function setEtapePhoning7($EtapePhoning7)
    {
        $this->EtapePhoning7 = $EtapePhoning7;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning8()
    {
        return $this->EtapePhoning8;
    }

    /**
     * @param mixed $EtapePhoning8
     */
    public function setEtapePhoning8($EtapePhoning8)
    {
        $this->EtapePhoning8 = $EtapePhoning8;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning9()
    {
        return $this->EtapePhoning9;
    }

    /**
     * @param mixed $EtapePhoning9
     */
    public function setEtapePhoning9($EtapePhoning9)
    {
        $this->EtapePhoning9 = $EtapePhoning9;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning10()
    {
        return $this->EtapePhoning10;
    }

    /**
     * @param mixed $EtapePhoning10
     */
    public function setEtapePhoning10($EtapePhoning10)
    {
        $this->EtapePhoning10 = $EtapePhoning10;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning6()
    {
        return $this->DatePhoning6;
    }

    /**
     * @param mixed $DatePhoning6
     */
    public function setDatePhoning6($DatePhoning6)
    {
        $this->DatePhoning6 = $DatePhoning6;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning7()
    {
        return $this->DatePhoning7;
    }

    /**
     * @param mixed $DatePhoning7
     */
    public function setDatePhoning7($DatePhoning7)
    {
        $this->DatePhoning7 = $DatePhoning7;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning8()
    {
        return $this->DatePhoning8;
    }

    /**
     * @param mixed $DatePhoning8
     */
    public function setDatePhoning8($DatePhoning8)
    {
        $this->DatePhoning8 = $DatePhoning8;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning9()
    {
        return $this->DatePhoning9;
    }

    /**
     * @param mixed $DatePhoning9
     */
    public function setDatePhoning9($DatePhoning9)
    {
        $this->DatePhoning9 = $DatePhoning9;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning10()
    {
        return $this->DatePhoning10;
    }

    /**
     * @param mixed $DatePhoning10
     */
    public function setDatePhoning10($DatePhoning10)
    {
        $this->DatePhoning10 = $DatePhoning10;
    }

    /**
     * @return mixed
     */
    public function getTA1()
    {
        return $this->TA1;
    }

    /**
     * @param mixed $TA1
     */
    public function setTA1($TA1)
    {
        $this->TA1 = $TA1;
    }

    /**
     * @return mixed
     */
    public function getTA2()
    {
        return $this->TA2;
    }

    /**
     * @param mixed $TA2
     */
    public function setTA2($TA2)
    {
        $this->TA2 = $TA2;
    }

    /**
     * @return mixed
     */
    public function getTA3()
    {
        return $this->TA3;
    }

    /**
     * @param mixed $TA3
     */
    public function setTA3($TA3)
    {
        $this->TA3 = $TA3;
    }

    /**
     * @return mixed
     */
    public function getTA4()
    {
        return $this->TA4;
    }

    /**
     * @param mixed $TA4
     */
    public function setTA4($TA4)
    {
        $this->TA4 = $TA4;
    }

    /**
     * @return mixed
     */
    public function getTA5()
    {
        return $this->TA5;
    }

    /**
     * @param mixed $TA5
     */
    public function setTA5($TA5)
    {
        $this->TA5 = $TA5;
    }

    /**
     * @return mixed
     */
    public function getTA6()
    {
        return $this->TA6;
    }

    /**
     * @param mixed $TA6
     */
    public function setTA6($TA6)
    {
        $this->TA6 = $TA6;
    }

    /**
     * @return mixed
     */
    public function getTA7()
    {
        return $this->TA7;
    }

    /**
     * @param mixed $TA7
     */
    public function setTA7($TA7)
    {
        $this->TA7 = $TA7;
    }

    /**
     * @return mixed
     */
    public function getTA8()
    {
        return $this->TA8;
    }

    /**
     * @param mixed $TA8
     */
    public function setTA8($TA8)
    {
        $this->TA8 = $TA8;
    }

    /**
     * @return mixed
     */
    public function getTA9()
    {
        return $this->TA9;
    }

    /**
     * @param mixed $TA9
     */
    public function setTA9($TA9)
    {
        $this->TA9 = $TA9;
    }

    /**
     * @return mixed
     */
    public function getTA10()
    {
        return $this->TA10;
    }

    /**
     * @param mixed $TA10
     */
    public function setTA10($TA10)
    {
        $this->TA10 = $TA10;
    }

    /**
     * @return mixed
     */
    public function getCampagne1()
    {
        return $this->Campagne1;
    }

    /**
     * @param mixed $Campagne1
     */
    public function setCampagne1($Campagne1)
    {
        $this->Campagne1 = $Campagne1;
    }

    /**
     * @return mixed
     */
    public function getCampagne2()
    {
        return $this->Campagne2;
    }

    /**
     * @param mixed $Campagne2
     */
    public function setCampagne2($Campagne2)
    {
        $this->Campagne2 = $Campagne2;
    }

    /**
     * @return mixed
     */
    public function getCampagne3()
    {
        return $this->Campagne3;
    }

    /**
     * @param mixed $Campagne3
     */
    public function setCampagne3($Campagne3)
    {
        $this->Campagne3 = $Campagne3;
    }

    /**
     * @return mixed
     */
    public function getCampagne4()
    {
        return $this->Campagne4;
    }

    /**
     * @param mixed $Campagne4
     */
    public function setCampagne4($Campagne4)
    {
        $this->Campagne4 = $Campagne4;
    }

    /**
     * @return mixed
     */
    public function getCampagne5()
    {
        return $this->Campagne5;
    }

    /**
     * @param mixed $Campagne5
     */
    public function setCampagne5($Campagne5)
    {
        $this->Campagne5 = $Campagne5;
    }

    /**
     * @return mixed
     */
    public function getCampagne6()
    {
        return $this->Campagne6;
    }

    /**
     * @param mixed $Campagne6
     */
    public function setCampagne6($Campagne6)
    {
        $this->Campagne6 = $Campagne6;
    }

    /**
     * @return mixed
     */
    public function getCampagne7()
    {
        return $this->Campagne7;
    }

    /**
     * @param mixed $Campagne7
     */
    public function setCampagne7($Campagne7)
    {
        $this->Campagne7 = $Campagne7;
    }

    /**
     * @return mixed
     */
    public function getCampagne8()
    {
        return $this->Campagne8;
    }

    /**
     * @param mixed $Campagne8
     */
    public function setCampagne8($Campagne8)
    {
        $this->Campagne8 = $Campagne8;
    }

    /**
     * @return mixed
     */
    public function getCampagne9()
    {
        return $this->Campagne9;
    }

    /**
     * @param mixed $Campagne9
     */
    public function setCampagne9($Campagne9)
    {
        $this->Campagne9 = $Campagne9;
    }

    /**
     * @return mixed
     */
    public function getCampagne10()
    {
        return $this->Campagne10;
    }

    /**
     * @param mixed $Campagne10
     */
    public function setCampagne10($Campagne10)
    {
        $this->Campagne10 = $Campagne10;
    }
    public function __construct()
    {
    }


    public function hydrate(array $donnees)
    {

        foreach ($donnees as $key => $value) {

            $method = 'set' . $key;


            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    public function add(){
        $param=[];
        try {
             include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("INSERT INTO `contact_indirect`(`Civilite`,`Nom`,`Prenom`,`Tel` , `E-Mail`,`Lycee`, `Profession_Pere`, `Profession_Mere`,`Tel_Pere`, `Tel_Mere`,`Mail_Pere`, `Mail_Mere`, `Date`, `Groupe_Formation`,`Formation_Demmandee`,`Annee_Univ`,`Annee_Etude`, `Ville`,`Date_de_Naissance`,`Lieu_de_Naissance`,`Adresse`,`Categorie`,`Nature_de_Contact`, `CP`,`GSM` , `Lycee_Public` , `Lycee_Prive`, `Lycee_Mission`, `Ville_Lycee`,`Interesse_Par`,`Niveau_des_etudes` ,`Branche`,`Diplome_Obtenu`,`Annee_Obtention`,`Experience_professionelle`,`Reçu_par`,`Marche`,`Observations`,`Operateur_Saisie`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,`Date_Saisie`,`Heure_Saisie`)
values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE(),CURTIME() )");
            $param = array($this->getCivilite(),
                $this->getNom(),
                $this->getPrenom(),
                $this->getTel(),
                $this->getEMail(),
                $this->getLycee(),
                $this->getProfessionPere(),
                $this->getProfessionMere(),
                $this->getTelPere(),
                $this->getTelMere(),
                $this->getMailPere(),
                $this->getMailMere(),
                $this->getDate(),
                $this->getGroupeFormation(),
                $this->getFormationDemmandee(),
                $this->getAnneeUniv(),
                $this->getAnneeEtude(),
                $this->getVille(),
                $this->getDateNaissance(),
                $this->getLieuNaissance(),
                $this->getAdresse(),
                $this->getCategorie(),
                $this->getNatureContact(),
                $this->getCP(),
                $this->getGSM(),
                $this->getLyceePublic(),
                $this->getLyceePrive(),
                $this->getLyceeMission(),
                $this->getVilleLycee(),
                $this->getInteressePar(),
                $this->getNiveauetudes(),
                $this->getBranche(),
                $this->getDiplomeObtenu(),
                $this->getAnneeObtention(),
                $this->getExperienceprofessionelle(),
                $this->getReçupar(),
                $this->getMarche(),
                $this->getObservations(),
                $this->getOperateurSaisie(),
                $this->gets1tc(),
                $this->gets2tc(),
                $this->getannuelletc(),
                $this->gets1bac1(),
                $this->gets2bac1(),
                $this->getannuellebac1(),
                $this->getnoteregional(),
                $this->gets1bac2(),
                $this->gets2bac2(),
                $this->getannuellebac2(),
                $this->getnotenational(),
                $this->getnotegenerale()
            );
                if($req->execute($param))
                {
                    return json_encode(array('validation'=>true, 'message'=>'<div class="callout callout-success" >Enregistrement reussi !</div>'));
                }

        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }
    public function update()
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->prepare("select `Campagne1`, `Campagne2`, `Campagne3`, `Campagne4`, `Campagne5`, `Campagne6`, `Campagne7`, `Campagne8`, `Campagne9`, `Campagne10` from `contact_indirect` where CAST(MD5(`id`) AS CHAR CHARACTER SET utf8)=?");
        $req->execute(array($this->getID()));
        try
        {
            $valeur="";
            $ta="";
            while($donner=$req->fetch())
            {
                if(empty($donner['Campagne1']))
                {
                    $valeur="Campagne1 = ?";
                    $ta="TA1 = ?";
                    $script="script1 = ?";
                    $email="email1 = ?";
                    $object="object1 = ?";
                     /*
                    $valeur="Campagne6 = '".$this->getCampagne1()."'";
                    $ta="TA1 = '".$this->getTA()."'";
                    $script="script1 ='".$this->getScript1()."'";
                    $email="email1 = '".$this->getEmailCmp()."'";
                    $object="object1 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne2']))
                {
                    $valeur="Campagne2 = ?";
                    $ta="TA2 = ?";
                    $script="script2 = ?";
                    $email="email2 = ?";
                    $object="object2 = ?";
                     /*
                    $valeur="Campagne2 = '".$this->getCampagne1()."'";
                    $ta="TA2 = '".$this->getTA()."'";
                    $script="script2 ='".$this->getScript1()."'";
                    $email="email2 = '".$this->getEmailCmp()."'";
                    $object="object2 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne3']))
                {
                    $valeur="Campagne3 = ?";
                    $ta="TA3 = ?";
                    $script="script3 = ?";
                    $email="email3 = ?";
                    $object="object3 = ?";
                     /*
                    $valeur="Campagne3 = '".$this->getCampagne1()."'";
                    $ta="TA3 = '".$this->getTA()."'";
                    $script="script3 ='".$this->getScript1()."'";
                    $email="email3 = '".$this->getEmailCmp()."'";
                    $object="object3 = '".$this->getObject()."'";*/
                    
                }
                elseif(empty($donner['Campagne4']))
                {
                    $valeur="Campagne4 = ?";
                    $ta="TA4 = ?";
                    $script="script4 = ?";
                    $email="email4 = ?";
                    $object="object4 = ?";
                      /*
                    $valeur="Campagne4 = '".$this->getCampagne1()."'";
                    $ta="TA4 = '".$this->getTA()."'";
                    $script="script4 ='".$this->getScript1()."'";
                    $email="email4 = '".$this->getEmailCmp()."'";
                    $object="object4 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne5']))
                {
                    $valeur="Campagne5 = ?";
                    $ta="TA5 = ?";
                    $script="script5 = ?";
                    $email="email5 = ?";
                    $object="object5 = ?";
                      /*
                    $valeur="Campagne5 = '".$this->getCampagne1()."'";
                    $ta="TA5 = '".$this->getTA()."'";
                    $script="script5 ='".$this->getScript1()."'";
                    $email="email5 = '".$this->getEmailCmp()."'";
                    $object="object5 = '".$this->getObject()."'";*/
                }elseif(empty($donner['Campagne6']))
                {
                    $valeur="Campagne6 = ?";
                    $ta="TA6 = ?";
                    $script="script6 =?";
                    $email="email6 = ?";
                    $object="object6 = ?";
                    /*
                    $valeur="Campagne6 = '".$this->getCampagne1()."'";
                    $ta="TA6 = '".$this->getTA()."'";
                    $script="script6 ='".$this->getScript1()."'";
                    $email="email6 = '".$this->getEmailCmp()."'";
                    $object="object6 = '".$this->getObject()."'";*/
                }elseif(empty($donner['Campagne7']))
                {
                    $valeur="Campagne7 = ?";
                    $ta="TA7 = ?";
                    $script="script7 = ?";
                    $email="email7 = ?";
                    $object="object7 = ?";
                      /*
                    $valeur="Campagne7 = '".$this->getCampagne1()."'";
                    $ta="TA7 = '".$this->getTA()."'";
                    $script="script7 ='".$this->getScript1()."'";
                    $email="email7 = '".$this->getEmailCmp()."'";
                    $object="object7 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne8']))
                {
                    $valeur="Campagne8 = ?";
                    $ta="TA8 = ?";
                    $script="script8 = ?";
                    $email="email8 = ?";
                    $object="object8 = ?";
                      /*
                    $valeur="Campagne8 = '".$this->getCampagne1()."'";
                    $ta="TA8 = '".$this->getTA()."'";
                    $script="script8 ='".$this->getScript1()."'";
                    $email="email8 = '".$this->getEmailCmp()."'";
                    $object="object8 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne9']))
                {
                    $valeur="Campagne9 = ?";
                    $ta="TA9 = ?";
                    $script="script9 = ?";
                    $email="email9 = ?";
                    $object="object9 = ?";
                      /*
                    $valeur="Campagne9 = '".$this->getCampagne1()."'";
                    $ta="TA9 = '".$this->getTA()."'";
                    $script="script9 ='".$this->getScript1()."'";
                    $email="email9 = '".$this->getEmailCmp()."'";
                    $object="object9 = '".$this->getObject()."'";*/
                }
                elseif(empty($donner['Campagne10']))
                {
                    $valeur="Campagne10 = ?";
                    $ta="TA10 = ?";
                    $script="script10 = ?";
                    $email="email10 = ?";
                    $object="object10 = ?";
                      /*
                    $valeur="Campagne10 = '".$this->getCampagne1()."'";
                    $ta="TA10 = '".$this->getTA()."'";
                    $script="script10 ='".$this->getScript1()."'";
                    $email="email10 = '".$this->getEmailCmp()."'";
                    $object="object10 = '".$this->getObject()."'";*/
                }
            }
            //echo "update `contact_indirect` set $valeur,$ta,$script,$email,$object where MD5(id)='".$this->getID."'";exit;
            $req = $bdd->prepare("update `contact_indirect` set $valeur,$ta,$script,$email,$object where MD5(id)=?");
            $param = array($this->getCampagne1(),$this->getTA(),$this->getScript1(),$this->getEmailCmp(),$this->getObject(),$this->getID());
            if($req->execute($param)) {
                $this->changeetat($this->getID());
                return json_encode(array('validation'=>true, 'message'=>'<div class="callout callout-success" >Enregistrement reussi !</div>'));
            }
        }
        catch(Exception $e)

        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }

	public function  Allcontactsindirect()
    {
        // include('content/config.php');

        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            return $bdd->query('SELECT c.id, c.Civilite, CONCAT( u.nom, CONCAT(  " ", u.prenom ) ) AS Contact_Suivi_par, c.Etablissement, c.Nom, c.Prenom, `E-Mail` , c.GSM, c.Tel, c.Formation_Demmandee, c.Nature_de_Contact, c.Annee_Univ, c.Ville, c.Tel_Pere, c.Ville_Lycee, c.Tel_Mere, valide,c.Date,c.Marche
            FROM contact_indirect c
            LEFT JOIN users u ON u.id = c.Contact_Suivi_par
            WHERE valide =0
             limit 0,50
             ');

    }
    public function Validercontactindirect()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->prepare('UPDATE `contact_indirect` SET Contact_Suivi_par= ? , `Nom` = ? , `Prenom`= ? , `E-Mail`=? , `GSM`=?, `Tel`=?,`Tel_Pere`=?,Etablissement=?,Formation_Demmandee=? ,ville_lycee=?,ville=?,nature_de_contact=?,`valide`=?,Date = ?,Marche=? where md5(id) = ?');
        
        if(intval($this->getContactsuivipar())==0)
        {
            $nom = substr($this->getContactsuivipar(),0,strpos($this->getContactsuivipar(),' '));
           
            $requ1=$bdd->query('select id from users where nom like "%'.$nom.'%" ');
            $this->setContactsuivipar($requ1->fetchAll()[0]['id']);
        }
        $values = array($this->getContactSuiviPar(),$this->getNom(),$this->getPrenom(),$this->getEmail(),$this->getGSM(),$this->getTel(),$this->getTelPere(),$this->getEtablissement(),$this->getFormationDemmandee(),$this->getVilleLycee(),$this->getVille(),$this->getNatureContact(),$this->getValide(),$this->getDate(),$this->getMarche(),$this->getId());
        $this->changeetat(md5($this->getId()));
        return $requ->execute($values);    }

    public function supprimercontact($id)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->prepare('DELETE FROM `contact_indirect` WHERE id = ?');
        return $requ->execute(array($id));
    }
    public function getcontactbyid($id)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->prepare("select * from `contact_indirect` WHERE md5(id)=?");
        $req = $req->execute(array($id));
    }
    public function TransfererContact($id,$user)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $this->changeetat($id);
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try
        {
            $reqind = $bdd->query("SELECT id,Formation_Demmandee FROM `contact_indirect`  where md5(`id`)='$id'");
            $reqind=$reqind->fetch();
            $id_cdi=$reqind[0];
            $foramtion = $reqind[1];
            $req_niveau = $bdd->query("SELECT `niveau` FROM `param_formations` WHERE `formation_demande`='$foramtion' and `niveau_site`='1 ère Année'");
            $niveau=$req_niveau->fetch();
            $niveau=$niveau[0];
            $req = $bdd->prepare("INSERT INTO `contact_direct` (`Civilite`,Contact_Suivi_par, `Nom`, `Prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`,
             `Adresse`, `E-Mail`, `GSM`, `Tel`, `Formation_Demmandee`, `date_du_contact` , `contact_suite_a`, `Annee_Univ`,
              `Zone`, `Ville`, `Marche`, `StatutContact`, `CP`, `Niveau_des_etudes`, `diplomes_obtenus`, `Etablissement`,
               `Annee_Obtention`, `serie_bac` , `professionpere`, `professionmere`, `Saisi_par`, `Reçu_par`, `Observation`,
                `Lycee_Public`, `Lycee_Prive`, `Lycee_Mission`, `Mail_Pere`, `Mail_Mere`, `Tel_Pere`, `Tel_Mere`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s2bac2`,`s1bac2`,`annuellebac2`,`notenational`,`notegenerale`)
                    SELECT `Civilite`,Contact_Suivi_par, `Nom`, `Prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`, `Adresse`, `E-Mail`, `GSM`, `Tel`, `Formation_Demmandee`, `Date`, `Nature_de_Contact`, `Annee_Univ`, `Zone`, `Ville`, `Marche`, `StatutContact`, `CP`, `Niveau_des_etudes`, `Diplome_Obtenu`, `Etablissement`, `Annee_Obtention`, `Branche` ,`Profession_Pere`, `Profession_Mere`, `Operateur_Saisie`, `Reçu_par`, `Observations`, `Lycee_Public`, `Lycee_Prive`, `Lycee_Mission`, `Mail_Pere`, `Mail_Mere`, `Tel_Pere`, `Tel_Mere`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s2bac2`,`s1bac2`,`annuellebac2`,`notenational`,`notegenerale` FROM `contact_indirect`
                    WHERE md5(id)=?");
                $req->execute(array($id));
                $temp = $bdd->lastInsertId();
                $req_req = $bdd->query("update contact_direct cd inner join param_formations pf on pf.formation_demande=cd.Formation_Demmandee set cd.niveau_demande=pf.niveau where pf.niveau like  '%1%' and cd.niveau_demande is null ");
                $req = $bdd->prepare("update contact_indirect set transferer=1  WHERE md5(id)=?");
                $req->execute(array($id));
                $req = $bdd->prepare("INSERT INTO `histo_transf`(`type`, `idinc`, `iddc`, `date`, `user`) VALUES ('direct',?,?,NOW(),?)");
                $req->execute(array($id,md5($temp),$user));
                return json_encode(array('validation'=>true, 'url'=>$location));
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }
    public function changeetat($id)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare('UPDATE `contact_indirect` SET `TypeExp`= \'M\',Exp=0 where md5(id) = ? and Exp=1');
            $values = array($id);
            if($requ->execute($values))
            {
                return json_encode(array('validation'=>true, 'message'=>'Opération effectuée avec succès …'));
            }
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }
   public function findcontacts($test)
    {
         include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->query('SELECT `id`,`Nom`,`Prenom`,`GSM`,`Tel`,`E-Mail` FROM `contact_indirect` WHERE (`Nom` like "%'.$test.'%" or `Prenom` like "%'.$test.'%" or `Tel_Pere` like "%'.$test.'%"  or `Tel_Mere` like "%'.$test.'%"  or `GSM` like "%'.$test.'%" or `Tel` like "%'.$test.'%") and transferer =0');
            require('content/controller/class.contact-direct.php');
            $contact_direct = new ContactDirect();
            $value="";
            $value.=$contact_direct->findcontacts($test);
            while($data=$requ->fetch())
            {
                if($data['Campagne']==1)
                {
                    continue;
                }
                else
                {
                    $value.= '<tr>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CDI&auth='.md5($data['id']).'\')">'.$data['Nom'].' '.$data['Prenom'].'</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CDI&auth='.md5($data['id']).'\')">Contact Indirect</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CDI&auth='.md5($data['id']).'\')">'.$data['Tel'].'</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CDI&auth='.md5($data['id']).'\')">'.$data['GSM'].'</td>
                                    </tr>';
                }


            }
            return json_encode(array('validation'=>true, 'value'=>$value));
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
    
    public function validation_of_phoning($id,$etapephoning,$cmp)
    {
        include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
             $requ=$bdd->prepare(' select Campagne1, Campagne2, Campagne3, Campagne4, Campagne5, Campagne6, Campagne7, Campagne8, Campagne9, Campagne10 from  `contact_indirect` WHERE md5(`id`)=? and ( `Campagne1`=? or `Campagne2`=? or `Campagne3`=? or `Campagne4`=? or `Campagne5`=? or `Campagne6`=? or `Campagne7`=? or `Campagne8`=?  or `Campagne9`=?  or `Campagne10`=? )');

            $param=(array($id,$cmp,$cmp,$cmp,$cmp,$cmp,$cmp,$cmp,$cmp,$cmp,$cmp));
            $requ->execute($param);
            $data=$requ->fetch();
$query="";
            if($data['Campagne1']==$cmp)
            {
                $query="qualification1=1";
            }
            elseif($data['Campagne2']==$cmp)
            {
                $query="qualification2=1";
            }
            elseif($data['Campagne3']==$cmp)
            {
                $query="qualification3=1";
            }
            elseif($data['Campagne4']==$cmp)
            {
                $query="qualification4=1";
            }
            elseif($data['Campagne5']==$cmp)
            {
                $query="qualification5=1";
            }
            elseif($data['Campagne6']==$cmp)
            {
                $query="qualification6=1";
            }
            elseif($data['Campagne7']==$cmp)
            {
                $query="qualification7=1";
            }

            elseif($data['Campagne8']==$cmp)
            {
                $query="qualification8=1";
            }

            elseif($data['Campagne9']==$cmp)
            {
                $query="qualification9=1";
            }

            elseif($data['Campagne10']==$cmp)
            {
                $query="qualification10=1";
            }
            $requ=$bdd->prepare(' Update `contact_indirect` set Etape_Phoning=?,'.$query.' WHERE md5(`id`)=? ');
            $param=(array($etapephoning,$id));
            if($requ->execute($param)) {
                $this->changeetat($id);
                return json_encode(array('validation'=>true));
            }
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
    
    public function MettreAjour()
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->prepare('UPDATE `contact_indirect` SET `Civilite`=?,`Nom`=?,`Prenom`=?,`Tel`=?,`E-Mail`=?,`Profession_Mere`=?,`Profession_Pere`=?,
`Mail_Mere`=?,`Mail_Pere`=?,`Tel_Mere`=?,`Tel_Pere`=?,`Annee_Etude`=?,`Annee_Univ`=?,`Formation_Demmandee`=?,`Ville`=?,`Date`=?,`Groupe_Formation`=?,`Date_de_Naissance`=?,
`Nature_de_Contact`=?,`GSM`=?,`Marche`=?,`Zone`=?,`Ville_Lycee`=?,`Niveau_des_etudes`=?,`Etablissement`=?,
`Lieu_de_Naissance`=?,`Branche`=?,`Observations`=?,`Lycee_Public`=?,`Diplome_Obtenu`=?,`Date_Saisie`=?,
`Lycee_Prive`=?,`Annee_Obtention`=?,`Heure_Saisie`=?,`Lycee_Mission`=?,`Experience_professionelle`=?,`Formation`=?,`StatutContact`=?,`Reçu_par`=?,`Transfert_CD`=?,Lycee=?,Adresse=?,
  Categorie=?,CP=?,Interesse_Par=?,valide=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,
  `noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=? WHERE md5(id) = ?');
        //40
        $params= array($this->getCivilite(),
            $this->getNom(),
            $this->getPrenom(),$this->getTel(),$this->getEMail(),$this->getProfessionMere(),
            $this->getProfessionPere(),
            $this->getMailMere(),$this->getMailPere(),
            $this->getTelMere(),$this->getTelPere(),$this->getAnneeEtude(),$this->getAnneeUniv(),
            $this->getFormationDemmandee(),$this->getVille()
        ,$this->getDate(),$this->getGroupeFormation(),$this->getDateNaissance(),$this->getNatureContact(),$this->getGSM(),
            $this->getMarche(),$this->getZone(),$this->getVilleLycee(),$this->getNiveauetudes(),
            $this->getEtablissement(),$this->getLieuNaissance(),
            $this->getBranche(),$this->getObservations(),$this->getLyceePublic(),$this->getDiplomeObtenu(),
            $this->getDateSaisie(),
            $this->getLyceePrive(),$this->getAnneeObtention(),$this->getHeureSaisie(),$this->getLyceeMission(),$this->getExperienceprofessionelle(),
            $this->getFormation(),$this->getStatutContact(),$this->getReçupar(),$this->getTransfertCD(),$this->getLycee(),$this->getAdresse(),$this->getCategorie(),$this->getCP(),$this->getInteressePar(),
            $this->getValide(),
            $this->gets1tc(),
            $this->gets2tc(),
            $this->getannuelletc(),
            $this->gets1bac1(),
            $this->gets2bac1(),
            $this->getannuellebac1(),
            $this->getnoteregional(),
            $this->gets1bac2(),
            $this->gets2bac2(),
            $this->getannuellebac2(),
            $this->getnotenational(),
            $this->getnotegenerale(),
            $this->getID());
            $this->changeetat($this->getID());
        return $requ->execute($params);

    }
    public function findbyname($nom,$prenom)
    {
       	include($_SERVER['DOCUMENT_ROOT'].'/content/controller/class.contact-direct.php');
        $contact_direct = new ContactDirect();
        $valeur="";
        $i=1;
        $valeur.=$contact_direct->findbyname($nom,$prenom);
        include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare('SELECT id FROM `contact_indirect` WHERE `Nom`=? and `Prenom`=? ');
            $requ->execute(array($nom,$prenom));
            if($requ->rowCount()>0)
            {
                while($value=$requ->fetch())
                {
                    $valeur.='* Contact Indirect <a target="_blank" href="'.$location.'?page=contactind&id='.md5($value[0]).'">Cliquez ici</a> pour consulter sa fiche <br>';
                }
            }
            if($valeur!="")
            {
                return json_encode(array('validation'=>true, 'message'=>$valeur));
            }
            else
            {
                return json_encode(array('validation'=>false));
            }
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
     public function getnbr_saisie_by_user() 
	{
	include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
		$req_matin=$bdd->query('SELECT COUNT( c.`id` ) as "nbr_saisie", CONCAT( u.nom,  " ", u.prenom ) as "nom"
	FROM  `contact_indirect` c
	LEFT OUTER JOIN users u ON c.Operateur_Saisie = u.id where `Date_Saisie` = CURDATE() and u.id<>56
	GROUP BY  `Operateur_Saisie` limit 0,10 ');
		$data_global=[];
		if($req_matin->rowCount()>0)
	{
		while($donner=$req_matin->fetch())
		{
			$data_global[]=$donner;
		}
	}
		return json_encode($data_global);  
	}
    public function getnbr_saisie_by_user_globale()
	{
	include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
		$req_matin=$bdd->query('SELECT COUNT( c.`id` ) as "nbr_saisie", CONCAT( u.nom,  " ", u.prenom ) as "nom"
	FROM  `contact_indirect` c
	LEFT OUTER JOIN users u ON c.Operateur_Saisie = u.id
	GROUP BY  `Operateur_Saisie` ');
		$data_global=[];
		while($donner=$req_matin->fetch())
		{
			$data_global[]=$donner;
		}
		return json_encode($data_global);  
	
	}
    public function getnbr_appel_by_user($date,$option)
{
	include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
	$requ=$bdd->prepare('SELECT SUM(  `COUNT(  ``Etape_Phoning1`` )` ) AS  "appels", CONCAT( u.nom,  " ", u.prenom ) AS  "TA1",  `DATE(  ``Date_Phoning1`` )` ,  `soir` 
FROM  `phoning_by_user_week` p
LEFT OUTER JOIN users u ON p.TA1 = u.id
WHERE  `DATE(  ``Date_Phoning1`` )` =  ?
AND  `soir` =  ?
GROUP BY  `TA1` ,  `soir` 
');
	$requ->execute(array($date,$option));
	$data_global=[];
	if($requ->rowCount()>0)
	{
		while($donner=$requ->fetch())
		{
			$data_global[]=$donner;
		}	
	}
	
	return json_encode($data_global);  
}
 public function validation_of_phoning_rappel($id,$etapephoning)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare(' Update `contact_indirect` set Etape_Phoning=? WHERE md5(`id`)=? ');
            $param=(array($etapephoning,$id));
            if($requ->execute($param)) {
                $this->changeetat($id);
                return json_encode(array('validation'=>true));
            }
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
    public function get_days()
    {
        include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
			$req_day_week=$bdd->query("SELECT * 
			FROM (
			SELECT ADDDATE(  '1970-01-01', t4.i *10000 + t3.i *1000 + t2.i *100 + t1.i *10 + t0.i ) selected_date
			FROM (

			SELECT 0 i
			UNION SELECT 1 
			UNION SELECT 2 
			UNION SELECT 3 
			UNION SELECT 4 
			UNION SELECT 5 
			UNION SELECT 6 
			UNION SELECT 7 
			UNION SELECT 8 
			UNION SELECT 9
			)t0, (

			SELECT 0 i
			UNION SELECT 1 
			UNION SELECT 2 
			UNION SELECT 3 
			UNION SELECT 4 
			UNION SELECT 5 
			UNION SELECT 6 
			UNION SELECT 7 
			UNION SELECT 8 
			UNION SELECT 9
			)t1, (

			SELECT 0 i
			UNION SELECT 1 
			UNION SELECT 2 
			UNION SELECT 3 
			UNION SELECT 4 
			UNION SELECT 5 
			UNION SELECT 6 
			UNION SELECT 7 
			UNION SELECT 8 
			UNION SELECT 9
			)t2, (

			SELECT 0 i
			UNION SELECT 1 
			UNION SELECT 2 
			UNION SELECT 3 
			UNION SELECT 4 
			UNION SELECT 5 
			UNION SELECT 6 
			UNION SELECT 7 
			UNION SELECT 8 
			UNION SELECT 9
			)t3, (

			SELECT 0 i
			UNION SELECT 1 
			UNION SELECT 2 
			UNION SELECT 3 
			UNION SELECT 4 
			UNION SELECT 5 
			UNION SELECT 6 
			UNION SELECT 7 
			UNION SELECT 8 
			UNION SELECT 9
			)t4
			)v
			WHERE week(selected_date)=WEEK(NOW()) and YEAR(selected_date)=YEAR(NOW()) and selected_date<=NOW() order by selected_date desc");

			$content="";
			$i=0;
			////////////////////////////////////////

		while($data=$req_day_week->fetch())
		{
		    $i++;
			$content.='<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title">Date : '.$data['selected_date'].' </h3>
							<div class="box-tools pull-right">
							    <a class="btn btn-block btn-primary btn-xs" onclick="window.location=\'/?page=historique_appels&date='.$data['selected_date'].'\'">Historique</a>
                            </div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-6">
								    <h4 class="text-center"> 08:30:00  -  14:00:00</h4>
									<canvas style="height: 230px; width: 627px; " class="text-center" id="canvas_matin_'.$i.'"></canvas>
								</div>
								<div class="col-md-6">
								<h4 class="text-center"> 14:00:00  -  19:00:00</h4>
										<canvas style="height: 230px; width: 627px;" class="text-center" id="canvas_soir_'.$i.'"></canvas>
								</div>
							</div>
						</div>
					</div>
								<script>
								getgraphday("canvas_soir_'.$i.'","'.$data['selected_date'].'","soir");
								getgraphday("canvas_matin_'.$i.'","'.$data['selected_date'].'","matin");
								</script>
					</div>';
    		}
    		return $content;exit;
    
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
}