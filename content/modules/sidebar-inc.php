<?php
if(isset($_SESSION['user'])) {
    include('content/config.php');

    ?>
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>UPM</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>UPM</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                            <span class="hidden-xs"> <?php
                                echo $_SESSION['user']['nom'].' '.$_SESSION['user']['prenom'];
                                ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                <p>
                                    <?php
                                        echo $_SESSION['user']['nom'].' '.$_SESSION['user']['prenom'];
                                    ?>
                                    <small><?php
                                        echo $_SESSION['user']['email'];
                                        ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=deconnexion" class="btn btn-default btn-flat"> Déconnection </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" style="min-height: 342px;">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php
                                        echo $_SESSION['user']['nom'].' '.$_SESSION['user']['prenom'];
                                    ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <?php
                    if($_SESSION['user']['profile']==sha1(md5('saisie'.$salt)) ){
                ?>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=contactdirect"><i class="fa fa-edit"></i><span>Contact direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=contactindirect"><i class="fa fa-book"></i><span>Contact indirect</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche"><i class="fa fa-folder-open"></i><span>Traitement Contact Direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche_cdi"><i class="fa fa-folder-open"></i><span>Traitement Contact Indirect</span></a></li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span>Campagne</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcampagne"><i class="fa fa-circle-o"></i> Campagnes Traitées</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcampagneclp"><i class="fa fa-circle-o"></i> Campagnes Encours </a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=auto"><i class="fa fa-circle-o"></i> Auto Campagne</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=campagne"><i class="fa fa-circle-o"></i> Ajouter Campagne</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=mycampagne"><i class="fa fa-circle-o"></i> Mes Campgnes </a></li>
                                
                            </ul>
                        </li>
                <?php
                    }
               
                if($_SESSION['user']['profile']==sha1(md5('supercommercial'.$salt)) ){  ?>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=contactdirect"><i class="fa fa-edit"></i><span>Contact direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche"><i class="fa fa-folder-open"></i><span>Traitement Contact Direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=dejaaffecte"><i class="fa fa-search"></i><span>Contacts Affectés</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=whatsapp"><i class="fa fa-phone"></i><span>Whatsapp</span></a></li>
                        
                <?php }
                    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
                ?>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=contactdirect"><i class="fa fa-edit"></i><span>Contact direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=contactindirect"><i class="fa fa-book"></i><span>Contact indirect</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche"><i class="fa fa-folder-open"></i><span>Traitement Contact Direct</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche_cdi"><i class="fa fa-folder-open"></i><span>Traitement Contact Indirect</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche_by_one"><i class="fa fa-search"></i><span>Recherche</span></a></li>
                        <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=rendez_vous"><i class="fa fa-calendar-check-o"></i><span>Gestion des Rendez-Vous</span></a></li>
                         <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=actions"><i class="fa fa-newspaper-o"></i><span>Actions</span></a></li>
                         <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=financement"><i class="fa fa-money"></i><span>Edition des reçus</span></a></li>
                       <?php if($_SESSION['user']['otr_cmp']==1)
                        {
                        ?>
                         <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=rappel_qualification"><i class="fa fa-keyboard-o"></i><span>Qualification des Rappels</span></a></li>
                         <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=fiche_synthese"><i class="fa fa-download"></i><span>Fiche de Synthese Individuelle</span></a></li>
                       <li class="treeview">
                            <a href="#">
                                <i class="fa fa-database"></i>
                                <span>Traitement Avancée</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=avancee_recherche"><i class="fa fa-circle-o"></i>Contact Direct</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=avancee_recherche_cdi"><i class="fa fa-circle-o"></i>Contact Indirect</a></li>
                           </ul>
                        </li>
                         <li class="treeview">
                            <a href="#">
                                <i class="fa fa-filter"></i>
                                <span>Liste des doublons</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=getdoublons"><i class="fa fa-circle-o"></i>Contact Direct</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=getdoublonsind"><i class="fa fa-circle-o"></i>Contact Indirect</a></li>
                           </ul>
                        </li>
                        
                        <?php } ?>
                        <li><i class=""></i><span></span></a></li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span>Campagne</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcompagne"><i class="fa fa-circle-o"></i> Campagnes Traitées</a></li>
                                <?php if($_SESSION['user']['otr_cmp']==1)
                        {
                        ?>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcompagne_global"><i class="fa fa-circle-o"></i> Campagnes Global</a></li>
                                <?php } ?>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcompagneclp"><i class="fa fa-circle-o"></i> Campagnes Encours </a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=campagne_email"><i class="fa fa-circle-o"></i>Campagne Email</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=auto"><i class="fa fa-circle-o"></i> Auto Campagne</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=campagne_for_agents"><i class="fa fa-circle-o"></i>Campagne Calll Center</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=compagne"><i class="fa fa-circle-o"></i> Ajouter Campagne</a></li>
                                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=mycompagne"><i class="fa fa-circle-o"></i> Mes Campgnes </a></li>
                                
                            </ul>
                        </li>

                <?php
                    }
                ?>
                <?php
                if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
                    ?>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=users"><i class="fa fa-users"></i><span>Users</span></a></li>
                   <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=verificateur"><i class="fa fa-check-circle-o"></i><span>Validation des indirects</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=verificateur-direct"><i class="fa fa-check-circle-o"></i><span>Validation des directs</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=ajoutertout"><i class="fa fa-reply-all"></i><span>Paramétrage</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=qualification"><i class="fa fa-reply-all"></i><span>Les Actions</span></a></li>
                         <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=actions_week"><i class="fa fa-newspaper-o"></i><span>Actions Week</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=affectation_etb"><i class="fa fa-reply-all"></i><span>Affectation des établissements</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=reaffectation_etb"><i class="fa fa-reply-all"></i><span>Reaffectation des établissements</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=landing"><i class="fa fa-cloud-download"></i><span>Import landing page</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=affectationcommercial"><i class="fa fa-reply-all"></i><span>Affectation commercial à des contacts</span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-industry"></i>
                            <span>Statistique</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_test"><i class="fa fa-circle-o"></i> Test Passé </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_rendez_vous"><i class="fa fa-circle-o"></i> Rendez-Vous </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=divers"><i class="fa fa-circle-o"></i> Divers </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_action"><i class="fa fa-circle-o"></i> Actions </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_rapport_journalier"><i class="fa fa-circle-o"></i> Rapport Journalier </a></li>
                        </ul>
                    </li>
