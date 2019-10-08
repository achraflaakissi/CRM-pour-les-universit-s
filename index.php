<?php
error_reporting (E_ALL ^ E_NOTICE);
session_start();
include('content/core.php');
if(isset($_GET['page'])){
	$page->Page= $_GET['page'];
}else {
	$page->Page="home";
}

if(isset($_SESSION['user']['id']) && !empty($_SESSION['user']['id'])){
	$page->Authentification=true;
}

$page->generer();
include($page->File);

session_write_close();

?>