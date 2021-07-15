Just import database.sql in your local machine and do other stuff

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


Database file should be in config folder named conn.php and should contain following code and database configuration as 
    function get_conn(){
        return new mysqli("host", "username", "password", "interview-rajasthan-studio");
    }