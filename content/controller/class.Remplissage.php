<?php
/**
 * Created by PhpStorm.
 * User: ELMAHMOUDI
 * Date: 27/01/2017
 * Time: 10:55
 */

class Remplissage
{
    function getFunctions($function,$id,$type)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $value = "";
        $requ =null;
        if($type=='D')
        {
            $requ = $bdd->query('SELECT  *  FROM `contact_direct` WHERE  md5(id) = \''.$id.'\'');
            $requ =  $requ->fetchAll();
            switch ($function) {
                
                
                
                 case "getContactsuivipar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Contact_Suivi_par']==$donner[0])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                
                
                    
                
                case "getNationalite":
                    try {
                        $req = $bdd->query("SELECT * FROM `pays` ORDER BY nom_fr_fr");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Nationalite']==$donner[5])
                                $value .= '<option selected >' . $donner[5] . '</option>';
                            else
                                $value .= '<option>' . $donner[5] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                    
                    case "getContactsuivipar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' or profile ='saisie' ORDER BY nom");
                         $value .= "<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Contatct_Suivi_par']==$donner[0])
                            {
                                $value .= '<option selected value="' . $donner[0] .'">' . $donner[1] . ' ' . $donner[2] . '</option>';
                                
                            }
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                    
                    
                    /////////////////////////////////////////////////////////////
                    case "getcontactsuitea":
                    try {
                        $req = $bdd->query("SELECT DISTINCT contactsuitea from contactsuitea");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['contact_suite_a']==$donner[0])
                            $value.='<option selected >'.$donner[0].'</option>';
                            else
                                $value.='<option>'.$donner[0].'</option>';


                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                    case "getcontactsuitea":
                    try {
                        $req = $bdd->query("SELECT DISTINCT contactsuitea from contactsuitea");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['contact_suite_a']==$donner[0])
                            $value.='<option selected >'.$donner[0].'</option>';
                            else
                                $value.='<option>'.$donner[0].'</option>';


                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
              case "getnumerods":
                    try {
                        $req = $bdd->query("SELECT max(numero_dossier) from contact_direct");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                                $value=$donner[0]+1;
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;


                case "gettest":
                    try {
                        $req = $bdd->query("SELECT DISTINCT test from test order by test");
                        $value.="<option></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['test']==$donner[0])
                            $value.='<option selected > '.$donner[0].'</option>';
                            else
                                $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;


                case "getmotif":
                    try {
                        $req = $bdd->query("SELECT DISTINCT motif from motif order by motif");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['Motif_Absence_Test']==$donner[0])
                                $value.='<option selected > '.$donner[0].'</option>';
                            else
                                $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;

                case "getresultat":
                    try {
                        $req = $bdd->query("SELECT DISTINCT resultat from resultat order by resultat");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if(trim($requ[0]['Resultat'])==trim($donner[0]))
                                $value.='<option selected > '.$donner[0].'</option>';
                            else
                                $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;



                    /////////////////////////////////////////////////////////////
                case "getAnneeObtention";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Obtention']==($year-$i)."-".($year-$i-1))
                            $value .= '<option selected >' .($year-$i).'-'.($year-$i-1) . '</option>';
                        else
                            $value .= '<option>' . ($year-$i).'-'.($year-$i-1) . '</option>';
                    }
                    break;
                case "getanneetude";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Etude']==($year-$i)."-".($year-$i-1))
                            $value .= '<option selected >' .($year-$i).'-'.($year-$i-1) . '</option>';
                        else
                            $value .= '<option>' . ($year-$i).'-'.($year-$i-1) . '</option>';
                    }
                    break;
                case "getlieunaissance";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Lieu_de_Naissance']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
               
                case "getProfessionpere";
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['professionpere']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                    
                    
                     case "getLyceeEtablissement";
                      $trouvee=false;
                    try {
                        $req = $bdd->query("SELECT DISTINCT (lyceeetablissement) FROM `lyceeetablissement` ORDER BY lyceeetablissement");
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['Etablissement'])==trim($donner[0]))
                                {
                                $value .= '<option selected >' . $donner[0] . '</option>';
                                 $trouvee=true;
                             }
                              else
                               {
                                 $value .= '<option >' . $donner[0] . '</option>';
                              }
                        }
                           if($trouvee==false)
                           {
                            $value .= "<option selected >".$requ[0]['Etablissement']."</option>";  
                              }
                    }
                     
