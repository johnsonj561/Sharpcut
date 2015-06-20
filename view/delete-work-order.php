<?php
  require_once('../php/connect.php');
  $customerID = $_SESSION['customerID'];

  //get UserInfo to have name value
  $query = "SELECT * FROM UserInfo WHERE ID = '$customerID';";
  $result = mysqli_query($link, $query);
  $userInfo = mysqli_fetch_assoc($result);
  mysqli_free_result($result);

  //get all of the jobs connected to this account
  $query = "SELECT * FROM CompletedWork WHERE customerID = '$customerID' ORDER BY jobID DESC;";
  $result = mysqli_query($link, $query);
  $table = "";


  while($row = mysqli_fetch_assoc($result)){
    $jobID = $row['jobID'];
    $date = $row['date'];
    $note = $row['note'];
    $price = $row['price'];
    $paid = $row['paid'];

    $table .= "<tr>
                <td><input type='checkbox' name='$jobID' value='on'></td>
                <td>$jobID</td>
                <td>$date</td>
                <td>$note</td>
                <td>$price</td>
                <td>$paid</td>  
                </tr>";

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
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Delete Work Orders</title>
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
            <h2 class = "intro-text text-center">Select Work Orders to Delete From 
              <?php echo $userInfo['name'];?>'s Account</h2>
            <hr>
          </div>

          <div class="col-lg-12">
            <form role="form" action="../php/delete-work-order.php" method = "post">
              <div class="row">
                <table class='statement-table'>
                  <thead><th>Select</th><th>Job ID</th><th>Date</th><th>Job Description</th><th>Price</th>
                    <th>Payment Received</th>
                  </thead>
                  <?php echo $table; ?>
                </table>
                <div class="form-group">
                  <div class="clearfix"></div>
                  <br>
                  <div class="form-group col-lg-12 text-center">
                    <button type="submit" class="btn btn-default">Delete Selected Work Orders</button>
                  </div>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>

    <?php require_once('../templates/footer.html'); ?>

  </body>

</html>