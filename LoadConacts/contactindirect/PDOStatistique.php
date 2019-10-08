<?php
class PDOStatistique
{
	
    private $db;
   
    function __construct()
    {
        require 'config.php';
        try {
				$this->db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'',$db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
			//$this->db = new PDO("mysql:host='.$db_host.';dbname='.$db_name.','.$db_user.','.$db_password.',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'"));
			//,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
            //$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
            //$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $this->log_folder=$folder_log;


        } catch (Exception $e) {
            // error_log('code: 0001, message: Erreur de connexion,'.date("Y-m-d H:i:s")."\r\n", 3, $this->log_folder.date('ym')."error.log");
            
        }
    }
    
    function getuserbyid($id)
		{
		
				if(intval($id)!=0)
					{
						$sql = $this->db->prepare('SELECT nom,prenom FROM `users` where id=?');
						$sql->execute(array($id));
						foreach($sql->fetchAll() as $u)
						{
							return $u[0].' '.$u[1];
						}
						}
						else
					return $id;
				
		
		
		}
	


function array_to_xml_contact($contact_info, &$xml_contact_info) {

    foreach($contact_info as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml_contact_info->addChild("$key");
                
                $this->array_to_xml_contact($value, $subnode);
            }
            else{
                $subnode = $xml_contact_info->addChild("contacts");
                $this->array_to_xml_contact($value, $subnode);
            }
        }
        else {
            $xml_contact_info->addChild("$key",htmlspecialchars("$value"));
        }
    }
}
        
			function getListIndirect()
			{
				try{	
						$sql = $this->db->query('Update `contact_indirect` set `Etablissement`=`Lycee`');	  
						$sql = $this->db->query('SELECT * FROM `contact_indirect` where Exp=0   limit 0,1000');
						$sql->execute();
						$contacts=$sql->fetchAll(PDO::FETCH_ASSOC);
						$xml = new SimpleXMLElement('<?xml version="1.0"?><contacts_indirects></contacts_indirects>');
						$this->array_to_xml_contact($contacts,$xml);
						header('Cache-Control:no-cache, must-revalidate');
						header('Expires:Mon, 26 Jul 1997 05:00:00 GMT');
						header('Content-Type: text/xml');
						
						foreach($xml->xpath("//contacts_indirects/contacts") as $node)
			{
				$node->Operateur_Saisie=$this->getuserbyid($node->Operateur_Saisie);
				$node->Reçu_par=$this->getuserbyid($node->Reçu_par);
				$node->Insc_Reçu_par=$this->getuserbyid($node->Insc_Reçu_par);
				$node->Contact_Suivi_par=$this->getuserbyid($node->Contact_Suivi_par);
				$node->TA=$this->getuserbyid($node->TA);
				$node->TA1=$this->getuserbyid($node->TA1);
				$node->TA2=$this->getuserbyid($node->TA2);
				$node->TA3=$this->getuserbyid($node->TA3);
				$node->TA4=$this->getuserbyid($node->TA4);
				$node->TA5=$this->getuserbyid($node->TA5);
				$node->TA6=$this->getuserbyid($node->TA6);
				$node->TA7=$this->getuserbyid($node->TA7);
				$node->TA8=$this->getuserbyid($node->TA8);
				$node->TA9=$this->getuserbyid($node->TA9);
				$node->TA10=$this->getuserbyid($node->TA10);
			}
						echo $xml->asXML(); 
						                      
				 } catch (PDOException $e) {

					return array('code'=>21109, 'erreur'=>array('code'=>$e->getCode()),'message'=>$e->getMessage(),'line'=>$e->getLine(),'fichier'=>$e->getFile());
				}
			}


}
 ?>
