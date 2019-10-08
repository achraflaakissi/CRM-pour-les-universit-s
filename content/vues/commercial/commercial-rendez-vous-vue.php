<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
require('content/controller/class.remlpiration.php');
$remplir=new rempliration();
if(isset($_POST['valifdation_rdv']) and isset($_POST['valifdation_rdv_id']))
{
    header('Content-Type: application/json');
    echo $remplir->validation_auto_rdv($_POST['valifdation_rdv_id'],$_POST['valifdation_rdv']);exit;
}
$listrdv=$remplir->get_all_rendez_vous_current_auto_user();
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
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Campagne</th>
                                    <th>Observation</th>
                                    <th>Etat</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php echo $listrdv; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Date</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Campagne</th>
                                    <th>Observation</th>
                                    <th>Etat</th>
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