
<?php

    require_once $_SERVER['DOCUMENT_ROOT'].'/core/core.php';
    include '../helpers/helpers.php';
    if(!is_logged_in()){
        login_error_check();
    }
    include 'includes/header.php';
    include 'includes/navigation.php';
    #header("Location: events.php");

    header("Location: rooms.php");
?>
<!--
<div class="w3-container w3-main" style="margin-left:200px">
    <header class="w3-container w3-purple">
     <span class="w3-opennav w3-xlarge w3-hide-large" onclick="w3_open()">☰</span>
     <h2 class="text-center">Home</h2>
   </header>



</div>

  
</body>
</html>
