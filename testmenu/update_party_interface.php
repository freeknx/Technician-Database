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


if (isset($_GET['Email'])) {
    $Email = $_GET['Email'];
    $sql = "SELECT * FROM Party where Email = $Email";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No email received on request at update_party_interface";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Party Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Party</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_party.php" method="post">
            <input type="hidden" name="Email" id="Email" value="<?php echo $row['Email'] ?>">
            <div class="form-group">
                <label for="Fname">First Name</label>
                <input class="form-control" type="text" id="Fname" name="Fname" value="<?php echo $row['Fname'] ?>">
            </div>
            <div class="form-group">
                <label for="Lname">Last Name</label>
                <input class="form-control" type="text" id="Lname" name="Lname" value="<?php echo $row['Lname'] ?>">
            </div>
            <div class="form-group">
                <label for="Phone_number">Phone Number</label>
                <input class="form-control" type="text" id="Phone_number" name="Phone_number" value="<?php echo $row['Phone_number'] ?>">
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