<?php

    header('HTTP/1.0 404 Not Found');

?>
<!DOCTYPE html>
<html>
  <head>
     <meta charset="utf-8" /> 
    <title>CRM UPM - 404 page introuvable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/upm.css" media="screen">

<style>
  body,html{

    background-color: #005494 !important;
    color: #fff;
}
</style>

  </head>
  <body>

   
 




<div class="error-container">
    <div class="error-code" style="color:#ffffff;">404</div>
    <div class="error-text" style="color:#ffffff;">Page introuvable !</div>
    <div class="error-subtext" >Vérifiez soigneusement l’adresse que vous avez tapée, notamment la casse (majuscules ou minuscules) et les signes de ponctuation (points, barres obliques, tirets, caractères de soulignement). </div>
    <div class="error-actions">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-info btn-block btn-lg" onClick="history.back();">Page précédente</button>
            </div>
        </div>
    </div>

</div>


  </body>
</html>