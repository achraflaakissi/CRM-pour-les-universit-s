<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) or $_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
	require('content/controller/class.contact-indirecte.php');
	$contact_indirecte= new contact_indirecte();
	$contact_indirectes=$contact_indirecte->get_days();
	require('content/controller/class.statistique.php');
    $statistique= new statistique();
    $statistiques=$statistique->get_nbr_cpt_cmp();
    $get_stat_rdv_CP_CD=$statistique->get_stat_rdv_CP_CD();
    $get_stat_rdv_CP_CDI=$statistique->get_stat_rdv_CP_CDI();
    $get_stat_rdv_call_center_CD=$statistique->get_stat_rdv_call_center_CD();
    $get_stat_rdv_call_center_CDI=$statistique->get_stat_rdv_call_center_CDI();
    $saisie_by_zone=$statistique->get_nbr_cdi_by_zone();
    $saisie_by_formation=$statistique->get_nbr_cdi_by_formation();
    $saisie_by_nature=$statistique->get_nbr_cdi_by_nature();
    $saisie_by_zone_cd=$statistique->get_nbr_cd_by_zone();
    $saisie_by_formation_cd=$statistique->get_nbr_cd_by_formation();
    $saisie_by_nature_cd=$statistique->get_nbr_cd_by_nature();
    $statistiquess=$statistique->get_nbr_cpt_cmp_nont();
    $statistiquesss=$statistique->get_nbr_cpt_cmp_nont_cd();
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
	if(isset($_POST['realisation_par_zone']))
	{
	    header('Content-Type: application/json');
	    $statistique=$statistique->getgraph_realisation_par_zone();
	    echo $statistique;exit;
	}

	if(isset($_POST['reporting_realisation']))
	{
	    header('Content-Type: application/json');
	    $statistique=$statistique->getgraph_reporting_realisation_par_charge_promotion();
	    echo $statistique;exit;
	}
        include "content/modules/header-inc.php";
        ?>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>
        <script src="https://code.highcharts.com/modules/drilldown.js"></script>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Contact Direct : </h3>
                                <?php echo $get_stat_rdv_CP_CD;?>
                            </div>
                            <div class="col-md-6">
                                <h3 class="box-title">Contact Indirect : </h3>
                                <?php echo $get_stat_rdv_CP_CDI;?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="box-title">Contact Direct : </h3>
                                <?php echo $get_stat_rdv_call_center_CD;?>
                            </div>
                            <div class="col-md-6">
                                <h3 class="box-title">Contact Indirect : </h3>
                                <?php echo $get_stat_rdv_call_center_CDI;?>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="container2" style="min-width: 310px; max-width: 1500px; height: 600px; margin: 0 auto"></div>
                                <div id="html_add"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="container1" style="min-width: 310px; max-width: 1500px; height: 600px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                             <div class="col-md-12">
                                <div id="container" style="min-width: 310px; max-width: 1500px; height: 600px; margin: 0 auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
                 
                <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Affectations : </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
        			        <div class="col-md-12">
        	                    <div class="chart">
        	                        <?php echo $statistiques; ?>
        	                    </div>
        	                 </div>
                        </div><!-- /.box-body -->
                        <div class="row">
        			        <div class="col-md-4">
        	                  <div class="chart">
        	                    <?php echo $statistiquess; ?>
        	                  </div>
                            </div>
                             <div class="col-md-4">
        	                  <div class="chart">
        	                    <?php echo $statistiquesss; ?>
        	                  </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Nombre de Saisie par Utilisateur</h3>
                </div>
                <div class="box-body">
                <div class="row">
			<div class="col-md-6">
	                  <div class="chart">
	                  <h4 class="text-center">Global</h4>
	                    <canvas style="height: 630px; width: 727px; "  id="nbrsaisie"></canvas>
	                  </div>
	                 </div>
	                 <div class="col-md-6">
	                  <div class="chart">
	                  <h4 class="text-center">Aujourd'hui</h4>
	                    <canvas style="height: 630px; width: 727px; "  id="nbrsaisieauj"></canvas>
	                  </div>
	                 </div>
                </div><!-- /.box-body -->
                <script>
        getgraphsaisie_globale();
        getgraphsaisie();
        getgraph_reporting_realisation_par_charge_promotion();
        getgraph_realisation_par_zone();
        getgraph_taux_transformation_prospect_inscrit();
   </script>
              </div><!-- /.box -->
              </div>
                 <div class="row">
        			        <div class="col-md-4">
        			            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Les Contacts Indirects par Zone</h3>
                    </div>
                    <div class="box-body">
        	                    <div class="chart">
        	                        <?php echo $saisie_by_zone; ?>
        	                    </div>
	                    </div><!-- /.box-body -->
                    </div>
        	                 </div>
        			        <div class="col-md-4">
                    			            <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Les Contacts Indirects par Formation</h3>
                                </div>
                                <div class="box-body">
                    	                    <div class="chart">
                    	                        <?php echo $saisie_by_formation; ?>
                    	                    </div>
            	                    </div><!-- /.box-body -->
                                </div>
        	                 </div>
        	                <div class="col-md-4">
                    			            <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Les Contacts Indirects par Nature de Contact</h3>
                                </div>
                                <div class="box-body">
                    	                    <div class="chart">
                    	                        <?php echo $saisie_by_nature; ?>
                    	                    </div>
            	                    </div><!-- /.box-body -->
                                </div>
        	                 </div>
        	                 
        	                 <div class="col-md-4">
        			            <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Les Contacts Directs par Zone</h3>
                    </div>
                    <div class="box-body">
        	                    <div class="chart">
        	                        <?php echo $saisie_by_zone_cd; ?>
        	                    </div>
	                    </div><!-- /.box-body -->
                    </div>
        	                 </div>
        			        <div class="col-md-4">
                    			            <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Les Contacts Directs par Formation</h3>
                                </div>
                                <div class="box-body">
                    	                    <div class="chart">
                    	                        <?php echo $saisie_by_formation_cd; ?>
                    	                    </div>
            	                    </div><!-- /.box-body -->
                                </div>
        	                 </div>
        	                <div class="col-md-4">
                    			            <div class="box box-primary">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Les Contacts Directs par Nature de Contact</h3>
                                </div>
                                <div class="box-body">
                    	                    <div class="chart">
                    	                        <?php echo $saisie_by_nature_cd; ?>
                    	                    </div>
            	                    </div><!-- /.box-body -->
                                </div>
        	                 </div>
    	                 </div>
                 
                </section>
                
            </div>
            
        </div>
        <style>
            .highcharts-credits
            {
                display:none !important;
            }
        </style>
<script src="plugins/chartjs/Chart.min.js"></script>
        <?php include "content/modules/footer-inc.php"; ?>
    <script>
       
    </script>
    <?php

    }

}

?>