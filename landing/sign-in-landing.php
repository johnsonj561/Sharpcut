<?php
  require_once("../php/connect.php");

  //only perform these operations if user is not already logged in
  if(!$_SESSION['loggedIn']){
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);
    $salt = "X1K$6B8";
    $query = "SELECT * FROM Users where username = '$username';";
    $result = mysqli_query($link, $query);

    //if we have a match! Check the passwords
    if(mysqli_num_rows($result) == 1){
      $row = mysqli_fetch_assoc($result);
      //get hashed value of password to check against database password
      $password = crypt($password, $salt);
      if($password == $row['Password']){
        //log in successful - maintain log in status with $_SESSION
        $_SESSION['userID'] = $row['ID'];
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $username;
      }
    }
    mysqli_free_result($result);
  }

  //if logged in as admin user - generate a table of customers
  if($_SESSION['username'] =='jimj908' && $_SESSION['loggedIn']){
    $query = "SELECT * FROM UserInfo;";
    $result = mysqli_query($link, $query);
    $selectedAccount = "<form role='form' action='account-selected-admin.php' method = 'post'>\n
                        <div class='row'>\n
                          <div class='form-group col-lg-6'>\n
                            <label>Select Account To Review Statements or Add Work Orders</label>\n
                            <select class='form-control' name = 'customerID' id = 'customerID' required>\n";

    //print the body of the table
    while($row = mysqli_fetch_assoc($result)){
      if($row['ID'] == 1){  //skip the admin user account! No need to display in customer list
        continue;
      }
      $ID = $row['ID'];
      $name = $row['name'];
      $streetAddress = $row['streetAddress'];
      $city = $row['city'];
      $state = $row['state'];
      $selectedAccount .= "<option value='$ID'>Account ID $ID - $name : $streetAddress, $city $state</option>\n"; 
    }
    $selectedAccount .= "</select>\n </div>\n 
                        <div class='form-group col-lg-12 text-center'>
                          <button type='submit' class='btn btn-default'>Select</button>
                        </div>\n </div>\n </form>\n";
    mysqli_free_result($result);
  }
  mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ.">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Sign In Landing</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <?php require_once('../templates/analyticstracking.html'); ?>
  </head>

  <body>

    <?php 
      require_once('../templates/navbar.html'); 

      //if logged in as admin user
      if($_SESSION['loggedIn'] && $_SESSION['username'] == 'jimj908'){
        require_once('../templates/sign-in-successful-admin.html');
      }
      //else if logged in as a customer
      else if($_SESSION['loggedIn']){
        require_once('../templates/sign-in-successful.html');
      }
      //else Login Failed - provide user with options to retry or contact
      else{
        require_once('../templates/sign-in-failed.html');
      }

      require_once('../templates/footer.html');
    ?>

  </body>
</html>