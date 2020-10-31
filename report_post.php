<?php
    if(isset($_POST['report'])){
        $msg = $_POST['message'];
        $link = "https://api.whatsapp.com/send?phone=919504789166&text=$msg!";
        echo "<script> window.location = '$link';</script>";
        
    }else{
        echo "<script> window.location = 'index.php';</script>";
    }
?>