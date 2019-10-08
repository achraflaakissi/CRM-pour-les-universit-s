<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.statistique.php');
        $statistique= new statistique();
        $StatistiqueGlobal=$statistique->getStatistiqueGlobal();
        $RapportJournaliser=$statistique->getRapportJournaliser();
        $statistiques_doossier=$statistique->getdepotdossier_by_day();
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box-body table-responsive">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Rapport Global</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $StatistiqueGlobal; ?>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Rapport Journalier (<?php echo date('d-m-Y') ?>)</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $RapportJournaliser; ?>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box">
                        <div class="box-header with-border">
                            <i class="fa fa-bullhorn"></i> <h3 class="box-title">Dépôt Dossier (<?php echo date('d-m-Y') ?>)</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                             <?php echo $statistiques_doossier; ?>
                        </div><!-- ./box-body -->
                        <div class="box-footer">
                            <div class="text-center" id="btnfilter">
                                <img src="dist/img/loading.gif" width="5%">
                            </div>
                        </div><!-- /.box-footer -->
                    </div><!-- /.box -->
                           
                        </div>
                    </div>
                </section>
            </div>
        </div>



        <?php include "content/modules/footer-inc.php"; ?>
    <?php
    }
}

?>