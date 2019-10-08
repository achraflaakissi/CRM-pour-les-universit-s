<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        if(isset($_POST["agents_myarray"]))
        {
            echo
            header('Content-Type: application/json');
            if( $_POST['typecontact_myarray'] == "contactdirecte")
            {
                require('content/controller/class.contact-direct.php');
                $contact = new ContactDirect();
            }
            elseif( $_POST['typecontact_myarray'] == "contactindirecte")
            {
                require('content/controller/class.contact-indirecte.php');
                $contact = new contact_indirecte();
            }
            else
            {
                return false;
            }
            if(count($_POST["agents_myarray"])>1)
            {
                $nbrtotale=intval($_POST['nbrtotale']/count($_POST["agents_myarray"]));
                $cp=1;
                $j=0;
                foreach ($_POST["myarray"] as $value){
                    if($j == count($_POST["agents_myarray"])-1)
                    {
                        $contact->setID($value);
                        $contact->setCampagne1($_POST['nomcompagne_myarray']);
                        $contact->setTA($_POST['agents_myarray'][$j]);
                        $contact->setScript1($_POST['script']);
                        $contact->setID($value);
                    }
                    else
                    {
                        $contact->setID($value);
                        $contact->setCampagne1($_POST['nomcompagne_myarray']);
                        $contact->setTA($_POST['agents_myarray'][$j]);
                        $contact->setScript1($_POST['script']);
                        $contact->setID($value);
                        if($cp==$nbrtotale)
                        {
                            $cp=0;
                            $j++;
                        }
                        $cp++;
                    }
                    $contact->update();
                }
            }
            else{
                foreach ($_POST["myarray"] as $value){
                    $contact->setID($value);
                    $contact->setCampagne1($_POST['nomcompagne_myarray']);
                    $contact->setTA($_POST['agents_myarray'][0]);
                    $contact->setID($value);
                    $contact->setScript1($_POST['script']);
                    $contact->update();
                }
            }
            echo json_encode(array('validation'=>true,'url'=>$location,'message'=>'<div class="text-center"><div class="callout callout-success" >Enregistrement reussi !</div></div>'));
            exit;
        }
        if(isset($_POST["typecontact"]))
        {
            $gettypecontact=$rempisage->getFunctions("get".$_POST["typecontact"]);
            echo ($gettypecontact);exit;
        }
        if(isset($_POST["agents"]))
        {
            header('Content-Type: application/json');
            $getlistcontact=$rempisage->getlistecontact($_POST["agents"],$_POST["anneeuniver"],$_POST["typecontactlist"],$_POST["formation"],$_POST["marche"],$_POST["etatphoning"]);
            echo ($getlistcontact);exit;
        }


        $getMarche=$rempisage->getFunctions("getMarche");
        $getAgent=$rempisage->getFunctions("getAgent");
        $getFormationDemander=$rempisage->getFunctions("getFormationDemander");
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
                                                        <select id="typecontact" class="form-control" style="width: 100%;" onchange="changerphoning();vidercontent();">
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
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Les agents :</label>
                                                        <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="agents" data-placeholder="Les agents ..." style="width: 100%;">
                                                            <?php echo $getAgent; ?>
                                                        </select>
                                                    </div><!-- /.form-group -->
                                                </div>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Formation : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="formation" data-placeholder="Formation ..." style="width: 100%;">
                                                    <?php echo $getFormationDemander; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Marchés : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="marche" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <?php echo $getMarche; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Etat Phoning :</label>
                                                <span id="selection">
                                                    <select onchange="" id="etatphoning" class="form-control select2" multiple="multiple" data-placeholder="Etat Phoning ..." style="width: 100%;">

                                                    </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                    <button onclick="FiltrerCompgne();" id="filtrer" class="btn btn-primary pull-right" style="width: 10%">Filtrer</button>
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