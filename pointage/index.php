
<?php
 
//print_r($_COOKIE);exit;
//4431a2d5a5516801631d3370a8ca13b5




session_start();


include($_SERVER['DOCUMENT_ROOT'].'/content/config.php');
if(isset($_SESSION['connected']) && !is_null($_SESSION['connected']))
{
    session_destroy();
}

function getBrowser()
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    }
    elseif(preg_match('/OPR/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

// now try it
$ua=getBrowser();


$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$server_ip.';dbname='.$server_database, $server_user, $server_password, $pdo_options) or die( mysql_error() );
if(count($_POST)>0 && isset($_POST['authenrif']) )
{
    if(isset($_POST['eid']) && $_POST['eid']!="" && isset($_POST['passwd']) && $_POST['passwd']!="" )
    {
        $res = $bdd->query("select * from users where login='".$_POST['eid']."' and password='".$_POST['passwd']."'");
        $res=$res->fetchAll();
        if(count($res)>0)
        {
            $_SESSION['connected']=$res[0][0];
            $res1 = $bdd->query("select * from pointage where user=".$res[0][0]);
            $res1=$res1->fetchAll();
            if(count($res1)>0 && count($_COOKIE)>0)
            {
                    if(isset($_COOKIE['pointage']) && count($_COOKIE['pointage'])>0)
                    {
                        $res1 = $bdd->query("select * from pointage where user=".$res[0][0]." and date_premier_pointage = '".$_COOKIE['pointage']['date_premier_pointage']."' and user=".$_COOKIE['pointage']['user']." and cookieset=1");
                        if(count($res1)>0)
                        {
                            echo "<div class='alert alert-success alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Erreur !</strong> bien.
                            </div>";
                        }
                    }
                    else
                    {
                        $res2 = $bdd->query("select * from pointage where user=".$res[0][0]." and cookieset=1 ");
                        if(count($res2)>0)
                        {
                           echo "<div class='alert alert-danger alert-dismissable'>
                              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                              <strong>Erreur !</strong> c'est pas votre poste de travail.
                            </div>";
                        }
                        else 
                        {
                            //if(setcookie("pointage",array('date_premier_pointage'=>date('Y-m-d H:i:s'),'user'=>$res[0][0],'navigateur'=>$ua['name']), time()+31556926))
                            $_SESSION['cookie']=array('date_premier_pointage'=>date('Y-m-d H:i:s'),'user'=>$_SESSION['connected'],'navigateur'=>$ua['name'],'time'=>time()+31556926);
                                if($bdd->query("INSERT INTO `pointage`(`date_entre`,`user`, `date_premier_pointage`, `cookieset`) 
                            VALUES (NOW(),".$res[0][0].",NOW(),1)"));
                            echo "<script>window.location='cookie.php';</script>";
                            
                        }
                    
                    }
            }
            else
            {
               
                 //if(setcookie("pointage",array('date_premier_pointage'=>date('Y-m-d H:i:s'),'user'=>$res[0][0],'navigateur'=>$ua['name']), time()+31556926))
                 $_SESSION['cookie']=array('date_premier_pointage'=>date('Y-m-d H:i:s'),'user'=>$res[0][0],'navigateur'=>$ua['name'],'time'=>time()+31556926);
                    if($bdd->query("INSERT INTO `pointage`(`date_entre`,`user`, `date_premier_pointage`, `cookieset`)
                            VALUES (NOW(),".$res[0][0].",NOW(),1)"))
                            echo "<script>window.location='cookie.php';</script>";
            }
        }
        else
        {
            echo "<div class='alert alert-danger alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Erreur !</strong> Login ou mot de passe incorrect.
            </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html class="body-full-height">
<head>
    <meta charset="utf-8" />
    <title>Université privée de Marrakech</title>

    <!DOCTYPE html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="https://crm.myupm.net/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://crm.myupm.net/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="https://crm.myupm.net/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    
</head>
<body class="hold-transition login-page" style="background-image: ">
    

    
    
<div class="login-box">
    <div class="login-logo">
        <a href="index2.html"><img src="https://crm.myupm.net/dist/img/logo.png"></a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Bienvenue, Veuillez vous authentifier</p>
        <form id="login_form" method="post" action="" >
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
                    <button type="submit" id="btn-submit" name="authenrif"  class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div><!-- /.col -->
            </div>
            

        </form>

    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="https://crm.myupm.net/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="https://crm.myupm.net/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="https://crm.myupm.net/plugins/iCheck/icheck.min.js"></script>
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
