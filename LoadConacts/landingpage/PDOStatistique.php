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

function update()
{
    $this->db->query('update landing_upm set Exp=1 ');
}


 
		
		
         function getList()
			{
				try{		
						 
		$sql = $this->db->query('SELECT * from landing_upm where Exp=0 ');
						//where (Typeexp="N" or Typeexp="M") and Exp =0
						$sql->execute();
						$contacts=$sql->fetchAll(PDO::FETCH_ASSOC);
						$xml = new SimpleXMLElement('<?xml version="1.0" ?><landing_upm></landing_upm>');
						$this->array_to_xml_contact($contacts,$xml);
						return $xml->asXML('import.xml');                  
				 } catch (PDOException $e) {

					return array('code'=>21109, 	'erreur'=>array('code'=>$e->getCode()),'message'=>$e->getMessage(),'line'=>$e->getLine(),'fichier'=>$e->getFile());
				}
			}
		


}
 ?>
