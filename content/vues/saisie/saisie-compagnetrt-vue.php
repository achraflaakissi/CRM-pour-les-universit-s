<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('saisie'.$salt)) ){
    if(isset($_POST['validation_selection']))
        {
            if(isset($_POST['validation_selection']) and !empty($_POST['validation_selection']) and isset($_POST['validation_selection_id']) and !empty($_POST['validation_selection_id']) )
            {
                header('Content-Type: application/json');
                if($_POST['validation_selection_type']=="CDI")
                {
                    require('content/controller/class.contact-indirecte.php');
                    $contact_indirect = new contact_indirecte();
                    $getvalue=$contact_indirect->validation_of_phoning($_POST['validation_selection_id'],$_POST['validation_selection'],$_POST['validation_selection_cmp'],$_POST['validation_selection_cmp']);
                echo $getvalue;exit;
                }
                else if($_POST['validation_selection_type']=="CD")
                {
                    require('content/controller/class.contact-direct.php');
                    $contact_direct = new ContactDirect();
                    $getvalue=$contact_direct->validation_of_phoning($_POST['validation_selection_id'],$_POST['validation_selection'],$_POST['validation_selection'],$_POST['validation_selection_cmp']);
                echo $getvalue;exit;
                }
               
            }
            else
            {
                return json_encode(array('validation'=>false));
            }
        }
        require('content/controller/class.remlpiration.php');
        $remplir=new rempliration();
        $remplir=$remplir->GetCmpComtDetail($_GET['campagne']);
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
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Liste des campagnes traitées</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive ">
                                    <table id="example4" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <?php if($_SESSION['user']['otr_cmp']==0)
            { ?>
                                            <th>Nom de campagne</th>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Marche</th>
                                            <th>Tel</th>
                                            <th>E-Mail</th>
                                            <th>Nouveau Tel</th>
                                            <th>Nouveau E-Mail</th>
                                            <th>Etape Phoning</th>
                                            <th>Dern Phoning</th>
                                            <th>Observations</th>
											<?php 
											}
											if($_SESSION['user']['otr_cmp']==1)
            { ?>
			<th>Nom de campagne</th>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Marche</th>
                                            <th>Tel</th>
                                            <th>E-Mail</th>
                                            <th>Nouveau Tel</th>
                                            <th>Nouveau E-Mail</th>
                                            <th>Etape Phoning</th>
                                            <th>Dern Phoning</th>
                                            <th>Observations</th>
                                            <th>Statut Phoning</th>
                                            <th>Etape Phoning 1</th>
                                            <th>Etape Phoning 2</th>
                                            <th>Etape Phoning 3</th>
                                            <th>Etape Phoning 4</th>
                                            <th>Etape Phoning 5</th>
                                            <th>Etape Phoning 6</th>
                                            <th>Etape Phoning 7</th>
                                            <th>Etape Phoning 8</th>
                                            <th>Etape Phoning 9</th>
                                            <th>Etape Phoning 10</th>
											<?php 
											}
											?>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $remplir; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <?php if($_SESSION['user']['otr_cmp']==0)
            { ?>
                                            <th>Nom de campagne</th>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Marche</th>
                                            <th>Tel</th>
                                            <th>E-Mail</th>
                                            <th>Nouveau Tel</th>
                                            <th>Nouveau E-Mail</th>
                                            <th>Etape Phoning</th>
                                            <th>Dern Phoning</th>
                                            <th>Observations</th>
											<?php 
											}
											if($_SESSION['user']['otr_cmp']==1)
            { ?>
			<th>Nom de campagne</th>
                                            <th>Type</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Marche</th>
                                            <th>Tel</th>
                                            <th>E-Mail</th>
                                            <th>Nouveau Tel</th>
                                            <th>Nouveau E-Mail</th>
                                            <th>Etape Phoning</th>
                                            <th>Dern Phoning</th>
                                            <th>Observations</th>
                                            <th>Statut Phoning</th>
                                            <th>Etape Phoning 1</th>
                                            <th>Etape Phoning 2</th>
                                            <th>Etape Phoning 3</th>
                                            <th>Etape Phoning 4</th>
                                            <th>Etape Phoning 5</th>
                                            <th>Etape Phoning 6</th>
                                            <th>Etape Phoning 7</th>
                                            <th>Etape Phoning 8</th>
                                            <th>Etape Phoning 9</th>
                                            <th>Etape Phoning 10</th>
											<?php 
											}
											?>
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