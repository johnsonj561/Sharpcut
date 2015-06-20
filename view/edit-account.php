<?php
  require_once("../php/connect.php");

  //if user is not logged in -> re-direct them to log in page
  if(!$_SESSION['loggedIn']){
    echo "<meta http-equiv='refresh' content='=0;manage-account.php' />";
  }

  //get user id from session storage
  $userID = $_SESSION['userID'];

  //get username from users table
  $query = "SELECT * FROM Users WHERE ID = '$userID';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  $username = $row['Username'];
  mysqli_free_result($result);

  //get contact info from userinfo table
  $query = "SELECT * FROM UserInfo WHERE ID = '$userID';";
  $result = mysqli_query($link, $query);
  $row = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. Make changes to your current Sharp Cut
                                      account">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Edit Account</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">  
    <?php require_once('../templates/analyticstracking.html'); ?>
  </head>

  <body>

    <?php 
      require_once('../templates/navbar.html'); 
      require_once('../templates/edit-account.html');
      require_once('../templates/footer.html');
    ?>
    
  </body>

</html>
