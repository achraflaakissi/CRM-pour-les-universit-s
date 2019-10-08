<?php

ini_set('memory_limit', '-1');
	require "config.php";
	require "PDOStatistique.php";
	
		$statistique = new PDOStatistique();
		
	$statistique->update();
	?>
	
		<script type="text/javascript">
            window.location = "https://crm.myupm.net/?page=landing&import=287aefcf7af1a0d89bc7c914a00804b1&update=true";
        </script>
