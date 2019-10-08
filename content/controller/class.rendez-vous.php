<?php
/**
 * Created by PhpStorm.
 * User: AChraf
 * Date: 30/01/2017
 * Time: 19:10
 */
class RendezVous
{
    private $date;
    private $heure;
    private $user;
    private $id_contact;
    private $type_contact;
    private $rdv_effectuer;
    private $inscription_rdv;
    private $date_saisie;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }
    /**
     * @return mixed
     */
    public function getInscription_rdv()
    {
        return $this->inscription_rdv;
    }

    /**
     * @param mixed $date
     */
    public function setInscription_rdv($inscription_rdv)
    {
        $this->inscription_rdv = $inscription_rdv;
    }
    /**
     * @return mixed
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * @param mixed $heure
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getIdContact()
    {
        return $this->id_contact;
    }

    /**
     * @param mixed $id_contact
     */
    public function setIdContact($id_contact)
    {
        $this->id_contact = $id_contact;
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
    public function getRdvEffectuer()
    {
        return $this->rdv_effectuer;
    }

    /**
     * @param mixed $rdv_effectuer
     */
    public function setRdvEffectuer($rdv_effectuer)
    {
        $this->rdv_effectuer = $rdv_effectuer;
    }

    /**
     * @return mixed
     */
    public function getDateSaisie()
    {
        return $this->date_saisie;
    }

    /**
     * @param mixed $date_saisie
     */
    public function setDateSaisie($date_saisie)
    {
        $this->date_saisie = $date_saisie;
    }
    public function createrdv()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        if($this->getInscription_rdv()==1)
        {
             $reqe = $bdd->prepare("INSERT INTO `rendez_vous`( `date`, `heure`, `user`, `id_contact`,type_rendez_vous, `type_contact`,inscription_rdv)VALUES(?,?,?,?,'Inscription',?,?) ");
            try {
                $param = array($this->getDate(),$this->getHeure(),$this->getUser(),$this->getIdContact(),$this->getTypeContact(),$this->getInscription_rdv());
                if($reqe->execute($param))
                {
                    return json_encode(array('validation'=>true, 'message'=>"Opération effectuée avec succès …"));
                }
                else
                {
                    return json_encode(array('validation'=>false, 'message'=>"Erreur Merci de contacter le support"));
                }
            }
    
            catch(Exception $e)
    
            {
                die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
            }
        }
        else
        {
            $reqe = $bdd->prepare("INSERT INTO `rendez_vous`( `date`, `heure`, `user`, `id_contact`, `type_contact`,type_rendez_vous)VALUES(?,?,?,?,?,?) ");
            try {
                $param = array($this->getDate(),$this->getHeure(),$this->getUser(),$this->getIdContact(),$this->getTypeContact(),$this->getInscription_rdv());
                if($reqe->execute($param))
                {
                    return json_encode(array('validation'=>true, 'message'=>"Opération effectuée avec succès …"));
                }
                else
                {
                    return json_encode(array('validation'=>false, 'message'=>"Erreur Merci de contacter le support"));
                }
            }
    
            catch(Exception $e)
    
            {
                die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
            }
        }
       
    }
    public function listrdv()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try {
            $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_direct.id,contact_direct.nom as 'nom_contact',
contact_direct.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_direct on rendez_vous.`id_contact`=md5(contact_direct.id)
 WHERE `rdv_effectuer`=0 and users.id is not null and contact_direct.id is not null order by date");
            while($donner=$req->fetch())
            {
                $date = new DateTime($donner['heure']);
                $date1 = new DateTime($donner['date_saisie']);
                $date=$date->format("H:i");
                $date1=$date1->format("d/m/Y H:i");
                $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=rendez_vous&rdv='.md5($donner['id_rdv']).'\'" >
                        <td> Contact Direct </td>
                        <td> '.$donner['nom_contact'].' '.$donner['prenom_contact'].' </td>
                        <td> '.$donner['date'].' </td>
                        <td> '.$date.' </td>
                        <td> '.$donner['nom'].' '.$donner['prenom'].' </td>
                        <td> '.$donner['type_contact'].' </td>
                        <td> '.$date1.' </td>
                    </tr>';
            }
            $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_indirect.id,contact_indirect.nom as 'nom_contact',
contact_indirect.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_indirect on rendez_vous.`id_contact`=md5(contact_indirect.id)
 WHERE `rdv_effectuer`=0 and users.id is not null and contact_indirect.id is not null order by date");
            while($donner=$req->fetch())
            {
                $date = new DateTime($donner['heure']);
                $date1 = new DateTime($donner['date_saisie']);
                $date=$date->format("H:i");
                $date1=$date1->format("d/m/Y H:i");
                $valeur.= '
                    <tr onclick="window.location=\''.$location.'?page=rendez_vous&id='.md5($donner['id_rdv']).'\'" >
                        <td> Contact Direct </td>
                        <td> '.$donner['nom_contact'].' '.$donner['prenom_contact'].' </td>
                        <td> '.$donner['date'].' </td>
                        <td> '.$date.' </td>
                        <td> '.$donner['nom'].' '.$donner['prenom'].' </td>
                        <td> '.$donner['type_contact'].' </td>
                        <td> '.$date1.' </td>
                    </tr>';
            }
        }

        catch(Exception $e)

        {
            die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
        }
        return $valeur;
    }
    public function rdvbyid($id)
    {
        include('content/config.php');
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        $remplir=$remplir->getFunctions('getcommercial');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try {
            $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_direct.id,contact_direct.nom as 'nom_contact',
contact_direct.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_direct on rendez_vous.`id_contact`=md5(contact_direct.id)
 WHERE `rdv_effectuer`=0 and users.id is not null and md5(rendez_vous.id)='$id' and contact_direct.id is not null order by date");
            if($req->rowCount()>0)
            {
                while($donner=$req->fetch())
                {

                    $date = new DateTime($donner['heure']);
                    $date1 = new DateTime($donner['date_saisie']);
                    $date=$date->format("H:i");
                    $date1=$date1->format("d/m/Y H:i");
                    $valeur.= '
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Contact</label>
                                  <input type="text" value="'.$donner['nom_contact'].' '.$donner['prenom_contact'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="text" value="'.$donner['date'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Heure</label>
                                  <input type="text" value="'.$date.'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Agent</label>
                                  <input type="text" value="'.$donner['nom'].' '.$donner['prenom'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Commercial</label>
                                  <select  class="form-control" id="commercial">
                                        <option value=""></option>
                                        '.$remplir.'
                                  </select>
                            </div>
                            <textarea name="observation" id="observation" rows="5" style="width:100%;">
                            </textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" onclick="affeccterrdv(\'Effectué\',\''.md5($donner['id_rdv']).'\')" class="btn btn-success">Rendez-Vous Effectué</button>
                            <button type="submit" onclick="affeccterrdv(\'NonEffectué\',\''.md5($donner['id_rdv']).'\' )" class="btn btn-danger pull-right">Rendez-Vous Non Effectué</button>
                        </div>
                    </div>
                    ';
                }
            }
            else
            {
                $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_indirect.id,contact_indirect.nom as 'nom_contact',
contact_indirect.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_indirect on rendez_vous.`id_contact`=md5(contact_indirect.id)
 WHERE `rdv_effectuer`=0 and md5(rendez_vous.id)='$id' and users.id is not null and contact_indirect.id is not null order by date");
                while($donner=$req->fetch())
                {
                    $date = new DateTime($donner['heure']);
                    $date1 = new DateTime($donner['date_saisie']);
                    $date=$date->format("H:i");
                    $date1=$date1->format("d/m/Y H:i");
                    $valeur.= '
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Contact</label>
                                  <input type="text" value="'.$donner['nom_contact'].' '.$donner['prenom_contact'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Date</label>
                                  <input type="text" value="'.$donner['date'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Heure</label>
                                  <input type="text" value="'.$date.'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Agent</label>
                                  <input type="text" value="'.$donner['nom'].' '.$donner['prenom'].'" class="form-control" readonly id="exampleInputEmail1">
                            </div>
                            <div class="form-group">
                                  <label for="exampleInputEmail1">Commercial</label>
                                  <select  class="form-control" id="commercial">
                                        <option value=""></option>
                                        '.$remplir.'
                                  </select>
                            </div>
                            <textarea name="observation" id="observation" rows="5" style="width:100%;">
                            </textarea>
                        </div>
                        <div class="box-footer">
                            <button type="submit" onclick="affeccterrdv(\'Effectué\',\''.md5($donner['id_rdv']).'\')" class="btn btn-success">Rendez-Vous Effectué</button>
                            <button type="submit" onclick="affeccterrdv(\'NonEffectué\',\''.md5($donner['id_rdv']).'\' )" class="btn btn-danger pull-right">Rendez-Vous Non Effectué</button>
                        </div>
                    </div>
                    ';
                }
            }

        }

        catch(Exception $e)

        {
            die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
        }
        return $valeur;
    }
    public function effectuerrdv($id,$type,$observation,$commercial)
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $reqe = $bdd->prepare("update `rendez_vous` set rdv_effectuer=?,observation=?,commercial=? where md5(id)=?");
        try {
            $param = array($type,$observation,$commercial,$id);
            if($reqe->execute($param))
            {
                return json_encode(array('validation'=>true, 'message'=>"Opération effectuée avec succès …",'url'=>$location));
            }
        }

        catch(Exception $e)

        {
            die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
        }
    }
     function get_rendez_vous_current_date_by_user()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $requ=$bdd->query("SELECT rv.*,concat(u.Nom,' ',u.Prenom) as nom_user FROM `rendez_vous` rv left join users u on u.id=rv.`user` where date=CURDATE() and rv.user=".$_SESSION['user']['id']);
        $data_global="<table class='table table-bordered'><tr><th>Date</th><th>Utilisateur</th><th>Contact</th><th>Contact type</th><th>Type</th><th>Observation</th></tr>";
		while($donner=$requ->fetch())
		{
		    if($donner['type_contact']=="from_search")
		    {
		        $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
	            $contact=$req->fetch();
	            $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
		    }
		    else
		    {
    			$req=$bdd->query("SELECT * FROM `listcampagne` WHERE `Campagne1`='".$donner['type_contact']."'");
    			if($req->rowCount()>0)
    			{
    			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Indirect' as contact_type FROM `contact_indirect` WHERE md5(id)='".$donner['id_contact']."'");
    			    $contact=$req->fetch();
    			    $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
		    	}
    			else
    			{
    		    	$req=$bdd->query("SELECT * FROM `listcmpclt` WHERE `Campagne1`='".$donner['type_contact']."'");
        			if($req->rowCount()>0)
        			{
        			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Indirect' as contact_type FROM `contact_indirect` WHERE md5(id)='".$donner['id_contact']."'");
    		            $contact=$req->fetch();
    			        $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
        			}
        			else
        			{
        			    $req=$bdd->query("SELECT * FROM `listcampagnedir` WHERE `Campagne1`='".$donner['type_contact']."'");
            			if($req->rowCount()>0)
            			{
            			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
    			            $contact=$req->fetch();
    			            $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
            			}
            			else
            			{
                			$req=$bdd->query("SELECT * FROM `listcmpcltdir` WHERE `Campagne1`='".$donner['type_contact']."'");
                			if($req->rowCount()>0)
                			{
                			    $req=$bdd->query("SELECT concat(Nom,' ',Prenom) as contact,'Contact Direct' as contact_type FROM `contact_direct` WHERE md5(id)='".$donner['id_contact']."'");
    			                $contact=$req->fetch();
    			                $data_global.="<tr><td>".$donner['date']."</td><td>".$donner['nom_user']."</td><td>".$contact[0]."</td><td>".$contact[1]."</td><td>".$donner['type_rendez_vous']."</td><td>".$donner['observation']."</td></tr>";
                			}
            			}
        			}
        			
    			}
		    }
		}
        $remplire=new rempliration();
        $RendezVousauto=$remplire->get_rendez_vous_current_auto_user();
        $data_global.=$RendezVousauto;
        $data_global.="</table>";
        return ($data_global); 
    }
    public function listrdveft()
    {
        include('content/config.php');
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $valeur="";
        $i=0;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        try {
            $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_direct.id,contact_direct.nom as 'nom_contact',
contact_direct.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_direct on rendez_vous.`id_contact`=md5(contact_direct.id)
 WHERE `rdv_effectuer`<>0 and users.id is not null and contact_direct.id is not null order by date");
            while($donner=$req->fetch())
            {
                $i++;
                $date = new DateTime($donner['heure']);
                $date1 = new DateTime($donner['date_saisie']);
                $date=$date->format("H:i");
                $date1=$date1->format("d/m/Y H:i");
                if($donner['rdv_effectuer']==1)
                {
                    $var="Effectué";
                }
                else
                {
                    $var="Non Effectué";
                }
                $valeur.= '
                    <tr onclick="showmymodal('.$i.');" >
                        <input type="hidden" id="observation'.$i.'" value="'.$donner['observation'].'" />
                        <input type="hidden" id="date_saisie'.$i.'" value="'.$donner['date_saisie'].'" />
                        <input type="hidden" id="nom_contact'.$i.'" value="'.$donner['nom_contact'].' '.$donner['prenom_contact'].'" />
                        <input type="hidden" id="date'.$i.'" value="'.$donner['date'].'" />
                        <input type="hidden" id="heure'.$i.'" value="'.$date.'" />
                        <input type="hidden" id="rdv_effectuer'.$i.'" value="'.$var.'" />
                        <input type="hidden" id="commercial'.$i.'" value="'.$donner['commercial'].'" />
                        <input type="hidden" id="type_contact'.$i.'" value="'.$donner['type_contact'].'" />
                        <input type="hidden" id="contact'.$i.'" value="Contact Direct" />
                        <td> Contact Direct </td>
                        <td> '.$donner['nom_contact'].' '.$donner['prenom_contact'].' </td>
                        <td> '.$donner['date'].' </td>
                        <td> '.$date.' </td>
                        <td> '.$var.' </td>
                        <td> '.$donner['nom'].' '.$donner['prenom'].' </td>
                        <td> '.$donner['commercial'].' </td>
                        <td> '.$donner['type_contact'].' </td>
                    </tr>';
            }
            $req = $bdd->query("SELECT rendez_vous.*,rendez_vous.id as 'id_rdv',users.nom,users.prenom,users.id,contact_indirect.id,contact_indirect.nom as 'nom_contact',
contact_indirect.prenom  as 'prenom_contact' FROM `rendez_vous`
 left join users on rendez_vous.`user`=users.id
 left join contact_indirect on rendez_vous.`id_contact`=md5(contact_indirect.id)
 WHERE `rdv_effectuer`<>0 and users.id is not null and contact_indirect.id is not null order by date");
            while($donner=$req->fetch())
            {
                $i++;
                $date = new DateTime($donner['heure']);
                $date1 = new DateTime($donner['date_saisie']);
                $date=$date->format("H:i");
                $date1=$date1->format("d/m/Y H:i");
                if($donner['rdv_effectuer']==1)
                {
                    $var="Effectué";
                }
                else
                {
                    $var="Non Effectué";
                }
                $valeur.= '
                    <tr onclick="showmymodal('.$i.');" >
                        <input type="hidden" id="observation" value="'.$donner['observation'].'" />
                        <input type="hidden" id="date_saisie" value="'.$donner['date_saisie'].'" />
                        <input type="hidden" id="nom_contact" value="'.$donner['nom_contact'].' '.$donner['prenom_contact'].'" />
                        <input type="hidden" id="date" value="'.$donner['date_saisie'].'" />
                        <input type="hidden" id="heure" value="'.$date.'" />
                        <input type="hidden" id="rdv_effectuer" value="'.$var.'" />
                        <input type="hidden" id="commercial" value="'.$donner['commercial'].'" />
                        <input type="hidden" id="type_contact" value="'.$donner['type_contact'].'" />
                        <input type="hidden" id="contact" value="Contact Direct" />
                        <td> Contact Direct </td>
                        <td> '.$donner['nom_contact'].' '.$donner['prenom_contact'].' </td>
                        <td> '.$donner['date'].' </td>
                        <td> '.$date.' </td>
                        <td> '.$var.' </td>
                        <td> '.$donner['nom'].' '.$donner['prenom'].' </td>
                        <td> '.$donner['commercial'].' </td>
                        <td> '.$donner['type_contact'].' </td>
                    </tr>';
            }
        }

        catch(Exception $e)

        {
            die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
        }
        return $valeur;
    }
}