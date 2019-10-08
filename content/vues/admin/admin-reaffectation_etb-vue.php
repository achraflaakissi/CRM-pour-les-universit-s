<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
if(isset($_POST['Lycee']))
{
    header('Content-Type: application/json');
    $return=$rempisage->reaffectation_etb($_POST['Lycee'],$_POST['Ville'],$_POST['Ville_Lycee'],$_POST['Nature_de_Contact'],$_POST['agent'],$_POST['Contact_Suivi_par']);
    echo $return;exit;
}
        if(isset($_POST['nature_contact_hors']))
        {
            $rempliration=$rempisage->liste_etb_reaffectation($_POST['nature_contact_hors'],$_POST['Ville_hors'],$_POST['Lycee_hors'],$_POST['Ville_Lycee_hors']);
            echo $rempliration;exit;
        }
        $getVille=$rempisage->getFunctions("getVille");
        $getNatureContact=$rempisage->getFunctions("getNatureContact");
        $getLyceeEtablissement=$rempisage->getFunctions("getLyceeEtablissement");
        $getPays=$rempisage->getFunctions("getPays");
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nature de contact : </label>
                                <select onchange="" class="form-control select2" multiple="multiple" id="nature_contact_hors" data-placeholder="Nature de contact ..." style="width: 100%;">
                                    <option value=""></option>
                                    <?php echo $getNatureContact; ?>
                                </select>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ville : </label>
                                <select onchange="" class="form-control select2" multiple="multiple" id="Ville_hors" data-placeholder="Ville ..." style="width: 100%;">
                                    <option value=""></option>
                                    <?php echo $getVille; ?>
                                    <?php echo $getPays; ?>
                                </select>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-center">
                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                <label class="pull-left">Lycee :</label>
                                <span id="selection">
                                    <select onchange="" id="Lycee_hors" class="form-control select2" multiple="multiple" data-placeholder="Lycee ..." style="width: 100%;">
                                            <option value=""></option>
                                            <?php echo $getLyceeEtablissement; ?>
                                    </select>
                                </span>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group text-center">
                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                <label class="pull-left">Ville Lycee :</label>
                                <span id="selection">
                                    <select onchange="" id="Ville_Lycee_hors" class="form-control select2" multiple="multiple" data-placeholder="Ville Lycee ..." style="width: 100%;">
                                            <option value=""></option>
                                            <?php echo $getVille; ?>
                                            <?php echo $getPays; ?>
                                    </select>
                                </span>
                            </div><!-- /.form-group -->
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button onclick="filtrer_reaffectation()" id="btn-filt" class="btn btn-block btn-primary">Chercher</button>
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Reaffectation des établissements</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body" id="insert_place">
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