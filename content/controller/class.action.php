<?php

class action
{

    private $id;
    private $action;
    private $nom_action;
    private $type_contact;
    private $objectif;
    private $suit_donner;
    private $date_action;
    private $heure_action;
    private $cible;
    private $cible_prevu;
    private $cible_realise;
    private $message;
    private $observation;

    function __construct($action,$nom_action,$type_contact,$objectif,$suit_donner,$date_action,$heure_action,$cible,$cible_prevu,$cible_realise,$message,$observation) {
        $this->action=$action;
        $this->nom_action=$nom_action;
        $this->type_contact=$type_contact;
        $this->objectif=$objectif;
        $this->suit_donner=$suit_donner;
        $this->date_action=$date_action;
        $this->heure_action=$heure_action;
        $this->cible=$cible;
        $this->cible_prevu=$cible_prevu;
        $this->cible_realise=$cible_realise;
        $this->message=$message;
        $this->observation=$observation;
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
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param mixed $action
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * @return mixed
     */
    public function getNomAction()
    {
        return $this->nom_action;
    }

    /**
     * @param mixed $nom_action
     */
    public function setNomAction($nom_action)
    {
        $this->nom_action = $nom_action;
    }

    /**
     * @return mixed
     */
    public function getTypeContact()
    {
        return $this->type_contact;
    }

    /**
     * @param mixed $type_contact
     */
    public function setTypeContact($type_contact)
    {
        $this->type_contact = $type_contact;
    }

    /**
     * @return mixed
     */
    public function getObjectif()
    {
        return $this->objectif;
    }

    /**
     * @param mixed $objectif
     */
    public function setObjectif($objectif)
    {
        $this->objectif = $objectif;
    }

    /**
     * @return mixed
     */
    public function getSuitDonner()
    {
        return $this->suit_donner;
    }

    /**
     * @param mixed $suit_donner
     */
    public function setSuitDonner($suit_donner)
    {
        $this->suit_donner = $suit_donner;
    }

    /**
     * @return mixed
     */
    public function getDateAction()
    {
        return $this->date_action;
    }

    /**
     * @param mixed $date_action
     */
    public function setDateAction($date_action)
    {
        $this->date_action = $date_action;
    }

    /**
     * @return mixed
     */
    public function getHeureAction()
    {
        return $this->heure_action;
    }

    /**
     * @param mixed $heure_action
     */
    public function setHeureAction($heure_action)
    {
        $this->heure_action = $heure_action;
    }

    /**
     * @return mixed
     */
    public function getCible()
    {
        return $this->cible;
    }

    /**
     * @param mixed $cible
     */
    public function setCible($cible)
    {
        $this->cible = $cible;
    }

    /**
     * @return mixed
     */
    public function getCiblePrevu()
    {
        return $this->cible_prevu;
    }

    /**
     * @param mixed $cible_prevu
     */
    public function setCiblePrevu($cible_prevu)
    {
        $this->cible_prevu = $cible_prevu;
    }

    /**
     * @return mixed
     */
    public function getCibleRealise()
    {
        return $this->cible_realise;
    }

    /**
     * @param mixed $cible_realise
     */
    public function setCibleRealise($cible_realise)
    {
        $this->cible_realise = $cible_realise;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * @param mixed $observation
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;
    }
    function add()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $reqindss = $bdd->prepare("INSERT INTO `actions`(`Action`, `nom`, `type`, `objectif`, `suit_donner`, `date_action`, `heure_action`, `cible`, `nbr_cible_prevu`, `nbr_cible_realise`, `observation`, `date_saisie`, `message`, `user`) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),?,?)");
        $param=(array($this->getAction(),$this->getNomAction(),$this->getTypeContact(),$this->getObjectif(),$this->getSuitDonner(),$this->getDateAction(),$this->getHeureAction(),$this->getCible(),$this->getCiblePrevu(),$this->getCibleRealise(),$this->getObservation(),$this->getMessage(),$_SESSION['user']['id']));
        if($reqindss->execute($param))
        {
            return json_encode(array('validation'=>true));
        }
        else
        {
            return json_encode(array('validation'=>false));
        }

    }
    function getlisteactions()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $reqindss = $bdd->query("select actions.*,users.nom as usernom,users.prenom from `actions` left join users on actions.user=users.id order by date_action desc");
        $values=$reqindss->fetchAll();
        $value="";
        $value.='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nom Action</th>
                                    <th>Type</th>
                                    <th>Commercial</th>
                                    <th>Objectif</th>
                                    <th>Suit Donner</th>
                                    <th>Date Action</th>
                                    <th>Heure Action</th>
                                    <th>Cible</th>
                                    <th>Nombre Cible Prevu</th>
                                    <th>Nombre Cible Réalise</th>
                                    <th>Message</th>
                                    <th>Observation</th>
                                </tr>
                                </thead>
                                <tbody>';
        foreach($values as $vlm)
        {
        
            $campagne=$vlm['nom'];
            if($vlm['type']=="Contact Indirect")
            {
                if($vlm['Action']=="Campagne")
                {
                $req = $bdd->query("select id, (
 CASE
      WHEN Campagne1 ='$campagne' THEN script1
      WHEN Campagne2 ='$campagne' THEN script2
      WHEN Campagne3 ='$campagne' THEN script3
      WHEN Campagne4 ='$campagne' THEN script4
      WHEN Campagne5 ='$campagne' THEN script5
      WHEN Campagne6 ='$campagne' THEN script6
      WHEN Campagne7 ='$campagne' THEN script7
      WHEN Campagne8 ='$campagne' THEN script8
      WHEN Campagne9 ='$campagne' THEN script9
      WHEN Campagne10 ='$campagne' THEN script10

        ELSE 1
    END) AS script from `contact_indirect` limit 0,1");
                }
            }
            else
            {
                 if($vlm['Action']=="Campagne")
                {
                $req = $bdd->query("select  id,(
 CASE
        WHEN Campagne1 ='$campagne' THEN script1
      WHEN Campagne2 ='$campagne' THEN script2
      WHEN Campagne3 ='$campagne' THEN script3
      WHEN Campagne4 ='$campagne' THEN script4
      WHEN Campagne5 ='$campagne' THEN script5
      WHEN Campagne6 ='$campagne' THEN script6
      WHEN Campagne7 ='$campagne' THEN script7
      WHEN Campagne8 ='$campagne' THEN script8
      WHEN Campagne9 ='$campagne' THEN script9
      WHEN Campagne10 ='$campagne' THEN script10
        ELSE 1
    END) AS script from `contact_direct` limit 0,1");
                }
            }
             if($vlm['Action']=="Campagne")
                {
            $req=$req->fetch();
                }
            if($vlm['Action']=="Campagne")
            {
                if($vlm['date_action']=="0000-00-00")
                {
                    $date="";
                }
                else
                {
                    $date=$vlm['date_action'];
                }
                if($vlm['heure_action']=="00:00:00")
                {
                    $heure="";
                }
                else
                {
                    $heure=$vlm['heure_action'];
                }
                $link="<a onclick=\" showscripts('".md5($vlm['id'])."') \">Lire la suite</a>";
                $value.="<tr>
                <td>".$vlm['Action']."</td>
                <td>".$vlm['nom']."</td>
                <td>".$vlm['type']."</td>
                <td>".$vlm['usernom']." ".$vlm['prenom']."</td>
                <td>".$vlm['objectif']."</td>
                <td>".$vlm['suit_donner']."</td>
                <td>".$date."</td>
                <td>".$heure."</td>
                <td>".$vlm['cible']."</td>
                <td>".$vlm['nbr_cible_prevu']."</td>
                <td>".$vlm['nbr_cible_realise']."</td>
                <td>".substr($req['script'],0,15)."...<br>".$link."<input value='".$req['script']."' type='hidden' id='id_".md5($vlm['id'])."'></td>";
                if(trim($vlm['observation'])!="")
                {
                    $value.= "<td>".$vlm['observation']."<br></td>
                    </tr>";
                }
                else
                {
                    $value.= "<td></td></tr>";
                }
            }
            else
            {
                $value.="<tr>
                <td>".$vlm['Action']."</td>
                <td>".$vlm['nom']."</td>
                <td>".$vlm['type']."</td>
                <td>".$vlm['usernom']." ".$vlm['prenom']."</td>
                <td>".$vlm['objectif']."</td>
                <td>".$vlm['suit_donner']."</td>
                <td>".$vlm['date_action']."</td>
                <td>".$vlm['heure_action']."</td>
                <td>".$vlm['cible']."</td>
                <td>".$vlm['nbr_cible_prevu']."</td>
                <td>".$vlm['nbr_cible_realise']."</td>
                <td>".$vlm['message']."</td>
                <td>".$vlm['observation']."</td>
</tr>";
            }

        }
        $value.="</tbody><tfoot>
                                <tr>
                                   <th>Action</th>
                                    <th>Nom Action</th>
                                    <th>Type</th>
                                    <th>Commercial</th>
                                    <th>Objectif</th>
                                    <th>Suit Donner</th>
                                    <th>Date Action</th>
                                    <th>Heure Action</th>
                                    <th>Cible</th>
                                    <th>Nombre Cible Prevu</th>
                                    <th>Nombre Cible Réalise</th>
                                    <th>Message</th>
                                    <th>Observation</th>
                                </tr>
                                </tfoot>
                            </table>";
        return $value;
    }
    function getlisteactions_byday()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $reqindss = $bdd->query("select actions.*,users.nom as usernom,users.prenom from `actions` left join users on actions.user=users.id where 	date_action=CURDATE() order by date_action desc");
        $values=$reqindss->fetchAll();
        $value="";
        $value.='<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nom Action</th>
                                    <th>Type</th>
                                    <th>Commercial</th>
                                    <th>Objectif</th>
                                    <th>Suit Donner</th>
                                    <th>Cible</th>
                                    <th>Nombre Cible Prevu</th>
                                    <th>Nombre Cible Réalise</th>
                                    <th>Message</th>
                                    <th>Observation</th>
                                </tr>
                                </thead>
                                <tbody>';
        foreach($values as $vlm)
        {
        
            $campagne=$vlm['nom'];
            if($vlm['type']=="Contact Indirect")
            {
                if($vlm['Action']=="Campagne")
                {
                $req = $bdd->query("select id, (
 CASE
      WHEN Campagne1 ='$campagne' THEN script1
      WHEN Campagne2 ='$campagne' THEN script2
      WHEN Campagne3 ='$campagne' THEN script3
      WHEN Campagne4 ='$campagne' THEN script4
      WHEN Campagne5 ='$campagne' THEN script5
      WHEN Campagne6 ='$campagne' THEN script6
      WHEN Campagne7 ='$campagne' THEN script7
      WHEN Campagne8 ='$campagne' THEN script8
      WHEN Campagne9 ='$campagne' THEN script9
      WHEN Campagne10 ='$campagne' THEN script10

        ELSE 1
    END) AS script from `contact_indirect` limit 0,1");
                }
            }
            else
            {
                 if($vlm['Action']=="Campagne")
                {
                $req = $bdd->query("select  id,(
 CASE
        WHEN Campagne1 ='$campagne' THEN script1
      WHEN Campagne2 ='$campagne' THEN script2
      WHEN Campagne3 ='$campagne' THEN script3
      WHEN Campagne4 ='$campagne' THEN script4
      WHEN Campagne5 ='$campagne' THEN script5
      WHEN Campagne6 ='$campagne' THEN script6
      WHEN Campagne7 ='$campagne' THEN script7
      WHEN Campagne8 ='$campagne' THEN script8
      WHEN Campagne9 ='$campagne' THEN script9
      WHEN Campagne10 ='$campagne' THEN script10
        ELSE 1
    END) AS script from `contact_direct` limit 0,1");
                }
            }
             if($vlm['Action']=="Campagne")
                {
            $req=$req->fetch();
                }
            if($vlm['Action']=="Campagne")
            {
            
                $link="<a onclick=\" showscripts('".md5($vlm['id'])."') \">Lire la suite</a>";
                $value.="<tr>
                <td>".$vlm['Action']."</td>
                <td>".$vlm['nom']."</td>
                <td>".$vlm['type']."</td>
                <td>".$vlm['usernom']." ".$vlm['prenom']."</td>
                <td>".$vlm['objectif']."</td>
                <td>".$vlm['suit_donner']."</td>
                <td>".$vlm['cible']."</td>
                <td>".$vlm['nbr_cible_prevu']."</td>
                <td>".$vlm['nbr_cible_realise']."</td>
                <td>".substr($req['script'],0,15)."...<br>".$link."<input value='".$req['script']."' type='hidden' id='id_".md5($vlm['id'])."'></td>";
                if(trim($vlm['observation'])!="")
                {
                    $value.= "<td>".$vlm['observation']."<br></td>
                    </tr>";
                }
                else
                {
                    $value.= "<td></td></tr>";
                }
            }
            else
            {
                $value.="<tr>
                <td>".$vlm['Action']."</td>
                <td>".$vlm['nom']."</td>
                <td>".$vlm['type']."</td>
                <td>".$vlm['usernom']." ".$vlm['prenom']."</td>
                <td>".$vlm['objectif']."</td>
                <td>".$vlm['suit_donner']."</td>
                <td>".$vlm['cible']."</td>
                <td>".$vlm['nbr_cible_prevu']."</td>
                <td>".$vlm['nbr_cible_realise']."</td>
                <td>".$vlm['message']."</td>
                <td>".$vlm['observation']."</td>
</tr>";
            }

        }
        $value.="</tbody><tfoot>
                                <tr>
                                   <th>Action</th>
                                    <th>Nom Action</th>
                                    <th>Type</th>
                                    <th>Commercial</th>
                                    <th>Objectif</th>
                                    <th>Suit Donner</th>
                                    <th>Cible</th>
                                    <th>Nombre Cible Prevu</th>
                                    <th>Nombre Cible Réalise</th>
                                    <th>Message</th>
                                    <th>Observation</th>
                                </tr>
                                </tfoot>
                            </table>";
        return $value;
    }
     function getbyaction()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $reqindss = $bdd->query("SELECT count(`id`),`nom` FROM `actions` where actions.date_action = CURDATE() group by `nom`");
        $values=$reqindss->fetchAll();
        $value="";
        $value.= '<table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Nombre des Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr><td colspan="2" align="center" style="background-color: #007ed7;color: white;font-size: 18px;" ><strong>' .date("d/m/Y").'</strong></td></tr>';
        foreach($values as $vlm)
        {
            $value.="<tr>
            <td>".$vlm[1]."</td>
            <td>".$vlm[0]."</td>
            </tr>";
        }
        $reqindss = $bdd->query("SELECT count(`id`),`nom` FROM `actions` where actions.date_action = CURDATE()-1 group by `nom`");
        $values=$reqindss->fetchAll();
        $value.= '<tr><td colspan="2" align="center" style="background-color: #007ed7;color: white;font-size: 18px;" ><strong>' .date("d/m/Y", time() - 60 * 60 * 24) .'</strong></td></tr>';
        foreach($values as $vlm)
        {
            $value.="<tr>
            <td>".$vlm[1]."</td>
            <td>".$vlm[0]."</td>
            </tr>";
        }
        $value.="</tbody><tfoot>
                                <tr>
                                    <th>Action</th>
                                    <th>Nombre des Actions</th>
                                </tr>
                                </tfoot>
                            </table>";
        return $value;
    }
}