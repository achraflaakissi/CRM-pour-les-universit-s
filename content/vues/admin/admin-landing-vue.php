<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
     ?>
                        <form method='post' >
                    <a  class="btn btn-lg btn-primary" href="https://crm.myupm.net/LoadConacts/landingpage/landing.php?username=adminupm&pass=1cd0b04303b34ebf990a20f9f77f7fdb" >Afficher les contacts de landing page</a>
                    </form>
                     <?php
               
               function str_replace_last( $search , $replace , $str ) {
                if( ( $pos = strrpos( $str , $search ) ) !== false ) {
                    $search_length  = strlen( $search );
                    $str    = substr_replace( $str , $replace , $pos , $search_length );
                }
                    return $str;
                }
                 
                 
                 
             if(count($_GET)>0 and isset($_GET['import']) and $_GET['import']=md5('upm') )
            {
               $xml=simplexml_load_file("LoadConacts/landingpage/import.xml") or die("</br></br><span class='label label-info' style='font-size:15px;'>Aucun contact à importer depuis landing page</span>");
                $sql='insert into landing_upm(id,nom,prenom,tel,email,date_naissance,niveau_etud,etablissement,ville,pays,formation,date_creation,source) values';
                ?>
                 <table  class="table table-bordered table-hover table-striped" border="1">
                    <thead>
                      <tr>
                        <th>Nom</th>
                          <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Email validé</th>
                          <th>Date de naissance</th>
                          <th>Niveau</th>
                        <th>Etablissement</th>
                        <th>Ville</th>
                        <th>Pays</th>
                        <th>Formation</th>
                        <th>Date du contact</th>
                        <th>Source du contact</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php 
                foreach($xml as $contact)
                {
                 ?>
                    
                    <tr>
                            <td><?php echo $contact->nom; ?></td><td><?php echo $contact->prenom; ?></td><td><?php echo $contact->tel; ?></td><td><?php echo $contact->email; ?></td><td><input type="checkbox" <?php if($contact->confirmation="1") echo "checkbox"; ?> /></td><td><?php echo date('d/m/Y',strtotime($contact->date_naissance)); ?></td>
                            <td><?php echo $contact->niveau_etud; ?></td><td><?php echo $contact->etablissement; ?></td><td><?php echo $contact->ville; ?></td><td><?php echo $contact->pays; ?></td><td><?php echo $contact->formation; ?></td><td><?php echo date('d/m/Y H:i:s',strtotime($contact->date_creation)); ?></td>
                            <td><?php echo $contact->source; ?></td>
                        </tr>
                    
                    <?php 
                    $sql.='('.$contact->id.',
                    "'.$contact->nom.'",
                    "'.$contact->prenom.'",
                    "'.$contact->tel.'",
                    "'.$contact->email.'",
                    "'.$contact->date_naissance.'",
                    "'.$contact->niveau_etud.'",
                    "'.$contact->etablissement.'",
                    "'.$contact->ville.'",
                    "'.$contact->pays.'",
                    "'.$contact->formation.'",
                    "'.$contact->date_creation.'",
                    "'.$contact->source.'"),';
                    $stack[]=$contact->id;
                }
                
                
                try
                {
                   
                $res =  $bdd->query(str_replace_last(',',' ',$sql));
                $res=$bdd->query("update landing_upm set formation='AGRO IND' where formation LIKE '%Ingénieur%Agro-Industrie%Agriculture%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='GENIE CIVIL' where formation LIKE '%Ingénieur%Génie%Civil%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='ENER RVL'  WHERE formation = 'Ingénieur en NTIC - Energies renouvelables' and id in (".join(',', $stack).")");
                
                $res=$bdd->query("update landing_upm set formation='TIC'  WHERE formation LIKE 'Ingénieur en NTIC - Génie Electrique, automatique et automatisme' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='TIC'  WHERE formation like 'Ingénieur en NTIC - Informatique, système %information% ' or formation like 'Ingénieur en NTIC - Réseaux & 
Télécoms' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='ART CULTURE'  WHERE formation LIKE '%Arts%culture%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='INFORMATIQUE'  WHERE formation LIKE 'Licence Informatique' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='ING SANTE' WHERE formation LIKE 'Licence Ingénierie de la Santé' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='MANAG SPORT' WHERE formation LIKE 'Licence Management du Sport' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='MHI' WHERE formation LIKE 'Licence Management en Hôtellerie Internationale' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='EGC' WHERE formation LIKE 'Licence Management Général (EGC)' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='Management International' WHERE formation LIKE 'Licence Management International' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='PHYSIO'  WHERE formation LIKE '%Physiothérapie%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='Sciences de Management'  WHERE formation LIKE '%Sciences%Management%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='SC PO'  WHERE formation LIKE 'Licence Sciences Politiques' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='INFIRM'   WHERE formation LIKE '%Infirmiers%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='TOUR HOT'   WHERE formation LIKE 'Licence Tourisme & Gestion hôtelière' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='MASTER ING SANTE'   WHERE formation LIKE '%Ingénierie%Santé%' and id in (".join(',', $stack).")");
                
                $res=$bdd->query("update landing_upm set formation='ESGC MARKETING OPERATIONNEL'   WHERE formation LIKE '%Management%Général%(ESGC)%Opérationnelle%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='ESC' WHERE formation LIKE '%Etudes%Supérieures%Commerce%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='SM COMM INTERN' WHERE formation LIKE '%Sciences%Management%Commerce%International%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='SM FINANCE' WHERE formation LIKE '%Sciences%Management%Finance%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='SM MARKETING' WHERE formation LIKE '%Sciences%Management%Marketing%' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set formation='MS MARCHE ART VAL PAT' WHERE formation LIKE '%Patrimoine%' and id in (".join(',', $stack).")");
                
                $res=$bdd->query("update landing_upm set niveau_etud='AGRO1' where formation LIKE 'AGRO IND' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='AGRO2' where formation LIKE 'AGRO IND' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='AGRO3' where formation LIKE 'AGRO IND' and niveau_etud='3 ème Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='GL1' where formation LIKE 'GENIE CIVIL' and niveau_etud='1 ère Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='GL2' where formation LIKE 'GENIE CIVIL' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='GL3' where formation LIKE 'GENIE CIVIL' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='GL4' where formation LIKE 'GENIE CIVIL' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='GL4' where formation LIKE 'GENIE CIVIL' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ART1' where formation LIKE 'ART CULTURE' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ART2' where formation LIKE 'ART CULTURE' and niveau_etud='2 ème Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ART3' where formation LIKE 'ART CULTURE' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='INFO1' where formation LIKE 'INFORMATIQUE' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='INFO2' where formation LIKE 'INFORMATIQUE' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='INFO3' where formation LIKE 'INFORMATIQUE' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='EGC1' where formation LIKE 'EGC' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='EGC2' where formation LIKE 'EGC' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='EGC3' where formation LIKE 'EGC' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ER1' where formation LIKE 'ENER RVL' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ER2' where formation LIKE 'ENER RVL' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ER3' where formation LIKE 'ENER RVL' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ER4' where formation LIKE 'ENER RVL' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ER5' where formation LIKE 'ENER RVL' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='ESC1' where formation LIKE 'ESC' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                
                 $res=$bdd->query("update landing_upm set niveau_etud='ESCM1' where formation LIKE 'ESC' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='ESCM2' where formation LIKE 'ESC' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='INFIRM1' where formation LIKE 'INFIRM' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='INFIRM2' where formation LIKE 'INFIRM' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='INFIRM3' where formation LIKE 'INFIRM' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='SANTE1' where formation LIKE 'ING SANTE' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='SANTE2' where formation LIKE 'ING SANTE' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='SANTE3' where formation LIKE 'ING SANTE' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='SANTE4' where formation LIKE 'ING SANTE' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                 
                 $res=$bdd->query("update landing_upm set niveau_etud='SANTE5' where formation LIKE 'ING SANTE' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='TIC1' where formation LIKE 'TIC' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='TIC2' where formation LIKE 'TIC' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='TIC3' where formation LIKE 'TIC' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='TIC4' where formation LIKE 'TIC' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='TIC5' where formation LIKE 'TIC' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                 $res=$bdd->query("update landing_upm set niveau_etud='PMI1' where formation LIKE 'Management International' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                 
                  $res=$bdd->query("update landing_upm set niveau_etud='PMI2' where formation LIKE 'Management International' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                  $res=$bdd->query("update landing_upm set niveau_etud='PMI3' where formation LIKE 'Management International' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                  $res=$bdd->query("update landing_upm set niveau_etud='M2' where formation LIKE 'MASTER ING SANTE' and niveau_etud='Master2' and id in (".join(',', $stack).")");
                  
                  $res=$bdd->query("update landing_upm set niveau_etud='MHI1' where formation LIKE 'MHI' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MHI2' where formation LIKE 'MHI' and niveau_etud='2 ème Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MHI3' where formation LIKE 'MHI' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MHI4' where formation LIKE 'MHI' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MHI5' where formation LIKE 'MHI' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MAVPM1' where formation LIKE 'MS MARCHE ART VAL PAT' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='MAVPM2' where formation LIKE 'MS MARCHE ART VAL PAT' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='PHYSIO1' where formation LIKE 'PHYSIO' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                
                $res=$bdd->query("update landing_upm set niveau_etud='PHYSIO2' where formation LIKE 'PHYSIO' and niveau_etud='2 ème Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='PHYSIO3' where formation LIKE 'PHYSIO' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SCPO2' where formation LIKE 'SC PO' and niveau_etud='2 ème Année'  and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SCPO1' where formation LIKE 'SC PO' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SM1' where formation LIKE 'Sciences de Management' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SM2' where formation LIKE 'Sciences de Management' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SM3' where formation LIKE 'Sciences de Management' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SM4' where formation LIKE 'Sciences de Management' and niveau_etud='4 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='SM5' where formation LIKE 'Sciences de Management' and niveau_etud='5 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='TH1' where formation LIKE 'TOUR HOT' and niveau_etud='1 ère Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='TH2' where formation LIKE 'TOUR HOT' and niveau_etud='2 ème Année' and id in (".join(',', $stack).")");
                $res=$bdd->query("update landing_upm set niveau_etud='TH3' where formation LIKE 'TOUR HOT' and niveau_etud='3 ème Année' and id in (".join(',', $stack).")");
                
                 
                   
                }
                catch(Exception $ex)
                {
                //echo str_replace_last(',',' ',$sql);
                    echo $ex->getMessage();exit;
                 
                } ?>
                </tbody>
                </table>
                
                 <form method="post">
                        <button type="submit" class="btn btn-lg btn-success" name="valider" >Valider le transfer de données - contact direct - landing page</button>
                 </form>
              
                <?php 
                
            }
    }
}
                 
                
?>