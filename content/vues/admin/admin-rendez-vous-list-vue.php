<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
require('content/controller/class.rendez-vous.php');
$RendezVous=new RendezVous();
$listrdv=$RendezVous->listrdveft();
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
                                    <th>État</th>
                                    <th>Agent</th>
                                    <th>Commercial</th>
                                    <th>Campagne</th>
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
                                    <th>État</th>
                                    <th>Agent</th>
                                    <th>Commercial</th>
                                    <th>Campagne</th>
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
<div class="modal fade" id="detail" role="dialog">
    <div class="modal-dialog"  style="background: transparent;border: none !important;">
        <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

            <div class="modal-body" style="background: transparent;border: none !important;">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Rendez-Vous</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Type :</label>
                            <input class="form-control " readonly id="contact_afficher" type="text" >
                        </div>
                        <div class="form-group">
                            <label>Contact :</label>
                            <input class="form-control " readonly id="nom_contact_afficher" type="text" >
                        </div>

                        <div class="form-group">
                            <label>Date :</label>
                            <input class="form-control " readonly id="date_afficher" type="text" >
                        </div>
                        <div class="form-group">
                            <label>Heure :</label>
                            <input class="form-control " readonly id="heure_afficher" type="text" >
                        </div>
                        <div class="form-group">
                            <label>Etat :</label>
                            <input class="form-control " readonly id="rdv_effectuer_afficher" type="text" >
                        </div>
                        <div class="form-group">
                            <label>Commercial :</label>
                            <input class="form-control " readonly id="commercial_afficher" type="text" >
                        </div>
                        <div class="form-group">
                            <label>Observation :</label>
                            <textarea name="observation_afficher" readonly id="observation_afficher" rows="5" style="width:100%;">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Date Saisie :</label>
                            <input class="form-control " readonly id="date_saisie_afficher" type="text" >
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