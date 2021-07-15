Just import database_schema.sql in your local machine and do other stuff

you will may see difference in day_of_week field which is changed with week_day and have values 1 -7 apart from Monday, ... , Sunday which respectively added 1, ... , 7 for each day where 1: monday and 7: sunday and for other days respectively while it just uses less memory and for more complex data we can get faster output whereas size is reduced(DDBMS concept)

Database file should be in config folder named conn.php and should contain following code and database configuration as 
    function get_conn(){
        return new mysqli("host", "username", "password", "interview-rajasthan-studio");
    }

Created Seperate function called get_coaches() in common_function.php to get coaches from database from coach table I created, and it is also helpful to other files as well.

firstly derived database from excel file shared to me which had information about coach and available timing 

I just created funcion to get all coaches and used it to create api about first question. 
You will get json response such as 

    {
        "coaches": [
            "John Doe",
            "Jane Doe",
            "Rachel Green",
            "Margaret Houlihan",
            "Hawkeye Pierce"
        ]
    }


for second question, just created two more function which is obvious reused in many other php files and get_day is function while which can convert digit to respective day name where in database we have stored day as 1 - 7; where 1: monday, 2: tuesday, ... , 7:sunday

get_time_for_coach.php is answer of second question which also uses time split function which provides us N number of slots for given time period for interval you specify




For que 3, I'm checking multiple conditions while very first is for values : are values in a format or missing while three post parameters are require for that named : 1) coach : coach name should be specified, 2) time : in multiple of 30 minutes, 3) day : full day name, if anything misses then it gives error immidiately and there are many errors are there where comments are specified in the code

Sample json input (input must be sent as post method and as form-data only) :
            coach:Hawkeye Pierce // shuold be as same as saved in datasheet
            day:thursday // capitialization doesn't matter
            time:14:30 // should be in hh:mm format and mm should be 00 or 30 only

sample outputs you get:

1)  
    {
        "error": "Choose Other time"
    }

2) 
    {
        "success": "Slot booked"
    }
3)
    {
        "error": "No specific Slot available",
        "Available slots": {
            "0": "07:00:00",
            "1": "07:30:00",
            "2": "08:00:00",
            "3": "08:30:00",
            "4": "09:00:00",
            "5": "09:30:00",
            "6": "10:00:00",
            "7": "10:30:00",
            "8": "11:00:00",
            "9": "11:30:00",
            "10": "12:00:00",
            "11": "12:30:00",
            "13": "13:30:00",
            "15": "15:30:00",
            "16": "16:00:00",
            "17": "16:30:00"
        }
    }


Output will be in different conditions and could be different manner as well as per each condition