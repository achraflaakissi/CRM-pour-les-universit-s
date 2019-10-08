<?php
$_GET['id']=1;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        if(isset($_POST['desaffecter_id']))
        {
            $remplir=$remplir->update_desaffectation($_POST['desaffecter_id']);
            echo 'ok';
            exit;
        }
        $getMarche=$remplir->getFunctions("getMarche");
        $getNatureContact=$remplir->getFunctions("getNatureContact");
        $getCommercial=$remplir->getFunctions("getCommercial");
        if(isset($_POST['Nom']))
        {
                $remplir=$remplir->getlistcontactdirect("Filtrer",$_POST['Nom'],$_POST['Prenom'],$_POST['Tel'],$_POST['GSM'],$_POST['nature_contact'],$_POST['Contact_Suivi_Par'],$_POST['Nom_Commencant'],$_POST['Marche'],$_POST['Test'],$_POST['Date_Affectation'],$_POST['Inscrit'],$_POST['Date_du_contact'],$_POST['Test_passe']);
            echo $remplir;exit;
        }
        $test = $remplir->getFunctions('gettest',$_GET['id'],'D');
        $remplir=$remplir->getlistcontactdirect("Vide","","","","","","","","","","","","","");
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="box">
                        
                        <div class="box-header with-border">
                            <i class="fa fa-bullhorn"></i> <h3 class="box-title"> Filtrer ( NB : Pour afficher toute la liste des contacts merci de cliquer directement sur le button Filtrer )</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Nom :</label>
                                        <span id="selection">
                                            <input id="Nom" class="form-control" data-placeholder="Nom ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Prenom :</label>
                                        <span id="selection">
                                            <input id="Prenom" class="form-control" data-placeholder="Prenom ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Nature de contact :</label>
                                        <span id="selection">
                                            <select onchange="" id="nature_contact" class="form-control" data-placeholder="Nature de contact ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getNatureContact; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Marche :</label>
                                        <span id="selection">
                                            <select onchange="" id="Marche" class="form-control" data-placeholder="Marche ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getMarche; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Tel :</label>
                                        <span id="selection">
                                            <input id="Tel" class="form-control" data-placeholder="Tel ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">GSM :</label>
                                        <span id="selection">
                                            <input id="GSM" class="form-control" data-placeholder="GSM ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Contact Suivi Par :</label>
                                        <span id="selection">
                                             <select onchange="" id="Contact_Suivi_Par" class="form-control" data-placeholder="Contact Suivi Par ..." style="width: 100%;">
                                                <option value=""></option>
                                                <?php echo $getCommercial; ?>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Le Nom Commençe Par :</label>
                                        <span id="selection">
                                            <input id="Nom_Commencant" class="form-control" data-placeholder="Le Nom Commençant Par..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Test</label>
                                        <select class="form-control select2" id="test" style="width: 100%;">
                                            <?php echo $test; ?>
                                        </select>
                                        <!-- <input type="text"  class="form-control" id="test" required="required" value="<?php//  if(trim($contc[0]['test']!='Vide') and trim($contc[0]['test']!='vide')) {echo $contc[0]['test'];} ?>" style="width: 100%;"/> -->
                                       
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Date Affectation :</label>
                                        <span id="selection">
                                            <input id="date_affectation" type="date" class="form-control" data-placeholder="Date ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                 <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Inscrit :</label>
                                        <span id="selection">
                                             <select onchange="" id="inscrit" class="form-control" data-placeholder="Inscrit ..." style="width: 100%;">
                                                <option value=""></option>
                                                <option value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Date du contact :</label>
                                        <span id="selection">
                                            <input id="date_du_contact" type="date" class="form-control" data-placeholder="Date du contact ..." style="width: 100%;">
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group text-center">
                                        <img src="dist/img/loading.gif" class="loading" width="10%">
                                        <label class="pull-left">Test Passe :</label>
                                        <span id="selection">
                                             <select onchange="" id="test_passe" class="form-control" data-placeholder="Inscrit ..." style="width: 100%;">
                                                <option value=""></option>
                                                <option value="1">Oui</option>
                                                <option value="0">Non</option>
                                            </select>
                                        </span>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="text-center" id="btnfilter">
                                <img src="dist/img/loading.gif" width="5%">
                            </div>
                            <button onclick="FiltrerCD();" id="filtrer" class="btn btn-primary pull-right" style="width: 10%">Filtrer</button>
                        </div><!-- /.box-footer -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box table-responsive">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des Contacts</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body" id='table_body' >
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
         function activerdatatablesforme()
         {
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
         }
            
        </script>