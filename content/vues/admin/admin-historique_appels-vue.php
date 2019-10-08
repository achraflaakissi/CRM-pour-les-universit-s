<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
    
	require('content/controller/class.statistique.php');
    $statistique= new statistique();
    $statistiques=$statistique->get_historique_by_week($_GET['date']);
	if(isset($_POST['auths']))
	{
	    header('Content-Type: application/json');
	    $statistiques=$statistique->get_appels_by_hour($_POST['heure_debut'],$_POST['heure_fin'],$_POST['date']);
	    echo $statistiques;exit;
	}
        include "content/modules/header-inc.php";
        ?>
        
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"> Historique Phoning Call Centre du jour : <?php echo date('d/m/Y h:i') ?></h3>
                </div>
                <div class="box-body">
                 <div class="row">
                        <?php echo $statistiques; ?>
                    </div>
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                    
                </section>
            </div>
        </div>

<script src="plugins/chartjs/Chart.min.js"></script>
        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>