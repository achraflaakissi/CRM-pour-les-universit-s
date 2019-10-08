<?php
if(isset($_GET["formation"]) and isset($_GET["type_affichage"]) and !empty($_GET["formation"]) and !empty($_GET["type_affichage"])  )
{
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.contact-direct.php');
        $ContactDirect= new ContactDirect();
        $ContactDirect=$ContactDirect->getdetail($_GET["formation"]);
        include "content/modules/header-inc.php";
        ?>

        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Détail de <?php echo $_GET["formation"];?> </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo $ContactDirect; ?>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div>
                </section>

        </div>

        <script src="plugins/chartjs/Chart.min.js"></script>
        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}
}
?>