<?php
  require_once('connect.php');
  $customerID = $_SESSION['customerID'];

  foreach ($_POST as $jobID => $checked) {
    if($jobID == 'customerID'){  //we skip the first value in POST, does not apply to deletions
      continue;
    }
    //if checkbox is on - remove entry from database
    if(isset($_POST[$jobID]) && $checked == 'on'){
      $query = "DELETE FROM CompletedWork WHERE customerID = '$customerID' AND jobID = '$jobID';";
      mysqli_query($link, $query);
    }
  }
  mysqli_close($link);

  echo "<meta http-equiv='refresh' content='0; ../landing/account-selected-admin.php'>";

?>