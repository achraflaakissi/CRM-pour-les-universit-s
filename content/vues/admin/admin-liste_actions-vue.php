<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.action.php');
        $action=new action("","","","","","","","","","","","");
        $action=$action->getlisteactions_byday();
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
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Qualification des Actions</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $action;?>
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

        <div class="modal fade" id="scriptes" role="dialog">
            <div class="modal-dialog"  style="background: transparent;border: none !important;">
                <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                    <div class="modal-body" style="background: transparent;border: none !important;">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Scripte</h3>
                            </div>
                            <div class="box-body">
                                <div id="scripte_content">

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