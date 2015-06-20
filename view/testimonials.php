<?php
  require_once('../php/connect.php');
  require_once('../php/date-functions.php');

  //build testimonials structure from database!
  $testimonials = "";
  $query = "SELECT * FROM Testimonials ORDER BY ID DESC;";
  $result = mysqli_query($link, $query);
  while($row = mysqli_fetch_assoc($result)){
    $date = $row['date'];
    $date = format_date($date);
    $name = $row['name'];
    $message = $row['message'];
    $imagePath = $row['imagePath'];
    $testimonials .= "<div class='row'>
                        <div class='box'>
                          <div class='col-lg-12 testimonial'>
                            <h2>$name
                              <br>
                              <small>$date</small>
                            </h2>";
    if($imagePath == NULL){     //if there is no image - let testimonial occupy entire width
      $testimonials .= "<p>$message</p></div></div></div>";
    }
    else{
      $testimonials .=    "<div class='col-md-4'>
                            <img class='img-responsive' src='../php/$imagePath' alt='$name'>
                          </div>
                          <div class='col-md-8'>
                            <p>$message</p>
                          </div>
                        </div>
                      </div>
                    </div>";
    }
  }
  mysqli_free_result($result);
  mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. View customer reviews on the Sharp Cut
                                      Testimonials Page or add your own review to share with others">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Testimonials</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <?php require_once('../templates/analyticstracking.html'); ?>
  </head>
  <body>
    <?php 
      require_once('../templates/navbar.html'); 
      require_once('../templates/testimonials.html');
      require_once('../templates/footer.html');
    ?>
  </body>
</html>