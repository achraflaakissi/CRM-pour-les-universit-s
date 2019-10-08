<?php

if(isset($_SESSION['user'])) {
include('content/config.php');
if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
require('content/controller/class.remlpiration.php');
$remplir=new rempliration();
if(isset($_POST['auth']))
{
    if(isset($_POST['id_contact']) and !empty($_POST['id_contact']) and isset($_POST['auth']) and !empty($_POST['auth']) and isset($_POST['Etape_phoning']) and !empty($_POST['Etape_phoning']) and isset($_POST['type']) and !empty($_POST['type']) )
    {
        header('Content-Type: application/json');
        if($_POST['type']=="CDI")
        {
            require('content/controller/class.contact-indirecte.php');
            $contact_indirect = new contact_indirecte();
            $getvalue=$contact_indirect->validation_of_phoning_rappel($_POST['id_contact'],$_POST['Etape_phoning']);
            $remplir->change_qualification($_POST['auth']);
            echo $getvalue;exit;
        }
        else if($_POST['type']=="CD")
        {
            require('content/controller/class.contact-direct.php');
            $contact_direct = new ContactDirect();
            $getvalue=$contact_direct->validation_of_phoning_rappel($_POST['id_contact'],$_POST['Etape_phoning']);
            $remplir->change_qualification($_POST['auth']);
            echo $getvalue;exit;
        }

    }
    else
    {
        return json_encode(array('validation'=>false));
    }
}

$remplir=$remplir->qualification_rappel();
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
                                        <th>Type</th>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Tel</th>
                                        <th>E-Mail</th>
                                        <th>Nature de Contact</th>
                                        <th>Marche</th>
                                        <th>Date d'Appel</th>
                                        <th>Heure d'Appel</th>
                                        <th>Observation</th>
                                        <th>Agent</th>
                                        <th>Etape Phoning Actuelle</th>
                                        <th>Etape Phoning de Rappel</th>
                                        <th>Selection</th>
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
                                    <th>Tel</th>
                                    <th>E-Mail</th>
                                    <th>Nature de Contact</th>
                                    <th>Marche</th>
                                    <th>Date d'Appel</th>
                                    <th>Heure d'Appel</th>
                                    <th>Observation</th>
                                    <th>Agent</th>
                                    <th>Etape Phoning Actuelle</th>
                                    <th>Etape Phoning de Rappel</th>
                                    <th>Selection</th>
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