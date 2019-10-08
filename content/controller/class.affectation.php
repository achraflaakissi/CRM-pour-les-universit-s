<?php

class affectation{

	private $ID;
	private $AGENT;
	private $CAMPAGNE;
	private $TIME;
	private $ADMIN;

	

	public function __construct(array $donnees){

			$this->hydrate($donnees);
	}



	public function hydrate(array $donnees){

		  foreach ($donnees as $key => $value)
		  {

		    $method = 'set'.strtoupper($key);
		        
		   
		    if (method_exists($this, $method))
		    {
		    
		      $this->$method($value);
		    }
		  }
	}

	public function setID($id){
		$this->ID=$id;
	}

	public function setAGENT($agent){
		$this->AGENT=$agent;
	}

	public function setCAMPAGNE($campagne){
		$this->CAMPAGNE=$campagne;
	}

	public function setTIME($time){
		if($time!=NULL OR $time!="")
				$this->TIME=$time;
		else
				$this->TIME=date('Y-m-d H:i:s');
	}

	public function setADMIN($admin){
		$this->ADMIN=$admin;
	}

	

	public function getId(){
		return $this->ID;
	}
	public function getAgent(){
		return $this->AGENT;
	}
	public function getCAMPAGNE(){
		return $this->CAMPAGNE;
	}
	public function getTIME(){
		return $this->TIME;
	}
	public function getADMIN(){
		return $this->ADMIN;
	}



	function getParamdb(){
	$class_var=get_class_vars(get_called_class());
			foreach ($class_var as $key => $value) {
				
			     $method = 'get'.ucfirst($key);		        
		   
			    if (method_exists($this, $method))
			    {
			    
			      $param[':'.$key]=$this->$method($value);
			    }

			 
			}

  return $param;
}

	

 

static function add($agent,$campagne){
		

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("INSERT INTO `affectation` (campagne, agent, time, admin) VALUES (:campagne, :agent, CURRENT_TIMESTAMP , :admin)");

			$param=array("agent"=>$agent,"campagne"=>$campagne,"admin"=>$_SESSION['user']['id']);

                //$this->getParamdb();
			//array_splice($param,0,1);

			
			if($req->execute($param)){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Enregistrement reussi</div>'));
				

			}

}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

}



function edit(){

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("UPDATE  `affectation` SET campagne=IF(:CAMPAGNE!=NULL OR :CAMPAGNE!='',:CAMPAGNE,campagne), agent=IF(:AGENT != NULL OR :AGENT!='',:AGENT,agent), admin=IF(:ADMIN != NULL OR :ADMIN!='',:ADMIN,admin) WHERE id=:ID");

			$param=$this->getParamdb();
			unset($param[':TIME']);

			if($req->execute($param)){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Modification reussi</div>'));
				

			}else
				return 'ko';

}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

}

static function delete($arg){


		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("DELETE  FROM `affectation`  WHERE ID=:ID");

			//$param=$this->getParamdb();
		
	
			if($req->execute(array(':ID'=>$arg))){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Suppression reussi</div>'));
				

			}

}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

}


function persist(){

		if($this->isNew())
		return	$this->add();
		else
		return $this->edit();

}

function desactivate(){
	$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("UPDATE   `users` SET ACTIVATION=:ACTIVATION WHERE ID=:ID");

			$param=$this->getParamdb();
		
	
			if($req->execute(array(':ID'=>$param[':ID']))){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Suppression reussi</div>'));
				

			}

}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}
}




    static function listeagents($campagne){


        try {
            include('content/config.php');
            $agentsList="";
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("SELECT id, nom, prenom FROM users WHERE ID NOT IN(SELECT agent FROM affectation WHERE campagne=:id) and profile='agent' ");

            if($req->execute(array(':id'=>$campagne))){
                while ($row= $req->fetch()) {
                    //$user = new user($row);
                    $agentsList .='<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
                }


                $agentsList='<option value="na">---</option>'.$agentsList;

                return json_encode(array('validation'=>true, 'list'=>$agentsList));


            }

        }

        catch(Exception $e)

        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }


    static function mescampagnes(){


        try {
            include('content/config.php');
            $campagneslist="";
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("select id,title,description,creationtime,(select libelle from typecampagne where typecampagne.id=campagnes.type ) as tp from campagnes where campagnes.id in ( select campagne from affectation where agent=:agent ) and campagnes.activation=1");

            if($req->execute(array(':agent'=>$_SESSION['user']['id']))){
                while ($row= $req->fetch()) {

                    $campagneslist .='<a href="./?page=campagne&amp;cid='.$row['id'].'" class="list-group-item push-up-10">
                                        <span class="contacts-title"><strong>'.$row['title'].'</strong></span>
                                        <p>'.$row['description'].'</p>
                                        <span class="label label-default">'.$row['tp'].'</span>

                                        <div class="list-group-controls"  >
                                            <!--<button data-id="'.$row['id'].'" class="btn btn-primary btn-condensed "><span class="fa fa-play"></span> Démarrer</button>-->
                                        </div>

                                    </a>';
                }


                return json_encode(array('validation'=>true, 'list'=>$campagneslist));


            }

        }

        catch(Exception $e)

        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }


}


?>