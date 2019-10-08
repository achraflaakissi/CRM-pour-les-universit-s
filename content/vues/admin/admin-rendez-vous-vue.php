<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
require('content/controller/class.rendez-vous.php');
$RendezVous=new RendezVous();
$listrdv=$RendezVous->listrdv();
if(isset($_POST['typerdv']))
{
    header('Content-Type: application/json');
    $effectuerrdv=$RendezVous->effectuerrdv($_POST['idrdv'],$_POST['typerdv'],$_POST['observation'],$_POST['commercial']);
    echo $effectuerrdv;exit;
}
if(isset($_GET['rdv']))
{
    $rdvbyid=$RendezVous->rdvbyid($_GET['rdv']);
}
include "content/modules/header-inc.php";
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <?php
                    if(isset($rdvbyid))
                    {
                        echo $rdvbyid;
                    }
                    ?>
                </div>
            </div>
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
                                    <th>Type</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Agent</th>
                                    <th>Campagne</th>
                                    <th>Date Saisie</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php echo $listrdv; ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Type</th>
                                    <th>Contact</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Agent</th>
                                    <th>Campagne</th>
                                    <th>Date Saisie</th>
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