<li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=valides"><i class="fa fa-check"></i><span>Conatcts Valides</span></a></li>
                    <li><i class=""></i><span></span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar-check-o"></i>
                            <span>Gestion Rendez-Vous</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=rendez-vous"><i class="fa fa-circle-o"></i> Rendez-Vous </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=rendez-vous-list"><i class="fa fa-circle-o"></i> Liste des Rendez-Vous </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bullhorn"></i>
                            <span>Campagne</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=listcompagne"><i class="fa fa-circle-o"></i> Liste des Campagnes</a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=campagne"><i class="fa fa-circle-o"></i> Ajouter Campagne</a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=validation_cmp"><i class="fa fa-circle-o"></i> Validation des Campagnes</a></li>
                        </ul>
                    </li>
                <?php
                }
                ?>
                <?php
                if($_SESSION['user']['profile']==sha1(md5('superadmin'.$salt)) ){
                    ?>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                    <li><i class=""></i><span></span></a></li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar-check-o"></i>
                            <span>Statistique</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_test"><i class="fa fa-circle-o"></i> Test Passé </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=liste_actions"><i class="fa fa-circle-o"></i> Actions </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_phoning"><i class="fa fa-circle-o"></i> Phoning </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=divers"><i class="fa fa-circle-o"></i> Divers </a></li>
                            <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=statistique_rendez_vous"><i class="fa fa-circle-o"></i> Rendez-Vous </a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=export"><i class="fa fa-cloud-download"></i><span>Exporter</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche"><i class="fa fa-group"></i><span>Les Contacts Direct</span></a></li>
                <?php
                }
                ?>
                <?php
                if($_SESSION['user']['profile']==sha1(md5('agent'.$salt)) ){
                    ?>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-dashboard"></i><span>Accueil</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=recherche"><i class="fa fa-search"></i><span>Recherche</span></a></li>
                <?php
                }
                ?>
                <?php
                if($_SESSION['user']['profile']==sha1(md5('import'.$salt)) ){
                    ?>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>"><i class="fa fa-check-circle-o"></i><span>Acceuil</span></a></li>
                    <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=pageimport"><i class="fa fa-reply-all"></i><span>Import</span></a></li>
                <?php
                }
                ?>
                <li><a href="<?php echo "http://" . $_SERVER['HTTP_HOST'] . $location; ?>?page=deconnexion"><i class="fa fa-fw fa-sign-out"></i><span>Déconnection</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
<?php
}
?>