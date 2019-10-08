<?php
include('biblio/dompdf/autoload.inc.php');
use Dompdf\Dompdf;

if(isset($_SESSION['user'])) {
    include('content/config.php');
    if($_SESSION['user']['profile']==sha1(md5('commercial'.$salt)) ){

        include "content/controller/class.remlpiration.php";
        $rempliration= new rempliration();
        $rempliration=$rempliration->all_test();
        include "content/modules/header-inc.php";
        if(isset($_POST["test"]) and !empty($_POST["test"]))
        {
            if ( get_magic_quotes_gpc() )
                $old_limit = ini_set("memory_limit", "128M");
            require('content/controller/class.contact-direct.php');
            $contact = new ContactDirect();
            $val=$contact->getbynotetest($_POST["test"]);
            $links = array();
            foreach($val as $personne)
            {
                $Nom=$personne["Nom"];
                $Prenom=$personne["Prenom"];
                $test=$personne["test"];
                $observation=$personne["observation"];
                $Formation_Demmandee=$personne["Formation_Demmandee"];
                $niveau_demande=$personne["niveau_demande"];
                if($personne["diplomes_obtenus"]=="")
                {
                    $diplomes_obtenus=$personne["diplomes_obtenus"];
                    $Etablissement="";
                }
                else
                {
                    $diplomes_obtenus=$personne["diplomes_obtenus"];
                    $Etablissement=$personne["Etablissement"];
                }
                if($personne["s1tc"]=="0.00")
                {
                    $personne["s1tc"]="";
                }
                if($personne["s2tc"]=="0.00")
                {
                    $personne["s2tc"]="";
                }
                if($personne["s1tc"]=="0.00")
                {
                    $personne["s1tc"]="";
                }
                if($personne["annuelletc"]=="0.00")
                {
                    $personne["annuelletc"]="";
                }
                if($personne["s1bac1"]=="0.00")
                {
                    $personne["s1bac1"]="";
                }
                if($personne["s2bac1"]=="0.00")
                {
                    $personne["s2bac1"]="";
                }
                if($personne["annuellebac1"]=="0.00")
                {
                    $personne["annuellebac1"]="";
                }
                if($personne["noteregional"]=="0.00")
                {
                    $personne["noteregional"]="";
                }
                if($personne["s1bac2"]=="0.00")
                {
                    $personne["s1bac2"]="";
                }
                if($personne["s2bac2"]=="0.00")
                {
                    $personne["s2bac2"]="";
                }
                if($personne["annuellebac2"]=="0.00")
                {
                    $personne["annuellebac2"]="";
                }
                if($personne["notenational"]=="0.00")
                {
                    $personne["notenational"]="";
                }
                if($personne["notegenerale"]=="0.00")
                {
                    $personne["notegenerale"]="";
                }
                if($personne["serie_bac"]=="0.00")
                {
                    $personne["serie_bac"]="";
                }
                $Niveau_des_etudes=$personne["Niveau_des_etudes"];
                $Etablissement1=$personne["Etablissement"];
                $s1tc=$personne["s1tc"];
                $s2tc=$personne["s2tc"];
                $annuelletc=$personne["annuelletc"];
                $s1bac1=$personne["s1bac1"];
                $s2bac1=$personne["s2bac1"];
                $annuellebac1=$personne["annuellebac1"];
                $noteregional=$personne["noteregional"];
                $s1bac2=$personne["s1bac2"];
                $s2bac2=$personne["s2bac2"];
                $annuellebac2=$personne["annuellebac2"];
                $notenational=$personne["notenational"];
                $notegenerale=$personne["notegenerale"];
                $serie_bac=$personne["serie_bac"];
                $bac1option=$personne["bac1option"];
                $bac1moys1=$personne["bac1moys1"];
                $bac1moys2=$personne["bac1moys2"];
                $bac1reg=$personne["bac1reg"];
                $bac1nbretd=$personne["bac1nbretd"];
                $bac2option=$personne["bac2option"];
                $bac2moys1=$personne["bac2moys1"];
                $bac2moys2=$personne["bac2moys2"];
                $bac2reg=$personne["bac2reg"];
                $bac2nbretd=$personne["bac2nbretd"];
                $bac3option=$personne["bac3option"];
                $bac3moys1=$personne["bac3moys1"];
                $bac3moys2=$personne["bac3moys2"];
                $bac3reg=$personne["bac3reg"];
                $bac3nbretd=$personne["bac3nbretd"];
                $bac4option=$personne["bac4option"];
                $bac4moys1=$personne["bac4moys1"];
                $bac4moys2=$personne["bac4moys2"];
                $bac4reg=$personne["bac4reg"];
                $bac4nbretd=$personne["bac4nbretd"];
                $template = <<<EOT
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <style>
        .bigtext
        {
            border: 2px solid #000000;
            padding: 2px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            text-decoration: underline;
        }
        .part1
        {
            margin-top: 10px;
            border: 1px solid #000000;
            padding: 2px;
            font-size: 12px;
            font-weight: bold;
            width: 100% !important;
        }
        .part3 td,.part3 th
        {
            font-weight: bold;
            font-size: 10px;
            border: 1px solid;
            text-align: center;
            padding: 5px;
            width: 100px;
        }
        .part3 table
        {
            margin-bottom: 10px;
        }
        .part3,table
        {
            width: 100%;
            border: 1px;
        }
        .part1,table
        {
            width: 100%;
        }
        .part1 td
        {
            width: 25%;
        }
        .part2{
            font-weight: bold;
            margin-top: 10px;
            font-size: 12px;
        }
        .part3
        {
            margin-top: 20px;
        }
        .part3 h5
        {
            font-weight: bold;
            font-family: arial, sans-serif;
        }
        th
        {
            text-decoration: underline;
        }
        .observation span
        {
            font-size: 12px;
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
    <div class="container-fluid">

            <div class="text-center">
               <div class="bigtext">
                   FICHE DE SYNTHESE INDIVIDUELLE
               </div>
            </div>
        <div class="part1">
            <table>
                <tr>
                    <td>
                        Nom : $Nom
                    </td>
                    <td>
                        Session concours : $test
                    </td>
                </tr>
                <tr>
                    <td>
                        Prénom : $Prenom
                    </td>
                    <td>
                    </td>
                </tr>
            </table>
        </div>
        <div class="part2">
            <div>Filiére demandée : $Formation_Demmandee </div>
            <div>Niveau demandée : $niveau_demande</div>
            <div>Dernier diplôme obtenu : $diplomes_obtenus</div>
            <div>Etablissement : $Etablissement</div>
            <div>Diplôme en cours : $Niveau_des_etudes</div>
            <div>Etablisement : $Etablissement1</div>
        </div>
        <div class="part3">
            <h5> RESULTATS : </h5>

            <div>
                <table>
                    <tr>
                        <td rowspan="2">Tronc Commun</td>
                        <th> Série </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne générale </th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>$s1tc</td>
                        <td>$s2tc</td>
                        <td>$annuelletc</td>
                    </tr>
                </table>
            </div>

            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Premiére bac</td>
                        <th> Série </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne régional </th>
                        <th class="moygen"> Moyenne générale </th>
                    </tr>
                    <tr>
                        <td>-</td>
                        <td>$s1bac1</td>
                        <td>$s2bac1</td>
                        <td>$noteregional</td>
                        <td>$annuellebac1</td>
                    </tr>
                </table>
            </div>

            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Deuxiéme bac</td>
                        <th> Série </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne national </th>
                        <th class="moygen"> Moyenne générale </th>
                    </tr>
                    <tr>
                        <td>$serie_bac</td>
                        <td>$s1bac2</td>
                        <td>$s2bac2</td>
                        <td>$notenational</td>
                        <td>$notegenerale</td>
                    </tr>
                </table>
            </div>

            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Bac+1</td>
                        <th> Option </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne générale </th>
                        <th class="moygen"> nb années d'études </th>
                    </tr>
                    <tr>
                        <td>$bac1option</td>
                        <td>$bac1moys1</td>
                        <td>$bac1moys2</td>
                        <td>$bac1reg</td>
                        <td>$bac1nbretd</td>
                    </tr>
                </table>
            </div>

            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Bac+2</td>
                        <th> Option </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne générale </th>
                        <th class="moygen"> nb années d'études </th>
                    </tr>
                    <tr>
                        <td>$bac2option</td>
                        <td>$bac2moys1</td>
                        <td>$bac2moys2</td>
                        <td>$bac2reg</td>
                        <td>$bac2nbretd</td>
                    </tr>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Bac+3</td>
                        <th> Option </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne générale </th>
                        <th class="moygen"> nb années d'études </th>
                    </tr>
                    <tr>
                        <td>$bac3option</td>
                        <td>$bac3moys1</td>
                        <td>$bac3moys2</td>
                        <td>$bac3reg</td>
                        <td>$bac3nbretd</td>
                    </tr>
                </table>
            </div>
            <div>
                <table>
                    <tr>
                        <td class="taillefix" rowspan="2">Bac+4</td>
                        <th> Option </th>
                        <th> Moyenne S1 </th>
                        <th> Moyenne S2 </th>
                        <th class="moygen"> Moyenne générale </th>
                        <th class="moygen"> nb années d'études </th>
                    </tr>
                    <tr>
                       <td>$bac4option</td>
                        <td>$bac4moys1</td>
                        <td>$bac4moys2</td>
                        <td>$bac4reg</td>
                        <td>$bac4nbretd</td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div class="observation">
                <span>Autres commentaires sur la formation et les résultats</span>
                <br>
                <div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
EOT;
                $dompdf = new Dompdf();
                $dompdf->loadHtml($template);

                $dompdf->setPaper('A4');

                $dompdf->render();
                $file_to_save="pdfs/";
                file_put_contents($file_to_save.$Nom."_".$Prenom.".pdf", $dompdf->output());

                array_push($links,$file_to_save.$Nom."_".$Prenom.".pdf");

            }

        }
        ?>
        <style>
            #campagne
            {
                display: none;
            }
        </style>
        <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include "content/modules/sidebar-inc.php"; ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Action : </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">

                            <div class="col-md-6">
                                <form method="post">
                                    <div class="form-group">
                                        <label for="action">Test : </label>
                                        <select onchange="testercmp();" id="test" name="test" class="form-control">
                                            <option></option>
                                            <?php echo $rempliration; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input value="Valider l'Action" type="submit" class="btn btn-success" id="btn-save" >
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        </div>
                </div>
            </section>

        </div>
    </div>

    <?php include "content/modules/footer-inc.php";
        if(isset($links))
        {
            foreach($links as $link)
            {
                echo "<script>
                    var link = document.createElement('a');
                    link.href = '$link';
                    link.download = '$link';
                    link.dispatchEvent(new MouseEvent('click'));
                    </script>";
            }
        }
    ?>
    <script type="text/javascript">
        function genPDF() {

            var doc = new jsPDF();

// We'll make our own renderer to skip this editor
            var specialElementHandlers = {
                '#editor': function(element, renderer){
                    return true;
                }
            };

// All units are in the set measurement for the document
// This can be changed to "pt" (points), "mm" (Default), "cm", "in"
            doc.fromHTML($('body').get(0), , , {
                'width': 170,
                'elementHandlers': specialElementHandlers
            });

            doc.save('Test1.pdf');

        }
    </script>
    <script>
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