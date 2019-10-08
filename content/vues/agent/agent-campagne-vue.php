<?php

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('agent'.$salt)) ){ 
        if(isset($_POST['date_rdv']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.rendez-vous.php');
            $RendezVous=new RendezVous();
            $RendezVous->setDate($_POST['date_rdv']);
            $RendezVous->setHeure($_POST['heure_rdv']);
            $RendezVous->setUser($_SESSION['user']['id']);
            $RendezVous->setIdContact($_POST['id_rdv']);
            $RendezVous->setTypeContact($_POST['campagne_rdv']);
            $RendezVous->setInscription_rdv($_POST['inscription_rdv']);
            echo $RendezVous->createrdv();
            exit;
        }
//        and !empty($_POST['content_email']) and !empty($_POST['emailto'])
        if(isset($_POST['content_email']) and isset($_POST['emailto']) )
        {
            header('Content-Type: application/json');
            require('content/controller/class.sendemail.php');
            $sendemail=new sendemail();
            $sendemail->setEmail($_POST['content_email']);
            $sendemail->setObjet($_POST['objet_email']);
            $sendemail->setSendto($_POST['emailto']);
            echo $sendemail->Envoyeremail();
            exit;
        }
        if(isset($_POST['campagnetest']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.remlpiration.php');
            $remplir=new rempliration();
            
            $remplir=$remplir->updatecampagne($_POST['campagnetest'],$_POST['observation'],$_POST['ntel'],$_POST['nemail']
                ,$_POST['etapephoning'],$_POST['idid'],$_POST['s1tc'],$_POST['s2tc'],$_POST['annuelletc'],$_POST['s1bac1']
                ,$_POST['s2bac1'],$_POST['annuellebac1'],$_POST['noteregional'],$_POST['s1bac2'],$_POST['s2bac2'],$_POST['annuellebac2']
                ,$_POST['notenational'],$_POST['notegenerale'],$_POST['formation_demandee'],$_POST['status_rdv'],$_POST['etat_rdv']);
            echo $remplir;
            exit;
        }
        if(isset($_POST['campagne']))
        {
            header('Content-Type: application/json');
            require('content/controller/class.remlpiration.php');
            $remplir=new rempliration();
            $remplir=$remplir->getcampagne($_POST['campagne']);
            echo $remplir;
            exit;
        }
        include "content/modules/header-inc.php";
        ?>

        <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include "content/modules/sidebar-inc.php"; ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Liste de Campagne : </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nom et prénom</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input class="form-control" id="nom" type="text" readonly="">
                                        </div>
                                        <div class="col-md-6">
                                            <input class="form-control" id="prenom" type="text" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nature du contact</label>
                                    <input class="form-control" id="nature_contact" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ville adresse</label>
                                    <input class="form-control col-md-6" id="ville" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ville lycée</label>
                                    <input class="form-control col-md-6" id="ville_lycee" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Formation</label>
                                    <span id="formation_containaire"></span>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Niveau études</label>
                                    <input class="form-control col-md-6" id="niveau_etudes" type="text" readonly="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Niveau demandé </label>
                                    <input class="form-control col-md-6" id="niveau_demande" type="text" readonly="">
                                </div>
                                <div class="form-group content">
                                    <a href="#scriptes" class="btn btn-primary" style="width: 100%; margin-top: 15px;" data-toggle="modal">Script</a>
                                    <a class="btn btn-success" onclick="send_email();" id="send_email" style="width: 100%; margin-top: 15px;" data-toggle="modal">Envoyer l'email</a>
                                    <input type="hidden" id="content_email" value="" />
                                    <input type="hidden" id="objet_email" value="" />
                                    <textarea style="margin-top: 10px" id="observation_ans" class="form-control" rows="5" readonly cols="5" placeholder="Observation..."></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">GSM</label>
                                    <div class="input-group">
                                        <input class="form-control " id="gsm" type="text" readonly="">
                                        <a class="input-group-addon phone link-gsm" onclick="changecolor('gsmsip');" id="gsmsip" ><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Téléphone</label>
                                    <div class="input-group">
                                        <input class="form-control " id="telephone" type="text" readonly="">
                                        <a class="input-group-addon phone link-gsm" onclick="changecolor('telesip');" id="telesip" ><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tél. Pére</label>
                                    <div class="input-group">
                                        <input class="form-control " id="tel_pere" type="text" readonly="">
                                        <a id="telpereesip" onclick="changecolor('telpereesip');" class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Tél. Mère</label>
                                    <div class="input-group">
                                        <input class="form-control " id="tel_mere" type="text" readonly="">
                                        <a id="telemeresip" onclick="changecolor('telemeresip');" class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">E-Mail</label>
                                    <div class="input-group">
                                        <input class="form-control " id="email" type="text" readonly="">
                                        <a href="#" class="input-group-addon phone link-email"><span class="fa fa-envelope"></span></a>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Adresse</label>
                                    <div class="input-group">
                                        <input class="form-control " id="adresse" type="text" readonly="">
                                        <a href="#" class="input-group-addon phone link-email"><span class="fa fa-home"></span></a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Rendez-Vous : </label>
                                    <div class="row">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-1">
                                            <input type="radio" name="rdv1" id="rdv_oui" value="Oui"/><label> Oui </label>
                                            </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-1">
                                            <input type="radio" name="rdv1" id="rdv_non" value="Non"/><label> Non </label>
                                        </div>
                                        
                                        <div class="col-md-1">
                                            <input type="button" value="décoher" onclick="uncheck();" />
                                        </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="control-label">Status : </label>
                                    <select class="form-control select2 select2-hidden-accessible" id="Status_rdv" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                      <option selected="selected"></option>
                                      <option>Financement</option>
                                      <option>Inscription à l'étranger</option>
                                      <option>Inscription Public</option>
                                      <option>Inscription Privée</option>
                                      <option>Proximité</option>
                                      <option>Etude au Maroc</option>
                                    </select>
                                </div>
                                <div class="panel panel-default push-up-20" style="margin-bottom: 0px;">
                                    <div class="panel-body">
                                        <h4>Remplissez le champ ci-dessous avant d'enregistrer</h4>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input class="form-control " placeholder="Nouveau Email" id="nemail" type="text" >
                                            </div>
                                            <div class="input-group">
                                                <input class="form-control " placeholder="Nouveau Tel" id="ntel" type="text" >
                                                <a id="telnv" onclick="changecolor('telnv');" class="input-group-addon phone link-gsm"><span class="fa fa-phone"></span></a>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea id="observation" class="form-control" cols="5" placeholder="Observation..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <textarea style="margin-top: 10px" id="etapephoning_ans" class="form-control" rows="5" readonly cols="5" placeholder="Observation..."></textarea>
                                            </div>
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
                    </div>
                    <div class="box-footer">
                        <a href="#createrdv" class="btn btn-primary" data-toggle="modal">Nouveau rendez-vous</a>
                        <button class="btn btn-danger pull-right" id="btn-save" ><span class="fa fa-share"></span> Mettre à jour la fiche </button>
                    </div>
                </div>
            </section>

        </div>
    </div>
    <div class="modal fade" id="scriptes" role="dialog">
        <div class="modal-dialog"  style="background: transparent;border: none !important;">
            <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                <div class="modal-body" style="background: transparent;border: none !important;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Scripte</h3>
                        </div>
                        <div class="box-body">
                            <div id="scripte_content1">
<p>Bonjour</p>

<p>C&rsquo;est M. Melle &hellip;.&nbsp;?</p>

<p>C&rsquo;est l&rsquo;universit&eacute; priv&eacute;e de Marrakech &agrave; l&rsquo;appareil</p>

<p>Nous vous contactons pour votre inscription dans notre universit&eacute;&nbsp;</p>

<p>Souhaitez vous qu&rsquo;un de nos conseillers d&rsquo;orientation vous contacte pour plus de renseignements&nbsp;sur la formation que vous avez choisie et surtout le m&eacute;tier dans lequel vous vous projetez&nbsp;?</p>

<ol>
	<li>R&eacute;ponse&nbsp;: OUI</li>
</ol>

<p>Bien , avez-vous choisi la formation que vous souhaitez suivre&nbsp;?</p>

<p>Je confirme avec vous vos coordonn&eacute;es &hellip;.. c&rsquo;est le &hellip; mail, tel &hellip; et la formation est bien &hellip;&nbsp;?</p>

<p>Je vous remercie M. Melle . &hellip;. Un de nos conseillers vous appellera aujourd&rsquo;hui m&ecirc;me (maximum le lendemain pour les RDV pris en fin de journ&eacute;e)</p>

<p>&nbsp;</p>

<p>&nbsp;</p>

<ol>
	<li>R&eacute;ponse&nbsp;: NON</li>
</ol>

<p>Puis-je conna&icirc;tre la raison&nbsp;?</p>

<p>Veiller&nbsp; d&eacute;tecter le ou&nbsp; les points bloquants &nbsp;, ex.&nbsp;:</p>

<ul>
	<li>Choix autre &eacute;tablissement&nbsp;? &nbsp;Lequel&nbsp;? Si public , pourquoi&nbsp;? Et rappeler que notre universit&eacute; est reconnue et que nos dipl&ocirc;mes sont &eacute;quivalents aux dipl&ocirc;mes de l&rsquo;&eacute;tat. Essayer toujours de d&eacute;crocher un RDV</li>
	<li>&Eacute;tudes &agrave; l&rsquo;&eacute;tranger&nbsp;: essayer toujours de d&eacute;crocher un RDV en mettant l&rsquo;accent sur &nbsp;nos parcours internationaux</li>
	<li>Si autre &eacute;tablissement priv&eacute;, insister pour un RDV pour lui d&eacute;montrer que nous sommes les meilleurs&hellip;</li>
	<li>Probl&egrave;me financier&nbsp;? Rappeler que nous avons un service d&rsquo;aide au financement et voir s&rsquo;il souhaite avoir plus de d&eacute;tails . Le responsable prendra contact avec lui/elle pour l&rsquo;accompagner</li>
	<li>Autres raison&nbsp;? &hellip;.</li>
</ul>

<p>&nbsp;</p>

<p>Il est important de d&eacute;tecter les points bloquants, et d&eacute;crocher avec l&rsquo;accord du prospect un RDV avec un responsable pour mieux r&eacute;pondre &agrave; ses besoins.</p>

<p>&nbsp;</p>

<p>Si pas de RDV, ne plus insister et conclure avec&nbsp;: Nous restons tout de m&ecirc;me &agrave; votre &eacute;coute si vous avez besoin d&rsquo;autres informations</p>

<p>&nbsp;</p>

<p>Fin de la communication</p>

<p>La communication devra &ecirc;tre br&egrave;ve et concluante (max. 5mn)</p>

<p>Le TO sera &eacute;valu&eacute; sur le nombre de RDV pris et r&eacute;alis&eacute;s. L&rsquo;efficacit&eacute; corr&eacute;l&eacute;e avec le temps de la communication &hellip;</p>

                            </div>
                        </div><!-- /.form-group -->
                    </div>
                </div>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <a class="btn btn-default" data-dismiss="modal">Close</a>-->
            <!--            </div>-->
        </div>
    </div>
    <div class="modal fade" id="createrdv" role="dialog">
        <div class="modal-dialog"  style="background: transparent;border: none !important;">
            <div class="modal-content my-bg-blur"  style="background: transparent;border: none !important;">

                <div class="modal-body" style="background: transparent;border: none !important;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Nouveau rendez-vous</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Date Rendez-Vous :</label>
                                <input class="form-control " placeholder="Date Rendez-Vous " id="date_rdv" type="date" >
                            </div>
                            <div class="form-group">
                                <label>Heure Rendez-Vous :</label>
                                <input class="form-control " placeholder="Heure Rendez-Vous " id="heure_rdv" type="time" >
                            </div>
                            <div class="form-group">
                                <label>Type de Rendez-Vous :</label>
                                <select class="form-control " id="inscription_rdv" >
                                    <option value="">--</option>
                                    <option value="1">Inscription</option>
                                    <option value="Dépôt dossier">Dépôt dossier</option>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="box-footer">
                                <button style="width: 30% !important;" id="btnrdv" onclick="createrdv('<?php echo $_GET['id']; ?>','from_search')" class="btn btn-block btn-primary btn-sm pull-right">Nouveau rendez-vous</button>
                            </div>
                        </div><!-- /.form-group -->
                    </div>
                </div>
            </div>
            <!--            <div class="modal-footer">-->
            <!--                <a class="btn btn-default" data-dismiss="modal">Close</a>-->
            <!--            </div>-->
        </div>
    </div>
    <?php include "content/modules/footer-inc.php"; ?>
    <script>
    function uncheck() {
    document.getElementById("rdv_oui").checked = false;
    document.getElementById("rdv_non").checked = false;
        }   
        getfichecontact("<?php echo $_GET['campagne']; ?>",1);
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