<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_GET['RequestID'])) {
    $RequestID = $_GET['RequestID'];
    $sql = "SELECT * FROM Student where RequestID = $RequestID";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No request id received on request at update_request_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Request Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Request</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_request.php" method="post">
            <input type="hidden" name="RequestID" id="RequestID" value="<?php echo $row['RequestID'] ?>">
            <div class="form-group">
                <label for="PEmail">Party Email</label>
                <input class="form-control" type="text" id="PEmail" name="PEmail" value="<?php echo $row['PEmail'] ?>">
            </div>
            <div class="form-group">
                <label for="Date_Created">Date Created</label>
                <input class="form-control" type="date" id="Date_Created" name="Date_Created" value="<?php echo $row['Date_Created'] ?>">
            </div>
            <div class="form-group">
                <label for="Time_Created">Time Created</label>
                <input class="form-control" type="time" id="Time_Created" name="Time_Created" value="<?php echo $row['Time_Created'] ?>">
            </div>
            <div class="form-group">
                <label for="Date_Resolved">Date Resolved</label>
                <input class="form-control" type="date" id="Date_Resolved" name="Date_Resolved" value="<?php echo $row['Date_Resolved'] ?>">
            </div>
            <div class="form-group">
                <label for="Time_Resovled">Time Resolved</label>
                <input class="form-control" type="time" id="Time_Resolved" name="Time_Resolved" value="<?php echo $row['Time_Resolved'] ?>">
            </div>
            <div class="form-group">
                <label for="Resolution">Resolution</label>
                <input class="form-control" type="text" id="Resolution" name="Resolution" value="<?php echo $row['Resolution'] ?>">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <input class="form-control" type="text" id="Description" name="Description" value="<?php echo $row['Description'] ?>">
            </div>
           
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="user-menu.php">Back to User Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>