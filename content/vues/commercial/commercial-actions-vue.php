<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        if(isset($_POST["action"]) and !empty($_POST["action"]) and isset($_POST["nom_action"]) and !empty($_POST["nom_action"]))
        {
            header('Content-Type: application/json');
            include "content/controller/class.action.php";
            $action = new action($_POST["action"],$_POST["nom_action"],$_POST["type_contact"],$_POST["objectif"],$_POST["suit_donner"],$_POST["date_action"],$_POST["heure_action"],$_POST["cible"],$_POST["cible_prevu"],$_POST["cible_realise"],$_POST["message"],$_POST["observation"]);
            $val=$action->add();
            echo $val;exit;
        }
        include "content/controller/class.remlpiration.php";
        $rempliration= new rempliration();
        $listeaction=$rempliration->getFunctions("getAction");
        $rempliration=$rempliration->all_cmp();
        include "content/modules/header-inc.php";

        ?>
<style>
    #campagne
    {
        display: none;
    }
</style>
        <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include "content/modules/sidebar-inc.php"; ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Action : </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="action">Action : </label>
                                            <select onchange="testercmp();" id="action" name="action" class="form-control">
                                                <option></option>
                                                <?php echo $listeaction; ?>
                                            </select>
                                </div>
                                <div class="form-group">
                                    <label for="nom_action">Nom d'Action : </label>
                                    <input class="form-control" placeholder="Nom d'Action" name="nom_action" id="nom_action" >
                                    <select id="campagne" class="form-control">
                                        <?php echo $rempliration; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="type_contact">Type de Contact : </label>
                                    <select id="type_contact" name="type_contact" class="form-control">
                                        <option></option>
                                        <option>Contact Indirect</option>
                                        <option>Contact Direct</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="objectif">Objectif / Object : </label>
                                    <input class="form-control" placeholder="Objectif / Object" name="objectif" id="objectif" >
                                </div>

                                <div class="form-group">
                                    <label for="suit_donner">Suite à donnner :</label>
                                    <input type="text" class="form-control" placeholder="Date Action" name="suit_donner" id="suit_donner" >
                                </div>

                                <div class="form-group">
                                    <label for="date_action">Date Action :</label>
                                    <input type="text" class="form-control" placeholder="Date Action" name="date_action" id="date_action" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                </div>

                                <div class="form-group">
                                    <label for="heure_action">Heure Action :</label>
                                    <input type="text" class="form-control" placeholder="Date Action" name="heure_action" id="heure_action" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cible">Cible : </label>
                                    <input type="text" class="form-control" placeholder="Cible" name="cible" id="cible" >
                                </div>
                                <!--<div class="form-group">
                                    <label for="cible_prevu">Nombre de Cible Prevu : </label>
                                    <input type="number" class="form-control" placeholder="Nombre de Cible Prevu" name="cible_prevu" id="cible_prevu" >
                                </div>-->
                                <div class="form-group">
                                    <label for="cible_realise">Nombre de Cible Réalisé : </label>
                                    <input type="number" class="form-control" placeholder="Nombre de Cible Réalisé" name="cible_realise" id="cible_realise" >
                                </div>
                                <div class="form-group">
                                    <label for="message">Message : </label>
                                    <textarea rows="6" id="message" name="message" class="form-control">

                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="observation">Observation : </label>
                                    <textarea rows="4" id="observation" name="observation" class="form-control">

                                    </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-success pull-right" onclick="save_action();" id="btn-save" ><span class="fa fa-share"></span> Valider l'Action </button>
                    </div>
                </div>
            </section>

        </div>
    </div>

    <?php include "content/modules/footer-inc.php"; ?>
    <script>
        $('#gsmsip').css("background-color","#50de9c");
        $('#gsmsip .fa').css("color","white");
        $('#telesip').css("background-color","#fff");
        $('#telesip .fa').css("color","#555");
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

?>