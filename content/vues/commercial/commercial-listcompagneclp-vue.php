<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        if(isset($_POST['auth'] ) and isset($_POST['type'] ))
        {
            if(!empty($_POST['auth'] ) and !empty($_POST['type'] ))
            {
                header('Content-Type: application/json');
                echo $remplir->deletecampagne($_POST['auth'],$_POST['type']);exit;
            }
        }
        $remplir=$remplir->getnbrcmpcomercial();
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
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des campagnes</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Nom de campagne</th>
                                            <th>Type de contact</th>
                                            <th>Agents</th>
                                            <th>progression</th>
                                            <th>progression</th>
                                            <th>Statistique</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $remplir; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Nom de campagne</th>
                                            <th>Type de contact</th>
                                            <th>Agents</th>
                                            <th>progression</th>
                                            <th>progression</th>
                                            <th>Statistique</th>
                                            <th>#</th>
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
        <div class="modal fade" id="deletecampagne" role="dialog">
            <div class="modal-dialog"  style="background: transparent;border: none !important;">
                <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                    <div class="modal-body" style="background: transparent;border: none !important;">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Supprimer contact</h3>
                            </div>
                            <div class="box-body">
                                <div class="form-group pull-right">
                                    <a class="btn btn-danger" id="btn_delete" style="margin-right: 5px;width: 100px" > Oui</a>
                                    <a class="btn btn-primary" style="margin-right: 5px;width: 100px" onclick="hidemodeledeletecmp();"> Non</a>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>
                </div>
                <!--            <div class="modal-footer">-->
                <!--                <a class="btn btn-default" data-dismiss="modal">Close</a>-->
                <!--            </div>-->
            </div>
        </div>



        <?php include "content/modules/footer-inc.php"; ?>
    <?php

    }

}

?>