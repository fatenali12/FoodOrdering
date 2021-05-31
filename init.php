<?php


    include 'admin/connect.php';


    //Routes

    $tpl = "includes/templates/";      // Templates Directory
    $fun = "includes/functions/";     // Functions Directory 
    $css = "layout/css/";            // Css Directory
    $js  = "layout/js/";            // Js Directory 


    // include The Important Files

    include $fun."functions.php";

    include $tpl ."header.php";
    include $tpl . "navbar.php";


?>