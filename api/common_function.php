<?php 
    include_once("../config/conn.php");
    // including function to create connection with database
    $conn = get_conn();
    // getting object of mysqli which allows to connect to database

    function get_coaches(){
        $name = array();
        // defining name variable as empty array, while in php, we should define any variable as empty array to use runtime appending in array
        $result = $GLOBALS['conn']->query("SELECT name FROM coach");
        // getting name of coaches from table
        while($row = $result->fetch_array()){ // will iterate until it gets rows
            if(!(in_array($row['name'], $name))){ // checking whether coach name already exists in name array or not
                array_push($name, $row['name']); // adding name of coach if does not exist in array
            }
        }
        return $name; // returing array of names
    }
?>