<?php

include($_SERVER['DOCUMENT_ROOT'].'/content/controller/class.contact-direct.php');
include($_SERVER['DOCUMENT_ROOT'].'/content/controller/class.contact-indirecte.php');
include($_SERVER['DOCUMENT_ROOT'].'/content/controller/class.Remplissage.php');
include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/content/controller/class.remlpiration.php');
$remplire=new Remplissage();

$remplis = new Remplissage();
$contactdirect = new ContactDirect();
include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options);







$cis = $contactdirect->Allcontacts()->fetchAll();





$resul=null;

if(isset($_POST['rech']))
{




    $sql='SELECT c.id, c.Civilite, CONCAT( u.nom, CONCAT(  " ", u.prenom ) ) AS Contact_Suivi_par, c.Etablissement, c.Nom, c.Prenom, `E-Mail` , c.GSM, c.Tel, c.Formation_Demmandee, c.Nature_de_Contact, c.Annee_Univ, c.Ville, c.Tel_Pere,  c.Tel_Mere, valide,test,Marche
            FROM contact_direct c
            LEFT JOIN users u ON u.id = c.Contact_Suivi_par
            WHERE valide =0 ';
    if($_POST['nom']!="")
    {
        $sql.='and c.nom like "%'.$_POST['nom'].'%" ';
    }
    if($_POST['prenom']!="")
    {
        $sql.='and  c.prenom like "%'.$_POST['prenom'].'%" ';
    }
    if($_POST['tel']!="")
    {
        $sql.='and  Tel like "%'.$_POST['tel'].'%" ';
    }
    if($_POST['gsm']!="")
    {
        $ql.='and  GSM  like "%'.$_POST['gsm'].'%" ';
    }
    if($_POST['ville'] !="")
    {
        $sql.='and ville like "%'.$_POST['ville'].'%" ' ;
    }
    if($_POST['etablissmeent']!="")
    {
        $sql.=' and  Etablissement like "%'.$_POST['etablissmeent'].'%" ';
    }
    if($_POST['naturecontact']!="")
    {
        $sql.=' and  nature_de_contact like "%'.$_POST['naturecontact'].'%" ';
    }
    if($_POST['formationdemmande']!="")
    {
        $sql.=' and Formation_Demmandee like "%'.$_POST['formationdemmande'].'%" ';
    }
    if($_POST['suvipar']!="")
    {
        $sql.=' and u.nom  like "%'.$_POST['suvipar'].'%"';
    }
    if($_POST['marche']!="")
    {
        $sql.=' and Marche  like "%'.$_POST['marche'].'%"';
    }
    if(isset($_POST['check']))
    {

        if(isset($_POST['check'][0]))
        {

            $sql.=" and depot_dossier = 1 ";
        }
        if(isset($_POST['check'][1]))
        {
            $sql.=" and Frais_Dossier = 1 ";
        }
    }


    if($_POST['formationdemmande']=="" && $_POST['naturecontact']=="" &&  $_POST['etablissmeent']=="" && $_POST['villelycee']==""
        && $_POST['ville'] =="" &&  $_POST['gsm']=="" && $_POST['tel']=="" && $_POST['prenom']=="" && $_POST['nom']==""  &&  $_POST['marche']=="" && $_POST['check'][0]=="" && $_POST['check'][1]=="")
    {
        $sql='SELECT c.id, c.Civilite, CONCAT( u.nom, CONCAT(  " ", u.prenom ) ) AS Contact_Suivi_par, c.Etablissement, c.Nom, c.Prenom, `E-Mail` , c.GSM, c.Tel, c.Formation_Demmandee, c.Nature_de_Contact, c.Annee_Univ, c.Ville, c.Tel_Pere, c.Tel_Mere, valide,test,c.Marche
            FROM contact_direct c
            LEFT JOIN users u ON u.id = c.Contact_Suivi_par
            WHERE valide =0';
    }





    $resul = $bdd->query($sql);





}







