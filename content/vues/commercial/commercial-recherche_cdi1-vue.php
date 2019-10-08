<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
if(isset($_POST['list_ids']))
{
 	include('content/config.php');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("Update contact_indirect set Lycee='".$_POST['nom_etb']."' where id in ".$_POST['list_ids']);
	echo $_POST['list_ids'];exit;
}
require('content/controller/class.remlpiration.php');
$remplir=new rempliration();
$remplir=$remplir->getlistcontactindirect1();
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
                        <div class="box-body">
                        <input type="text" id="etb" />
                         <input type="button" onclick="affictation_etb()" value="Affecter" id="etb_btn" />
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                	<th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
                                    <th>Dern Phoning</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php echo $remplir; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><input id="checkAll" onchange="checkAll(this)" type="checkbox"></th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                     <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>E-Mail</th>
                                    <th>Etablissement</th>
                                    <th>Nature de Contact</th>
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
    var datatableinst = $('#example4').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "searchable": true,
        "ordering": true,
        "info": true,
        "autoWidth": true
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