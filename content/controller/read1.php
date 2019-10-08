<?php
include('../config.php');
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );

if(count($_POST) >0) {

    switch ($_POST['oper']) {
        case 'edit':
            $active=null;
            if($_POST['Active']=='Oui')
                $active=1;
            else
                $active=0;
                $req = $bdd->prepare("update users set Nom = ?,Prenom = ?,Email = ?,Profile = ?,login = ?,password = ?,activation=?,otr_cmp=?,centre=? where id = ?");
                $req->execute(array($_POST['Nom'],$_POST['Prenom'],$_POST['Email'],$_POST['Profil'],$_POST['Login'],$_POST['Password'],$active,$_POST['Createur_Campagne'],$_POST['Centre'],$_POST['id']));
            break;
        case 'add':
            $active=null;
            if($_POST['Active']=='Oui')
                $active=1;
            else
                $active=0;
            $req = $bdd->prepare("INSERT INTO `users`(`nom`, `prenom`, `email`, `profile`, `login`, `password`, `activation`,otr_cmp,Centre) VALUES(?,?,?,?,?,?,?,?,?)");
            $req->execute(array($_POST['Nom'],$_POST['Prenom'],$_POST['Email'],$_POST['Profil'],$_POST['Login'],$_POST['Password'],$active,$_POST['Createur_Campagne'],$_POST['Centre']));
            break;
        case 'del':
                        echo $req = $bdd->exec("Delete from `users` where id in (".$_POST['id'].")");exit;
            break;
    }
}