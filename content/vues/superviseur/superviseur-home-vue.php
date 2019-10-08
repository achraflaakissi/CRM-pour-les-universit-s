<?php
 
if(isset($_SESSION['user'])) {
include('content/config.php');
  if($_SESSION['user']['profile']==sha1(md5('client'.$salt)) ){

    ?>

 <!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8" /> 
     <title>Extranet - Accueil</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="css/upm.css" media="screen">
      <link rel="stylesheet" href="css/font-awesome.min.css" media="screen">
      <link rel="stylesheet" href="css/uploadfile.css" media="screen">

      <script src="js/jquery-2.1.3.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.uploadfile.min.js"></script>
      <script src="js/sweet-alert.min.js"></script>

  </head>

  <body>
        <div class="container-fluid body-container">

        <?php  if($_SESSION['user']['interest']>0)  {

            include('content/modules/home-sidebar-inc.php');

        }else {  ?>  <div class="row-fluid home-body"></div>  <?php } ?>

   </div>



  <!-- Référence modal -->

     <div class="modal fade" id="create-ticket" data-keyboard="false" data-backdrop="static" data-attache="false">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                      <h5 class="modal-title">Création d’une nouvelle demande</h5>
                 </div>
                 <div class="modal-body">

                     <div class="form-group demande-ceation-type-container col-xs-6">
                         <label for="creation-demande-type">Type de demande</label>

                         <select class="form-control select-demande-section" id="creation-demande-section" placeholder="Type de demande">
                             <?= modalitems();  ?>
                         </select>
                     </div>

                         <div class="form-group col-xs-6  hide">
                             <label for="creation-demande-type">&nbsp;</label>
                             <select class="form-control select-demande-type" id="creation-demande-item" >



                             </select>

                         </div>

                     <div class="form-group col-xs-12 creation-demande-group-operation">

                     </div>

                     <div class="form-group col-xs-12">
                         <label for="creation-demande-objet">Objet de la demande</label>
                         <input type="text" class="form-control" id="creation-demande-objet" placeholder="Objet de votre demande">

                     </div>
                     <div class="form-group col-xs-12">
                         <label for="creation-demande-description">Description</label>
                         <textarea  id="creation-demande-description" class="form-control wysiwyg"  placeholder="Description de votre demande ..." ></textarea>
                     </div>
                     <input type="hidden" id="uploadedfiles"/>

                     <div style="clear: both">
                     <div id="fileuploader" class="btn btn-warning "><i class="fa  fa-paperclip "></i>&nbsp; Attacher des fichiers</div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                     <button type="button" class="btn btn-primary btn-creation-demande-save"><i class="fa fa-paper-plane-o "></i> Enregistrer la demande</button>
                 </div>
             </div>
         </div>
     </div>









  <script type="text/javascript">

      $(function() {
        //  $('.wysiwyg').wysihtml5();



          $( document ).ready(function() {


              $.post( "/extranet/?page=tools", { function: "home" })
                  .done(function( data ) {
                      if(data.validation==true){


                          $(".home-body").slideDown("200", function () {

                              $(this).html(data.body);


                          });

                      }else{


                          $( this ).html('<span class="alert alert-error">'+data.message+'</span>');


                      }
                  });




          });



          $( "body" ).delegate( ".select-demande-type option", "click", function() {
            if($(this).data('op')==1){

                $('.creation-demande-group-operation').html('<div class="row">  <div class="col-xs-3"><label for="creation-demande-objet">Numéro d\'opération</label><input type="text" class="form-control" id="creation-demande-operation" placeholder="Numéro de l\'opération"></div><div class="col-xs-9 creation-demande-operation-alert"></div></div>');

            }else{
                $('.creation-demande-group-operation').html('');
            }

          });






          $( "body" ).delegate(".save-interest", "click", function() {

              var items = new Array();
              $("#modal-parametrage input[type='checkbox']:checked").each(function() {
                  items.push($(this).val());
              });

              $.post( "/extranet/?page=tools", {list:items, function: "saveinterest" })
                  .done(function( data ) {
                      if(data.validation==true){

                       $("#modal-parametrage").modal("hide");
                          location.reload();
                      }else{

                          $( this ).html('<span class="alert alert-error">'+data.message+'</span>');

                      }
                  });


          });




          $( "body" ).delegate(".side-list-section-submenu .list-group-item a", "click", function(e) {

              e.preventDefault()
              var item=$(this).data("table");

              $(".side-list-section-submenu li").removeClass("side-menu-selected");
              $(this).parent("li").addClass("side-menu-selected");

         $.post( "/extranet/?page=tools", {item:item, function: "gettable" })
                  .done(function( data ) {


                 $('.home-data .panel-data').empty().html(data.table);



                  });


          });


          $( "body" ).delegate( ".select-demande-section option", "click", function() {

              $.post( "/extranet/?page=tools", { section: $.trim($(this).val()), function: "getitems" })
                  .done(function( data ) {
                      if(data.validation==true){

                          $('.select-demande-type').parent().addClass('hide');
                          $('.select-demande-type').empty().append(data.items);
                          $('.creation-demande-group-operation').html('');
                          $('.select-demande-type').parent().removeClass('hide');

                      }else{

                          $('.select-demande-type').slideUp();

                          $( this ).after('<span class="alert alert-error">'+data.message+'</span>');


                      }
                  });

          });


          //Empty modal on closing


          $('#create-ticket').on('hidden.bs.modal', function () {

             $('#creation-demande-objet').val("");
             $('#creation-demande-description').val("");
             $('#creation-demande-item option').remove();
             $('#uploadedfiles').val("");
             $('#creation-demande-operation').remove();
             $('.select-demande-type').parent().addClass('hide');
             $('.creation-demande-group-operation').html('');


          });


          //show next version

          $( "body" ).delegate( "#creation-demande-operation", "blur", function() {
              if($.trim($(this).val())!=''){

          $.post( "/extranet/?page=tools", { op: $.trim($(this).val()), function: "showversion" })
              .done(function( data ) {
                  if(data.validation==true){
                      $('.creation-demande-operation-alert .alert').slideUp()
                      $('.creation-demande-operation-alert').html('<span class="alert alert-info alert-version-op">'+data.message+'</span>');
                      $('.creation-demande-operation-alert .alert').slideDown()
                  }else{
                      $('.creation-demande-operation-alert .alert').slideUp();
                      $('.creation-demande-operation-alert').html('<span class="alert alert-error alert-version-op">'+data.message+'</span>');
                      $('.creation-demande-operation-alert .alert').slideDown();
                  }
              });
          }else{
                  $('.creation-demande-operation-alert').html('');
              }
          });


          // uploader initialisation

         var  DemandeUpload = $("#fileuploader").uploadFile({
              url:"/extranet/?page=tools",
              multiple:true,
              autoSubmit:false,
              fileName:"filesdemande",
              formData: { function: "tempfiles" },
              maxFileSize:1024*1000,
             showFileCounter:true,
             uploadButtonClass:"btn btn-warning",
             // maxFileCount:,
              showStatusAfterSuccess:false,
              dragDropStr: "<span><b>Faites glisser et déposez les fichiers</b></span>",
              abortStr:"Abandonner",
              cancelStr:"Annuler",
              doneStr:"Terminé",
             onSuccess:function(files,data,xhr){
                $('#uploadedfiles').val($('#uploadedfiles').val()+JSON.stringify(data[0]).replace(/['"]+/g, '')+'|')
             },
             onSelect:function(){
               $("#create-ticket").attr("data-attache",'true');

             },
             afterUploadAll:function(){
                 savedemande();
             },
              multiDragErrorStr: "Plusieurs Drag & Drop de fichiers ne sont pas autorisés.",
              extErrorStr:"n'est pas autorisé. Extensions autorisées:",
              sizeErrorStr:"n'est pas autorisé. Admis taille max:",
              uploadErrorStr:"Upload n'est pas autorisé"
          });

      // save demande

          $( "body" ).delegate( ".btn-creation-demande-save", "click", function() {


              //test de remplissage des champs du formulaire de creation des ticket

              $(this).prop('disabled', true);

              var objet = $.trim($('#creation-demande-objet').val());
              var corp = $.trim($('#creation-demande-description').val());
              var item = $('#creation-demande-item').val();
              var uploadedfiles = $('#uploadedfiles').val();


              if ( item=="" || item==null){
                  sweetAlert("", "Selectionnez un type de demande", "error");
                  $(this).prop('disabled', false);
                  return;
              }

              if($('#creation-demande-operation').length){

                  if ( $.trim($('#creation-demande-operation').val())==""){
                      sweetAlert("", "veuillez préciser le numéro d'opération", "error");
                      $(this).prop('disabled', false);
                      return;
                  }

              }

              if ( objet==""){
                  sweetAlert("", "Champs objet vide", "error");
                  $(this).prop('disabled', false);
                  return;
              }

              if ( corp==""){
                  sweetAlert("", "Champs Description vide", "error");
                  $(this).prop('disabled', false);
                  return;
              }


              // fin test


              if($("#create-ticket").attr("data-attache")=="true"){
                  DemandeUpload.startUpload();
              }else
              {
                  savedemande();
              }

              $(this).prop('disabled', false);
          });

          $('#create-ticket input').val("");
          $('#create-ticket select').val("");
          $('#create-ticket textarea').val("");

          function savedemande(){

              var codeop = "";

              if($('#creation-demande-operation').length){
                  codeop= $.trim($('#creation-demande-operation').val());
              }


              $.post( "/extranet/?page=tools", { objet: $.trim($('#creation-demande-objet').val()),corp:$.trim($('#creation-demande-description').val()),item:$('#creation-demande-item').val(),uploadedfiles:$('#uploadedfiles').val(),op:codeop, function: "savedemande" })
                  .done(function( data ) {
                      if(data.validation==true){

                        if($('.ticket-table ul ').prepend(data.element)){

                            $('#create-ticket input').val("");
                            $('#create-ticket select').val("");
                            $('#creation-demande-description').val("");
                            $('#create-ticket').modal('hide');
                            $("#create-ticket").attr("data-attache",'false');


                        }

                      }else{

                        sweetAlert('',data.message,'error');

                      }
                  });

          }



      });



  </script>

  </body>
</html>

<?php


}}



function modalitems() {


    try {
        include('content/config.php');

        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
        $req = $bdd->prepare("SELECT  *  FROM section");
        $req->execute();


        $item="";

        while ($donnees = $req->fetch())

        {

            $item.= '<option class="modal-section-list" value="'.$donnees['id'].'" data-section="'.$donnees['id'].'" >'.$donnees['libelle'].'</option>';

        }

        return $item;

        $req->closeCursor();

    }

    catch(Exception $e)

    {
        die('<span class="alert alert-error"> Erreur : '.$e->getMessage().' Merci de contacter le support </span>');
    }


}
?>