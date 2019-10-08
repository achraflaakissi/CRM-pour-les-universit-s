<?php
        
session_start();
if(isset($_SESSION['user'])) {


    include('content/config.php');
   if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){
    $_SESSION['userid']=$_SESSION['user']['id'];
    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $bdd = new PDO('mysql:host=' . $server_ip . ';dbname=' . $server_database, $server_user, $server_password, $pdo_options) or die(mysql_error());
    
    if(isset($_POST['payconcour']))
{
    $id = $_POST['id_contact'];
    $usercentre = $bdd->query("select centre from users  where id=".$_SESSION['userid']);
    //$montant=intval(substr($_POST['montant'],0,strpos($_POST['montant'],'D')));
    $usercentre = $usercentre->fetchAll()[0]['centre'];
    $latsid =  $bdd->query("select max(SUBSTRING(NumRecu,10,2)) as lastid from payementconcour where centre='".$usercentre."'");
    $latsid =$latsid ->fetchAll()[0]['lastid'];
    if($latsid=="")
    {
        $latsid = 1;
    }
    else
    {
        $latsid += 1;
    }
    $NumRecu= "UPM".substr(strtoupper($usercentre),0,3)."000".$latsid;
    $test=$_POST['test'];
    $verspepar = $_POST['versepar'];
    $modepaiment = $_POST['modep'];
    $docnum = $_POST['docnum'];
    $typeversement = $_POST['typevers'];
    $paymenet =  $bdd->prepare("update payementconcour set montant = ? , NumRecu =? ,modepaiement=?,versepar=?,docnum=?,typeversement=? where md5(id_contact)=  ?  and test = ? ");
    if($paymenet->execute(array($_POST['montant'],$NumRecu,$modepaiment,$verspepar,$docnum,$typeversement,$id,$test)))
    { ?>
        <script type="text/javascript">
            window.location = "https://crm.myupm.net/?page=financement";
        </script>
<?php }

  



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
                 <?php


               $etud =  $bdd->query(" INSERT INTO `payementconcour`(`nom`, `prenom`, `frais_dossier`, `test`, `date_test`, `date_frais`,
                `id_contact`, `numero_dossier`,centre) select nom,prenom,Frais_Dossier,test,date_test,Date_Frais,id,numero_dossier,centre
                from contact_direct where test is not null and date_test is not null and frais_dossier = 1 and  id not in (select id_contact from payementconcour) ");

               $etud =  $bdd->query("update payementconcour  AS pc INNER JOIN contact_direct AS cd ON pc.id_contact = cd.id
              set pc.nom=cd.nom,pc.prenom=cd.prenom,pc.frais_dossier=cd.frais_dossier,pc.test=cd.test,pc.niveau=cd.niveau_demande,
              pc.date_test=cd.date_test,pc.date_frais=cd.date_frais,pc.centre=cd.centre,pc.numero_dossier=cd.numero_dossier,pc.Annee_Univ=cd.Annee_Univ,pc.contact_suivi_par=cd.Contact_Suivi_par");
               if(isset($_POST['valierdirect']) || $_POST['valierdirect']!="" ) {
               $etud = $bdd->query("update payementconcour set valide=1 where montant is not null and NumRecu is not null");
               }


                   $etud = $bdd->query("select montant,NumRecu,Frais_Dossier,test,date_test,Date_Frais,numero_dossier,nom,prenom,id_contact from payementconcour where valide=0 and nom is not null and prenom is not null and test is not null and date_test is not null and centre in (select centre from users where id = ".$_SESSION['userid'].") or contact_suivi_par = ".$_SESSION['userid']);





               if(isset($_POST['supprpayement']))
               {

                   $id = $_POST['id_contact'];
                   //$centre =  $centre->fetchAll()[0]['centre'];
                   $test=$_POST['test'];
                   $paymenet =  $bdd->prepare("update payementconcour set montant = NULL , NumRecu =NULL where id_contact=  ? and test = ?");
                   $paymenet->execute(array($id,$test));
               }
               ?>
               
                <section class="content">
          <div class="row">
            <div class="col-xs-12">
             <!-- /.box -->

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Edition des reçus</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php
                    $sql="select * from payementconcour where md5(id_contact)= '".$_GET['id']."'";
                    $res = $bdd->query($sql);
                    $res=$res->fetchAll();
                    if($_GET['id']!="" and strlen($_GET['id'])>8 and $_GET['id']!=null and !is_int($_GET['id']) and count($res)>0) {
                    $centre = $bdd->query("select centre from users where id = ".$_SESSION['userid']);
                    $centre=$centre->fetchAll()[0]['centre'];
                        ?>
                           <form method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $res[0]['nom']; ?>" disabled>
                                    <input type="hidden" class="form-control" id="id_contact" name="id_contact" value="<?php echo md5($res[0]['id_contact']); ?>" >
                                </div>
                                    </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="prenom">Prenom</label>
                                    <input type="text" class="form-control" id="prenom" name="prenom"  value="<?php echo $res[0]['prenom']; ?>" disabled>
                                </div>
                                    </div>
                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="datefrais">Date Frais</label>
                                    <input type="text" class="form-control" id="datefrais" name="datefrais" value="<?php  echo date("d/m/Y",strtotime($res[0]['date_frais'])); ?>" disabled>
                                </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="test">Test</label>
                                        <input type="text" class="form-control" id="test" name="test" value="<?php echo $res[0]['test']; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="datetest">Date Test</label>
                                        <input type="text" class="form-control" id="datetest" name="datetest"  value="<?php echo date("d/m/Y",strtotime($res[0]['date_test'])); ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="datetest">Centre</label>
                                        <input type="text" class="form-control" id="centre" name="centre"  value="<?php echo $centre;  ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="montant">Montant</label>
                                    <input type="number" class="form-control" id="montant" name="montant" onchange="if(parseInt(this.value)<0) this.value='';" required="" >
                                   <!-- <select class="form-control" id="montant" name="montant" required >
                                        <option></option>
                                        <option value="500" >500 DHS</option>
                                        <option value="1000" >1000 DHS</option>
                                    </select>-->
                                </div>

                                <div class="col-md-4">
                                    <label for="montant">Versé par :</label>
                                    <input type="text" class="form-control" id="versepar" name="versepar" placeholder="Nom et Prénom" required="" >
                                </div>

                                
                                <div class="col-md-4">
                                    <label for="test">Mode Paiement : </label>
                                    <div class="radio">
                                        <label><input type="radio" value="Chèque" name="modep" onchange="if(this.checked) document.getElementById('docnum').removeAttribute('readonly');"  checked >Chèque</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="Avis de versement" name="modep" onchange="if(this.checked) document.getElementById('docnum').removeAttribute('readonly');"> Avis de versement</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="Mise à disposition" name="modep"  onchange="if(this.checked) document.getElementById('docnum').removeAttribute('readonly');" >Mise à disposition</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="Espèce" name="modep" onchange="if(this.checked) document.getElementById('docnum').setAttribute('readonly','readonly');">Espèce (sous réserve d’autorisation préalable de la direction des opérations)</label>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="test">Type Versement : </label>
                                    <div class="radio">
                                        <label><input type="radio" value="Frais de dossier" name="typevers" checked >Frais de dossier</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="Frais d'inscription" name="typevers"> Frais d'inscription</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" value="Frais de concour" name="typevers" >Frais de concours</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nom">Document Numéro </label>
                                        <input type="text" class="form-control" id="docnum" name="docnum" required  >
                                    </div>
                                </div>


                            </div>
                            </br>
                                <div class="row">
                                    <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary" name="payconcour">Valider</button>
                                        </div>
                                </div>


                        </form>
                        </div>

                    </div>
                    <?php } else{ ?>
                  <table id="example4" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Nom</th>
                          <th>Prenom</th>
                        <th>Frais dossier</th>
                        <th>Date frais</th>
                          <th>Test</th>
                          <th>Date Test</th>
                        <th>Reçu Numero</th>
                        <th>Impression</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($etud as $e) {  ?>
                      <tr id="<?php echo $e['id_contact']; ?>" onclick="if(this.style.cursor=='pointer')  window.open('https://crm.myupm.net/?page=financement&id=<?php echo md5($e['id_contact']); ?>');"  <?php if($e['NumRecu']=="") { ?> style="cursor:pointer;" <?php } ?>>
                        <td><?php echo  $e['nom']; ?></td>
                          <td><?php echo  $e['prenom']; ?></td>
                          <td><input type="checkbox"  <?php if($e['Frais_Dossier']==1) echo "checked"; ?>  /></td>
                          <td><?php echo  date("d/m/Y", strtotime($e['Date_Frais'])); ?></td>
                          <td><?php echo  $e['test']; ?></td>
                          <td><?php echo  date("d/m/Y", strtotime($e['date_test'])); ?></td>
                          <td>
                              <?php  
                                     $ondrive = $bdd->query("select email from users where id=".$_SESSION['userid']);
                                        $onedrive = $ondrive->fetchAll()[0]['email'];
                                        $onedrive =str_replace ( '.' , '_' ,  str_replace ( '@' , '_' , $onedrive ));
                                 
                                      echo "<a href='https://upmcloud-my.sharepoint.com/personal/".$onedrive."/_layouts/15/onedrive.aspx' >".$e['NumRecu']."</a>";
                                  
                              
                              ?>
                              </td>
                          <td>
                              <?php if($e['NumRecu']!="")  { ?> <a   target="_blank" href="?page=imprimerrecu&id=<?php echo md5(md5($e['id_contact'])).md5($e['id_contact']); ?>" >Imprimer  le Reçu </a> <?php  } ?>
                          </td>
                      </tr>
                    <?php } ?>

                    </tbody>
                  </table>
                        </br>
                        

                    <?php  } ?>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
                
            </div>
        </div>

        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>