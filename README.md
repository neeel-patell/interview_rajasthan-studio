Just import database.sql in your local machine and do other stuff

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