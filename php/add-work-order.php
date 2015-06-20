<?php
  require_once('connect.php');
  $customerID = $_SESSION['customerID'];
  $date = strip_tags($_POST['date']);
  $price = strip_tags($_POST['price']);
  $paid = strip_tags($_POST['paid']);
  $note = strip_tags($_POST['note']);

  //add new work order to database
  $query = "INSERT INTO CompletedWork (customerID, date, note, price, paid)
            VALUES ('$customerID', '$date', '$note', '$price', '$paid');";
  mysqli_query($link, $query);
  mysqli_close($link);
  //re-direct admin user to accounts page
  echo "<meta http-equiv='refresh' content='0; ../landing/account-selected-admin.php'>";


?>