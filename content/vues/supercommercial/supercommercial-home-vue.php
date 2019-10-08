<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('supercommercial'.$salt)) ){
        include('content/controller/class.remlpiration.php'); 
        include('content/controller/class.rendez-vous.php');
            $RendezVous = new RendezVous();
            $RendezVous=$RendezVous->get_rendez_vous_current_date_by_user();
            $remplire=new rempliration();
            $get_action_week=$remplire->get_action_week();
            $remplira=$remplire->get_liste_etb();
            $get_info_for_user_home=$remplire->get_info_for_user_home();
        if(isset($_POST['function'])) {

            header('Content-Type: application/json');

            require_once('content/controller/class.campagne.php');


            switch ($_POST['function']) {

                case 'getstatistics' :
                    echo campagne::statistic();
                    break;

            }


        }else{
            include "content/modules/header-inc.php";
            ?>
            <body class="hold-transition skin-blue sidebar-mini">
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/data.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
            
        </section><!-- /.content -->
      </div>
            <?php include "content/modules/footer-inc.php"; ?>

        <?php

        }
    }

}

?>