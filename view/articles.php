<?php
  require_once('../php/connect.php');
  require_once('../php/date-functions.php');

  //build articles structure from database!
  $articles = "";
  $query = "SELECT * FROM Articles ORDER BY ID DESC;";
  $result = mysqli_query($link, $query);
  while($row = mysqli_fetch_assoc($result)){
    $date = $row['date'];
    $date = format_date($date);
    $title = $row['title'];
    $article = $row['article'];
    $imagePath = $row['imagePath'];
    $articles .=      "<div class='row'>
                        <div class='box'>
                          <div class='col-lg-12 testimonial'>
                            <h2>$title
                              <br>
                              <small>$date</small>
                            </h2>";
    if($imagePath == NULL){     //if there is no image - let testimonial occupy entire width
      $articles .= "<p>$article</p></div></div></div>";
    }
    else{
      $articles .=        "<div class='col-md-4'>
                            <img class='img-responsive' src='../php/$imagePath' alt='$title'>
                          </div>
                          <div class='col-md-8'>
                            <p>$article</p>
                            <div class='fb-share-button' 
                            data-href='http://www.sharpcutlawns.com/view/articles.php' data-layout='button'></div>
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
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. Get the latest tips and advice for 
                                      your landscape. Articles uploaded by Sharp Cut weekly.">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="../img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Articles</title>
    <link href="../css/main.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">
    <?php require_once('../templates/analyticstracking.html'); ?>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script>
  </head>
  <body>
    <?php 
      require_once('../templates/navbar.html'); 
      require_once('../templates/articles.html');
      require_once('../templates/footer.html');
    ?>
  </body>
</html>