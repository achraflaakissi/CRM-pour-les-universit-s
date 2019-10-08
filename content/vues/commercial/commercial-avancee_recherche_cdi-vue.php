<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
if(isset($_POST['validation_selection']))
{
    if(isset($_POST['validation_selection']) and !empty($_POST['validation_selection']) and isset($_POST['validation_selection_id']) and !empty($_POST['validation_selection_id']) )
    {
        header('Content-Type: application/json');
        require('content/controller/class.contact-indirecte.php');
        $contact_indirect = new contact_indirecte();
        $getvalue=$contact_indirect->validation_of_phoning($_POST['validation_selection_id'],$_POST['validation_selection']);
        echo $getvalue;exit;
    }
    else
    {
        return json_encode(array('validation'=>false));
    }
}

require('content/controller/class.remlpiration.php');
$remplir=new rempliration();
$remplir=$remplir->getlistcontactindirectavancee();
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
                        <div class="box-body table-responsive ">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Marche</th>
                                    <th>Date de contact</th>
                                    <th>Tel</th>
                                    <th>E-Mail</th>
                                    <th>Nature de Contact</th>
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
                                    <th>Tel</th>
                                    <th>E-Mail</th>
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