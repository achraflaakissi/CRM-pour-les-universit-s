<?php 
    class rempliration
    {
         function get_histo_appel_contact_CD($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT rfcc.`status`, rfcc.`date_saisie`, concat(u2.nom,' ',u2.prenom) AS 'TA', rfcc.`campagne`, acv.observation, acv.rendez_vous, acv.date, acv.heure, acv.type_rdv, concat(u1.nom,' ',u1.prenom) AS 'Contact_Suivi_par' FROM `rdv_from_call_center` rfcc inner join auto_cmp_rdv acv on rfcc.id=acv.id_rdv_table left join contact_direct cd on cd.id= rfcc.`contact` left join users u1 on u1.id=cd.Contact_Suivi_par left join users u2 on u2.id=rfcc.`user` where md5(rfcc.contact)='".$id."' AND `type_contact`='CD' ");
            $value="";
            while($data=$reqindss->fetch())
            {
                $value.='
                         <tr>
                                            <th>'.$data['status'].'</th>
                                            <th>'.$data['date_saisie'].'</th>
                                            <th>'.$data['TA'].'</th>
                                            <th>'.$data['campagne'].'</th>
                                            <th>'.$data['observation'].'</th>
                                            <th>'.$data['rendez_vous'].'</th>
                                            <th>'.$data['date'].'</th>
                                            <th>'.$data['heure'].'</th>
                                            <th>'.$data['type_rdv'].'</th>
                                            <th>'.$data['Contact_Suivi_par'].'</th>
                                        </tr>
                                        ';
            }
            return $value;
        }
         function get_histo_contact_CD($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT `Civilite`,cd.`Nom`,cd.`Prenom`, `GSM`, `E-Mail`, `Tel`, `Formation_Demmandee`, `niveau_demande`, `date_du_contact`, `contact_suite_a`, `Nature_de_Contact`, `depot_dossier`, `date_depot`, `Frais_Dossier`, `Observation`,concat(u1.nom,' ',u1.prenom) as 'Recu_par1',concat(u2.nom,' ',u2.prenom) as 'Contact_Suivi_par1' FROM `contact_direct` cd left join users u1 on u1.id=cd.`Reçu_par` left join users u2 on u2.id=cd.Contact_Suivi_par WHERE md5(cd.id)='".$id."'");
            $value="";
            while($data=$reqindss->fetch())
            {
                $value.='
                        <div class="col-md-6 bigger"><strong>Nom & Prenom :</strong> '.$data['Nom'].' '.$data['Prenom'].'</div><div class="col-md-6 bigger"> <strong>Date Du Contact :</strong> '.$data['date_du_contact'].' </div>
                        <div class="col-md-3 bigger"><strong>GSM :</strong> '.$data['GSM'].'</div><div class="col-md-3 bigger"><strong>TEl :</strong> '.$data['Tel'].'</div><div class="col-md-6 bigger"><strong>Email :</strong> '.$data['E-Mail'].'</div>
                        <div class="col-md-6 bigger"><strong>Formation Demmandée :</strong> '.$data['Formation_Demmandee'].'</div><div class="col-md-6 bigger"><strong>Niveau Demandée :</strong> '.$data['niveau_demande'].'</div>
                        <div class="col-md-6 bigger"><strong>Depot Dossier :</strong> '.$data['depot_dossier'].'</div><div class="col-md-6 bigger"><strong>Date Depot :</strong> '.$data['date_depot'].'</div>
                        <div class="col-md-12 bigger"><strong>Observation :</strong> '.$data['Observation'].'</div>
                        <div class="col-md-6 bigger"><strong>Reçu Par :</strong> '.$data['Recu_par1'].'</div><div class="col-md-6 bigger"><strong>Contact Suivi Par :</strong>'.$data['Contact_Suivi_par1'].'</div>
                ';
            }
            return $value;
        }
        function get_rappel_CD($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT concat(u.nom,' ',u.prenom) as 'TA',`etapephoning`,`observation`,`date`,`heure` FROM `rappel` rap inner JOIN users u on u.id=rap.`id_user` where md5(id_contact)='".$id."' and `type`='CD' ");
            $value="";
            while($data=$reqindss->fetch())
            {
                $value.="<tr>
                        <td>".$data['etapephoning']."</td>
                        <td>".$data['observation']."</td>
                        <td>".$data['date']."</td>
                        <td>".$data['heure']."</td>
                        <td>".$data['TA']."</td>
                </tr>";
            }
            return $value;
        }
        function update_desaffectation($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("update contact_direct set a_affecter='non' where md5(id)='".$id."'");
            return true;
        }
        function updatecampagne_auto_cmp_appel($campagne,$observation,$ntel,$nemail,$etapephoning,$idid,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,
        $notenational,$notegenerale,$formation_demandee,$status_rdv,$etat_rdv,$status,$date_rdv,$heure_rdv,$inscription_rdv,$type_contact)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CDI")
            {
                $reqindss = $bdd->query("select id from contact_indirect where md5(id)='".$idid."'");
                $data_cd=$reqindss->fetch();
                $reqindss = $bdd->prepare("INSERT INTO `rdv_from_call_center`(`user`, `campagne`, `contact`, `type_contact`, `status`, `date_saisie`, `valider`) VALUES (?,?,?,?,?,NOW(),0)");
                $param = array($_SESSION['user']['id'],'appel',$data_cd[0],"CDI",$status);
                $reqindss->execute($param);
                $id_rdv=$bdd->lastInsertId();
                  if($status=="NA")
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`(`id_rdv_table`, `status`, `observation`, `rendez_vous`, `date_saisie`) VALUES (?,?,?,0,NOW())");
                        $param = array($id_rdv,$status,$observation);
                        if($reqindss->execute($param)) { 
                                $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE()where MD5(`id`)=? ");
                                $param = array($observation,$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) { 
                                    include('content/controller/class.contact-indirecte.php');
                                    $contact_indirecte = new contact_indirecte();
                                    $contact_indirecte->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
                  else
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`( `id_rdv_table`, `status`, `observation`, `rendez_vous`, `heure`, `date`, `type_rdv`, `date_saisie`) VALUES (?,?,?,1,?,?,?,Now())");
                        $param = array($id_rdv,$status,$observation,$heure_rdv,$date_rdv,$inscription_rdv);
                        if($reqindss->execute($param)) {
                                $reqindss = $bdd->prepare("update `rdv_from_call_center` set `valider`=1 WHERE `id`=?");
                                $param = array($id_rdv);
                                $reqindss->execute($param);
                                $updt=$bdd->query("update `contact_indirect` set Observations=' ' WHERE `Observations` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE()where MD5(`id`)=? ");
                                $param = array($observation,$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include('content/controller/class.contact-indirecte.php');
                                    $contact_indirecte = new contact_indirecte();
                                    $contact_indirecte->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
            }
            elseif($type_contact=="CD")
            {
                
                    $reqindss = $bdd->query("select id from contact_direct where md5(id)='".$idid."'");
                    $data_cd=$reqindss->fetch();
                    $reqindss = $bdd->prepare("INSERT INTO `rdv_from_call_center`(`user`, `campagne`, `contact`, `type_contact`, `status`, `date_saisie`, `valider`) VALUES (?,?,?,?,?,NOW(),0)");
                    $param = array($_SESSION['user']['id'],'appel',$data_cd[0],"CD",$status);
                    $reqindss->execute($param);
                    $id_rdv=$bdd->lastInsertId();
                  if($status=="NA")
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`(`id_rdv_table`, `status`, `observation`, `rendez_vous`, `date_saisie`) VALUES (?,?,?,0,NOW())");
                        $param = array($id_rdv,$status,$observation);
                        if($reqindss->execute($param)) {
                                $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                               $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
                  else
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`( `id_rdv_table`, `status`, `observation`, `rendez_vous`, `heure`, `date`, `type_rdv`, `date_saisie`) VALUES (?,?,?,1,?,?,?,Now())");
                        $param = array($id_rdv,$status,$observation,$heure_rdv,$date_rdv,$inscription_rdv);
                        if($reqindss->execute($param)) {
                                $reqindss = $bdd->prepare("update `rdv_from_call_center` set `valider`=1 WHERE `id`=?");
                                $param = array($id_rdv);
                                $reqindss->execute($param);
                    $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                            }
                            else
                            {
                                return json_encode(array('validation'=>false, 'message'=>$campagne));
                            }
                  }
                    
            }
        }
        function get_auto_campagne_from_TR($type_contact,$id_contact)
        {
            include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CD")
            {
                
            $reqe1 = $bdd->query('SELECT `Nom`,cd.`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
             ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
             `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1tc`,`s2tc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,
             `annuelletc` FROM contact_direct cd  where md5(cd.`id`)="'.$id_contact.'" limit 0,1 ');
                if($reqe1->rowCount()>0)
                {
                while($dn=$reqe1->fetch())
                    {
                        $observation=$dn['Observation'];
                        $reqa = $bdd->query('SELECT `observation` FROM `rappel` WHERE md5(`id_contact`)="'.$id_contact.'" and `type`="CD"');
                        while($database=$reqa->fetch())
                        {
                            $observation.="#".$database[0];
                        }
                        $reqa = $bdd->query('SELECT ac.observation,ac.status,rc.status FROM `rdv_from_call_center` rc inner join `auto_cmp_rdv` ac on ac.id_rdv_table=rc.`id` where `type_contact`="CD" and ac.observation<>"" and md5(rc.contact)="'.$id_contact.'"');
                        while($database=$reqa->fetch())
                        {
                            $observation.="#".$database[0];
                            $observation.="#".$database[1];
                        }
                        $reqa = $bdd->query('SELECT status FROM `rdv_from_call_center` where md5(`contact`)="'.$id_contact.'"');
                        while($database=$reqa->fetch())
                        {
                            $observation.="#".$database[0];
                        }
                        
                        $fr="";
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'Campage'=>$campagne,
                            'etphoning'=>$etphoning,
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$observation),
                            'Etape_Phoning'=>$dn['Etape_Phoning'],
                            'Etape_Phoning1'=>$dn['Etape_Phoning1'],
                            'Etape_Phoning2'=>$dn['Etape_Phoning2'],
                            'Etape_Phoning3'=>$dn['Etape_Phoning3'],
                            'Etape_Phoning4'=>$dn['Etape_Phoning4'],
                            'Etape_Phoning5'=>$dn['Etape_Phoning5'],
                            'Etape_Phoning6'=>$dn['Etape_Phoning6'],
                            'Etape_Phoning7'=>$dn['Etape_Phoning7'],
                            'Etape_Phoning8'=>$dn['Etape_Phoning8'],
                            'Etape_Phoning9'=>$dn['Etape_Phoning9'],
                            'Etape_Phoning10'=>$dn['Etape_Phoning10']
                        );
                    }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
            }
            else
            {
                $reqe1 = $bdd->query(' SELECT `Nom`,cd.`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`,`Ville_Lycee`, `Formation` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observations`,`Formation_Demmandee`,`s1tc`,`s2tc`,
 `annuelletc`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale` FROM `rdv_from_call_center` left join contact_indirect cd on cd.id=rdv_from_call_center.contact where md5(cd.`id`)="'.$id_contact.'"  limit 0,1 ');
                $data="";
                if($reqe1->rowCount()>0)
                {
                    while($dn=$reqe1->fetch())
                    {
                        $fr="";
                       $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>$dn['Ville_Lycee'],
                            'Formation'=>$dn['Formation'],
                            'Formation_Demmandee'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'etphoning'=>$etphoning,
                            'Campage'=>$campagne,
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observations']),
                            'Etape_Phoning'=>$Etape_Phoning,
                            'Etape_Phoning1'=>$Etape_Phoning1,
                            'Etape_Phoning2'=>$Etape_Phoning2,
                            'Etape_Phoning3'=>$Etape_Phoning3,
                            'Etape_Phoning4'=>$Etape_Phoning4,
                            'Etape_Phoning5'=>$Etape_Phoning5,
                            'Etape_Phoning6'=>$Etape_Phoning6,
                            'Etape_Phoning7'=>$Etape_Phoning7,
                            'Etape_Phoning8'=>$Etape_Phoning8,
                            'Etape_Phoning9'=>$Etape_Phoning9,
                            'Etape_Phoning10'=>$Etape_Phoning10
                        );
                    }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
            }
            return $data;
        }
        function getnbrallcmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req_users_agents = $bdd->query("SELECT id,concat(nom,' ',prenom) FROM `users` WHERE `profile`='agent'");
            $valeur="";
            while($data_users=$req_users_agents->fetch())
            {
                $req = $bdd->query("SELECT * FROM `listcampagne`");
                
                while($donner=$req->fetch())
                {
                    $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE (Campagne1='$donner[0]' and TA1='".$data_users[0]."') or (Campagne2='$donner[0]' and TA2='".$data_users[0]."') or (Campagne3='$donner[0]' and TA3='".$data_users[0]."') or (Campagne4='$donner[0]' and TA4='".$data_users[0]."') or (Campagne5='$donner[0]' and TA5='".$data_users[0]."') or (Campagne6='$donner[0]' and TA6='".$data_users[0]."') or (Campagne7='$donner[0]' and TA7='".$data_users[0]."') or (Campagne8='$donner[0]' and TA8='".$data_users[0]."') or (Campagne9='$donner[0]' and TA9='".$data_users[0]."') or (Campagne10='$donner[0]' and TA10='".$data_users[0]."') having count(id)>0");
                    $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$data_users[0]."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$data_users[0]."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$data_users[0]."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$data_users[0]."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$data_users[0]."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$data_users[0]."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$data_users[0]."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$data_users[0]."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$data_users[0]."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$data_users[0]."' )");
                    $reqe1=$reqe1->fetch();
                    $reqe2=$reqe2->fetch();
                    if($reqe1[0]>0)
                    {
                        $valeur.= '
                        <tr>
                            <td>'.$donner[0].'</td>
                            <td> Contact Indirect </td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                            <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                            <td> '.$data_users[1].' </td>
                        </tr>';
                    }
    
                }
                $req = $bdd->query("SELECT * FROM `listcampagnedir`");
                while($donner=$req->fetch())
                {
                    $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE (Campagne1='$donner[0]' and TA1='".$data_users[0]."') or (Campagne2='$donner[0]' and TA2='".$data_users[0]."') or (Campagne3='$donner[0]' and TA3='".$data_users[0]."') or (Campagne4='$donner[0]' and TA4='".$data_users[0]."') or (Campagne5='$donner[0]' and TA5='".$data_users[0]."') or (Campagne6='$donner[0]' and TA6='".$data_users[0]."') or (Campagne7='$donner[0]' and TA7='".$data_users[0]."') or (Campagne8='$donner[0]' and TA8='".$data_users[0]."') or (Campagne9='$donner[0]' and TA9='".$data_users[0]."') or (Campagne10='$donner[0]' and TA10='".$data_users[0]."') having count(id)>0");
                    $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$data_users[0]."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$data_users[0]."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$data_users[0]."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$data_users[0]."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$data_users[0]."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$data_users[0]."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$data_users[0]."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$data_users[0]."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$data_users[0]."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$data_users[0]."' )");
                    $reqe1=$reqe1->fetch();
                    $reqe2=$reqe2->fetch();
                    if($reqe1[0]>0)
                    {
                        $valeur.= '
                        <tr>
                            <td>'.$donner[0].'</td>
                            <td> Contact Direct </td>
                            <td>
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                                </div>
                            </td>
                            <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                            <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                            <td> '.$data_users[1].' </td>
                        </tr>';
                    }
    
                }
            }
            return $valeur;
        }
        function validation_auto_rdv($id,$valifdation_rdv)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->prepare("update `auto_cmp_rdv` set `realisation_redez_vs`=? WHERE md5(`id`)=?");
            $param=array($valifdation_rdv,$id);
            if($reqind->execute($param))
            {
                return json_encode(array('validation'=>true));
            }
            else
            {
                return json_encode(array('validation'=>false));
            }
        }
        function get_all_rendez_vous_current_auto_user()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->prepare("SELECT acr.date,acr.date,acr.`status`,acr.`observation`,cd.Nom,cd.Prenom,acr.realisation_redez_vs,acr.id as 'id_auto',cd.id as 'id_cd' FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on rfcc.id=acr.`id_rdv_table` inner join contact_direct cd on cd.id=rfcc.contact where cd.Contact_Suivi_par=? and acr.`rendez_vous`=1");
            $param=array($_SESSION['user']['id']);
            $reqind->execute($param);
            $data_global="";
            while($data=$reqind->fetch())
            {
                if($data["realisation_redez_vs"]=="0")
                {
                    $button='<a class="btn btn-block btn-success btn-sm" onclick="valider_auto_rdv(\''.md5($data["id_auto"]).'\',1)">Effectué</a><a class="btn btn-block btn-danger btn-sm" onclick="valider_auto_rdv(\''.md5($data["id_auto"]).'\',-1)">Non Effectué</a>';
                }
                else if($data["realisation_redez_vs"]=="1")
                {
                    $button='<a class="btn btn-block btn-success btn-sm">Effectué</a>';
                }
                else if($data["realisation_redez_vs"]=="-1")
                {
                    $button='<a class="btn btn-block btn-danger btn-sm">Non Effectué</a>';
                }
                $btn="onclick=\"window.open('".$location."?page=contactd&id=".md5($data["id_cd"])."')\"";
                $data_global.="<tr><th>".$data[0]." ".$data[1]."</th><td>".$data[4]." ".$data[5]."</td><td>CD</td><td>".$data[2]."</td><td>".$data[3]."</td><td>$button</td><td><a class='btn btn-block btn-primary btn-sm' $btn>Afficher la fiche</a></td></tr>";
            }   
            return $data_global;
        }
        function get_rendez_vous_current_auto_user()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->prepare("SELECT acr.date,acr.heure,acr.`status`,acr.`observation`,cd.Nom,cd.Prenom FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc on rfcc.id=acr.`id_rdv_table` inner join contact_direct cd on cd.id=rfcc.contact where cd.Contact_Suivi_par=? and acr.`rendez_vous`=1 and acr.date=CURDATE()");
            $param=array($_SESSION['user']['id']);
            $reqind->execute($param);
            $data_global="";
            while($data=$reqind->fetch())
            {
                $data_global.="<tr><th>".$data[0]." ".$data[1]."</th><td>-</td><td>".$data[4]." ".$data[5]."</td><td>CD</td><td>".$data[2]."</td><td>".$data[3]."</td></tr>";
            }   
            return $data_global;
        }
        function add_rdv_from_call_center_caravane($status_rdv,$etat_rdv,$idid,$type_contact,$campagne)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CDI")
            {
                $reqind = $bdd->query("SELECT * FROM `contact_indirect` where md5(id)='$idid'");
            }
            else
            {
                $reqind = $bdd->query("SELECT * FROM `contact_direct` where md5(id)='$idid'");
            }
            $data=$reqind->fetch();
            $reqind = $bdd->prepare("INSERT INTO `rdv_from_call_center_caravane`( `user`, `campagne`, `contact`, `type_contact`, `status`, valider, `date_saisie`) VALUES (?,?,?,?,?,?,now())");
            $param=array($_SESSION['user']['id'],$campagne,$data[0],$type_contact,$status_rdv,$etat_rdv);
            if($reqind->execute($param)) {
                    return true;
                }
            else
            {
                return false;
            }
        }
         function updatecampagnecaravane($campagne,$observation,$ntel,$nemail,$etapephoning,$idid,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$formation_demandee,$status_rdv,$etat_rdv)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->query("SELECT * FROM `listcampagne` where Campagne1='$campagne'");
            $reqd = $bdd->query("SELECT * FROM `listcampagnedir` where Campagne1='$campagne'");
            if($reqind->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                        $var_test=$this->add_rdv_from_call_center_caravane($status_rdv,$etat_rdv,$idid,"CDI",$campagne);
                }
                
                if($var_test)
                {
                    $getphn = $bdd->query("select `Observations`,`Etape_Phoning`,`Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_indirect
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    $datephoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                        $datephoning="`Date_Phoning1`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                        $datephoning="`Date_Phoning2`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                        $datephoning="`Date_Phoning3`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                        $datephoning="`Date_Phoning4`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                        $datephoning="`Date_Phoning5`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                        $datephoning="`Date_Phoning6`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                        $datephoning="`Date_Phoning7`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                        $datephoning="`Date_Phoning8`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                        $datephoning="`Date_Phoning9`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                        $datephoning="`Date_Phoning10`=NOW()";
                    }
                    $Etape_Phoning="";
                    if($getphn['Etape_Phoning']=="")
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strpos(strtoupper(trim($getphn['Etape_Phoning'])), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strpos(strtoupper(trim($etapephoning)), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=?,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,".$phoning." ,".$datephoning.",Date_Dern_Phoning=CURDATE() ,Etape_Phoning=? where MD5(`id`)=? ");
                    $param = array($observation."#".$getphn['Observations'],$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$Etape_Phoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            elseif($reqd->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
               else
                {
                        $var_test=$this->add_rdv_from_call_center_caravane($status_rdv,$etat_rdv,$idid,"CD",$campagne);
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Etape_Phoning`,`Observation`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_direct
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
    
                        $datephoning="`Date_Phoning1`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                        $datephoning="`Date_Phoning2`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
    
                        $datephoning="`Date_Phoning3`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                        $datephoning="`Date_Phoning4`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                        $datephoning="`Date_Phoning5`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                        $datephoning="`Date_Phoning6`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                        $datephoning="`Date_Phoning7`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                        $datephoning="`Date_Phoning8`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                        $datephoning="`Date_Phoning9`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                        $datephoning="`Date_Phoning10`=NOW()";
                    }
                    $Etape_Phoning="";
                    if($getphn['Etape_Phoning']=="")
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strpos(strtoupper(trim($getphn['Etape_Phoning'])), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strpos(strtoupper(trim($etapephoning)), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    $obser=$observation.'#'.$getphn['Observation'];
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,".$datephoning.",`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE(),Etape_Phoning=? where MD5(`id`)=? ");
                    $param = array($obser,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$Etape_Phoning,$idid);
                    if($reqindss->execute($param)) {
                        include_once('content/controller/class.contact-direct.php');
                        $contact_directe = new ContactDirect();
                        $contact_directe->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            $reqind = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$campagne'");
            $reqd = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$campagne'");
            if($reqind->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                        $var_test=$this->add_rdv_from_call_center_caravane($status_rdv,$etat_rdv,$idid,"CDI",$campagne);
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Observations`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_indirect
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                    }
                    $obser=$getphn['Observations'];
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=CONCAT('".$obser."#',?),`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                    $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            elseif($reqd->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                        $var_test=$this->add_rdv_from_call_center_caravane($status_rdv,$etat_rdv,$idid,"CD",$campagne);
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_direct
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                    }
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=?,,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?`Ntel`=?,`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                    $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-direct.php');
                        $contact_directe = new ContactDirect();
                        $contact_directe->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }
                else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            $valeur="";
        }
        function add_rdv_from_call_center_site($status_rdv,$etat_rdv,$idid,$type_contact,$campagne)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                $reqind = $bdd->query("SELECT * FROM `contact_direct` where md5(id)='$idid'");
            $data=$reqind->fetch();
            $reqind = $bdd->prepare("INSERT INTO `rdv_from_call_center`( `user`, `campagne`, `contact`, `type_contact`, `rdv`, `status`, `date_saisie`) VALUES (?,?,?,?,?,?,now())");
            $param=array($_SESSION['user']['id'],$campagne,$data[0],$type_contact,$etat_rdv,$status_rdv);
            if($reqind->execute($param)) {
                    return $bdd->lastInsertId();
                }
            else
            {
                return -1;
            }
        }
        function updatecampagne_auto_cmp_site($campagne,$observation,$ntel,$nemail,$etapephoning,$idid,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,
        $notenational,$notegenerale,$formation_demandee,$status_rdv,$etat_rdv,$status,$date_rdv,$heure_rdv,$inscription_rdv,$type_contact)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CD")
            {
                $reqindss = $bdd->query("SELECT `id` FROM `rdv_from_call_center` WHERE `valider`=0 and `type_contact`='CD' and md5(`contact`)='".$idid."'");
                if($reqindss->rowCount()>0)
                {
                    $id_rdv=$reqindss->fetch();
                    $id_rdv=$id_rdv[0];
                }
                else
                {
                    $id_rdv=$this->add_rdv_from_call_center_site($status,$etat_rdv,($idid),"CD",$campagne);
                }
                  if($status=="NA")
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`(`id_rdv_table`, `status`, `observation`, `rendez_vous`, `date_saisie`) VALUES (?,?,?,0,NOW())");
                        $param = array($id_rdv,$status,$observation);
                        if($reqindss->execute($param)) {
                    $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                               $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
                  else
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`( `id_rdv_table`, `status`, `observation`, `rendez_vous`, `heure`, `date`, `type_rdv`, `date_saisie`) VALUES (?,?,?,1,?,?,?,Now())");
                        $param = array($id_rdv,$status,$observation,$heure_rdv,$date_rdv,$inscription_rdv);
                        if($reqindss->execute($param)) {
                                $reqindss = $bdd->prepare("update `rdv_from_call_center` set `valider`=1 WHERE `id`=?");
                                $param = array($id_rdv);
                                $reqindss->execute($param);
                    $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                            }
                            else
                            {
                                return json_encode(array('validation'=>false, 'message'=>$campagne));
                            }
                  }
                    
            }
        }
        function updatecampagne_auto_cmp($campagne,$observation,$ntel,$nemail,$etapephoning,$idid,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,
        $notenational,$notegenerale,$formation_demandee,$status_rdv,$etat_rdv,$status,$date_rdv,$heure_rdv,$inscription_rdv,$type_contact)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CDI")
            {
                 $reqindss = $bdd->query("SELECT `id` FROM `rdv_from_call_center` WHERE `valider`=0 and `type_contact`='CDI' and md5(`contact`)='".$idid."'");
                  $id_rdv=$reqindss->fetch();
                  $id_rdv=$id_rdv[0];
                  if($status=="NA")
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`(`id_rdv_table`, `status`, `observation`, `rendez_vous`, `date_saisie`) VALUES (?,?,?,0,NOW())");
                        $param = array($id_rdv,$status,$observation);
                        if($reqindss->execute($param)) { 
                                $updt=$bdd->query("update `contact_indirect` set Observations=' ' WHERE `Observations` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE()where MD5(`id`)=? ");
                                $param = array($observation,$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include('content/controller/class.contact-indirecte.php');
                                    $contact_indirecte = new contact_indirecte();
                                    $contact_indirecte->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
                  else
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`( `id_rdv_table`, `status`, `observation`, `rendez_vous`, `heure`, `date`, `type_rdv`, `date_saisie`) VALUES (?,?,?,1,?,?,?,Now())");
                        $param = array($id_rdv,$status,$observation,$heure_rdv,$date_rdv,$inscription_rdv);
                        if($reqindss->execute($param)) {
                                $reqindss = $bdd->prepare("update `rdv_from_call_center` set `valider`=1 WHERE `id`=?");
                                $param = array($id_rdv);
                                $reqindss->execute($param);
                                $updt=$bdd->query("update `contact_indirect` set Observations=' ' WHERE `Observations` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE()where MD5(`id`)=? ");
                                $param = array($observation,$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include('content/controller/class.contact-indirecte.php');
                                    $contact_indirecte = new contact_indirecte();
                                    $contact_indirecte->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
            }
            elseif($type_contact=="CD")
            {
                $reqindss = $bdd->query("SELECT `id` FROM `rdv_from_call_center` WHERE `valider`=0 and `type_contact`='CD' and md5(`contact`)='".$idid."'");
                    $id_rdv=$reqindss->fetch();
                  $id_rdv=$id_rdv[0];
                  if($status=="NA")
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`(`id_rdv_table`, `status`, `observation`, `rendez_vous`, `date_saisie`) VALUES (?,?,?,0,NOW())");
                        $param = array($id_rdv,$status,$observation);
                        if($reqindss->execute($param)) {
                    $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                               $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                        }
                        else
                        {
                            return json_encode(array('validation'=>false, 'message'=>$campagne));
                        }
                  }
                  else
                  {
                        $reqindss = $bdd->prepare("INSERT INTO `auto_cmp_rdv`( `id_rdv_table`, `status`, `observation`, `rendez_vous`, `heure`, `date`, `type_rdv`, `date_saisie`) VALUES (?,?,?,1,?,?,?,Now())");
                        $param = array($id_rdv,$status,$observation,$heure_rdv,$date_rdv,$inscription_rdv);
                        if($reqindss->execute($param)) {
                                $reqindss = $bdd->prepare("update `rdv_from_call_center` set `valider`=1 WHERE `id`=?");
                                $param = array($id_rdv);
                                $reqindss->execute($param);
                                
                                $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                                $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                                $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                                if($reqindss->execute($param)) {
                                    include_once('content/controller/class.contact-direct.php');
                                    $contact_directe = new ContactDirect();
                                    $contact_directe->changeetat($idid);
                                    return json_encode(array('validation'=>true, 'message'=>$campagne));
                                }
                                 else
                                {
                                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                                }
                            }
                            else
                            {
                                return json_encode(array('validation'=>false, 'message'=>$campagne));
                            }
                  }
                    
            }
        }
         function get_auto_campagne_site($campagne,$type_contact)
        {
            include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            //echo $type_contact;exit;
            if($type_contact=="CD")
            {
                
            $reqe1 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
             ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
             `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1tc`,`s2tc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,
             `annuelletc` FROM contact_direct where (`Nature_de_Contact`='Site Internet' or `Nature_de_Contact`='Landing Page') and Contact_Suivi_par=".$_SESSION['user']['id']."  and
            concat(`Nature_de_Contact`,' ',date(`date_du_contact`))='".$campagne."' and
(`Etape_Phoning1` is null or `Etape_Phoning1`='NA') and
(`Etape_Phoning2` is null or `Etape_Phoning2`='NA') and
(`Etape_Phoning3` is null or `Etape_Phoning3`='NA') and
(`Etape_Phoning4` is null or `Etape_Phoning4`='NA') and
(`Etape_Phoning5` is null or `Etape_Phoning5`='NA') and
(`Etape_Phoning6` is null or `Etape_Phoning6`='NA') and
(`Etape_Phoning7` is null or `Etape_Phoning7`='NA') and
(`Etape_Phoning8` is null or `Etape_Phoning8`='NA') and
(`Etape_Phoning9` is null or `Etape_Phoning9`='NA') and
(`Etape_Phoning10` is null or `Etape_Phoning10`='NA')
and id not in (SELECT contact FROM `rdv_from_call_center` WHERE `type_contact`='CD' AND (`valider`=1 or status<>'NA' or id in (SELECT `id_rdv_table` FROM `auto_cmp_rdv` WHERE `status`='NA' and date(`date_saisie`)=CURDATE()))) limit 0,1 ");
                if($reqe1->rowCount()>0)
                {
                while($dn=$reqe1->fetch())
                    {
                        $fr="";
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'Campage'=>$campagne,
                            'etphoning'=>$etphoning,
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observation']),
                            'Etape_Phoning'=>$dn['Etape_Phoning'],
                            'Etape_Phoning1'=>$dn['Etape_Phoning1'],
                            'Etape_Phoning2'=>$dn['Etape_Phoning2'],
                            'Etape_Phoning3'=>$dn['Etape_Phoning3'],
                            'Etape_Phoning4'=>$dn['Etape_Phoning4'],
                            'Etape_Phoning5'=>$dn['Etape_Phoning5'],
                            'Etape_Phoning6'=>$dn['Etape_Phoning6'],
                            'Etape_Phoning7'=>$dn['Etape_Phoning7'],
                            'Etape_Phoning8'=>$dn['Etape_Phoning8'],
                            'Etape_Phoning9'=>$dn['Etape_Phoning9'],
                            'Etape_Phoning10'=>$dn['Etape_Phoning10']
                        );
                    }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
            }
            return $data;
        }
        function get_auto_campagne($campagne,$type_contact)
        {
            include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            //echo $type_contact;exit;
            if($type_contact=="CD")
            {
                
            $reqe1 = $bdd->query('SELECT `Nom`,cd.`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
             ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
             `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1tc`,`s2tc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,
             `annuelletc` FROM `rdv_from_call_center` left join contact_direct cd on cd.id=rdv_from_call_center.contact where concat( Replace(`status`, "\'", "") ," ",date(rdv_from_call_center.`date_saisie`))="'.$campagne.'" and `valider`=0 and cd.Contact_Suivi_par='.$_SESSION['user']['id'].' and type_contact="CD" and rdv_from_call_center.valider=0 and rdv_from_call_center.id not in (SELECT `id_rdv_table` FROM `auto_cmp_rdv` WHERE date(`date_saisie`)=CURDATE()) limit 0,1 ');
                if($reqe1->rowCount()>0)
                {
                while($dn=$reqe1->fetch())
                    {
                        $fr="";
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'Campage'=>$campagne,
                            'etphoning'=>$etphoning,
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observation']),
                            'Etape_Phoning'=>$dn['Etape_Phoning'],
                            'Etape_Phoning1'=>$dn['Etape_Phoning1'],
                            'Etape_Phoning2'=>$dn['Etape_Phoning2'],
                            'Etape_Phoning3'=>$dn['Etape_Phoning3'],
                            'Etape_Phoning4'=>$dn['Etape_Phoning4'],
                            'Etape_Phoning5'=>$dn['Etape_Phoning5'],
                            'Etape_Phoning6'=>$dn['Etape_Phoning6'],
                            'Etape_Phoning7'=>$dn['Etape_Phoning7'],
                            'Etape_Phoning8'=>$dn['Etape_Phoning8'],
                            'Etape_Phoning9'=>$dn['Etape_Phoning9'],
                            'Etape_Phoning10'=>$dn['Etape_Phoning10']
                        );
                    }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
            }
            else
            {
                $reqe1 = $bdd->query(' SELECT `Nom`,cd.`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`,`Ville_Lycee`, `Formation` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observations`,`Formation_Demmandee`,`s1tc`,`s2tc`,
 `annuelletc`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale` FROM `rdv_from_call_center` left join contact_indirect cd on cd.id=rdv_from_call_center.contact where concat( Replace(`status`, "\'", "") ," ",date(rdv_from_call_center.`date_saisie`))="'.$campagne.'" and rdv_from_call_center.valider=0 and `valider`=0 and cd.Contact_Suivi_par='.$_SESSION['user']['id'].' and type_contact="CDI" and rdv_from_call_center.id not in (SELECT `id_rdv_table` FROM `auto_cmp_rdv` WHERE date(`date_saisie`)=CURDATE()) limit 0,1 ');
                $data="";
                if($reqe1->rowCount()>0)
                {
                    while($dn=$reqe1->fetch())
                    {
                        $fr="";
                       $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>$dn['Ville_Lycee'],
                            'Formation'=>$dn['Formation'],
                            'Formation_Demmandee'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'etphoning'=>$etphoning,
                            'Campage'=>$campagne,
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observations']),
                            'Etape_Phoning'=>$Etape_Phoning,
                            'Etape_Phoning1'=>$Etape_Phoning1,
                            'Etape_Phoning2'=>$Etape_Phoning2,
                            'Etape_Phoning3'=>$Etape_Phoning3,
                            'Etape_Phoning4'=>$Etape_Phoning4,
                            'Etape_Phoning5'=>$Etape_Phoning5,
                            'Etape_Phoning6'=>$Etape_Phoning6,
                            'Etape_Phoning7'=>$Etape_Phoning7,
                            'Etape_Phoning8'=>$Etape_Phoning8,
                            'Etape_Phoning9'=>$Etape_Phoning9,
                            'Etape_Phoning10'=>$Etape_Phoning10
                        );
                    }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
            }
            return $data;
        }
        function get_auto_cmp()
        {
             include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqe = $bdd->query("SELECT concat(`status`,' ',date(rfcc.`date_saisie`)) as 'Campagne',count(rfcc.id) as 'nbr',(SELECT count(acr.id) FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc1 on rfcc1.id=acr.`id_rdv_table` left join contact_direct cd1 on cd1.id=rfcc1.contact  WHERE acr.`status`='NA' and rfcc1.type_contact='CD' and cd1.Contact_Suivi_par=".$_SESSION['user']['id']." and date(rfcc1.`date_saisie`)=date(rfcc.`date_saisie`)) as 'test',
(SELECT count(rfcc2.id) FROM rdv_from_call_center rfcc2 inner join contact_direct cd1 on cd1.id=rfcc2.contact  WHERE rfcc2.`valider`=1  and rfcc2.type_contact='CD' and cd1.Contact_Suivi_par=".$_SESSION['user']['id']." and date(rfcc2.`date_saisie`)=date(rfcc.`date_saisie`)) as 'test1',
`type_contact`,cd.id FROM `rdv_from_call_center` as rfcc left join contact_direct cd on cd.id=rfcc.contact where `valider`=0 and cd.Contact_Suivi_par=".$_SESSION['user']['id']." and type_contact='CD' group by date(rfcc.`date_saisie`),`status`,type_contact");
            $data="";
            if($reqe->rowCount()>0)
            {
                while($donner=$reqe->fetch())
                {
                    $cmp=str_replace("'","",$donner['Campagne']);
                    $data.="<tr onclick=\"window.location='".$location."?page=auto_cmp_appels&Campagne=" .$cmp."&type_contact=" .$donner['type_contact']."' \">
                        <td>".$donner['Campagne']."</td>
                        <td>".$donner['type_contact']."</td>
                        <td>".$donner['nbr']."</td>
                        <td>".$donner['test']."</td>
                        <td>".$donner['test1']."</td>
                    </tr>";
                }
            }
            $reqe = $bdd->query("SELECT concat(`status`,' ',date(rfcc.`date_saisie`)) as 'Campagne',count(rfcc.id) as 'nbr',(SELECT count(acr.id) FROM `auto_cmp_rdv` acr inner join rdv_from_call_center rfcc1 on rfcc1.id=acr.`id_rdv_table` left join contact_indirect cd1 on cd1.id=rfcc1.contact  WHERE acr.`status`='NA' and rfcc1.type_contact='CD' and cd1.Contact_Suivi_par=".$_SESSION['user']['id']." and date(rfcc1.`date_saisie`)=date(rfcc.`date_saisie`)) as 'test',
(SELECT count(rfcc2.id) FROM rdv_from_call_center rfcc2 inner join contact_indirect cd1 on cd1.id=rfcc2.contact  WHERE rfcc2.`valider`=1  and rfcc2.type_contact='CDI' and cd1.Contact_Suivi_par=".$_SESSION['user']['id']." and date(rfcc2.`date_saisie`)=date(rfcc.`date_saisie`)) as 'test1',
`type_contact`,cd.id FROM `rdv_from_call_center` as rfcc left join contact_indirect cd on cd.id=rfcc.contact where `valider`=0 and cd.Contact_Suivi_par=".$_SESSION['user']['id']." and type_contact='CDI' group by date(rfcc.`date_saisie`),`status`,type_contact");
            if($reqe->rowCount()>0)
            {
                while($donner=$reqe->fetch())
                {
                    $cmp=str_replace("'","",$donner['Campagne']);
                    $data.="<tr onclick=\"window.location='".$location."?page=auto_cmp_appels&Campagne=" .$cmp."&type_contact=" .$donner['type_contact']."' \">
                        <td>".$donner['Campagne']."</td>
                        <td>".$donner['type_contact']."</td>
                        <td>".$donner['nbr']."</td>
                        <td>".$donner['test']."</td>
                        <td>".$donner['test1']."</td>
                    </tr>";
                }
            }
            $reqe = $bdd->query("SELECT count(id),concat(`Nature_de_Contact`,' ',date(`date_du_contact`)) FROM `contact_direct` WHERE (`Nature_de_Contact`='Site Internet' or `Nature_de_Contact`='Landing Page') and Contact_Suivi_par=".$_SESSION['user']['id']."  and
(`Etape_Phoning1` is null or `Etape_Phoning1`='NA') and
(`Etape_Phoning2` is null or `Etape_Phoning2`='NA') and
(`Etape_Phoning3` is null or `Etape_Phoning3`='NA') and
(`Etape_Phoning4` is null or `Etape_Phoning4`='NA') and
(`Etape_Phoning5` is null or `Etape_Phoning5`='NA') and
(`Etape_Phoning6` is null or `Etape_Phoning6`='NA') and
(`Etape_Phoning7` is null or `Etape_Phoning7`='NA') and
(`Etape_Phoning8` is null or `Etape_Phoning8`='NA') and
(`Etape_Phoning9` is null or `Etape_Phoning9`='NA') and
(`Etape_Phoning10` is null or `Etape_Phoning10`='NA')
and id not in (SELECT contact FROM `rdv_from_call_center` WHERE `type_contact`='CD' AND (`valider`=1 or status<>'NA' or id in (SELECT `id_rdv_table` FROM `auto_cmp_rdv` WHERE `status`='NA' and date(`date_saisie`)=CURDATE())))
group by concat(`Nature_de_Contact`,' ',date(`date_du_contact`))");
            if($reqe->rowCount()>0)
            {
                while($donner=$reqe->fetch())
                {
                    $cmp=str_replace("'","",$donner['Campagne']);
                    $data.="<tr onclick=\"window.location='".$location."?page=auto_cmpsite_appels&Campagne=" .$donner[1]."&type_contact=CD' \">
                        <td>".$donner[1]."</td>
                        <td>CD</td>
                        <td>".$donner[0]."</td>
                        <td>-</td>
                        <td>- </td>
                    </tr>";
                }
            }
            return $data;
        }
        function get_info_for_user_home()
        {
             include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqe = $bdd->query("SELECT count(*) FROM `contact_direct` WHERE `Contact_Suivi_par`=".$_SESSION['user']['id']);
            $nbr_contact=$reqe->fetch();
            $reqe = $bdd->query("SELECT count(*) FROM `contact_indirect` WHERE `Contact_Suivi_par`=".$_SESSION['user']['id']);
            $nbr_contact_cdi=$reqe->fetch();
            $reqe = $bdd->query("SELECT count(*) FROM `contact_direct` WHERE `Inscrit`=1 and `Contact_Suivi_par`=".$_SESSION['user']['id']);
            $nbr_contact_ins=$reqe->fetch();
            $reqe = $bdd->query("SELECT count(*) FROM `contact_direct` WHERE `Inscrit`=0 and `depot_dossier`=1 and `Contact_Suivi_par`=".$_SESSION['user']['id']);
            $nbr_contact_dep=$reqe->fetch();
            $values='<div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>'.$nbr_contact_cdi[0].'</h3>
                  <p>Contact Indirect</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>'.$nbr_contact[0].'<sup style="font-size: 20px"></sup></h3>
                  <p>Contact Direct</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>'.$nbr_contact_dep[0].'</h3>
                  <p>Dépôt Dossier</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>'.$nbr_contact_ins[0].'</h3>
                  <p>Inscrits</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>';
          return $values;
        }
        function get_action_week()
        {
             include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqe = $bdd->query("SELECT * FROM `actions_week` WHERE CURDATE() BETWEEN `date_debut` and `date_fin` and `commercial`=".$_SESSION['user']['id']);
            if($reqe->rowCount()>0)
            {
                $data=$reqe->fetch();
                $reqe = $bdd->query("SELECT * FROM `actions_week_action` WHERE `id_actions_week`=".$data['id']."");
                $value=array();
                while($dt=$reqe->fetch())
                {
                   array_push($value,$dt);
                }
                $data[count($data)]=$value;
                return $data;
            }
            else
            {
                $data=array();
                return $data;
            }
            
        }
         function add_action_week($commercial,$date_debut,$date_fin,$actions,$Objectif)
        {
             include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqe = $bdd->prepare("INSERT INTO `actions_week`( `commercial`, `date_debut`, `date_fin`, `objectif`, `id_user`, `date_saisie`) VALUES(?,?,?,?,?,NOW())");
             $param = array( $commercial,$date_debut,$date_fin,$Objectif,$_SESSION['user']['id']);
                if($reqe->execute($param)) {
                    $last_id=$bdd->lastInsertId();
                    for($i=0;$i<count($actions);$i++)
                    {
                        $req = $bdd->query("INSERT INTO `actions_week_action`(`id_actions_week`, `action`, `date_debut`, `date_fin`, `cibles`, `Nombre_prevu`,objectif) VALUES ('$last_id','".$actions[$i]['action']."','".$actions[$i]['date_debut']."','".$actions[$i]['date_fin']."','".$actions[$i]['Cibles']."','".$actions[$i]['nbr_cible_prevu']."','".$actions[$i]['objectif_action']."')");
                    }
                    return json_encode(array('validation'=>true));
                }else
                {
                    return json_encode(array('validation'=>false));
                }
        }
        function reaffectation_etb($Lycee,$Ville,$Ville_Lycee,$Nature_de_Contact,$agent,$suivi_par)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $query="";
            if($Lycee=="")
            {
                $query.=" and (Lycee is null or Lycee='')";
            }
            else
            {
                $query.=" and `Lycee`='$Lycee'";
            }
             if($Ville=="")
            {
                $query.=" and (Ville is null or Ville='')";
            }
            else
            {
                $query.=" and `Ville`='$Ville'";
            }
             if($Ville_Lycee=="")
            {
                $query.=" and (Ville_Lycee is null or Ville_Lycee='')";
            }
            else
            {
                $query.=" and `Ville_Lycee`='$Ville_Lycee'";
            }
             if($Nature_de_Contact=="")
            {
                $query.=" and (Nature_de_Contact is null or Nature_de_Contact='')";
            }
            else
            {
                $query.=" and `Nature_de_Contact`='$Nature_de_Contact'";
            }
            if($reqindss = $bdd->query("update contact_indirect set `Contact_Suivi_par`='$agent'  WHERE Contact_Suivi_par is not null and Contact_Suivi_par ='".$suivi_par."'".$query))
            {
                return json_encode(array('validation'=>true));
            }

        }
        function affectation_etb($Lycee,$Ville,$Ville_Lycee,$Nature_de_Contact,$agent)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $query="";
            if($Lycee=="")
            {
                $query.=" and (Lycee is null or Lycee='')";
            }
            else
            {
                $query.=" and `Lycee`='$Lycee'";
            }
             if($Ville=="")
            {
                $query.=" and (Ville is null or Ville='')";
            }
            else
            {
                $query.=" and `Ville`='$Ville'";
            }
             if($Ville_Lycee=="")
            {
                $query.=" and (Ville_Lycee is null or Ville_Lycee='')";
            }
            else
            {
                $query.=" and `Ville_Lycee`='$Ville_Lycee'";
            }
            
             if($Nature_de_Contact=="")
            {
                $query.=" and (Nature_de_Contact is null or Nature_de_Contact='')";
            }
            else
            {
                $query.=" and `Nature_de_Contact`='$Nature_de_Contact'";
            }
            if($reqindss = $bdd->query("update contact_indirect set `Contact_Suivi_par`='$agent'  WHERE Contact_Suivi_par is null ".$query))
            {
                return json_encode(array('validation'=>true));
            }

        }
        function liste_etb_reaffectation($nature_contact_hors,$Ville_hors,$Lycee_hors,$Ville_Lycee_hors)
        {
            $query="";
            if($nature_contact_hors!="")
            {
                 $nature_contact_hors = join("', '", $nature_contact_hors);
                 $query.=" and Nature_de_Contact in ('$nature_contact_hors')";
            }
            if($Ville_hors!="")
            {
                 $Ville_hors = join("', '", $Ville_hors);
                 $query.=" and Ville in ('$Ville_hors')";
            }
            if($Lycee_hors!="")
            {
                 $Lycee_hors = join("', '", $Lycee_hors);
                 $query.=" and Lycee in ('$Lycee_hors')";
            }
            if($Ville_Lycee_hors!="")
            {
                 $Ville_Lycee_hors = join("', '", $Ville_Lycee_hors);
                 $query.=" and Ville_Lycee in ('$Lycee_hors')";
            }
                include('content/config.php');
                $getagent=$this->getFunctions("getCommercial");
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                $reqindss = $bdd->query("SELECT count(cdi.`id`),`Lycee`,`Ville`,`Ville_Lycee`,`Nature_de_Contact`,u.nom,u.prenom,`Contact_Suivi_par` FROM `contact_indirect` cdi left join users u on u.id=cdi.`Contact_Suivi_par` where `Contact_Suivi_par` is not null ".$query." group by `Lycee`,`Ville`,`Nature_de_Contact` order by Nature_de_Contact limit 0,500");
                $values=$reqindss->fetchAll();
                $value="";
                $value.='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Etablisement</th>
                                    <th>Nbr. Contact</th>
                                    <th>Ville</th>
                                    <th>Ville Etablisement</th>
                                    <th>Nature de Contact</th>
                                    <th>Chargé de promotion affecté</th>
                                    <th>Chargé de promotion</th>
                                    <th>-</th>
                                </tr>
                                </thead>
                                <tbody>';
            $j=0;
                foreach($values as $vlm)
                {
                        $value.="<tr id='tr".$j."'>
                        <td><input type='text' id='Lycee".$j."' readonly value='".$vlm['Lycee']."'></td>
                        <td><input type='text' id='Lycee".$j."' readonly value='".$vlm[0]."'></td>
                        <td><input type='text' id='Ville".$j."' readonly value='".$vlm['Ville']."'></td>
                        <td><input type='text' id='Ville_Lycee".$j."' readonly value='".$vlm['Ville_Lycee']."'></td>
                        <td><input type='text' id='Nature_de_Contact".$j."' readonly value='".$vlm['Nature_de_Contact']."'></td>
                        <td><input type='text' id='nom".$j."' readonly value='".$vlm['nom']." ".$vlm['prenom']."'><input type='hidden' id='Contact_Suivi_par".$j."' readonly value='".$vlm['Contact_Suivi_par']."'></td>
                        <td><select id='agent".$j."'><option></option>".$getagent."</select></td>
                        <td><button onclick='reaffectation_etb(".$j.")'  id='btn".$j."'  class='btn btn-block btn-success'>Valider</button></td>";
                    $j++;
                   }
                $value.="</tbody><tfoot>
                                <tr>
                                      <th>Etablisement</th>
                                    <th>Nbr. Contact</th>
                                    <th>Ville</th>
                                    <th>Ville Etablisement</th>
                                    <th>Nature de Contact</th>
                                    <th>Chargé de promotion affecté</th>
                                    <th>Chargé de promotion</th>
                                     <th>-</th>
                                </tr>
                                </tfoot>
                            </table>";
                return $value;

        }
        function liste_etb_affectation()
        {
                include('content/config.php');
                $getagent=$this->getFunctions("getCommercial");
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                $reqindss = $bdd->query("SELECT count(`id`),`Lycee`,`Ville`,`Ville_Lycee`,`Nature_de_Contact` FROM `contact_indirect` where `Contact_Suivi_par` is null group by `Lycee`,`Ville`,`Nature_de_Contact`");
                $values=$reqindss->fetchAll();
                $value="";
                $value.='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Etablisement</th>
                                    <th>Nbr. Contact</th>
                                    <th>Ville</th>
                                    <th>Ville Etablisement</th>
                                    <th>Nature de Contact</th>
                                    <th>Chargé de promotion</th>
                                    <th>-</th>
                                </tr>
                                </thead>
                                <tbody>';
            $j=0;
                foreach($values as $vlm)
                {
                        $value.="<tr id='tr".$j."'>
                        <td><input type='text' id='Lycee".$j."' readonly value='".$vlm['Lycee']."'></td>
                        <td><input type='text' id='Lycee".$j."' readonly value='".$vlm[0]."'></td>
                        <td><input type='text' id='Ville".$j."' readonly value='".$vlm['Ville']."'></td>
                        <td><input type='text' id='Ville_Lycee".$j."' readonly value='".$vlm['Ville_Lycee']."'></td>
                        <td><input type='text' id='Nature_de_Contact".$j."' readonly value='".$vlm['Nature_de_Contact']."'></td>
                        <td><select id='agent".$j."'><option></option>".$getagent."</select></td>
                        <td><button onclick='affectation_etb(".$j.")'  id='btn".$j."'  class='btn btn-block btn-success'>Valider</button></td>";
                    $j++;
                   }
                $value.="</tbody><tfoot>
                                <tr>
                                      <th>Etablisement</th>
                                    <th>Nbr. Contact</th>
                                    <th>Ville</th>
                                    <th>Ville Etablisement</th>
                                    <th>Nature de Contact</th>
                                    <th>Chargé de promotion</th>
                                     <th>-</th>
                                </tr>
                                </tfoot>
                            </table>";
                return $value;

        }
        function create_cmp_detail($nom_cmp,$email,$object,$script)
        {
              include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
              $id_get_info=-1;
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                 $reqe = $bdd->prepare("INSERT INTO `cmp_detail`(`nom_cmp`, `email`, `script`, `object`) VALUES(?,?,?,?)");
                $param = array($nom_cmp,$email,$script,$object);
                if($reqe->execute($param)) {
                $id_get_info = $bdd->lastInsertId();
                }
                return $id_get_info;
        }
        function affecter_cmp_valider($agent,$nom_cmp){
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->prepare("SELECT distinct `type_cmp`,nom_cmp, count(`id`),`script`,`object`,`email` FROM `demande_creation_cmp` where `nom_cmp`=?");
            $reqindss->execute(array($nom_cmp));
            if($reqindss->rowCount()>0)
            {
                $data=$reqindss->fetch();
                if( $data[0] == "contactdirecte")
                {
                    require('content/controller/class.contact-direct.php');
                    $contact = new ContactDirect();
                }
                elseif( $data[0] == "contactindirecte")
                {
                    require('content/controller/class.contact-indirecte.php');
                    $contact = new contact_indirecte();
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
                 $return_val=$this->create_cmp_detail($nom_cmp,$data['email'],$data['object'],$data['script']);
                    if($return_val>0)
                    {
                        $data['email']=$return_val;
                        $data['object']=$return_val;
                        $data['script']=$return_val;
                        if(count($agent)>1)
                        {
                            $nbrtotale=intval($data[2]/count($agent));
                            $cp=1;
                            $j=0;
                            $reqindssver = $bdd->query("SELECT id,Campagne1,Campagne2,Campagne3,Campagne4,Campagne5,Campagne6,Campagne7,Campagne8,Campagne9,Campagne10 FROM `contact_indirect` WHERE (Campagne1 like '$nom_cmp' or Campagne2 like '$nom_cmp' or Campagne3 like '$nom_cmp' or Campagne4 like '$nom_cmp' or Campagne5 like '$nom_cmp' or Campagne6 like '$nom_cmp' or Campagne7 like '$nom_cmp' or Campagne8 like '$nom_cmp' or Campagne9 like '$nom_cmp' or Campagne10 like '$nom_cmp') and md5(id)='$value[0]'");
                           $req= $bdd->query("SELECT `id_contact`,id FROM `demande_creation_cmp` where `nom_cmp`='".$data['nom_cmp']."'");
                           while($value=$req->fetch())
                            {
                                 if($reqindssver->rowCount()<=0)
                                {
                                    if($j == count($_POST["agents_myarray"])-1)
                                    {
                                        $contact->setID($value[0]);
                                        $contact->setCampagne1($nom_cmp);
                                        $contact->setTA($agent[$j]);
                                        $contact->setScript1($data['script']);
                                        $contact->setEmailCmp($data['email']);
                                        $contact->setObject($data['object']);
                                        $contact->setID($value[0]);
                                    }
                                    else
                                    {
                                        $contact->setID($value[0]);
                                        $contact->setCampagne1($nom_cmp);
                                        $contact->setTA($agent[$j]);
                                        $contact->setScript1($data['script']);
                                        $contact->setEmailCmp($data['email']);
                                        $contact->setObject($data['object']);
                                        $contact->setID($value[0]);
                                        if($cp==$nbrtotale)
                                        {
                                            $cp=0;
                                            $j++;
                                        }
                                        $cp++;
                                    }
                                }
                                $contact->update();
                                $reqe= $bdd->query("update `demande_creation_cmp` set validation=1 where `id`='".$value['id']."'");
                            }
                        }
                        else{
                            $req= $bdd->query("SELECT `id_contact`,id FROM `demande_creation_cmp` where `nom_cmp`='".$data['nom_cmp']."'");
                            while($value=$req->fetch())
                            {
                               $reqindssver = $bdd->query("SELECT id,Campagne1,Campagne2,Campagne3,Campagne4,Campagne5,Campagne6,Campagne7,Campagne8,Campagne9,Campagne10 FROM `contact_indirect` WHERE (Campagne1 like '$nom_cmp' or Campagne2 like '$nom_cmp' or Campagne3 like '$nom_cmp' or Campagne4 like '$nom_cmp' or Campagne5 like '$nom_cmp' or Campagne6 like '$nom_cmp' or Campagne7 like '$nom_cmp' or Campagne8 like '$nom_cmp' or Campagne9 like '$nom_cmp' or Campagne10 like '$nom_cmp') and md5(id)='$value[0]'");
                                if($reqindssver->rowCount()<=0)
                                {
                                    $contact->setID($value[0]);
                                    $contact->setCampagne1($nom_cmp);
                                    $contact->setTA($agent[0]);
                                    $contact->setScript1($data['script']);
                                    $contact->setEmailCmp($data['email']);
                                    $contact->setObject($data['object']);
                                    $contact->update();
                                    $reqe= $bdd->query("update `demande_creation_cmp` set validation=1 where `id`='".$value['id']."'");
                                }
                            }
                        }
                    }
            }
            return json_encode(array('validation'=>true));
        }
        function get_demande_cmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT count(demande_creation_cmp.`id`),`nom_cmp`,`type_cmp`,`script`,demande_creation_cmp.`email`,demande_creation_cmp.object,`etape_phoning`,users.nom,users.prenom FROM `demande_creation_cmp` left join users on users.id=demande_creation_cmp.`id_createur` WHERE `validation`=0 group by `nom_cmp`");
            $values="";
            $getAgent=$this->getFunctions("getjustAgent");

            while($data=$reqindss->fetch())
            {
                $nom =str_replace(" ","",$data['nom_cmp']);
                $agent=' <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="agents_'.$nom.'" data-placeholder="Les agents ..." style="width: 100%;">
                                                             '.$getAgent.'
                                                        </select>';
                $values.="<tr id='tr_".$nom."'>
                        <td>".$data['nom_cmp']."</td>
                        <td>".$data['type_cmp']."</td>
                        <td>".$data['nom']." ".$data['prenom']."</td>
                        <td>".$data[0]."</td>
                        <td>".$data['etape_phoning']."</td>
                        <td width='300px'>".$data['script']."</td>
                        <td width='300px'>".$data['email']."</td>
                        <td>".$data['object']."</td>
                        <td>".$agent."</td>
                        <td><button id='btn_".$nom."' class='btn btn-block btn-success' onclick=\"validation_demande('".$data['nom_cmp']."')\">Valider</button></td>
</tr>";
            }
            return $values;
             }
        function create_demande_cmp($id_contacts,$nom,$type,$etape_phoning,$script,$email,$object){
            include('content/config.php');
            $etape_phoning=implode("#",$etape_phoning);
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            foreach ($id_contacts as $value){
                $reqindss = $bdd->prepare("INSERT INTO `demande_creation_cmp`(`id_contact`, `id_createur`, `date`, `nom_cmp`, `type_cmp`, `script`, `email`, `object`, `etape_phoning`)
                VALUES (?,?,NOW(),?,?,?,?,?,?)");
                $reqindss->execute(array($value,$_SESSION['user']['id'],$nom,$type,$script,$email,$object,$etape_phoning));
            }
            return json_encode(array('validation'=>true,'url'=>$location,'message'=>'<div class="text-center"><div class="callout callout-success" >Enregistrement reussi !</div></div>'));
        }
        function get_liste_etb()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT `Etablissement`,`Ville`,count(`id`) FROM `contact_direct`WHERE `Contact_Suivi_par`='".$_SESSION['user']['id']."'  group by `Etablissement`,`Ville` ");
            $values="";
            while($donner=$reqindss->fetch())
            {
               $values.="<tr><td>".$donner[0]."</td><td>".$donner[1]."</td><td>".$donner[2]."</td><td>Contact Direct</td></tr>";
            }
            $reqindss = $bdd->query("SELECT `Lycee`,`Ville`,count(`id`) FROM `contact_indirect`WHERE `Contact_Suivi_par`='".$_SESSION['user']['id']."'  group by `Lycee`,`Ville` ");
            while($donner=$reqindss->fetch())
            {
               $values.="<tr><td>".$donner[0]."</td><td>".$donner[1]."</td><td>".$donner[2]."</td><td>Contact Indirect</td></tr>";
            }
            return $values;
        }
        function get_liste_email_contact($type_cantact,$myarray)
        {
            include('content/config.php');
            $myarray = join("', '", $myarray);
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_cantact=="contactdirecte")
            {
                $reqindss = $bdd->query("select `E-Mail` from contact_direct where md5(id) in ('$myarray')");
            }
            else
            {
                $reqindss = $bdd->query("select `E-Mail` from contact_indirect where md5(id) in ('$myarray')");
            }
            $value=array();
            while($donner=$reqindss->fetch())
            {
                if (filter_var($donner[0], FILTER_VALIDATE_EMAIL)) {
                    $value[]=$donner[0];
                }
                
            }
            return $value;
        }
        function add_cmp_email($id_cantact,$campagne_mail,$type_cantact,$id_message_mail)
        {

            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
         $reqindss = $bdd->prepare("INSERT INTO `campagne_mailing`(`id_cantact`, `campagne_mail`, `date_campagne_mail`, `heure_campagne_mail`, `type_cantact`, `id_message_mail`) VALUES (?,?,CURDATE(),CURTIME(),?,?)");
            $reqindss->execute(array($id_cantact,$campagne_mail,$type_cantact,$id_message_mail));
            $value=$bdd->lastInsertId();
            return $value;
        }
        function add_email($Objet_message,$corps_message)
        {

            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $value="<option></option>";
            $reqindss = $bdd->prepare("INSERT INTO `message_mailing`(`Objet_message`, `corps_message`,`id_user`) VALUES (?,?,?)");
            $reqindss->execute(array($Objet_message,$corps_message,$_SESSION['user']['id']));
            $value=$bdd->lastInsertId();
            return $value;
        }
        function getlistecontact_for_mailling(
$anneeuniver,$typecontact,$formation,$marche,$nature_contact,$ville,$serie_bac,
$niveau_etd,$statut,$resultat,$test,$absent,$centre,$test_passe,$admis)
        {
            $formation = join("', '", $formation);
            $marche = join("', '", $marche);
            $nature_contact = join("', '", $nature_contact);
            $ville = join("', '", $ville);
            $serie_bac = join("', '", $serie_bac);
            $niveau_etd = join("', '", $niveau_etd);
            $resultat = join("', '", $resultat);
            $test = join("', '", $test);
            $absent = join("', '", $absent);
            $centre = join("', '", $centre);
            $test_passe = join("', '", $test_passe);
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            switch($typecontact){
                case "contactindirecte";
                    $quy="";
                    try {
                        //test $nature_contact
                        if($nature_contact=="all")
                        {
                            $quy.="";
                        }
                        elseif($nature_contact=="")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Nature_de_Contact` in ('$nature_contact')";
                        }
                        //test $ville
                        if($ville=="all")
                        {
                            $quy.="";
                        }
                        elseif($ville=="")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Ville` in ('$ville')";
                        }
                        //test $serie_bac
                        if($typecontact=="contactdirecte")
                        {
                            if($serie_bac=="all")
                            {
                                $quy.="";
                            }
                            elseif($serie_bac=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `serie_bac` in ('$serie_bac')";
                            }
                        }
                        //test $niveau_etd
                            if($niveau_etd=="all")
                            {
                                $quy.="";
                            }
                            elseif($niveau_etd=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `Niveau_des_etudes` in ('$niveau_etd')";
                            }
                        //test $resultat
                        if($resultat=="contactdirecte")
                        {
                            if($resultat=="all")
                            {
                                $quy.="";
                            }
                            elseif($resultat=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `Resultat` in ('$resultat')";
                            }
                        }
                        //test $test
                        if($test=="contactdirecte")
                        {
                            if($test=="all")
                            {
                                $quy.="";
                            }
                            elseif($test=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `test` in ('$test')";
                            }
                        }

                        //test $absent
                        if($absent=="contactdirecte")
                        {
                            if($absent=="all")
                            {
                                $quy.="";
                            }
                            elseif($absent=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `AbsTest` in ('$absent')";
                            }
                        }
                        //test $absent
                        if($test_passe=="contactdirecte")
                        {
                            if($test_passe=="all")
                            {
                                $quy.="";
                            }
                            elseif($test_passe=="")
                            {
                                $quy.="";
                            }
                            else
                            {
                                $quy.=" and `Test_Passe` in ('$test_passe')";
                            }
                        }
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($formation=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                        if($statut!="")
                        {
                            $quy.=" and (`StatutContact`='$statut')";
                        }
                         $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,`Nature_de_Contact`,`Ville_Lycee`,`Ville`,`Lycee`, `Niveau_des_etudes`,`Formation_Demmandee` FROM `contact_indirect` WHERE `Annee_Univ`='$anneeuniver' ".$quy." and transferer=0 and `E-Mail`<>'' and `E-Mail` is not null");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Lycee'].'</td>
                                                <td>'.$donner['Ville_Lycee'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</td>
                                                <td>'.$donner['Formation_Demmandee'].'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
            <h3>Email de la campagne :</h3>
            <div class="form-group">
                      <label for="ObservationEmail">Objet de Mail : </label>
                      <input type="text" class="form-control" id="ObservationEmail" placeholder="Objet de Mail">
                    </div>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        ini_set('memory_limit', '-1');
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "contactdirecte";
                    try {
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($etatphoning=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($etatphoning=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Etape_Phoning` in ('$etatphoning'))";
                        }
                        if($formation=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                        $id_user=$_SESSION['user']['id'];
                        $auto_contact="";
                        if( $autorisation_contact == 0 )
                        {
                            $auto_contact.=" and `Contact_Suivi_par` = '$id_user'";
                        }
                        $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,`Nature_de_Contact`,`Ville`,`Etablissement`, `Niveau_des_etudes`,`Test_Passe`,`Resultat`,`AbsTest`,
`diplomes_obtenus`,Formation_Demmandee FROM `contact_direct` WHERE `Annee_Univ`='$anneeuniver' ".$quy." ".$auto_contact." ");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                                <th>Test_Passe</th>
                                                <th>Resultat</th>
                                                <th>AbsTest</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            if($donner['Test_Passe']==1){$Test_Passe='Oui';}else{$Test_Passe='Non';}
                            if($donner['AbsTest']==1){$AbsTest='Oui';}else{$AbsTest='Non';}
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Etablissement'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</th>
                                                <td>'.$donner['Formation_Demmandee'].'</th>

                                                <td>'.$Test_Passe.'</th>
                                                <td>'.$donner['Resultat'].'</th>
                                                <td>'.$AbsTest.'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                                <th>Test_Passe</th>
                                                <th>Resultat</th>
                                                <th>AbsTest</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <textarea name="scripte" id="scripte" rows="10" cols="80">
            </textarea>
            <label for="ObservationEmail">Objet de Mail : </label>
                      <input type="text" class="form-control" id="ObservationEmail" placeholder="Objet de Mail">
             <h3>L\'email de campagne :</h3>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'scripte\' );
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
            }
        }
        function all_cmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $value="<option></option>";
            $reqindss = $bdd->query("select * from all_clt_cd");
            while($donner=$reqindss->fetch())
            {
                $value.="<option>".$donner[0]."</option>";
            }
            $reqindss = $bdd->query("select * from all_clt_cdi");
            while($donner=$reqindss->fetch())
            {
                $value.="<option>".$donner[0]."</option>";
            }
            return $value;
        }
        function all_test()
        {

            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $value="<option></option>";
            $reqindss = $bdd->query("select distinct test from `contact_direct`");
            while($donner=$reqindss->fetch())
            {
                if($donner[0]!="")
                {
                    $value.="<option>".$donner[0]."</option>";
                }
            }
            return $value;
        }
         function qualification_rappel()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->query("SELECT contact_indirect.Etape_Phoning as 'etp',contact_indirect.Nom,contact_indirect.Prenom
,contact_indirect.Tel, contact_indirect.`E-Mail`,contact_indirect.Nature_de_Contact,contact_indirect.Marche,md5(rappel.id) as 'id',rappel.date,
rappel.heure,rappel.etapephoning,rappel.observation,rappel.`id_contact`,users.nom as 'user_name',users.prenom as 'user_prenom' FROM `rappel` left join users on users.id=rappel.id_user LEFT JOIN contact_indirect on contact_indirect.id=rappel.id_contact where type='CDI' and qualification=0");
            $value="";
            while($data=$reqindss->fetch())
            {
                $value.="<tr id='tr_".$data['id']."'>
                    <td>Contact Indirect</td>
                    <td>".$data['Nom']."</td>
                    <td>".$data['Prenom']."</td>
                    <td>".$data['Tel']."</td>
                    <td>".$data['E-Mail']."</td>
                    <td>".$data['Nature_de_Contact']."</td>
                    <td>".$data['Marche']."</td>
                    <td>".$data['date']."</td>
                    <td>".$data['heure']."</td>
                    <td>".$data['observation']."</td>
                    <td>".$data['user_name']." ".$data['user_prenom']."</td>
                    <td>".$data['etp']."</td>
                    <td>".$data['etapephoning']."</td>
                    <td>
                    <select id='select_".$data['id']."'>
                        <option></option>
                        <option>".$data['etp']."</option>
                        <option>".$data['etapephoning']."</option>
                    </select>
                    <button id='btn_".$data['id']."' style='margin-top : 5px;' class='btn btn-block center btn-primary btn-xs' onclick=\"valider_selection_rappel('".$data['id']."','CDI','".md5($data['id_contact'])."');return false;\">Valider la sélection</button>
                    </td>
                </tr>";
            }
            return $value;
        }
         function change_qualification($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->prepare("update `rappel` set qualification=1 where md5(id)=?");
            $reqindss->execute(array($id));
            return json_encode(array('validation'=>true));
        }
        function delete_cdi_for_doubl($type,$auth)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->prepare("INSERT INTO `contact_indirect_deleted`(`id`, `Civilite`, `Nom`, `Prenom`, `Tel`, `E-Mail`, `Profession_Mere`, `Profession_Pere`, `Mail_Mere`, `Mail_Pere`, `Tel_Mere`, `Tel_Pere`, `Annee_Etude`, `Annee_Univ`, `Formation_Demmandee`, `Ville`, `Date`, `Groupe_Formation`, `Etape_Phoning2`, `Date_de_Naissance`, `Nature_de_Contact`, `GSM`, `Etape_Phoning`, `Etape_Phoning3`, `Marche`, `Zone`, `Ville_Lycee`, `Etape_Phoning1`, `Niveau_des_etudes`, `Etablissement`, `Lieu_de_Naissance`, `Branche`, `Observations`, `Lycee_Public`, `Observation_Chef_de_produit`, `Date_Dern_Phoning`, `Etape_Phoning8`, `TA8`, `Date_Phoning9`, `Diplome_Obtenu`, `Date_Saisie`, `Lycee_Prive`, `Date_Phoning1`, `Dern_Campagne`, `Etape_Phoning9`, `TA9`, `Date_Phoning10`, `Annee_Obtention`, `Heure_Saisie`, `Lycee_Mission`, `Date_Phoning2`, `TA`, `Etape_Phoning10`, `TA10`, `TA1`, `Experience_professionelle`, `Formation`, `StatutContact`, `Date_Phoning3`, `E-mail-Phoning`, `Date_Phoning6`, `Campagne1`, `TA2`, `Reçu_par`, `Transfert_CD`, `Date_Phoning4`, `A_ne_pas_filtrer`, `Date_Phoning7`, `Campagne2`, `TA3`, `Operateur_Saisie`, `Abandon`, `Date_Phoning5`, `Etape_Phoning6`, `Date_Phoning8`, `Campagne3`, `TA4`, `Categorie`, `Source_Contact`, `Campagne7`, `Etape_Phoning7`, `TA6`, `Campagne4`, `Etape_Phoning5`, `Interesse_Par`, `Campagne8`, `Etape_Phoning4`, `Campagne9`, `Campagne5`, `Adresse`, `CP`, `Campagne10`, `Campagne6`, `TA7`, `TA5`, `Lycee`, `script1`, `script2`, `script3`, `script4`, `script5`, `script6`, `script7`, `script8`, `script9`, `script10`, `Ntel`, `Nemail`, `vr1`, `vr2`, `vr3`, `vr4`, `vr5`, `vr6`, `vr7`, `vr8`, `vr9`, `vr10`, `valide`, `transferer`, `Exp`, `TypeExp`, `email1`, `email2`, `email3`, `email4`, `email5`, `email6`, `email7`, `email8`, `email9`, `email10`, `Contact_Suivi_par`, `object1`, `object2`, `object3`, `object4`, `object5`, `object6`, `object7`, `object8`, `object9`, `object10`, `centre`, `qualification1`, `qualification2`, `qualification3`, `qualification4`, `qualification5`, `qualification6`, `qualification7`, `qualification8`, `qualification9`, `qualification10`, `validation_doublage`, `s1tc`, `s2tc`, `annuelletc`, `s1bac1`, `s2bac1`, `annuellebac1`, `noteregional`, `s1bac2`, `s2bac2`, `annuellebac2`, `notenational`, `notegenerale`)  SELECT * FROM `contact_indirect` WHERE md5(`id`)=?");
            $reqindss->execute(array($auth));
            $req = $bdd->prepare("DELETE FROM `contact_indirect` WHERE md5(`id`)=?");
            $req->execute(array($auth));
            return json_encode(array('validation'=>true));
        }
        function update_cdi_for_doubl($type,$auth,$Nom,
        $Prenom,$Tel,$email,$Date,
        $Groupe_Formation,$Formation_Demmandee,$Nature_de_Contact
        ,$Ville,$Lycee,$Profession_Mere,$Profession_Pere
        ,$Mail_Mere,$Mail_Pere,$Tel_Mere,$Tel_Pere
        ,$Tel_Pere,$Date_de_Naissance,$Lieu_de_Naissance,$Adresse)
        {
                include('content/config.php');
                $con = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                $query = $con->prepare('update `contact_indirect` set `Nom`=?,`Prenom`=?,`Tel`=?,`E-Mail`=?,`Date`=?,`Groupe_Formation`=?,`Formation_Demmandee`=?,`Nature_de_Contact`=?,`Ville`=?,`Lycee`=?,`Profession_Mere`=?,`Profession_Pere`=?,`Mail_Mere`=?,`Mail_Pere`=?,`Tel_Mere`=?,`Tel_Pere`=?,`Date_de_Naissance`=?,`Lieu_de_Naissance`=? , `Adresse`=?,validation_doublage=1  WHERE md5(id)=?');
                $query->execute(array($Nom,$Prenom,$Tel,$email,$Date,$Groupe_Formation,$Formation_Demmandee,$Nature_de_Contact,$Ville,$Lycee,$Profession_Mere,$Profession_Pere,$Mail_Mere,$Mail_Pere,$Tel_Mere,$Tel_Pere,$Date_de_Naissance,$Lieu_de_Naissance,$Adresse,$auth));
                $this->validation_indcontact($auth);
                include('content/controller/class.contact-indirecte.php');
                $contact_indirecte = new contact_indirecte();
                $contact_indirecte->changeetat($auth);
                return json_encode(array('validation'=>true));
        }
        function get_cdi_for_doubl($id,$id1)
        {
            include('content/config.php');
            $con = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $query = $con->prepare('SELECT `Nom`,`Prenom`,`Tel`,`E-Mail`,`Date`,`Groupe_Formation`,`Formation_Demmandee`,`Nature_de_Contact`,`Ville`,`Lycee`,`Profession_Mere`,`Profession_Pere`,`Mail_Mere`,`Mail_Pere`,`Tel_Mere`,`Tel_Pere`,`Date_de_Naissance`,`Lieu_de_Naissance` , `Adresse` FROM `contact_indirect` WHERE md5(id)=?');
            $query->execute(array($id));
            $contc = $query->fetch();
            $query = $con->prepare('SELECT `Nom`,`Prenom`,`Tel`,`E-Mail`,`Date`,`Groupe_Formation`,`Formation_Demmandee`,`Nature_de_Contact`,`Ville`,`Lycee`,`Profession_Mere`,`Profession_Pere`,`Mail_Mere`,`Mail_Pere`,`Tel_Mere`,`Tel_Pere`,`Date_de_Naissance`,`Lieu_de_Naissance` , `Adresse` FROM `contact_indirect` WHERE md5(id)=?');
            $query->execute(array($id1));
            $contc1 = $query->fetch();
            return json_encode(array('validation'=>true,'content'=>$contc,'contenta'=>$contc1));
        }
        function update_cd_for_doubl($type,$auth,$Nom,$Prenom,$Tel,$email,$Date,$Groupe_Formation,$Formation_Demmandee,$Nature_de_Contact,$Ville,$Lycee,$Profession_Mere,$Profession_Pere,$Mail_Mere,$Mail_Pere,$Tel_Mere,$Tel_Pere,$Tel_Pere,$Date_de_Naissance,$Lieu_de_Naissance,$Adresse)
        {
                include('content/config.php');
                $con = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                $query = $con->prepare('update `contact_direct` set `Nom`=?,`Prenom`=?,`Tel`=?,`E-Mail`=?,`date_du_contact`=?,`Formation_Demmandee`=?,`niveau_demande`=?,`Nature_de_Contact`=?,`Ville`=?,`Etablissement`=?,`professionmere`=?,`professionpere`=?,`Mail_Mere`=?,`Mail_Pere`=?,`Tel_Mere`=?,`Tel_Pere`=?,`Date_de_Naissance`=?,`Lieu_de_Naissance`=? , `Adresse`=?,validation_doublage=1   WHERE md5(id)=?');
                $query->execute(array($Nom,$Prenom,$Tel,$email,$Date,$Groupe_Formation,$Formation_Demmandee,$Nature_de_Contact,$Ville,$Lycee,$Profession_Mere,$Profession_Pere,$Mail_Mere,$Mail_Pere,$Tel_Mere,$Tel_Pere,$Date_de_Naissance,$Lieu_de_Naissance,$Adresse,$auth));
                $this->validation_indcontact($auth);
                include_once('content/controller/class.contact-direct.php');
                $contact_directe = new ContactDirect();
                $contact_directe->changeetat($auth);
                return json_encode(array('validation'=>true));
        }
        function delete_cd_for_doubl($type,$auth)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqindss = $bdd->prepare("INSERT INTO `contact_direct_deleted`(`id`, `Civilite`, `Nom`, `Prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`, `Nationalite`, `Adresse`, `E-Mail`, `GSM`, `Tel`, `Formation_Demmandee`, `niveau_demande`, `date_du_contact`, `contact_suite_a`, `Nature_de_Contact`, `Annee_Univ`, `Tuteur`, `Nom_Tuteur`, `Prenom_Tuteur`, `Profession_Tuteur`, `Adresse_Tuteur`, `Tel_Tuteur`, `GSM_Tuteur`, `Zone`, `Ville`, `Marche`, `depot_dossier`, `date_depot`, `numero_dossier`, `pieces`, `date_piece`, `StatutContact`, `test`, `date_test`, `CP`, `Niveau_des_etudes`, `diplomes_obtenus`, `Etablissement`, `Annee_Obtention`, `serie_bac`, `langue1`, `langue2`, `Langue3`, `Etat_Dossier`, `Resident`, `Type_Résidence`, `Visite`, `nomprenompere`, `nomprenommere`, `adresseparents`, `professionpere`, `professionmere`, `Saisi_par`, `Reçu_par`, `Observation`, `Frais_Dossier`, `Date_Frais`, `Envoi_Convocation`, `Test_Passe`, `Date_test_passe`, `Resultat`, `Inscrit`, `AbsTest`, `Ticket_Restau_resid`, `Reservation_Residence`, `Lycee_Public`, `Lycee_Prive`, `Lycee_Mission`, `Motif_Absence_Test`, `Contact_Suivi_par`, `Insc_Reçu_par`, `Mail_Pere`, `Mail_Mere`, `Pays`, `Ville_Test`, `Pays_Test`, `facebook`, `Tel_Pere`, `Tel_Mere`, `Etape_Phoning1`, `Etape_Phoning2`, `Etape_Phoning3`, `Etape_Phoning4`, `Etape_Phoning5`, `Etape_Phoning`, `Date_Phoning1`, `Date_Phoning2`, `Date_Phoning3`, `Date_Phoning4`, `Date_Phoning5`, `Date_Dern_Phoning`, `Dern_Campagne`, `TA`, `E-mail-Phoning`, `Etape_Phoning6`, `Etape_Phoning7`, `Etape_Phoning8`, `Etape_Phoning9`, `Etape_Phoning10`, `Date_Phoning6`, `Date_Phoning7`, `Date_Phoning8`, `Date_Phoning9`, `Date_Phoning10`, `TA1`, `TA2`, `TA3`, `TA4`, `TA5`, `TA6`, `TA7`, `TA8`, `TA9`, `TA10`, `Campagne1`, `Campagne2`, `Campagne3`, `Campagne4`, `Campagne5`, `Campagne6`, `Campagne7`, `Campagne8`, `Campagne9`, `Campagne10`, `script1`, `script2`, `script3`, `script4`, `script5`, `script6`, `script7`, `script8`, `script9`, `script10`, `valide`, `nTel`, `nEmail`, `vr1`, `vr2`, `vr3`, `vr4`, `vr5`, `vr6`, `vr7`, `vr8`, `vr9`, `vr10`, `dern_auto_cmp`, `Exp`, `TypeExp`, `email1`, `email2`, `email3`, `email4`, `email5`, `email6`, `email7`, `email8`, `email9`, `email10`, `object1`, `object2`, `object3`, `object4`, `object5`, `object6`, `object7`, `object8`, `object9`, `object10`, `qualification1`, `qualification2`, `qualification3`, `qualification4`, `qualification5`, `qualification6`, `qualification7`, `qualification8`, `qualification9`, `qualification10`, `validation_doublage`, `s1tc`, `s2tc`, `annuelletc`, `s1bac1`, `s2bac1`, `annuellebac1`, `noteregional`, `s1bac2`, `s2bac2`, `annuellebac2`, `notenational`, `notegenerale`) SELECT contact_direct.`id`, contact_direct.`Civilite`, contact_direct.`Nom`, contact_direct.`Prenom`, contact_direct.`Date_de_Naissance`, contact_direct.`Lieu_de_Naissance`, contact_direct.`Nationalite`, contact_direct.`Adresse`, contact_direct.`E-Mail`, contact_direct.`GSM`, contact_direct.`Tel`, contact_direct.`Formation_Demmandee`, contact_direct.`niveau_demande`, contact_direct.`date_du_contact`, contact_direct.`contact_suite_a`, contact_direct.`Nature_de_Contact`, contact_direct.`Annee_Univ`, contact_direct.`Tuteur`, contact_direct.`Nom_Tuteur`, contact_direct.`Prenom_Tuteur`, contact_direct.`Profession_Tuteur`, contact_direct.`Adresse_Tuteur`, contact_direct.`Tel_Tuteur`, contact_direct.`GSM_Tuteur`, contact_direct.`Zone`, contact_direct.`Ville`, contact_direct.`Marche`, contact_direct.`depot_dossier`, contact_direct.`date_depot`, contact_direct.`numero_dossier`, contact_direct.`pieces`, contact_direct.`date_piece`, contact_direct.`StatutContact`, contact_direct.`test`, contact_direct.`date_test`, contact_direct.`CP`, contact_direct.`Niveau_des_etudes`, contact_direct.`diplomes_obtenus`, contact_direct.`Etablissement`, contact_direct.`Annee_Obtention`, contact_direct.`serie_bac`, contact_direct.`langue1`, contact_direct.`langue2`, contact_direct.`Langue3`, contact_direct.`Etat_Dossier`, contact_direct.`Resident`, contact_direct.`Type_Résidence`, contact_direct.`Visite`, contact_direct.`nomprenompere`, contact_direct.`nomprenommere`, contact_direct.`adresseparents`, contact_direct.`professionpere`, contact_direct.`professionmere`, contact_direct.`Saisi_par`, contact_direct.`Reçu_par`, contact_direct.`Observation`, contact_direct.`Frais_Dossier`, contact_direct.`Date_Frais`, contact_direct.`Envoi_Convocation`, contact_direct.`Test_Passe`, contact_direct.`Date_test_passe`, contact_direct.`Resultat`, contact_direct.`Inscrit`, contact_direct.`AbsTest`, contact_direct.`Ticket_Restau_resid`, contact_direct.`Reservation_Residence`, contact_direct.`Lycee_Public`, contact_direct.`Lycee_Prive`, contact_direct.`Lycee_Mission`, contact_direct.`Motif_Absence_Test`, contact_direct.`Contact_Suivi_par`, contact_direct.`Insc_Reçu_par`, contact_direct.`Mail_Pere`, contact_direct.`Mail_Mere`, contact_direct.`Pays`, contact_direct.`Ville_Test`, contact_direct.`Pays_Test`, contact_direct.`facebook`, contact_direct.`Tel_Pere`, contact_direct.`Tel_Mere`, contact_direct.`Etape_Phoning1`, contact_direct.`Etape_Phoning2`, contact_direct.`Etape_Phoning3`, contact_direct.`Etape_Phoning4`, contact_direct.`Etape_Phoning5`, contact_direct.`Etape_Phoning`, contact_direct.`Date_Phoning1`, contact_direct.`Date_Phoning2`, contact_direct.`Date_Phoning3`, contact_direct.`Date_Phoning4`, contact_direct.`Date_Phoning5`, contact_direct.`Date_Dern_Phoning`, contact_direct.`Dern_Campagne`, contact_direct.`TA`, contact_direct.`E-mail-Phoning`, contact_direct.`Etape_Phoning6`, contact_direct.`Etape_Phoning7`, contact_direct.`Etape_Phoning8`, contact_direct.`Etape_Phoning9`, contact_direct.`Etape_Phoning10`, contact_direct.`Date_Phoning6`, contact_direct.`Date_Phoning7`, contact_direct.`Date_Phoning8`, contact_direct.`Date_Phoning9`, contact_direct.`Date_Phoning10`, contact_direct.`TA1`, contact_direct.`TA2`, contact_direct.`TA3`, contact_direct.`TA4`, contact_direct.`TA5`, contact_direct.`TA6`, contact_direct.`TA7`, contact_direct.`TA8`, contact_direct.`TA9`, contact_direct.`TA10`, contact_direct.`Campagne1`, contact_direct.`Campagne2`, contact_direct.`Campagne3`, contact_direct.`Campagne4`, contact_direct.`Campagne5`, contact_direct.`Campagne6`, contact_direct.`Campagne7`, contact_direct.`Campagne8`, contact_direct.`Campagne9`, contact_direct.`Campagne10`, contact_direct.`script1`, contact_direct.`script2`, contact_direct.`script3`, contact_direct.`script4`, contact_direct.`script5`, contact_direct.`script6`, contact_direct.`script7`, contact_direct.`script8`, contact_direct.`script9`, contact_direct.`script10`, contact_direct.`valide`, contact_direct.`nTel`, contact_direct.`nEmail`, contact_direct.`vr1`, contact_direct.`vr2`, contact_direct.`vr3`, contact_direct.`vr4`, contact_direct.`vr5`, contact_direct.`vr6`, contact_direct.`vr7`, contact_direct.`vr8`, contact_direct.`vr9`, contact_direct.`vr10`, contact_direct.`dern_auto_cmp`, contact_direct.`Exp`, contact_direct.`TypeExp`, contact_direct.`email1`, contact_direct.`email2`, contact_direct.`email3`, contact_direct.`email4`, contact_direct.`email5`, contact_direct.`email6`, contact_direct.`email7`, contact_direct.`email8`, contact_direct.`email9`, contact_direct.`email10`, contact_direct.`object1`, contact_direct.`object2`, contact_direct.`object3`, contact_direct.`object4`, contact_direct.`object5`, contact_direct.`object6`, contact_direct.`object7`, contact_direct.`object8`, contact_direct.`object9`, contact_direct.`object10`, contact_direct.`qualification1`, contact_direct.`qualification2`, contact_direct.`qualification3`, contact_direct.`qualification4`, contact_direct.`qualification5`, contact_direct.`qualification6`, contact_direct.`qualification7`, contact_direct.`qualification8`, contact_direct.`qualification9`, contact_direct.`qualification10`, contact_direct.`validation_doublage`, contact_direct.`s1tc`, contact_direct.`s2tc`, contact_direct.`annuelletc`, contact_direct.`s1bac1`, contact_direct.`s2bac1`, contact_direct.`annuellebac1`, contact_direct.`noteregional`, contact_direct.`s1bac2`, contact_direct.`s2bac2`, contact_direct.`annuellebac2`, contact_direct.`notenational`, contact_direct.`notegenerale` FROM `contact_direct` WHERE md5(`id`)=?");
            $reqindss->execute(array($auth));
            $req = $bdd->prepare("DELETE FROM `contact_direct` WHERE md5(`id`)=?");
            $req->execute(array($auth));
            return json_encode(array('validation'=>true));
        }
        function get_cd_for_doubl($id,$id1)
        {
            include('content/config.php');
            $con = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $query = $con->prepare('SELECT `Nom`,`Prenom`,`Tel`,`E-Mail`,`date_du_contact`,`Formation_Demmandee`,`niveau_demande`,`Nature_de_Contact`,`Ville`,`Etablissement`,`professionmere`,`professionpere` ,`Mail_Mere`,`Mail_Pere`,`Tel_Mere`,`Tel_Pere`,`Date_de_Naissance`,`Lieu_de_Naissance` , `Adresse`, `Test_Passe`,`test`,`date_test`,`Frais_Dossier`,`Date_Frais`,`depot_dossier`,`date_depot` FROM `contact_direct` WHERE md5(id)=?');
            $query->execute(array($id));
            $contc = $query->fetch();
            $query = $con->prepare('SELECT `Nom`,`Prenom`,`Tel`,`E-Mail`,`date_du_contact`,`Formation_Demmandee`,`niveau_demande`,`Nature_de_Contact`,`Ville`,`Etablissement`,`professionmere`,`professionpere` ,`Mail_Mere`,`Mail_Pere`,`Tel_Mere`,`Tel_Pere`,`Date_de_Naissance`,`Lieu_de_Naissance` , `Adresse`, `Test_Passe`,`test`,`date_test`,`Frais_Dossier`,`Date_Frais`,`depot_dossier`,`date_depot` FROM `contact_direct` WHERE md5(id)=?');
            $query->execute(array($id1));
            $contc1 = $query->fetch();
            return json_encode(array('validation'=>true,'content'=>$contc,'contenta'=>$contc1));
        }
         function validation_direct_contact($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("update `contact_direct` set validation_doublage=1 where md5(id)=?");
            $req->execute(array($id));
            include_once('content/controller/class.contact-direct.php');
            $contact_directe = new ContactDirect();
            $contact_directe->changeetat($id);
            return json_encode(array('validation'=>true));
        }
        function updatecampagnerappel($type,$idid,$etapephoning,$observation,$ntel,$nemail,$s1tc,$s2tc,$annuelletc,
                                      $s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,
                                      $notegenerale,$formation_demandee,$status_rdv,$etat_rdv)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type=="CDI")
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CDI","rappel");
                }
                
                if($var_test)
                {
                    
                    $updt=$bdd->query("update `contact_indirect` set Observations=' ' WHERE `Observations` is null");
                    $reqindss = $bdd->prepare("update`contact_indirect` set `Observations`=concat(Observations,'#','(',NOW(),') ',?)  WHERE md5(`id`)=?");
                    $param = array($observation,$idid);
                    $reqindss = $bdd->prepare("SELECT `id` FROM `contact_indirect` WHERE md5(`id`)=?");
                    $param = array($idid);
                    $reqindss->execute($param);
                    $ide=$reqindss->fetch();
                    $reqindss = $bdd->prepare("INSERT INTO `rappel`(`id_contact`, `id_user`, `date`, `heure`, `etapephoning`, `observation`, `type`) VALUES (?,?,CURDATE(),CURTIME(),?,?,?)");
                    $param = array($ide[0],$_SESSION['user']['id'],$etapephoning,$observation,$type);
                    $reqindss->execute($param);
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=? where MD5(`id`)=? ");
                    $param = array($formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true));
                    }
                }
            }
            elseif($type=="CD")
            {
                
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CD","rappel");
                }
                if($var_test)
                {
                    $updt=$bdd->query("update `contact_direct` set Observation=' ' WHERE `Observation` is null");
                    $reqindss = $bdd->prepare("update `contact_direct` set `Observation`=concat(Observation,'#','(',NOW(),') ',?)  WHERE md5(`id`)=?");
                    $param = array($observation,$idid);
                    $reqindss = $bdd->prepare("SELECT `id` FROM `contact_direct` WHERE md5(`id`)=?");
                    $param = array($idid);
                    $reqindss->execute($param);
                    $ide=$reqindss->fetch();
                    $reqindss = $bdd->prepare("INSERT INTO `rappel`(`id_contact`, `id_user`, `date`, `heure`, `etapephoning`, `observation`, `type`) VALUES (?,?,CURDATE(),CURTIME(),?,?,?)");
                    $param = array($ide[0],$_SESSION['user']['id'],$etapephoning,$observation,$type);
                    $reqindss->execute($param);
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=? where MD5(`id`)=? ");
                    $param = array($formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true));
                    }
                }
            }
            else
            {
                return json_encode(array('validation'=>false));
            }
            $valeur="";
        }
        function getcontactrappel($id,$type)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            try
            {
                $etphoning="<option></option>";
                $etapephoning = $bdd->query("SELECT * FROM `etapephoning`");
                while($test=$etapephoning->fetch())
                {
                    $etphoning.="
                                    <option>".$test[1]."</option>
                                ";
                }
                if($type=="CDI")
                {
                    $req_formation=$bdd->query("SELECT * FROM `formation_demander`");
                    $reqe1 = $bdd->prepare("SELECT ci.`Nom`,ci.`id`,ci.`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`,`Ville_Lycee`, `Formation` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observations`,`Formation_Demmandee`,`s1tc`,`s2tc`,
 `annuelletc`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,u.prenom as 'prenom_user',u.nom as 'nom_user'
  FROM `contact_indirect` ci left join users u on u.id=ci.Contact_Suivi_par WHERE md5(ci.id)=?");
                    $reqe1->execute(array($id));
                    while($dn=$reqe1->fetch())
                    {
                        $fr="<select class='form-control col-md-6' id='formation_demandee'><option></option>";
                        while($donf=$req_formation->fetch())
                        {
                            if($dn['Formation_Demmandee']==$donf['formation'])
                            {
                                $fr=$fr."<option selected>".$dn['Formation_Demmandee']."</option>";
                            }
                            else
                            {
                                $fr=$fr."<option>".$donf['formation']."</option>";
                            }
                        }
                        $fr=$fr."</select>";
                        if($dn['Etape_Phoning']==null)
                        {
                            $Etape_Phoning="";
                        }
                        else
                        {
                            $Etape_Phoning=$dn['Etape_Phoning'];
                        }
                        if($dn['Etape_Phoning1']==null)
                        {
                            $Etape_Phoning1="";
                        }
                        else
                        {
                            $Etape_Phoning1=$dn['Etape_Phoning1'];
                        }
                        if($dn['Etape_Phoning2']==null)
                        {
                            $Etape_Phoning2="";
                        }
                        else
                        {
                            $Etape_Phoning2=$dn['Etape_Phoning2'];
                        }
                        if($dn['Etape_Phoning3']==null)
                        {
                            $Etape_Phoning3="";
                        }
                        else
                        {
                            $Etape_Phoning3=$dn['Etape_Phoning3'];
                        }
                        if($dn['Etape_Phoning4']==null)
                        {
                            $Etape_Phoning4="";
                        }
                        else
                        {
                            $Etape_Phoning4=$dn['Etape_Phoning4'];
                        }
                        if($dn['Etape_Phoning5']==null)
                        {
                            $Etape_Phoning5="";
                        }
                        else
                        {
                            $Etape_Phoning5=$dn['Etape_Phoning5'];
                        }
                        if($dn['Etape_Phoning6']==null)
                        {
                            $Etape_Phoning6="";
                        }
                        else
                        {
                            $Etape_Phoning6=$dn['Etape_Phoning6'];
                        }
                        if($dn['Etape_Phoning7']==null)
                        {
                            $Etape_Phoning7="";
                        }
                        else
                        {
                            $Etape_Phoning7=$dn['Etape_Phoning7'];
                        }
                        if($dn['Etape_Phoning8']==null)
                        {
                            $Etape_Phoning8="";
                        }
                        else
                        {
                            $Etape_Phoning8=$dn['Etape_Phoning8'];
                        }
                        if($dn['Etape_Phoning9']==null)
                        {
                            $Etape_Phoning9="";
                        }
                        else
                        {
                            $Etape_Phoning9=$dn['Etape_Phoning9'];
                        }
                        if($dn['Etape_Phoning10']==null)
                        {
                            $Etape_Phoning10="";
                        }
                        else
                        {
                            $Etape_Phoning10=$dn['Etape_Phoning10'];
                        }
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>$dn['Ville_Lycee'],
                            'Formation'=>$dn['Formation'],
                            'Formation_Demmandee'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'GSM'=>$dn['GSM'],
                            'contact_suivi_par'=>$dn['nom_user'].' '.$dn['prenom_user'],
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'etphoning'=>$etphoning,
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observations']),
                            'Etape_Phoning'=>$Etape_Phoning,
                            'Etape_Phoning1'=>$Etape_Phoning1,
                            'Etape_Phoning2'=>$Etape_Phoning2,
                            'Etape_Phoning3'=>$Etape_Phoning3,
                            'Etape_Phoning4'=>$Etape_Phoning4,
                            'Etape_Phoning5'=>$Etape_Phoning5,
                            'Etape_Phoning6'=>$Etape_Phoning6,
                            'Etape_Phoning7'=>$Etape_Phoning7,
                            'Etape_Phoning8'=>$Etape_Phoning8,
                            'Etape_Phoning9'=>$Etape_Phoning9,
                            'Etape_Phoning10'=>$Etape_Phoning10
                        );
                    }
                }
                elseif($type=="CD")
                {
                     $req_formation=$bdd->query("SELECT * FROM `formation_demander`");
                    $reqe1 = $bdd->prepare("SELECT cd.`Nom`,cd.`id`,cd.`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
                     ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`s1tc`,`s2tc`,
 `annuelletc`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,u.prenom as 'prenom_user',u.nom as 'nom_user'
                     FROM `contact_direct` cd left join users u on u.id=cd.Contact_Suivi_par
                       WHERE md5(cd.id)=?");
                    $reqe1->execute(array($id));
                    while($dn=$reqe1->fetch())
                    {
                        $fr="<select class='form-control col-md-6' id='formation_demandee'><option></option>";
                        while($donf=$req_formation->fetch())
                        {
                            if($dn['Formation_Demmandee']==$donf['formation'])
                            {
                                $fr=$fr."<option selected>".$dn['Formation_Demmandee']."</option>";
                            }
                            else
                            {
                                $fr=$fr."<option>".$donf['formation']."</option>";
                            }
                        }
                        $fr=$fr."</select>";
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation_Demmandee'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'GSM'=>$dn['GSM'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'etphoning'=>$etphoning,
                            'id'=>md5($dn['id']),
                            'contact_suivi_par'=>$dn['nom_user'].' '.$dn['prenom_user'],
                            'Observations'=>explode("#",$dn['Observation']),
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'Etape_Phoning1'=>$dn['Etape_Phoning1'],
                            'Etape_Phoning2'=>$dn['Etape_Phoning2'],
                            'Etape_Phoning3'=>$dn['Etape_Phoning3'],
                            'Etape_Phoning4'=>$dn['Etape_Phoning4'],
                            'Etape_Phoning5'=>$dn['Etape_Phoning5'],
                            'Etape_Phoning6'=>$dn['Etape_Phoning6'],
                            'Etape_Phoning7'=>$dn['Etape_Phoning7'],
                            'Etape_Phoning8'=>$dn['Etape_Phoning8'],
                            'Etape_Phoning9'=>$dn['Etape_Phoning9'],
                            'Etape_Phoning10'=>$dn['Etape_Phoning10']
                        );
                    }
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
            }
            catch(Exception $e)
            {
                die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
            }
        }
     function deletecampagne($auth,$type)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type="CDI")
            {
                $req = $bdd->prepare("update `contact_indirect` set `Campagne1`=NULL,Exp=0,TypeExp='M',vr1=0 WHERE `Etape_Phoning1` is NULL and `Campagne1`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne2`=NULL,Exp=0,TypeExp='M',vr2=0 WHERE `Etape_Phoning2` is NULL and `Campagne2`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne3`=NULL,Exp=0,TypeExp='M',vr3=0 WHERE `Etape_Phoning3` is NULL and `Campagne3`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne4`=NULL,Exp=0,TypeExp='M',vr4=0 WHERE `Etape_Phoning4` is NULL and `Campagne4`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne5`=NULL,Exp=0,TypeExp='M',vr5=0 WHERE `Etape_Phoning5` is NULL and `Campagne5`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne6`=NULL,Exp=0,TypeExp='M',vr6=0 WHERE `Etape_Phoning6` is NULL and `Campagne6`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne7`=NULL,Exp=0,TypeExp='M',vr7=0 WHERE `Etape_Phoning7` is NULL and `Campagne7`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne8`=NULL,Exp=0,TypeExp='M',vr8=0 WHERE `Etape_Phoning8` is NULL and `Campagne8`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne9`=NULL,Exp=0,TypeExp='M',vr9=0 WHERE `Etape_Phoning9` is NULL and `Campagne9`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set `Campagne10`=NULL,Exp=0,TypeExp='M',vr10=0 WHERE `Etape_Phoning10` is NULL and `Campagne10`=? ");
                $req->execute(array($auth));
                 $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr1=0 WHERE `Campagne1`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr2=0 WHERE `Campagne2`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr3=0 WHERE `Campagne3`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr4=0 WHERE `Campagne4`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr5=0 WHERE `Campagne5`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr6=0 WHERE `Campagne6`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr7=0 WHERE `Campagne7`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr8=0 WHERE `Campagne8`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr9=0 WHERE `Campagne9`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_indirect` set Exp=0,TypeExp='M',vr10=0 WHERE `Campagne10`=? ");
                $req->execute(array($auth));
            }
            if($type="CD")
            {
                $req = $bdd->prepare("update `contact_direct` set `Campagne1`=NULL,Exp=0,TypeExp='M',vr1=0 WHERE `Etape_Phoning1` is NULL and `Campagne1`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne2`=NULL,Exp=0,TypeExp='M',vr2=0 WHERE `Etape_Phoning2` is NULL and `Campagne2`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne3`=NULL,Exp=0,TypeExp='M',vr3=0 WHERE `Etape_Phoning3` is NULL and `Campagne3`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne4`=NULL,Exp=0,TypeExp='M',vr4=0 WHERE `Etape_Phoning4` is NULL and `Campagne4`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne5`=NULL,Exp=0,TypeExp='M',vr5=0 WHERE `Etape_Phoning5` is NULL and `Campagne5`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne6`=NULL,Exp=0,TypeExp='M',vr6=0 WHERE `Etape_Phoning6` is NULL and `Campagne6`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne7`=NULL,Exp=0,TypeExp='M',vr7=0 WHERE `Etape_Phoning7` is NULL and `Campagne7`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne8`=NULL,Exp=0,TypeExp='M',vr8=0 WHERE `Etape_Phoning8` is NULL and `Campagne8`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne9`=NULL,Exp=0,TypeExp='M',vr9=0 WHERE `Etape_Phoning9` is NULL and `Campagne9`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set `Campagne10`=NULL,Exp=0,TypeExp='M',vr10=0 WHERE `Etape_Phoning10` is NULL and `Campagne10`=? ");
                 $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr1=0 WHERE  `Campagne1`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr2=0 WHERE `Campagne2`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr3=0 WHERE `Campagne3`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr4=0 WHERE `Campagne4`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr5=0 WHERE `Campagne5`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr6=0 WHERE `Campagne6`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr7=0 WHERE `Campagne7`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr8=0 WHERE `Campagne8`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr9=0 WHERE `Campagne9`=? ");
                $req->execute(array($auth));
                $req = $bdd->prepare("update `contact_direct` set Exp=0,TypeExp='M',vr10=0 WHERE `Campagne10`=? ");
                $req->execute(array($auth));
            }
            return json_encode(array('validation'=>true));
        }
    function getnbrcmpbyuser()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcampagne`");
            $valeur="";
                $pathis="appels";
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page='.$pathis.'&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Indirect </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagnedir`");
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page='.$pathis.'&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Direct </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            return $valeur;
        }
         function getcmpcomtbyuser()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcmpclt`");
            $valeur="";
            $i=0;
            while($donner=$req->fetch())
            {
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE
                ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and vr1=0)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and vr2=0)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and vr3=0)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and vr4=0)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and vr5=0)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and vr6=0)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and vr7=0)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and vr8=0)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and vr9=0)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and vr10=0)) and Operateur_Saisie='".$_SESSION['user']['id']."'  ");
                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Indirect </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe2[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }

            }

            $req = $bdd->query("SELECT * FROM `listcmpcltdir`");
            while($donner=$req->fetch())
            {
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE
                ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and vr1=0)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and vr2=0)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and vr3=0)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and vr4=0)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and vr5=0)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and vr6=0)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and vr7=0)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and vr8=0)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and vr9=0)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and vr10=0)) and Saisi_par='".$_SESSION['user']['id']."'");

                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Direct </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe2[0].' </td>
                         <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }
            }
            return $valeur;
        }
        function getnbrcmpcomercialbyuser()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcampagne`");
            $valeur="";
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE ((Campagne1='$donner[0]') or (Campagne2='$donner[0]') or (Campagne3='$donner[0]') or (Campagne4='$donner[0]') or (Campagne5='$donner[0]' ) or (Campagne6='$donner[0]' ) or (Campagne7='$donner[0]') or (Campagne8='$donner[0]') or (Campagne9='$donner[0]') or (Campagne10='$donner[0]')) and Operateur_Saisie='".$_SESSION['user']['id']."'  having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL)or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL) or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL )) and Operateur_Saisie='".$_SESSION['user']['id']."'");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Indirect </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagnedir`");
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE ((Campagne1='$donner[0]' ) or (Campagne2='$donner[0]' ) or (Campagne3='$donner[0]' ) or (Campagne4='$donner[0]' ) or (Campagne5='$donner[0]' ) or (Campagne6='$donner[0]' ) or (Campagne7='$donner[0]' ) or (Campagne8='$donner[0]' ) or (Campagne9='$donner[0]' ) or (Campagne10='$donner[0]' )) and Saisi_par='".$_SESSION['user']['id']."' having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL )or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL  )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL  )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL  )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL  )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL  )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL  )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL  )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL  )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL  ))  and Saisi_par='".$_SESSION['user']['id']."'");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Direct </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            return $valeur;
        }
        function getlistecontactbyuser($agents,$anneeuniver,$typecontact,$formation,$marche,$etatphoning,$autorisation_contact)
        {
            $formation = join("', '", $formation);
            $marche = join("', '", $marche);
            $etatphoning = join("', '", $etatphoning);
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            switch($typecontact){
                case "contactindirecte";
                    $quy="";
                    try {
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($etatphoning=="NULL")
                        {
                            $quy.=" and ( Etape_Phoning is NULL )";
                        }
                        elseif($etatphoning=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Etape_Phoning` in ('$etatphoning'))";
                        }
                        if($formation=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                        $id_user=$_SESSION['user']['id'];
                        $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,`Nature_de_Contact`,`Ville_Lycee`,`Ville`,`Lycee`, `Niveau_des_etudes`,`Formation_Demmandee` FROM `contact_indirect` WHERE `Annee_Univ`='$anneeuniver' ".$quy." and transferer=0 and `Operateur_Saisie` = '".$id_user."'");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Lycee'].'</td>
                                                <td>'.$donner['Ville_Lycee'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</td>
                                                <td>'.$donner['Formation_Demmandee'].'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <textarea name="scripte" id="scripte" rows="10" cols="80">
            </textarea>
            <h3>Email de la campagne :</h3>
            <div class="form-group">
                      <label for="ObservationEmail">Objet de Mail : </label>
                      <input type="text" class="form-control" id="ObservationEmail" placeholder="Objet de Mail">
                    </div>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'scripte\' );
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
                case "contactdirecte";
                    try {
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($etatphoning=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($etatphoning=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Etape_Phoning` in ('$etatphoning'))";
                        }
                        if($formation=="NULL")
                        {
                            $quy.=" and (`Etape_Phoning1` is NULL or Etape_Phoning is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                        $id_user=$_SESSION['user']['id'];
                        $auto_contact="";
                            $auto_contact.=" and Saisi_par='".$_SESSION['user']['id']."'";

                        $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,`Nature_de_Contact`,`Ville`,`Etablissement`, `Niveau_des_etudes`,
`diplomes_obtenus`,Formation_Demmandee FROM `contact_direct` WHERE `Annee_Univ`='$anneeuniver' ".$quy." ".$auto_contact." ");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Etablissement'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</th>
                                                <td>'.$donner['Formation_Demmandee'].'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <textarea name="scripte" id="scripte" rows="10" cols="80">
            </textarea>
             <h3>L\'email de campagne :</h3>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'scripte\' );
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
            }
        }
        function getlistcontactindirectbyuser()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );

            $req = $bdd->query("SELECT `id`,`nom`,`prenom` FROM `users`");
            $users=$req->fetchAll();
            $req = $bdd->query("SELECT `Nom`,`Date`,`id`,`Prenom`,`Contact_Suivi_par`,`E-Mail`,`Tel`,`GSM`,`Nature_de_Contact`
,`Date_Dern_Phoning`,`Marche`,`Lycee` FROM contact_indirect where transferer=0  and Operateur_Saisie='".$_SESSION['user']['id']."'  ORDER BY id DESC");
            $valeur="";
            while($donner=$req->fetch())
            {
                $user="";
                foreach($users as $us)
                {

                    if($donner['Contact_Suivi_par']==$us['id'])
                    { $user=$us['nom'].' '.$us['prenom']; }
                }
                $valeur.= '
                    <tr onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" >
                        <td> Contact Indirect </td>
                        <td> '.$donner['Nom'].' </td>
                        <td> '.$donner['Prenom'].' </td>
                        <td> '.$donner['Marche'].' </td>
                        <td> '.$donner['Date'].' </td>
                        <td> '.$donner['Tel'].' </td>
                        <td> '.$donner['GSM'].' </td>
                        <td> '.$donner['E-Mail'].' </td>
                        <td> '.$donner['Lycee'].' </td>
                        <td> '.$donner['Nature_de_Contact'].' </td>
                        <td> '.$user.' </td>
                        <td> '.$donner['Date_Dern_Phoning'].' </td>
                    </tr>';
            }
            return $valeur;
        }
        function getlistcontactdirectbyuser()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $req = $bdd->query("SELECT `Nom`,`id`,`Frais_Dossier`,`test`,`date_test`,`Prenom`,`E-Mail`,`Formation_Demmandee`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche` FROM contact_direct WHERE Saisi_par='".$_SESSION['user']['id']."' ORDER BY id DESC");
            while($donner=$req->fetch())
            {
                $reqe = $bdd->query("SELECT * FROM  `histo_transf` where iddc ='".md5($donner['id'])."' and idinc in (select md5(id) from contact_indirect where transferer=1)");
                if($reqe->rowCount()>0)
                {
                    $transf='<span class="badge bg-green"> Oui </span>';
                }
                else
                {
                    $transf="Non";
                }
                $Frais_Dossier="Non";
                if($donner['Frais_Dossier']==1)
                {
                    $Frais_Dossier="Oui";
                }
                $valeur.= '
                    <tr onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')" >
                        <td> Contact Direct </td>
                        <td> '.$donner['Nom'].' </td>
                        <td> '.$donner['Prenom'].' </td>
                        <td> '.$donner['date_du_contact'].' </td>
                        <td> '.$donner['Marche'].' </td>
                        <td> '.$donner['Tel'].' </td>
						<td> '.$donner['GSM'].' </td>
                        <td> '.$donner['E-Mail'].' </td>
                        <td> '.$donner['Nature_de_Contact'].' </td>
                        <td> '.$donner['test'].' </td>
                        <td> '.$donner['date_test'].' </td>
                        <td> '.$Frais_Dossier.' </td>
                        <td> '.$donner['Formation_Demmandee'].' </td>
                        <td> '.$transf.' </td>
                    </tr>';
            }
            return $valeur;
        }
        function getFunctions($function)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $value="";
            switch ($function){
                
                case "getAction";
                try {
                    $req = $bdd->query("SELECT DISTINCT nom FROM `liste_action`");
                    while($donner=$req->fetch())
                    {
                        $value.='<option>'.$donner[0].'</option>';
                    }
                }

                catch(Exception $e)

                {
                    die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                }
                break;
                case "getLyceeEtablissement";
                try {
                    $req = $bdd->query("SELECT DISTINCT (lyceeetablissement) FROM `lyceeetablissement` ORDER BY lyceeetablissement");
                    while($donner=$req->fetch())
                    {
                        $value.='<option>'.$donner[0].'</option>';
                    }
                }

                catch(Exception $e)

                {
                    die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                }
                break;
                case "getcommercial";
                try {
                    $req = $bdd->query("SELECT `nom`,`prenom` FROM `users` WHERE `profile`='commercial'");
                    while($donner=$req->fetch())
                    {
                        $value.='<option>'.$donner[0].'</option>';
                    }
                }

                catch(Exception $e)

                {
                    die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                }
                break;
                
                /////////////////////////////////////////////
                 case "getcontactsuitea":
                    try {
                        $req = $bdd->query("SELECT DISTINCT contactsuitea from contactsuitea");
                        $value.="<option></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;

                case "gettyperesidence":
                    try {
                        $req = $bdd->query("SELECT DISTINCT typeresidence from typeresidence");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
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
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }
		catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                //////////////////////////////////
                
                case "getProfession";
                    try {
                        $req = $bdd->query("SELECT * FROM `profession` ORDER BY profession");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;
                case "getetetatdossier":
                    try {
                        $req = $bdd->query("SELECT DISTINCT etatdossier from etatdossier");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getFormationDemander";
                
                    try {
                        $req = $bdd->query("SELECT DISTINCT `formation_demande` FROM `param_formations`ORDER BY `formation_demande`");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;
                case "getGroupeFormation";
                    try {
                        $req = $bdd->query("SELECT * FROM `groupeformation` ORDER BY groupeformation ");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;
                case "getVille";
                    try {
                        $req = $bdd->query("SELECT * FROM `ville` ORDER BY ville");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[1].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;
                case "getNiveauEtudes";
                    try {
                        $req = $bdd->query("SELECT * FROM `niveauetudes` ORDER BY niveauetudes ");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;
                case "getSeriebac";
                    try {
                        $req = $bdd->query("SELECT * FROM `seriebac` ORDER BY seriebac");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                break;

                case "getDiplomesObtenus";
                    try {
                        $req = $bdd->query("SELECT * FROM `diplomesobtenus` ORDER BY diplomesobtenus ");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[1].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getRecuPar";
                    try {
                        $req = $bdd->query("SELECT `nom`,`prenom` FROM `users` WHERE `profile`='commercial' ORDER by nom");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].' '.$donner[1].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getNatureContact";
                    try {
                        $req = $bdd->query("SELECT * FROM `naturecontact` ORDER  BY naturecontact");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getPays";
                    try {
                        $req = $bdd->query("SELECT * FROM `pays` ORDER BY nom_fr_fr");
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[5].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                     case "getjustAgent";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='agent' ORDER BY nom");
                        while($donner=$req->fetch())
                        {
                            $value.='<option value="'.$donner[0].'">'.$donner[1].' '.$donner[2].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                     case "getCommercial";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' or profile='saisie' ORDER BY nom");
                        while($donner=$req->fetch())
                        {
                            $value.='<option value="'.$donner[0].'">'.$donner[1].' '.$donner[2].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getAgent";
                    try {
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='agent' ORDER BY nom");
                        while($donner=$req->fetch())
                        {
                            $value.='<option value="'.$donner[0].'">'.$donner[1].' '.$donner[2].'</option>';
                        }
                        $req = $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial' ORDER BY nom");
                        while($donner=$req->fetch())
                        {
                            $value.='<option value="'.$donner[0].'">'.$donner[1].' '.$donner[2].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getlangues":
                    try {
                        $req = $bdd->query("SELECT DISTINCT langue from langue");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getMarche";
                    try {
                        $req = $bdd->query("SELECT * FROM `marche` ORDER BY marche");
                        $value.="<option value='NULL'>Vide</option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[1].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getcontactdirecte";
                    try {
                        $req = $bdd->query("SELECT DISTINCT `Etape_Phoning1` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning2` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning3` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning4` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning5` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning6` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning7` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning8` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning9` FROM `contact_direct`
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning10` FROM `contact_direct`");
                        $value.="<option value='NULL'>Vide</option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getcontactindirecte";
                    try {
                        $req = $bdd->query("SELECT DISTINCT `Etape_Phoning1` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning2` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning3` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning4` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning5` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning6` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning7` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning8` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning9` FROM `contact_indirect` where transferer=0
                                            UNION
                                            SELECT DISTINCT `Etape_Phoning10` FROM `contact_indirect` where transferer=0");
                        $value.="<option value='NULL'>Vide</option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;

                case "getNiveauDemande":
                    try {
                        $req = $bdd->query("SELECT DISTINCT niveaudemande from niveaudemande");
                        $value.="<option></option>";
                        while($donner=$req->fetch())
                        {
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
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
                case "getmarche":
                    try {
                        $req = $bdd->query("SELECT DISTINCT marche from marche");
                        $value.="<option value='vide'></option>";
                        while($donner=$req->fetch())
                        {
                            $value.='<option>'.$donner[0].'</option>';
                        }
                    }

                    catch(Exception $e)

                    {
                        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
                    }
                    break;
            }
            return $value;
        }
        function getlistecontact($agents,$anneeuniver,$typecontact,$formation,$marche,$etatphoning,$autorisation_contact,
        $nature_contact_hors,$Ville_hors,$Lycee_hors,$Ville_Lycee_hors,$Test_hors,$Formation_demande_hors,$nature_contact)
        {
            $formation = join("', '", $formation);
            $marche = join("', '", $marche);
            $etatphoning = join("', '", $etatphoning);
            if(count($nature_contact)>0)
            {
                $nature_contact = join("', '", $nature_contact);
            }
            if(count($nature_contact_hors)>0)
            {
                $nature_contact_hors = join("', '", $nature_contact_hors);
            }
            if(count($Ville_hors)>0)
            {
                $Ville_hors = join("', '", $Ville_hors);
            }
            if(count($Lycee_hors)>0)
            {
                $Lycee_hors = join("', '", $Lycee_hors);
            }
            if(count($Ville_Lycee_hors)>0)
            {
                $nature_contact = join("', '", $Ville_Lycee_hors);
            }
            if(count($Test_hors)>0)
            {
                $Test_hors = join("', '", $Test_hors);
            }
            if(count($Formation_demande_hors)>0)
            {
                $Formation_demande_hors = join("', '", $Formation_demande_hors);
            }
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            switch($typecontact){
                case "contactindirecte";
                    $quy="";
                    try {
                        if($nature_contact!="")
                        {
                            $quy.=" and `Nature_de_Contact` in ('$nature_contact')";
                        }
                        if($nature_contact_hors!="")
                        {
                            $quy.=" and `Nature_de_Contact` not in ('$nature_contact_hors')";
                        }
                        if($Ville_hors!="")
                        {
                            $quy.=" and `Ville` not in ('$Ville_hors')";
                        }
                        if($Lycee_hors!="")
                        {
                            $quy.=" and `Lycee` not in ('$Lycee_hors')";
                        }
                        if($Ville_Lycee_hors!="")
                        {
                            $quy.=" and `Ville_Lycee` not in ('$Ville_Lycee_hors')";
                        }
                        if($Formation_demande_hors!="")
                        {
                            $quy.=" and `Formation_Demmandee` not in ('$Formation_demande_hors')";
                        }
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($etatphoning=="NULL")
                        {
                            $quy.=" and `Etape_Phoning` is null and (`Etape_Phoning1` is NULL and Etape_Phoning2 is NULL and Etape_Phoning3 is NULL and Etape_Phoning4 is NULL and Etape_Phoning5 is NULL and Etape_Phoning6 is NULL  and Etape_Phoning7 is NULL and Etape_Phoning8 is NULL and Etape_Phoning9 is NULL and Etape_Phoning10 is NULL )";
                        }
                        elseif($etatphoning=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Etape_Phoning` in ('$etatphoning'))";
                        }
                        if($formation=="NULL")
                        {
                            $quy.=" and `Etape_Phoning` is null and (`Etape_Phoning1` is NULL and Etape_Phoning2 is NULL and Etape_Phoning3 is NULL and Etape_Phoning4 is NULL and Etape_Phoning5 is NULL and Etape_Phoning6 is NULL  and Etape_Phoning7 is NULL and Etape_Phoning8 is NULL and Etape_Phoning9 is NULL and Etape_Phoning10 is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                       $id_user=$_SESSION['user']['id'];
                        $auto_contact="";
                        if( $autorisation_contact == 0 )
                        {
                        	$auto_contact.=" and `Contact_Suivi_par` = '$id_user'";
                        }
                        $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,`Nature_de_Contact`,`Ville_Lycee`,`Ville`,`Lycee`, `Niveau_des_etudes`,`Formation_Demmandee` FROM `contact_indirect` WHERE 1=1  ".$quy." and transferer=0 ".$auto_contact."");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Lycee'].'</td>
                                                <td>'.$donner['Ville_Lycee'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</td>
                                                <td>'.$donner['Formation_Demmandee'].'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Ville Lycée</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <textarea name="scripte" id="scripte" rows="10" cols="80">
            </textarea>
            <h3>Email de la campagne :</h3>
            <div class="form-group">
                      <label for="ObservationEmail">Objet de Mail : </label>
                      <input type="text" class="form-control" id="ObservationEmail" placeholder="Objet de Mail">
                    </div>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'scripte\' );
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                break;
                case "contactdirecte";
                    try {
                         if($nature_contact_hors!="")
                        {
                            $quy.=" and `Nature_de_Contact` not in ('$nature_contact_hors')";
                        }
                        if($Ville_hors!="")
                        {
                            $quy.=" and `Ville` not in ('$Ville_hors')";
                        }
                        if($Lycee_hors!="")
                        {
                            $quy.=" and `Etablissement` not in ('$Lycee_hors')";
                        }
                        if($Test_hors!="")
                        {
                            $quy.=" and `test` not in ('$Test_hors')";
                        }
                        if($Formation_demande_hors!="")
                        {
                            $quy.=" and `Formation_Demmandee` not in ('$Formation_demande_hors')";
                        }
                        if($marche=="NULL")
                        {
                            $quy.=" and `Marche` is NULL";
                        }
                        elseif($marche=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and `Marche` in ('$marche')";
                        }
                        if($etatphoning=="NULL")
                        {
                               $quy.=" and `Etape_Phoning` is null and (`Etape_Phoning1` is NULL and Etape_Phoning2 is NULL and Etape_Phoning3 is NULL and Etape_Phoning4 is NULL and Etape_Phoning5 is NULL and Etape_Phoning6 is NULL  and Etape_Phoning7 is NULL and Etape_Phoning8 is NULL and Etape_Phoning9 is NULL and Etape_Phoning10 is NULL )";
                        }
                        elseif($etatphoning=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Etape_Phoning` in ('$etatphoning'))";
                        }
                        if($formation=="NULL")
                        {
                               $quy.=" and `Etape_Phoning` is null and (`Etape_Phoning1` is NULL and Etape_Phoning2 is NULL and Etape_Phoning3 is NULL and Etape_Phoning4 is NULL and Etape_Phoning5 is NULL and Etape_Phoning6 is NULL  and Etape_Phoning7 is NULL and Etape_Phoning8 is NULL and Etape_Phoning9 is NULL and Etape_Phoning10 is NULL )";
                        }
                        elseif($formation=="all")
                        {
                            $quy.="";
                        }
                        else
                        {
                            $quy.=" and (`Formation_Demmandee` in ('$formation'))";
                        }
                        $id_user=$_SESSION['user']['id'];
                        $auto_contact="";
                        if( $autorisation_contact == 0 )
                        {
                        	$auto_contact.=" and `Contact_Suivi_par` = '$id_user'";
                        }
                        $req = $bdd->query("SELECT `id`,`Nom`,`Prenom`,`Tel`,`E-Mail`,test,`Nature_de_Contact`,`Ville`,`Etablissement`, `Niveau_des_etudes`,`Test_Passe`,`Resultat`,`AbsTest`,Inscrit,depot_dossier,
`diplomes_obtenus`,Formation_Demmandee FROM `contact_direct` WHERE 1=1 ".$quy." ".$auto_contact." ");
                        $i=0;
                        $result=' <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                                <th>Test</th>
                                                <th>Test Passe</th>
                                                <th>Resultat</th>
                                                <th>Dépôt dossier</th>
                                                <th>Inscrit</th>
                                                <th>AbsTest</th>
                                            </tr>
                                            </thead>
                                            <tbody>';
                        while ($donner=$req->fetch()) {
                            $i++;
                            if($donner['Test_Passe']==1){$Test_Passe='Oui';}elseif($donner['Test_Passe']==""){$Test_Passe='Vide';}else{$Test_Passe='Non';}
                            if($donner['depot_dossier']==1){$depot_dossier='Oui';}elseif($donner['depot_dossier']==""){$depot_dossier='Vide';}else{$depot_dossier='Non';}
                            if($donner['Inscrit']==1){$Inscrit='Oui';}elseif($donner['Inscrit']==""){$Inscrit='Vide';}else{$Inscrit='Non';}
                            if($donner['Resultat']==""){$Resultat='Vide';}else{$Resultat=$donner['Resultat'];}
                            if($donner['AbsTest']==1){$AbsTest='Oui';}elseif($donner['AbsTest']==""){$AbsTest='Vide';}else{$AbsTest='Non';}
                            $result.= '<tr>
                                                <td><input type="checkbox" id="LCT'.$i.'"></td>
                                                 <input type="hidden" id="hidden'.$i.'" value="'.md5($donner['id']).'"/>
                                                <td>'.$donner['Nom'].'</td>
                                                <td>'.$donner['Prenom'].'</td>
                                                <td>'.$donner['Tel'].'</td>
                                                <td>'.$donner['E-Mail'].'</td>
                                                <td>'.$donner['Nature_de_Contact'].'</td>
                                                <td>'.$donner['Ville'].'</td>
                                                <td>'.$donner['Etablissement'].'</td>
                                                <td>'.$donner['Niveau_des_etudes'].'</th>
                                                <td>'.$donner['Formation_Demmandee'].'</th>
                                                <td>'.$donner['test'].'</th>
                                                <td>'.$Test_Passe.'</th>
                                                <td>'.$Resultat.'</th>
                                                <td>'.$depot_dossier.'</th>
                                                <td>'.$Inscrit.'</th>
                                                <td>'.$AbsTest.'</th>
                                </tr>';
                        }
                        $result.='</tbody>
                                            <tfoot>
                                            <tr>
                                                <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                                <th>Nom</th>
                                                <th>Prenom</th>
                                                <th>Tél</th>
                                                <th>Email</th>
                                                <th>Nature de contact</th>
                                                <th>Ville</th>
                                                <th>Lycée / Etablissement</th>
                                                <th>Niveau des etudes</th>
                                                <th>Formation Demmandee</th>
                                                <th>Test</th>
                                                <th>Test Passe</th>
                                                <th>Resultat</th>
                                                <th>Dépôt dossier</th>
                                                <th>Inscrit</th>
                                                <th>AbsTest</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <br>
                                    <textarea name="scripte" id="scripte" rows="10" cols="80">
            </textarea>
            <label for="ObservationEmail">Objet de Mail : </label>
                      <input type="text" class="form-control" id="ObservationEmail" placeholder="Objet de Mail">
             <h3>L\'email de campagne :</h3>
            <textarea name="email_cmp" id="email_cmp" rows="10" cols="80">
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( \'scripte\' );
                CKEDITOR.replace( \'email_cmp\' );
            </script>
                                    <div class="box-footer">
                    <button type="submit" id="btn_create" style="width: 20%;" class="btn btn-primary pull-right">Créer la campagne</button>
                  </div>
                  ';
                        return json_encode(array('validation'=>true, 'result'=>$result,'nbrline'=>$i));
                    } catch (Exception $e) {
                        die('<span class="alert alert-error"> Erreur : ' . $e->getMessage() . ' Merci de contacter le support </span>');
                    }
                    break;
            }
        }
        function getnbrcmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcampagne` where `Campagne1` not like '%caravane%' ");
            $valeur="";
            if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
                $pathis="appels";
            }
            elseif($_SESSION['user']['profile']==sha1(md5('agent'.$salt)) ){
                $pathis="campagne";
            }
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page='.$pathis.'&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Indirect </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagnedir` where `Campagne1` not like '%caravane%' ");
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page='.$pathis.'&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Direct </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagne` where `Campagne1` like '%caravane%' ");
            if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
                $pathis="appels";
            }
            elseif($_SESSION['user']['profile']==sha1(md5('agent'.$salt)) ){
                $pathis="campagne";
            }
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=campagne_caravane&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Indirect </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagnedir` where `Campagne1` like '%caravane%' ");
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE (Campagne1='$donner[0]' and TA1='".$_SESSION['user']['id']."') or (Campagne2='$donner[0]' and TA2='".$_SESSION['user']['id']."') or (Campagne3='$donner[0]' and TA3='".$_SESSION['user']['id']."') or (Campagne4='$donner[0]' and TA4='".$_SESSION['user']['id']."') or (Campagne5='$donner[0]' and TA5='".$_SESSION['user']['id']."') or (Campagne6='$donner[0]' and TA6='".$_SESSION['user']['id']."') or (Campagne7='$donner[0]' and TA7='".$_SESSION['user']['id']."') or (Campagne8='$donner[0]' and TA8='".$_SESSION['user']['id']."') or (Campagne9='$donner[0]' and TA9='".$_SESSION['user']['id']."') or (Campagne10='$donner[0]' and TA10='".$_SESSION['user']['id']."') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and TA1='".$_SESSION['user']['id']."')or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and TA2='".$_SESSION['user']['id']."' )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and TA3='".$_SESSION['user']['id']."' )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and TA4='".$_SESSION['user']['id']."' )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and TA5='".$_SESSION['user']['id']."' )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and TA6='".$_SESSION['user']['id']."' )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and TA7='".$_SESSION['user']['id']."' )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and TA8='".$_SESSION['user']['id']."' )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and TA9='".$_SESSION['user']['id']."' )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and TA10='".$_SESSION['user']['id']."' )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                if($reqe1[0]>0)
                {
                    $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=campagne_caravane&campagne='.$donner[0].'\'">
                        <td>'.$donner[0].'</td>
                        <td> Contact Direct </td>
                        <td>
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td> '.$reqe2[0].' / '.$reqe1[0].' </td>
                    </tr>';
                }

            }
            return $valeur;
        }
      function getcampagne($campagne)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            try
            {
                $etphoning="<option></option>";
                $etapephoning = $bdd->query("SELECT * FROM `etapephoning`");
                while($test=$etapephoning->fetch())
                {
                    $etphoning.="
                                    <option>".$test[1]."</option>
                                ";
                }
                $req = $bdd->query("SELECT * FROM `listcampagne` where `Campagne1`='$campagne'");
                $req1 = $bdd->query("SELECT * FROM `listcampagnedir` where `Campagne1`='$campagne'");
                $req_formation=$bdd->query("SELECT * FROM `formation_demander`");
                if($req->rowCount()>0)
                {
                    $reqe1 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`,`Ville_Lycee`, `Formation` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observations`,`Formation_Demmandee`,`s1tc`,`s2tc`,
 `annuelletc`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,
        (select script from cmp_detail where nom_cmp='$campagne' ) AS script,
        (select object from cmp_detail where nom_cmp='$campagne' ) AS object_send,
       (select email from cmp_detail where nom_cmp='$campagne' ) AS email_send
  FROM `contact_indirect` WHERE (Campagne1='$campagne' and TA1='".$_SESSION['user']['id']."' and Etape_Phoning1 is null) or (Campagne2='$campagne' and TA2='".$_SESSION['user']['id']."'  and Etape_Phoning2 is null) or (Campagne3='$campagne' and TA3='".$_SESSION['user']['id']."'  and Etape_Phoning3 is null) or (Campagne4='$campagne' and TA4='".$_SESSION['user']['id']."'  and Etape_Phoning4 is null) or (Campagne5='$campagne' and TA5='".$_SESSION['user']['id']."' and Etape_Phoning5 is null) or (Campagne6='$campagne' and TA6='".$_SESSION['user']['id']."' and Etape_Phoning6 is null) or (Campagne7='$campagne' and TA7='".$_SESSION['user']['id']."' and Etape_Phoning7 is null) or (Campagne8='$campagne' and TA8='".$_SESSION['user']['id']."' and Etape_Phoning8 is null) or (Campagne9='$campagne' and TA9='".$_SESSION['user']['id']."' and Etape_Phoning9 is null) or (Campagne10='$campagne' and TA10='".$_SESSION['user']['id']."' and Etape_Phoning10 is null) having count(id)>0 order by id limit 0,1");
                    while($dn=$reqe1->fetch())
                    {
                        $fr="<select class='form-control col-md-6' id='formation_demandee'><option></option>";
                        while($donf=$req_formation->fetch())
                        {
                            if($dn['Formation_Demmandee']==$donf['formation'])
                            {
                                $fr=$fr."<option selected>".$dn['Formation_Demmandee']."</option>";
                            }
                            else
                            {
                                $fr=$fr."<option>".$donf['formation']."</option>";
                            }
                        }
                        $fr=$fr."</select>";
                        if($dn['Etape_Phoning']==null)
                        {
                            $Etape_Phoning="";
                        }
                        else
                        {
                            $Etape_Phoning=$dn['Etape_Phoning'];
                        }
                        if($dn['Etape_Phoning1']==null)
                        {
                            $Etape_Phoning1="";
                        }
                        else
                        {
                            $Etape_Phoning1=$dn['Etape_Phoning1'];
                        }
                        if($dn['Etape_Phoning2']==null)
                        {
                            $Etape_Phoning2="";
                        }
                        else
                        {
                            $Etape_Phoning2=$dn['Etape_Phoning2'];
                        }
                        if($dn['Etape_Phoning3']==null)
                        {
                            $Etape_Phoning3="";
                        }
                        else
                        {
                            $Etape_Phoning3=$dn['Etape_Phoning3'];
                        }
                        if($dn['Etape_Phoning4']==null)
                        {
                            $Etape_Phoning4="";
                        }
                        else
                        {
                            $Etape_Phoning4=$dn['Etape_Phoning4'];
                        }
                        if($dn['Etape_Phoning5']==null)
                        {
                            $Etape_Phoning5="";
                        }
                        else
                        {
                            $Etape_Phoning5=$dn['Etape_Phoning5'];
                        }
                        if($dn['Etape_Phoning6']==null)
                        {
                            $Etape_Phoning6="";
                        }
                        else
                        {
                            $Etape_Phoning6=$dn['Etape_Phoning6'];
                        }
                        if($dn['Etape_Phoning7']==null)
                        {
                            $Etape_Phoning7="";
                        }
                        else
                        {
                            $Etape_Phoning7=$dn['Etape_Phoning7'];
                        }
                        if($dn['Etape_Phoning8']==null)
                        {
                            $Etape_Phoning8="";
                        }
                        else
                        {
                            $Etape_Phoning8=$dn['Etape_Phoning8'];
                        }
                        if($dn['Etape_Phoning9']==null)
                        {
                            $Etape_Phoning9="";
                        }
                        else
                        {
                            $Etape_Phoning9=$dn['Etape_Phoning9'];
                        }
                        if($dn['Etape_Phoning10']==null)
                        {
                            $Etape_Phoning10="";
                        }
                        else
                        {
                            $Etape_Phoning10=$dn['Etape_Phoning10'];
                        }
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>$dn['Ville_Lycee'],
                            'Formation'=>$dn['Formation'],
                            'Formation_Demmandee'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'etphoning'=>$etphoning,
                            'Campage'=>$campagne,
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observations']),
                            'Etape_Phoning'=>$Etape_Phoning,
                            'Etape_Phoning1'=>$Etape_Phoning1,
                            'Etape_Phoning2'=>$Etape_Phoning2,
                            'Etape_Phoning3'=>$Etape_Phoning3,
                            'Etape_Phoning4'=>$Etape_Phoning4,
                            'Etape_Phoning5'=>$Etape_Phoning5,
                            'Etape_Phoning6'=>$Etape_Phoning6,
                            'Etape_Phoning7'=>$Etape_Phoning7,
                            'Etape_Phoning8'=>$Etape_Phoning8,
                            'Etape_Phoning9'=>$Etape_Phoning9,
                            'Etape_Phoning10'=>$Etape_Phoning10
                        );
                    }
                    return json_encode(array('validation'=>true,"data"=>$infocontact));
                }
                elseif($req1->rowCount()>0)
                {
                    $reqe1 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`GSM`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,
 `Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`s1tc`,`s2tc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s1bac2`,`s2bac2`,`annuellebac2`,`notenational`,`notegenerale`,
 `annuelletc`,
   (select script from cmp_detail where nom_cmp='$campagne' ) AS script,
        (select object from cmp_detail where nom_cmp='$campagne' ) AS object_send,
       (select email from cmp_detail where nom_cmp='$campagne' ) AS email_send
 FROM `contact_direct`
  WHERE (Campagne1='$campagne' and TA1='".$_SESSION['user']['id']."' and Etape_Phoning1 is null) or (Campagne2='$campagne' and TA2='".$_SESSION['user']['id']."'  and Etape_Phoning2 is null) or (Campagne3='$campagne' and TA3='".$_SESSION['user']['id']."'  and Etape_Phoning3 is null) or (Campagne4='$campagne' and TA4='".$_SESSION['user']['id']."'  and Etape_Phoning4 is null) or (Campagne5='$campagne' and TA5='".$_SESSION['user']['id']."' and Etape_Phoning5 is null) or (Campagne6='$campagne' and TA6='".$_SESSION['user']['id']."' and Etape_Phoning6 is null) or (Campagne7='$campagne' and TA7='".$_SESSION['user']['id']."' and Etape_Phoning7 is null) or (Campagne8='$campagne' and TA8='".$_SESSION['user']['id']."' and Etape_Phoning8 is null) or (Campagne9='$campagne' and TA9='".$_SESSION['user']['id']."' and Etape_Phoning9 is null) or (Campagne10='$campagne' and TA10='".$_SESSION['user']['id']."' and Etape_Phoning10 is null) having count(id)>0 order by id limit 0,1");
                    while($dn=$reqe1->fetch())
                    {
                        $fr="<select class='form-control col-md-6' id='formation_demandee'><option></option>";
                        while($donf=$req_formation->fetch())
                        {
                            if($dn['Formation_Demmandee']==$donf['formation'])
                            {
                                $fr=$fr."<option selected>".$dn['Formation_Demmandee']."</option>";
                            }
                            else
                            {
                                $fr=$fr."<option>".$donf['formation']."</option>";
                            }
                        }
                        $fr=$fr."</select>";
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation'=>$fr,
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'script'=>$dn['script'],
                            'GSM'=>$dn['GSM'],
                            'email_send'=>$dn['email_send'],
                            'object_send'=>$dn['object_send'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
                            'Campage'=>$campagne,
                            'etphoning'=>$etphoning,
                            's1tc'=>$dn['s1tc'],
                            's2tc'=>$dn['s2tc'],
                            'annuelletc'=>$dn['annuelletc'],
                            's1bac1'=>$dn['s1bac1'],
                            's2bac1'=>$dn['s2bac1'],
                            'annuellebac1'=>$dn['annuellebac1'],
                            'noteregional'=>$dn['noteregional'],
                            's1bac2'=>$dn['s1bac2'],
                            's2bac2'=>$dn['s2bac2'],
                            'annuellebac2'=>$dn['annuellebac2'],
                            'notenational'=>$dn['notenational'],
                            'notegenerale'=>$dn['notegenerale'],
                            'id'=>md5($dn['id']),
                            'Observations'=>explode("#",$dn['Observation']),
                            'Etape_Phoning'=>$dn['Etape_Phoning'],
                            'Etape_Phoning1'=>$dn['Etape_Phoning1'],
                            'Etape_Phoning2'=>$dn['Etape_Phoning2'],
                            'Etape_Phoning3'=>$dn['Etape_Phoning3'],
                            'Etape_Phoning4'=>$dn['Etape_Phoning4'],
                            'Etape_Phoning5'=>$dn['Etape_Phoning5'],
                            'Etape_Phoning6'=>$dn['Etape_Phoning6'],
                            'Etape_Phoning7'=>$dn['Etape_Phoning7'],
                            'Etape_Phoning8'=>$dn['Etape_Phoning8'],
                            'Etape_Phoning9'=>$dn['Etape_Phoning9'],
                            'Etape_Phoning10'=>$dn['Etape_Phoning10']
                        );
                    }
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
                return json_encode(array('validation'=>true,"data"=>$infocontact));
            }
            catch(Exception $e)
            {
                die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
            }
            return json_encode(array('validation'=>true,"data"=>$infocontact));
        }
        
       
        function add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,$type_contact,$campagne)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($type_contact=="CDI")
            {
                $reqind = $bdd->query("SELECT * FROM `contact_indirect` where md5(id)='$idid'");
            }
            else
            {
                $reqind = $bdd->query("SELECT * FROM `contact_direct` where md5(id)='$idid'");
            }
            $data=$reqind->fetch();
            $reqind = $bdd->prepare("INSERT INTO `rdv_from_call_center`( `user`, `campagne`, `contact`, `type_contact`, `rdv`, `status`, `date_saisie`) VALUES (?,?,?,?,?,?,now())");
            $param=array($_SESSION['user']['id'],$campagne,$data[0],$type_contact,$etat_rdv,$status_rdv);
            if($reqind->execute($param)) {
                    return true;
                }
            else
            {
                return false;
            }
        }
        function add_to_tranfer($idid)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->query("SELECT id,Formation_Demmandee FROM `contact_indirect`  where md5(`id`)='$idid'");
            $reqind=$reqind->fetch();
            $id_cdi=$reqind[0];
            $foramtion = $reqind[1];
            
             try
            {
                $req = $bdd->prepare("INSERT INTO `contact_direct` (`Civilite`, `Nom`, `Prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`,
                 `Adresse`, `E-Mail`, `GSM`, `Tel`, `Formation_Demmandee`, `date_du_contact` , `contact_suite_a`, `Annee_Univ`,
                  `Zone`, `Ville`, `Marche`, `StatutContact`, `CP`, `Niveau_des_etudes`, `diplomes_obtenus`, `Etablissement`,
                   `Annee_Obtention`, `serie_bac` , `professionpere`, `professionmere`, `Saisi_par`, `Reçu_par`, `Observation`,
                    `Lycee_Public`, `Lycee_Prive`, `Lycee_Mission`, `Mail_Pere`, `Mail_Mere`, `Tel_Pere`, `Tel_Mere`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s2bac2`,`s1bac2`,`annuellebac2`,`notenational`,`notegenerale`)
                        SELECT `Civilite`, `Nom`, `Prenom`, `Date_de_Naissance`, `Lieu_de_Naissance`, `Adresse`, `E-Mail`, `GSM`, `Tel`, `Formation_Demmandee`, `Date`, `Nature_de_Contact`, `Annee_Univ`, `Zone`, `Ville`, `Marche`, `StatutContact`, `CP`, `Niveau_des_etudes`, `Diplome_Obtenu`, `Etablissement`, `Annee_Obtention`, `Branche` ,`Profession_Pere`, `Profession_Mere`, `Operateur_Saisie`, `Reçu_par`, `Observations`, `Lycee_Public`, `Lycee_Prive`, `Lycee_Mission`, `Mail_Pere`, `Mail_Mere`, `Tel_Pere`, `Tel_Mere`,`s1tc`,`s2tc`,`annuelletc`,`s1bac1`,`s2bac1`,`annuellebac1`,`noteregional`,`s2bac2`,`s1bac2`,`annuellebac2`,`notenational`,`notegenerale` FROM `contact_indirect`
                        WHERE md5(id)=?");
                    $req->execute(array($idid));
                    $temp = $bdd->lastInsertId();
                    $req = $bdd->prepare("update contact_indirect set transferer=1  WHERE md5(id)=?");
                    $req->execute(array($idid));
                    $req_req = $bdd->query("update contact_direct cd inner join param_formations pf on pf.formation_demande=cd.Formation_Demmandee set cd.niveau_demande=pf.niveau where pf.niveau like  '%1%' and cd.niveau_demande is null ");
                    $req = $bdd->prepare("INSERT INTO `transfer_CDI_CD_Qualifié`(`id_contact`, `new_id_contact`, `id_user`, `type`) VALUES (?,?,?,'CD')");
                    $req->execute(array($id_cdi,$temp,$_SESSION['user']['id']));
                    $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Contact_Suivi_par`=103,date_affectation=NOW() where `id`=?"); 
                    $param = array($new_id);
                    $reqaddobserv->execute($param);
                    $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Contact_Suivi_par`=103,date_affectation=NOW() where `id`=?"); 
                    $param = array($new_id);
                    $reqaddobserv->execute($param);
                    return $temp;
            }
            catch(Exception $e)
            {
                die(json_encode(array('validation'=>false, 'message'=>'<span class="callout callout-danger"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
            }
            
        }
      
        
        function getcmpcomtglobale()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcmpclt`");
            $valeur="";
            $i=0;
            while($donner=$req->fetch())
            {
                $reqe3= $bdd->query("SELECT * FROM `cmp_by_agent` where `Campagne1`='$donner[0]'");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE
                ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL))");
                                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn3=$reqe3->fetch())
                    {
                        $k++;
                        if($k==$reqe3->rowCount())
                        {
                            $agent.=$dn3[2]." ".$dn3[3];
                        }
                        else
                        {
                            $agent.=$dn3[2]." ".$dn3[3]." / ";
                        }

                    }
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"> Contact Indirect </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">'.$agent.'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe2[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }

            }

            $req = $bdd->query("SELECT * FROM `listcmpcltdir`");
            while($donner=$req->fetch())
            {
                $reqe3= $bdd->query("SELECT * FROM `cmp_by_agent` where `Campagne1`='$donner[0]'");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE
                (Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and vr1=0)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and vr2=0)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and vr3=0)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and vr4=0)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and vr5=0)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and vr6=0)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and vr7=0)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and vr8=0)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and vr9=0)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and vr10=0)");

                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn3=$reqe3->fetch())
                    {
                        $k++;
                        if($k==$reqe3->rowCount())
                        {
                            $agent.=$dn3[2]." ".$dn3[3];
                        }
                        else
                        {
                            $agent.=$dn3[2]." ".$dn3[3]." / ";
                        }

                    }
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"> Contact Direct </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">'.$agent.'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt_global&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe2[0].' </td>
                         <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }
            }
            return $valeur;
        }
        
        
        
        
        
        
       function updatecampagne($campagne,$observation,$ntel,$nemail,$etapephoning,$idid,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$formation_demandee,$status_rdv,$etat_rdv)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqind = $bdd->query("SELECT * FROM `listcampagne` where Campagne1='$campagne'");
            $reqd = $bdd->query("SELECT * FROM `listcampagnedir` where Campagne1='$campagne'");
            if($reqind->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    if($status_rdv=="Qualifié")
                    {
                        $new_id=$this->add_to_tranfer($idid);
                        //'".$new_id."' 
                        if($observation=='')
                        {$observation = " ";}
                        $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) where `id`='".$new_id."'");
                        $param = array($observation);
                        $reqaddobserv->execute($param);
                        $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,md5($new_id),"CD",$campagne);
                        $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Contact_Suivi_par`=103,date_affectation=NOW() where `id`=?"); 
                        $param = array($new_id);
                        $reqaddobserv->execute($param);
                    }
                    else
                    {
                        $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CDI",$campagne);
                    }
                }
                
                if($var_test)
                {
                    $getphn = $bdd->query("select `Observations`,`Etape_Phoning`,`Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_indirect
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    $datephoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                        $datephoning="`Date_Phoning1`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                        $datephoning="`Date_Phoning2`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                        $datephoning="`Date_Phoning3`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                        $datephoning="`Date_Phoning4`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                        $datephoning="`Date_Phoning5`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                        $datephoning="`Date_Phoning6`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                        $datephoning="`Date_Phoning7`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                        $datephoning="`Date_Phoning8`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                        $datephoning="`Date_Phoning9`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                        $datephoning="`Date_Phoning10`=NOW()";
                    }
                    $Etape_Phoning="";
                    if($getphn['Etape_Phoning']=="")
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strpos(strtoupper(trim($getphn['Etape_Phoning'])), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strpos(strtoupper(trim($etapephoning)), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`Formation_Demmandee`=?,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,".$phoning." ,".$datephoning.",Date_Dern_Phoning=CURDATE() ,Etape_Phoning=? where MD5(`id`)=? ");
                    $param = array($observation,$formation_demandee,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$Etape_Phoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            elseif($reqd->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CD",$campagne);
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Etape_Phoning`,`Observation`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_direct
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
    
                        $datephoning="`Date_Phoning1`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                        $datephoning="`Date_Phoning2`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
    
                        $datephoning="`Date_Phoning3`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                        $datephoning="`Date_Phoning4`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                        $datephoning="`Date_Phoning5`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                        $datephoning="`Date_Phoning6`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                        $datephoning="`Date_Phoning7`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                        $datephoning="`Date_Phoning8`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                        $datephoning="`Date_Phoning9`=NOW()";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                        $datephoning="`Date_Phoning10`=NOW()";
                    }
                    $Etape_Phoning="";
                    if($getphn['Etape_Phoning']=="")
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strpos(strtoupper(trim($getphn['Etape_Phoning'])), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strpos(strtoupper(trim($etapephoning)), strtoupper(trim("refus"))) === false)
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Envoi Dossier")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else if(strtoupper(trim($getphn['Etape_Phoning']))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$getphn['Etape_Phoning'];
                    }
                    else if(strtoupper(trim($etapephoning))== strtoupper(trim("Rappel")))
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    else
                    {
                        $Etape_Phoning=$etapephoning;
                    }
                    $obser=$observation;
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,".$datephoning.",`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE(),Etape_Phoning=? where MD5(`id`)=? ");
                    $param = array($obser,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$Etape_Phoning,$idid);
                    if($reqindss->execute($param)) {
                        include_once('content/controller/class.contact-direct.php');
                        $contact_directe = new ContactDirect();
                        $contact_directe->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            $reqind = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$campagne'");
            $reqd = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$campagne'");
            if($reqind->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    if($status_rdv=="Qualifié")
                    {
                        
                        $new_id=$this->add_to_tranfer($idid);
                        $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Observation`=concat(Observation,'#','(',NOW(),') ',?) where `id`='".$new_id."'");
                        $param = array($observation);
                        $reqaddobserv->execute($param);
                        $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,md5($new_id),"CD",$campagne);
                        $reqaddobserv = $bdd->prepare("UPDATE `contact_direct` SET `Contact_Suivi_par`=103,date_affectation=NOW() where `id`=?"); 
                        $param = array($new_id);
                        $reqaddobserv->execute($param);
                    }
                    else
                    {
                        $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CDI",$campagne);
                    }
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Observations`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_indirect
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                    }
                    $obser=$getphn['Observations'];
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?,`Ntel`=?,`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                    $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-indirecte.php');
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            elseif($reqd->rowCount()>0)
            {
                if($etapephoning=="NA")
                {
                    $var_test=true;
                }
                else
                {
                    $var_test=$this->add_rdv_from_call_center($status_rdv,$etat_rdv,$idid,"CD",$campagne);
                }
                if($var_test)
                {
                    $getphn = $bdd->query("select `Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_direct
                    where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne') and MD5(id)='$idid'");
                    $getphn=$getphn->fetch();
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`Etape_Phoning1`=?";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`Etape_Phoning2`=?";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`Etape_Phoning3`=?";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`Etape_Phoning4`=?";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`Etape_Phoning5`=?";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`Etape_Phoning6`=?";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`Etape_Phoning7`=?";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`Etape_Phoning8`=?";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`Etape_Phoning9`=?";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`Etape_Phoning10`=?";
                    }
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET `Observations`=concat(Observations,'#','(',NOW(),') ',?) ,`s1tc`=?,`s2tc`=?,`annuelletc`=?,`s1bac1`=?,`s2bac1`=?,`annuellebac1`=?,`noteregional`=?,`s1bac2`=?,`s2bac2`=?,`annuellebac2`=?,`notenational`=?,`notegenerale`=?`Ntel`=?,`Nemail`=?,".$phoning." ,Date_Dern_Phoning=CURDATE() where MD5(`id`)=? ");
                    $param = array($observation,$s1tc,$s2tc,$annuelletc,$s1bac1,$s2bac1,$annuellebac1,$noteregional,$s1bac2,$s2bac2,$annuellebac2,$notenational,$notegenerale,$ntel,$nemail,$etapephoning,$idid);
                    if($reqindss->execute($param)) {
                        include('content/controller/class.contact-direct.php');
                        $contact_directe = new ContactDirect();
                        $contact_directe->changeetat($idid);
                        return json_encode(array('validation'=>true, 'message'=>$campagne));
                    }
                }
                else
                {
                    return json_encode(array('validation'=>false, 'message'=>$campagne));
                }
            }
            $valeur="";
        }
        
        
        
        
        
        
        
        
        function getcmpcomt()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcmpclt`");
            $valeur="";
            $i=0;
            while($donner=$req->fetch())
            {
                $reqe3= $bdd->query("SELECT * FROM `cmp_by_agent` where `Campagne1`='$donner[0]'");
                $reqe2 = $bdd->query("SELECT count(id),sum(case when Contact_Suivi_par='".$_SESSION['user']['id']."' then 1 else 0 end) totoal_agent FROM `contact_indirect` WHERE
                ((Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL)) HAVING totoal_agent>0");
                                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn3=$reqe3->fetch())
                    {
                        $k++;
                        if($k==$reqe3->rowCount())
                        {
                            $agent.=$dn3[2]." ".$dn3[3];
                        }
                        else
                        {
                            $agent.=$dn3[2]." ".$dn3[3]." / ";
                        }

                    }
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Indirect </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$agent.'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[1].' / '.$reqe2[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }

            }

            $req = $bdd->query("SELECT * FROM `listcmpcltdir`");
            while($donner=$req->fetch())
            {
                $reqe3= $bdd->query("SELECT * FROM `cmp_by_agent` where `Campagne1`='$donner[0]'");
                $reqe2 = $bdd->query("SELECT count(id),sum(case when Contact_Suivi_par='".$_SESSION['user']['id']."' then 1 else 0 end) totoal_agent FROM `contact_direct` WHERE
                (Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL and vr1=0)
                or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL and vr2=0)
                or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL and vr3=0)
                or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL and vr4=0)
                or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL and vr5=0)
                or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL and vr6=0)
                or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL and vr7=0)
                or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL and vr8=0)
                or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL and vr9=0)
                or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL and vr10=0) HAVING totoal_agent>0");

                $reqe2=$reqe2->fetch();
                if($reqe2[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn3=$reqe3->fetch())
                    {
                        $k++;
                        if($k==$reqe3->rowCount())
                        {
                            $agent.=$dn3[2]." ".$dn3[3];
                        }
                        else
                        {
                            $agent.=$dn3[2]." ".$dn3[3]." / ";
                        }

                    }
                    $i++;
                    $valeur.= '
                    <tr id="tr'.$i.'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Direct </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$agent.'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  100%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> 100%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[1].' / '.$reqe2[0].' </td>
                         <td><button class="btn btn-block btn-success btn-sm" onclick="Verrouiller('.$i.',\''.$donner[0].'\')">Verrouiller</button> </td>
                    </tr>';
                }
            }
            return $valeur;
        }
        function GetCmpComtDetailglobal($compagne)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($_SESSION['user']['otr_cmp']==0)
            {
            $req = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$compagne'");
            $valeur="";
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL && vr10=0 THEN Etape_Phoning10

        ELSE 1
    END) AS Etape_Phoning FROM contact_indirect");
                while($donner=$reqe2->fetch())
                {
                    if($donner['Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Indirect </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observations'] . ' </td>
                    </tr>';
                    }
                }
                return $valeur;
            }

            $req = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN Etape_Phoning10
        ELSE 1
    END) AS Etape_Phoning FROM contact_direct");

                while($donner=$reqe2->fetch())
                {
                    if($donner['Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Indirect </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                    </tr>';
                    }
                }
                return $valeur;
            }
            $req = $bdd->query("SELECT * FROM `listcampagne` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,
(
 CASE
      WHEN Campagne1 ='$compagne'  THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne'  THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne'  THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' THEN Etape_Phoning10

        ELSE 1
    END) AS Etape_Phoning FROM contact_indirect");
                while($donner=$reqe2->fetch())
                {
                    if($donner['Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else
                    {
                        $valeur.= '
                    <tr>
                        <td>'.$compagne.'</td>
                        <td> Contact Indirect </td>
                        <td> '.$donner['Nom'].' </td>
                        <td> '.$donner['Prenom'].' </td>
                        <td> '.$donner['Marche'].' </td>
                        <td> '.$donner['Tel'].' </td>
                        <td> '.$donner['E-Mail'].' </td>
                        <td> '.$donner['Ntel'].' </td>
                        <td> '.$donner['Nemail'].' </td>
                        <td> '.$donner['Etape_Phoning'].' </td>
                        <td> '.$donner['Date_Dern_Phoning'].' </td>
                        <td> '.$donner['Observations'].' </td>
                    </tr>';
                    }

                }
                return $valeur;
            }

            $req = $bdd->query("SELECT * FROM `listcampagnedir` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {

                $reqe2 = $bdd->query("SELECT `Nom`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,
(
 CASE
      WHEN Campagne1 ='$compagne' THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' THEN Etape_Phoning10
        ELSE 1
    END) AS Etape_Phoning FROM contact_direct");
                while($donner=$reqe2->fetch())
                {
                    if($donner['Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Indirect </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                    </tr>';
                    }
                }
                return $valeur;
            }
            }
			else
			{
				$req = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$compagne'");
            $valeur="";
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL  THEN qualification1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL  THEN qualification2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL  THEN qualification3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL  THEN qualification4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN qualification5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL  THEN qualification6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL  THEN qualification7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN qualification8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL  THEN qualification9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL  THEN qualification10
        ELSE 0
    END) AS qualification
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL  THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL  THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN Etape_Phoning10

        ELSE 1
    END) AS Current_Etape_Phoning FROM contact_indirect");
    $i=0;
                while($donner=$reqe2->fetch())
                {
                    if($donner['Current_Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                    $i++;
                        $select="";
                        if($donner['Etape_Phoning1']!="")
                        {
                            if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning2']!="")
                        {
                            if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning3']!="")
                        {
                            if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning4']!="")
                        {
                            if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning5']!="")
                        {
                            if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning6']!="")
                        {
                            if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning7']!="")
                        {
                            if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning8']!="")
                        {
                            if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning9']!="")
                        {
                            if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning10']!="")
                        {
                            if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }

                        }
if($donner['qualification']==0)
{
$color="primary";
}
else
{
$color="success";
}
if($donner['qualification']==0)
{
$qualification="Non";
}
else
{
$qualification="Oui";
}
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Indirect </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Current_Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observations'] . ' </td>
                         <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-'.$color.' btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CDI\',\''. $compagne . '\');return false;">Valider la sélection</button></td>
                         <td> ' .$qualification . ' </td>
                         <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                         
                     </tr>';
                    }
                }
                return $valeur;
            }
            $req = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN qualification1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN qualification2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN qualification3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN qualification4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN qualification5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN qualification6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN qualification7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN qualification8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN qualification9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN qualification10
        ELSE 0
    END) AS qualification
,

(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL  THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN Etape_Phoning10
        ELSE 1
    END) AS Current_Etape_Phoning FROM contact_direct");

                while($donner=$reqe2->fetch())
                {
                    if($donner['Current_Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                        $select="";
                        if($donner['Etape_Phoning1']!="")
                        {
                            if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning2']!="")
                        {
                            if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning3']!="")
                        {
                            if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning4']!="")
                        {
                            if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning5']!="")
                        {
                            if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning6']!="")
                        {
                            if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning7']!="")
                        {
                            if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning8']!="")
                        {
                            if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning9']!="")
                        {
                            if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning10']!="")
                        {
                            if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }

                        }
if($donner['qualification']==0)
{
$color="primary";
}
else
{
$color="success";
}
if($donner['qualification']==0)
{
$qualification="Non";
}
else
{
$qualification="Oui";
}
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Direct </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Current_Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                        <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-'.$color.' btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CD\',\''.$compagne .'\');return false;">Valider la sélection</button></td>
                         <td> ' . $qualification . ' </td>
                         <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                    }
                }
                return $valeur;
            }
            $req = $bdd->query("SELECT * FROM `listcampagne` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {
                $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,
(
 CASE
      WHEN Campagne1 ='$compagne'  THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne'  THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne'  THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' THEN Etape_Phoning10

        ELSE 1
    END) AS Etape_Phoning FROM contact_indirect");
                while($donner=$reqe2->fetch())
                {
                    if($donner['Current_Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else
                    {
                        $select="";
                        if($donner['Etape_Phoning1']!="")
                        {
                            if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning2']!="")
                        {
                            if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning3']!="")
                        {
                            if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning4']!="")
                        {
                            if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning5']!="")
                        {
                            if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning6']!="")
                        {
                            if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning7']!="")
                        {
                            if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning8']!="")
                        {
                            if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning9']!="")
                        {
                            if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning10']!="")
                        {
                            if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }

                        }
                        $valeur.= '
                    <tr>
                        <td>'.$compagne.'</td>
                        <td> Contact Indirect </td>
                        <td> '.$donner['Nom'].' </td>
                        <td> '.$donner['Prenom'].' </td>
                        <td> '.$donner['Marche'].' </td>
                        <td> '.$donner['Tel'].' </td>
                        <td> '.$donner['E-Mail'].' </td>
                        <td> '.$donner['Ntel'].' </td>
                        <td> '.$donner['Nemail'].' </td>
                        <td> '.$donner['Etape_Phoning'].' </td>
                        <td> '.$donner['Date_Dern_Phoning'].' </td>
                        <td> '.$donner['Observations'].' </td>
                        <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CDI\');return false;">Valider la sélection</button></td>
                        <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                    }

                }
                return $valeur;
            }

            $req = $bdd->query("SELECT * FROM `listcampagnedir` where Campagne1='$compagne'");
            if($req->rowCount()>0)
            {

                $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,
(
 CASE
      WHEN Campagne1 ='$compagne' THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne'  THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne'  THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne'  THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne'  THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne'  THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne'  THEN Etape_Phoning10
        ELSE 1
    END) AS Etape_Phoning FROM contact_direct");
                while($donner=$reqe2->fetch())
                {
                    if($donner['Current_Etape_Phoning']=="1")
                    {
                        continue;
                    }
                    else {
                        $select="";
                        if($donner['Etape_Phoning1']!="")
                        {
                            if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning2']!="")
                        {
                            if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning3']!="")
                        {
                            if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning4']!="")
                        {
                            if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning5']!="")
                        {
                            if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning6']!="")
                        {
                            if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning7']!="")
                        {
                            if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning8']!="")
                        {
                            if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning9']!="")
                        {
                            if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                            }

                        }
                        if($donner['Etape_Phoning10']!="")
                        {
                            if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }
                            else
                            {
                                $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                            }

                        }
                        $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Direct </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                        <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CD\');return false;">Valider la sélection</button></td>
                        <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                    }
                }
                return $valeur;
            }
			}
            return $valeur;
            
        }
        function GetCmpComtDetail($compagne)
        {
            ini_set('memory_limit', '-1');
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );

                $req = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$compagne'");
                $valeur="";
                if($req->rowCount()>0)
                {
                    $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL  THEN qualification1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL  THEN qualification2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL  THEN qualification3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL  THEN qualification4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN qualification5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL  THEN qualification6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL  THEN qualification7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN qualification8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL  THEN qualification9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL  THEN qualification10
        ELSE 0
    END) AS qualification
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL  THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL  THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN Etape_Phoning10

        ELSE 1
    END) AS Current_Etape_Phoning FROM contact_indirect where  Contact_Suivi_par='".$_SESSION['user']['id']."'");
                    $i=0;
                    while($donner=$reqe2->fetch())
                    {
                        if($donner['Current_Etape_Phoning']=="1")
                        {
                            continue;
                        }
                        else {
                            $i++;
                            $select="";
                            if($donner['Etape_Phoning1']!="")
                            {
                                if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning2']!="")
                            {
                                if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning3']!="")
                            {
                                if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning4']!="")
                            {
                                if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning5']!="")
                            {
                                if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning6']!="")
                            {
                                if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning7']!="")
                            {
                                if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning8']!="")
                            {
                                if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning9']!="")
                            {
                                if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning10']!="")
                            {
                                if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }

                            }
                            if($donner['qualification']==0)
                            {
                                $color="primary";
                            }
                            else
                            {
                                $color="success";
                            }
                            if($donner['qualification']==0)
                            {
                                $qualification="Non";
                            }
                            else
                            {
                                $qualification="Oui";
                            }
                            $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Indirect </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Current_Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observations'] . ' </td>
                         <td> <select  style="width: 300px !important;" class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-'.$color.' btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CDI\',\''. $compagne . '\');return false;">Valider la sélection</button></td>
                         <td> ' .$qualification . ' </td>
                         <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>

                     </tr>';
                        }
                    }
                    return $valeur;
                }
                $req = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$compagne'");
                if($req->rowCount()>0)
                {
                    $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`
,
(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN qualification1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN qualification2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN qualification3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN qualification4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN qualification5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN qualification6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN qualification7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN qualification8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL THEN qualification9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN qualification10
        ELSE 0
    END) AS qualification
,

(
 CASE
      WHEN Campagne1 ='$compagne' && `Etape_Phoning1` is not NULL THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' && `Etape_Phoning2` is not NULL THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' && `Etape_Phoning3` is not NULL THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' && `Etape_Phoning4` is not NULL THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne' && `Etape_Phoning5` is not NULL THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne' && `Etape_Phoning6` is not NULL THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' && `Etape_Phoning7` is not NULL THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' && `Etape_Phoning8` is not NULL THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' && `Etape_Phoning9` is not NULL  THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' && `Etape_Phoning10` is not NULL THEN Etape_Phoning10
        ELSE 1
    END) AS Current_Etape_Phoning FROM contact_direct where  Contact_Suivi_par='".$_SESSION['user']['id']."'");

                    while($donner=$reqe2->fetch())
                    {
                        if($donner['Current_Etape_Phoning']=="1")
                        {
                            continue;
                        }
                        else {
                            $select="";
                            if($donner['Etape_Phoning1']!="")
                            {
                                if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning2']!="")
                            {
                                if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning3']!="")
                            {
                                if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning4']!="")
                            {
                                if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning5']!="")
                            {
                                if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning6']!="")
                            {
                                if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning7']!="")
                            {
                                if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning8']!="")
                            {
                                if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning9']!="")
                            {
                                if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning10']!="")
                            {
                                if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }

                            }
                            if($donner['qualification']==0)
                            {
                                $color="primary";
                            }
                            else
                            {
                                $color="success";
                            }
                            if($donner['qualification']==0)
                            {
                                $qualification="Non";
                            }
                            else
                            {
                                $qualification="Oui";
                            }
                            $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Direct </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Current_Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                        <td> <select  style="width: 300px !important;"  class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-'.$color.' btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CD\',\''.$compagne .'\');return false;">Valider la sélection</button></td>
                         <td> ' . $qualification . ' </td>
                         <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                        }
                    }
                    return $valeur;
                }
                $req = $bdd->query("SELECT * FROM `listcampagne` where Campagne1='$compagne'");
                if($req->rowCount()>0)
                {
                    $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observations`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,
(
 CASE
      WHEN Campagne1 ='$compagne'  THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne' THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne' THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne'  THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne'  THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne' THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne' THEN Etape_Phoning10

        ELSE 1
    END) AS Etape_Phoning FROM contact_indirect where  Contact_Suivi_par='".$_SESSION['user']['id']."'");
                    while($donner=$reqe2->fetch())
                    {
                        if($donner['Current_Etape_Phoning']=="1")
                        {
                            continue;
                        }
                        else
                        {
                            $select="";
                            if($donner['Etape_Phoning1']!="")
                            {
                                if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning2']!="")
                            {
                                if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning3']!="")
                            {
                                if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning4']!="")
                            {
                                if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning5']!="")
                            {
                                if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning6']!="")
                            {
                                if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning7']!="")
                            {
                                if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning8']!="")
                            {
                                if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning9']!="")
                            {
                                if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning10']!="")
                            {
                                if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }

                            }
                            $valeur.= '
                    <tr>
                        <td>'.$compagne.'</td>
                        <td> Contact Indirect </td>
                        <td> '.$donner['Nom'].' </td>
                        <td> '.$donner['Prenom'].' </td>
                        <td> '.$donner['Marche'].' </td>
                        <td> '.$donner['Tel'].' </td>
                        <td> '.$donner['E-Mail'].' </td>
                        <td> '.$donner['Ntel'].' </td>
                        <td> '.$donner['Nemail'].' </td>
                        <td> '.$donner['Etape_Phoning'].' </td>
                        <td> '.$donner['Date_Dern_Phoning'].' </td>
                        <td> '.$donner['Observations'].' </td>
                        <td> <select style="width: 300px !important;" class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CDI\');return false;">Valider la sélection</button></td>
                        <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                        }

                    }
                    return $valeur;
                }

                $req = $bdd->query("SELECT * FROM `listcampagnedir` where Campagne1='$compagne'");
                if($req->rowCount()>0)
                {

                    $reqe2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Tel`,`Ntel`,`Nemail`
,`Date_Dern_Phoning`, `Observation`,`Marche`,`Etape_Phoning` ,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,
(
 CASE
      WHEN Campagne1 ='$compagne' THEN Etape_Phoning1
      WHEN Campagne2 ='$compagne' THEN Etape_Phoning2
      WHEN Campagne3 ='$compagne'  THEN Etape_Phoning3
      WHEN Campagne4 ='$compagne'  THEN Etape_Phoning4
      WHEN Campagne5 ='$compagne'  THEN Etape_Phoning5
      WHEN Campagne6 ='$compagne'  THEN Etape_Phoning6
      WHEN Campagne7 ='$compagne' THEN Etape_Phoning7
      WHEN Campagne8 ='$compagne' THEN Etape_Phoning8
      WHEN Campagne9 ='$compagne'  THEN Etape_Phoning9
      WHEN Campagne10 ='$compagne'  THEN Etape_Phoning10
        ELSE 1
    END) AS Etape_Phoning FROM contact_direct where  Contact_Suivi_par='".$_SESSION['user']['id']."'");
                    while($donner=$reqe2->fetch())
                    {
                        if($donner['Current_Etape_Phoning']=="1")
                        {
                            continue;
                        }
                        else {
                            $select="";
                            if($donner['Etape_Phoning1']!="")
                            {
                                if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning2']!="")
                            {
                                if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning3']!="")
                            {
                                if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning4']!="")
                            {
                                if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning5']!="")
                            {
                                if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning6']!="")
                            {
                                if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning7']!="")
                            {
                                if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning8']!="")
                            {
                                if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning9']!="")
                            {
                                if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                                }

                            }
                            if($donner['Etape_Phoning10']!="")
                            {
                                if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }
                                else
                                {
                                    $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                                }

                            }
                            $valeur .= '
                    <tr>
                        <td>' . $compagne . '</td>
                        <td> Contact Direct </td>
                        <td> ' . $donner['Nom'] . ' </td>
                        <td> ' . $donner['Prenom'] . ' </td>
                        <td> ' . $donner['Marche'] . ' </td>
                        <td> ' . $donner['Tel'] . ' </td>
                        <td> ' . $donner['E-Mail'] . ' </td>
                        <td> ' . $donner['Ntel'] . ' </td>
                        <td> ' . $donner['Nemail'] . ' </td>
                        <td> ' . $donner['Etape_Phoning'] . ' </td>
                        <td> ' . $donner['Date_Dern_Phoning'] . ' </td>
                        <td> ' . $donner['Observation'] . ' </td>
                        <td> <select style="width: 300px !important;" class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\',\'CD\');return false;">Valider la sélection</button></td>
                        <td> ' . $donner['Etape_Phoning1'] . ' </td>
                         <td> ' . $donner['Etape_Phoning2'] . ' </td>
                         <td> ' . $donner['Etape_Phoning3'] . ' </td>
                         <td> ' . $donner['Etape_Phoning4'] . ' </td>
                         <td> ' . $donner['Etape_Phoning5'] . ' </td>
                         <td> ' . $donner['Etape_Phoning6'] . ' </td>
                         <td> ' . $donner['Etape_Phoning7'] . ' </td>
                         <td> ' . $donner['Etape_Phoning8'] . ' </td>
                         <td> ' . $donner['Etape_Phoning9'] . ' </td>
                         <td> ' . $donner['Etape_Phoning10'] . ' </td>
                    </tr>';
                        }
                    }
                    return $valeur;
                }
            return $valeur;
        }
        function Verrouillercmp($campagne)
        {
            $update=false;
            include('content/controller/class.contact-indirecte.php');
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcmpclt` where Campagne1='$campagne'");
            $valeur="";
            if($req->rowCount()>0)
            {
                $req123 = $bdd->query("select `id`,`Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_indirect
 where Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne'");
                while($getphn=$req123->fetch())
                {
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`vr1`=1";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`vr2`=1";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`vr3`=1";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`vr4`=1";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`vr5`=1";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`vr6`=1";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`vr7`=1";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`vr8`=1";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`vr9`=1";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`vr10`=1";
                    }
                    $reqindss = $bdd->prepare("UPDATE `contact_indirect` SET ".$phoning." where `id`=? ");
                    $param = array($getphn['id']);
                    if($reqindss->execute($param)) {
                       $update=true;
                        $contact_indirecte = new contact_indirecte();
                        $contact_indirecte->changeetat(md5($getphn['id']));
                    }
                }
            }
            $req = $bdd->query("SELECT * FROM `listcmpcltdir` where Campagne1='$campagne'");
            if($req->rowCount()>0)
            {
                $req123 = $bdd->query("select `id`,`Campagne1`,`Campagne2`,`Campagne3`,`Campagne4`,`Campagne5`,`Campagne6`,`Campagne7`,`Campagne8`,`Campagne9`,`Campagne10` from contact_direct
 where (Campagne1='$campagne' or Campagne2='$campagne' or Campagne3='$campagne' or Campagne4='$campagne' or Campagne5='$campagne' or Campagne6='$campagne' or Campagne7='$campagne' or Campagne8='$campagne' or Campagne9='$campagne' or Campagne10='$campagne')");
                while($getphn=$req123->fetch())
                {
                    $phoning="";
                    if($campagne==$getphn['Campagne1'])
                    {
                        $phoning="`vr1`=1";
                    }
                    elseif($campagne==$getphn['Campagne2'])
                    {
                        $phoning="`vr2`=1";
                    }
                    elseif($campagne==$getphn['Campagne3'])
                    {
                        $phoning="`vr3`=1";
                    }
                    elseif($campagne==$getphn['Campagne4'])
                    {
                        $phoning="`vr4`=1";
                    }
                    elseif($campagne==$getphn['Campagne5'])
                    {
                        $phoning="`vr5`=1";
                    }
                    elseif($campagne==$getphn['Campagne6'])
                    {
                        $phoning="`vr6`=1";
                    }
                    elseif($campagne==$getphn['Campagne7'])
                    {
                        $phoning="`vr7`=1";
                    }
                    elseif($campagne==$getphn['Campagne8'])
                    {
                        $phoning="`vr8`=1";
                    }
                    elseif($campagne==$getphn['Campagne9'])
                    {
                        $phoning="`vr9`=1";
                    }
                    elseif($campagne==$getphn['Campagne10'])
                    {
                        $phoning="`vr10`=1";
                    }
                    $reqindss = $bdd->prepare("UPDATE `contact_direct` SET ".$phoning." where `id`=? ");
                    $param = array($getphn['id']);

                    if($reqindss->execute($param)) {
                        $update=true;
                        include_once('content/controller/class.contact-direct.php');
                        $contact_directe = new ContactDirect();
                        $contact_directe->changeetat(md5($getphn['id']));
                    }
                }
            }
            if($update) {
                return json_encode(array('validation'=>$update, 'message'=>$campagne));
            }
        }
        function syncdatabase()
        {
            require_once "biblio/Classes/PHPExcel.php";
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req=$bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM contact_indirect WHERE
            (vr1=1 and exp1=0) or
            (vr2=1 and exp2=0) or
            (vr3=1 and exp3=0) or
            (vr4=1 and exp4=0) or
            (vr5=1 and exp5=0) or
            (vr6=1 and exp6=0) or
            (vr7=1 and exp7=0) or
            (vr8=1 and exp8=0) or
            (vr9=1 and exp9=0) or
            (vr10=1 and exp10=0)
");
            $sheet = new PHPExcel();
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1', 'id');
            $activesheet->setCellValue('B1', 'Civilite');
            $activesheet->setCellValue('C1', 'Nom');
            $activesheet->setCellValue('D1', 'Prenom');
            $activesheet->setCellValue('E1', 'Tel');
            $activesheet->setCellValue('F1', 'E-Mail');
            $activesheet->setCellValue('G1', 'Profession_Mere');
            $activesheet->setCellValue('H1', 'Profession_Pere');
            $activesheet->setCellValue('I1', 'Mail_Mere');
            $activesheet->setCellValue('J1', 'Mail_Pere');
            $activesheet->setCellValue('K1', 'Tel_Mere');
            $activesheet->setCellValue('L1', 'Tel_Pere');
            $activesheet->setCellValue('M1', 'Annee_Etude');
            $activesheet->setCellValue('N1', 'Annee_Univ');
            $activesheet->setCellValue('O1', 'Formation_Demmandee');
            $activesheet->setCellValue('P1', 'Ville');
            $activesheet->setCellValue('Q1', 'Date');
            $activesheet->setCellValue('R1', 'Groupe_Formation');
            $activesheet->setCellValue('S1', 'Ecole');
            $activesheet->setCellValue('T1', 'Etape_Phoning2');
            $activesheet->setCellValue('U1', 'Date_de_Naissance');
            $activesheet->setCellValue('V1', 'Nature_de_Contact');///
            $activesheet->setCellValue('W1', 'GSM');///
            $activesheet->setCellValue('X1', 'Etape_Phoning');///
            $activesheet->setCellValue('Y1', 'Etape_Phoning3');///
            $activesheet->setCellValue('Z1', 'Marche');///
            $activesheet->setCellValue('AA1','Zone');///
            $activesheet->setCellValue('AB1','Ville_Lycee');///
            $activesheet->setCellValue('AC1','Etape_Phoning1');///
            $activesheet->setCellValue('AD1','Niveau_des_etudes');///
            $activesheet->setCellValue('AE1','Etablissement');///
            $activesheet->setCellValue('AF1','Lieu_de_Naissance');///
            $activesheet->setCellValue('AG1','Branche');///
            $activesheet->setCellValue('AH1','Observations');///
            $activesheet->setCellValue('AI1','Lycee_Public');///
            $activesheet->setCellValue('AJ1','Observation_Chef_de_produit');///
            $activesheet->setCellValue('AK1','Date_Dern_Phoning');///
            $activesheet->setCellValue('AL1','Etape_Phoning8');///
            $activesheet->setCellValue('AM1','TA8');///
            $activesheet->setCellValue('AN1','Date_Phoning9');///
            $activesheet->setCellValue('AO1','Diplome_Obtenu');///
            $activesheet->setCellValue('AP1','Date_Saisie');///
            $activesheet->setCellValue('AQ1','Lycee_Prive');///
            $activesheet->setCellValue('AR1','Date_Phoning1');///
            $activesheet->setCellValue('AS1','Dern_Campagne');///
            $activesheet->setCellValue('AT1','Etape_Phoning9');///
            $activesheet->setCellValue('AU1','TA9');///
            $activesheet->setCellValue('AV1','Date_Phoning10');///
            $activesheet->setCellValue('AW1','Annee_Obtention');///
            $activesheet->setCellValue('AX1','Heure_Saisie');///
            $activesheet->setCellValue('AY1','Lycee_Mission');///
            $activesheet->setCellValue('AZ1','Date_Phoning2');///
            $activesheet->setCellValue('BA1','TA');///
            $activesheet->setCellValue('BB1','Etape_Phoning10');///
            $activesheet->setCellValue('BC1','TA10');///
            $activesheet->setCellValue('BD1','TA1');///
            $activesheet->setCellValue('BE1','Experience_professionelle');///
            $activesheet->setCellValue('BF1','Formation');///
            $activesheet->setCellValue('BG1','StatutContact');///
            $activesheet->setCellValue('BH1','Date_Phoning3');///
            $activesheet->setCellValue('BI1','E-mail-Phoning');///
            $activesheet->setCellValue('BJ1','Date_Phoning6');///
            $activesheet->setCellValue('BK1','Campagne1');///
            $activesheet->setCellValue('BL1','TA2');///
            $activesheet->setCellValue('BM1','Reçu_par');///
            $activesheet->setCellValue('BN1','Transfert_CD');///
            $activesheet->setCellValue('BO1','Date_Phoning4');///
            $activesheet->setCellValue('BP1','A_ne_pas_filtrer');///
            $activesheet->setCellValue('BQ1','Date_Phoning7');///
            $activesheet->setCellValue('BR1','Campagne2');///
            $activesheet->setCellValue('BS1','TA3');///
            $activesheet->setCellValue('BT1','Operateur_Saisie');///
            $activesheet->setCellValue('BU1','Abandon');///
            $activesheet->setCellValue('BV1','Date_Phoning5');///
            $activesheet->setCellValue('BW1','Etape_Phoning6');///
            $activesheet->setCellValue('BX1','Date_Phoning8');///
            $activesheet->setCellValue('BY1','Campagne3');///
            $activesheet->setCellValue('BZ1','TA4');///
            $activesheet->setCellValue('CA1','Categorie');///
            $activesheet->setCellValue('CB1','Source_Contact');///
            $activesheet->setCellValue('CC1','Campagne7');///
            $activesheet->setCellValue('CD1','Etape_Phoning7');///
            $activesheet->setCellValue('CE1','TA6');///
            $activesheet->setCellValue('CF1','Campagne4');///
            $activesheet->setCellValue('CG1','Etape_Phoning5');///
            $activesheet->setCellValue('CH1','Interesse_Par');///
            $activesheet->setCellValue('CI1','Campagne8');///
            $activesheet->setCellValue('CJ1','Etape_Phoning4');///
            $activesheet->setCellValue('CK1','Campagne9');///
            $activesheet->setCellValue('CL1','Campagne5');///
            $activesheet->setCellValue('CM1','Adresse');///
            $activesheet->setCellValue('CN1','CP');///
            $activesheet->setCellValue('CO1','Campagne10');///
            $activesheet->setCellValue('CP1','Campagne6');///
            $activesheet->setCellValue('CQ1','TA7');///
            $activesheet->setCellValue('CR1','TA5');///
            $activesheet->setCellValue('CS1','Lycee');///
            $activesheet->setCellValue('CT1','script1');///
            $activesheet->setCellValue('CU1','script2');///
            $activesheet->setCellValue('CV1','script3');///
            $activesheet->setCellValue('CW1','script4');///
            $activesheet->setCellValue('CX1','script5');///
            $activesheet->setCellValue('CY1','script6');///
            $activesheet->setCellValue('CZ1','script7');///
            $activesheet->setCellValue('DA1','script8');///
            $activesheet->setCellValue('DB1','script9');///
            $activesheet->setCellValue('DC1','script10');///
            $activesheet->setCellValue('DD1','Ntel');///
            $activesheet->setCellValue('DE1','Nemail');///
            $activesheet->setCellValue('DF1','vr1');///
            $activesheet->setCellValue('DG1','vr2');///
            $activesheet->setCellValue('DH1','vr3');///
            $activesheet->setCellValue('DI1','vr4');///
            $activesheet->setCellValue('DJ1','vr5');///
            $activesheet->setCellValue('DK1','vr6');///
            $activesheet->setCellValue('DL1','vr7');///
            $activesheet->setCellValue('DM1','vr8');///
            $activesheet->setCellValue('DN1','vr9');///
            $activesheet->setCellValue('DO1','vr10');///

            $pos=1;
            while($data=$req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A'. $pos, $data['id']);
                $activesheet->setCellValue('B'. $pos, $data['Civilite']);
                $activesheet->setCellValue('C'. $pos, $data['Nom']);
                $activesheet->setCellValue('D'. $pos, $data['Prenom']);
                $activesheet->setCellValue('E'. $pos, $data['Tel']);
                $activesheet->setCellValue('F'. $pos, $data['E-Mail']);
                $activesheet->setCellValue('G'. $pos, $data['Profession_Mere']);
                $activesheet->setCellValue('H'. $pos, $data['Profession_Pere']);
                $activesheet->setCellValue('I'. $pos, $data['Mail_Mere']);
                $activesheet->setCellValue('J'. $pos, $data['Mail_Pere']);
                $activesheet->setCellValue('K'. $pos, $data['Tel_Mere']);
                $activesheet->setCellValue('L'. $pos, $data['Tel_Pere']);
                $activesheet->setCellValue('M'. $pos, $data['Annee_Etude']);
                $activesheet->setCellValue('N'. $pos, $data['Annee_Univ']);
                $activesheet->setCellValue('O'. $pos, $data['Formation_Demmandee']);
                $activesheet->setCellValue('P'. $pos, $data['Ville']);
                $activesheet->setCellValue('Q'. $pos, $data['Date']);
                $activesheet->setCellValue('R'. $pos, $data['Groupe_Formation']);
                $activesheet->setCellValue('S'. $pos, $data['Ecole']);
                $activesheet->setCellValue('T'. $pos, $data['Etape_Phoning2']);
                $activesheet->setCellValue('U'. $pos, $data['Date_de_Naissance']);
                $activesheet->setCellValue('V'. $pos, $data['Nature_de_Contact']);///
                $activesheet->setCellValue('W'. $pos, $data['GSM']);///
                $activesheet->setCellValue('X'. $pos, $data['Etape_Phoning']);///
                $activesheet->setCellValue('Y'. $pos, $data['Etape_Phoning3']);///
                $activesheet->setCellValue('Z'. $pos, $data['Marche']);///
                $activesheet->setCellValue('AA'. $pos, $data['Zone']);///
                $activesheet->setCellValue('AB'. $pos, $data['Ville_Lycee']);///
                $activesheet->setCellValue('AC'. $pos, $data['Etape_Phoning1']);///
                $activesheet->setCellValue('AD'. $pos, $data['Niveau_des_etudes']);///
                $activesheet->setCellValue('AE'. $pos, $data['Etablissement']);///
                $activesheet->setCellValue('AF'. $pos, $data['Lieu_de_Naissance']);///
                $activesheet->setCellValue('AG'. $pos, $data['Branche']);///
                $activesheet->setCellValue('AH'. $pos, $data['Observations']);///
                $activesheet->setCellValue('AI'. $pos, $data['Lycee_Public']);///
                $activesheet->setCellValue('AJ'. $pos, $data['Observation_Chef_de_produit']);///
                $activesheet->setCellValue('AK'. $pos, $data['Date_Dern_Phoning']);///
                $activesheet->setCellValue('AL'. $pos, $data['Etape_Phoning8']);///
                $activesheet->setCellValue('AM'. $pos, $data['TA8']);///
                $activesheet->setCellValue('AN'. $pos, $data['Date_Phoning9']);///
                $activesheet->setCellValue('AO'. $pos, $data['Diplome_Obtenu']);///
                $activesheet->setCellValue('AP'. $pos, $data['Date_Saisie']);///
                $activesheet->setCellValue('AQ'. $pos, $data['Lycee_Prive']);///
                $activesheet->setCellValue('AR'. $pos, $data['Date_Phoning1']);///
                $activesheet->setCellValue('AS'. $pos, $data['Dern_Campagne']);///
                $activesheet->setCellValue('AT'. $pos, $data['Etape_Phoning9']);///
                $activesheet->setCellValue('AU'. $pos, $data['TA9']);///
                $activesheet->setCellValue('AV'. $pos, $data['Date_Phoning10']);///
                $activesheet->setCellValue('AW'. $pos, $data['Annee_Obtention']);///
                $activesheet->setCellValue('AX'. $pos, $data['Heure_Saisie']);///
                $activesheet->setCellValue('AY'. $pos, $data['Lycee_Mission']);///
                $activesheet->setCellValue('AZ'. $pos, $data['Date_Phoning2']);///
                $activesheet->setCellValue('BA'. $pos, $data['TA']);///
                $activesheet->setCellValue('BB'. $pos, $data['Etape_Phoning10']);///
                $activesheet->setCellValue('BC'. $pos, $data['TA10']);///
                $activesheet->setCellValue('BD'. $pos, $data['TA1']);///
                $activesheet->setCellValue('BE'. $pos, $data['Experience_professionelle']);///
                $activesheet->setCellValue('BF'. $pos, $data['Formation']);///
                $activesheet->setCellValue('BG'. $pos, $data['StatutContact']);///
                $activesheet->setCellValue('BH'. $pos, $data['Date_Phoning3']);///
                $activesheet->setCellValue('BI'. $pos, $data['E-mail-Phoning']);///
                $activesheet->setCellValue('BJ'. $pos, $data['Date_Phoning6']);///
                $activesheet->setCellValue('BK'. $pos, $data['Campagne1']);///
                $activesheet->setCellValue('BL'. $pos, $data['TA2']);///
                $activesheet->setCellValue('BM'. $pos, $data['Reçu_par']);///
                $activesheet->setCellValue('BN'. $pos, $data['Transfert_CD']);///
                $activesheet->setCellValue('BO'. $pos, $data['Date_Phoning4']);///
                $activesheet->setCellValue('BP'. $pos, $data['A_ne_pas_filtrer']);///
                $activesheet->setCellValue('BQ'. $pos, $data['Date_Phoning7']);///
                $activesheet->setCellValue('BR'. $pos, $data['Campagne2']);///
                $activesheet->setCellValue('BS'. $pos, $data['TA3']);///
                $activesheet->setCellValue('BT'. $pos, $data['Operateur_Saisie']);///
                $activesheet->setCellValue('BU'. $pos, $data['Abandon']);///
                $activesheet->setCellValue('BV'. $pos, $data['Date_Phoning5']);///
                $activesheet->setCellValue('BW'. $pos, $data['Etape_Phoning6']);///
                $activesheet->setCellValue('BX'. $pos, $data['Date_Phoning8']);///
                $activesheet->setCellValue('BY'. $pos, $data['Campagne3']);///
                $activesheet->setCellValue('BZ'. $pos, $data['TA4']);///
                $activesheet->setCellValue('CA'. $pos, $data['Categorie']);///
                $activesheet->setCellValue('CB'. $pos, $data['Source_Contact']);///
                $activesheet->setCellValue('CC'. $pos, $data['Campagne7']);///
                $activesheet->setCellValue('CD'. $pos, $data['Etape_Phoning7']);///
                $activesheet->setCellValue('CE'. $pos, $data['TA6']);///
                $activesheet->setCellValue('CF'. $pos, $data['Campagne4']);///
                $activesheet->setCellValue('CG'. $pos, $data['Etape_Phoning5']);///
                $activesheet->setCellValue('CH'. $pos, $data['Interesse_Par']);///
                $activesheet->setCellValue('CI'. $pos, $data['Campagne8']);///
                $activesheet->setCellValue('CJ'. $pos, $data['Etape_Phoning4']);///
                $activesheet->setCellValue('CK'. $pos, $data['Campagne9']);///
                $activesheet->setCellValue('CL'. $pos, $data['Campagne5']);///
                $activesheet->setCellValue('CM'. $pos, $data['Adresse']);///
                $activesheet->setCellValue('CN'. $pos, $data['CP']);///
                $activesheet->setCellValue('CO'. $pos, $data['Campagne10']);///
                $activesheet->setCellValue('CP'. $pos, $data['Campagne6']);///
                $activesheet->setCellValue('CQ'. $pos, $data['TA7']);///
                $activesheet->setCellValue('CR'. $pos, $data['TA5']);///
                $activesheet->setCellValue('CS'. $pos, $data['Lycee']);///
                $activesheet->setCellValue('CT'. $pos, $data['script1']);///
                $activesheet->setCellValue('CU'. $pos, $data['script2']);///
                $activesheet->setCellValue('CV'. $pos, $data['script3']);///
                $activesheet->setCellValue('CW'. $pos, $data['script4']);///
                $activesheet->setCellValue('CX'. $pos, $data['script5']);///
                $activesheet->setCellValue('CY'. $pos, $data['script6']);///
                $activesheet->setCellValue('CZ'. $pos, $data['script7']);///
                $activesheet->setCellValue('DA'. $pos, $data['script8']);///
                $activesheet->setCellValue('DB'. $pos, $data['script9']);///
                $activesheet->setCellValue('DC'. $pos, $data['script10']);///
                $activesheet->setCellValue('DD'. $pos, $data['Ntel']);///
                $activesheet->setCellValue('DE'. $pos, $data['Nemail']);///
                $activesheet->setCellValue('DF'. $pos, $data['vr1']);///
                $activesheet->setCellValue('DG'. $pos, $data['vr2']);///
                $activesheet->setCellValue('DH'. $pos, $data['vr3']);///
                $activesheet->setCellValue('DI'. $pos, $data['vr4']);///
                $activesheet->setCellValue('DJ'. $pos, $data['vr5']);///
                $activesheet->setCellValue('DK'. $pos, $data['vr6']);///
                $activesheet->setCellValue('DL'. $pos, $data['vr7']);///
                $activesheet->setCellValue('DM'. $pos, $data['vr8']);///
                $activesheet->setCellValue('DN'. $pos, $data['vr9']);///
                $activesheet->setCellValue('DO'. $pos, $data['vr10']);///

            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet,'Excel2007');
            $file1="export/contact_indirect".date('Y-m-d').date('gisa').".xlsx";
            $objWriter->save($file1);
            /////////////// end indirect
            /////////////// start direct
            $req=$bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT * FROM contact_direct WHERE
            (vr1=1 and exp1=0) or
            (vr2=1 and exp2=0) or
            (vr3=1 and exp3=0) or
            (vr4=1 and exp4=0) or
            (vr5=1 and exp5=0) or
            (vr6=1 and exp6=0) or
            (vr7=1 and exp7=0) or
            (vr8=1 and exp8=0) or
            (vr9=1 and exp9=0) or
            (vr10=1 and exp10=0)
");
            $sheet = new PHPExcel();
            $activesheet = $sheet->getActiveSheet();
            $activesheet->setCellValue('A1','id');
            $activesheet->setCellValue('B1','Civilite');
            $activesheet->setCellValue('C1','Nom');
            $activesheet->setCellValue('D1','Prenom');
            $activesheet->setCellValue('E1','Tel');
            $activesheet->setCellValue('F1','E-Mail');
            $activesheet->setCellValue('G1','Profession_Mere');
            $activesheet->setCellValue('H1','Profession_Pere');
            $activesheet->setCellValue('I1','Mail_Mere');
            $activesheet->setCellValue('J1','Mail_Pere');
            $activesheet->setCellValue('K1','Tel_Mere');
            $activesheet->setCellValue('L1','Tel_Pere');
            $activesheet->setCellValue('M1','Annee_Etude');
            $activesheet->setCellValue('N1','Annee_Univ');
            $activesheet->setCellValue('O1','Formation_Demmandee');
            $activesheet->setCellValue('P1','Ville');
            $activesheet->setCellValue('Q1','Date');
            $activesheet->setCellValue('R1','Groupe_Formation');
            $activesheet->setCellValue('S1','Ecole');
            $activesheet->setCellValue('T1','Etape_Phoning2');
            $activesheet->setCellValue('U1','Date_de_Naissance');
            $activesheet->setCellValue('V1','Nature_de_Contact');///
            $activesheet->setCellValue('W1','GSM');///
            $activesheet->setCellValue('X1','Etape_Phoning');///
            $activesheet->setCellValue('Y1','Etape_Phoning3');///
            $activesheet->setCellValue('Z1','Marche');///
            $activesheet->setCellValue('AA1','Zone');///
            $activesheet->setCellValue('AB1','Ville_Lycee');///
            $activesheet->setCellValue('AC1','Etape_Phoning1');///
            $activesheet->setCellValue('AD1','Niveau_des_etudes');///
            $activesheet->setCellValue('AE1','Etablissement');///
            $activesheet->setCellValue('AF1','Lieu_de_Naissance');///
            $activesheet->setCellValue('AG1','Branche');///
            $activesheet->setCellValue('AH1','Observations');///
            $activesheet->setCellValue('AJ1','Lycee_Public');///
            $activesheet->setCellValue('AK1','Observation_Chef_de_produit');///
            $activesheet->setCellValue('AL1','Date_Dern_Phoning');///
            $activesheet->setCellValue('AM1','Etape_Phoning8');///
            $activesheet->setCellValue('AN1','TA8');///
            $activesheet->setCellValue('AO1','Date_Phoning9');///
            $activesheet->setCellValue('AP1','Diplome_Obtenu');///
            $activesheet->setCellValue('AK1','Date_Saisie');///
            $activesheet->setCellValue('AR1','Lycee_Prive');///
            $activesheet->setCellValue('AS1','Date_Phoning1');///
            $activesheet->setCellValue('AT1','Dern_Campagne');///
            $activesheet->setCellValue('AU1','Etape_Phoning9');///
            $activesheet->setCellValue('AW1','TA9');///
            $activesheet->setCellValue('AX1','Date_Phoning10');///
            $activesheet->setCellValue('AY1','Annee_Obtention');///
            $activesheet->setCellValue('AZ1','Heure_Saisie');///
            $activesheet->setCellValue('BA1','Lycee_Mission');///
            $activesheet->setCellValue('BB1','Date_Phoning2');///
            $activesheet->setCellValue('BC1','TA');///
            $activesheet->setCellValue('BD1','Etape_Phoning10');///
            $activesheet->setCellValue('BE1','TA10');///
            $activesheet->setCellValue('BF1','TA1');///
            $activesheet->setCellValue('BG1','Experience_professionelle');///
            $activesheet->setCellValue('BH1','Formation');///
            $activesheet->setCellValue('BI1','StatutContact');///
            $activesheet->setCellValue('BJ1','Date_Phoning3');///
            $activesheet->setCellValue('BK1','E-mail-Phoning');///
            $activesheet->setCellValue('BL1','Date_Phoning6');///
            $activesheet->setCellValue('BM1','Campagne1');///
            $activesheet->setCellValue('BN1','TA2');///
            $activesheet->setCellValue('BO1','Reçu_par');///
            $activesheet->setCellValue('BP1','Transfert_CD');///
            $activesheet->setCellValue('BQ1','Date_Phoning4');///
            $activesheet->setCellValue('BR1','A_ne_pas_filtrer');///
            $activesheet->setCellValue('BS1','Date_Phoning7');///
            $activesheet->setCellValue('BT1','Campagne2');///
            $activesheet->setCellValue('BU1','TA3');///
            $activesheet->setCellValue('BV1','Operateur_Saisie');///
            $activesheet->setCellValue('BW1','Abandon');///
            $activesheet->setCellValue('BX1','Date_Phoning5');///
            $activesheet->setCellValue('BY1','Etape_Phoning6');///
            $activesheet->setCellValue('BZ1','Date_Phoning8');///
            $activesheet->setCellValue('CA1','Campagne3');///
            $activesheet->setCellValue('CB1','TA4');///
            $activesheet->setCellValue('CC1','Categorie');///
            $activesheet->setCellValue('CD1','Source_Contact');///
            $activesheet->setCellValue('CE1','Campagne7');///
            $activesheet->setCellValue('CF1','Etape_Phoning7');///
            $activesheet->setCellValue('CG1','TA6');///
            $activesheet->setCellValue('CH1','Campagne4');///
            $activesheet->setCellValue('CI1','Etape_Phoning5');///
            $activesheet->setCellValue('CJ1','Interesse_Par');///
            $activesheet->setCellValue('CK1','Campagne8');///
            $activesheet->setCellValue('CL1','Etape_Phoning4');///
            $activesheet->setCellValue('CM1','Campagne9');///
            $activesheet->setCellValue('CN1','Campagne5');///
            $activesheet->setCellValue('CO1','Adresse');///
            $activesheet->setCellValue('CP1','CP');///
            $activesheet->setCellValue('CQ1','Campagne10');///
            $activesheet->setCellValue('CR1','Campagne6');///
            $activesheet->setCellValue('CS1','TA7');///
            $activesheet->setCellValue('CT1','TA5');///
            $activesheet->setCellValue('CU1','Lycee');///
            $activesheet->setCellValue('CV1','script1');///
            $activesheet->setCellValue('CW1','script2');///
            $activesheet->setCellValue('CX1','script3');///
            $activesheet->setCellValue('CY1','script4');///
            $activesheet->setCellValue('CZ1','script5');///
            $activesheet->setCellValue('DA1','script6');///
            $activesheet->setCellValue('DB1','script7');///
            $activesheet->setCellValue('DC1','script8');///
            $activesheet->setCellValue('DD1','script9');///
            $activesheet->setCellValue('DE1','script10');///
            $activesheet->setCellValue('DF1','Ntel');///
            $activesheet->setCellValue('DG1','Nemail');///
            $activesheet->setCellValue('DH1','vr1');///
            $activesheet->setCellValue('DI1','vr2');///
            $activesheet->setCellValue('DJ1','vr3');///
            $activesheet->setCellValue('DK1','vr4');///
            $activesheet->setCellValue('DL1','vr5');///
            $activesheet->setCellValue('DM1','vr6');///
            $activesheet->setCellValue('DN1','vr7');///
            $activesheet->setCellValue('DO1','vr8');///
            $activesheet->setCellValue('DP1','vr9');///
            $activesheet->setCellValue('DQ1','vr10');///
            $activesheet->setCellValue('DS1','valide');

            $pos=1;
            while($data=$req->fetch()) {
                $pos++;
                $activesheet->setCellValue('A' . $pos, $data["AnneeUniv"]);
                $activesheet->setCellValue('B' . $pos, $data["Programme"]);
                $activesheet->setCellValue('C' . $pos, $data["Promotion"]);
                $activesheet->setCellValue('D' . $pos, $data["Niveau"]);
                $activesheet->setCellValue('E' . $pos, $data["Groupe"]);
                $activesheet->setCellValue('F' . $pos, $data["HeureD_Seance"]);
                $activesheet->setCellValue('G' . $pos, $data["Date Presence"]);
                $activesheet->setCellValue('H' . $pos, $data["J"]);
                $activesheet->setCellValue('I' . $pos, $data["Prof"]);
                $activesheet->setCellValue('J' . $pos, $data["Module"]);
                $activesheet->setCellValue('K' . $pos, $data["NbreHeure"]);
                $activesheet->setCellValue('L' . $pos, $data["Seance_effectuee"]);
                $activesheet->setCellValue('M' . $pos, $data["Num"]);
                $activesheet->setCellValue('N' . $pos, $data["Civilite"]);
                $activesheet->setCellValue('O' . $pos, $data["Nom"]);
                $activesheet->setCellValue('P' . $pos, $data["Prenom"]);
                $activesheet->setCellValue('Q' . $pos, $data["Salle"]);
                $activesheet->setCellValue('R' . $pos, $data["Absent"]);
                $activesheet->setCellValue('S' . $pos, $data["Ecole"]);
                $activesheet->setCellValue('T' . $pos, $data["Nom et Prenom"]);
                $activesheet->setCellValue('U' . $pos, $data["Verrouille"]);
            }
            $objWriter = PHPExcel_IOFactory::createWriter($sheet,'Excel2007');
            $file2="export/contact_direct".date('Y-m-d').date('gisa').".xlsx";
            $objWriter->save($file2);
            $test_test=true;
        }
        function vrexport()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req=$bdd->query("SET NAMES 'utf8'");
            $req = $bdd->query("SELECT id,vr1,vr2,vr3,vr4,vr5,vr6,vr7,vr8,vr8,vr9,vr10,exp1,exp2,exp3,exp4,exp5,exp6,exp7,exp8,exp9,exp10 FROM contact_indirect WHERE
            (vr1=1 and exp1=0) or
            (vr2=1 and exp2=0) or
            (vr3=1 and exp3=0) or
            (vr4=1 and exp4=0) or
            (vr5=1 and exp5=0) or
            (vr6=1 and exp6=0) or
            (vr7=1 and exp7=0) or
            (vr8=1 and exp8=0) or
            (vr9=1 and exp9=0) or
            (vr10=1 and exp10=0)
");
                while($data=$req->fetch())
                {
                    $vr="";
                    if($data['vr1']==1 && $data['exp1']==0)
                    {
                        $vr.="exp1=1";
                    }
                    elseif($data['vr2']==1 && $data['exp2']==0)
                    {
                        $vr.="exp2=1";
                    }
                    elseif($data['vr3']==1 && $data['exp3']==0)
                    {
                        $vr.="exp3=1";
                    }
                    elseif($data['vr4']==1 && $data['exp4']==0)
                    {
                        $vr.="exp4=1";
                    }
                    elseif($data['vr5']==1 && $data['exp5']==0)
                    {
                        $vr.="exp5=5";
                    }
                    elseif($data['vr6']==1 && $data['exp6']==0)
                    {
                        $vr.="exp6=1";
                    }
                    elseif($data['vr7']==1 && $data['exp7']==0)
                    {
                        $vr.="exp7=1";
                    }
                    elseif($data['vr8']==1 && $data['exp8']==0)
                    {
                        $vr.="exp8=1";
                    }
                    elseif($data['vr9']==1 && $data['exp9']==0)
                    {
                        $vr.="exp9=1";
                    }
                    elseif($data['vr10']==1 && $data['exp10']==0)
                    {
                        $vr.="exp10=1";
                    }
                    $req = $bdd->query("update contact_direct set $vr where id='".$data['id']."' ");
                }
            $req = $bdd->query("SELECT id,vr1,vr2,vr3,vr4,vr5,vr6,vr7,vr8,vr8,vr9,vr10,exp1,exp2,exp3,exp4,exp5,exp6,exp7,exp8,exp9,exp10 FROM contact_indirect WHERE
            (vr1=1 and exp1=0) or
            (vr2=1 and exp2=0) or
            (vr3=1 and exp3=0) or
            (vr4=1 and exp4=0) or
            (vr5=1 and exp5=0) or
            (vr6=1 and exp6=0) or
            (vr7=1 and exp7=0) or
            (vr8=1 and exp8=0) or
            (vr9=1 and exp9=0) or
            (vr10=1 and exp10=0)
");
            while($data=$req->fetch())
            {
                $vr="";
                if($data['vr1']==1 && $data['exp1']==0)
                {
                    $vr.="exp1=1";
                }
                elseif($data['vr2']==1 && $data['exp2']==0)
                {
                    $vr.="exp2=1";
                }
                elseif($data['vr3']==1 && $data['exp3']==0)
                {
                    $vr.="exp3=1";
                }
                elseif($data['vr4']==1 && $data['exp4']==0)
                {
                    $vr.="exp4=1";
                }
                elseif($data['vr5']==1 && $data['exp5']==0)
                {
                    $vr.="exp5=5";
                }
                elseif($data['vr6']==1 && $data['exp6']==0)
                {
                    $vr.="exp6=1";
                }
                elseif($data['vr7']==1 && $data['exp7']==0)
                {
                    $vr.="exp7=1";
                }
                elseif($data['vr8']==1 && $data['exp8']==0)
                {
                    $vr.="exp8=1";
                }
                elseif($data['vr9']==1 && $data['exp9']==0)
                {
                    $vr.="exp9=1";
                }
                elseif($data['vr10']==1 && $data['exp10']==0)
                {
                    $vr.="exp10=1";
                }
                $req = $bdd->query("update contact_direct set $vr where id='".$data['id']."' ");
            }
        }
        
        
        
        
      function  getlistcontactdirectsupercommercial()
      {
          include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $req = $bdd->query("SELECT cd.`Nom`,cd.`id`,Tel,GSM,`Frais_Dossier`,`Observation`,niveau_demande,Test_Passe,Inscrit,`test`,`date_test`,cd.`Prenom`,`E-Mail`,
                `Formation_Demmandee`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`  FROM contact_direct cd where Reçu_par=100 
                and (Contact_Suivi_par is null or Contact_Suivi_par='') and ( trim(Observation) not like
               '#%NRP' and  trim(Observation) not like '#%boite%vocal%' and Observation not like '%NA%'  or observation like '%intéressé%' or observation like '%intéresser%')  or  Observation is null  ORDER BY id DESC");
            while($donner=$req->fetch())
            {
				$reqe = $bdd->query("SELECT * FROM  `histo_transf` where iddc ='".md5($donner['id'])."' and idinc in (select md5(id) from contact_indirect where transferer=1)");
				if($reqe->rowCount()>0)
				{
					$transf='<span class="badge bg-green"> Oui </span>';
				}
				else
				{
					$transf="Non";
				}
				$Frais_Dossier="Non";
				if($donner['Frais_Dossier']==1)
				{
					$Frais_Dossier="Oui";
				}
				
				if($donner['Test_Passe']==1)
				{
					$Test_Passe="Oui";
				}
				else
				{
				    $Test_Passe="Non";
				}
				if($donner['Inscrit']==1)
				{
					$Inscrit="Oui";
				}
				else
				{
				    $Inscrit="Non";
				}
                $valeur.= '
                    <tr  >
                        <td onclick="window.open(\''.$location.'?page=auto_cmp_from_tr&type_contact=CD&id='.md5($donner['id']).'\')"> <img style="width: 40px;" src="dist/img/Dialer-icon.png" /></td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                         <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Observation'].' </td>
                        ';
            }
            return $valeur;
      }
      
        function getlistcontactdirect_super_admin()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $req = $bdd->query("SELECT cd.`Nom`,cd.`id`,`Frais_Dossier`,`Observation`,a_affecter,`Campagne8`,`Etape_Phoning8`,`Date_Phoning8`,`date_affectation`,niveau_demande,Test_Passe,Inscrit,`test`,`date_test`,cd.`Prenom`,`E-Mail`,`Formation_Demmandee`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,u.nom as 'nom_user',u.prenom as 'prenom_user',u1.nom as 'nom_user1',u1.prenom as 'prenom_user1' FROM contact_direct cd left join users u on u.id=cd.Contact_Suivi_par left join users u1 on u1.id=cd.Reçu_par where `date_du_contact`=CURDATE() ORDER BY id DESC");
            while($donner=$req->fetch())
            {
                $observat="";
                        $reqa = $bdd->query('SELECT `observation` FROM `rappel` WHERE (`id_contact`)="'.$donner['id'].'" and `type`="CD"');
                        while($database=$reqa->fetch())
                        {
                            $observat.="#".$database[0];
                        }
                        $reqa = $bdd->query('SELECT ac.observation,ac.status,rc.status FROM `rdv_from_call_center` rc inner join `auto_cmp_rdv` ac on ac.id_rdv_table=rc.`id` where `type_contact`="CD" and ac.observation<>"" and (rc.contact)="'.$donner['id'].'"');
                        while($database=$reqa->fetch())
                        {
                            $observat.="#".$database[0];
                            $observat.="#".$database[1];
                        }
                        $reqa = $bdd->query('SELECT status FROM `rdv_from_call_center` where (`contact`)="'.$donner['id'].'"');
                        while($database=$reqa->fetch())
                        {
                            $observat.="#".$database[0];
                        }
				$reqe = $bdd->query("SELECT * FROM  `histo_transf` where iddc ='".md5($donner['id'])."' and idinc in (select md5(id) from contact_indirect where transferer=1)");
				if($reqe->rowCount()>0)
				{
					$transf='<span class="badge bg-green"> Oui </span>';
				}
				else
				{
					$transf="Non";
				}
				$Frais_Dossier="Non";
				if($donner['Frais_Dossier']==1)
				{
					$Frais_Dossier="Oui";
				}
				
				if($donner['Test_Passe']==1)
				{
					$Test_Passe="Oui";
				}
				else
				{
				    $Test_Passe="Non";
				}
				if($donner['Inscrit']==1)
				{
					$Inscrit="Oui";
				}
				else
				{
				    $Inscrit="Non";
				}
                $valeur.= '
                    <tr  >
                        <td onclick="window.open(\''.$location.'?page=historique&type_contact=CD&id='.md5($donner['id']).'\')"> <img style="width: 40px;" src="dist/img/historique.png" /></td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['test'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['date_test'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$Frais_Dossier.' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['Formation_Demmandee'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['niveau_demande'].' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$transf.' </td>
                        <td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$donner['Observation'].' </td>
                        ';
                             $valeur.= '<td onclick="window.open(\''.$location.'?page=historique&id='.md5($donner['id']).'\')"> '.$observat.' </td>
                        
                        ';
                        $valeur.= '<td> '.$donner['nom_user'].' '.$donner['prenom_user'].'<td> '.$donner['date_affectation'].' </td> </td>';
                    $valeur.= '<td> '.$donner['nom_user1'].' '.$donner['prenom_user1'].' </td>
                        <td> '.$Test_Passe.' </td>
                        <td> '.$Inscrit.' </td>
                    </tr>';
            }
            return $valeur;
        }
        
       function getlistcontactdirect($param,$nom,$prenom,$tel,$gsm,$nature_contact,$contactsuivipar,$commencepar,$marche,$test,$date_affectation,$inscrit,$date_du_contact,$Test_passe)
        {
            ini_set('memory_limit', '-1');
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query('UPDATE `contact_direct` set `date_affectation`=CURDATE(),`Contact_Suivi_par`="103" where `id` in (SELECT `new_id_contact` FROM `transfer_CDI_CD_Qualifié` where date(`date`)=CURDATE()-1 and `id_user` in (SELECT `id` FROM `users` WHERE `centre`="Marrakech" and `profile`="agent" ) )');
            ini_set('memory_limit', '-1');
            $valeur='<table id="example4" class="table table-bordered table-striped">
                    <thead >
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de contact</th>
                        <th>E-Mail</th>
                        <th>Nature de Contact</th>
						<th>Test</th>
						<th>Campagne 8</th>
						<th>Etape Phoning 8</th>
						<th>Date Phoning 8</th>
						<th>Date Test</th>
						<th>Frais Dossier</th>
						<th>Formation demandée</th>
						<th>Niveau demande</th>
                        <th>Transférer</th>
                        <th>Observation</th>';
             if($_SESSION['user']['id']=="46")
                    {
                $valeur.='<th>Observation detail</th>
                <th>Observation CI</th>
                <th>A AFFECTER</th>
                <th>#</th>';
                 }
                 $valeur.='<th>Contact Suivi par</th>
                <th>Date Affectation</th>
                <th>Recu par</th>
                <th>Test Passé</th>
                <th>Inscrit</th>
                </tr>
                </thead>
                <tbody>';
                                            
            if($param=="Vide")
            {
                $valeur="";
            $req = $bdd->query("SELECT cd.`Nom`,cd.`id`,`Frais_Dossier`,`Observation`,a_affecter,`Campagne8`,`Etape_Phoning8`,`Date_Phoning8`,`date_affectation`,niveau_demande,Test_Passe,Inscrit,`test`,`date_test`,cd.`Prenom`,`E-Mail`,`Formation_Demmandee`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,u.nom as 'nom_user',u.prenom as 'prenom_user',u1.nom as 'nom_user1',u1.prenom as 'prenom_user1' FROM contact_direct cd left join users u on u.id=cd.Contact_Suivi_par left join users u1 on u1.id=cd.Reçu_par ORDER BY id DESC limit 0,10");
            }
            else
            {
                
                $query="";
                if($nom!="")
                {
                    $query.=" and cd.Nom like '%".$nom."%' ";
                }
                if($prenom!="")
                {
                    $query.=" and cd.Prenom like '%".$prenom."%' ";
                }
                if($tel!="")
                {
                    $query.=" and cd.Tel like '%".$tel."%' ";
                }
                if($gsm!="")
                {
                    $query.=" and cd.GSM like '%".$gsm."%' ";
                }
                if($nature_contact!="")
                {
                    $query.=" and cd.Nature_de_Contact like '%".$nature_contact."%' ";
                }
                if($commencepar!="")
                {
                    $query.=" and cd.Nom like '".$commencepar."%' ";
                }
                if($marche!="")
                {
                    $query.=" and cd.Marche like '%".$marche."%' ";
                }
                if($contactsuivipar!="")
                {
                    $query.=" and cd.Contact_Suivi_par=".$contactsuivipar;
                }
                if($test!="" and $test!="vide")
                {
                    $query.=" and cd.test='".$test."'";
                }
                if($date_affectation!="" and $date_affectation!="vide")
                {
                    $query.=" and date(cd.date_affectation)='".$date_affectation."'";
                }
                if($inscrit!="" and $inscrit!="vide")
                {
                    $query.=" and Inscrit='".$inscrit."'";
                }
                if($date_du_contact!="" and $date_du_contact!="vide")
                {
                    $query.=" and date_du_contact='".$date_du_contact."'";
                }
                if($Test_passe!="" and $Test_passe!="vide")
                {
                    $query.=" and Test_Passe='".$Test_passe."'";
                }
                $req = $bdd->query("SELECT cd.`Nom`,cd.`id`,`Frais_Dossier`,`Observation`,a_affecter,`Campagne8`,`Etape_Phoning8`,`Date_Phoning8`,`date_affectation`,niveau_demande,Test_Passe,Inscrit,`test`,`date_test`,cd.`Prenom`,`E-Mail`,`Formation_Demmandee`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,u.nom as 'nom_user',u.prenom as 'prenom_user',u1.nom as 'nom_user1',u1.prenom as 'prenom_user1' FROM contact_direct cd left join users u on u.id=cd.Contact_Suivi_par left join users u1 on u1.id=cd.Reçu_par where 1=1 ".$query."  ORDER BY id DESC");
            
            }
            while($donner=$req->fetch())
            {
                $old_observ="";
                $observat="";
                $reqa = $bdd->query('SELECT `observation` FROM `rappel` WHERE (`id_contact`)="'.$donner['id'].'" and `type`="CD"');
                while($database=$reqa->fetch())
                {
                    $observat.="#".$database[0];
                }
                $reqa = $bdd->query('SELECT ac.observation,ac.status,rc.status FROM `rdv_from_call_center` rc inner join `auto_cmp_rdv` ac on ac.id_rdv_table=rc.`id` where `type_contact`="CD" and ac.observation<>"" and (rc.contact)="'.$donner['id'].'"');
                while($database=$reqa->fetch())
                {
                    $observat.="#".$database[0];
                    $observat.="#".$database[1];
                }
                $reqa = $bdd->query('SELECT status FROM `rdv_from_call_center` where (`contact`)="'.$donner['id'].'"');
                while($database=$reqa->fetch())
                {
                    $observat.="#".$database[0];
                }
				$reqe = $bdd->query("SELECT * FROM  `histo_transf` where iddc ='".md5($donner['id'])."' and idinc in (select md5(id) from contact_indirect where transferer=1)");
				if($reqe->rowCount()>0)
				{
					$transf='<span class="badge bg-green"> Oui </span>';
				}
				else
				{
					$transf="Non";
				}	
				$reqe = $bdd->query("SELECT * FROM `transfer_CDI_CD_Qualifié` where `new_id_contact` ='".($donner['id'])."' and `id_contact` in (select (id) from contact_indirect where transferer=1)");
				if($reqe->rowCount()>0)
				{
				    $dtns=$reqe->fetch();
				    $reqe = $bdd->query("SELECT `Observations` FROM `contact_indirect` WHERE id='".($dtns['id_contact'])."' and transferer=1");
				    $old_observ=$reqe->fetch();$old_observ=$old_observ[0];
					$transf='<span class="badge bg-green"> Oui </span>';
				}
				else
				{
				    $old_observ="";
					$transf="Non";
				}
				$Frais_Dossier="Non";
				if($donner['Frais_Dossier']==1)
				{
					$Frais_Dossier="Oui";
				}
				
				if($donner['Test_Passe']==1)
				{
					$Test_Passe="Oui";
				}
				else
				{
				    $Test_Passe="Non";
				}
				if($donner['Inscrit']==1)
				{
					$Inscrit="Oui";
				}
				else
				{
				    $Inscrit="Non";
				}
				ini_set('memory_limit', '-1');
                $valeur.= '
                    <tr  >
                        <td onclick="window.open(\''.$location.'?page=auto_cmp_from_tr&type_contact=CD&id='.md5($donner['id']).'\')"> <img style="width: 40px;" src="dist/img/Dialer-icon.png" /></td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['test'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Campagne8'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etape_Phoning8'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Phoning8'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_test'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$Frais_Dossier.' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Formation_Demmandee'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['niveau_demande'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$transf.' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Observation'].' </td>
                        ';
                        if($_SESSION['user']['id']=="46")
                        {
                             $valeur.= '<td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$observat.' </td><td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$old_observ.' </td><td > <span id="sp_'.md5($donner['id']).'">'.$donner['a_affecter'].'</span></td>
                        <td><a class="btn btn-block btn-danger btn-sm" onclick="desaffecter(\''.md5($donner['id']).'\');">Désaffecter</a></td>
                        ';
                        }
                        $valeur.= '<td> '.$donner['nom_user'].' '.$donner['prenom_user'].'<td> '.$donner['date_affectation'].' </td> </td>';
                    $valeur.= '<td> '.$donner['nom_user1'].' '.$donner['prenom_user1'].' </td>
                        <td> '.$Test_Passe.' </td>
                        <td> '.$Inscrit.' </td>
                    </tr>';
            }
            $valeur.=' </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Date de contact</th>
                        <th>E-Mail</th>
                        <th>Nature de Contact</th>
						<th>Test</th>
						<th>Campagne 8</th>
						<th>Etape Phoning 8</th>
						<th>Date Phoning 8</th>
						<th>Date Test</th>
						<th>Frais Dossier</th>
						<th>Formation demandée</th>
						<th>Niveau demande</th>
                        <th>Transférer</th>
                        <th>Observation</th>';
                          if($_SESSION['user']['id']=="46")
                            {
                        $valeur.='<th>Observation detail</th>
                        <th>Observation CI</th>
                        <th>A AFFECTER</th>
                        <th>#</th>';
                         }
                          $valeur.='<th>Contact Suivi par</th>
                                            <th>Date Affectation</th>
                                            <th>Recu par</th>
                                            <th>Test Passé</th>
                                            <th>Inscrit</th>
                                        </tr>
                                        </tfoot>
                                    </table>';
            
            return $valeur;
        }
        function getlistcontactindirect1()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT `Nom`,`Date`,`id`,`Prenom`,`E-Mail`,`Tel`,`Nature_de_Contact`
,`Date_Dern_Phoning`,`Marche`,`Lycee` FROM contact_indirect where transferer=0 and ( Lycee='0') ORDER BY id DESC");
            $valeur='';
            $i=0;
            while($donner=$req->fetch())
            {
            
                $valeur.= '
                    <tr>
                    	<td><input type="hidden" value="'. $req->rowCount().'" id="hidden_info"/> <input type="checkbox" value="'.$donner['id'].'" id="check_'.$i.'" /> </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > Contact Indirect </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Lycee'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Date_Dern_Phoning'].' </td>
                    </tr>';
                    $i++;
            }
            return $valeur;
        }
		function getlistcontactindirect2()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT  `Nom` ,  `Date` ,  `Ville` ,  `id` ,  `Prenom` ,  `E-Mail` ,  `Tel` ,  `Nature_de_Contact` ,  `Date_Dern_Phoning` ,  `Marche` ,  `Lycee` 
FROM contact_indirect WHERE centre IS NULL ORDER BY Ville DESC limit 0,100");
            $valeur='';
            $i=0;
            while($donner=$req->fetch())
            {
            
                $valeur.= '
                    <tr>
                    	<td><input type="hidden" value="'. $req->rowCount().'" id="hidden_info"/> <input type="checkbox" value="'.$donner['id'].'" id="check_'.$i.'" /> </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > Contact Indirect </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Lycee'].' </td>
						<td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Ville'].' </td>
						<td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nature_de_Contact'].' </td>
                    </tr>';
                    $i++;
            }
            return $valeur;
        }
         function getlistcontactindirect($param,$nom,$prenom,$tel,$gsm,$nature_contact,$contactsuivipar,$commencepar,$marche)
        {
            ini_set('memory_limit', '-1');
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($param=="Vide")
            {
                $req = $bdd->query("SELECT `id`,`nom`,`prenom` FROM `users`");
                $users=$req->fetchAll();
                $req = $bdd->query("SELECT `Nom`,`Date`,Observations,Niveau_des_etudes,`id`,`Prenom`,`Contact_Suivi_par`,`E-Mail`,`Tel`,`GSM`,`Nature_de_Contact`
                ,`Date_Dern_Phoning`,`Marche`,`Lycee` FROM contact_indirect cdi where transferer=0  ORDER BY id DESC limit 0,50");
                $valeur="";
                while($donner=$req->fetch())
                {
                    $user="";
                 foreach($users as $us)
                {
                
                if($donner['Contact_Suivi_par']==$us['id'])
                { $user=$us['nom'].' '.$us['prenom']; }
                }
                    $valeur.= '
                        <tr onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" >
                            <td> Contact Indirect </td>
                            <td> '.$donner['Nom'].' </td>
                            <td> '.$donner['Prenom'].' </td>
                            <td> '.$donner['Marche'].' </td>
                            <td> '.$donner['Date'].' </td>
                            <td> '.$donner['Tel'].' </td>
                            <td> '.$donner['GSM'].' </td>
                            <td> '.$donner['E-Mail'].' </td>
                            <td> '.$donner['Lycee'].' </td>
                            <td> '.$donner['Nature_de_Contact'].' </td>
                            <td> '.$donner['Niveau_des_etudes'].' </td>
                            <td> '.$donner['Observations'].' </td>
                            <td> '.$user.' </td>
                            <td> '.$donner['Date_Dern_Phoning'].' </td>
                        </tr>';
                }
            }
            else
            {
                $query="";
                if($nom!="")
                {
                    $query.=" and Nom like '%".$nom."%' ";
                }
                if($prenom!="")
                {
                    $query.=" and Prenom like '%".$prenom."%' ";
                }
                if($tel!="")
                {
                    $query.=" and Tel like '%".$tel."%' ";
                }
                if($gsm!="")
                {
                    $query.=" and GSM like '%".$gsm."%' ";
                }
                if($nature_contact!="")
                {
                    $query.=" and Nature_de_Contact like '%".$nature_contact."%' ";
                }
                if($contactsuivipar!="")
                {
                    $query.=" and Contact_Suivi_par like '%".$contactsuivipar."%' ";
                }
                if($commencepar!="")
                {
                    $query.=" and Nom like '".$commencepar."%' ";
                }
                if($marche!="")
                {
                    $query.=" and Marche like '%".$marche."%' ";
                }
                $req = $bdd->query("SELECT `id`,`nom`,`prenom` FROM `users`");
                $users=$req->fetchAll();
                $req = $bdd->query("SELECT `Nom`,`Date`,Niveau_des_etudes,`id`,`Prenom`,`Contact_Suivi_par`,`E-Mail`,`Tel`,`GSM`,`Nature_de_Contact`
                ,`Date_Dern_Phoning`,`Marche`,`Lycee` FROM contact_indirect cdi where transferer=0 ".$query."  ORDER BY id DESC");
                $valeur='<table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
                                    <th>Niveau des etudes</th>
                                    <th>Contact Suivi Par</th>
                                    <th>Dern Phoning</th>
                                </tr>
                                </thead>
                                <tbody>';
                while($donner=$req->fetch())
                {
                    $user="";
                 foreach($users as $us)
                {
                
                if($donner['Contact_Suivi_par']==$us['id'])
                { $user=$us['nom'].' '.$us['prenom']; }
                }
                    $valeur.= '
                        <tr onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" >
                            <td> Contact Indirect </td>
                            <td> '.$donner['Nom'].' </td>
                            <td> '.$donner['Prenom'].' </td>
                            <td> '.$donner['Marche'].' </td>
                            <td> '.$donner['Date'].' </td>
                            <td> '.$donner['Tel'].' </td>
                            <td> '.$donner['GSM'].' </td>
                            <td> '.$donner['E-Mail'].' </td>
                            <td> '.$donner['Lycee'].' </td>
                            <td> '.$donner['Nature_de_Contact'].' </td>
                            <td> '.$donner['Niveau_des_etudes'].' </td>
                            <td> '.$user.' </td>
                            <td> '.$donner['Date_Dern_Phoning'].' </td>
                        </tr>';
                }
                $valeur.='</tbody>
                                <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
                                    <th>Niveau des etudes</th>
                                    <th>Contact Suivi Par</th>
                                    <th>Dern Phoning</th>
                                </tr>
                                </tfoot>
                            </table>';
            }
            return $valeur;
        }
         function getlistalpha()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $valeur="";
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `alpha`");
            while($donner=$req->fetch())
            {
                $valeur.='<a class="btn btn-primary"  href="'.$location.'?page=getdoublonsind&alpha='.$donner[0].'" style="margin: 3px;">'.strtoupper($donner[0]).'</a>';
            }
            return $valeur;
        }
		function getlistalphavir()
        {
            include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $valeur="";
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `alpha`");
            while($donner=$req->fetch())
            {
                $valeur.='<a class="btn btn-primary"  href="'.$location.'?page=verificateur&alpha='.$donner[0].'" style="margin: 3px;">'.strtoupper($donner[0]).'</a>';
            }
            return $valeur;
        }
        function delete_contact($id)
        {
            include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("DELETE FROM `contact_direct` where md5(id)='".$id."'");
            return json_encode(array('validation'=>true));
        }
       function delete_indcontact($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("DELETE FROM `contact_indirect` where md5(id)=?");
            $req->execute(array($id));
            return json_encode(array('validation'=>true));
        }

        function validation_indcontact($id)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("update `contact_indirect` set validation_doublage=1 where md5(id)=?");
            $req->execute(array($id));
            return json_encode(array('validation'=>true));
        }
        
       function getdoublantcontactdirect()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $array=array();
            $arrayind=array();
            $req = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_direct where validation_doublage=0  ORDER BY id DESC");
            while($donner=$req->fetch())
            {
                $test=false;
                if(count($array)>0)
                {
                    $filter = join("', '", $array);
                    $filter1 = join("', '", $arrayind);
                    $req2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Etablissement`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_direct
                    WHERE id<>'".$donner['id']."' and `id` not in ('$filter') ");
                }
                else
                {
                    $req2 = $bdd->query("SELECT `Nom`,`id`,`Etablissement`,`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_direct WHERE id<>'".$donner['id']."' ");
                }
               while($donner2=$req2->fetch())
                {
                    similar_text($donner['Nom'].' '.$donner['Prenom'], $donner2['Nom'].' '.$donner2['Prenom'], $percent);
                    if($percent>85)
                    {
                        array_push($array,$donner['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                        <td aligne="center">#</td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                            <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #3c8dbc !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\',\'CD\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> Contact Direct </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> </td>
                        </tr>';
                    }
                    elseif($donner['Tel']==$donner2['Tel'] and $donner['Tel']!="")
                    {
                        array_push($array,$donner['id']);
                        array_push($array,$donner2['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                            <td aligne="center">#</td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                             <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\',\'CD\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> Contact Direct </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td style="background-color: #8500ff !important;"  onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> </td>
                        </tr>';
                    }
                    elseif($donner['GSM']==$donner2['GSM'] and $donner['GSM']!="")
                    {
                        array_push($array,$donner['id']);
                        array_push($array,$donner2['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                       <td aligne="center">#</td>
                           <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                             <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\',\'CD\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> Contact Direct </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner2['id']).'\')"></td>
                        </tr>';
                }
                    elseif( ($donner['Tel']==$donner2['GSM'] or $donner['GSM']==$donner2['Tel']) and $donner['GSM']!="" and $donner['Tel']!="")
                    {
                        array_push($array,$donner['id']);
                        array_push($array,$donner2['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                            <td aligne="center">#</td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                             <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\',\'CD\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> Contact Direct </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> </td>
                        </tr>';
                    }
                }
            }


            return $valeur;
        }
        
        function getdoublantcontactindirect($alpha)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $array=array();
            $arrayind=array();
            $req = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Date`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_indirect WHERE Nom like '$alpha%' and transferer=0  and validation_doublage=0  ORDER BY id DESC limit 0,100");
            while($donner=$req->fetch())
            {
                $test=false;
                $req3 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Etablissement`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning`  FROM contact_direct WHERE Nom like '$alpha%' ");
                if(count($array)>0)
                {
                    $filter = join("', '", $array);
                    $filter1 = join("', '", $arrayind);
                    $req2 = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`Etablissement`,`Date`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_indirect
                    WHERE id<>'".$donner['id']."' and `id` not in ('$filter') and Nom like '$alpha%'  and transferer=0 ");
                }
                else
                {
                    $req2 = $bdd->query("SELECT `Nom`,`id`,`Etablissement`,`Prenom`,`E-Mail`,`Date`,`Tel`,`GSM`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning` FROM contact_indirect WHERE id<>'".$donner['id']."'  and Nom like '$alpha%' ");
                }
                while($donner2=$req2->fetch())
                {
                    similar_text($donner['Nom'].' '.$donner['Prenom'], $donner2['Nom'].' '.$donner2['Prenom'], $percent);
                    if($percent>90)
                    {
                        array_push($array,$donner['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                        <td>#</td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> Contact Indirect </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                            <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #3c8dbc !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> Contact Indirect </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"></td>
                        </tr>';
                    }
                    elseif($donner['Tel']==$donner2['Tel'] and $donner['Tel']!="")
                    {
                        array_push($array,$donner['id']);
                        array_push($array,$donner2['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                        <td>#</td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> Contact Indirect </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                            <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> Contact Indirect </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td style="background-color: #8500ff !important;"  onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> </td>
                        </tr>';
                    }
                    elseif($donner['GSM']==$donner2['GSM'] and $donner['GSM']!="")
                    {
                        array_push($array,$donner['id']);
                        array_push($array,$donner2['id']);
                        if($test==false)
                        {
                            $test=true;
                            $valeur.= '
                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
                        <td>#</td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> Contact Indirect </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                            <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                            <td><a class="btn btn-default" onclick="affectervalidation(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-check"></i></a></td>
                        </tr>';
                        }

                        $valeur.= '
                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\',\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-remove"></i></a></td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> Contact Indirect </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> </td>
                        </tr>';
                    }
//                    elseif( ($donner['Tel']==$donner2['GSM'] or $donner['GSM']==$donner2['Tel']) and $donner['GSM']!="" and $donner['Tel']!="")
//                    {
//                        array_push($array,$donner['id']);
//                        array_push($array,$donner2['id']);
//                        if($test==false)
//                        {
//                            $test=true;
//                            $valeur.= '
//                        <tr style="background-color: #009681 !important;color: white !important;" id="tr_'.md5($donner['id']).'">
//                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner['id']).'\');"><i class="fa fa-fw fa-remove"></i></a></td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Etablissement'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
//                            <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
//                            <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
//                        </tr>';
//                        }
//
//                        $valeur.= '
//                    <tr style="background-color: #F44336 !important;color: white !important;" id="tr_'.md5($donner2['id']).'">
//                        <td><a href="#deletecontact" class="btn btn-warning" data-toggle="modal" onclick="affecterdelete(\''.md5($donner2['id']).'\');"><i class="fa fa-fw fa-remove"></i></a></td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> Contact Direct </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nom'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Prenom'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['date_du_contact'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Etablissement'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Marche'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Tel'].' </td>
//                        <td style="background-color: #8500ff !important;" onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')"> '.$donner['GSM'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['E-Mail'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Nature_de_Contact'].' </td>
//                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner2['id']).'\')"> '.$donner2['Date_Dern_Phoning'].' </td>
//                        </tr>';
//                    }
                }
            }


            return $valeur;
        }
         function getlistcontactdirectavancee()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $valeur="";
            $req = $bdd->query("SELECT `Nom`,`id`,`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`Nature_de_Contact`,`Date_Dern_Phoning`,`Marche`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10` FROM contact_direct  ORDER BY id DESC");
            while($donner=$req->fetch())
            {
                $select="";
                if($donner['Etape_Phoning1']!="")
                {
                    if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                    }

                }
                if($donner['Etape_Phoning2']!="")
                {
                    if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                    }

                }
                if($donner['Etape_Phoning3']!="")
                {
                    if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                    }

                }
                if($donner['Etape_Phoning4']!="")
                {
                    if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                    }

                }
                if($donner['Etape_Phoning5']!="")
                {
                    if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                    }

                }
                if($donner['Etape_Phoning6']!="")
                {
                    if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                    }

                }
                if($donner['Etape_Phoning7']!="")
                {
                    if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                    }

                }
                if($donner['Etape_Phoning8']!="")
                {
                    if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                    }

                }
                if($donner['Etape_Phoning9']!="")
                {
                    if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                    }

                }
                if($donner['Etape_Phoning10']!="")
                {
                    if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                    }

                }
                $valeur.= '
                    <tr >
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> Contact Direct </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['date_du_contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Nature_de_Contact'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactd&id='.md5($donner['id']).'\')"> '.$donner['Date_Dern_Phoning'].' </td>
                        <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\');return false;">Valider la sélection</button></td>
                    </tr>';
            }
            return $valeur;
        }
        
        function getlistcontactindirectavancee()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT `Nom`,`Date`,`id`,`Prenom`,`E-Mail`,`Tel`,`Nature_de_Contact`
,`Date_Dern_Phoning`,`Etape_Phoning`,`Etape_Phoning1`,`Etape_Phoning2`,`Etape_Phoning3`,`Etape_Phoning4`,`Etape_Phoning5`,`Etape_Phoning6`,`Etape_Phoning7`,`Etape_Phoning8`,`Etape_Phoning9`,`Etape_Phoning10`,`Marche` FROM contact_indirect where transferer=0  ORDER BY id DESC");
            $valeur="";
            while($donner=$req->fetch())
            {
                $select="";
                if($donner['Etape_Phoning1']!="")
                {
                    if($donner['Etape_Phoning1']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning1']."' selected> Etape Phoning 1 : <strong>".$donner['Etape_Phoning1']."</strong></option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning1']."'> Etape Phoning 1 : ".$donner['Etape_Phoning1']."</option>";
                    }

                }
                if($donner['Etape_Phoning2']!="")
                {
                    if($donner['Etape_Phoning2']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning2']."' selected> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning2']."'> Etape Phoning 2 : ".$donner['Etape_Phoning2']."</option>";
                    }

                }
                if($donner['Etape_Phoning3']!="")
                {
                    if($donner['Etape_Phoning3']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning3']."' selected> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning3']."'> Etape Phoning 3 : ".$donner['Etape_Phoning3']."</option>";
                    }

                }
                if($donner['Etape_Phoning4']!="")
                {
                    if($donner['Etape_Phoning4']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning4']."' selected> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning4']."'> Etape Phoning 4 : ".$donner['Etape_Phoning4']."</option>";
                    }

                }
                if($donner['Etape_Phoning5']!="")
                {
                    if($donner['Etape_Phoning5']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning5']."' selected> Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning5']."' > Etape Phoning 5 : ".$donner['Etape_Phoning5']."</option>";
                    }

                }
                if($donner['Etape_Phoning6']!="")
                {
                    if($donner['Etape_Phoning6']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning6']."' selected> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning6']."'> Etape Phoning 6 : ".$donner['Etape_Phoning6']."</option>";
                    }

                }
                if($donner['Etape_Phoning7']!="")
                {
                    if($donner['Etape_Phoning7']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning7']."' selected> Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning7']."' > Etape Phoning 7 : ".$donner['Etape_Phoning7']."</option>";
                    }

                }
                if($donner['Etape_Phoning8']!="")
                {
                    if($donner['Etape_Phoning8']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning8']."' selected> Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning8']."' > Etape Phoning 8 : ".$donner['Etape_Phoning8']."</option>";
                    }

                }
                if($donner['Etape_Phoning9']!="")
                {
                    if($donner['Etape_Phoning9']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning9']."' selected> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning9']."'> Etape Phoning 9 : ".$donner['Etape_Phoning9']."</option>";
                    }

                }
                if($donner['Etape_Phoning10']!="")
                {
                    if($donner['Etape_Phoning10']==$donner['Etape_Phoning'])
                    {
                        $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                    }
                    else
                    {
                        $select.="<option value='".$donner['Etape_Phoning10']."' selected> Etape Phoning 10 : ".$donner['Etape_Phoning10']."</option>";
                    }

                }
                $valeur.= '
                    <tr>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > Contact Indirect </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Prenom'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Marche'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Date'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Tel'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['E-Mail'].' </td>
                        <td onclick="window.open(\''.$location.'?page=contactind&id='.md5($donner['id']).'\')" > '.$donner['Nature_de_Contact'].' </td>
                        <td> <select class="form-control" id="'.md5($donner['id']).'">'.$select.'</select><button style="margin-top : 5px;" class="btn btn-block center btn-primary btn-xs" id="btn'.md5($donner['id']).'" onclick="validationselection(\''.md5($donner['id']).'\',\''.$donner['Etape_Phoning'].'\');return false;">Valider la sélection</button></td>
                    </tr>';
            }
            return $valeur;
        }
        
        function getautocmp()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $reqe = $bdd->query("SELECT * FROM `parametrage`");
            while($data=$reqe->fetch())
            {
                if($data['type']=="date_du_contact")
                {
                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_direct` WHERE (DATE_ADD(date_du_contact,INTERVAL ".$data['nbrjour']." DAY)=CURDATE()) and (dern_auto_cmp <> CURDATE() or dern_auto_cmp is null) GROUP BY Marche");
                    $valeur="";
                    $i=0;
                    $datecmp='datecontact'.date("Y-m-d-h-i-s");
                    while($donner=$req->fetch())
                    {
                        $i++;
                        $valeur.= '
                        <tr id="tr'.$i.'">
                            <td >'.$datecmp.'</td>
                            <td > Contact Direct </td>
                            <td > '.$donner[1].' </td>
                            <td >
                                <div class="progress progress-xs progress-striped active">
                                    <div class="progress-bar progress-bar-success" style="width:  0%"></div>
                                </div>
                            </td>
                            <td ><span class="badge bg-green"> 0%</span></td>
                            <td > 0 / '.$donner[0].' </td>
                            <td><a class="btn btn-block btn-success btn-sm" data-toggle="modal" onclick="CreerCampagne(\''.$datecmp.'\',\'datecontact\',\''.$donner[1].'\',\''.$data['nbrjour'].'\','.$i.')" href="#createcmp" data-toggle="modal">Creer La Campagne</a>
                            </td>
                        </tr>';

                    }
                }
                elseif($data['type']=="date_depot")
                {
                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_direct` WHERE (DATE_ADD(date_depot,INTERVAL ".$data['nbrjour']." DAY)=CURDATE()) GROUP BY Marche");
                    $datecmp='date_depot'.date("Y-m-d-h-i-s");
                    while($donner=$req->fetch())
                    {
                        $i++;
                        $valeur.= '
                    <tr id="tr'.$i.'">
                        <td >'.$datecmp.' </td>
                        <td > Contact Direct </td>
                        <td > '.$donner[1].' </td>
                        <td >
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
                            </div>
                        </td>
                        <td ><span class="badge bg-green"> 0%</span></td>
                        <td > 0 / '.$donner[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne(\''.$datecmp.'\',\'date_depot\')">Creer La Campagne</button> </td>
                    </tr>';

                    }
                }
                elseif($data['type']=="date_test")
                {
                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_direct` WHERE (DATE_ADD(CURDATE(),INTERVAL ".$data['nbrjour']." DAY)=date_test) GROUP BY Marche");
                    $datecmp='date_test'.date("Y-m-d-h-i-s");
                    while($donner=$req->fetch())
                    {
                        $i++;
                        $valeur.= '
                    <tr id="tr'.$i.'">
                        <td >'.$datecmp.' </td>
                        <td > Contact Direct </td>
                        <td > '.$donner[1].' </td>
                        <td >
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
                            </div>
                        </td>
                        <td ><span class="badge bg-green"> 0%</span></td>
                        <td > 0 / '.$donner[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne(\''.$datecmp.'\',\'date_test\','.$i.')">Creer La Campagne</button> </td>
                    </tr>';

                    }
                }
                elseif($data['type']=="Test_Passe")
                {
                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_direct` WHERE (DATE_ADD(CURDATE(),INTERVAL ".$data['nbrjour']." DAY)<=date_test and CURDATE() > date_test) and Test_Passe=0 GROUP BY Marche");
                    $datecmp='Test_Passe'.date("Y-m-d-h-i-s");
                    while($donner=$req->fetch())
                    {
                        $i++;
                        $valeur.= '
                    <tr id="tr'.$i.'">
                        <td >'.$datecmp.' </td>
                        <td > Contact Direct </td>
                        <td > '.$donner[1].' </td>
                        <td >
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
                            </div>
                        </td>
                        <td ><span class="badge bg-green"> 0%</span></td>
                        <td > 0 / '.$donner[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne(\''.$datecmp.'\',\'Test_Passe\')">Creer La Campagne</button> </td>
                    </tr>';

                    }
                }
                elseif($data['type']=="RDVF")
                {
                    $req = $bdd->query("SELECT count(id) FROM `rendez_vous` WHERE (DATE_ADD(CURDATE(),INTERVAL ".$data['nbrjour']." DAY)<=date and CURDATE()>date) and rdv_effectuer=0");
                    $datecmp='RDVF'.date("Y-m-d-h-i-s");
                    while($donner=$req->fetch())
                    {
                        if($donner[0]>0)
                        {
                            $i++;
                            $valeur.= '
                    <tr id="tr'.$i.'">
                        <td >'.$datecmp.' </td>
                        <td > Contact Direct </td>
                        <td > - </td>
                        <td >
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
                            </div>
                        </td>
                        <td ><span class="badge bg-green"> 0%</span></td>
                        <td > 0 / '.$donner[0].' </td>
                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne(\''.$datecmp.'\',\'RDVF\')">Creer La Campagne</button> </td>
                    </tr>';
                        }
                    }
                }
//                elseif($data['type']=="inscrit")
//                {
//                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_direct` WHERE (DATE_ADD(CURDATE(),INTERVAL ".$data['nbrjour']." DAY)<=date and CURDATE()>date)  and Inscrit=1 GROUP BY Marche");
//                    $datecmp='datecontact'.date("Y-m-d-h-i-s");
//                    while($donner=$req->fetch())
//                    {
//                        $i++;
//                        $valeur.= '
//                    <tr id="tr'.$i.'">
//                        <td > datecontact'.date("Y_m_d_h_i_s").' </td>
//                        <td > Contact Indirect </td>
//                        <td > '.$donner[1].' </td>
//                        <td >
//                            <div class="progress progress-xs progress-striped active">
//                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
//                            </div>
//                        </td>
//                        <td ><span class="badge bg-green"> 0%</span></td>
//                        <td > 0 / '.$donner[0].' </td>
//                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne('.$datecmp.')">Creer La Campagne</button> </td>
//                    </tr>';
//
//                    }
//                }
//                elseif($data['type']=="Admis")
//                {
//                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_indirect` WHERE (Campagne1 is NULL and `Etape_Phoning1` is NULL and `TA1` is NULL) GROUP BY Marche");
//                    $datecmp='datecontact'.date("Y-m-d-h-i-s");
//                    while($donner=$req->fetch())
//                    {
//                        $i++;
//                        $valeur.= '
//                    <tr id="tr'.$i.'">
//                        <td > datecontact'.date("Y_m_d_h_i_s").' </td>
//                        <td > Contact Indirect </td>
//                        <td > '.$donner[1].' </td>
//                        <td >
//                            <div class="progress progress-xs progress-striped active">
//                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
//                            </div>
//                        </td>
//                        <td ><span class="badge bg-green"> 0%</span></td>
//                        <td > 0 / '.$donner[0].' </td>
//                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne('.$datecmp.')">Creer La Campagne</button> </td>
//                    </tr>';
//
//                    }
//                }
//                elseif($data['type']=="Non admis")
//                {
//                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_indirect` WHERE (Campagne1 is NULL and `Etape_Phoning1` is NULL and `TA1` is NULL) GROUP BY Marche");
//                    $datecmp='datecontact'.date("Y-m-d-h-i-s");
//                    while($donner=$req->fetch())
//                    {
//                        $i++;
//                        $valeur.= '
//                    <tr id="tr'.$i.'">
//                        <td > datecontact'.date("Y_m_d_h_i_s").' </td>
//                        <td > Contact Indirect </td>
//                        <td > '.$donner[1].' </td>
//                        <td >
//                            <div class="progress progress-xs progress-striped active">
//                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
//                            </div>
//                        </td>
//                        <td ><span class="badge bg-green"> 0%</span></td>
//                        <td > 0 / '.$donner[0].' </td>
//                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne('.$datecmp.')">Creer La Campagne</button> </td>
//                    </tr>';
//
//                    }
//                }
//                elseif($data['type']=="Liste_attente")
//                {
//                    $req = $bdd->query("SELECT count(id),Marche FROM `contact_indirect` WHERE (Campagne1 is NULL and `Etape_Phoning1` is NULL and `TA1` is NULL) GROUP BY Marche");
//                    $datecmp='datecontact'.date("Y-m-d-h-i-s");
//                    while($donner=$req->fetch())
//                    {
//                        $i++;
//                        $valeur.= '
//                    <tr id="tr'.$i.'">
//                        <td > datecontact'.date("Y_m_d_h_i_s").' </td>
//                        <td > Contact Indirect </td>
//                        <td > '.$donner[1].' </td>
//                        <td >
//                            <div class="progress progress-xs progress-striped active">
//                                <div class="progress-bar progress-bar-success" style="width:  0%"></div>
//                            </div>
//                        </td>
//                        <td ><span class="badge bg-green"> 0%</span></td>
//                        <td > 0 / '.$donner[0].' </td>
//                        <td><button class="btn btn-block btn-success btn-sm" onclick="CreerCampagne('.$datecmp.')">Creer La Campagne</button> </td>
//                    </tr>';
//
//                    }
//                }


            }

            return $valeur;
        }
        function getnbrcmpcomercial()
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("SELECT * FROM `listcampagne`");
            $valeur="";
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE (Campagne1='$donner[0]') or (Campagne2='$donner[0]') or (Campagne3='$donner[0]') or (Campagne4='$donner[0]') or (Campagne5='$donner[0]' ) or (Campagne6='$donner[0]' ) or (Campagne7='$donner[0]') or (Campagne8='$donner[0]') or (Campagne9='$donner[0]') or (Campagne10='$donner[0]') having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_indirect` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL)or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL) or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                $reqe3= $bdd->query("SELECT * FROM `cmp_by_agent` where `Campagne1`='$donner[0]'");
                if($reqe1[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn3=$reqe3->fetch())
                    {
                        $k++;
                        if($k==$reqe3->rowCount())
                        {
                            $agent.=$dn3[2]." ".$dn3[3];
                        }
                        else
                        {
                            $agent.=$dn3[2]." ".$dn3[3]." / ";
                        }
                    }
                    $valeur.= '
                    <tr id="'.$donner[0].'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Indirect </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$agent.' </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe1[0].' </td>
                        <td> <button href="#deletecampagne" class="btn btn-warning" onclick="affecterdeletecmp(\''.$donner[0].'\',\'CDI\');" data-toggle="modal">Supprimer</button> </td>
                    </tr>';
                }

            }
            $req = $bdd->query("SELECT * FROM `listcampagnedir`");
            while($donner=$req->fetch())
            {
                $reqe1 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE (Campagne1='$donner[0]' ) or (Campagne2='$donner[0]' ) or (Campagne3='$donner[0]' ) or (Campagne4='$donner[0]' ) or (Campagne5='$donner[0]' ) or (Campagne6='$donner[0]' ) or (Campagne7='$donner[0]' ) or (Campagne8='$donner[0]' ) or (Campagne9='$donner[0]' ) or (Campagne10='$donner[0]' ) having count(id)>0");
                $reqe2 = $bdd->query("SELECT count(id) FROM `contact_direct` WHERE(Campagne1='$donner[0]' and `Etape_Phoning1` is not NULL )or (Campagne2='$donner[0]' and `Etape_Phoning2` is not NULL  )or (Campagne3='$donner[0]' and `Etape_Phoning3` is not NULL  )or (Campagne4='$donner[0]' and `Etape_Phoning4` is not NULL  )or (Campagne5='$donner[0]' and `Etape_Phoning5` is not NULL  )or (Campagne6='$donner[0]' and `Etape_Phoning6` is not NULL  )or (Campagne7='$donner[0]' and `Etape_Phoning7` is not NULL  )or (Campagne8='$donner[0]' and `Etape_Phoning8` is not NULL  )or (Campagne9='$donner[0]' and `Etape_Phoning9` is not NULL  )or (Campagne10='$donner[0]' and `Etape_Phoning10` is not NULL  )");
                $reqe1=$reqe1->fetch();
                $reqe2=$reqe2->fetch();
                $reqe4= $bdd->query("SELECT * FROM `cmp_direct_by_agent` where `Campagne1`='$donner[0]'");
                if($reqe1[0]>0)
                {
                    $agent="";
                    $k=0;
                    while($dn4=$reqe4->fetch())
                    {
                        $k++;
                        if($k==$reqe4->rowCount())
                        {
                            $agent.=$dn4[2]." ".$dn4[3];
                        }
                        else
                        {
                            $agent.=$dn4[2]." ".$dn4[3]." / ";
                        }

                    }
                    $valeur.= '
                    <tr id="'.$donner[0].'">
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">'.$donner[0].'</td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> Contact Direct </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$agent.' </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'">
                            <div class="progress progress-xs progress-striped active">
                                <div class="progress-bar progress-bar-success" style="width:  '.($reqe2[0]*100)/$reqe1[0].'%"></div>
                            </div>
                        </td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"><span class="badge bg-green"> '.number_format(($reqe2[0]*100)/$reqe1[0], 2, ',', ' ').'%</span></td>
                        <td onclick="window.location=\''.$location.'?page=campagnetrt&campagne='.$donner[0].'\'"> '.$reqe2[0].' / '.$reqe1[0].' </td>
                        <td> <button href="#deletecampagne" class="btn btn-warning" onclick="affecterdeletecmp(\''.$donner[0].'\',\'CD\');" data-toggle="modal">Supprimer</button> </td>
                    </tr>';
                }

            }
            return $valeur;
        }
        function getcampagnebyuser($campagne,$id,$types)
        {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            try
            {
                $etphoning="<option></option>";
                $etapephoning = $bdd->query("SELECT * FROM `etapephoning`");
                while($test=$etapephoning->fetch())
                {
                    $etphoning.="
                                    <option>".$test[1]."</option>
                                ";
                }

                {

                }
                if($types=="CDI")
                {
                    $reqe1 = $bdd->query("SELECT `Nom`,`id`,`Prenom`, `Nature_de_Contact`, `Ville`,`Ville_Lycee`, `Formation` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observations`,`Formation_Demmandee`,`Ntel`,`Nemail`
  FROM `contact_indirect` WHERE ((Campagne1='".$campagne."' ) or (Campagne2='".$campagne."') or (Campagne3='".$campagne."' ) or (Campagne4='".$campagne."' ) or (Campagne5='".$campagne."') or (Campagne6='".$campagne."') or (Campagne7='".$campagne."' ) or (Campagne8='".$campagne."') or (Campagne9='".$campagne."') or (Campagne10='".$campagne."' )) and md5(id)='".$id."' limit 0,1 ");
                    while($dn=$reqe1->fetch())
                    {
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>$dn['Ville_Lycee'],
                            'Formation'=>$dn['Formation'],
                            'Formation_Demmandee'=>$dn['Formation_Demmandee'],
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'E-Mail'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
							'Ntel'=>$dn['Ntel'],
							'Nemail'=>$dn['Nemail'],
                            'etphoning'=>$etphoning,
                            'Campage'=>$campagne,
                            'id'=>md5($dn['id']),
                            'Observations'=>$dn['Observations']
                        );
                    }
                    //print_r ($infocontact);exit;
                    
                }
                else if($types=="CD")
                {
                    $reqe1 = $bdd->query("SELECT `Nom`,`id`,`Prenom`, `Nature_de_Contact`, `Ville`, `Formation_Demmandee` , `Niveau_des_etudes` , `Tel` , `Tel_Mere`
 ,`Tel_Pere` , `E-Mail` , `Adresse`,`Observation`,`Formation_Demmandee`,`Ntel`,`Nemail`
 FROM `contact_direct`
   WHERE ((Campagne1='$campagne' ) or (Campagne2='$campagne') or (Campagne3='$campagne' ) or (Campagne4='$campagne' ) or (Campagne5='$campagne') or (Campagne6='$campagne') or (Campagne7='$campagne' ) or (Campagne8='$campagne') or (Campagne9='$campagne') or (Campagne10='$campagne' )) and md5(id)='".$id."'  limit 0,1");
                    while($dn=$reqe1->fetch())
                    {
                   
                        $infocontact=array(
                            'Nom'=>$dn['Nom'],
                            'Prenom'=>$dn['Prenom'],
                            'Nature_de_Contact'=>$dn['Nature_de_Contact'],
                            'Ville'=>$dn['Ville'],
                            'Ville_Lycee'=>null,
                            'Formation'=>$dn['Formation_Demmandee'],
                            'Niveau_des_etudes'=>$dn['Niveau_des_etudes'],
                            'Tel'=>$dn['Tel'],
                            'Tel_Mere'=>$dn['Tel_Mere'],
                            'Tel_Pere'=>$dn['Tel_Pere'],
                            'Email'=>$dn['E-Mail'],
                            'Adresse'=>$dn['Adresse'],
							'Ntel'=>$dn['Ntel'],
							'Nemail'=>$dn['Nemail'],
                            'Campage'=>$campagne,
                            'etphoning'=>$etphoning,
                            'id'=>md5($dn['id']),
                            'Observations'=>$dn['Observation']
                        );
                    }
                }
                else
                {
                    return json_encode(array('validation'=>false));
                }
               return($infocontact) ;
            }
            catch(Exception $e)
            {
                die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
            }
        }
    }
        