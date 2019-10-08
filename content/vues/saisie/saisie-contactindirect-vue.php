<?php

if(isset($_SESSION['user'])) {


    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('saisie'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        $getLyceeEtablissement=$rempisage->getFunctions("getLyceeEtablissement");
        $getProfession=$rempisage->getFunctions("getProfession");
        $getFormationDemander=$rempisage->getFunctions("getFormationDemander");
        $getGroupeFormation=$rempisage->getFunctions("getGroupeFormation");
        $getNiveauEtudes=$rempisage->getFunctions("getNiveauEtudes");
        $getSeriebac=$rempisage->getFunctions("getSeriebac");
        $getDiplomesObtenus=$rempisage->getFunctions("getDiplomesObtenus");
        $getRecuPar=$rempisage->getFunctions("getRecuPar");
        $getVille=$rempisage->getFunctions("getVille");
        $getNatureContact=$rempisage->getFunctions("getNatureContact");
        $getPays=$rempisage->getFunctions("getPays");
        $getMarche=$rempisage->getFunctions("getMarche");
        if(isset($_POST['nom_find']))
        {
             header('Content-Type: application/json');
            require('content/controller/class.contact-indirecte.php');
            $contact_indirecte = new contact_indirecte();
            $test=$contact_indirecte->findbyname($_POST['nom_find'],$_POST['prenom_find']);
            echo $test;exit;
        }
        if(isset($_POST["groupe_foramation"]))
        {
            header('Content-Type: application/json');
            if(empty($_POST["nom"]) or empty($_POST["prenom"]) or empty($_POST["groupe_foramation"]) or empty($_POST["date"]) or empty($_POST["formationdemandee"]))
            {
                return false;
            }
            else
            {
                require('content/controller/class.contact-indirecte.php');
                $contact_indirecte = new contact_indirecte();
                $contact_indirecte->setCivilite($_POST["civilite"]);
                $contact_indirecte->setNom($_POST["nom"]);
                $contact_indirecte->setPrenom($_POST["prenom"]);
                $contact_indirecte->setTel($_POST["tel"]);
                $contact_indirecte->setEMail($_POST["email"]);
                $contact_indirecte->setLycee($_POST["etablisement"]);
                $contact_indirecte->setProfessionPere($_POST["professeionpere"]);
                $contact_indirecte->setProfessionMere($_POST["professeionmere"]);
                $contact_indirecte->setTelPere($_POST["telpere"]);
                $contact_indirecte->setTelMere($_POST["telmere"]);
                $contact_indirecte->setMailPere($_POST["mailpere"]);
                $contact_indirecte->setMailMere($_POST["mailmere"]);
                $contact_indirecte->setDate($_POST["date"]);
                $contact_indirecte->setGroupeFormation($_POST["groupe_foramation"]);
                $contact_indirecte->setFormationDemmandee($_POST["formationdemandee"]);
                $contact_indirecte->setAnneeUniv($_POST["anneeuniver"]);
                $contact_indirecte->setAnneeEtude($_POST["anneeetude"]);
                $contact_indirecte->setVille($_POST["ville"]);
                $contact_indirecte->setDateNaissance($_POST["datenaissance"]);
                $contact_indirecte->setLieuNaissance($_POST["lieunaissance"]);
                $contact_indirecte->setAdresse($_POST["adresse"]);
                $contact_indirecte->setCategorie($_POST["categorie"]);
                $contact_indirecte->setNatureContact($_POST["naturecontact"]);
                $contact_indirecte->setCP($_POST["cp"]);
                $contact_indirecte->setGSM($_POST["gsm"]);
                $contact_indirecte->setLyceePublic($_POST["public"]);///probleme declaration
                $contact_indirecte->setLyceePrive($_POST["privee"]);///probleme declaration
                $contact_indirecte->setLyceeMission($_POST["mission"]);///probleme declaration
                $contact_indirecte->setVilleLycee($_POST["ville_lycee"]);
                $contact_indirecte->setInteressePar($_POST["interessepar"]);
                $contact_indirecte->setNiveauetudes($_POST["niveauetudes"]);
                $contact_indirecte->setBranche($_POST["branche"]);
                $contact_indirecte->setDiplomeObtenu($_POST["diplomeobtenu"]);
                $contact_indirecte->setAnneeObtention($_POST["anneeobtention"]);
                $contact_indirecte->setExperienceprofessionelle($_POST["experienceprof"]);
                $contact_indirecte->setReçupar($_POST["recupar"]);
                $contact_indirecte->setObservations($_POST["observations"]);
                $contact_indirecte->setMarche($_POST["marche"]);
                $contact_indirecte->sets1tc($_POST["s1tc"]);
                $contact_indirecte->sets2tc($_POST["s2tc"]);
                $contact_indirecte->setannuelletc($_POST["annuelletc"]);
                $contact_indirecte->sets1bac1($_POST["s1bac1"]);
                $contact_indirecte->sets2bac1($_POST["s2bac1"]);
                $contact_indirecte->setannuellebac1($_POST["annuellebac1"]);
                $contact_indirecte->setnoteregional($_POST["noteregional"]);
                $contact_indirecte->sets1bac2($_POST["s1bac2"]);
                $contact_indirecte->sets2bac2($_POST["s2bac2"]);
                $contact_indirecte->setannuellebac2($_POST["annuellebac2"]);
                $contact_indirecte->setnotenational($_POST["notenational"]);
                $contact_indirecte->setnotegenerale($_POST["notegenerale"]);
                $contact_indirecte->setOperateurSaisie($_SESSION['user']['id']);
                $message=$contact_indirecte->add();
                echo $message;exit;
            }
        }
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <script>
	  $( function() {
	    $("#datepicker").datepicker({ 
	            dateFormat: 'yy-mm-dd'
	    });
	  } );
	  </script>
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row" >
                        <div class="col-md-6 col-lg-offset-3" id="message-div">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-offset-3">
                            <div class="alert alert-danger alert-dismissable erreur">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                Les informations sont incorrect !!
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Renseignements :</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <!-- Horizontal Form -->
                                <!-- form start -->
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="civilite">Civilité : </label>
                                            <select class="form-control select2" name="civilite" id="civilite" style="width: 100%;">
                                                <option selected="selected">M.</option>
                                                <option>Mlle</option>
                                            </select>
                                    </div><!-- /.form-group -->
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="nom">Nom</label>
                                        <input class="form-control" id="nom" name="nom" placeholder="Nom" type="text">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="prenom">Prenom</label>
                                        <input class="form-control" id="prenom" name="prenom" placeholder="Prenom" type="text">
                                    </div>
<div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="gsm">GSM</label>
                                        <input class="form-control" id="gsm" name="gsm" placeholder="GSM" type="text">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="tel">Tel</label>
                                        <input class="form-control" id="tel" name="tel" placeholder="Tel" type="text">
                                    </div>
                                    
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="email">E-mail</label>
                                        <input class="form-control" id="email" name="email" placeholder="Email" type="text">
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="marche" >Marché</label>
                                        <select id="marche" name="marche" class="form-control select2 " style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getMarche; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="lycee" >Lycee / Etablissement</label>
                                        <select id="lycee" name="lycee" class="form-control select2 " style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getLyceeEtablissement; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important; font-size: 12px !important;">
                                        <label for="professeionpere">Profession pere</label>
                                        <input type="text" id="professeionpere" placeholder="Profession pere" name="professeionpere" class="form-control" style="width: 100%;" />
                                        <!-- <select class="form-control select2 " id="professeionpere" name="professeionpere" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getProfession; ?>
                                        </select> -->
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="professeionmere">Profession mere</label>
                                        <input type="text" id="professeionmere" placeholder="Profession mere" name="professeionmere" class="form-control" style="width: 100%;" />
                                        <!-- <select class="form-control select2 " id="professeionmere" name="professeionmere" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getProfession; ?>
                                        </select> -->
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="telpere">Tel pere</label>
                                        <input class="form-control" id="telpere" name="telpere" placeholder="Tel pere" type="text">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="telmere">Tel mere</label>
                                        <input class="form-control" id="telmere" name="telmere" placeholder="Tel mere" type="text">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="mailpere">Mail pere</label>
                                        <input class="form-control" id="mailpere" name="mailpere" placeholder="mailpere" type="email">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="mailmere">Mail mere</label>
                                        <input class="form-control" id="mailmere" name="mailmere" placeholder="mail mere" type="email">
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title"></h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="date" class="text-danger">Date</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="date" name="date" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label class="text-danger">Groupe formation</label>
                                        <select class="form-control select2" name="groupe_foramation" id="groupe_foramation">
                                            <option selected="selected"></option>
                                            <?php echo $getGroupeFormation; ?>
                                        </select>
                                    </div><!-- /.form-group -->
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="formationdemandee" class="text-danger">Formation demandee</label>
                                        <select id="formationdemandee" name="formationdemandee" class="form-control select2 " style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getFormationDemander; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="anneeuniver">Année universitaire</label>
                                        <select id="anneeuniver" name="anneeuniver" class="form-control select2">
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
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="anneeetude" >Annee Etude</label>
                                        <select id="anneeetude" name="anneeetude" class="form-control select2" style="width: 100%;">
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
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="ville">Ville</label>
                                        <select id="ville" name="ville" class="form-control select2 " style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getVille; ?>
                                            <?php echo $getPays; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="datenaissance">Date Naissance</label>
                                       <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="input-group"  style="width : 100%">
			                      <input class="form-control" id="datenaissance" name="datenaissance" type="text"  data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                    		</div>
                                        </div><!-- /.input group -->
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="lieunaissance">Lieu de naissance</label>
                                        <select id="lieunaissance" name="lieunaissance" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getVille; ?>
                                            <?php echo $getPays; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="adresse">Adresse</label>
                                        <textarea class="form-control" rows="5" name="adresse" id="adresse"></textarea>
                                    </div>


                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="categorie">Cotegorie</label>
                                        <input id="categorie" name="categorie" placeholder="Cotegorie" class="form-control ">
                                    </div><!-- /.form-group -->

                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="naturecontact">Nature de contact</label>
                                        <select id="naturecontact" name="naturecontact" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getNatureContact; ?>
                                        </select>
                                    </div>


                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="cp" >CP</label>
                                        <input id="cp" name="cp" placeholder="CP ..." class="form-control " style="width: 100%;">
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label>
                                            <input id="teyp1" name="type[]" value="public" type="checkbox"> Public
                                        </label>&nbsp;&nbsp;
                                        <label>
                                            <input id="teyp2" name="type[]" value="privee"  type="checkbox"> Privee
                                        </label>&nbsp;&nbsp;
                                        <label>
                                            <input id="teyp3" name="type[]" value="mission"  type="checkbox"> Mission
                                        </label>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="ville_lycee">Ville Lycee</label>
                                        <select name="ville_lycee" id="ville_lycee" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getVille; ?>
                                            <?php echo $getPays; ?>
                                        </select>
                                    </div>
                                    <div class="input-group input-group-sm" style="width: 100% !important;">
                                        <label for="interessepar" >Interesse Par </label>
                                        <input placeholder="Interesse Par" id="interessepar" name="interessepar" class="form-control " style="width: 100%;">
                                    </div>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                        <div class="col-md-4">
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Cursus des Etudes :</h3>
                                    <div class="box-tools pull-right">
<button class="btn btn-primary pull-right" onclick="AddContactDirect('false');">Valider</button>
                  			</div>
                                </div><!-- /.box-header -->
                                <div class="box-body">

                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="niveauetudes">Niveau des etudes</label>
                                        <select id="niveauetudes" name="niveauetudes" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getNiveauEtudes; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="branche" >Branche</label>
                                        <select id="branche" name="branche" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getSeriebac; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="diplomeobtenu">Diplome obtenu</label>
                                        <select class="form-control select2" id="diplomeobtenu" name="diplomeobtenu" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getDiplomesObtenus; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="anneeobtention">Annee obtention</label>
                                        <select id="anneeobtention" name="anneeobtention" class="form-control select2" style="width: 100%;">
                                            <option></option>
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
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="experienceprof">Experience professionelle</label>
                                        <select id="experienceprof" name="experienceprof" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getProfession; ?>
                                        </select>
                                    </div>
                                    <div class="form-group" style="width: 100% !important;">
                                        <label for="recupar">Recu par</label>
                                        <select id="recupar" name="recupar" class="form-control select2" style="width: 100%;">
                                            <option selected="selected"></option>
                                            <?php echo $getRecuPar; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observations">Observations</label>
                                        <textarea class="form-control" rows="5" id="observations" name="observations"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary">
                                    <div class="box-header">
                                        <h3 class="box-title">Les Notes</h3>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr><th>Niveau</th><th>S1</th><th>S2</th><th>Note Finale</th><th>-</th></tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    Tronc Commun
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="s1tc" name="s1tc" placeholder="Note S1 TC " />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="s2tc" name="s2tc" placeholder="Note S2 TC " />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="annuelletc" name="annuelletc" placeholder="Note Annuelle TC" />
                                                </td>
                                                <td align="center">-</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    1 Année Bac
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="s1bac1" name="s1bac1" placeholder="Note S1 1 Bac " />
                                                </td>
                                                <td>
                                                    <input type="text" placeholder="Note S2 1 Bac "  size="45" class="form-control" id="s2bac1" name="s2bac1" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="annuellebac1" name="annuellebac1" placeholder="Note Annuelle 1 Année Bac" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="noteregional" name="noteregional" placeholder="Note Regional" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2 Année Bac</td>
                                                <td>
                                                    <input type="text" placeholder="Note S1 2 Bac " class="form-control" id="s1bac2" name="s1bac2" />
                                                </td>
                                                <td>
                                                    <input  placeholder="Note S2 2 Bac " type="text" size="45" class="form-control" id="s2bac2" name="s2ac2" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="annuellebac2" name="annuellebac2" placeholder="Note Annuelle 2 Année Bac" />
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" size="45" id="notenational" name="notenational" placeholder="Note National" />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    Note Générale du  Bac
                                                </td>
                                                <td colspan="1" >
                                                    <input type="text" class="form-control"   id="notegenerale" name="notegenerale"  placeholder="Note Générale du Bac"/>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-offset-3">
                            <div class="alert alert-danger alert-dismissable erreur">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                Les informations sont incorrect !!
                            </div>
                        </div>
                    </div>
                </section>
                <div class="box-footer">
                    <button class="btn btn-primary pull-right" onclick="AddContactDirect('false');" >Valider</button>
                </div>
            </div>
        </div>

        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>