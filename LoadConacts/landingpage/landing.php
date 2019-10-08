<?php

if(isset($_GET['username']) && isset($_GET['pass']) && $_GET['username']=="adminupm" && $_GET['pass']==md5("###upm2017"))
{
ini_set('memory_limit', '-1');
	require "config.php";
	require "PDOStatistique.php";
	$statistique = new PDOStatistique();
	$statistique->getList();
	?>
	<script type="text/javascript">
            window.location = "https://crm.myupm.net/?page=landing&import=287aefcf7af1a0d89bc7c914a00804b1";
        </script>
	<?php
}
else
	echo 'Vous N\'avez pas le droit d\'acceder a cette application';
	
	
	 