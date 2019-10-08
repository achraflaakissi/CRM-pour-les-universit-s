<?php

class login{
	
	public $Identifiant;
	public $Password;
	public $Message;

public function __get($name) {
     
    return $this->$name;

  }

 function authentification() {
 	
	
	try {
		include('content/config.php');
	
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     			$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );	
				$req = $bdd->prepare("SELECT count(*) as nb, otr_cmp, id, nom,role1, prenom, email,pws_email,send_from, profile,login,photo from users where login=? and password=? and (profile='agent' or profile='commercial' or profile='admin' or profile='import' or profile='saisie' or profile='superadmin'  or profile='supercommercial' ) and activation=1 and centre='Marrakech'");
														 
							$req->execute(array($this->Identifiant,$this->Password));

							  while ($donnees = $req->fetch())
								
								{

								if ($donnees['nb']>0) {

	$ipaddress = '';
									if (isset($_SERVER['HTTP_CLIENT_IP']))
									{$ipaddress = $_SERVER['HTTP_CLIENT_IP'];}
									else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
									{$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];}
									else if(isset($_SERVER['HTTP_X_FORWARDED']))
									{$ipaddress = $_SERVER['HTTP_X_FORWARDED'];}
									else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
									{$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];}
									else if(isset($_SERVER['HTTP_FORWARDED']))
									{$ipaddress = $_SERVER['HTTP_FORWARDED'];}
									else if(isset($_SERVER['REMOTE_ADDR']))
									{$ipaddress = $_SERVER['REMOTE_ADDR'];}
									else
									{$ipaddress = 'UNKNOWN';}

									$requ = $bdd->prepare("INSERT INTO `historique`(`user_id`, `date_conn`, `profile`,`ip_adress`) VALUES (?,?,?,?)");
									$requ->execute(array($donnees['id'],date('Y-m-d H:i:s'),$donnees['profile'],$ipaddress));

								
										
												$_SESSION['user']['id']=$donnees['id'];
												$_SESSION['user']['email']=$donnees['email'];
												$_SESSION['user']['nom']=$donnees['nom'];
												$_SESSION['user']['prenom']=$donnees['prenom'];
												$_SESSION['user']['profile']=sha1(md5($donnees['profile'].$salt));
												$_SESSION['user']['service']=$donnees['service'];
                                                $_SESSION['user']['source']=$donnees['profile'];
												$_SESSION['user']['matricule']=$donnees['login'];
												$_SESSION['user']['photo']=$donnees['photo'];
												$_SESSION['user']['otr_cmp']=$donnees['otr_cmp'];
												$_SESSION['user']['pws_email']=$donnees['pws_email'];
												$_SESSION['user']['send_from']=$donnees['send_from'];
												$_SESSION['user']['role1']=$donnees['role1'];
												
												
												
                                               
 
								 

									 header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . $location);

									}else{

										return  '<div class="alert alert-danger">Connexion impossible ! <br/> Merci de vérifier vos identifiants</div>';
									
									}
		  
								}

}
	
	catch(Exception $e)

{
    die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
}
		
	
}


 
		
	 
}

 
$login=new login();

?>