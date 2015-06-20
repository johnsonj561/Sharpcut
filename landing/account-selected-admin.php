<?php
  require_once('../php/connect.php');
  //if first time on this page - customerID is assigned from $_POST
  if(isset($_POST['customerID'])){
    $customerID = $_POST['customerID'];
    $_SESSION['customerID'] = $customerID;
  }
  //else being re-directed to this page and customerID has already been stored
  //in $_SESSION
  else{
    $customerID = $_SESSION['customerID'];
  }
  
  //get an array of user information
  $query = "SELECT * FROM UserInfo WHERE ID = '$customerID';";
  $result = mysqli_query($link, $query);
  $userInfo = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  //create a table containing all of the work completed for this customer
  $query = "SELECT * FROM CompletedWork WHERE customerID = '$customerID' ORDER BY jobID DESC;";
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

  //determine how much is owed by this customer
  $query = "SELECT price FROM CompletedWork WHERE customerID = '$customerID' AND paid = 'No';";
  $result = mysqli_query($link, $query);
  $amountDue = 0;
  while($price = mysqli_fetch_array($result)){
    $amountDue += $price[0];  
  }
    
  mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Update Account</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

  </head>
  <body>
    <?php require_once('../templates/navbar.html'); ?>

    <div class="container">
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <h1 class = "intro-text text-center"><?php echo $userInfo['name'];?>'s Account</h1>
            <hr>
          </div>
          <div class="col-lg-3">
            <h2 class="intro-text text-center">Amount Due: $<?php echo $amountDue; ?></h2>
          </div>
          <div class="col-lg-3">
            <h2 class="intro-text text-center">
              <a href="../view/add-work-order.php">
              Add New Work Order</a></h2>
          </div>
          <div class="col-lg-3">
            <h2 class="intro-text text-center">
              <a href="../view/delete-work-order.php">
              Delete Work Orders</a></h2>
          </div>
          <div class="col-lg-3">
            <h2 class="intro-text text-center">
              <a href="../view/edit-work-order.php">
              Update Payments</a></h2>
          </div>
          <div class="col-lg-12">
            <?php echo $table; ?>
          </div>
        </div>
      </div>
    </div>

    <?php require_once('../templates/footer.html'); ?>

  </body>

</html>