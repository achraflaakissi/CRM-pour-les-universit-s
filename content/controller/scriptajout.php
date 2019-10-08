<?php
include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
if(count($_POST)>0)
{
    if(isset($_POST['nomville']) && $_POST['nomville']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `ville`(`ville`) values (?)');
        if($requ->execute(array($_POST['nomville'])))
        {
            echo 'la ville a été bien ajoutée';
        }
    }
    else if(isset($_POST['nometat']) && $_POST['nometat']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `etatdossier`(`etatdossier`) VALUES (?)');
        if($requ->execute(array($_POST['nometat'])))
        {
            echo 'L\'etat a été bien ajouté';
        }

    }
    else if(isset($_POST['nompays']) && $_POST['nompays']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `pays`(`nom_fr_fr`) VALUES (?)');
        if($requ->execute(array($_POST['nompays'])))
        {
            echo 'le pays a été bien ajouté';
        }
    }
    else if(isset($_POST['nomlangue']) &&  $_POST['nomlangue']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `langue`(`langue`) VALUES (?)');
        if($requ->execute(array($_POST['nomlangue'])))
        {
            echo 'la langue a été bien ajoutée';
        }
    }
    else if(isset($_POST['nomformation']) &&  $_POST['nomformation']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `formation_demander`(`formation`) VALUES (?)');
        if($requ->execute(array($_POST['nomformation'])))
        {
            echo 'la formation a été bien ajoutée';
        }
    }
    else if(isset($_POST['nomcapagne']) &&  $_POST['nomcapagne']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `typecampagne`(`libelle`) VALUES (?)');
        if($requ->execute(array($_POST['nomcapagne'])))
        {
            echo 'le type  a été bien ajouté';
        }
    }
    else if(isset($_POST['nomgroupe']) &&  $_POST['nomgroupe']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `groupeformation`(`groupeformation`) VALUES (?)');
        if($requ->execute(array($_POST['nomgroupe'])))
        {
            echo 'le groupe de formation  a été bien ajouté';
        }
    }
    else if(isset($_POST['nomdiplome']) &&  $_POST['nomdiplome']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `diplomesobtenus`(`diplomesobtenus`) VALUES (?)');
        if($requ->execute(array($_POST['nomdiplome'])))
        {
            echo 'le nom de diplome  a été bien ajouté';
        }
    }
    else if(isset($_POST['nomserie']) &&  $_POST['nomserie']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `diplomesobtenus`(`diplomesobtenus`) VALUES (?)');
        if($requ->execute(array($_POST['nomserie'])))
        {
            echo 'la serie a été bien ajoutée';
        }
    }
    else if(isset($_POST['nommarche']) &&  $_POST['nommarche']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `marche`(`marche`) VALUES (?)');
        if($requ->execute(array($_POST['nommarche'])))
        {
            echo 'le marche a été bien ajoutée';
        }
    }
    else if(isset($_POST['nometablissement']) &&  $_POST['nometablissement']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `lyceeetablissement`(`lyceeetablissement`) VALUES (?)');
        if($requ->execute(array($_POST['nometablissement'])))
        {
            echo 'Etablissement a été bien ajouté';
        }
    }
    else if(isset($_POST['nomprofession']) &&  $_POST['nomprofession']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `profession`(`profession`) VALUES (?)');
        if($requ->execute(array($_POST['nomprofession'])))
        {
            echo 'Profession a été bien ajoutée';
        }
    }

    else if(isset($_POST['nommotif']) &&  $_POST['nommotif']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `motif`(`motif`) VALUES (?)');
        if($requ->execute(array($_POST['nommotif'])))
        {
            echo 'Le Motif a été bien ajouté';
        }
    }
    else if(isset($_POST['nomtest']) &&  $_POST['nomtest']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `test`(`test`) VALUES (?)');
        if($requ->execute(array($_POST['nomtest'])))
        {
            echo 'Le Test a été bien ajouté';
        }
    }
    else if(isset($_POST['nomtyperesidence']) &&  $_POST['nomtyperesidence']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `typeresidence`(`typeresidence`) VALUES (?)');
        if($requ->execute(array($_POST['nomtyperesidence'])))
        {
            echo 'Le type de résidence a été bien ajouté';
        }
    }

    else if(isset($_POST['nomresultat']) &&  $_POST['nomresultat']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `resultat`(`resultat`) VALUES (?)');
        if($requ->execute(array($_POST['nomresultat'])))
        {
            echo 'Le Resultat a été bien ajouté';
        }
    }
else if(isset($_POST['lyceee']) &&  $_POST['agentt']!=null)
    {
        $requ = $bdd->prepare('update contact_indirect set Contact_Suivi_par = ? where Lycee= ?');
        if($requ->execute(array($_POST['agentt'],$_POST['lyceee'])))
        {
            echo 'Affectation effectuée avec succés';
        }
    }
    else if(isset($_POST['nomnature']) &&  $_POST['nomnature']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `naturecontact`(`naturecontact`) VALUES (?)');
        
        if($requ->execute(array($_POST['nomnature'])))
        {
            $requ = $bdd->prepare('INSERT INTO `contactsuitea`(`contactsuitea`) VALUES (?) ');
           $requ->execute(array($_POST['nomnature']));
            echo 'La nature du contact a été bien ajoutée';
        }
        
        
    }
    
    else if(isset($_POST['contactsuitea']) &&  $_POST['contactsuitea']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `contactsuitea`(`contactsuitea`) VALUES (?) ');
        if($requ->execute(array($_POST['contactsuitea'])))
        {
            echo 'Contact_Suite_A  été bien ajoutée';
        }
    }
    
     else if(isset($_POST['nomaction']) &&  $_POST['nomaction']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `liste_action`(`nom`) VALUES (?) ');
        if($requ->execute(array($_POST['nomaction'])))
        {
            echo 'Action a  été bien ajoutée';
        }
    }
    
     else if(isset($_POST['nometatphoning']) &&  $_POST['nometatphoning']!=null)
    {
        $requ = $bdd->prepare('INSERT INTO `etapephoning`(`etapephoning`) VALUES (?) ');
        if($requ->execute(array($_POST['nometatphoning'])))
        {
            echo 'l\'Etat Phoning a  été bien ajouté';
        }
    }


}