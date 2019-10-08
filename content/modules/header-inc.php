<?php
if(isset($_SESSION['user'])) {
include('content/config.php');

    ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Université Privée de Marrakech</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    

    <style>
        .erreur,#message-div
        {
            display: none;
        }
        .select2-container .select2-selection--single
        {
            height: 30px !important;
        }
        .select2-container .select2-selection--single .select2-selection__rendered
        {
            padding-left: 0px !important;
        }
        html,head,body
        {
        -webkit-user-select: none !important; /*(Chrome/Safari/Opera)*/
	-moz-user-select: none !important;/*(Firefox)*/
	-ms-user-select: none !important;/*(IE/Edge)*/
        }
            </style>
    <?php include('ressources-inc.php'); ?>
</head>
    <body class="skin-blue sidebar-mini sidebar-collapse">
        <?php
         }
         ?>