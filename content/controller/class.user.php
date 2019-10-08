<?php

class user{
	CONST target_dir = "data/users/photos/";
	private $ID;
	private $NOM;
	private $PRENOM;
	private $EMAIL;
	private $PROFILE;
	private $LOGIN;
	private $PASSWORD;
	private $ACTIVATION;
	private $PHOTO;
	

	public function __construct(array $donnees){

		$this->hydrate($donnees);
	}



	public function hydrate(array $donnees){

		foreach ($donnees as $key => $value)
		{

			$method = 'set'.$key;


			if (method_exists($this, $method))
			{

				$this->$method($value);
			}
		}
	}

	public function setID($id){
		$this->ID=$id;
	}

	public function setNOM($nom){
		$this->NOM=$nom;
	}

	public function setPRENOM($prenom){
		$this->PRENOM=$prenom;
	}

	public function setEMAIL($email){
		$this->EMAIL=$email;
	}

	public function setPROFILE($profile){
		$this->PROFILE=$profile;
	}

	public function setLOGIN($login){
		$this->LOGIN=$login;
	}
	public function setPASSWORD($pwd){
		$this->PASSWORD=$pwd;
	}

	public function setACTIVATION($activation){
		$this->ACTIVATION=$activation;
	}

	public function setPHOTO($photo){
		if(!is_array($photo))
			$this->PHOTO= $photo;
		else
			$this->PHOTO=new file($photo);
	}

	public function getID(){
		return $this->ID;
	}
	public function getNOM(){
		return $this->NOM;
	}
	public function getPRENOM(){
		return $this->PRENOM;
	}
	public function getEMAIL(){
		return $this->EMAIL;
	}
	public function getPROFILE(){
		return $this->PROFILE;
	}
	public function getLOGIN(){
		return $this->LOGIN;
	}
	public function getPASSWORD(){
		return $this->PASSWORD;
	}
	public function getACTIVATION(){
		return $this->ACTIVATION;
	}

	public function getPHOTO(){
		if(is_string($this->PHOTO)){
			if($this->PHOTO=="")
				return "img/assets/no-image.jpg";

			else{
				if(file_exists(user::target_dir.$this->PHOTO))

					return user::target_dir.$this->PHOTO;
				else
					return "img/assets/no-image.jpg";

			}
		}else
		return $this->PHOTO!=NULL?$this->PHOTO->getName():"";
	}


	public function getPhotoObjet(){
		return $this->PHOTO;
	}

	public function isNew(){

		return !$this->getID();
	}

	public function imageExist(){
		if (file_exists($this->getPHOTO())) {
			return true;
		}
	}

/*
	public function __get($name) {

		return $this->$name;

	}*/

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

	static function liste() {


		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select ID, NOM, PRENOM, EMAIL, PROFILE, LOGIN, PASSWORD, ACTIVATION, PHOTO from users");

			$req->execute();


			$liste="";
			$img="";
			$checked='';

			if ($req->rowCount()>0) {

				while ($donnees = $req->fetch())

				{

					$user= new user($donnees);


					if($user->getACTIVATION()==1){
						$checked='checked=""';
					}else{
						$checked='';
					}
					

					$liste.=' <span class="list-group-item">
					<img src="'.$user->getPHOTO().'" class="pull-left" alt="'.$user->getPRENOM().' '.$user->getNOM().'">
					<span class="contacts-title">'.$user->getPRENOM().' '.$user->getNOM().' <sup>[ '.$user->getLOGIN().' ]</sup></span>
					<p><span class="label label-primary">'.$user->getPROFILE().'</span> '.$user->getEMAIL().'</p>

					<div class="list-group-controls" hidden-nom="'.$user->getNOM().'" hidden-prenom="'.$user->getPRENOM().'" hidden-email="'.$user->getEMAIL().'" hidden-role="'.$user->getPROFILE().'" hidden-login="'.$user->getLOGIN().'" hidden-password="'.$user->getPASSWORD().'" hidden-activation="'.$user->getACTIVATION().'"  >
						<button data-id="'.$user->getId().'" class="btn btn-warning btn-edit-user"><span class="fa fa-pencil"></span> Modifier</button>
						<button data-id="'.$user->getId().'" class="btn btn-danger btn-delete-user"><span class="fa fa-trash-o"></span> Supprimer</button>
					</div></span> ';

				}

				return $liste;

			}else{

				return  json_encode(array('validation'=>true, 'message'=>'La liste des utilisateurs est vide !'));

			}

		}

		catch(Exception $e)