                    catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                    
                    
                    
                case "getProfessionmere";
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['professionmere']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getetetatdossier":
                    try {
                        $req = $bdd->query("SELECT DISTINCT etatdossier from etatdossier");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Etat_Dossier']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getAnneeUniv";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Univ']==($year+$i)."-".($year+$i+1))
                            $value .= '<option selected >' .($year+$i).'-'.($year+$i+1) . '</option>';
                        else
                            $value .= '<option>' . ($year+$i).'-'.($year+$i+1) . '</option>';
                    }
                    break;

                case "getFormationDemander";
                    try {
                        $req = $bdd->query("SELECT DISTINCT `formation_demande` FROM `param_formations`ORDER BY `formation_demande`");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Formation_Demmandee']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getGroupeFormation";
                    try {
                        $req = $bdd->query("SELECT * FROM `groupeformation` ORDER BY groupeformation ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Groupe_Formation']==$donner[0])
                                $value .= '<option selected>' . $donner[0] . '</option>';
                            else
                                $value .= '<option >' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getVille";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Ville']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getVillelycee";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Ville_Lycee']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNiveauEtudes";
                    try {
                        $req = $bdd->query("SELECT * FROM `niveauetudes` ORDER BY niveauetudes ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Niveau_des_etudes']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getSeriebac";
                    try {
                        $req = $bdd->query("SELECT * FROM `seriebac` ORDER BY seriebac");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['serie_bac']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;

                case "getDiplomesObtenus";
                    try {
                        $req = $bdd->query("SELECT * FROM `diplomesobtenus` ORDER BY diplomesobtenus ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['diplomes_obtenus']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getRecuPar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Reçu_par']==$donner[0])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNatureContact";
                    try {
                        $req = $bdd->query("SELECT * FROM `naturecontact` ORDER  BY naturecontact");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Nature_de_Contact']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getinscriptionrecupar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Insc_Reçu_par']==$donner[0])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getetatdossier";
                    try {
                        $req = $bdd->query("SELECT * FROM `etatdossier` ORDER by etatdossier ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['etatdossier']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "gettest";
                    try {
                        $req = $bdd->query("SELECT test FROM `test` ORDER BY test");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['test']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getPays";
                    try {
                        $req = $bdd->query("SELECT * FROM `pays` ORDER BY nom_fr_fr");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Pays']==$donner[5])
                                $value .= '<option selected >' . $donner[5] . '</option>';
                            else
                                $value .= '<option>' . $donner[5] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getAgent";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='agent' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Saisi_par']==$donner[1] . ' ' . $donner[2])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue1":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option></option>";
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['langue1'])==trim($donner[0]))
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue2":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['langue2']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue3":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Langue3']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                
                case "getMarche";
                    try {
                        $req = $bdd->query("SELECT * FROM `marche` ORDER BY marche");
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['Marche'])==trim($donner[1]))
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNiveauDemande":
                    try {
                        $req = $bdd->query("SELECT DISTINCT niveaudemande from niveaudemande");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['niveau_demande']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getcontactsuitea":
                    try {
                        $req = $bdd->query("SELECT DISTINCT contactsuitea from contactsuitea");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['contact_suite_a']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
            }
        }
        else if($type=='I')
        {
             $requ = $bdd->prepare('SELECT  `Profession_Mere`, `Profession_Pere`, `Annee_Etude`, `Annee_Univ`, `Formation_Demmandee`, `Ville`, `Groupe_Formation`,
             `Nature_de_Contact`, `Marche`, `Zone`, `Ville_Lycee`,  `Niveau_des_etudes`, `Etablissement`, `Lieu_de_Naissance`, `Branche`,
              `Diplome_Obtenu`, `Annee_Obtention`,  `Experience_professionelle`, `Formation`, `StatutContact`, `Reçu_par`, `Lycee`, `Operateur_Saisie`,
              `Categorie`,`Contact_Suivi_par`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,
              `s2bac2`,`annuellebac2`,`notenational`,`notegenerale`  FROM `contact_indirect` WHERE md5(id)= ?');
            $requ->execute(array($id));
            $requ =  $requ->fetchAll();
            switch ($function) {
                case "s1tc";
                     $value = $requ[0]['s1tc'];
                break;
                case "s2tc";
                    $value = $requ[0]['s2tc'];
                    break;
                case "annuelletc";
                    $value = $requ[0]['annuelletc'];
                    break;
                case "s1bac1";
                    $value = $requ[0]['s1bac1'];
                    break;
                case "s2bac1";
                    $value = $requ[0]['s2bac1'];
                    break;
                case "annuellebac1";
                    $value = $requ[0]['annuellebac1'];
                    break;
                case "s1bac2";
                    $value = $requ[0]['s1bac2'];
                    break;
                case "s2bac2";
                    $value = $requ[0]['s2bac2'];
                    break;
                case "annuellebac2";
                    $value = $requ[0]['annuellebac2'];
                    break;
                case "noteregional";
                    $value = $requ[0]['noteregional'];
                    break;
                case "notenational";
                    $value = $requ[0]['notenational'];
                    break;
                case "notegenerale";
                    $value = $requ[0]['notegenerale'];
                    break;
                case "getAnneeObtention";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Obtention']==($year-$i)."-".($year-$i-1))
                            $value .= '<option selected >' .($year-$i).'-'.($year-$i-1) . '</option>';
                        else
                            $value .= '<option>' . ($year-$i).'-'.($year-$i-1) . '</option>';
                    }
                    break;
                case "getanneetude";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Etude']==($year-$i)."-".($year-$i-1))
                            $value .= '<option selected >' .($year-$i).'-'.($year-$i-1) . '</option>';
                        else
                            $value .= '<option>' . ($year-$i).'-'.($year-$i-1) . '</option>';
                    }
                    break;
                case "getlieunaissance";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Lieu_de_Naissance']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getLyceeEtablissement";
                     $trouvee=false;
                    try {
                        $req = $bdd->query("SELECT DISTINCT (lyceeetablissement) FROM `lyceeetablissement` ORDER BY lyceeetablissement");
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['Etablissement'])==trim($donner[0]))
                                {
                                $value .= '<option selected >' . $donner[0] . '</option>';
                             $trouvee=true;
                             }
                          
                      else
                       {
                          $value .= '<option >' . $donner[0] . '</option>';
                          }
                          }
                           if($trouvee==false)
                           {
                            $value .= "<option selected ><?php echo $requ[0]['Etablissement'];?></option>";  
                              }
                        
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getProfessionpere";
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Profession_Pere']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                    case "getExperience_professionelle";
                   
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Experience_professionelle']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                {$value .= '<option  >' . $donner[0] . '</option>';}
                        
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getProfessionmere";
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Profession_Mere']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getetetatdossier":
                    try {
                        $req = $bdd->query("SELECT DISTINCT etatdossier from etatdossier");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Etat_Dossier']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option  >' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getAnneeUniv";
                    $year = date('Y');
                    for($i=0;$i<6;$i++)
                    {
                        if($requ[0]['Annee_Univ']==($year+$i)."-".($year+$i+1))
                            $value .= '<option selected >' .($year+$i).'-'.($year+$i+1) . '</option>';
                        else
                            $value .= '<option>' . ($year+$i).'-'.($year+$i+1) . '</option>';
                    }
                    break;

                case "getFormationDemander";
                    try {
                        $req = $bdd->query("SELECT formation_demande FROM `param_formations` ORDER BY formation_demande");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Formation_Demmandee']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getGroupeFormation";
                    try {
                        $req = $bdd->query("SELECT * FROM `groupeformation` ORDER BY groupeformation ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Groupe_Formation']==$donner[0])
                                $value .= '<option selected>' . $donner[0] . '</option>';
                            else
                                $value .= '<option >' . $donner[0] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getVille";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Ville']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getVillelycee";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Ville_Lycee']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNiveauEtudes";
                    try {
                        $req = $bdd->query("SELECT * FROM `niveauetudes` ORDER BY niveauetudes ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Niveau_des_etudes']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getbanche";
                    try {
                        $req = $bdd->query("SELECT * FROM `seriebac` ORDER BY seriebac");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Branche']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;

                case "getDiplomesObtenus";
                    try {
                        $req = $bdd->query("SELECT * FROM `diplomesobtenus` ORDER BY diplomesobtenus ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Diplome_Obtenu']==$donner[1])
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getRecuPar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Reçu_par']==$donner[1] . ' ' . $donner[2])
                                $value .= '<option selected >' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  >' . $donner[1] . ' ' . $donner[2] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNatureContact";
                    try {
                        $req = $bdd->query("SELECT * FROM `naturecontact` ORDER  BY naturecontact");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Nature_de_Contact']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getinscriptionrecupar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Insc_Reçu_par']==$donner[0])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getetatdossier";
                    try {
                        $req = $bdd->query("SELECT * FROM `etatdossier` ORDER by etatdossier ");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['etatdossier']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "gettest";
                    try {
                        $req = $bdd->query("SELECT test FROM `test` ORDER BY test");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['test']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getPays";
                    try {
                        $req = $bdd->query("SELECT * FROM `pays` ORDER BY nom_fr_fr");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Pays']==$donner[5])
                                $value .= '<option selected >' . $donner[5] . '</option>';
                            else
                                $value .= '<option>' . $donner[5] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getAgent";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='agent' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Saisi_par']==$donner[1] . ' ' . $donner[2])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue1":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option></option>";
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['langue1'])==trim($donner[0]))
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue2":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['langue2']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangue3":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value .= "<option value='vide'></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Langue3']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getContactsuivipar";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            if($requ[0]['Contact_Suivi_par']==$donner[0])
                                $value .= '<option selected value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';
                            else
                                $value .= '<option  value="' . $donner[0] . '">' . $donner[1] . ' ' . $donner[2] . '</option>';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getMarche";
                    try {
                        $req = $bdd->query("SELECT * FROM `marche` ORDER BY marche");
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['Marche'])==trim($donner[1]))
                                $value .= '<option selected >' . $donner[1] . '</option>';
                            else
                                $value .= '<option>' . $donner[1] . '</option>';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNiveauDemande":
                    try {
                        $req = $bdd->query("SELECT DISTINCT niveaudemande from niveaudemande");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['niveau_demande']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getcontactsuitea":
                    try {
                        $req = $bdd->query("SELECT DISTINCT contactsuitea from contactsuitea");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            if($requ[0]['contact_suite_a']==$donner[0])
                                $value .= '<option selected >' . $donner[0] . '</option>';
                            else
                                $value .= '<option>' . $donner[0] . '</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
            }
        }


        return $value;

    }

 function getDataList($function)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
        $value = "";
        $requ =null;

            switch($function)

            {
                case "getContactsuivipar":
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while ($donner = $req->fetch()) {
                                $value.='<option  value="'.$donner[1].' '.$donner[2].'"  data-value='.$donner[0].' >';

                        }



                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getLyceeEtablissement";
                    $trouvee=false;
                    try {
                        $req = $bdd->query("SELECT DISTINCT (lyceeetablissement) FROM `lyceeetablissement` ORDER BY lyceeetablissement");
                        while ($donner = $req->fetch()) {
                            if(trim($requ[0]['Etablissement'])==trim($donner[0]))
                                {
                                $value .= '<option selected >' . $donner[0] . '</option>';
                             $trouvee=true;
                             }
                            else
                              {
                                $value .= '<option>' . $donner[0] . '</option>';
                                    $trouvee=false;
                                   }
                           if($trouvee==false)
                           {
                            $value = "<option selected ><?php echo $requ[0]['Etablissement'];?></option>";  
                              }
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getVille";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while ($donner = $req->fetch()) {
                                $value.='<option  value="'.$donner[1].'"  data-value='.$donner[1].'  >';
                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getNatureContact";
                    try {
                        $req = $bdd->query("SELECT * FROM `naturecontact` ORDER  BY naturecontact");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            $value.='<option  value="'.$donner[0].'"  data-value='.$donner[0].'  >';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "getFormationDemander";
                    try {
                        $req = $bdd->query("SELECT formation_demande FROM `param_formations` ORDER BY formation_demande");
                        $value="<option></option>";
                        while ($donner = $req->fetch()) {
                            $value.='<option  value="'.$donner[0].'"  data-value='.$donner[0].'  >';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
case "getMarche";
                    try {
                        $req = $bdd->query("SELECT * FROM `marche` ORDER BY marche");
                        while ($donner = $req->fetch()) {
                            $value.='<option  value="'.$donner[1].'"   >';

                        }
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;

        }

        return $value;

    }

    public function addToTable($val,$atble,$champ)
      {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or                      die(mysql_error());

           $sql='';
           $sql="select 1 from ".$atble." where ".$champ." like '%".$val."%'";

           $res =  $bdd->query($sql);
          if(count($res->fetchAll())<=0)
             $bdd->query("insert into ".$atble."(".$champ.") values ('".$val."')");
         }

}