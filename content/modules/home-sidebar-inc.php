<div class="col-xs-3 side-items">
<ul class="list-group side-list-menu">

<?= SideMenu(); ?>

</ul>
    </div>



<?php

function SideMenu() {


    try {
        include('content/config.php');

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->prepare("SELECT section.id, section.libelle,section.icon FROM section left join item on section.id=item.section left join interest on interest.item=item.id where interest.user=:binduser group by id,libelle");

        $req->execute(array('binduser'=>$_SESSION['user']['id']));


        while ($donnees = $req->fetch())

        {
                echo '<li class="list-group-item side-list-section"><div class="list-group-section-title"><i class="fa '.$donnees['icon'].'"></i>&nbsp;'.$donnees['libelle'].'</div> <ul class="side-list-section-submenu list-group">'.SideMenuItem($donnees['id']).' </ul></li>';
        }


        $req->closeCursor();

    }

    catch(Exception $e)

    {
        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
    }


}


function SideMenuItem($section) {


    try {
        include('content/config.php');

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
      //  $req = $bdd->prepare("SELECT item.id,item.libelle FROM item left join interest on item.id=interest.item  where interest.user=:binduser and  item.section=:bindsection ");
         $req = $bdd->prepare("SELECT item.id,item.libelle ,(select count(n.id) as nb from notification n where n.item=item.id and n.user=:binduser and n.seen=0) as totalnotif FROM item left join interest on item.id=interest.item  where interest.user=:binduser and  item.section=:bindsection ");


        $req->execute(array('bindsection'=>$section,'binduser'=>$_SESSION['user']['id']));

        $badge="";

        while ($donnees = $req->fetch())

        {
/*
            $req2 = $bdd->prepare("select count(*) as nb from notification where item=? and user=? and seen=0");
            $req2->execute(array($donnees['id'],$_SESSION['user']['id']));
            $total=$req2->fetch();
*/

           if($donnees['totalnotif']>0){
                $badge='<span class="badge badge-danger pull-right" style="">'.$donnees['totalnotif'].'</span>';
           }else{
               $badge='<span class="badge badge-danger pull-right" style=""></span>';
            }

            $item.= '<li class="list-group-item"><a href="http://' . $_SERVER['HTTP_HOST'] . $location.'?page=table&item='.$donnees['id'].'" data-table="'.$donnees['id'].'">'.$donnees['libelle'].''.$badge.'</a></li>';

        }

        return $item;

        $req->closeCursor();

    }

    catch(Exception $e)

    {
        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
    }


}


?>