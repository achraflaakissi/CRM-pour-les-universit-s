<?php
if(isset($_GET['username']) && isset($_GET['pass']) && $_GET['username']=="adminupm" &&  $_GET['pass']==md5("###upm2017"))
{
		ini_set('memory_limit', '-1');
	include("config.php");
	require "PDOStatistique.php";
	$statistique = new PDOStatistique();
	$statistique->getListIndirect();
}
else
{
		echo 'Vous N\'avez pas le droit d\'acceder a cette application';
}


