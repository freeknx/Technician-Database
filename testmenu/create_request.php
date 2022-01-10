<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table Student of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create Request</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Request</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_request.php" method="post">
        <div class="form-group">
                <label for="RequestID">Request ID</label>
                <input class="form-control" type="text" id="RequestID" name="RequestID">
            </div>
            <div class="form-group">
                <label for="PEmail">Party Email</label>
                <input class="form-control" type="text" id="PEmail" name="PEmail">
            </div>
            <div class="form-group">
                <label for="Date_Created">Date Created</label>
                <input class="form-control" type="date" id="Date_Created" name="Date_Created">
            </div>
            <div class="form-group">
                <label for="Time_Created">Time Created</label>
                <input class="form-control" type="time" id="Time_Created" name="Time_Created">
            </div>
            <div class="form-group">
                <label for="Date_Resolved">Date Resolved (If Applicable)</label>
                <input class="form-control" type="date" id="Date_Resolved" name="Date_Resolved">
            </div>
            <div class="form-group">
                <label for="Time_Resolved">Time Resolved (If Applicable)</label>
                <input class="form-control" type="time" id="Time_Resolved" name="Time_Resolved">
            </div>
            <div class="form-group">
                <label for="Resolution">Resolution</label>
                <input class="form-control" type="text" id="Resolution" name="Resolution">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input class="form-control" type="text" id="Description" name="Description">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="user-menu.php">Back to User Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
    session_start();
    require_once('../config.php');
    require_once('../validate_session.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $RequestID = isset($_POST['RequestID']) ? $_POST['RequestID'] : " ";  
            $PEmail = isset($_POST['PEmail']) ? $_POST['PEmail'] : " ";
            $Date_Created = isset($_POST['Date_Created']) ? $_POST['Date_Created'] : " ";
            $Time_Created = isset($_POST['Time_Created']) ? $_POST['Time_Created'] : " ";
            $Date_Resolved = isset($_POST['Date_Resolved']) ? $_POST['Date_Resolved'] : " ";
            $Time_Resolved = isset($_POST['Time_Resolved']) ? $_POST['Time_Resolved'] : " ";
            $Resolution = isset($_POST['Resolution']) ? $_POST['Resolution'] : " ";
            $Description = isset($_POST['Description']) ? $_POST['Description'] : " ";
           
            
            //Insert into Student table;
            
            $queryRequest  = "INSERT INTO Request (RequestID, Pemail, Date_Created, Date_Resolved, Time_Created, Time_Resolved, Resolution, Description)
                        VALUES ('".$RequestID."', '".$PEmail."', '".$Date_Created."', '".$Date_Resolved."','".$Time_Created."','".$Time_Resolved."','".$Resolution."','".$Description."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryRequest) === TRUE) {
            echo "<br> New record created successfully for Request ".$RequestID;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryRequest . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            header("Location: user-menu.php");
}
?>


</body>

</html>