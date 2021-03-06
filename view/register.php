<?php 
    require_once('../php/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. Register with Sharp Cut to view
                                      your statement and make changes to your account contact information">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Registration</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <?php require_once('../templates/analyticstracking.html'); ?>
  </head>
  <body>

    <?php 
      require_once('../templates/navbar.html'); 
      require_once('../templates/register.html');
      require_once('../templates/footer.html');
      mysqli_close($link);
    ?>

  </body>

</html>
