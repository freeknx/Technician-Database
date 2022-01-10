<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 * Include your name here - ex. Modified by Villanueva for Assignment 3
 */
-->

<!doctype html>
<html lang="en">
<style>
</style>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Krabby Patties Add Student</title>

<!-- Bootstrap CSS library https://getbootstrap.com/ -->
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
	integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
	crossorigin="anonymous">
<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<div style="margin-top: 20px" class="container">
  <?php
session_start();
require_once ('../validate_session.php');

?>
    
    <h1 class="center">Student Creation</h1>
		<!--- this code connects displays the menu and menu link (uses css to style and control ) -->
		<div class="topnav">
			<a href="user-menu.php">Home</a> 
			<a href="about.php">Help</a>
		</div>

		<!--- this code connects to the database and display relations-->
		<form action="addstudent.php" method="post">
			<div class="form-group">
				<label for="email">Email</label> <input class="form-control" type="text" id="email" name="email">
			</div>
			<div class="form-group">
				<label for="fname">First Name</label> <input class="form-control" type="text" id="fname" name="fname">
			</div>
			<div class="form-group">
				<label for="lname">Last Name</label> <input class="form-control" type="text" id="lname" name="lname">
			</div>
			<div class="form-group">
				<label for="phone">Phone Number</label> <input class="form-control" type="text" id="phone" name="phone">
			</div>
			<div class="form-group">
				<label for="studentid">Student ID</label> <input class="form-control" type="text" id="studentid" name="studentid">
			</div>
			<div class='form-group'>
			<label for="class">Classification</label>
			<select class='form-control' name='class' id='class'><option value=''></option><option value=1>Freshman</option><option value=2>Sophomore</option><option value=1>Junior</option><option value=1>Senior</option></select></div>
			<div class="form-group">
				<label for="departmentaffil">Department Affiliation</label> <input class="form-control" type="text" id="departmentaffil" name="departmentaffil">
			</div>
			<div class="form-group">
				<input class="btn btn-primary" name='Submit' type="submit"
					value="Submit">
			</div>
		</form>

		<!-- jQuery and JS bundle w/ Popper.js -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

		<!-- PhP code starts here -->
    <?php
    
    if (isset($_POST['Submit'])) {

        /**
         * Grab information from the form submission and store values into variables.
         */
        $email = isset($_POST['email']) ? $_POST['email'] : " ";
        $Fname = isset($_POST['fname']) ? $_POST['fname'] : " ";
        $Lname = isset($_POST['lname']) ? $_POST['lname'] : " ";
        $Phone_number = isset($_POST['phone']) ? $_POST['phone'] : " ";
        $Semail = isset($_POST['email']) ? $_POST['email'] : " ";
        $StudentID = isset($_POST['studentid']) ? $_POST['studentid'] : " ";
        $Classification = isset($_POST['class']) ? $_POST['class'] : " ";
        $Department_Affiliation = isset($_POST['departmentaffil']) ? $_POST['departmentaffil'] : " ";

        // Insert into Party table;
        $queryparty = "INSERT INTO Party (email, Fname, Lname, Phone_Number)
                VALUES ('" . $email . "', '" . $Fname . "''" . $Lname . "''" . $Phone_number . "');";
        if ($conn->query($queryparty) === TRUE) {
            echo "Welcome " . $Fname . "</p>";
        } else {
            echo "Error: " . $queryparty . "<br>" . $conn->error;
        }
        
        $querystudent = "INSERT INTO Student (Semail, StudentID, Classification, Department_Affiliation)
                VALUES ('" . $Semail . "', '" . $StudentID . "''" . $Classification . "''" . $Department_Affiliation . "');";
        if ($conn->query($querystudent) === TRUE) {
            echo "Student " . $Fname . "</p>";
        } else {
            echo "Error: " . $querystudent . "<br>" . $conn->error;
        }
        // If you want to redirect without seeing messages printed, uncomment the following line:
        //header("Location: submit_request.php");
    }
    ?>




</body>

</html>