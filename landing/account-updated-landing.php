<?php
  require_once("../php/connect.php");

  //flag used to represent successful registration
  $isValidPassword = false;

  //crypt password to create hash for safe DB storage
  $salt = "X1K$6B8";
  $password1 = strip_tags($_POST['password1']);
  $password2 = strip_tags($_POST['password2']);
  $password1 = crypt($password1, $salt);
  $password2 = crypt($password2, $salt);

  //make sure passwords match
  if(validatePasswords($password1, $password2)){
    $isValidPassword = true;
  }

  //obtain user info
  $userID = $_SESSION['userID'];
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $phoneNumber = strip_tags($_POST['phoneNumber']);
  $streetAddress = strip_tags($_POST['streetAddress']);
  $aptNumber = strip_tags($_POST['aptNumber']);
  $city = strip_tags($_POST['city']);
  $state = strip_tags($_POST['state']);
  $zipCode = strip_tags($_POST['zipCode']);


  //If registartion is valid, update database and alert user
  if($isValidPassword){
    //Add entry to Users table
    $query = "Update Users set Password = '$password1' WHERE ID = '$userID';";
    mysqli_query($link, $query);
    //Add entry to UserInfo table
    $query = "UPDATE UserInfo set
              name = '$name', email = '$email', phoneNumber = '$phoneNumber', streetAddress = '$streetAddress',
              aptNumber = '$aptNumber', city = '$city', state = '$state', zipCode = '$zipCode'
              WHERE ID = '$userID';";
    mysqli_query($link, $query);
    //set HTML output for successful account update
    $html = "<h2 class='intro-text text-center'>Account Info Successfully Updated</h2>";
  }
  //else do nothing and ask user to try again
  else{
    $html = "h2 class='intro-text text-center'>Your Passwords do not match.
    <a href='../view/edit-account.php>Try Again</a>";
  }

  mysqli_close($link);

  //validatePasswords returns true if both passwords match
  function validatePasswords($password1, $password2){
    if($password1 == $password2){
      return true;
    }
    else{
      return false;
    }
  }
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
    <title>Sharp Cut Lawn Service | Account Updated</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<?php require_once('../templates/analyticstracking.html'); ?>
  </head>
  <body>
    <?php 
require_once('../templates/navbar.html'); ?>

    <div class="container">
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <?php echo $html; ?>
            <hr>
          </div>
          <br>
        </div>
      </div>
    </div>

    <?php require_once('../templates/footer.html'); ?>

  </body>

</html>
