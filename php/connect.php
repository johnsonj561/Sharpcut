<?php
  session_start();
  $host = "localhost";
  $username = "johnsonj561";
  $password = "GATEway88";
  $db = "sharpcut";

  $link = mysqli_connect($host, $username, $password, $db) or
    die("Unable to connect to $host");

  //initialize session variables if not already done
  //use 'logged out' as default values
  if(!isset($_SESSION['loggedIn'])){
    $_SESSION['loggedIn'] = false;
  }
  if(!isset($_SESSION['userID'])){
    $_SESSION['userID'] = -1;
  }
  if(!isset($_SESSION['username'])){
    $_SESSION['username'] = -1;
  }
  if(!isset($_SESSION['customerID'])){
    $_SESSION['customerID'] = -1;
  }
?>