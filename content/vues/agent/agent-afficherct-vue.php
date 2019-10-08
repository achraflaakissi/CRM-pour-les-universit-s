<?php
if(isset($_GET['type']) and isset($_GET['auth']) and isset($_GET['campagne']) and !empty($_GET['type']) and !empty($_GET['auth']) and !empty($_GET['campagne']) )
{
    if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('agent'.$salt)) ){
        if(isset($_POST['date_rdv']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.rendez-vous.php');
            $RendezVous=new RendezVous();
            $RendezVous->setDate($_POST['date_rdv']);
            $RendezVous->setHeure($_POST['heure_rdv']);
            $RendezVous->setUser($_SESSION['user']['id']);
            $RendezVous->setIdContact($_POST['id_rdv']);
            $RendezVous->setTypeContact($_POST['campagne_rdv']);
            echo $RendezVous->createrdv();
            exit;
        }
        if(isset($_POST['campagnetest']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.remlpiration.php');
            $remplir=new rempliration();
            $remplir=$remplir->updatecampagne($_POST['campagnetest'],$_POST['observation'],$_POST['ntel'],$_POST['nemail'],$_POST['etapephoning'],$_POST['idid']);
            echo $remplir;
            exit;
        }
            require('content/controller/class.remlpiration.php');
            $remplir=new rempliration();
            $remplir=$remplir->getcampagnebyuser($_GET['campagne'],$_GET['auth'],$_GET['type']);
        include "content/modules/header-inc.php";
        ?>

        <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include "content/modules/sidebar-inc.php"; ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Liste de Campagne : </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom et prénom</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" id="nom" type="text" value="<?php echo $remplir['Nom'];?>" readonly="">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" value="<?php echo $remplir['Prenom'];?>" id="prenom" type="text" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nature du contact</label>
                                    <input class="form-control" value="<?php echo $remplir['Nature_de_Contact'];?>"  id="nature_contact" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ville adresse</label>
                                    <input class="form-control col-md-6" value="<?php echo $remplir['Ville'];?>"  id="ville" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ville lycée</label>
                                    <input class="form-control col-md-6" value="<?php echo $remplir['Ville_Lycee'];?>" id="ville_lycee" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Formation</label>
                                    <input class="form-control col-md-6" value="<?php echo $remplir['Formation'];?>" id="formation_demandee" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Niveau études</label>
                                    <input class="form-control col-md-6" value="<?php echo $remplir['Niveau_des_etudes'];?>"  id="niveau_etudes" type="text" readonly="">
                                </div>

                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Téléphone</label>
                                    <div class="input-group">
                                        <input class="form-control " value="<?php echo $remplir['Tel'];?>" id="telephone" type="text" readonly="">
                                        <a class="input-group-addon phone link-gsm" onclick="changecolor('telesip');" id="telesip" ><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tél. Pére</label>
                                    <div class="input-group">
                                        <input class="form-control "  value="<?php echo $remplir['Tel_Pere'];?>"  id="tel_pere" type="text" readonly="">
                                        <a id="telpereesip" onclick="changecolor('telpereesip');" class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tél. Mère</label>
                                    <div class="input-group">
                                        <input class="form-control "  value="<?php echo $remplir['Tel_Mere'];?>"  id="tel_mere" type="text" readonly="">
                                        <a id="telemeresip" onclick="changecolor('telemeresip');" class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                                    <div class="input-group">
                                        <input class="form-control " id="email" value="<?php echo $remplir['Email'];?>"  type="text" readonly="">
                                        <a href="#" class="input-group-addon phone link-email"><span class="fa fa-envelope"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Adresse</label>
                                    <div class="input-group">
                                        <input class="form-control " id="adresse"  value="<?php echo $remplir['Adresse'];?>"  type="text" readonly="">
                                        <a href="#" class="input-group-addon phone link-email"><span class="fa fa-home"></span></a>
                                    </div>
                                </div>
                                <div class="panel panel-default push-up-20" style="margin-bottom: 0px;">
                                    <div class="panel-body">
                                        <h4>Remplissez le champ ci-dessous avant d'enregistrer</h4>
                                        <div class="form-group">
                                            <label for="etatpephonig" class="control-label">Etape Phoning</label>
                                            <div class="form-group">
                                                <select class="form-control" id="etatpephonig">
                                                    <?php echo $remplir['etphoning'];?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input class="form-control " placeholder="Nouveau Email" value="<?php echo $remplir['Nemail'];?>" id="nemail" type="text" >
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control " value="<?php echo $remplir['Ntel'];?>" placeholder="Nouveau Tel" id="ntel" type="text" >
                                                <a id="telnv" onclick="changecolor('telnv');"  class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea id="observation" class="form-control" cols="5" placeholder="Observation...">
                                                	<?php echo $remplir['Observations'];?>
                                                </textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="box-footer">
                        <a href="#createrdv" class="btn btn-primary" data-toggle="modal">Nouveau rendez-vous</a>
                        <button class="btn btn-danger pull-right" onclick="getfichecontact('<?php echo $remplir['Campage'];?>',5,'<?php echo $remplir['id'];?>')" id="btn-save" ><span class="fa fa-share"></span> Mettre à jour la fiche </button>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <div class="modal fade" id="scriptes" role="dialog">
        <div class="modal-dialog"  style="background: transparent;border: none !important;">
            <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                <div class="modal-body" style="background: transparent;border: none !important;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Scripte</h3>
                        </div>
                        <div class="box-body">
                            <div id="scripte_content">

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
    <div class="modal fade" id="createrdv" role="dialog">
        <div class="modal-dialog"  style="background: transparent;border: none !important;">
            <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                <div class="modal-body" style="background: transparent;border: none !important;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouveau rendez-vous</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Date Rendez-Vous :</label>
                                <input class="form-control " placeholder="Date Rendez-Vous " id="date_rdv" type="date" >
                            </div>
                            <div class="form-group">
                                <label>Heure Rendez-Vous :</label>
                                <input class="form-control " placeholder="Heure Rendez-Vous " id="heure_rdv" type="time" >
                            </div>
                            <div class="box-footer">
                                <button style="width: 30% !important;" id="btnrdv" class="btn btn-block btn-primary btn-sm pull-right">Nouveau rendez-vous</button>
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
    <script>
        $('#telesip').css("background-color","#50de9c");
        $('#telesip .fa').css("color","white");
        $('#telpereesip').css("background-color","#fff");
        $('#telpereesip .fa').css("color","#555");
        $('#telemeresip').css("background-color","#fff");
        $('#telemeresip .fa').css("color","#555");
        $('#telnv').css("background-color","#fff");
        $('#telnv .fa').css("color","#555");
    </script>
    <?php

    }
}
}
else
{
    header("/.");
} 
?>