<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
        
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
            <div class="row">
            <div class="col-xs-12">
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Actions</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-striped">
                    <tbody>
                    <tr>
                      <th>Date Début</th>
                      <th>Date Fin</th>
                      <th>Objectif</th>
                    </tr>
                    <tr>
                        <?php if(count($get_action_week)>0)
                        { ?>
                        <td><?php echo $get_action_week['date_debut'] ?></td>
                        <td><?php echo $get_action_week['date_fin'] ?></td>
                        <td><?php echo $get_action_week['objectif'] ?></td>
                        <?php } ?>
                    </tr>
                    <tr>
                      <td align="center" style="font-weight:bold" colspan="5">Actions</td>
                    </tr>
                    </table>
                    <table class="table table-striped">
                    <tr>
                        <th>Action</th>
                        <th>Date Debut</th>
                        <th>Date Fin</th>
                        <th>Cible</th>
                        <th>Nombre de Cible Prevu</th>
                        <th>Objectif</th>
                    </tr>
                    
                         <?php
                         for($j=0;$j<count($get_action_week[18]);$j++)
                            { ?>
                            <tr>
                                <td><?php echo $get_action_week[18][$j]['action']; ?></td>
                                <td><?php echo $get_action_week[18][$j]['date_debut']; ?></td>
                                <td><?php echo $get_action_week[18][$j]['date_fin']; ?></td>
                                <td><?php echo $get_action_week[18][$j]['cibles']; ?></td>
                                <td><?php echo $get_action_week[18][$j]['Nombre_prevu']; ?></td>
                                <td><?php echo $get_action_week[18][$j]['objectif']; ?></td>
                            </tr>
                            <?php } ?>
                  </table></tbody>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
            <?php echo $get_info_for_user_home; ?>
            </div>
        </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Les Rendez-Vous du jour (<?php echo date('d-m-Y') ?>)</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <?php echo $RendezVous; ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Liste des établissements</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tbody><tr>
                      <th>Etabisement</th>
                      <th>Ville du contact</th>
                      <th>Nbr. des contacts</th>
                      <th>type</th>
                    </tr>
                    <?php echo $remplira;exit; ?>
                  </tbody></table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div>
            <?php include "content/modules/footer-inc.php"; ?>

        <?php

        }
    }

}

?>