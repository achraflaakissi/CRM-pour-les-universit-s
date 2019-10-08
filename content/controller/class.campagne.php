<?php

class campagne{
	
	private $ID;
	private $TITLE;
	private $DESCRIPTION;
	private $CREATIONTIME;
	private $UPDATETIME;
	private $CREATIONUSER;
	private $ACTIVATION;
	private $PROGRESSION;
    private $TYPE;


	

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

	public function setTITLE($title){
		$this->TITLE=$title;
	}

	public function setDESCRIPTION($description){
		$this->DESCRIPTION=$description;
	}

	public function setCREATIONTIME($creationtime){
		if($creationtime!=NULL OR $creationtime!="")
				$this->CREATIONTIME=$creationtime;
		else
				$this->CREATIONTIME=date('Y-m-d H:i:s');
	}

	public function setUPDATETIME($updatetime){
		if($updatetime!=NULL OR $updatetime!="")
				$this->UPDATETIME=$updatetime;
		else
				$this->UPDATETIME=date('Y-m-d H:i:s');
	}

	public function setCREATIONUSER($creationuser){
		$this->CREATIONUSER=$creationuser;
	}

	public function setACTIVATION($activation){
		$this->ACTIVATION=$activation;
	}

	public function setPROGRESSION($progression){
		$this->PROGRESSION=$progression;
	}

    public function setTYPE($type){
        $this->TYPE=$type;
    }



	/*public function setAFFECTATION($campagne){
		$i=0;
		$affectation=$this->listeAffectaion();
		foreach ($affectation as  $value) {
			$this->AFFECTATION[$i]= new affectation($value);
			$i++;
		}
		
	}
*/



	public function getID(){
		return $this->ID;
	}

	public function getTITLE(){
		return $this->TITLE;
	}

	public function getDESCRIPTION(){
		return $this->DESCRIPTION;
	}

	public function getCREATIONTIME(){
		return $this->CREATIONTIME;
	}

	public function getUPDATETIME(){
		return $this->UPDATETIME;
	}

	public function getCREATIONUSER(){
		return $this->CREATIONUSER;
	}

	public function getACTIVATION(){
		return $this->ACTIVATION;
	}

	public function getPROGRESSION(){
		return $this->PROGRESSION;
	}

    public function getTYPE(){
        return $this->TYPE;
    }


	/*public function getAFFECTATION(){
		return $this->AFFECTATION;
	}*/

	public function isNew(){

		return !$this->getID();
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
			$req = $bdd->prepare("select id,(select libelle from typecampagne where typecampagne.id=campagnes.type) as type, title, description, creationtime, creationuser, activation, progression from campagnes");

			$req->execute();


			$liste="";
			$img="";
			$checked='';

			if ($req->rowCount()>0) {

			while ($donnees = $req->fetch())

			{

				$campagne= new campagne($donnees);			

				if($campagne->getACTIVATION()==1){
					$checked='checked=""';
				}else{
					$checked='';
				}
					

					$liste.=' <a href="#" class="list-group-item">
					
					 <h4>'.$campagne->getTITLE().'</h4>
					<p>'.$campagne->getDESCRIPTION().'</p>
					<p>'.$campagne->getTYPE().'</p>
					<div class="list-group-controls">


					<button data-id="'.$campagne->getId().'" class="btn btn-default btn-condensed"><span class="fa fa-pencil"></span></button>
					</div></a> ';
 
			}

				return $liste;

				}else{

				return  json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-error">La liste des campagnes est vide !</div>'));

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
				$sql.=" AND (title LIKE '%".$arg."%' OR description LIKE '%".$arg."%' OR id LIKE '%".$arg."%')";
			}

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select id,type as idtype,(select libelle from typecampagne where typecampagne.id=campagnes.type) as type, title, description, creationtime, creationuser, activation, progression from campagnes WHERE 1=1 ".$sql."");

		
			$req->execute();


			$liste="";
			$img="";
			$checked='';

			if ($req->rowCount()>0) {

			while ($donnees = $req->fetch())

			{

				$campagne= new campagne($donnees);			

				if($campagne->getACTIVATION()==1){
					$checked='checked=""';
				}else{
					$checked='';
				}
					

					$liste.=' <a href="./?page=campagne&cid='.$campagne->getId().'" class="list-group-item">
					
					 <span class="contacts-title"><strong>'.$campagne->getTITLE().'</strong></span>
					<p>'.$campagne->getDESCRIPTION().'</p>
					<span class="label label-default">'.$donnees['type'].'</span>
                    
					<div class="list-group-controls" hidden-type="'.$donnees['idtype'].'" hidden-titre="'.$campagne->getTITLE().'" hidden-description="'.$campagne->getDESCRIPTION().'"  hidden-activation="'.$campagne->getACTIVATION().'"  >
					<button data-id="'.$campagne->getId().'" class="btn btn-warning btn-condensed btn-edit-campagne"><span class="fa fa-pencil"></span> Modifier</button>
					<button data-id="'.$campagne->getId().'" class="btn btn-danger btn-condensed btn-delete-campagne"><span class="fa fa-trash-o"></span> Supprimer</button>
				 
					</div></a> ';
 
			}

					return json_encode(array('validation'=>true, 'list'=>$liste));

				}else{

				  return json_encode(array('validation'=>true, 'list'=>'<div class="alert alert-danger">Aucune campagne n&#39; a &#233;t&#233; trouv&#233;e  !</div>'));

			}

		}
	
