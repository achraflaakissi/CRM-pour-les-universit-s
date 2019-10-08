<?php
session_start();
/**
 * Created by PhpStorm.
 * User: ELMAHMOUDI
 * Date: 09/01/2017
 * Time: 01:50
 */

class ContactDirect
{
    
     private  $date_inscription;

    /**
     * @return mixed
     */
    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    /**
     * @param mixed $date_inscription
     */
    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }
    private $id;
    private $civilite;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $lieu_de_naissance;
    private $Nationalite;
    private $adresse;
    private $email;
    private  $anneeUniv;
    private $gsm;
    private $telephone;
    private $formation_demandee;
    private $niveau_demande;
    private $date_du_contact;
    private $bddtact_suite_a;
    private $nature_contact;
    private $Zone;
    private $ville;
    private $marche;
    private $depot_dossier;
    private $date_depot;
    private $numero_dossier;
    private $pieces;
    private $date_piece;
    private $statut_contact;
    private $test;
    private $date_test;
    private $CP;
    private $niveau_des_etudes;
    private $diplomes_obtenus;
    private $etablissement;
    private $annee_obtention_diplome;
    private $serie_bac;
    private $langue1;
    private $langue2;
    private $Langue3;
    private $Etat_Dossier;
    private $Resident;
    private $Type_Résidence;
    private $Visite;
    private $nomprenompere;
    private $nomprenommere;
    private $adresseparents;
    private $professionpere;
    private $professionmere;
    private $Saisi_par;
    private $Reçu_par;
    private $Observation;
    private $Frais_Dossier;
    private $Date_Frais;
    private $Envoi_Convocation;
    private $Test_Passe;
    private $Date_test_passe;
    private $Resultat;
    private $Inscrit;
    private $AbsTest;
    private $Ticket_Restau_resid;
    private $Reservation_Residence;
    private $Lycee_Public;
    private $Lycee_Prive;
    private $Lycee_Mission;
    private $Motif_Absence_Test;
    private $bddtact_Suivi_par;
    private $Insc_Reçu_par;
    private $Mail_Pere;
    private $Mail_Mere;
    private $Pays;
    private $Ville_Test;
    private $Pays_Test;
    private $facebook;
    private $Tel_Pere;
    private $Tel_Mere;
    private $Etape_Phoning1;
    private $Etape_Phoning2;
    private $Etape_Phoning3;
    private $Etape_Phoning4;
    private $Etape_Phoning5;
    private $Etape_Phoning;
    private $Date_Phoning1;
    private $Date_Phoning2;
    private $Date_Phoning3;
    private $Date_Phoning4;
    private $Date_Phoning5;
    private $Date_Dern_Phoning;
    private $Dern_Campagne;
    private $TA;
    private $EmailPhoning;
    private $Etape_Phoning6;
    private $Etape_Phoning7;
    private $Etape_Phoning8;
    private $Etape_Phoning9;
    private $Etape_Phoning10;
    private $Date_Phoning6;
    private $Date_Phoning7;
    private $Date_Phoning8;
    private $Date_Phoning9;
    private $Date_Phoning10;
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
    private $valide;
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
    private $EmailCmp;
    private $object;
    private $s1tc;
    private $s2tc;
    private $annuelletc;
    private $s1bac1;
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
    public function getId()
    {
        return $this->id;
    }
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * @param mixed $civilite
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->date_naissance;
    }

    /**
     * @param mixed $date_naissance
     */
    public function setDateNaissance($date_naissance)
    {
        $this->date_naissance = $date_naissance;
    }

    /**
     * @return mixed
     */
    public function getLieuDeNaissance()
    {
        return $this->lieu_de_naissance;
    }

    /**
     * @param mixed $lieu_de_naissance
     */
    public function setLieuDeNaissance($lieu_de_naissance)
    {
        $this->lieu_de_naissance = $lieu_de_naissance;
    }

    /**
     * @return mixed
     */
    public function getNationalite()
    {
        return $this->Nationalite;
    }

    /**
     * @param mixed $Nationalite
     */
    public function setNationalite($Nationalite)
    {
        $this->Nationalite = $Nationalite;
    }

    /**
     * @return mixed
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param mixed $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getGsm()
    {
        return $this->gsm;
    }

    /**
     * @param mixed $gsm
     */
    public function setGsm($gsm)
    {
        $this->gsm = $gsm;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getFormationDemandee()
    {
        return $this->formation_demandee;
    }

    /**
     * @param mixed $formation_demandee
     */
    public function setFormationDemandee($formation_demandee)
    {
        $this->formation_demandee = $formation_demandee;
    }

    /**
     * @return mixed
     */
    public function getNiveauDemande()
    {
        return $this->niveau_demande;
    }

    /**
     * @param mixed $niveau_demande
     */
    public function setNiveauDemande($niveau_demande)
    {
        $this->niveau_demande = $niveau_demande;
    }

    /**
     * @return mixed
     */
    public function getDateDuContact()
    {
        return $this->date_du_contact;
    }

    /**
     * @param mixed $date_du_contact
     */
    public function setDateDuContact($date_du_contact)
    {
        $this->date_du_contact = $date_du_contact;
    }

    /**
     * @return mixed
     */
    public function getContactSuiteA()
    {
        return $this->contact_suite_a;
    }

    /**
     * @param mixed $bddtact_suite_a
     */
    public function setContactSuiteA($bddtact_suite_a)
    {
        $this->contact_suite_a = $bddtact_suite_a;
    }

    /**
     * @return mixed
     */
    public function getAnneeUniv()
    {
        return $this->anneeUniv;
    }

    /**
     * @param mixed $anneeUniv
     */
    public function setAnneeUniv($anneeUniv)
    {
        $this->anneeUniv = $anneeUniv;
    }


    /**
     * @return mixed
     */
    public function getNatureContact()
    {
        return $this->nature_contact;
    }

    /**
     * @param mixed $nature_contact
     */
    public function setNatureContact($nature_contact)
    {
        $this->nature_contact = $nature_contact;
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
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return mixed
     */
    public function getMarche()
    {
        return $this->marche;
    }

    /**
     * @param mixed $marche
     */
    public function setMarche($marche)
    {
        $this->marche = $marche;
    }

    /**
     * @return mixed
     */
    public function getDepotDossier()
    {
        return $this->depot_dossier;
    }

    /**
     * @param mixed $depot_dossier
     */
    public function setDepotDossier($depot_dossier)
    {
        $this->depot_dossier = $depot_dossier;
    }

    /**
     * @return mixed
     */
    public function getDateDepot()
    {
        return $this->date_depot;
    }

    /**
     * @param mixed $date_depot
     */
    public function setDateDepot($date_depot)
    {
        $this->date_depot = $date_depot;
    }

    /**
     * @return mixed
     */
    public function getNumeroDossier()
    {
        return $this->numero_dossier;
    }

    /**
     * @param mixed $numero_dossier
     */
    public function setNumeroDossier($numero_dossier)
    {
        $this->numero_dossier = $numero_dossier;
    }

    /**
     * @return mixed
     */
    public function getPieces()
    {
        return $this->pieces;
    }

    /**
     * @param mixed $pieces
     */
    public function setPieces($pieces)
    {
        $this->pieces = $pieces;
    }

    /**
     * @return mixed
     */
    public function getDatePiece()
    {
        return $this->date_piece;
    }

    /**
     * @param mixed $date_piece
     */
    public function setDatePiece($date_piece)
    {
        $this->date_piece = $date_piece;
    }

    /**
     * @return mixed
     */
    public function getStatutContact()
    {
        return $this->statut_contact;
    }

    /**
     * @param mixed $statut_contact
     */
    public function setStatutContact($statut_contact)
    {
        $this->statut_contact = $statut_contact;
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->test = $test;
    }

    /**
     * @return mixed
     */
    public function getDateTest()
    {
        return $this->date_test;
    }

    /**
     * @param mixed $date_test
     */
    public function setDateTest($date_test)
    {
        $this->date_test = $date_test;
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
    public function getNiveauDesEtudes()
    {
        return $this->niveau_des_etudes;
    }

    /**
     * @param mixed $niveau_des_etudes
     */
    public function setNiveauDesEtudes($niveau_des_etudes)
    {
        $this->niveau_des_etudes = $niveau_des_etudes;
    }

    /**
     * @return mixed
     */
    public function getDiplomesObtenus()
    {
        return $this->diplomes_obtenus;
    }

    /**
     * @param mixed $diplomes_obtenus
     */
    public function setDiplomesObtenus($diplomes_obtenus)
    {
        $this->diplomes_obtenus = $diplomes_obtenus;
    }

    /**
     * @return mixed
     */
    public function getEtablissement()
    {
        return $this->etablissement;
    }

    /**
     * @param mixed $etablissement
     */
    public function setEtablissement($etablissement)
    {
        $this->etablissement = $etablissement;
    }

    /**
     * @return mixed
     */
    public function getAnneeObtentionDiplome()
    {
        return $this->annee_obtention_diplome;
    }

    /**
     * @param mixed $annee_obtention_diplome
     */
    public function setAnneeObtentionDiplome($annee_obtention_diplome)
    {
        $this->annee_obtention_diplome = $annee_obtention_diplome;
    }

    /**
     * @return mixed
     */
    public function getSerieBac()
    {
        return $this->serie_bac;
    }

    /**
     * @param mixed $serie_bac
     */
    public function setSerieBac($serie_bac)
    {
        $this->serie_bac = $serie_bac;
    }

    /**
     * @return mixed
     */
    public function getLangue1()
    {
        return $this->langue1;
    }

    /**
     * @param mixed $langue1
     */
    public function setLangue1($langue1)
    {
        $this->langue1 = $langue1;
    }

    /**
     * @return mixed
     */
    public function getLangue2()
    {
        return $this->langue2;
    }

    /**
     * @param mixed $langue2
     */
    public function setLangue2($langue2)
    {
        $this->langue2 = $langue2;
    }

    /**
     * @return mixed
     */
    public function getLangue3()
    {
        return $this->Langue3;
    }

    /**
     * @param mixed $Langue3
     */
    public function setLangue3($Langue3)
    {
        $this->Langue3 = $Langue3;
    }

    /**
     * @return mixed
     */
    public function getEtatDossier()
    {
        return $this->Etat_Dossier;
    }

    /**
     * @param mixed $Etat_Dossier
     */
    public function setEtatDossier($Etat_Dossier)
    {
        $this->Etat_Dossier = $Etat_Dossier;
    }

    /**
     * @return mixed
     */
    public function getResident()
    {
        return $this->Resident;
    }

    /**
     * @param mixed $Resident
     */
    public function setResident($Resident)
    {
        $this->Resident = $Resident;
    }

    /**
     * @return mixed
     */
    public function getTypeRésidence()
    {
        return $this->Type_Résidence;
    }

    /**
     * @param mixed $Type_Résidence
     */
    public function setTypeRésidence($Type_Résidence)
    {
        $this->Type_Résidence = $Type_Résidence;
    }

    /**
     * @return mixed
     */
    public function getVisite()
    {
        return $this->Visite;
    }

    /**
     * @param mixed $Visite
     */
    public function setVisite($Visite)
    {
        $this->Visite = $Visite;
    }

    /**
     * @return mixed
     */
    public function getNomprenompere()
    {
        return $this->nomprenompere;
    }

    /**
     * @param mixed $nomprenompere
     */
    public function setNomprenompere($nomprenompere)
    {
        $this->nomprenompere = $nomprenompere;
    }

    /**
     * @return mixed
     */
    public function getNomprenommere()
    {
        return $this->nomprenommere;
    }

    /**
     * @param mixed $nomprenommere
     */
    public function setNomprenommere($nomprenommere)
    {
        $this->nomprenommere = $nomprenommere;
    }

    /**
     * @return mixed
     */
    public function getAdresseparents()
    {
        return $this->adresseparents;
    }

    /**
     * @param mixed $adresseparents
     */
    public function setAdresseparents($adresseparents)
    {
        $this->adresseparents = $adresseparents;
    }

    /**
     * @return mixed
     */
    public function getProfessionpere()
    {
        return $this->professionpere;
    }

    /**
     * @param mixed $professionpere
     */
    public function setProfessionpere($professionpere)
    {
        $this->professionpere = $professionpere;
    }

    /**
     * @return mixed
     */
    public function getProfessionmere()
    {
        return $this->professionmere;
    }

    /**
     * @param mixed $professionmere
     */
    public function setProfessionmere($professionmere)
    {
        $this->professionmere = $professionmere;
    }

    /**
     * @return mixed
     */
    public function getSaisiPar()
    {
        return $_SESSION['user']['id'];
    }

    /**
     * @param mixed $Saisi_par
     */
    public function setSaisiPar($Saisi_par)
    {
        $this->Saisi_par = $Saisi_par;
    }

    /**
     * @return mixed
     */
    public function getReçuPar()
    {
        return $this->Reçu_par;
    }

    /**
     * @param mixed $Reçu_par
     */
    public function setReçuPar($Reçu_par)
    {
        $this->Reçu_par = $Reçu_par;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->Observation;
    }

    /**
     * @param mixed $Observation
     */
    public function setObservation($Observation)
    {
        $this->Observation = $Observation;
    }

    /**
     * @return mixed
     */
    public function getFraisDossier()
    {
        return $this->Frais_Dossier;
    }

    /**
     * @param mixed $Frais_Dossier
     */
    public function setFraisDossier($Frais_Dossier)
    {
        $this->Frais_Dossier = $Frais_Dossier;
    }

    /**
     * @return mixed
     */
    public function getDateFrais()
    {
        return $this->Date_Frais;
    }

    /**
     * @param mixed $Date_Frais
     */
    public function setDateFrais($Date_Frais)
    {
        $this->Date_Frais = $Date_Frais;
    }

    /**
     * @return mixed
     */
    public function getEnvoiConvocation()
    {
        return $this->Envoi_Convocation;
    }

    /**
     * @param mixed $Envoi_Convocation
     */
    public function setEnvoiConvocation($Envoi_Convocation)
    {
        $this->Envoi_Convocation = $Envoi_Convocation;
    }

    /**
     * @return mixed
     */
    public function getTestPasse()
    {
        return $this->Test_Passe;
    }

    /**
     * @param mixed $Test_Passe
     */
    public function setTestPasse($Test_Passe)
    {
        $this->Test_Passe = $Test_Passe;
    }

    /**
     * @return mixed
     */
    public function getDateTestPasse()
    {
        return $this->Date_test_passe;
    }

    /**
     * @param mixed $Date_test_passe
     */
    public function setDateTestPasse($Date_test_passe)
    {
        $this->Date_test_passe = $Date_test_passe;
    }

    /**
     * @return mixed
     */
    public function getResultat()
    {
        return $this->Resultat;
    }

    /**
     * @param mixed $Resultat
     */
    public function setResultat($Resultat)
    {
        $this->Resultat = $Resultat;
    }

    /**
     * @return mixed
     */
    public function getInscrit()
    {
        return $this->Inscrit;
    }

    /**
     * @param mixed $Inscrit
     */
    public function setInscrit($Inscrit)
    {
        $this->Inscrit = $Inscrit;
    }

    /**
     * @return mixed
     */
    public function getAbsTest()
    {
        return $this->AbsTest;
    }

    /**
     * @param mixed $AbsTest
     */
    public function setAbsTest($AbsTest)
    {
        $this->AbsTest = $AbsTest;
    }

    /**
     * @return mixed
     */
    public function getTicketRestauResid()
    {
        return $this->Ticket_Restau_resid;
    }

    /**
     * @param mixed $Ticket_Restau_resid
     */
    public function setTicketRestauResid($Ticket_Restau_resid)
    {
        $this->Ticket_Restau_resid = $Ticket_Restau_resid;
    }

    /**
     * @return mixed
     */
    public function getReservationResidence()
    {
        return $this->Reservation_Residence;
    }

    /**
     * @param mixed $Reservation_Residence
     */
    public function setReservationResidence($Reservation_Residence)
    {
        $this->Reservation_Residence = $Reservation_Residence;
    }

    /**
     * @return mixed
     */
    public function getLyceePublic()
    {
        return $this->Lycee_Public;
    }

    /**
     * @param mixed $Lycee_Public
     */
    public function setLyceePublic($Lycee_Public)
    {
        $this->Lycee_Public = $Lycee_Public;
    }

    /**
     * @return mixed
     */
    public function getLyceePrive()
    {
        return $this->Lycee_Prive;
    }

    /**
     * @param mixed $Lycee_Prive
     */
    public function setLyceePrive($Lycee_Prive)
    {
        $this->Lycee_Prive = $Lycee_Prive;
    }

    /**
     * @return mixed
     */
    public function getLyceeMission()
    {
        return $this->Lycee_Mission;
    }

    /**
     * @param mixed $Lycee_Mission
     */
    public function setLyceeMission($Lycee_Mission)
    {
        $this->Lycee_Mission = $Lycee_Mission;
    }

    /**
     * @return mixed
     */
    public function getMotifAbsenceTest()
    {
        return $this->Motif_Absence_Test;
    }

    /**
     * @param mixed $Motif_Absence_Test
     */
    public function setMotifAbsenceTest($Motif_Absence_Test)
    {
        $this->Motif_Absence_Test = $Motif_Absence_Test;
    }

    /**
     * @return mixed
     */
    public function getContactSuiviPar()
    {
        return $this->Contact_Suivi_par;
    }

    /**
     * @param mixed $bddtact_Suivi_par
     */
    public function setContactSuiviPar($bddtact_Suivi_par)
    {
        $this->Contact_Suivi_par = $bddtact_Suivi_par;
    }

    /**
     * @return mixed
     */
    public function getInscReçuPar()
    {
        return $this->Insc_Reçu_par;
    }

    /**
     * @param mixed $Insc_Reçu_par
     */
    public function setInscReçuPar($Insc_Reçu_par)
    {
        $this->Insc_Reçu_par = $Insc_Reçu_par;
    }

    /**
     * @return mixed
     */
    public function getMailPere()
    {
        return $this->Mail_Pere;
    }

    /**
     * @param mixed $Mail_Pere
     */
    public function setMailPere($Mail_Pere)
    {
        $this->Mail_Pere = $Mail_Pere;
    }

    /**
     * @return mixed
     */
    public function getMailMere()
    {
        return $this->Mail_Mere;
    }

    /**
     * @param mixed $Mail_Mere
     */
    public function setMailMere($Mail_Mere)
    {
        $this->Mail_Mere = $Mail_Mere;
    }

    /**
     * @return mixed
     */
    public function getPays()
    {
        return $this->Pays;
    }

    /**
     * @param mixed $Pays
     */
    public function setPays($Pays)
    {
        $this->Pays = $Pays;
    }

    /**
     * @return mixed
     */
    public function getVilleTest()
    {
        return $this->Ville_Test;
    }

    /**
     * @param mixed $Ville_Test
     */
    public function setVilleTest($Ville_Test)
    {
        $this->Ville_Test = $Ville_Test;
    }

    /**
     * @return mixed
     */
    public function getPaysTest()
    {
        return $this->Pays_Test;
    }

    /**
     * @param mixed $Pays_Test
     */
    public function setPaysTest($Pays_Test)
    {
        $this->Pays_Test = $Pays_Test;
    }

    /**
     * @return mixed
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * @param mixed $facebook
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;
    }

    /**
     * @return mixed
     */
    public function getTelPere()
    {
        return $this->Tel_Pere;
    }

    /**
     * @param mixed $Tel_Pere
     */
    public function setTelPere($Tel_Pere)
    {
        $this->Tel_Pere = $Tel_Pere;
    }

    /**
     * @return mixed
     */
    public function getTelMere()
    {
        return $this->Tel_Mere;
    }

    /**
     * @param mixed $Tel_Mere
     */
    public function setTelMere($Tel_Mere)
    {
        $this->Tel_Mere = $Tel_Mere;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning1()
    {
        return $this->Etape_Phoning1;
    }

    /**
     * @param mixed $Etape_Phoning1
     */
    public function setEtapePhoning1($Etape_Phoning1)
    {
        $this->Etape_Phoning1 = $Etape_Phoning1;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning2()
    {
        return $this->Etape_Phoning2;
    }

    /**
     * @param mixed $Etape_Phoning2
     */
    public function setEtapePhoning2($Etape_Phoning2)
    {
        $this->Etape_Phoning2 = $Etape_Phoning2;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning3()
    {
        return $this->Etape_Phoning3;
    }

    /**
     * @param mixed $Etape_Phoning3
     */
    public function setEtapePhoning3($Etape_Phoning3)
    {
        $this->Etape_Phoning3 = $Etape_Phoning3;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning4()
    {
        return $this->Etape_Phoning4;
    }

    /**
     * @param mixed $Etape_Phoning4
     */
    public function setEtapePhoning4($Etape_Phoning4)
    {
        $this->Etape_Phoning4 = $Etape_Phoning4;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning5()
    {
        return $this->Etape_Phoning5;
    }

    /**
     * @param mixed $Etape_Phoning5
     */
    public function setEtapePhoning5($Etape_Phoning5)
    {
        $this->Etape_Phoning5 = $Etape_Phoning5;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning()
    {
        return $this->Etape_Phoning;
    }

    /**
     * @param mixed $Etape_Phoning
     */
    public function setEtapePhoning($Etape_Phoning)
    {
        $this->Etape_Phoning = $Etape_Phoning;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning1()
    {
        return $this->Date_Phoning1;
    }

    /**
     * @param mixed $Date_Phoning1
     */
    public function setDatePhoning1($Date_Phoning1)
    {
        $this->Date_Phoning1 = $Date_Phoning1;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning2()
    {
        return $this->Date_Phoning2;
    }

    /**
     * @param mixed $Date_Phoning2
     */
    public function setDatePhoning2($Date_Phoning2)
    {
        $this->Date_Phoning2 = $Date_Phoning2;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning3()
    {
        return $this->Date_Phoning3;
    }

    /**
     * @param mixed $Date_Phoning3
     */
    public function setDatePhoning3($Date_Phoning3)
    {
        $this->Date_Phoning3 = $Date_Phoning3;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning4()
    {
        return $this->Date_Phoning4;
    }

    /**
     * @param mixed $Date_Phoning4
     */
    public function setDatePhoning4($Date_Phoning4)
    {
        $this->Date_Phoning4 = $Date_Phoning4;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning5()
    {
        return $this->Date_Phoning5;
    }

    /**
     * @param mixed $Date_Phoning5
     */
    public function setDatePhoning5($Date_Phoning5)
    {
        $this->Date_Phoning5 = $Date_Phoning5;
    }

    /**
     * @return mixed
     */
    public function getDateDernPhoning()
    {
        return $this->Date_Dern_Phoning;
    }

    /**
     * @param mixed $Date_Dern_Phoning
     */
    public function setDateDernPhoning($Date_Dern_Phoning)
    {
        $this->Date_Dern_Phoning = $Date_Dern_Phoning;
    }

    /**
     * @return mixed
     */
    public function getDernCampagne()
    {
        return $this->Dern_Campagne;
    }

    /**
     * @param mixed $Dern_Campagne
     */
    public function setDernCampagne($Dern_Campagne)
    {
        $this->Dern_Campagne = $Dern_Campagne;
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
    public function getEtapePhoning6()
    {
        return $this->Etape_Phoning6;
    }

    /**
     * @param mixed $Etape_Phoning6
     */
    public function setEtapePhoning6($Etape_Phoning6)
    {
        $this->Etape_Phoning6 = $Etape_Phoning6;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning7()
    {
        return $this->Etape_Phoning7;
    }

    /**
     * @param mixed $Etape_Phoning7
     */
    public function setEtapePhoning7($Etape_Phoning7)
    {
        $this->Etape_Phoning7 = $Etape_Phoning7;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning8()
    {
        return $this->Etape_Phoning8;
    }

    /**
     * @param mixed $Etape_Phoning8
     */
    public function setEtapePhoning8($Etape_Phoning8)
    {
        $this->Etape_Phoning8 = $Etape_Phoning8;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning9()
    {
        return $this->Etape_Phoning9;
    }

    /**
     * @param mixed $Etape_Phoning9
     */
    public function setEtapePhoning9($Etape_Phoning9)
    {
        $this->Etape_Phoning9 = $Etape_Phoning9;
    }

    /**
     * @return mixed
     */
    public function getEtapePhoning10()
    {
        return $this->Etape_Phoning10;
    }

    /**
     * @param mixed $Etape_Phoning10
     */
    public function setEtapePhoning10($Etape_Phoning10)
    {
        $this->Etape_Phoning10 = $Etape_Phoning10;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning6()
    {
        return $this->Date_Phoning6;
    }

    /**
     * @param mixed $Date_Phoning6
     */
    public function setDatePhoning6($Date_Phoning6)
    {
        $this->Date_Phoning6 = $Date_Phoning6;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning7()
    {
        return $this->Date_Phoning7;
    }

    /**
     * @param mixed $Date_Phoning7
     */
    public function setDatePhoning7($Date_Phoning7)
    {
        $this->Date_Phoning7 = $Date_Phoning7;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning8()
    {
        return $this->Date_Phoning8;
    }

    /**
     * @param mixed $Date_Phoning8
     */
    public function setDatePhoning8($Date_Phoning8)
    {
        $this->Date_Phoning8 = $Date_Phoning8;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning9()
    {
        return $this->Date_Phoning9;
    }

    /**
     * @param mixed $Date_Phoning9
     */
    public function setDatePhoning9($Date_Phoning9)
    {
        $this->Date_Phoning9 = $Date_Phoning9;
    }

    /**
     * @return mixed
     */
    public function getDatePhoning10()
    {
        return $this->Date_Phoning10;
    }

    /**
     * @param mixed $Date_Phoning10
     */
    public function setDatePhoning10($Date_Phoning10)
    {
        $this->Date_Phoning10 = $Date_Phoning10;
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

    /**
     * @return mixed
     */
    public function getValide()
    {
        return $this->valide;
    }

    /**
     * @param mixed $valide
     */
    public function setValide($valide)
    {
        $this->valide = $valide;
    }
	
	public function Validercontactdirect()
    {
          include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
         $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->prepare('UPDATE `contact_direct` SET Contact_Suivi_par= ? , `Nom` = ? , `Prenom`= ? , `E-Mail`=? , `GSM`=?, `Tel`=?,`Tel_Pere`=?,Etablissement=?,Formation_Demmandee=? ,Ville=?,Nature_de_Contact=?,`valide`=?,test=?,Marche=? where md5(id) = ?');
        if(intval($this->getContactsuivipar())==0)
        {
            $nom = substr($this->getContactsuivipar(),0,strpos($this->getContactsuivipar(),' '));

            $requ1=$bdd->query('select id from users where nom like "%'.$nom.'%" ');
            $this->setContactsuivipar($requ1->fetchAll()[0]['id']);
        }
        $values = array($this->getContactSuiviPar(),$this->getNom(),$this->getPrenom(),$this->getEmail(),$this->getGSM(),$this->getTelephone(),$this->getTelPere(),$this->getEtablissement(),
            $this->getFormationDemandee(),$this->getVille(),$this->getNatureContact(),$this->getValide(),
$this->getTest(),$this->getMarche(),$this->getId());
        $this->changeetat(md5($this->getId()));
        return $requ->execute($values);
    }



    public function add($suivi=null)
    {
        include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        if(is_null($suivi))
        {
         
        $requ = $bdd->prepare("INSERT INTO `contact_direct`(`civilite`, `nom`, `prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`, `Nationalite`, `adresse`, `E-Mail`,
        `GSM`, `Tel`,
 `Formation_Demmandee`, `niveau_demande`, `date_du_contact`, `contact_suite_a`, `Nature_de_Contact`,  `ville`, `test`, `date_test`, `niveau_des_etudes`,
           `diplomes_obtenus`, `etablissement`, `Annee_Obtention`, `serie_bac`, `langue1`, `langue2`, `Langue3`, `Etat_Dossier`, `Resident`, `Type_Résidence`, `Visite`,
           `nomprenompere`, `nomprenommere`, `adresseparents`, `professionpere`, `professionmere`, `Saisi_par`, `Reçu_par`, `Observation`,  `Lycee_Public`, `Lycee_Prive`,
            `Lycee_Mission`, `Mail_Pere`, `Mail_Mere`,`Tel_Pere`, `Tel_Mere`,`Marche`,`Annee_Univ`,`s1tc`, `s2tc`, `annuelletc`, `s1bac1`, `s2bac1`,
             `annuellebac1`, `noteregional`, `s1bac2`, `s2bac2`, `annuellebac2`, `notenational`, `notegenerale`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            //59
        $params= array(
            $this->getCivilite(),
            $this->getNom(),
            $this->getPrenom(),$this->getDateNaissance(),$this->getLieuDeNaissance(),$this->getNationalite(),$this->getAdresse(),$this->getEmail(),
            $this->getGsm(),$this->getTelephone(),
            $this->getFormationDemandee(),$this->getNiveauDemande(),$this->getDateDuContact(),$this->getContactSuiteA(),$this->getNatureContact()
        ,$this->getVille(),$this->getTest(),$this->getDateTest(),
            $this->getNiveauDesEtudes(),$this->getDiplomesObtenus(),$this->getEtablissement(),$this->getAnneeObtentionDiplome(),$this->getSerieBac(),
            $this->getLangue1(),$this->getLangue2(),$this->getLangue3(),$this->getEtatDossier(),$this->getResident(),
            $this->getTypeRésidence(),$this->getVisite(),$this->getNomprenompere(),$this->getNomprenommere(),$this->getAdresseparents(),
            $this->getProfessionpere(),$this->getProfessionmere(),$this->getSaisiPar(),$this->getReçuPar(),$this->getObservation(),$this->getLyceePublic(),$this->getLyceePrive()
        ,$this->getLyceeMission(),$this->getMailPere(),$this->getMailMere(),$this->getTelPere(),$this->getTelMere(),$this->getMarche(),$this->getAnneeUniv(),$this->getS1tc(),
        $this->getS2tc(),$this->getAnnuelletc(),$this->getS1bac1(),$this->getS2bac1(),$this->getAnnuellebac1(),
            $this->getNoteregional(),$this->getS1bac2(),$this->getS2bac2(),$this->getAnnuellebac2(),$this->getNotenational(),$this->getNotegenerale());
        return $requ->execute($params);
        }
        else
        {
            
            
          
            
            $requ = $bdd->prepare("INSERT INTO `contact_direct`(`civilite`, `nom`, `prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`, `Nationalite`, `adresse`, `E-Mail`,
        `GSM`, `Tel`,`Formation_Demmandee`, `niveau_demande`, `date_du_contact`, `contact_suite_a`,`Nature_de_Contact`,  `ville`,  `Resident`, `Type_Résidence`,
            `Mail_Pere`, `Mail_Mere`,`Tel_Pere`, `Tel_Mere`,Contact_suivi_par,	Observation,Reçu_par) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            //59
        $params= array(
            $this->getCivilite(),
            $this->getNom(),
            $this->getPrenom(),$this->getDateNaissance(),$this->getLieuDeNaissance(),$this->getNationalite(),$this->getAdresse(),$this->getEmail(),
            $this->getGsm(),$this->getTelephone(),
            $this->getFormationDemandee(),$this->getNiveauDemande(),$this->getDateDuContact(),$this->getContactSuiteA(),$this->getNatureContact()
        ,$this->getVille(),$this->getResident(),
            $this->getTypeRésidence(),$this->getMailPere(),$this->getMailMere(),$this->getTelPere(),$this->getTelMere(),$this->getContactSuiviPar(),$this->getObservation(),100);
        return $requ->execute($params);
        }
    }
    public function  Allcontacts($valide)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
            return $bdd->query('SELECT c.id, CONCAT( u.nom, CONCAT(  " ", u.prenom ) ) AS Contact_Suivi_par, c.Etablissement, c.Nom, c.Prenom, `E-Mail` , c.GSM, c.Tel, c.Formation_Demmandee, c.Nature_de_Contact, c.Annee_Univ, c.Ville, c.Tel_Pere,  c.Tel_Mere, valide,test,c.Marche
            FROM contact_direct c
            LEFT JOIN users u ON u.id = c.Contact_Suivi_par
            WHERE valide =0
            
            ');
    }
    
    public function supprimercontact($id)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $requ=$bdd->prepare("DELETE FROM `contact_direct` WHERE id = ?");
        return $requ->execute(array($id));
    }
    public function update()
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $req = $bdd->prepare("select `Campagne1`, `Campagne2`, `Campagne3`, `Campagne4`, `Campagne5`, `Campagne6`, `Campagne7`, `Campagne8`, `Campagne9`, `Campagne10` from `contact_direct` where CAST(MD5(`id`) AS CHAR CHARACTER SET utf8)=?");
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
                }
                elseif(empty($donner['Campagne2']))
                {
                    $valeur="Campagne2 = ?";
                    $ta="TA2 = ?";
                    $script="script2 = ?";
                    $email="email2 = ?";
                    $object="object2 = ?";
                }
                elseif(empty($donner['Campagne3']))
                {
                    $valeur="Campagne3 = ?";
                    $ta="TA3 = ?";
                    $script="script3 = ?";
                    $email="email3 = ?";
                    $object="object3 = ?";
                }
                elseif(empty($donner['Campagne4']))
                {
                    $valeur="Campagne4 = ?";
                    $ta="TA4 = ?";
                    $script="script4 = ?";
                    $email="email4 = ?";
                    $object="object4 = ?";
                }
                elseif(empty($donner['Campagne5']))
                {
                    $valeur="Campagne5 = ?";
                    $ta="TA5 = ?";
                    $script="script5 = ?";
                    $email="email5 = ?";
                    $object="object5 = ?";
                }elseif(empty($donner['Campagne6']))
                {
                    $valeur="Campagne6 = ?";
                    $ta="TA6 = ?";
                    $script="script6 = ?";
                    $email="email6 = ?";
                    $object="object6 = ?";
                }elseif(empty($donner['Campagne7']))
                {
                    $valeur="Campagne7 = ?";
                    $ta="TA7 = ?";
                    $script="script7 = ?";
                    $email="email7 = ?";
                    $object="object7 = ?";
                }
                elseif(empty($donner['Campagne8']))
                {
                    $valeur="Campagne8 = ?";
                    $ta="TA8 = ?";
                    $script="script8 = ?";
                    $email="email8 = ?";
                    $object="object8 = ?";
                }
                elseif(empty($donner['Campagne9']))
                {
                    $valeur="Campagne9 = ?";
                    $ta="TA9 = ?";
                    $script="script9 = ?";
                    $email="email9 = ?";
                    $object="object9 = ?";
                }
                elseif(empty($donner['Campagne10']))
                {
                    $valeur="Campagne10 = ?";
                    $ta="TA10 = ?";
                    $script="script10 = ?";
                    $email="email10 = ?";
                    $object="object10 = ?";
                }
            }
            $req = $bdd->prepare("update `contact_direct` set $valeur,$ta,$script,$email,$object  where MD5(id)=?");
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
    public function autoupdate($type,$marche,$nbrjour)
    {
        $test=false;
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        if($type=="datecontact") {
//            echo "select id,`Campagne1`, `Campagne2`, `Campagne3`, `Campagne4`, `Campagne5`, `Campagne6`, `Campagne7`, `Campagne8`, `Campagne9`, `Campagne10` from `contact_direct` where (DATE_ADD(date_du_contact,INTERVAL " . $nbrjour . " DAY)=CURDATE()) and Marche='$marche' ";exit;
            $req = $bdd->query("select id,`Campagne1`, `Campagne2`, `Campagne3`, `Campagne4`, `Campagne5`, `Campagne6`, `Campagne7`, `Campagne8`, `Campagne9`, `Campagne10` from `contact_direct` where (DATE_ADD(date_du_contact,INTERVAL " . $nbrjour . " DAY)=CURDATE()) and Marche='$marche' ");
            $valeur = "";
            $ta = "";
            while ($donner = $req->fetch()) {
                if (empty($donner['Campagne1'])) {
                    $valeur = "Campagne1 = ?";
                    $ta = "TA1 = ?";
                } elseif (empty($donner['Campagne2'])) {
                    $valeur = "Campagne2 = ?";
                    $ta = "TA2 = ?";
                } elseif (empty($donner['Campagne3'])) {
                    $valeur = "Campagne3 = ?";
                    $ta = "TA3 = ?";
                } elseif (empty($donner['Campagne4'])) {
                    $valeur = "Campagne4 = ?";
                    $ta = "TA4 = ?";
                } elseif (empty($donner['Campagne5'])) {
                    $valeur = "Campagne5 = ?";
                    $ta = "TA5 = ?";
                } elseif (empty($donner['Campagne6'])) {
                    $valeur = "Campagne6 = ?";
                    $ta = "TA6 = ?";
                    $script = "script6 = ?";
                } elseif (empty($donner['Campagne7'])) {
                    $valeur = "Campagne7 = ?";
                    $ta = "TA7 = ?";
                } elseif (empty($donner['Campagne8'])) {
                    $valeur = "Campagne8 = ?";
                    $ta = "TA8 = ?";
                } elseif (empty($donner['Campagne9'])) {
                    $valeur = "Campagne9 = ?";
                    $ta = "TA9 = ?";
                } elseif (empty($donner['Campagne10'])) {
                    $valeur = "Campagne10 = ?";
                    $ta = "TA10 = ?";
                }
                try
                {
                    $reqe = $bdd->prepare("update `contact_direct` set $valeur,$ta,dern_auto_cmp=CURDATE() where id=?");
                    $param = array($this->getCampagne1(),$this->getTA(),$donner['id']);
                    if($reqe->execute($param))
                    {
                        $this->changeetat(md5($donner['id']));
                        $test=true;
                    }
                    else
                    {
                        $test=false;
                    }
                }
            catch(Exception $e)
                {
                    die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
                }
            }
            if($test)
            {
                return true;
            }
        }
        elseif($type=="date_depot")
        {

        }
        elseif($type=="date_test")
        {

        }
        elseif($type=="Test_Passe")
        {

        }
        elseif($type=="RDVF")
        {

        }

    }
    public function changeetat($id)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        try{
            $requ=$bdd->prepare('UPDATE `contact_direct` SET `TypeExp`= \'M\',Exp=0 where md5(id) = ? and Exp=1');
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
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        try{
            $requ=$bdd->query('SELECT id, `Nom`,`Prenom`,`GSM`,`Tel`,`E-Mail` FROM `contact_direct` WHERE (`Nom` like "%'.$test.'%" or `Prenom` like "%'.$test.'%" or `GSM` like "%'.$test.'%" or `Tel` like "%'.$test.'%") ');
            $value="";
            while($data=$requ->fetch())
            {
                    $value.= '<tr>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CD&auth='.md5($data['id']).'\')">'.$data['Nom'].' '.$data['Prenom'].'</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CD&auth='.md5($data['id']).'\')">Contact Direct</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CD&auth='.md5($data['id']).'\')">'.$data['Tel'].'</td>
                                        <td onclick="window.open(\''.$location.'?page=rappel&type=CD&auth='.md5($data['id']).'\')">'.$data['GSM'].'</td>
                                    </tr>';

            }
            return $value;
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
    public function MettreAjour($suivi=null)
    {
        if(is_null($suivi)) {
        if($_SESSION['user']['role1']=="1")
        {
            $suivi_par=$this->getContactSuiviPar();
            $req=",Contact_Suivi_par='".$suivi_par."',date_affectation=now()";
        }
        else
        {
            $req="";
        }
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $requ=$bdd->prepare('UPDATE `contact_direct` SET `Civilite`= ?,`date_inscription`=?,`Nom`=?,`Prenom`=?,`Date_de_Naissance`=?,
        `Lieu_de_Naissance`=?,`Nationalite`=?,`Adresse`=?,`E-Mail`=?,`GSM`=?,`Tel`=?,
        `Formation_Demmandee`=?,`niveau_demande`=?,`date_du_contact`=?,`contact_suite_a`=?,
        `Nature_de_Contact`=?,`Annee_Univ`=?,`Zone`=?,`Ville`=?,`Marche`=?,`depot_dossier`=?,
        `date_depot`=?,`numero_dossier`=?,`pieces`=?,`date_piece`=?,`StatutContact`=?,`test`=?,
        `date_test`=?,`Niveau_des_etudes`=?,`diplomes_obtenus`=?,`Etablissement`=?,
        `Annee_Obtention`=?,`serie_bac`=?,`langue1`=?,`langue2`=?,`Langue3`=?,`Etat_Dossier`=?,
        `Resident`=?,`Type_Résidence`=?,`Visite`=?,`nomprenompere`=?,`nomprenommere`=?,
        `adresseparents`=?,`professionpere`=?,`professionmere`=?,
        `Observation`=?,`Frais_Dossier`=?,`Date_Frais`=?,`Envoi_Convocation`=?,`Test_Passe`=?,
        `Date_test_passe`=?,`Resultat`=?,`Inscrit`=?,`AbsTest`=?,`Reservation_Residence`=?,
        `Lycee_Public`=?,`Lycee_Prive`=?,`Lycee_Mission`=?,
        `Motif_Absence_Test`=?,`Insc_Reçu_par`=?,`Mail_Pere`=?,
        `Mail_Mere`=?,`Pays`=?,`Ville_Test`=?,`Pays_Test`=?,`facebook`=?,`Tel_Pere`=?,
        Etat_Dossier=?,
        `Tel_Mere`=?,`s1tc`=?, `s2tc`=?, `annuelletc`=?, `s1bac1`=?, `s2bac1`=?, `annuellebac1`=?, `noteregional`=?, `s1bac2`=?,
         `s2bac2`=?, `annuellebac2`=?, `notenational`=?, `notegenerale`=? '.$req.' where md5(id) = ?');
        //70
        /*if(intval($this->getContactsuivipar())==0)
        {
            $nom = substr($this->getContactsuivipar(),0,strpos($this->getContactsuivipar(),' '));
           
            $requ1=$bdd->query('select id from users where nom like "%'.$nom.'%" ');
            $this->setContactsuivipar($requ1->fetchAll()[0]['id']);
        }*/
        
        $params= array($this->getCivilite(),
        $this->getDateInscription(),
            $this->getNom(),
            $this->getPrenom(),$this->getDateNaissance(),$this->getLieuDeNaissance(),$this->getNationalite(),$this->getAdresse(),
            $this->getEmail(),
            $this->getGsm(),$this->getTelephone(),
            $this->getFormationDemandee(),$this->getNiveauDemande(),$this->getDateDuContact(),$this->getContactSuiteA(),
            $this->getNatureContact(),$this->getAnneeUniv()
        ,$this->getZone(),$this->getVille(),$this->getMarche(),$this->getDepotDossier(),$this->getDateDepot(),
            $this->getNumeroDossier(),$this->getPieces(),$this->getDatePiece(),$this->getStatutContact(),
            $this->getTest(),$this->getDateTest(),
            $this->getNiveauDesEtudes(),$this->getDiplomesObtenus(),$this->getEtablissement(),$this->getAnneeObtentionDiplome(),
            $this->getSerieBac(),
            $this->getLangue1(),$this->getLangue2(),$this->getLangue3(),$this->getEtatDossier(),$this->getResident(),
            $this->getTypeRésidence(),$this->getVisite(),$this->getNomprenompere(),$this->getNomprenommere(),$this->getAdresseparents(),
            $this->getProfessionpere(),$this->getProfessionmere(),$this->getObservation(),
            $this->getFraisDossier(),$this->getDateFrais(),
            $this->getEnvoiConvocation(),$this->getTestPasse(),$this->getDateTestPasse(),$this->getResultat(),$this->getInscrit(),
            $this->getAbsTest(),$this->getReservationResidence(),
            $this->getLyceePublic(),$this->getLyceePrive()
        ,$this->getLyceeMission(),$this->getMotifAbsenceTest(),$this->getInscReçuPar(),$this->getMailPere(),
            $this->getMailMere(),$this->getPays(),
            $this->getVilleTest(),$this->getPaysTest(),$this->getFacebook(),
            $this->getTelPere(),$this->getEtatDossier(),$this->getTelMere(),$this->getS1tc(),$this->getS2tc(),$this->getAnnuelletc(),$this->getS1bac1(),$this->getS2bac1(),$this->getAnnuellebac1(),
            $this->getNoteregional(),$this->getS1bac2(),$this->getS2bac2(),$this->getAnnuellebac2(),$this->getNotenational(),$this->getNotegenerale(),$this->getId());
            $this->changeetat($this->getId());
        echo $requ->execute($params);
        }
        else
        {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $requ=$bdd->prepare('UPDATE `contact_direct` SET `Civilite`= ?,`date_inscription`=?,`Nom`=?,`Prenom`=?,`Date_de_Naissance`=?,
        `Lieu_de_Naissance`=?,`Nationalite`=?,`Adresse`=?,`E-Mail`=?,`GSM`=?,`Tel`=?,
        `Formation_Demmandee`=?,`niveau_demande`=?,`date_du_contact`=?,`contact_suite_a`=?,
        `Nature_de_Contact`=?,`Annee_Univ`=?,`Zone`=?,`Ville`=?,`Marche`=?,`depot_dossier`=?,
        `date_depot`=?,`numero_dossier`=?,`pieces`=?,`date_piece`=?,`StatutContact`=?,`test`=?,
        `date_test`=?,`Niveau_des_etudes`=?,`diplomes_obtenus`=?,`Etablissement`=?,
        `Annee_Obtention`=?,`serie_bac`=?,`langue1`=?,`langue2`=?,`Langue3`=?,`Etat_Dossier`=?,
        `Resident`=?,`Type_Résidence`=?,`Visite`=?,`nomprenompere`=?,`nomprenommere`=?,
        `adresseparents`=?,`professionpere`=?,`professionmere`=?,`Reçu_par`=100,
        `Observation`=?,`Frais_Dossier`=?,`Date_Frais`=?,`Envoi_Convocation`=?,`Test_Passe`=?,
        `Date_test_passe`=?,`Resultat`=?,`Inscrit`=?,`AbsTest`=?,`Reservation_Residence`=?,
        `Lycee_Public`=?,`Lycee_Prive`=?,`Lycee_Mission`=?,
        `Motif_Absence_Test`=?,`Insc_Reçu_par`=?,`Mail_Pere`=?,
        `Mail_Mere`=?,`Pays`=?,`Ville_Test`=?,`Pays_Test`=?,`facebook`=?,`Tel_Pere`=?,
        Etat_Dossier=?,`Tel_Mere`=?,Contact_Suivi_par= ?  where md5(id) = ?');
        //70
        /*if(intval($this->getContactsuivipar())==0)
        {
            $nom = substr($this->getContactsuivipar(),0,strpos($this->getContactsuivipar(),' '));
           
            $requ1=$bdd->query('select id from users where nom like "%'.$nom.'%" ');
            $this->setContactsuivipar($requ1->fetchAll()[0]['id']);
        }*/
        
        $params= array($this->getCivilite(),
        $this->getDateInscription(),
            $this->getNom(),
            $this->getPrenom(),$this->getDateNaissance(),$this->getLieuDeNaissance(),$this->getNationalite(),$this->getAdresse(),
            $this->getEmail(),
            $this->getGsm(),$this->getTelephone(),
            $this->getFormationDemandee(),$this->getNiveauDemande(),$this->getDateDuContact(),$this->getContactSuiteA(),
            $this->getNatureContact(),$this->getAnneeUniv()
        ,$this->getZone(),$this->getVille(),$this->getMarche(),$this->getDepotDossier(),$this->getDateDepot(),
            $this->getNumeroDossier(),$this->getPieces(),$this->getDatePiece(),$this->getStatutContact(),
            $this->getTest(),$this->getDateTest(),
            $this->getNiveauDesEtudes(),$this->getDiplomesObtenus(),$this->getEtablissement(),$this->getAnneeObtentionDiplome(),
            $this->getSerieBac(),
            $this->getLangue1(),$this->getLangue2(),$this->getLangue3(),$this->getEtatDossier(),$this->getResident(),
            $this->getTypeRésidence(),$this->getVisite(),$this->getNomprenompere(),$this->getNomprenommere(),$this->getAdresseparents(),
            $this->getProfessionpere(),$this->getProfessionmere(),$this->getObservation(),
            $this->getFraisDossier(),$this->getDateFrais(),
            $this->getEnvoiConvocation(),$this->getTestPasse(),$this->getDateTestPasse(),$this->getResultat(),$this->getInscrit(),
            $this->getAbsTest(),$this->getReservationResidence(),
            $this->getLyceePublic(),$this->getLyceePrive()
        ,$this->getLyceeMission(),$this->getMotifAbsenceTest(),$this->getInscReçuPar(),$this->getMailPere(),
            $this->getMailMere(),$this->getPays(),
            $this->getVilleTest(),$this->getPaysTest(),$this->getFacebook(),
            $this->getTelPere(),$this->getEtatDossier(),$this->getTelMere(),$this->getContactSuiviPar(), $this->getId());
            $this->changeetat($this->getId());
        echo $requ->execute($params);
        }
        

    }
    public function findbyname($nom,$prenom)
    {
         include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare('SELECT id FROM `contact_direct` WHERE `Nom`=? and `Prenom`=? ');
            $requ->execute(array($nom,$prenom));
            if($requ->rowCount()>0)
            {
                while($value=$requ->fetch())
                {
                    $valeur.='* Contact Direct <a target="_blank" href="'.$location.'?page=contactd&id='.md5($value[0]).'">Cliquez ici</a> pour consulter sa fiche<br>';
                }
            }
            return $valeur;
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
            $requ=$bdd->prepare('select Campagne1, Campagne2, Campagne3, Campagne4, Campagne5, Campagne6, Campagne7, Campagne8, Campagne9, Campagne10 from  `contact_direct` WHERE md5(`id`)=? and ( `Campagne1`=? or `Campagne2`=? or `Campagne3`=? or `Campagne4`=? or `Campagne5`=? or `Campagne6`=? or `Campagne7`=? or `Campagne8`=?  or `Campagne9`=?  or `Campagne10`=? )');
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
            $requ=$bdd->prepare(' Update `contact_direct` set Etape_Phoning=?,'.$query.' WHERE md5(`id`)=? ');
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
    public function validation_of_phoning_rappel($id,$etapephoning)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare(' Update `contact_direct` set Etape_Phoning=? WHERE md5(`id`)=? ');
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
     public function getbynotetest($test)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{
            $requ=$bdd->prepare(' SELECT `Nom`,`Prenom`, `test`, `observation`, `Formation_Demmandee` , `niveau_demande` , `diplomes_obtenus` , `Etablissement`, `serie_bac` , `Niveau_des_etudes`,`Etablissement`, `s1tc`, `s2tc`, `annuelletc`, `s1bac1`, `s2bac1`, `annuellebac1`, `noteregional`, `s1bac2`, `s2bac2`, `annuellebac2`, `notenational`, `notegenerale`,`bac1option`, `bac1moys1`, `bac1moys2`, `bac1reg`, `bac1nbretd`, `bac2option`, `bac2moys1`, `bac2moys2`, `bac2reg`, `bac2nbretd`, `bac3option`, `bac3moys1`, `bac3moys2`, `bac3reg`, `bac3nbretd`, `bac4option`, `bac4moys1`, `bac4moys2`, `bac4reg`, `bac4nbretd` FROM `contact_direct` WHERE `test`=? ');
            $param=(array($test));
            if($requ->execute($param)) {
                return $requ->fetchAll();
            }
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }
     public function getdetail($formation)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try{

            $dep="<table class='table table-bordered table-hover dataTable'><tr><th>Nom</th><th>Prenom</th><th>Date dépôt</th></tr>";
            $test_passe="<table class='table table-bordered table-hover dataTable'><tr><th>Nom</th><th>Prenom</th><th>Test</th></tr>";
            $admis="<table class='table table-bordered table-hover dataTable'><tr><th>Nom</th><th>Prenom</th><th>Resultat</th></tr>";
            $inscrit="<table class='table table-bordered table-hover dataTable'><tr><th>Nom</th><th>Prenom</th><th>Date Inscription</th></tr>";
            $nbr_contact="<table class='table table-bordered table-hover dataTable'><tr><th>Nom</th><th>Prenom</th><th>Formation_Demmandee</th><th>niveau_demande</th><th>Etablissement</th><th>Nature_de_Contact</th><th>Reçu_par</th><th>Contact_Suivi_par</th></tr>";
            $requ=$bdd->prepare(' SELECT `Nom`,`Prenom`,`Formation_Demmandee`,`depot_dossier`,date_du_contact ,`test`,`Test_Passe`,`date_depot`,`Resultat`,`Inscrit`,date_inscription, `niveau_demande`, `Etablissement`,`Nature_de_Contact`,`Reçu_par`,`Contact_Suivi_par` FROM `contact_direct` WHERE `niveau_demande`=? ');
            $param=(array($formation));
            if($requ->execute($param)) {
                $getdetail=$requ->fetchAll();
                foreach($getdetail as $detail)
                {
                    if($detail['depot_dossier']==1)
                    {
                        $dep.="<tr><td>".$detail['Nom']."</td><td>".$detail['Prenom']."</td><td>".$detail['date_depot']."</td></tr>";
                    }
                    if($detail['Test_Passe']==1)
                    {
                        $test_passe.="<tr><td>".$detail['Nom']."</td><td>".$detail['Prenom']."</td><td>".$detail['test']."</td></tr>";
                    }
                    if($detail['Inscrit']==1)
                    {
                        $inscrit.="<tr><td>".$detail['Nom']."</td><td>".$detail['Prenom']."</td><td>".$detail['date_inscription']."</td></tr>";
                    }
                    if(strtoupper($detail['Resultat'])==strtoupper("Admis"))
                    {
                        $admis.="<tr><td>".$detail['Nom']."</td><td>".$detail['Prenom']."</td><td>".$detail['test']."</td></tr>";
                    }
                    $nbr_contact.="<tr><td>".$detail['Nom']."</td><td>".$detail['Prenom']."</td><td>".$detail['Formation_Demmandee']."</td><td>".$detail['niveau_demande']."</td><td>".$detail['Etablissement']."</td><td>".$detail['Nature_de_Contact']."</td><td>".$detail['Reçu_par']."</td><td>".$detail['Contact_Suivi_par']."</td></tr>";
                }
                $dep.="</table>";
                $test_passe.="</table>";
                $admis.="</table>";
                $inscrit.="</table>";
                $nbr_contact.="</table>";
                $global_concat="
                    <div class='col-md-7'>
                        <div class='box box-primary table-responsive no-padding'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Liste des contacts</h3>
                        </div>
                        <div class='box-body'>
                            <div class='row'>
                                <div class='col-md-12'>$nbr_contact</div>
                            </div>
                        </div>
                        </div>
                    </div>
                  <div class='col-md-5'>
                        <div class='box box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Dépôt Dossier</h3>
                        </div>
                        <div class='box-body'>
                            <div class='row'>
                                <div class='col-md-12'>$dep</div>
                            </div>
                        </div>
                        </div>
                        <div class='box box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Test Passé</h3>
                        </div>
                        <div class='box-body'>
                            <div class='row'>
                                <div class='col-md-12'>$test_passe</div>
                            </div>
                        </div>
                        </div>
                        <div class='box box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Inscrit</h3>
                        </div>
                        <div class='box-body'>
                            <div class='row'>
                                <div class='col-md-12'>$inscrit</div>
                            </div>
                        </div>
                        </div>
                         <div class='box box-primary'>
                            <div class='box-header with-border'>
                                <h3 class='box-title'>Admis</h3>
                        </div>
                        <div class='box-body'>
                            <div class='row'>
                                <div class='col-md-12'>$admis</div>
                            </div>
                        </div>
                        </div>
                    </div>
";
            }
            return $global_concat;
        }
        catch(Exception $e)
        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }

}