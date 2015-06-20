<?php  
  require_once('../php/connect.php');
  $customerID = $_SESSION['customerID'];
  //get customer name
  $query = "SELECT * FROM UserInfo WHERE ID = '$customerID';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $name = $row['name'];
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
    <title>Sharp Cut Lawn Service | Add Work Order</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">  

  </head>

  <body>

    <?php 
      require_once('../templates/navbar.html'); 
      require_once('../templates/add-work-order.html');
      require_once('../templates/footer.html');
    ?>

  </body>

</html>