		{
			die(json_encode(array('validation'=>true, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
		}


	}

	static function findOne($arg) {


		try {
			include('content/config.php');



			$sql="";
			
			if($arg!=NULL && $arg!=""){
				$sql.=" AND (NOM LIKE '%".$arg."%' OR PRENOM LIKE '%".$arg."%' OR EMAIL LIKE '%".$arg."%' OR LOGIN LIKE '%".$arg."%')";
			}

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select ID, NOM, PRENOM, EMAIL, PROFILE, LOGIN, PASSWORD, ACTIVATION, PHOTO from users WHERE 1=1 ".$sql."");


			$req->execute();


			$liste="";
			$img="";
			$checked='';

			if ($req->rowCount()>0) {

				while ($donnees = $req->fetch())

				{

					$user= new user($donnees);

				
					if($user->getActivation()==1){
						$checked='checked=""';
					}else{
						$checked='';
					}
					

					$liste.='
 					<span class="list-group-item">
						<img src="'.$user->getPHOTO().'" class="pull-left" alt="'.$user->getPRENOM().' '.$user->getNOM().'"/>
						<span class="contacts-title">'.$user->getPRENOM().' '.$user->getNOM().'
							<sup>[ '.$user->getLOGIN().' ]</sup>
						</span>
						<p>
							<span class="label label-primary">'.$user->getPROFILE().'</span> '.$user->getEMAIL().'
						</p>

						<div class="list-group-controls" hidden-nom="'.$user->getNOM().'" hidden-prenom="'.$user->getPRENOM().'" hidden-email="'.$user->getEMAIL().'" hidden-role="'.$user->getPROFILE().'" hidden-login="'.$user->getLOGIN().'" hidden-password="'.$user->getPASSWORD().'" hidden-activation="'.$user->getACTIVATION().'"  >
							<button data-id="'.$user->getId().'" class="btn btn-warning btn-edit-user">
								<span class="fa fa-pencil"></span> Modifier
							</button>
							<button data-id="'.$user->getId().'" class="btn btn-danger btn-delete-user">
								<span class="fa fa-trash-o"></span> Supprimer
							</button>
						</div>
					</span>';
				}

				return json_encode(array('validation'=>true, 'list'=>$liste));


			}else{

				return json_encode(array('validation'=>true, 'message'=>'Aucun utilisateur n&#39; a &#233;t&#233; trouv&#233;  !'));

			}

		}

		catch(Exception $e)

		{
			die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
		}


	}



	static function profils() {


		try {
			include('content/config.php');



			$sql="";
			


			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select code,libelle from profils");

			$req->execute();


			$liste="";


			if ($req->rowCount()>0) {

				while ($donnees = $req->fetch())

				{

					$user= new user($donnees);

					$liste.='<option value="'.$donnees['code'].'">'.$donnees['libelle'].'</option>';

				}

				return '<select class="form-control "><option></option>'.$liste.'</select>';

			}else{

				return json_encode(array('validation'=>true, 'message'=>'Aucun profil n&#39; a &#233;t&#233; trouv&#233;  !'));

			}

		}

		catch(Exception $e)

		{
			die(json_encode(array('validation'=>flase, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
		}


	}


	function add(){
		

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("INSERT INTO `users` (NOM, PRENOM, EMAIL, PROFILE, LOGIN, PASSWORD, ACTIVATION, PHOTO) VALUES (:NOM, :PRENOM, :EMAIL, :PROFILE, :LOGIN, :PASSWORD, :ACTIVATION, :PHOTO);");

			$param=$this->getParamdb();
			array_splice($param,0,1);


			if(count($param[':photo'])>0)
				$this->getPhotoObjet()->upload();



			if($req->execute($param)){

				return json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-success">Enregistrement reussi !</div>'));
				

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
			$req = $bdd->prepare("UPDATE  `users` SET NOM=IF(:NOM!=NULL OR :NOM!='',:NOM,NOM), PRENOM=IF(:PRENOM != NULL OR :PRENOM!='',:PRENOM,PRENOM), EMAIL=IF(:EMAIL != NULL OR :EMAIL!='',:EMAIL,EMAIL), PROFILE=IF(:PROFILE != NULL OR :PROFILE!='',:PROFILE,PROFILE), LOGIN=IF(:LOGIN != NULL OR :LOGIN!='',:LOGIN,LOGIN), PASSWORD=IF(:PASSWORD != NULL OR :PASSWORD!='',:PASSWORD,PASSWORD), ACTIVATION=IF(:ACTIVATION != NULL OR :ACTIVATION!='',:ACTIVATION,ACTIVATION), PHOTO=IF(:PHOTO != NULL OR :PHOTO!='',:PHOTO,PHOTO) WHERE ID=:ID");

			$param=$this->getParamdb();
			

			if(count($param[':photo'])>0)
				return  $this->getPhotoObjet()->upload();

			if($req->execute($param)){
				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Modification reussi</div>'));
			}

		}

		catch(Exception $e)

		{

			die(json_encode(array('validation'=>flase, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
		}

	}

	function delete(){

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("DELETE  FROM `users`  WHERE ID=:ID");

			$param=$this->getParamdb();


			if($req->execute(array(':ID'=>$param[':ID']))){

                $req2 = $bdd->prepare("DELETE  FROM `affectation`  WHERE agent=:ID");

                if($req2->execute(array(':ID'=>$param[':ID']))){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Suppression reussi</div>'));

                }

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


}


?>