<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
if(isset($_POST['list_ids']))
{
 	include('content/config.php');
 	header('Content-Type: application/json');
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $req = $bdd->query("Update contact_indirect set centre='".$_POST['nom_etb']."' where id in ".$_POST['list_ids']);
	echo json_encode(array('validation'=>true));
	exit;
}
require('content/controller/class.remlpiration.php');
$remplir=new rempliration();
$remplir=$remplir->getlistcontactindirect2();
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
                        <select id="etb">
			<option>Casablanca</option>
			<option>Marrakech</option>
			</select>
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
                                    <th>Ville</th>
                                    <th>Nature de Contact</th>
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
                                    <th>Ville</th>
                                    <th>Nature de Contact</th>
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
		    
                "paging": false,
                "lengthChange": false,
                "searching": true,
                "searchable": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
				"bPaginate": false,
				"bLengthChange": false,
				"bFilter": true,
				"bInfo": true,
				'bSortable': false,
				"bAutoWidth": false
            });
          $('#example4 thead th').each(function(){
                var title = $('#example4 thead th').eq($(this).index()).text();
				if(title!="")
				{
					$(this).html('<input style="width:100%;" type="text" placeholder="'+title+'"/>');
				}
            });
            datatableinst.columns().every(function(){
                var datatabbleColumn=this;
                $(this.header()).find("input[type=text]").on('keyup change',function(){
                    datatabbleColumn.search(this.value).draw();
                });
            });
</script>