	catch(Exception $e)

	{
		die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

	
}
static function listeAffectation($arg) {


		try {
			include('content/config.php');

			//$param=$this->getParamdb();
			$liste="";

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("SELECT affectation.id,affectation.agent,affectation.time,users.nom,users.prenom,users.photo FROM `affectation` left join users on affectation.agent=users.id where affectation.campagne=:campagne order by affectation.id desc");

			$req->execute(array('campagne'=>$arg));
			while ($row= $req->fetch()) {

				//array_push($liste, new affectation($row));

                $liste.='<a href="#" class="list-group-item">
                                        <img src="'.$row['photo'].'" class="pull-left" alt="agent agent">
                                        <span class="contacts-title">'.$row['prenom'].' '.strtoupper($row['nom']).'</span>
                                        <p>'.$row['time'].'</p>

                                        <div class="list-group-controls" >
                                        <button data-id="'.$row['id'].'" class="btn btn-default btn-condensed btn-delete-affectation"><span class="fa fa-trash-o"></span> Annuler</button>
                                        </div>
                                    </a>';

            }


            return json_encode(array('validation'=>true, 'list'=>$liste));
			
			

		}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

	
}


    static function typecampagnes() {


        try {
            include('content/config.php');


            $liste="";

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("select id, libelle from typecampagne");

            $req->execute();
            while ($row= $req->fetch()) {

                $liste.='<option value="'.$row['id'].'">'.$row['libelle'].'</option>';

            }


            return json_encode(array('validation'=>true, 'list'=>$liste));


        }

        catch(Exception $e)

        {
            die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }


    }


public function listeFile() {


		try {
			include('content/config.php');

			$param=$this->getParamdb();
			$liste=array();

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select * from fichiers WHERE campagne=:campagne");

			$req->execute(array(':campagne'=>$param[':ID']));
			while ($row= $req->fetch()) {
				
				array_push($liste, new affectation($row));
			}


			return $liste;
			
			

		}
	
	catch(Exception $e)

	{
        die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

	
}
static function findById($arg) {


		try {
			include('content/config.php');

		

			$sql="";
			
			

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("select id,(select libelle from typecampagne where typecampagne.id=campagnes.type) as type, title, description, creationtime, creationuser, activation, progression from campagnes WHERE id=:id");

		
			$req->execute(array(':id'=>$arg));


			if ($req->rowCount()>0) {

			

				$data= $req->fetch();
					return new campagne($data);

				}else{

				  return json_encode(array('validation'=>true, 'list'=>'<div class="alert alert-danger">Aucune campagne n&#39; a &#233;t&#233; trouv&#233;e  !</div>'));

			}

		}
	
	catch(Exception $e)

	{
		die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

	
}

function add(){
		

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("INSERT INTO `campagnes` (type,title, description, creationtime,updatetime, creationuser, activation, progression) VALUES (:TYPE, :TITLE, :DESCRIPTION, :CREATIONTIME,:UPDATETIME, :CREATIONUSER, :ACTIVATION, :PROGRESSION);");

		
			
			$param=$this->getParamdb();
			array_splice($param,0,1);

							

			if($req->execute($param)){

				return json_encode(array('validation'=>true, 'message'=>'<div class="alert alert-success">Enregistrement reussi</div>'));
				

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
			$req = $bdd->prepare("UPDATE  `campagnes` SET type=IF(:TYPE!=NULL OR :TYPE!='',:TYPE,type), title=IF(:TITLE!=NULL OR :TITLE!='',:TITLE,title), description=IF(:DESCRIPTION != NULL OR :DESCRIPTION!='',:DESCRIPTION,description), updatetime=IF(:UPDATETIME != NULL OR :UPDATETIME!='',:UPDATETIME,updatetime),  creationuser=IF(:CREATIONUSER != NULL OR :CREATIONUSER!='',:CREATIONUSER,creationuser), activation=IF(:ACTIVATION != NULL OR :ACTIVATION!='',:ACTIVATION,activation), progression=IF(:PROGRESSION != NULL OR :PROGRESSION!='',:PROGRESSION,progression) WHERE ID=:ID");

			$param=$this->getParamdb();
	
			if($req->execute($param)){

				return json_encode(array('validation'=>true, message=>'<div class="alert alert-success">Modification reussi</div>'));

			}

}
	
	catch(Exception $e)

	{
		
		die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
	}

}

function delete(){

		$param=[];
		try {
			include('content/config.php');

			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
			$req = $bdd->prepare("DELETE  FROM `campagnes`  WHERE id=:ID");

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


function persist(){

		if($this->isNew())
		return	$this->add();
		else
		return $this->edit();

}



    static function statistic(){
        try {
            include('content/config.php');

            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->prepare("SELECT count(distinct nd) as totaldirecte FROM campagnedirecte");
            $req->execute();
            $totaldirecte=$req->fetch()['totaldirecte'];
            $req = $bdd->prepare("SELECT count(distinct nn) as totalindirecte FROM campagneindirecte");
            $req->execute();
            $totalindirecte=$req->fetch()['totalindirecte'];
            $req = $bdd->prepare("SELECT id,title,type FROM campagnes WHERE activation=1");
            $req->execute();

            while ($row= $req->fetch()) {
                if($row['type']==1){
                    $req1 = $bdd->prepare("SELECT count(*) as totaldirecte FROM campagnedirecte WHERE campagne=:campagne");
                    $req1->execute(array(':campagne'=>$row['id']));
                    $total_s=$req1->fetch()['totaldirecte'];
                    $req1 = $bdd->prepare("SELECT count(*) as totaldirecteAcheve FROM campagnedirecte WHERE campagne=:campagne AND etatprospection=1");
                    $req1->execute(array(':campagne'=>$row['id']));
                    $totalacheve_s=$req1->fetch()['totaldirecteAcheve'];
                }elseif ($row['type']==2) {
                    $req1 = $bdd->prepare("SELECT count(*) as totalindirecte FROM campagneindirecte WHERE campagne=:campagne");
                    $req1->execute(array(':campagne'=>$row['id']));
                    $total_s=$req1->fetch()['totalindirecte'];
                    $req1 = $bdd->prepare("SELECT count(*) as totalindirecteAcheve FROM campagneindirecte WHERE campagne=:campagne AND etatprospection=1");
                    $req1->execute(array(':campagne'=>$row['id']));
                    $totalacheve_s=$req1->fetch()['totalindirecteAcheve'];
                }
                if($total_s==0){
                    $progression=0;
                }else{
                    $progression=round((intval($totalacheve_s)*100)/intval($total_s),2);
                }

                $html.=' <tr>
                               <td><strong>'.$row['title'].'</strong></td>
                             <td>
                                 <div class="progress-list">
                                     <div class="pull-right">'.$totalacheve_s.'/'.$total_s.'</div>
                                     <div class="progress progress-small progress-striped active">
                                         <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: '.$progression.'%;">'.$progression.'%</div>
                                     </div>
                                     </div>
                                    </td>
                                </tr>';

            }


            return json_encode(array('validation'=>true, 'list'=>array('totaldirecte'=>$totaldirecte,'totalindirecte'=>$totalindirecte),'progression'=>$html));


        }

        catch(Exception $e)

        {

            die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }
    }




    static function search($keyword){

        try {
            include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );

            $terms=explode(" ", $keyword);print_r($terms[1]);exit;
            $par_directe="";
            $par_indirecte="";
            $list="";
            if(count($terms)>1){

                $par_directe.=" (nom='".$terms[0]."' AND prenom='".$terms[1]."') OR (nom='".$terms[1]."' AND prenom='".$terms[0]."')";

            }else{

                if(is_numeric(substr($keyword, -7))){
                    $par_directe.="  (telephone like '%".$keyword."' OR tel_tuteur like '%".$keyword."' OR tel_pere like '%".$keyword."' OR tel_mere like '%".$keyword."' OR gsm like '%".$keyword."' OR gsm_tuteur like '%".$keyword."')";
                }else{
                    $par_directe.=" nom='".$keyword."' OR prenom='".$keyword."'";
                }

            }

            if(count($terms)>1){

                $par_indirecte.=" (nom='".$terms[0]."' AND prenom='".$terms[1]."') OR (nom='".$terms[1]."' AND prenom='".$terms[0]."')";

            }
			else{
                if(is_numeric(substr($keyword, -7))){

                    $par_indirecte.="  (tel like '%".$keyword."'  OR tel_pere like '%".$keyword."' OR tel_mere like '%".$keyword."' OR gsm like '%".$keyword."')";
                }else{
                    $par_indirecte.=" nom='".$keyword."' OR prenom='".$keyword."'";
                }

            }



            $req = $bdd->prepare("SELECT nom,prenom,telephone,tel_tuteur,tel_pere,tel_mere,gsm,gsm_tuteur,CONCAT('CD_',nd) as idupm,ville,adresse FROM campagnedirecte WHERE 1=1 AND ".$par_directe."  GROUP BY nd");
            $req->execute();

            while ($row= $req->fetch(PDO::FETCH_ASSOC)) {
                $list.="<tr><td>".$row['nom']."</td><td>".$row['prenom']."</td><td>".$row['telephone']."</td><td>".$row['gsm']."</td><td>".$row['tel_tuteur']."</td><td>".$row['gsm_tuteur']."</td><td>".$row['tel_pere']."</td><td>".$row['tel_mere']."</td><td>".$row['ville']."</td><td>".$row['adresse']."</td><td><a class='btn btn-primary btn-sm' href='./?page=prospect&idupm=".$row['idupm']."'><i class='fa fa-eye'></i> Afficher</a></td></tr>";
            }


            $req = $bdd->prepare("SELECT nom,prenom,tel as telephone,'' as tel_tuteur,tel_pere,tel_mere,gsm,'' as gsm_tuteur,CONCAT('CI_',nn) as idupm,ville,adresse FROM campagneindirecte WHERE 1=1 AND ".$par_indirecte."  GROUP BY nn");
            $req->execute();
            while ($row= $req->fetch(PDO::FETCH_ASSOC)) {
                $list.="<tr><td>".$row['nom']."</td><td>".$row['prenom']."</td><td>".$row['telephone']."</td><td>".$row['gsm']."</td><td>".$row['tel_tuteur']."</td><td>".$row['gsm_tuteur']."</td><td>".$row['tel_pere']."</td><td>".$row['tel_mere']."</td><td>".$row['ville']."</td><td>".$row['adresse']."</td><td><a class='btn btn-primary btn-sm' href='./?page=prospect&idupm=".$row['idupm']."'><i class='fa fa-eye'></i> Afficher</a></td></tr>";
            }




            return json_encode(array('validation'=>true, "list"=>$list));




        }

        catch(Exception $e)

        {

            die(json_encode(array('validation'=>false, 'message'=>'<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>')));
        }

    }


}


?>