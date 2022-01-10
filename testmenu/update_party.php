
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



if (isset($_POST['Email'])){

    $Email = isset($_POST['Email']) ? $_POST['Email'] : " ";
    $Fname = isset($_POST['Fname']) ? $_POST['Fname'] : " ";
    $Lname = isset($_POST['Lname']) ? $_POST['Lname'] : " ";
    $Phone_number = isset($_POST['Phone_number']) ? $_POST['Phone_number'] : " ";;

    $query = "UPDATE Party SET Email='$Email', Fname='$Fname', Lname='$Lname', Phone_number='$Phone_number' WHERE Email = $Email";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Party updated successfully";
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
