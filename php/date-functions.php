<?php 
  //converts from yyyy/mm/dd to String represenation
  function format_date($mysql_date){
    $mysql_date_array = explode('-', $mysql_date);
    $year = $mysql_date_array[0];
    $month = $mysql_date_array[1];
    $day = $mysql_date_array[2];
    $month_string = "";
    //get string representation of month
    switch($month){
      case 1:
        $month_string = "January";
        break;
      case 2:
        $month_string = "February";
        break;
      case 3:
        $month_string = "March";
        break;
      case 4:
        $month_string = "April";
        break;
      case 5:
        $month_string = "May";
        break;
      case 6:
        $month_string = "June";
        break;
      case 7:
        $month_string = "July";
        break;
      case 8:
        $month_string = "August";
        break;
      case 9:
        $month_string = "September";
        break;
      case 10:
        $month_string = "October";
        break;
      case 11:
        $month_string = "November";
        break;
      case 12:
        $month_string = "December";
        break;
      default:
        $month_string = "";
  
    }
  
  return "$month_string $day, $year";
  
}

?>