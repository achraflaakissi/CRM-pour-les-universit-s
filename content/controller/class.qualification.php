<?php

class qualification{
	
	private $ID;
	private $CAMPAGNE;
	private $LIBELLE;
	private $USER;
	private $TIME;

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



	public function getID(){
		return $this->ID;
	}

	public function setID($ID){
		$this->ID = $ID;
	}

	public function getCAMPAGNE(){
		return $this->CAMPAGNE;
	}

	public function setCAMPAGNE($CAMPAGNE){
		$this->CAMPAGNE = $CAMPAGNE;
	}

	public function getLIBELLE(){
		return $this->LIBELLE;
	}

	public function setLIBELLE($LIBELLE){
		$this->LIBELLE = $LIBELLE;
	}

	public function getUSER(){
		return $this->USER;
	}

	public function setUSER($USER){
		$this->USER = $USER;
	}

	public function getTIME(){
		return $this->TIME;
	}

	public function setTIME($TIME){

		$this->TIME = $TIME;
	}


	function getParamdb(){
	$class_var=get_class_vars(get_called_class());
			foreach ($class_var as $key => $value) {
				
			     $method = 'get'.$key;	

		   
			    if (method_exists($this, $method))
			    {
			    
			      $param[':'.$key]=$this->$method($value);
			    }

			 
			}

	  return $param;
	}


	public function add(){
		try {
			include('content/config.php');
			$param=[];
			$param=$this->getParamdb();
			$param[':TIME']= date('Y-m-d H:i:s');
		
			array_splice($param,0,1);
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("SELECT count(*) as count FROM campagnes WHERE id=:CAMPAGNE");
			$req->execute(array(':CAMPAGNE'=>$param[':CAMPAGNE']));
			$campagne_c=$req->fetch(PDO::FETCH_ASSOC);

			if($campagne_c['count']>0){
				$req = $bdd->prepare("INSERT INTO qualification (campagne, libelle,user,time) VALUES(:CAMPAGNE, :LIBELLE,:USER,:TIME)");
				
			$req->execute($param);
				return json_encode(array('validation'=>true));
			}else{
			
				return json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-success">Campagne introuvable</div>'));
			}

				

}
	
	catch(Exception $e)

	{
		
		die(json_encode(array('validation'=>false, 'message'=>'Erreur : '.$e->getMessage().' Merci de contacter le support')));
	}
	}


static	public function delete($id){
		try {
			include('content/config.php');
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("SELECT count(*) as count FROM qualification WHERE id=:id");
			$req->execute(array(':id'=>$id));
			$qualification_c=$req->fetch(PDO::FETCH_ASSOC);

			if($qualification_c['count']>0){
				$req = $bdd->prepare("DELETE FROM  qualification WHERE id=:id");
				
			$req->execute(array(':id'=>$id));
				return json_encode(array('validation'=>true));
			}else{
			
				return json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-success">Qualification introuvable</div>'));
			}

				

}
	
	catch(Exception $e)

	{
		
		die(json_encode(array('validation'=>false, 'message'=>'Erreur : '.$e->getMessage().' Merci de contacter le support')));
	}
	}

static	public function load($campagne){
		try {
			include('content/config.php');
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("SELECT count(*) as count FROM campagnes WHERE id=:CAMPAGNE");
			$req->execute(array(':CAMPAGNE'=>$campagne));
			$campagne_c=$req->fetch(PDO::FETCH_ASSOC);

			if($campagne_c['count']>0){
				$req = $bdd->prepare("SELECT id,campagne,libelle,user,time FROM qualification WHERE campagne=:campagne");				
			   $req->execute(array(':campagne'=>$campagne));
			   $list=$req->fetchAll(PDO::FETCH_ASSOC);
				return json_encode(array('validation'=>true,'list'=>$list));
			}else{
			
				return json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-success">Campagne introuvable</div>'));
			}

				

}
	
	catch(Exception $e)

	{
		
		die(json_encode(array('validation'=>false, 'message'=>'Erreur : '.$e->getMessage().' Merci de contacter le support')));
	}
	}
}
?>