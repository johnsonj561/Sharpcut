<?php
  require_once('connect.php');
  $customerID = $_SESSION['customerID'];

  foreach ($_POST as $key => $paid) {
    if($key == 'customerID'){
      continue;
    }
    $query = "UPDATE CompletedWork SET paid = '$paid' WHERE 
              customerID = '$customerID' AND jobID = '$key';";
    mysqli_query($link, $query);
    }
    mysqli_close($link);
    echo "<meta http-equiv='refresh' content='0; ../landing/account-selected-admin.php'>";

?>