<?php 
  require_once("connect.php"); 
  //re-set $_SESSION
  $_SESSION = array(); 
  session_destroy(); 
  mysqli_close($link);
  //re-direct to home page
  echo "<meta http-equiv='refresh' content='0;../index.php'>";
?>

