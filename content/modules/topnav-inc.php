<?php
if(isset($_SESSION['user'])){
    include('content/config.php');
?>
<ul class="x-navigation x-navigation-horizontal x-navigation-panel">

        <li class="xn-icon-button">
            <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a><!-- toggle sidebar button -->
        </li>

        <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-disconnect"><span class="fa fa-power-off"></span></a>
                    </li>

    </ul>



<?php
}
?>