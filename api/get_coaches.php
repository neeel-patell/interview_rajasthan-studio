<?php
    include_once "common_function.php";
        
    echo json_encode(array("coaches" => get_coaches())); // printing json response of coaches we are getting from common function.php -> get_coaches() function
?>