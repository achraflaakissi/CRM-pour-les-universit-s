<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        $remplir=$remplir->get_auto_cmp();
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des campagnes générer automatiquement</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Type de contact</th>
                                            <th>Nombre de contact</th>
                                            <th>Nombre de NA</th>
                                            <th>Nombre des RDV</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $remplir; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Type de contact</th>
                                            <th>Nombre de contact</th>
                                            <th>Nombre de NA</th>
                                            <th>Nombre des RDV</th>
                                        </tr>
                                        </tfoot>
                                    </table>
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