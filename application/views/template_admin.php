<?php
if(isset($header))
    include("headers/$header.php");
else include("headers/header_admin.php");
include("$view.php");
include("footers/footer_admin.php");
?>