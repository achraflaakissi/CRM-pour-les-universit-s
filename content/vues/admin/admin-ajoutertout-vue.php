<?php
include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
if(isset($_POST['villelycee']))
{
    $value="<option></option>";
    $lycee = $bdd->query("SELECT distinct ville  FROM `contact_indirect` where etablissement = '".$_POST['villelycee']."'");

    foreach($lycee->fetchAll() as $a)
    {
        $value .=  "<option>".$a['ville']."</option>";
    }
    echo $value;exit;
}
if(isset($_POST['allagent']) && $_POST['allagent']=="true") {
    $value="<option></option>";
    $lycee = $bdd->query("SELECT distinct Lycee as Lycee FROM `contact_indirect`");

    foreach($lycee->fetchAll() as $a)
    {
            $value .=  "<option>".$a['Lycee']."</option>";
    }
    echo $value;exit;
}
else if(isset($_POST['allagent']) && $_POST['allagent']=="false")
{
    $value="<option></option>";
    $agent = $bdd->query("SELECT distinct Lycee as Lycee FROM `contact_indirect` where Contact_Suivi_par='' or Contact_Suivi_par is null ");

    foreach($agent->fetchAll() as $a)
    {
        $value .=  "<option>".$a['Lycee']."</option>";
    }
    echo $value;exit;
}
include "content/modules/header-inc.php";
?>
<div class="wrapper">

    <?php include "content/modules/sidebar-inc.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Ajouter Autres informations
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- SELECT2 EXAMPLE -->
            <div class="row">
                <div class="col-md-6 col-md-offset-4 alert alert-success" style="display: none;" id="etatajout">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Action</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Action</label>
                                <input type="text" id="nomaction" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouteraction" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                
                
                
            <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Nature de Contact</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nature de Contact</label>
                                <input type="text" id="nomnature" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouternature" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                
                
                
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Etat Phoning</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Etat Phoning</label>
                                <input type="text" id="nometatphoning" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterphoning" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                
                
                
                
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter  Contact Suite A</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Contact Suite A</label>
                                <input type="text" id="contactsuitea" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutercontactsuitea" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
            <div class="col-md-4">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Affectation Lycee pour commercial</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <div class="btn-group">
                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="form-group">
                <label>Lycee / Etablissement </label>
                </br>
               <select id="lyceee" class="form-control select2" >
                   <option></option>
                   <?php $lycce= $bdd->query("SELECT distinct Lycee as Lycee FROM `contact_indirect` where Contact_Suivi_par='' or Contact_Suivi_par is null ");
                   foreach($lycce->fetchAll() as $l ){  ?>
                   <option><?php echo $l['Lycee']; ?></option>
                   <?php } ?>
               </select></br>

                <label>Ville </label>
                </br>
                <select id="villelyceee" class="form-control" >
                </select>
                </br>
                <label>Agent Affecté </label>
                </br>
                <select id="agent" class="form-control select2" >
                    <option></option>
                    <?php $agent= $bdd->query("SELECT id,nom,prenom FROM `users` where profile='commercial'");
                    foreach($agent->fetchAll() as $a )
                    {  ?>
                        <option value="<?php echo $a['id'];  ?>"><?php echo $a['nom'].' '.$a['prenom']; ?></option>
                    <?php } ?>
                </select>
                </br>
                <label>Inclure les agents  affectés &nbsp;<input type="checkbox"  id="valide"  /></label>
            </div><!-- /.form-group -->
            <button type="button" id="affecter"  class="btn btn-info">Affecter</button>
        </div><!-- ./box-body -->
    </div><!-- /.box -->
</div>                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une ville</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de ville</label>
                                <input type="text" id="nomville" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterville" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter un pays</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>nom de pays</label>
                                <input type="text" id="nompays" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterpays" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une langue</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de langue</label>
                                <input type="text" id="nomlangue" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterlangue" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une groupe de formation</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de groupe</label>
                                <input type="text" id="nomgroupe" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutergroupe" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter type de campagne</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de type</label>
                                <input type="text" id="nomcapagne" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutercampagne" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter formation </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de formation</label>
                                <input type="text" id="nomformation" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterformation" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter etat de dossier </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom d'etat</label>
                                <input type="text" id="nometat" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouteretat" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter autre diplome  </h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de diplome</label>
                                <input type="text" id="nomdiplome" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterdiplome" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter profession</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de profession</label>
                                <input type="text" id="nomprofession" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterprofession" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter autre Serie bac</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de serie</label>
                                <input type="text" id="nomserie" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterserie" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter marche</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de marche</label>
                                <input type="text" id="nommarche" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutermarche" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>


                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Lycee/Etablissement</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom d'Etablissement/Lycee</label>
                                <input type="text" id="nometablissement" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouteretablisseet" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Motif</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de Motif</label>
                                <input type="text" id="nommotif" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutermotif" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Test</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de Test</label>
                                <input type="text" id="nomtest" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutertest" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Type de Résidence</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom de type Résidence</label>
                                <input type="text" id="nomtyperesidence" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajoutertyperesidence" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>

                <div class="col-md-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter Resultat</h3>
                            <div class="box-tools pull-right">
                                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                <div class="btn-group">
                                    <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>
                                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <label>Nom Resultat</label>
                                <input type="text" id="nomresultat" class="form-control" required="required" />
                            </div><!-- /.form-group -->
                            <button type="button" id="ajouterresultat" class="btn btn-info">Ajouter</button>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>

            </div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include "content/modules/footer-inc.php"; ?>
<!-- Page script -->
