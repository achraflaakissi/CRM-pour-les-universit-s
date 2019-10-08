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
                                        $resu = $bdd->query("SELECT cd.`Nom`,cd.`id`,Tel,GSM,`Observation`,cd.`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact` FROM contact_direct cd where Reçu_par=100  and (Contact_Suivi_par='' or Contact_Suivi_par is null) and ((SUBSTRING_INDEX(Observation,'#',2) like '%)NA%' or SUBSTRING_INDEX(Observation,'#',2) like '%) NA%'  ) and `Reçu_par`=100 and date_du_contact>'2017-07-27') and Observation not like '%intéressée%' and Observation not like '%intéressé%' and Observation not like '%intéresser%' and Observation not like '%la%sœur%' and Observation not like '%père%' and Observation not like '%mère%' ORDER BY id DESC");
                                        //SELECT cd.`Nom`,cd.`id`,Tel,GSM,`Observation`,cd.`Prenom`,`E-Mail`,`date_du_contact`,`Tel`,`GSM`,`Nature_de_Contact` FROM contact_direct cd where Reçu_par=100 and (trim(Observation) like '#%NRP' or trim(Observation) like '#%boite vocale' )  ORDER BY id DESC    
                                        $resu = $resu->fetchAll();
                                        //select distinct SUBSTRING_INDEX(SUBSTRING_INDEX(observation, '#', 2),'#',-1),Observation from contact_direct
                                        foreach($resu as $donner)
                                        {
                                            //?page=auto_cmp_from_tr&type_contact=CD&id='.md5($donner['id']).
                                            ?>
                                            <tr>
                                                
                                                <td onclick='window.open("https://crm.myupm.net/?page=auto_cmp_from_tr&type_contact=CD&id=<?php echo md5($donner['id']); ?>");'><img style="width: 40px;" src="dist/img/Dialer-icon.png" /></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");' ><?php echo $donner['Nom']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");' ><?php echo $donner['Prenom']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['date_du_contact']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['E-Mail']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['Tel']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['GSM']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['Nature_de_Contact']; ?></td>
                                                <td onclick='window.open("https://crm.myupm.net/?page=contactd&id=<?php echo md5($donner['id']);  ?>");'><?php echo $donner['Observation']; ?></td>
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
                            <!-- /.box-footer -->
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