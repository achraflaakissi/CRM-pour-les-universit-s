<?php
if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
include('content/controller/class.remlpiration.php');
$remplire=new rempliration();
$remplira=$remplire->getlistalpha();
if(isset($_GET['alpha']))
{
    $remplir=$remplire->getdoublantcontactindirect($_GET['alpha']);
}
else
{
    $remplir=$remplire->getdoublantcontactindirect('A');
}
if(isset($_POST['auth']) and !empty($_POST['auth']) and isset($_POST['auth1']) and !empty($_POST['auth1']))
{
    header('Content-Type: application/json');
    $result=$remplire->get_cdi_for_doubl($_POST['auth'],$_POST['auth1']);
    echo $result;exit;
}
if(isset($_POST['auth_']) and !empty($_POST['auth_']))
{
    header('Content-Type: application/json');
    $result=$remplire->update_cdi_for_doubl("CDI",$_POST['auth_'],$_POST['Nom'],
        $_POST['Prenom'],$_POST['Tel'],$_POST['email'],$_POST['Date'],
        $_POST['Groupe_Formation'],$_POST['Formation_Demmandee'],$_POST['Nature_de_Contact']
        ,$_POST['Ville'],$_POST['Lycee'],$_POST['Profession_Mere'],$_POST['Profession_Pere']
        ,$_POST['Mail_Mere'],$_POST['Mail_Pere'],$_POST['Tel_Mere'],$_POST['Tel_Pere']
        ,$_POST['Tel_Pere'],$_POST['Date_de_Naissance'],$_POST['Lieu_de_Naissance'],$_POST['Adresse']);
    echo $result;exit;
}
if(isset($_POST['auth_delete_']) and !empty($_POST['auth_delete_']))
{
    header('Content-Type: application/json');
    $result=$remplire->delete_cdi_for_doubl("CDI",$_POST['auth_delete_']);
    echo $result;exit;
}
if(isset($_POST['auth_validation']) and !empty($_POST['auth_validation']))
{
    header('Content-Type: application/json');
    $result=$remplire->validation_indcontact($_POST['auth_validation']);
    echo $result;exit;
}
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
                            <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Contacts</h3>
                        </div><!-- /.box-header -->
                        <div style="padding: 1%;text-align: center">
                                <?php echo $remplira; ?>
                        </div>
                        <div class="box-body table-responsive ">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de contact</th>
                                    <th>Etablissement</th>
                                    <th>Marche</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Nature de Contact</th>
                                    <th>Dern Phoning</th>
                                    <th>Contact Suive Par</th>
                                    <th>Validation</th>
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
                                    <th>Date de contact</th>
                                    <th>Etablissement</th>
                                    <th>Marche</th>
                                    <th>Tel</th>
                                    <th>GSM</th>
                                    <th>E-Mail</th>
                                    <th>Nature de Contact</th>
                                    <th>Dern Phoning</th>
                                    <th>Contact Suive Par</th>
                                    <th>Validation</th>
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
<div class="modal fade" id="deletecontact" role="dialog">
    <div class="modal-dialog"  style="background: transparent;border: none !important;">
        <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

            <div class="modal-body" style="background: transparent;border: none !important;">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Comparison Des Contacts</h3>
                    </div>
                    <div class="text-center" id="loading">
                        <img src="dist\img\loading.gif" width="50px" class="block" />
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="nom">Nom</label>
                                    <input class="form-control" id="nom" name="nom" placeholder="Nom" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="prenom">Prenom</label>
                                    <input class="form-control" id="prenom" name="prenom" placeholder="Prenom" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="gsm">GSM</label>
                                    <input class="form-control" id="gsm" name="gsm" placeholder="GSM" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="tel">Tel</label>
                                    <input class="form-control" id="tel" name="tel" placeholder="Tel" type="text">
                                </div>

                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" id="email" name="email" placeholder="Email" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="date" class="text-danger">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="input-group"  style="width : 100%">
                                            <input class="form-control" id="date" name="date" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                        </div>
                                    </div><!-- /.input group -->
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label class="text-danger">Groupe formation</label>
                                    <input type="text" class="form-control" name="groupe_foramation" id="groupe_foramation">

                                </div><!-- /.form-group -->
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="formationdemandee" class="text-danger">Formation demandee</label>
                                    <input type="text" id="formationdemandee" name="formationdemandee" class="form-control " style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="naturecontact">Nature de contact</label>
                                    <input type="text" id="naturecontact" name="naturecontact" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="ville">Ville</label>
                                    <input id="ville" type="text" name="ville" class="form-control " style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="lycee" >Lycee / Etablissement</label>
                                    <input id="lycee" name="lycee" type="text" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important; font-size: 12px !important;">
                                    <label for="professeionpere">Profession pere</label>
                                    <input type="text" id="professeionpere" placeholder="Profession pere" name="professeionpere" class="form-control" style="width: 100%;" />
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="professeionmere">Profession mere</label>
                                    <input type="text" id="professeionmere" placeholder="Profession mere" name="professeionmere" class="form-control" style="width: 100%;" />

                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="telpere">Tel pere</label>
                                    <input class="form-control" id="telpere" name="telpere" placeholder="Tel pere" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="telmere">Tel mere</label>
                                    <input class="form-control" id="telmere" name="telmere" placeholder="Tel mere" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="mailpere">Mail pere</label>
                                    <input class="form-control" id="mailpere" name="mailpere" placeholder="mailpere" type="email">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="mailmere">Mail mere</label>
                                    <input class="form-control" id="mailmere" name="mailmere" placeholder="mail mere" type="email">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="datenaissance">Date Naissance</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="input-group"  style="width : 100%">
                                            <input class="form-control" id="datenaissance" name="datenaissance" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                        </div>
                                    </div><!-- /.input group -->
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="lieunaissance">Lieu de naissance</label>
                                    <input type="text" id="lieunaissance" name="lieunaissance" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <textarea class="form-control" rows="5" name="adresse" id="adresse"></textarea>
                                </div>

                                <div class="form-group" style="padding: 10px;">
                                    <a class="btn btn-primary inline" id="btn_add" style="margin-right: 5px;width: 50%" > Valider le contact </a>
                                    <a class="btn btn-danger inline" id="btn_delete" style="margin-right: 5px;width: 50%" > Supprimer </a>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="nom1">Nom</label>
                                    <input class="form-control" id="noma" name="noma" placeholder="Nom" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="prenom">Prenom</label>
                                    <input class="form-control" id="prenoma" name="prenoma" placeholder="Prenom" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="gsm">GSM</label>
                                    <input class="form-control" id="gsma" name="gsma" placeholder="GSM" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="tel">Tel</label>
                                    <input class="form-control" id="tela" name="tela" placeholder="Tel" type="text">
                                </div>

                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" id="emaila" name="emaila" placeholder="Email" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="date" class="text-danger">Date</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="input-group"  style="width : 100%">
                                            <input class="form-control" id="datea" name="datea" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                        </div>
                                    </div><!-- /.input group -->
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label class="text-danger">Groupe formation</label>
                                    <input type="text" class="form-control" name="groupe_foramationa" id="groupe_foramation">

                                </div><!-- /.form-group -->
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="formationdemandee" class="text-danger">Formation demandee</label>
                                    <input type="text" id="formationdemandeea" name="formationdemandeea" class="form-control " style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="naturecontact">Nature de contact</label>
                                    <input type="text" id="naturecontacta" name="naturecontacta" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="ville">Ville</label>
                                    <input id="villea" type="text" name="villea" class="form-control " style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="lycee" >Lycee / Etablissement</label>
                                    <input id="lyceea" name="lyceea" type="text" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group" style="width: 100% !important; font-size: 12px !important;">
                                    <label for="professeionpere">Profession pere</label>
                                    <input type="text" id="professeionperea" placeholder="Profession pere" name="professeionperea" class="form-control" style="width: 100%;" />
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="professeionmere">Profession mere</label>
                                    <input type="text" id="professeionmerea" placeholder="Profession mere" name="professeionmerea" class="form-control" style="width: 100%;" />

                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="telpere">Tel pere</label>
                                    <input class="form-control" id="telperea" name="telperea" placeholder="Tel pere" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="telmere">Tel mere</label>
                                    <input class="form-control" id="telmerea" name="telmerea" placeholder="Tel mere" type="text">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="mailpere">Mail pere</label>
                                    <input class="form-control" id="mailperea" name="mailperea" placeholder="mailpere" type="email">
                                </div>
                                <div class="input-group input-group-sm" style="width: 100% !important;">
                                    <label for="mailmere">Mail mere</label>
                                    <input class="form-control" id="mailmerea" name="mailmerea" placeholder="mail mere" type="email">
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="datenaissance">Date Naissance</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <div class="input-group"  style="width : 100%">
                                            <input class="form-control" id="datenaissancea" name="datenaissancea" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                        </div>
                                    </div><!-- /.input group -->
                                </div>
                                <div class="form-group" style="width: 100% !important;">
                                    <label for="lieunaissance">Lieu de naissance</label>
                                    <input type="text" id="lieunaissancea" name="lieunaissancea" class="form-control" style="width: 100%;">
                                </div>
                                <div class="form-group">
                                    <label for="adresse">Adresse</label>
                                    <textarea class="form-control" rows="5" name="adressea" id="adressea"></textarea>
                                </div>

                                <div class="form-group" style="padding: 10px;">
                                    <a class="btn btn-primary inline" id="btn_adda" style="margin-right: 5px;width: 50%" > Valider le contact </a>
                                    <a class="btn btn-danger inline" id="btn_deletea" style="margin-right: 5px;width: 50%" > Supprimer </a>
                                </div>
                            </div><!-- /.form-group -->
                        </div>
                    </div>

            </div>
        </div>
        <!--            <div class="modal-footer">-->
        <!--                <a class="btn btn-default" data-dismiss="modal">Close</a>-->
        <!--            </div>-->
    </div>
    </div>
</div>


<?php include "content/modules/footer-inc.php"; ?>
<?php
}
}

?>
<script>
    var datatableinst = $('#example4').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": false,
        "searchable": false,
        "ordering": false,
        "info": false,
        "autoWidth": false
    });
    $('#example4 tfoot th').each(function(){
        var title = $('#example4 thead th').eq($(this).index()).text();
        $(this).html('<input style="width:100%;" type="text" placeholder="Chercher '+title+'"/>');
    });
    datatableinst.columns().every(function(){
        var datatabbleColumn=this;
        $(this.footer()).find("input").on('keyup change',function(){
            datatabbleColumn.search(this.value).draw();
        });
    });
</script>