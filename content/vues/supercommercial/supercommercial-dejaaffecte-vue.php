<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('supercommercial'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        $remplir=$remplir->getlistcontactdirectsupercommercial();
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box table-responsive">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Contacts</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="example5" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date de contact</th>
                                            <th>E-Mail</th>
                                            <th>Telephone</th>
                                            <th>GSM</th>
                                            <th>Nature de Contact</th>
                                            <th>Observation</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                                        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
                                        $resu = $bdd->query("SELECT `Nom`,`id`,Tel,GSM,`Observation`,`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact`  FROM contact_direct  where Reçu_par=100 and Contact_Suivi_par is not null and  Contact_Suivi_par<> ''  ORDER BY id DESC");
                                        $resu = $resu->fetchAll();
                                        foreach($resu as $donner)
                                        { ?>
                                            <tr onclick="window.open('https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']); ?>');" >
                                                <td>#</td>
                                                <td><?php echo $donner['Nom']; ?></td>
                                                <td><?php echo $donner['Prenom']; ?></td>
                                                <td><?php echo $donner['date_du_contact']; ?></td>
                                                <td><?php echo $donner['E-Mail']; ?></td>
                                                <td><?php echo $donner['Tel']; ?></td>
                                                <td><?php echo $donner['GSM']; ?></td>
                                                <td><?php echo $donner['Nature_de_Contact']; ?></td>
                                                <td><?php echo $donner['Observation']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                            
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Date de contact</th>
                                            <th>E-Mail</th>
                                            <th>Telephone</th>
                                            <th>GSM</th>
                                            <th>Nature de Contact</th>
                                            <th>Observation</th>
                                           
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