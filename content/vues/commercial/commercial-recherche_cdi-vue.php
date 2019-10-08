<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
require('content/controller/class.remlpiration.php');
$remplire=new rempliration();
$remplir=$remplire->getlistcontactindirect("Vide","","","","","","","","");
$getMarche=$remplire->getFunctions("getMarche");
$getNatureContact=$remplire->getFunctions("getNatureContact");
$getCommercial=$remplire->getFunctions("getCommercial");
if(isset($_POST['Nom']))
{
        $remplir=$remplire->getlistcontactindirect("Filtrer",$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['GSM'],$_POST['nature_contact'],$_POST['Contact_Suivi_Par'],$_POST['Nom_Commencant'],$_POST['Marche']);
    echo $remplir;exit;
}
include "content/modules/header-inc.php";
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>
    <div class="content-wrapper">
        <section class="content">
            
                    <div class="box">
                        <div class="box-header with-border">
                            <i class="fa fa-bullhorn"></i> <h3 class="box-title"> Filtrer </h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Nom :</label>
                                        <span id="selection">
                                            <input id="Nom" class="form-control" data-placeholder="Nom ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Prenom :</label>
                                        <span id="selection">
                                            <input id="Prenom" class="form-control" data-placeholder="Prenom ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Nature de contact :</label>
                                        <span id="selection">
                                            <select onchange="" id="nature_contact" class="form-control" data-placeholder="Nature de contact ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getNatureContact; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Marche :</label>
                                        <span id="selection">
                                            <select onchange="" id="Marche" class="form-control" data-placeholder="Marche ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getMarche; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Tel :</label>
                                        <span id="selection">
                                            <input id="Tel" class="form-control" data-placeholder="Tel ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">GSM :</label>
                                        <span id="selection">
                                            <input id="GSM" class="form-control" data-placeholder="GSM ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Contact Suivi Par :</label>
                                        <span id="selection">
                                             <select onchange="" id="Contact_Suivi_Par" class="form-control" data-placeholder="Contact Suivi Par ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getCommercial; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Le Nom Commençe Par :</label>
                                        <span id="selection">
                                            <input id="Nom_Commencant" class="form-control" data-placeholder="Le Nom Commençant Par..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="text-center" id="btnfilter">
                                <img src="dist/img/loading.gif" width="5%">
                            </div>
                            <button onclick="FiltrerCDI();" id="filtrer" class="btn btn-primary pull-right" style="width: 10%">Filtrer</button>
                        </div><!-- /.box-footer -->
                    </div>
               
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Contacts</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" id='table_body'>
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
                                    <th>Niveau des etudes</th>
                                    <th>Observation</th>
                                    <th>Contact Suivi Par</th>
                                    <th>Dern Phoning</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php echo $remplir; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
                                    <th>Niveau des etudes</th>
                                    <th>Observation</th>
                                    <th>Contact Suivi Par</th>
                                    <th>Dern Phoning</th>
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
<script>
    
                activerdatatablesforme();
</script>