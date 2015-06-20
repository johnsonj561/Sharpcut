<?php
  require_once("../php/connect.php");

  //flag used to represent successful registration and valid username
  $isValidPassword = false;
  $isValidUsername = false;

  //make sure username isn't already being used
  //set $isValid to false if username is not valid
  $username = strip_tags($_POST['username']);

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

  if(validateUsername($username)){
    $isValidUsername = true;
  }

  //obtain user info
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $phoneNumber = strip_tags($_POST['phoneNumber']);
  $streetAddress = strip_tags($_POST['streetAddress']);
  $aptNumber = strip_tags($_POST['aptNumber']);
  $city = strip_tags($_POST['city']);
  $state = strip_tags($_POST['state']);
  $zipCode = strip_tags($_POST['zipCode']);


  //If username is valid and passwords match - update database!
  if($isValidUsername && $isValidPassword){
    //Add entry to Users table
    $query = "INSERT INTO Users
              (Username, Password) 
              VALUES
              ('$username', '$password1');";
    mysqli_query($link, $query);
  
    //get ID that was generated for this new user
    $query = "SELECT ID FROM Users WHERE Username = '$username';";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_assoc($result);
    $userID = $row['ID'];
    mysqli_free_result($result);
    
    //Add entry to UserInfo table
    $query = "INSERT INTO UserInfo
            (ID, name, email, phoneNumber, streetAddress, aptNumber, city, state, zipCode)
            VALUES
            ('$userID', '$name', '$email', '$phoneNumber', '$streetAddress', '$aptNumber',
            '$city', '$state', '$zipCode');";
    mysqli_query($link, $query);  
  }


//create appropriate user message - dependant on registration status 
if(!$isValidUsername){
  $html = "<h2 class='intro-text text-center'>Registration Failed</h2>
          <hr>
          <p class='text-center'>Unfortunately the Username you selected is already in use.
          <a href='../view/register.php'>Please Select A Different Username</a>.</p>";
}
else if(!$isValidPassword){
  $html = "<h2 class='intro-text text-center'>Registration Failed</h2>
          <hr>
          <p class='text-center'>Your passwords do not match.
          <a href='../view/register.php'>Please Try Again</a>.</p>";
}
else{
  $html = "<h2 class='intro-text text-center'>Registration Successful</h2>
          <hr>
          <p class='text-center'>You can now <a href='../view/manage-account.php'>Log In</a> to view your statements, make
          payments, or edit your contact information.</p>";
  }

  mysqli_close($link);

  //returns true if username does not already exist
  //queries database to determine if any rows exist with this username
  function validateUsername($username){
    $query = "SELECT ID FROM Users WHERE Username = '$username'";
    $result = mysqli_query($query);
    if(mysqli_num_rows($result) > 0){
      return false;
    }
    else{
      return true;
    }
    mysqli_free_result($result);
  }

  //returns true if both passwords match
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
    <title>Sharp Cut Lawn Service | Registration Landing</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<?php require_once('../templates/analyticstracking.html'); ?>
  </head>
  <body>
    <?php 
      require_once('../templates/navbar.html'); 
    ?>

    <div class="container">
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <?php echo $html; ?>
          </div>
          <br>
        </div>
      </div>
    </div>

    <?php require_once('../templates/footer.html'); ?>

  </body>

</html>
