<?php
setcookie("pointage",array('date_premier_pointage'=>date('Y-m-d H:i:s'),'user'=>$res[0][0],'navigateur'=>$ua['name']), time()+31556926);
echo "<script>window.location='/pointage';</script>";
?>