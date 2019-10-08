<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        $test=false;
        if(isset($_POST['contact']) && !empty($_POST['contact']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.contact-indirecte.php');
            $contact_indirect = new contact_indirecte();
            $contact_indirect=$contact_indirect->findcontacts($_POST['contact']);
            echo $contact_indirect;exit;
        }
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"> <span class="fa fa-search"></span> Recherche</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="input-group">
                                        <input class="form-control input-lg" type="text" id="contact" placeholder="Nom ou prénom ou un Numéro de téléphone">
                                        <a id="search_btn" onclick="search_contact();" class="input-group-addon phone link-gsm"><span class="fa fa-search"></span></a>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="contentresult" class="content">

                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>




        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>