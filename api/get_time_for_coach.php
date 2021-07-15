<?php

    include_once "common_function.php";
    include_once "../config/conn.php";

    $available_slots = array();
    $slot_value = 30; // for how much interval we have to assign to get slots
    $conn = get_conn();
    // getting connection object for database 

    $coaches = get_coaches();

    foreach($coaches as $coach){
        $timing = array();
        // appdended with 2D array while keys will be week_day, available_at, available_until
        $result = $GLOBALS['conn']->query("SELECT week_day, available_at, available_until FROM coach where `name`='$coach'");
        // getting week_day and as per that start and end time of particular coach

        $coach_timings = array();
        while($row = $result->fetch_array()){
            /*
            will iterate till all week days record for a aparticular coach and will append record as
            week day => [
                start : available_at
                end : available_until
            ]

            week day will be key to gain record for start and end time of a particular coach for a specific day as well
            */
            if(! (array_key_exists(get_day($row['week_day']), $coach_timings))){
                $coach_timings[get_day($row['week_day'])] = get_split_time($row['available_at'], $row['available_until'], $slot_value);
                //assigning slots to week day for temporary purpose atlast it'll be assigned to available slots as per coach id
            }
            else{
                $coach_timings[get_day($row['week_day'])] = array_merge($coach_timings[get_day($row['week_day'])], get_split_time($row['available_at'], $row['available_until'], $slot_value));
                //in some coaches there are seperate timings given in dataset for single day and in future to solve this error if block exists
            }
            $available_slots[$coach] = $coach_timings;
            // assigning all available slots found for a coach as key and all timing as per days in 30 minute interval
        }
    }

    echo json_encode($available_slots);
    
?>