if(isset($_POST['op']))
{
    foreach($_POST as $key=>$value)
    {
        if($_POST[$key]=="")
            $_POST[$key]=null;
    }
    if($_POST['op']=='s')
    {


        if($contactdirect->supprimercontact($_POST['id']))
        {
            echo  $_POST['id'];
        }


    }
    else if($_POST['op']=="up")
    {

        $contactdirect->setId(md5($_POST['id']));
        $contactdirect->setNom($_POST['nom']);
        $contactdirect->setPrenom($_POST['prenom']);
        $contactdirect->setTelephone($_POST['tel']);
        $contactdirect->setGsm($_POST['gsm']);
        $contactdirect->setEmail($_POST['email']);
        $contactdirect->setAnneeUniv($_POST['anneeniv']);
        $contactdirect->setVille($_POST['ville']);
        $contactdirect->setTelPere($_POST['telpere']);
        $contactdirect->setTelMere($_POST['telmere']);
        $contactdirect->setNatureContact($_POST['naturecontact']);
        $contactdirect->setFormationDemandee($_POST['formationdemande']);
        $contactdirect->setEtablissement($_POST['etablissement']);
        $contactdirect->setContactsuivipar($_POST['contactsuivipar']);
        $contactdirect->setMarche($_POST['marche']);
        $contactdirect->setValide($_POST['valide']);
        
        echo $contactdirect->Validercontactdirect();

    }
    exit;

}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Validations des contacts</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="plugins/assets/css/ace.min.css" />-->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <?php include "content/modules/sidebar-inc.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div id="alertsuuc" class="col-md-6 col-md-offset-3 alert alert-success alert-dismissable" style="display: none;">
                    <a href="#" class="close" >&times;</a>
                    Modification Avec Succes
                </div>
                <div class="col-md-12">
                    <div class="box">

                        <div class="box-header">
                            <h3 class="box-title">Liste des Contacts</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body" style="overflow: auto;">

                            </br>

                            </br>

                            <form class="form-inline"  method="post">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Suivi Par</label>
                                            <input type="text" class="form-control" placeholder="Nom ou Prenom" value="<?php if(isset($_POST['suvipar'])) echo $_POST['suvipar']; ?>" name="suvipar">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Nom</label>
                                            <input type="text" class="form-control" value="<?php if(isset($_POST['nom'])) echo $_POST['nom']; ?>" name="nom">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Prenom</label>
                                            <input type="text" class="form-control" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Tel</label>
                                            <input type="text" class="form-control" name="tel" value="<?php if(isset($_POST['tel'])) echo $_POST['tel']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >GSM</label>
                                            <input type="text" class="form-control" name="gsm" value="<?php if(isset($_POST['gsm'])) echo $_POST['gsm']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >E-Mail</label>
                                            <input type="text" class="form-control" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Ville</label>
                                            <input type="text" class="form-control" name="ville" value="<?php if(isset($_POST['ville'])) echo $_POST['ville']; ?>" >
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Etablissmeent</label>
                                            <input type="text" class="form-control" name="etablissmeent" value="<?php if(isset($_POST['etablissmeent'])) echo $_POST['etablissmeent']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Nature Contact</label>
                                            <input type="text" class="form-control" name="naturecontact" value="<?php if(isset($_POST['naturecontact'])) echo $_POST['naturecontact']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Formation demmandée</label>
                                            <input type="text" class="form-control" name="formationdemmande" value="<?php if(isset($_POST['formationdemmande'])) echo $_POST['formationdemmande']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label >Marche</label>
                                            <input type="text" class="form-control"  value="<?php if(isset($_POST['marche'])) echo $_POST['marche']; ?>" list="marche" name="marche" /><datalist id="marche" >
                                                <?php echo $remplire->getDataList("getMarche"); ?>
                                            </datalist>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-2">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="check[]"  <?php if(isset($_POST['check'][0])) echo "checked"; ?> value="dpot" >Depot de Dossier</label>
                                            </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="check[]" <?php if(isset($_POST['check'][1])) echo "checked"; ?>  value="frais" >Frais De dossier</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </br>
                                </br>
                                <div class="row"><div class="col-md-5"><input type="submit"  value="Chercher" class="btn btn-primary" name="rech" /></div></div>
                            </form>

                            </br>
                            </br>
                            </br>

                            <table id="contacts" class="table table-bordered table-striped">

                                </tr>
                                <thead>
                                <th><img src="dist/img/checkbox-icon.png" width="20px" height="20px" id="ckeckall" /></th>
                                <th>Suivi_par</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Tel</th>
                                <th>Gsm</th>
                                <th>Email</th>
                                <th>Ville</th>
                                <th>Etablissement</th>
                                <th>Année Univ</th>
                                <th>Tel Pere</th>
                                <th>Tel Mere</th>
                                <th>Nature Contact</th>
                                <th>Formation Demandée</th>
                                <th>Test</th>
                                <th>Marche</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(!isset($_POST['rech']))
                                {
                                    foreach($cis as $contactdir) { ?>
                                        <tr id="<?php echo $contactdir["id"]; ?>" >
                                            <td><input  id="<?php echo "check".$contactdir["id"]; ?>" type="checkbox" /></td>
                                            <td> <span><?php echo $contactdir["Contact_Suivi_par"]; ?></span> <input list="suivi_par"  id="suiv" value="<?php echo $contactdir["Contact_Suivi_par"]; ?>" onchange="this.value=this.value;" class="form-control" style="display: none;" >
                                                <datalist id="suivi_par" >
                                                    <?php echo $remplire->getDataList("getContactsuivipar"); ?>
                                                </datalist>
                                            </td>
                                            <td><span><?php echo $contactdir["Nom"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Nom"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["Prenom"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Prenom"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["Tel"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Tel"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["GSM"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactdir["GSM"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["E-Mail"]; ?></span><input  type="email" size="30" style="display: none;" value="<?php echo $contactdir["E-Mail"]; ?>" /></td>
                                            <td class="withsel<?php echo $contactdir["id"]; ?>"><span><?php echo $contactdir["Ville"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Ville"]; ?>" list="Ville" /> <datalist id="Ville" >
                                                    <?php echo $remplire->getDataList("getVille"); ?>
                                                </datalist></td>
                                            <td class="withsel<?php echo $contactdir["id"]; ?>" ><span><?php echo $contactdir["Etablissement"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Etablissement"]; ?>" list="Etablissement"/><datalist id="Etablissement" >
                                                    <?php echo $remplire->getDataList("getLyceeEtablissement"); ?>
                                                </datalist> </td>
                                            <td><span><?php echo $contactdir["Annee_Univ"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Annee_Univ"]; ?>" /> </td>
                                            <td><span><?php echo $contactdir["Tel_Pere"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Tel_Pere"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["Tel_Mere"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Tel_Mere"]; ?>" /></td>
                                            <td class="withsel<?php echo $contactdir["id"]; ?>"><span><?php echo $contactdir["Nature_de_Contact"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Nature_de_Contact"]; ?>" list="Nature_de_Contact" /><datalist id="Nature_de_Contact" >
                                                    <?php echo $remplire->getDataList("getNatureContact"); ?>
                                                </datalist></td>
                                            <td class="withsel<?php echo $contactdir["id"]; ?>"><span><?php echo $contactdir["Formation_Demmandee"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Formation_Demmandee"]; ?>" list="Formation_Demmandee"/><datalist id="Formation_Demmandee" >
                                                    <?php echo $remplire->getDataList("getFormationDemander"); ?>
                                                </datalist></td><td><span><?php echo $contactdir["test"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["test"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["Marche"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Marche"]; ?>" list="marche" /><datalist id="marche" >
                                                    <?php echo $remplire->getDataList("getMarche"); ?>
                                                </datalist></td>
                                                            </tr>
                                    <?php }
                                }
                                else
                                {
                                    foreach($resul->fetchAll() as $contactindir) { ?>
                                        <tr id="<?php echo $contactindir["id"]; ?>" >
                                            <td><img src="dist/img/checkbox-icon.png" width="20px" height="20px" id="ckeckall" /></td>
                                            <td> <span><?php echo $contactindir["Contact_Suivi_par"]; ?></span> <input list="suivi_par"  id="suiv" value="<?php echo $contactindir["Contact_Suivi_par"]; ?>" onchange="this.value=this.value;" class="form-control" style="display: none;" >
                                                <datalist id="suivi_par" >
                                                    <?php echo $remplire->getDataList("getContactsuivipar"); ?>
                                                </datalist>
                                            </td>
                                            <td><span><?php echo $contactindir["Nom"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Nom"]; ?>" /></td>
                                            <td><span><?php echo $contactindir["Prenom"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Prenom"]; ?>" /></td>
                                            <td><span><?php echo $contactindir["Tel"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Tel"]; ?>" /></td>
                                            <td><span><?php echo $contactindir["GSM"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactindir["GSM"]; ?>" /></td>
                                            <td><span><?php echo $contactindir["E-Mail"]; ?></span><input type="email" size="30"  style="display: none;" value="<?php echo $contactindir["E-Mail"]; ?>" /></td>
                                            <td class="withsel<?php echo $contactindir["id"]; ?>"><span><?php echo $contactindir["Ville"]; ?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Ville"]; ?>" list="Ville" /> <datalist id="Ville" >
                                                    <?php echo $remplire->getDataList("getVille"); ?>
                                                </datalist></td>
                                            <td class="withsel<?php echo $contactindir["id"]; ?>" ><span><?php echo $contactindir["Etablissement"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Etablissement"]; ?>" list="Etablissement"/><datalist id="Etablissement" >
                                                    <?php echo $remplire->getDataList("getLyceeEtablissement"); ?>
                                                </datalist> </td>
                                            <td><span><?php echo $contactindir["Annee_Univ"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Annee_Univ"]; ?>" /> </td>
                                            <td><span><?php echo $contactindir["Tel_Pere"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Tel_Pere"]; ?>" /></td>
                                            <td><span><?php echo $contactindir["Tel_Mere"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Tel_Mere"]; ?>" /></td>
                                            <td class="withsel<?php echo $contactindir["id"]; ?>"><span><?php echo $contactindir["Nature_de_Contact"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Nature_de_Contact"]; ?>" list="Nature_de_Contact" /><datalist id="Nature_de_Contact" >
                                                    <?php echo $remplire->getDataList("getNatureContact"); ?>
                                                </datalist></td>
                                            <td class="withsel<?php echo $contactindir["id"]; ?>"><span><?php echo $contactindir["Formation_Demmandee"];?></span><input type="text" style="display: none;" value="<?php echo $contactindir["Formation_Demmandee"]; ?>" list="Formation_Demmandee"/><datalist id="Formation_Demmandee" >
                                                    <?php echo $remplire->getDataList("getFormationDemander"); ?>
                                                </datalist></td>
                                           <td><span><?php echo $contactdir["test"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["test"]; ?>" /></td>
                                            <td><span><?php echo $contactdir["Marche"];?></span><input type="text" style="display: none;" value="<?php echo $contactdir["Marche"]; ?>" list="marche" /><datalist id="marche" >
                                                    <?php echo $remplire->getDataList("getMarche"); ?>
                                                </datalist></td>
</tr>

                                    <?php
                                    }
                                }?>


                                </tbody>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-danger" onclick="SupprimerSelection();" >Supprimer la selection</button>
                    <button type="button" class="btn btn-success" id="validall" onclick="validertous();">Valider Tous</button>
                    <button type="button" class="btn btn-primary" id="editall" onclick=" editall();"> Editer Tous</button>
                </div>
            </div>

        </section>
    </div>
</div>
<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
    var table1;
    $(".close").click(function()
    {
        $(this).closest("div").fadeOut(1000);
    });

    function editall()
    {
        $("#contacts tbody tr td").each(function() {
            //console.log($(this).attr("class"));


            if($(this).find("input[type=text],input[type=email]").css("display")=="none" &&  $(this).find("span").css("display")=="inline")
            {
                $(this).find("input[type=text],input[type=email]").show();
                $(this).find("span").hide();
            }
            else if($(this).find("input[list]").css("display")=="none" &&  $(this).find("span").css("display")=="inline")
            {
                $(this).find("input[list]").show();
                $(this).find("span").hide();
            }
        });
    }
    $("#ckeckall").click(function (){
        if($(this).attr("src") == "dist/img/checkbox-icon2.png") {
            $(this).attr("src", "dist/img/checkbox-icon.png");
            $("#contacts input[type=checkbox]").prop("checked",false);

        }
        else {
            $(this).attr("src", "dist/img/checkbox-icon2.png");

            $("#contacts input[type=checkbox]").prop("checked",true);
        }

    });

    $(document).ready(function (){
        datatable();
    })

    function datatable()
    {
        // Setup - add a text input to each footer cell
        $('#contacts thead th').each( function () {
            var title = $(this).text();
            if(title!="")
                $(this).html( '<input type="text" size="30%" placeholder="Chercher par  '+title+'" /><a href="#">'+title+'</a>');
        } );

        // DataTable
        var table = $('#contacts').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "bDestroy": true
        });

        // Apply the search
        table.columns().every( function () {
            var that = this;
            $( 'input', this.header() ).on( 'keyup change', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );

        return table;

    }





    function validertous()
    {
        var aa = $('#contacts tbody').find('input[type="checkbox"]:checked');
        var bien=false;
        var c=0;
        $("#contacts tbody tr td").each(function() {
            if(($(this).find("input[type=text]").css("display")=="inline" || $(this).find("input[type=text]").css("display")=="inline-block") &&  $(this).find("span").css("display")=="none")
            {
                //console.log("oui");
                $(this).find("input[type=text],input[type=email]").css("display","none");
                $(this).find("span").html($(this).find("input[type=text],input[type=email]").val());
                $(this).find("span").css("display","inline");
            }
            else if(($(this).find("input[list]").css("display")=="inline"  || $(this).find("input[list]").css("display")=="inline-block" ) &&  $(this).find("span").css("display")=="none")
            {
                // console.log("oui 23");
                $(this).find("input[list]").css("display","none");
                $(this).find("span").html($(this).find("input[list]").val());
                $(this).find("span").css("display","inline");
            }
        });
        var suivipar,nom,prenom,test,Tel,gsm,email,ville,villelycee,etablissmenet,anneuniv,telpere,telmere,naturecontact,formationdemande,etablissement,marche;
        for (var i = 0; i < aa.length; i++) {
            var id =aa[i].closest("tr").getAttribute("id");
            document.getElementById(id).style.display="none";
            suivipar=document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[1].children[1].value;
            nom = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[2].children[1].value;
            prenom = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[3].children[1].value;
            Tel = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[4].children[1].value;
            gsm = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[5].children[1].value;
            email = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[6].children[1].value;
            ville = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[7].children[1].value;
            etablissement = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[8].children[1].value;
            anneuniv = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[9].children[1].value;
            telpere = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[10].children[1].value;
            telmere = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[11].children[1].value;
            naturecontact = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[12].children[1].value;
            formationdemande = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[13].children[1].value;
            test= document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[14].children[1].value;
            marche = document.getElementById(aa[i].closest("tr").getAttribute("id")).cells[15].children[1].value;

            $.ajax({
                type: "POST",
                data: {
                    "op":"up",
                    "id":id,
                    "nom":nom,
                    "prenom":prenom,
                    "tel":Tel,
                    "gsm":gsm,
                    "email":email,
                    "ville":ville,
                    "villelycee":villelycee,
                    "etablissement":etablissement,
                    "anneeniv":anneuniv,
                    "telpere":telpere,
                    "telmere":telmere,
                    "naturecontact":naturecontact,
                    "formationdemande":formationdemande,
                    "contactsuivipar":suivipar,
                    "test":test,
                    "valide":1,
                    "marche":marche

                },
                success:function(data)
                {

                    $('html, body').animate({scrollTop: '0px'}, 300);
                    $("#alertsuuc").fadeIn(1000);

                }

            });
        }

    }
    /*document.getElementById('suiv').addEventListener('input', function () {
     console.log($(this).val());
     });*/
    function SupprimerSelection()
    {

        var aa = document.querySelectorAll("input[type=checkbox]:checked");
        var bien=false;
        for (var i = 0; i < aa.length; i++){
            //aa[i].checked = true;
            var id = aa[i].closest("tr").getAttribute("id");
            $.ajax({
                type: "POST",
                data: "op=s&id="+id,
                success:function(data)
                {
                    $('#'+data.trim()).closest("tr").css("display","none");
                }
            });
        }
    }


</script>
</body>
</html>