
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../config.php');
require_once('../validate_session.php');

if (isset($_POST['RequestID'])){

    $rRequestID = isset($_POST['RequestID']) ? $_POST['RequestID'] : " ";
    $rPEmail = isset($_POST['PEmail']) ? $_POST['PEmail'] : " ";
    $rDate_Created = isset($_POST['Date_Created']) ? $_POST['Date_Created'] : " ";
    $rTime_Created = isset($_POST['Time_Created']) ? $_POST['Time_Created'] : " ";
    $rDate_Resolved = isset($_POST['Date_Resolved']) ? $_POST['Date_Resolved'] : " ";
    $rTime_Resolved = isset($_POST['Time_Resolved']) ? $_POST['Time_Resolved'] : " ";
    $rResolution = isset($_POST['Resolution']) ? $_POST['Resolution'] : " ";
    $rDescription = isset($_POST['Description']) ? $_POST['Description'] : " ";

    $query = "UPDATE Request SET RequestID='$rRequestID', PEmail='$rPEmail', Date_Created='$rDate_Created', Date_Resolved='$rDate_Resolved', Time_Created='$rTime_Created', Time_Resolved='$rTime_Resolved', Resolution='$rResolution', Description='$rDescription' WHERE RequestID = $rRequestID";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Request updated successfully";
        header("Location: user-menu.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No request id received on request at update student";
  die();
}

?>
