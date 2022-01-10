<!--
/**
 * CS 4342 Database Management
 * @author A Gandara (taken from Instruction Team Fall 2020 - Garnica)
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: 
 */
-->

<?php

    function displayTable( $tbl){
       $sql = "SELECT * FROM " . $tbl . ";";
        
        $conn = $GLOBALS['conn'];
        if ($result = $conn->query($sql)) {
            echo "<h1 class='center'>" .  $tbl .  " data </h1>";     
                   
           echo "<table class='center' border=1 width=50%>
                   <tr> ";
           $finfo = $result->fetch_fields();
           
            foreach ($finfo as $val) {
                echo "<th>". $val->name . "</th>";
            }  
            echo "</tr>";
           
            while($row = $result->fetch_row()){
                echo "<tr>";
                foreach ($row as $value){
                    echo "<td>".$value."</td>";
                }
                echo "</tr>";
            }
   
            echo "</table> <br><br> ";
        }
    }

?>

<!doctype html>
<html lang="en">
<!-- we will use a style shee to control the look and feel - style sheets introduce formatting styles that can 
be added to your interface -->
<link rel="stylesheet" href="css/style.css">
<!-- Bootstrap CSS library https://getbootstrap.com/ - you can also layer stylesheets and reuse style sheets from other sources -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Krabby Patty Request Service Home</title>


</head>

<body>
  <div style="margin-top: 20px" class="container">
    
    <h1 class="center">Welcome to Krabby Patty Request Services</h1>
  <!-- setup a menubar -->
  <div class="topnav">
    <a class="active" href="user-menu.php">Home</a>
    <a href="view_requests.php">View Request</a>
    <a href="view_party.php">View Party</a>
    <a href="tech.php">The Real Heros</a>
    <a href="about.php">About</a>
    <a href="../index.php">Logout</a>
  </div>
  
  

    <?php 

      session_start();
      require_once('../validate_session.php');
       /** import the code to create the db connection object */
      require_once('../config.php');
      /** default look of the page **/
      displayTable("Party");
      displayTable("Student");
      displayTable("Employee");
      displayTable("Outside_party");
      displayTable("Request");
      displayTable("Notes");
      displayTable("Technician");
      displayTable("Works_on");
      
    ?>
    
  </div>

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>

