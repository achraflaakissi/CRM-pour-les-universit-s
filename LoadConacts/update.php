<?php
require 'config.php';
try {
    $db = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'',$db_user, $db_password,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
if(isset($_GET['updatesdirect']) && $_GET['updatesdirect']!="")
{
    $db->query("update contact_direct set Exp=1 where id=".$_GET['updatesdirect']);
}
else if(isset($_GET['updatesindirect']) && $_GET['updatesindirect']!="")
{
    $db->query("update contact_indirect set Exp=1 where id=".$_GET['updatesindirect']);
}

} catch (Exception $e) {
    // error_log('code: 0001, message: Erreur de connexion,'.date("Y-m-d H:i:s")."\r\n", 3, $this->log_folder.date('ym')."error.log");

}

