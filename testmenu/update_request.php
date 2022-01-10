
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

    $RequestID = isset($_POST['RequestID']) ? $_POST['RequestID'] : " ";
    $PEmail = isset($_POST['PEmail']) ? $_POST['PEmail'] : " ";
    $Date_Created = isset($_POST['Date_Created']) ? $_POST['Date_Created'] : " ";
    $Time_Created = isset($_POST['Time_Created']) ? $_POST['Time_Created'] : " ";
    $Date_Resolved = isset($_POST['Date_Resolved']) ? $_POST['Date_Resolved'] : " ";
    $Time_Resolved = isset($_POST['Time_Resolved']) ? $_POST['Time_Resolved'] : " ";
    $Resolution = isset($_POST['Resolution']) ? $_POST['Resolution'] : " ";
    $Description = isset($_POST['Description']) ? $_POST['Description'] : " ";

    $query = "UPDATE Request SET RequestID='$RequestID', PEmail='$PEmail', Date_Created='$Date_Created', Date_Resolved='$Date_Resolved', Time_Created='$Time_Created', Time_Resolved='$Time_Resolved', Resolution='$Resolution', Description='$Description' WHERE RequestID = $RequestID";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Request updated successfully";
        header("Location: user-menu.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No request id received on request at update request";
  die();
}

?>
