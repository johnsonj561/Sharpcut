<?php
  require_once("../php/connect.php");
  //if user is not logged in -> re-direct them to log in page
  if(!$_SESSION['loggedIn']){
    echo "<meta http-equiv='refresh' content='=0;manage-account.php' />";
  }

  $userID = $_SESSION['userID'];

  $query = "SELECT * FROM Users WHERE ID = '$userID';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $username = $row['Username'];
  mysqli_free_result($result);

  $query = "SELECT * FROM CompletedWork WHERE customerID = '$userID' ORDER BY jobID DESC;";
  $result = mysqli_query($link, $query);
  $column_count = mysqli_field_count($link);
  $table = "<table class='statement-table'>\n";
  $table .= "<thead><th>Job ID</th><th>Date</th><th>Job Description</th><th>Price</th>
            <th>Payment Received</th></thead>\n";

  //print the body of the table
  while($row = mysqli_fetch_row($result)){
    $table .= "<tr>\n";
    for($column_num = 0; $column_num < $column_count; $column_num++){
      //skip over the 2nd column - no need to display customer ID to user
      if($column_num ==1 ){
        continue;
      }
      $table .= "<td>$row[$column_num]</td>\n";
    }
    $table .= "</tr>\n";
  }
  $table .= "</table>\n";  
  mysqli_free_result($result);

  //calculate the total amount owed by customer
  $query = "SELECT price FROM CompletedWork WHERE customerID = '$userID' AND paid = 'No';";
  $result = mysqli_query($link, $query);
  $amountDue = 0;
  while($price = mysqli_fetch_array($result)){
    $amountDue += $price[0];
  }
  mysqli_free_result($result);
  mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. Review work done in the past or view
                                      your current statement">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Customer Statement</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <?php require_once('../templates/analyticstracking.html'); ?>
  </head>

  <body>

    <?php 
          require_once('../templates/navbar.html'); 
          require_once('../templates/customer-statement.html');
          require_once('../templates/footer.html');
    ?>

  </body>

</html>
