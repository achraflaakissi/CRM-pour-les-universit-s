<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.statistique.php');
        $statistique= new statistique();
        if(isset($_POST['getgraph_rendez_vous_week']))
        {
            header('Content-Type: application/json');
            $getgraph_rendez_vous_week=$statistique->getgraph_rendez_vous_week();
            echo $getgraph_rendez_vous_week;exit;
        }
        if(isset($_POST['getgraph_rendez_vous_week_by_user']))
        {
            header('Content-Type: application/json');
            $getgraph_rendez_vous_week_by_user=$statistique->getgraph_rendez_vous_week_by_user();
            echo $getgraph_rendez_vous_week_by_user;exit;
        }
        $get_rendez_vous_current_date=$statistique->get_rendez_vous_current_date();
        include "content/modules/header-inc.php";
        ?>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box-body table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Les Rendez-Vous du jour (<?php echo date('d-m-Y') ?>)</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $get_rendez_vous_current_date;?>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title"></h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <div id="container" style="min-width: 310px; height: 700px; max-width: 1000px; margin: 0 auto"></div>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        </div>
                  </div>
                    <div class="row">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title"></h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <div id="container1" style="min-width: 310px; height: 700px; max-width: 1000px; margin: 0 auto"></div>
                            </div><!-- /.box-body -->
                          </div><!-- /.box -->
                        </div>
                  </div>
                </section>
            </div>
        </div>
        <script>
            getgraph_rendez_vous_week();getgraph_rendez_vous_week_by_user();
                
        </script>
        <style>
            #container1 {
        	max-width: 1000px;
        	margin: auto;
        	height: 500px;
        	margin: 0 auto;
        }
        </style>
        <?php include "content/modules/footer-inc.php"; ?>
    <?php
    }
}
?>