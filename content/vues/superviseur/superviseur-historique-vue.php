<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        
        $remplir_value=$remplir->get_rappel_CD($_GET['id']);
        $remplir_value_cd=$remplir->get_histo_contact_CD($_GET['id']);
        $remplir_value_cd_liste=$remplir->get_histo_appel_contact_CD($_GET['id']);
        //$remplir=$remplir->get_appel_CD($id);
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
            <style>
                .bigger
                {
                    font-size : 16px;
                    padding : 5px;
                }
            </style>
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box table-responsive">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Contact</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <row>
                                        <?php echo $remplir_value_cd; ?>
                                    </row>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div> 
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                        <div class="col-md-6">
                            <div class="box table-responsive">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Rappels</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Etape Phoning</th>
                                            <th>Observation</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>TA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $remplir_value; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Etape Phoning</th>
                                            <th>Observation</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>TA</th>
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
                        <div class="col-md-12">
                            <div class="box table-responsive">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Rappels</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Date saisie</th>
                                            <th>Agents</th>
                                            <th>Campagne</th>
                                            <th>Observation</th>
                                            <th>Rendez Vous</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Type Rendez Vous</th>
                                            <th>Contact Suivi Par</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $remplir_value_cd_liste; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Status</th>
                                            <th>Date saisie</th>
                                            <th>Agents</th>
                                            <th>Campagne</th>
                                            <th>Observation</th>
                                            <th>Rendez Vous</th>
                                            <th>Date</th>
                                            <th>Heure</th>
                                            <th>Type Rendez Vous</th>
                                            <th>Contact Suivi Par</th>
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
        function desaffecter(id_contact)
        {
                     $.ajax({
                         type:'POST',
                        data:{ 
                            'desaffecter_id' : id_contact
                        },
                        success:function(data)
                        {
                           $("#sp_"+id_contact).html("non");
                            alert(" Opération effectuée avec succès … ");
                        }
                    });
            return false;
        }
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