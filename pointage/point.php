
<?php

ini_set('session.gc-maxlifetime', 600);
session_start();
$nom=null;
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host=localhost;dbname=pointage' , "root", "", $pdo_options) or die(mysql_error());
if(count($_POST)>0 && isset($_POST['search']))
{
    if($bdd->query("insert into pointage VALUES (null,null,NOW(),'".$xmlDoc->getElementsByTagName('position')->item(0)->nodeValue."',".$_SESSION['user'].")"))
    {
        header("location:acceuil.php");
    }
}
if(isset($_SESSION['user']) && !is_null($_SESSION['user']))
{

    $nom =  $bdd->query("select nom,prenom from users where id=".$_SESSION['user']);
    $nom =$nom->fetchAll();
    $nom=$nom[0]['nom']." ".$nom[0]['prenom'];
}
else
{
    header("location:/pointage/");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>UPM | Pointage </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" media="screen" href="css/main.css"/>

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Pointage UPM </span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="#">Pointage UPM </a>
            <?php if(isset($nom))  { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><?php echo "Deconnexion"; ?> </a></li>
            </ul>
            <?php  } ?>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- Header -->
<a name="about"></a>
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="row">
                <div class="col-md-12">
                    <br/>
                    <ul class="list-inline intro-social-buttons">
                        <li>
                            <button class="btn btn-success btn-lg"><i class="fa fa-sign-in fa-fw"></i>Entrée</button>
                        </li>
                        <li>
                            <button class="btn btn-danger btn-lg"><i class="fa fa-sign-out fa-fw"></i>Sortie</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Aujourd'hui </div>
                    <div class="panel-body" style="color:#000000 !important;">
                        <?php
                        //echo date('l j  F Y');
                        setlocale (LC_TIME, 'fr_FR.utf8','fra');
                        echo (strftime("%A %d %B %Y"));
                        ?>
                        <p class="text-center bg-info">Hitorique du jour</p>
                <table class="table table-bordered">
                    <thead>
                    <th>Entrée</th>
                    <th>Sortie</th>
                    <th>Heure</th>
                    </thead>
                    <tbody>
                    <?php $sql="select date_format(date_entre,'%d/%m/%Y') as date_entre,date_sortie,TIME(date_entre) as 'timeentre',Time(date_sortie) as 'timesortie' from pointage where user =".$_SESSION['user']." and day(date_entre)=day(NOW())"; $resu = $bdd->query($sql);
                    //and((day(NOW()) in (select day(date_entre),day(NOW())) and (month(NOW()) in (select month(date_entre),month(NOW())) and (year(NOW()) in (select year(date_entre),year(NOW())))
                        foreach($resu->fetchAll() as $p )
                        {
                    ?>
                    <tr>
                        <td><?php echo $p['date_entre'];  ?></td>
                        <td><?php echo $p['date_sortie'];  ?></td>
                        <td><?php if(!is_null($p['timeentre'])) echo $p['timeentre'];else echo $p['timesortie'] ;  ?></td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="intro-message">
                    <h1><?php echo  $nom; ?></h1>
                    <hr class="intro-divider">
                    </div>

                </div>
            <div class="col-lg-12">
                <div id="myclock">
                </div>
            </div>
        </div>


    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->



<!-- /.banner -->

<!-- Footer -->


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script language="javascript" type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script language="javascript" type="text/javascript" src="http://www.jqueryscript.net/demo/Customizable-Analog-Alarm-Clock-with-jQuery-Canvas-thooClock/js/jquery.thooClock.js"></script>
<script language="javascript">
    var intVal, myclock;

    $(window).resize(function(){
        window.location.reload()
    });

    $(document).ready(function(){

        var audioElement = new Audio("");

        //clock plugin constructor
        $('#myclock').thooClock({
            size:$(document).height()/1.4,
            onAlarm:function(){
                //all that happens onAlarm
                $('#alarm1').show();
                alarmBackground(0);
                //audio element just for alarm sound
                document.body.appendChild(audioElement);
                var canPlayType = audioElement.canPlayType("audio/ogg");
                if(canPlayType.match(/maybe|probably/i)) {
                    audioElement.src = 'alarm.ogg';
                } else {
                    audioElement.src = 'alarm.mp3';
                }
                // erst abspielen wenn genug vom mp3 geladen wurde
                audioElement.addEventListener('canplay', function() {
                    audioElement.loop = true;
                    audioElement.play();
                }, false);
            },
            showNumerals:true,
            brandText:'THOOYORK',
            brandText2:'Germany',
            onEverySecond:function(){
                //callback that should be fired every second
            },
            //alarmTime:'15:10',
            offAlarm:function(){
                $('#alarm1').hide();
                audioElement.pause();
                clearTimeout(intVal);
                $('body').css('background-color','#FCFCFC');
            }
        });

    });



    $('#turnOffAlarm').click(function(){
        $.fn.thooClock.clearAlarm();
    });


    $('#set').click(function(){
        var inp = $('#altime').val();
        $.fn.thooClock.setAlarm(inp);
    });


    function alarmBackground(y){
        var color;
        if(y===1){
            color = '#CC0000';
            y=0;
        }
        else{
            color = '#FCFCFC';
            y+=1;
        }
        $('body').css('background-color',color);
        intVal = setTimeout(function(){alarmBackground(y);},100);
    }
</script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>

</body>

</html>
