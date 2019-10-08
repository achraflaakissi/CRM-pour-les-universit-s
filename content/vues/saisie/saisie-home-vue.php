<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('saisie'.$salt)) ){

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
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <?php include "content/modules/footer-inc.php"; ?>

        <?php

        }
    }

}

?>