<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        include "content/controller/class.remlpiration.php";
        $rempliration= new rempliration();
        if(isset($_POST["commercial"]) and !empty($_POST["commercial"]))
        {
            header('Content-Type: application/json');
            $val=$rempliration->add_action_week($_POST["commercial"],$_POST["date_debut"],$_POST["date_fin"],$_POST["actions"],$_POST["Objectif"]);
            echo $val;exit;
        }
        
        $getCommercial=$rempliration->getFunctions("getCommercial");
        $listeaction=$rempliration->getFunctions("getAction");
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
                                    <label for="commercial">Chargé de promotion : </label>
                                            <select onchange="testercmp();" id="commercial" data-placeholder="Chargé de promotion ..." name="commercial" class="form-control select2">
                                                <option></option>
                                                <?php echo $getCommercial; ?>
                                            </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_debut">Date Début : </label>
                                            <input class="form-control" placeholder="Date Début" name="date_debut" id="date_debut" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" >
                                        </div>
                                         
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="date_fin">Date Fin :</label>
                                            <input class="form-control" placeholder="Date Fin" name="date_fin" id="date_fin" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" >
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="action">Actions : </label>
                                            <select onchange="testercmp();" id="action_1" name="action_1" class="form-control select2" data-placeholder="Les agents ..." style="width: 100%;">
                                                <option></option>
                                                <?php echo $listeaction; ?>
                                            </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date_debut">Date Début : </label>
                                            <input class="form-control" placeholder="Date Début" name="date_debut_1" id="date_debut_1" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" >
                                        </div>
                                         
                                    </div>
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="date_fin">Date Fin :</label>
                                            <input class="form-control" placeholder="Date Fin" name="date_fin_1" id="date_fin_1" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="Cibles">Cibles :</label>
                                            <input type="text" class="form-control" placeholder="Cibles" name="Cibles_1" id="Cibles_1" >
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nbr_cible_prevu">Nombre de Cible Prevu :</label>
                                            <input type="numbre" class="form-control" placeholder="Nombre de Cible Prevu" name="nbr_cible_prevu_1" id="nbr_cible_prevu_1" >
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nbr_cible_prevu">objectif de l'action :</label>
                                             <textarea rows="3" style="width:100%"></textarea>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div id="add_new_action">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-offset-8 col-md-4">
                                        <button id="btn_add_new_action" class="btn btn-block btn-primary" onclick="add_new_action(1);"><i class="fa fa-fw fa-plus"></i> Ajouter une autre action</button>
                                    </div>
                                </div>
                               
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="observation">Objectif : </label>
                                    <textarea rows="10" id="Objectif" name="Objectif" class="form-control">

                                    </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <button class="btn btn-success pull-right" onclick="save_action_week(1);" id="btn-save" ><span class="fa fa-share"></span> Valider l'Action </button>
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
     <script>
     CKEDITOR.replace( 'Objectif' );
    </script>
    <?php

    }
}

?>