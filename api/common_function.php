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

    function get_day($day){
        switch($day){
            case 1: 
                return "Monday";
            case 2: 
                return "Tuesday";
            case 3: 
                return "Wednesday";
            case 4: 
                return "Thursday";
            case 5: 
                return "Friday";
            case 6: 
                return "Saturday";
            case 7: 
                return "Sunday";
        }
    }

    function get_day_digit($day){
        switch(strtolower($day)){
            case "monday": 
                return 1;
            case "tuesday": 
                return 2;
            case "wednesday": 
                return 3;
            case "thursday": 
                return 4;
            case "friday": 
                return 5;
            case "saturday": 
                return 6;
            case "sunday": 
                return 7;
        }
    }

    function get_split_time($start, $end, $interval){
        $start = new DateTime($start);
        $end = new DateTime($end);
        // getting objects to compare time
        $slot_array = array();
        // empty array to append slots
        while($start < $end){
            array_push($slot_array, $start->format("H:i:s"));
            // appending time slot we got as per given interval 
            $start->modify("+$interval minutes");
            // incrementing time for next provided minutes
        }
        return $slot_array; // returning intervals found for given period s
    }
?>