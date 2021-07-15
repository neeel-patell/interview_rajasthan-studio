<?php
    include_once "common_function.php";
    include_once "../config/conn.php";

    $response = array();
    // to provide response for apis 
    $conn = get_conn();
    // getting connection object for database 
    $insert_flag = 0;
    // flag to check for slot available or not

    if(isset($_POST['coach']) && isset($_POST['day']) && isset($_POST['time'])){
        $coach = $_POST['coach'];
        $day = get_day_digit($_POST['day']);
        $time = new DateTime($_POST['time']);
        // converting time to datetime object for more convenience
        $mins = $time->format("i");
        // getting mins from time

        if($mins % 30 == 0){
            // checking time must be in hh:30 or hh:00 format as per we provide slots in each 30 mins
            $time = $time->format("H:i:s");
            // taking time in HH:MM:SS format

            $booked_slots = $conn->query("SELECT * from appointment where coach_name='$coach' AND week_day=$day AND booking_time='$time'");
            // checking that particular slot for choosen time, coach and day is selected or not, if not than insert immidiately
            if(mysqli_num_rows($booked_slots) == 0){
                // taking all available time foe a day for a particular coach
                $total_day_availability = array();
                $availability = $conn->query("SELECT available_at, available_until FROM coach where `name`='$coach' AND week_day=$day");
                while($row = $availability->fetch_array()){
                    array_push($total_day_availability, array("start" => $row['available_at'], "end" => $row['available_until']));
                }

                // checking that time provided is must in available coach time or not
                foreach($total_day_availability as $value){
                    $s_time = new DateTime($value['start']);
                    $e_time = new DateTime($value['end']);
                    $temp = new DateTime($time);
                    if($temp >= $s_time && $temp < $e_time){
                        // if coach available then status enabled to insert
                        $insert_flag = 1;
                        break;
                    }
                }

                if($insert_flag == 1){
                    $query = "INSERT INTO appointment(coach_name, week_day, booking_time) VALUES('$coach', $day, '$time')";
                        if($conn->query($query)){
                            $response = array("success" => "Slot booked");
                        }
                        else{
                            $response = array("error" => $conn->error);
                        }
                }
                else{
                    $response = array("error" => "Choose Other time");
                }
                
            }
            else{
                // if particular slot for coach, day and time already booked then providing available slot for a day for a coach
                $result = $conn->query("SELECT available_at, available_until FROM coach where `name`='$coach' AND week_day=$day");
                if(mysqli_num_rows($result) > 0){
                    $timing = array();
                    $taken = array();
                    while($row = $result->fetch_array()){
                        foreach(get_split_time($row['available_at'], $row['available_until'], 30) as $value){
                            array_push($timing, $value);
                        }
                    }
                    $booked = $conn->query("SELECT booking_time from appointment WHERE coach_name='$coach' AND week_day=$day");
                    while($row = $booked->fetch_array()){
                        array_push($taken, $row['booking_time']);
                    }
                    $available = array_diff($timing, $taken);
                    // providinf all slots apart from booked for a day and the coach
                    if(sizeof($available) == 0){
                        $response = array("error" => "All Slots are alredy booked for a specif coach and/or for particular day");
                    }
                    else{
                        $response = array("error" => "No specific Slot available", "Available slots" => $available);
                    }
                }
                else{
                    $response = array("error" => "Wrong coach name or select other day or select other coach, from these three any error is there");
                }
            }
        }
        else{

            $response = array("error" => "Please choose time in gape of 30 mins like hh:30 or hh:00");
        }
    }
    else{
        // value error while given wrong coach name or time or date or anything not passed
        $response = array("error" => "You need to send coach(coach name), day, time all three in post parameters, you have to send all three parameter");
    }
    echo json_encode($response);
?>