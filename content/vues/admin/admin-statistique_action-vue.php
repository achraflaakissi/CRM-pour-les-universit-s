<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt))){
        require('content/controller/class.action.php');
	    require('content/controller/class.statistique.php');
        $statistique= new statistique();
        $action= new action("","","","","","","","","","","","");
        $action=$action->getbyaction();
        $statistique=$statistique->get_suivie_actions();
        include "content/modules/header-inc.php";
        ?>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <body class="hold-transition skin-blue sidebar-mini">
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box box-primary">
                         <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Suivie des Actions</h3>
                        </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php echo $statistique; ?>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Actions</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $action; ?>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div>
                </section>
            </div>
        </div>

        <?php include "content/modules/footer-inc.php"; ?>
    <?php
    }
}

?>