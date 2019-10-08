<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempliration=new rempliration();
if(isset($_POST['Lycee']))
{
    header('Content-Type: application/json');
    $return=$rempliration->affectation_etb($_POST['Lycee'],$_POST['Ville'],$_POST['Ville_Lycee'],$_POST['Nature_de_Contact'],$_POST['agent']);
    echo $return;exit;
}
        $rempliration=$rempliration->liste_etb_affectation();
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
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Affectation des établissements</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <?php echo $rempliration;?>
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
        <style>
            input
            {
                border: none !important;
            }
        </style>