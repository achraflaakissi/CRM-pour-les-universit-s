<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
	require('content/controller/class.statistique.php');
    $statistique= new statistique();
    $statistiques=$statistique->appels_by_day_detail($_GET["type"],$_GET["user"]);
        include "content/modules/header-inc.php";
        ?>
        
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> Detail Phoning Call Centre du jour : <?php echo date('d/m/Y h:i') ?></h3>
                </div>
                <div class="box-body">
                    <div class="row">
    	                  <div class="col-md-12">
    	                      <?php echo $statistiques; ?>
    	                  </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>

<script src="plugins/chartjs/Chart.min.js"></script>
        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>