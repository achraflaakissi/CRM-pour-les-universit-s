<?php 



$value_user="";
$value_passwd="";

 
if(isset($_POST)){
	
	if(!empty($_POST)){
	    
			if(isset($_POST['eid'])){
			$value_user=$_POST['eid'];	
			
			if(isset($_POST['passwd'])){
			$value_passwd=$_POST['passwd'];
			
require('content/controller/class.login.php');

			$login->Identifiant=$value_user;
			$login->Password=$value_passwd;
			
			$message=$login->authentification();
				
			}
			
		}
	 
	}
	
}



?>

 

<!DOCTYPE html>
<html class="body-full-height">
  <head>
     <meta charset="utf-8" /> 
        <title>Université privéee de Marrakech</title>

<?php include('content/modules/ressources-login.php'); ?>

  </head>
  <body class="hold-transition login-page" style="background-image: ">
  <div class="login-box">
      <div class="login-logo">
          <a href="index2.html"><img src="dist/img/logo.png"></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
          <p class="login-box-msg">Bienvenue, Veuillez vous authentifier</p>
          <form id="login_form" method="post">
              <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="eid" id="eid" placeholder="Email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              </div>
              <div class="form-group has-feedback">
                  <input type="password" class="form-control" placeholder="Password" name="passwd" id="passwd" >
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              </div>
              <div class="row">
                  <div class="col-xs-7">
                      <div class="checkbox icheck">
                              <a>Mot de passe oublié ?</a>
                      </div>
                  </div><!-- /.col -->
                  <div class="col-xs-5">
                      <button type="submit" id="btn-submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div><!-- /.col -->
              </div>
          </form>

      </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
  <script>
      $(function () {
          $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' // optional
          });
      });
      $(function(){

          $("#btn-submit").click(function() {

              $("#login_form").submit();

          });
  </script>
  </body>
</html>