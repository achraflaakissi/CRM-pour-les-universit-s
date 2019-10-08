<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
	require('content/controller/class.contact-indirecte.php');
	require('content/controller/class.remlpiration.php');
    $rempliration=new rempliration();
    $getnbrallcmp=$rempliration->getnbrallcmp();
	$contact_indirecte= new contact_indirecte();
	$contact_indirectes=$contact_indirecte->get_days();
	require('content/controller/class.statistique.php');
    $statistique= new statistique();
    $statistiques=$statistique->get_nbr_cpt_cmp();
    $statistiquess=$statistique->get_nbr_cpt_cmp_nont();
    $statistiquesss=$statistique->get_nbr_cpt_cmp_nont_cd();
    $get_nbr_byuser_day=$statistique->get_nbr_byuser_day();
	if(isset($_POST['auths']))
	{
	    header('Content-Type: application/json');
	    $contact_indirecter=$contact_indirecte->getnbr_appel_by_user($_POST['date'],$_POST['option']);
	    echo $contact_indirecter;exit;
	}
	
	if(isset($_POST['nbr_appels_now']))
	{
	    header('Content-Type: application/json');
	    $get_user_day=$statistique->get_user_day();
	    echo $get_user_day;exit;
	}
	if(isset($_POST['saisie_global']))
	{
	    header('Content-Type: application/json');
	    $contact_indirecter=$contact_indirecte->getnbr_saisie_by_user_globale();
	    echo $contact_indirecter;exit;
	}
	if(isset($_POST['saisie_aujourd']))
	{
	    header('Content-Type: application/json');
	    $contact_indirecter=$contact_indirecte->getnbr_saisie_by_user();
	    echo $contact_indirecter;exit;
	}
        include "content/modules/header-inc.php";
        ?>
        
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title"> Phoning Call Centre du jour : <?php echo date('d/m/Y h:i') ?></h3>
                    </div>
                    <div class="box-body">
                      <div class="chart">
                        <canvas id="barChart" style="height:230px"></canvas>
                      </div>
                      <div class="row">
                            <?php echo $get_nbr_byuser_day; ?>
                    </div><!-- /.box-body -->
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"> Les Campagnes Encours : <?php echo date('d/m/Y h:i') ?></h3>
                </div>
                <div class="box-body">
                  <div class="row">
                      <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Nom de campagne</th>
                                            <th>Type de contact</th>
                                            <th>progression</th>
                                            <th>progression</th>
                                            <th>Statistique</th>
                                            <th>Agents</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php echo $getnbrallcmp ; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>Nom de campagne</th>
                                            <th>Type de contact</th>
                                            <th>progression</th>
                                            <th>progression</th>
                                            <th>Statistique</th>
                                            <th>Agents</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                        
                </div><!-- /.box-body -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                <div class="box-body">
                <div class="row">
	                  
                </div><!-- /.box-body -->
                <script>
        nbr_appels_now();
   </script>
              </div><!-- /.box -->
                    <div class="row">
                        <?php echo $contact_indirectes; ?>
                    </div>
                </section>
            </div>
        </div>

<script src="plugins/chartjs/Chart.min.js"></script>
        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>