<?php
  $name = strip_tags($_POST['name']);
  $email = strip_tags($_POST['email']);
  $phoneNumber = strip_tags($_POST['phoneNumber']);
  $message = strip_tags($_POST['message']);
  $headers = "From: www.sharpcutlawns.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $emailMessage = 
    "<table class='form-email-message'>
      <tr>
        <td>New Sharp Cut Message</td>
      </tr>
      <tr>
        <td>$message</td>
      </tr>
      <tr>
        <td>From: $name</td>
      </tr>
      <tr>
        <td>Phone Number: $phoneNumber</td>
      </tr>
      <tr>
        <td>Email: $email</td>
      </tr>
    </table>";

  $result = mail("jimj908@hotmail.com", "New Sharp Cut Message", $emailMessage, $headers);
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
    <title>Sharp Cut Lawn Service | Message Sent</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
<?php require_once('../templates/analyticstracking.html'); ?>
  </head>
  
  <body>
  
    <?php 
      require_once('../templates/navbar.html');
      require_once('../templates/message-sent.html');
      require_once('../templates/footer.html'); 
    ?>

  </body>

</html>
