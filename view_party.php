<!--
/**
 * CS 4342 Database Management
 * @author A Gandara (taken from Instruction Team Fall 2020 - Garnica)
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: 
 */
-->


<!doctype html>
<html lang="en">
<!-- we will use a style shee to control the look and feel - style sheets introduce formatting styles that can 
be added to your interface -->
<link rel="stylesheet" href="css/style.css">
<!-- Bootstrap CSS library https://getbootstrap.com/ - you can also layer stylesheets and reuse style sheets from other sources -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
	integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	crossorigin="anonymous">

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Krabby Patty Request Service Home</title>


</head>



<body>
	<div style="margin-top: 20px" class="container">

		<h1 class="center">Welcome to Krabby Patty Request Services</h1>
		<!-- setup a menubar -->
		<div class="topnav">
	<a href="user-menu.php">Home</a>
    <a href="view_requests.php">View Request</a>
    <a class="active" href="view_party.php">View Party</a>
    <a href="tech.php">The Real Heros</a>
    <a href="about.php">About</a>
    <a href="../index.php">Logout</a>
			</div>



<?php
/*
* Reference for tables: https://getbootstrap.com/docs/4.5/content/tables/
*/

session_start();
require_once('../config.php');
require_once('../validate_session.php');
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <?php $sql = "SELECT * FROM Party";
    if ($result = $conn->query($sql)) {
    ?>
        <table class="table" width=50%>
            <thead>
                <td> Email</td>
                <td> First Name</td>
                <td> Last Name</td>
                <td> Phone Number</td>
                
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                        <td><?php printf("%s", $row[1]); ?></td>
                        <td><?php printf("%s", $row[2]); ?></td>
                        <td><?php printf("%s", $row[3]); ?></td>
                        <td><a href="update_request_interface.php?Sid=<?php echo $row[0] ?>">Update</a></td>
                        <td><a href="delete_request.php?Sid=<?php echo $row[0] ?>">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    <?php
    }
    ?>
    
    <a href="create_party.php" class="linkButton">Create Party</a>
    
    <!-- Link to return to student_menu-->
    <a href="user-menu.php">Back to User Menu</a><br>

			<!-- jQuery and JS bundle w/ Popper.js -->
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
				integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
				crossorigin="anonymous"></script>
			<script
				src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
				integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
				crossorigin="anonymous"></script>

</body>

</html>

