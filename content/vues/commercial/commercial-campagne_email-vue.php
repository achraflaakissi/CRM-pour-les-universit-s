<?php
if(isset($_SESSION['user'])) {

    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        if(isset($_POST["myarray"]))
        {
            $value=$rempisage->add_email($_POST['ObservationEmail_cmp'],$_POST['email_cmp']);
            if($value<>"" and $value<>0)
            {
               foreach ($_POST["myarray"] as $contact)
                {
                    $rempisage->add_cmp_email($contact,$_POST["nomcompagne_myarray"],$_POST["typecontact_myarray"],$value);
                }
            }
            $mytest=false;
            $testest=count($_POST["myarray"]);
            $nbrd=0;
            $nbrf=30;
            while(!$mytest)
            {
                for($j=$nbrd;$j<$nbrf;$j++)
                {
                    $array=array();
                    array_push($array,$_POST["myarray"][$j]);
                    $values=$rempisage->get_liste_email_contact($_POST["typecontact_myarray"],$array);
                    require('content/controller/class.sendemail.php');
                    $send_email = new sendemail();
                    $send_email->setEmail($_POST['email_cmp']);
                    $send_email->setObjet($_POST['ObservationEmail_cmp']);
                    $send_email->Envoyeremailmassive($values);
                }
                if($nbrf==$testest)
                {
                    $mytest=true;
                }
                else
                {
                    if($testest-$nbrf+30<0)
                    {
                        $nbrd=$nbrf;
                        $nbrf=$testest;
                    }
                    else
                    {
                        $nbrd=$nbrf;
                        $nbrf=$nbrf+30;
                    }
                }
            }
            header('Content-Type: application/json');
            echo json_encode(array('validation'=>true,'url'=>$location,'message'=>'<div class="text-center"><div class="callout callout-success" >Enregistrement reussi !</div></div>'));
            exit;
        }
        if(isset($_POST["typecontactlist"]) and isset($_POST["serie_bac"]))
        {
            header('Content-Type: application/json');
            $getlistcontact=$rempisage->getlistecontact_for_mailling($_POST["anneeuniver"],$_POST["typecontactlist"],$_POST["formation"],$_POST["marche"],$_POST["nature_contact"],$_POST["ville"],$_POST["serie_bac"],$_POST["niveau_etd"],$_POST["statut"],$_POST["resultat"],$_POST["test"],$_POST["absent"],$_POST["centre"],$_POST["test_passe"],"");
            echo ($getlistcontact);exit;
        }
        $getNaturecontact=$rempisage->getFunctions("getNatureContact");
        $getSeriebac=$rempisage->getFunctions("getSeriebac");
        $getVille=$rempisage->getFunctions("getVille");
        $getNiveauEtudes=$rempisage->getFunctions("getNiveauEtudes");
        $getMarche=$rempisage->getFunctions("getMarche");
        $getAgent=$rempisage->getFunctions("getAgent");
        $getFormationDemander=$rempisage->getFunctions("getFormationDemander");
        $getresultat=$rempisage->getFunctions("getresultat");
        $test=$rempisage->getFunctions("gettest");
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
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Campagne</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="width: 100% !important;">
                                                        <label for="anneeuniver">Année universitaire</label>
                                                        <select id="anneeuniver" onchange="vidercontent();" name="anneeuniver" class="form-control">
                                                            <option>2017-2018</option>
                                                            <option>2016-2017</option>
                                                            <option>2016-2015</option>
                                                            <option>2015-2014</option>
                                                            <option>2014-2013</option>
                                                            <option>2013-2012</option>
                                                            <option>2012-2011</option>
                                                            <option>2011-2010</option>
                                                            <option>2010-2009</option>
                                                            <option>2009-2008</option>
                                                            <option>2008-2007</option>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="typecontact">Type Campagne : </label>
                                                        <select id="typecontact" class="form-control" style="width: 100%;" onchange="vidercontent();">
                                                            <option selected="selected" value="--">--</option>
                                                            <option value="contactdirecte">Contact Direct</option>
                                                            <option value="contactindirecte">Contact Indirect</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="nomcompagne">Nom de campagne :</label>
                                                        <input type="text" onchange="vidercontent();" class="form-control" id="nomcompagne" placeholder="Nom de campagne ...">
                                                    </div>
                                                </div>
                                                <?php
                                                if($_SESSION['user']['otr_cmp']==1)
                                                {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Nature de contact :</label>
                                                            <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="nature_contact" data-placeholder="Les agents ..." style="width: 100%;">
                                                                <option value="all">Tout</option>
                                                                <?php echo $getNaturecontact; ?>
                                                            </select>
                                                        </div><!-- /.form-group -->
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Formation : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="formation" data-placeholder="Formation ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getFormationDemander; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marchés : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="marche" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getMarche; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Ville :</label>
                                                <span id="selection">
                                                    <select onchange="vidercontent();" id="ville" class="form-control select2" multiple="multiple" data-placeholder="Etat Phoning ..." style="width: 100%;">
                                                        <option value="all">Tout</option>
                                                        <?php echo $getVille; ?>
                                                    </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Serie Bac : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="serie_bac" data-placeholder="Formation ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getSeriebac; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Niveau Etud : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="niveau_etd" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getNiveauEtudes; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Statut :</label>
                                                <span id="selection">
                                                  <select onchange="vidercontent();" class="form-control select2 select2-hidden-accessible" id="statut" required="required" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                      <option value=""></option>
                                                      <option value="Prospect">	Prospect	</option>
                                                      <option value="Candidat">	Candidat	</option>
                                                      <option value="Inscrit">	Inscrit	</option>
                                                  </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Resultat :</label>
                                                <span id="selection">
                                                   <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="resultat" data-placeholder="Marchés ..." style="width: 100%;">
                                                       <option value="all">Tout</option>
                                                       <?php echo $getresultat; ?>
                                                   </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Test :</label>
                                                <span id="selection">
                                                   <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="test" data-placeholder="Marchés ..." style="width: 100%;">
                                                       <option value="all">Tout</option>
                                                       <?php echo $test; ?>
                                                   </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Absent : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="absent" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                   <option value="1">Oui</option>
                                                   <option value="0">Non</option>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left"> Centre :</label>
                                                <span id="selection">
                                                    <select onchange="vidercontent();" id="centre" class="form-control select2" multiple="multiple" data-placeholder="Etat Phoning ..." style="width: 100%;">
                                                        <option value="all">Tout</option>
                                                        <option>Casablanca</option>
                                                        <option>Marrakech</option>
                                                    </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Test Passé : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="test_passe" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <option value="1">Oui</option>
                                                    <option value="0">Non</option>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                    <button onclick="FiltrerCompgneeamiling();" id="filtrer" class="btn btn-primary pull-right" style="width: 10%">Filtrer</button>
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div>

                </section>
                <section class="content" id="biglistcontact">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Liste des contacts : </h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            <img src="dist/img/loading.gif" id="loadinglist" width="10%">
                                        </div>
                                    </div>
                                    <div id="listofthis">
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </div>
        </div>




        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>