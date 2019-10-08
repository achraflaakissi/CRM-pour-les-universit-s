<?php
if(isset($_SESSION['user'])) {

    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('admin'.$salt)) ){
        require('content/controller/class.remlpiration.php');
        $rempisage=new rempliration();
        $contact=null;
        
        if(isset($_POST['identf']))
        {
            
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            if($_POST['type']=="direct")
            {
                if($bdd->query("update contact_direct set Contact_Suivi_par=".$_POST['commerc']." where id in (".$_POST['identf'].")"))
                {
                echo 1;exit;
                }
                
                //echo "update contact_direct set Contact_Suivi_par = ".$_POST['commerc']." where id in (".$_POST['identf'].")";exit;
            }
            else if($_POST['type']=="indirect")
            {
                if($bdd->query("update contact_indirect set Contact_Suivi_par=".$_POST['commerc']." where id in (".$_POST['identf'].")"))
                 {
                echo 1;exit;
                }
               
                //echo "update contact_direct set Contact_Suivi_par = ".$_POST['commerc']." where id in (".$_POST['identf'].")";exit;
            }
        }
        if(isset($_POST['filtrer']) && count($_POST)>1)
        {
           
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
            $sql="";
            if(isset($_POST['typecontact']) && $_POST['typecontact']=="contactindirecte")
            {
                $sql = "select id,Nom,Prenom,Tel,`E-Mail`,`Nature_de_Contact`,Marche,Ville,Lycee,Niveau_des_etudes,Formation_Demmandee from contact_indirect where 1 ";
                 if($_POST['anneeuniver']!="")
                 {
                     $sql.=" and Annee_Univ = '".$_POST['anneeuniver']."'";
                 }
                 if($_POST['formation']!="" && $_POST['formation']!="all")
                 {
                     $sql.=" and Formation_Demmandee = '".$_POST['formation']."'";
                 }
                
                 if($_POST['nature_contact']!="" && $_POST['nature_contact']!="all")
                 {
                     $sql.=" and Nature_de_Contact = '".$_POST['nature_contact']."'";
                 }
                   if($_POST['niveau_etd']!="" && $_POST['niveau_etd']!="all" )
                 {
                     $sql.=" and Niveau_des_etudes = '".$_POST['niveau_etd']."'";
                 }
                   if($_POST['marche']!="" && $_POST['marche']!="all" )
                 {
                     $sql.=" and Marche = '".$_POST['marche']."'";
                 }
                    if($_POST['ville']!="" && $_POST['ville']!="all")
                 {
                     $sql.=" and Ville = '".$_POST['ville']."'";
                 }
                 
                    if($_POST['Statut']!="")
                 {
                     $sql.=" and StatutContact = '".$_POST['Statut']."'";
                 }
                       if($_POST['centre']!="" && $_POST['centre']!="all")
                 {
                     $sql.=" and centre = '".$_POST['centre']."'";
                 }
                
               
                  $res =  $bdd->query($sql);
                $contact = $res->fetchAll();
              
                 
            }
            else if(isset($_POST['typecontact']) && $_POST['typecontact']=="contactdirecte")
            {
                
                $sql = "select id,Nom,Prenom,Tel,`E-Mail`,`Nature_de_Contact`,Marche,Ville,Etablissement,Niveau_des_etudes,Formation_Demmandee from contact_direct where 1 ";
                 if($_POST['anneeuniver']!="")
                 {
                     $sql.=" and Annee_Univ = '".$_POST['anneeuniver']."'";
                 }
                 if($_POST['formation']!="" && $_POST['formation']!="all")
                 {
                     $sql.=" and Formation_Demmandee = '".$_POST['formation']."'";
                 }
                 
                 if($_POST['resultat']!="" && $_POST['resultat']!="all")
                 {
                     $sql.=" and Resultat = '".$_POST['resultat']."'";
                 }
                 
                   if($_POST['absent']!="" && $_POST['absent']!="all" )
                 {
                     $sql.=" and AbsTest = ".$_POST['absent'];
                 }
                 
                    if($_POST['test_passe']!="" && $_POST['test_passe']!="all")
                 {
                     $sql.=" and Test_Passe = ".$_POST['test_passe'];
                 }
                 
                    if($_POST['test']!="" && $_POST['test']!="all" )
                 {
                     $sql.=" and 	test = '".$_POST['test']."'";
                 }
                 
                 if($_POST['nature_contact']!="" && $_POST['nature_contact']!="all" )
                 {
                     $sql.=" and Nature_de_Contact = '".$_POST['nature_contact']."'";
                 }
                   if($_POST['niveau_etd']!="" && $_POST['niveau_etd']!="all")
                 {
                     $sql.=" and Niveau_des_etudes = '".$_POST['niveau_etd']."'";
                 }
                   if($_POST['marche']!=""  && $_POST['marche']!="all")
                 {
                     $sql.=" and Marche = '".$_POST['marche']."'";
                 }
                    if($_POST['ville']!="" && $_POST['ville']!="all" )
                 {
                     $sql.=" and Ville = '".$_POST['ville']."'";
                 }
                 
                     if($_POST['centre']!="" && $_POST['centre']!="all")
                 {
                     $sql.=" and centre = '".$_POST['centre']."'";
                 }
                 
                 
                    if($_POST['Statut']!="")
                 {
                     $sql.=" and StatutContact = '".$_POST['Statut']."'";
                 }
                  
                  $res =  $bdd->query($sql);
                $contact = $res->fetchAll();
                
            }
           
           
        }
        
        
        $getNaturecontact=$rempisage->getFunctions("getNatureContact");
        $getSeriebac=$rempisage->getFunctions("getSeriebac");
        $getVille=$rempisage->getFunctions("getVille");
        $getNiveauEtudes=$rempisage->getFunctions("getNiveauEtudes");
        $getMarche=$rempisage->getFunctions("getMarche");
        $getAgent=$rempisage->getFunctions("getAgent");
        $getFormationDemander=$rempisage->getFunctions("getFormationDemander");
        $getresultat=$rempisage->getFunctions("getresultat");
        $test=$rempisage->getFunctions("gettest");
        $commercial=$rempisage->getFunctions("getCommercial");
        include "content/modules/header-inc.php";
        ?>
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php include "content/modules/sidebar-inc.php"; ?>
            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="alert alert-success fade in alert-dismissable" style="margin-top:18px;display:none;" id="alertmessage" >
                                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                                <strong>L'affectation!</strong>  a été bien effectuée.
                            </div>
                            
                            <form method="post">
                            <div class="box">
                                <div class="box-header with-border">
                                    <i class="fa fa-bullhorn"></i> <h3 class="box-title">Affectation des commercial</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="typecontact">Type Contact : </label>
                                                        <select id="typecontact" name="typecontact" class="form-control" style="width: 100%;" onchange="vidercontent();">
                                                            <option  value="--">--</option>
                                                            <option value="contactdirecte" selected   <?php if(isset($_POST['typecontact']) && $_POST['typecontact']=="contactdirecte") echo "selected"; ?> >Contact Direct</option>
                                                            <option value="contactindirecte"  <?php if(isset($_POST['typecontact']) && $_POST['typecontact']=="contactindirecte") echo "selected"; ?>  >Contact Indirect</option>
                                                        </select>
                                                    </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group" style="width: 100% !important;">
                                                        <label for="anneeuniver">Année Universitaire</label>
                                                        <select id="anneeuniver" onchange="vidercontent();" name="anneeuniver" class="form-control">
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
                                                </div>
                                                
                                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Formation Demmandée: </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" name="formation" id="formation" data-placeholder="Formation ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getFormationDemander; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Niveau Etud : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="niveau_etd" name="niveau_etd" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getNiveauEtudes; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                                <?php
                                                if($_SESSION['user']['otr_cmp']==1)
                                                {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Nature de contact :</label>
                                                            <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="nature_contact" name="nature_contact" data-placeholder="Les agents ..." style="width: 100%;">
                                                                <option value="all">Tout</option>
                                                                <?php echo $getNaturecontact; ?>
                                                            </select>
                                                        </div><!-- /.form-group -->
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                    <div class="row">
                                        
                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Marchés : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="marche" name="marche" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getMarche; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Ville :</label>
                                                <span id="selection">
                                                    <select onchange="vidercontent();" id="ville" name="ville" class="form-control select2" multiple="multiple" data-placeholder="Etat Phoning ..." style="width: 100%;">
                                                        <option value="all">Tout</option>
                                                        <?php echo $getVille; ?>
                                                    </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Statut :</label>
                                                <span id="selection">
                                                  <select onchange="vidercontent();" class="form-control select2 select2-hidden-accessible" id="statut" name="statut" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                                      <option value=""></option>
                                                      <option value="Prospect">	Prospect	</option>
                                                      <option value="Candidat">	Candidat	</option>
                                                      <option value="Inscrit">	Inscrit	</option>
                                                  </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Serie Bac : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="serie_bac" name="serie_bac" data-placeholder="Formation ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <?php echo $getSeriebac; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="row">

                                        
                                        
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Resultat :</label>
                                                <span id="selection">
                                                   <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="resultat" data-placeholder="Resultat ..." style="width: 100%;">
                                                       <option value="all">Tout</option>
                                                       <?php echo $getresultat; ?>
                                                   </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Absent : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="absent" name="absent" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                   <option value="1">Oui</option>
                                                   <option value="0">Non</option>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left"> Centre :</label>
                                                <span id="selection">
                                                    <select onchange="vidercontent();" id="centre" class="form-control select2" name="centre" multiple="multiple"  data-placeholder="Etat Phoning ..." style="width: 100%;">
                                                        <option value="all">Tout</option>
                                                        <option>Casablanca</option>
                                                        <option>Marrakech</option>
                                                    </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group text-center">
                                                <img src="dist/img/loading.gif" class="loading" width="10%">
                                                <label class="pull-left">Test :</label>
                                                <span id="selection">
                                                   <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="test" name="test" data-placeholder="Marchés ..." style="width: 100%;">
                                                       <option value="all">Tout</option>
                                                       <?php echo $test; ?>
                                                   </select>
                                                </span>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                    <div class="row">

                                        
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label> Test Passé : </label>
                                                <select onchange="vidercontent();" class="form-control select2" multiple="multiple" id="test_passe"  name="test_passe" data-placeholder="Marchés ..." style="width: 100%;">
                                                    <option value="all">Tout</option>
                                                    <option value="1">Oui</option>
                                                    <option value="0">Non</option>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div><!-- ./box-body -->
                                <div class="box-footer">
                                    <div class="text-center" id="btnfilter">
                                        <img src="dist/img/loading.gif" width="5%">
                                    </div>
                                    <button type="submit"  id="filtrer" name="filtrer" class="btn btn-primary pull-right" style="width: 10%">Filtrer</button>
                                    </br>
                                    </br>
                                    <?php if(isset($_POST['filtrer']) && count($_POST)>1) {?>
                                    
                                    
                                        <div calss="row">
                                            <div class="col-md-12">
                          <table id="example10" class="table table-bordered display select" cellspacing="0" width="100%" >
                            <thead>
                                    <tr>
                                            <th><input name="select_all" value="1" type="checkbox"></th>
                                        
                                    <th>
                                        Nom
                                    </th>
                                    <th>
                                        Prénom
                                    </th>
                                     <th>
                                        Téléphone
                                    </th>
                                     <th>
                                        Email
                                    </th>
                                    <th>
                                        Ville
                                    </th>
                                    <th>
                                        Marché
                                    </th>
                                    <th>
                                        Formation
                                    </th>
                                    <th>
                                        Niveau des Etudes
                                    </th>
                                    
                                </thead>
                                <tbody>
                                    <?php 
                                    
                                    foreach($contact as $co) {  ?>
                                        <tr id="<?php echo $co['id']; ?>">
                                            <td><input type="checkbox" class="check" /></td>
                                            <td><?php echo $co['Nom']; ?></td>
                                            <td><?php echo $co['Prenom']; ?></td><td><?php echo $co['Tel']; ?></td><td><?php echo $co['E-Mail']; ?></td><td><?php echo $co['Ville']; ?></td><td><?php echo $co['Marche']; ?></td><td><?php echo $co['Formation_Demmandee']; ?></td><td><?php echo $co['Niveau_des_etudes']; ?></td>
                                       </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                            </div>
                            </br>
                            </br>
                            <div class="row">
                                <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Commercial : </label>
                                                <select onchange="vidercontent();" class="form-control"  name="commercialchoix" id="commercialchoix" >
                                                    <option value=""></option>
                                                    <?php echo $commercial; ?>
                                                </select>
                                            </div><!-- /.form-group -->
                                        </div>
                                        <div class="col-md-3 col-md-offset-4">
                                             <button type="button"  id="affecter" name="affecter" class="btn btn-success pull-right" >Affecter</button>
                                        </div>
                            </div>
                        </div>
                        <?php  } ?>
                    </div>
                                    
                                    
                                    
                                </div><!-- /.box-footer -->
                            </div><!-- /.box -->
                            </form>
                        </div><!-- /.col -->
                    
                </section>
            
                
            </div>
        </div>
        <script type="text/javascript">
        
        
        
                      
        
            $('#typecontact').change(function(){
                
                
                if($(this).val()=="contactindirecte")
                {
                   
                   $("#absent").attr("disabled","disabled");
                   $("#resultat").attr("disabled","disabled");
                   $("#serie_bac").attr("disabled","disabled");
                   $("#test").attr("disabled","disabled");
                   $("#test_passe").attr("disabled","disabled");
                   
                }
                else
                {
                   $("#absent").removeAttr( "disabled" );
                   $("#resultat").removeAttr("disabled");
                   $("#serie_bac").removeAttr("disabled");
                   $("#test").removeAttr("disabled");
                   $("#test_passe").removeAttr("disabled");
                }
            });
         
            
            
           //
            // Updates "Select all" control in a data table
            //
            function updateDataTableSelectAllCtrl(table){
               var $table             = table.table().node();
               var $chkbox_all        = $('tbody input[type="checkbox"]', $table);
               var $chkbox_checked    = $('tbody input[type="checkbox"]:checked', $table);
               var chkbox_select_all  = $('thead input[name="select_all"]', $table).get(0);
            
               // If none of the checkboxes are checked
               if($chkbox_checked.length === 0){
                  chkbox_select_all.checked = false;
                  if('indeterminate' in chkbox_select_all){
                     chkbox_select_all.indeterminate = false;
                  }
            
               // If all of the checkboxes are checked
               } else if ($chkbox_checked.length === $chkbox_all.length){
                  chkbox_select_all.checked = true;
                  if('indeterminate' in chkbox_select_all){
                     chkbox_select_all.indeterminate = false;
                  }
            
               // If some of the checkboxes are checked
               } else {
                  chkbox_select_all.checked = true;
                  if('indeterminate' in chkbox_select_all){
                     chkbox_select_all.indeterminate = true;
                  }
               }
            }
            
            
            
            
            $(document).ready(function (){
   // Array holding selected row IDs
   var rows_selected = [];
   var table = $('#example10').DataTable({
      'columnDefs': [{
         'targets': 0,
         'searchable': false,
         'orderable': false,
         'width': '1%',
         'className': 'dt-body-center',
         'render': function (data, type, full, meta){
             return '<input type="checkbox" class="check">';
         }
      }],
      'order': [[1, 'asc']],
      'rowCallback': function(row, data, dataIndex){
         // Get row ID
         var rowId = data[0];

         // If row ID is in the list of selected row IDs
         if($.inArray(rowId, rows_selected) !== -1){
            $(row).find('input[type="checkbox"]').prop('checked', true);
            $(row).addClass('selected');
         }
      }
   });

   // Handle click on checkbox
   $('#example10 tbody').on('click', 'input[type="checkbox"]', function(e){
      var $row = $(this).closest('tr');

      // Get row data
      var data = table.row($row).data();

      // Get row ID
      var rowId = data[0];

      // Determine whether row ID is in the list of selected row IDs
      var index = $.inArray(rowId, rows_selected);

      // If checkbox is checked and row ID is not in list of selected row IDs
      if(this.checked && index === -1){
         rows_selected.push(rowId);

      // Otherwise, if checkbox is not checked and row ID is in list of selected row IDs
      } else if (!this.checked && index !== -1){
         rows_selected.splice(index, 1);
      }

      if(this.checked){
         $row.addClass('selected');
      } else {
         $row.removeClass('selected');
      }

      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle click on table cells with checkboxes
   $('#example10').on('click', 'tbody td, thead th:first-child', function(e){
      $(this).parent().find('input[type="checkbox"]').trigger('click');
   });

   // Handle click on "Select all" control
   $('thead input[name="select_all"]', table.table().container()).on('click', function(e){
      if(this.checked){
         $('#example10 tbody input[type="checkbox"]:not(:checked)').trigger('click');
      } else {
         $('#example10 tbody input[type="checkbox"]:checked').trigger('click');
      }

      // Prevent click event from propagating to parent
      e.stopPropagation();
   });

   // Handle table draw event
   table.on('draw', function(){
      // Update state of "Select all" control
      updateDataTableSelectAllCtrl(table);
   });

  

});




   $("#affecter").click(function(){
              if( $("#commercialchoix").val()=="")
              {
              alert("Choisissez un commercial");
              return false;
              }
                var idents=Array();
                var checkboxes = document.getElementsByClassName("check");
                if($('#typecontact').val()=="contactdirecte")
                {
                    
                      for (var i=0; i<checkboxes.length; i++) {
                         if (checkboxes[i].checked) {
                           idents.push(checkboxes[i].parentElement.parentElement.getAttribute('id'));
                         }
                      }
                      $.ajax({
                          type:"post",
                          data:"identf="+idents+"&commerc="+$("#commercialchoix").val()+"&type=direct",
                          success:function(data)
                          {
                              if(data==1)
                              {
                              $('#alertmessage').css("display","block");
                                var table = $('#example10').DataTable();
                            var p = table.rows({ page: 'current' }).nodes();
                              }
                          }
                          
                      })
                      
                   
                }
                else if($('#typecontact').val()=="contactindirecte")
                {
                    //indirect
                    
                     var checkboxes = document.getElementsByClassName("check");
                      for (var i=0; i<checkboxes.length; i++) {
                         if (checkboxes[i].checked) {
                           idents.push(checkboxes[i].parentElement.parentElement.getAttribute('id'));
                         }
                      }
                      $.ajax({
                          type:"post",
                          data:"identf="+idents+"&commerc="+$("#commercialchoix").val()+"&type=indirect",
                          success:function(data)
                          { 
                                if(data==1)
                                {
                              $('#alertmessage').css("display", "block");
                             var table = $('#example10').DataTable();
                            var p = table.rows({ page: 'current' }).nodes();
                                }
                          }
                          
                      })
                        
                }
            });


           
            
            
          
            
            
           
           
           
            
        </script>




        <?php include "content/modules/footer-inc.php"; ?>

    <?php

    }

}

?>