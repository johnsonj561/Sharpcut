<!DOCTYPE html>
<!-- Justin Johnson - Sharp Cut Lawn Service 2014 -->
<html lang="en">

  <?php 
require_once('php/connect.php');
  ?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sharp Cut Lawn Service, Branchburg NJ. Providing residential and commercial lawn
                                      services to Somerset County since 2002.">
    <meta name="author" content="Sharp Cut Lawn Service">
    <meta name="ROBOTS" content="INDEX, FOLLOW">
    <link rel="icon" type="image/x-icon" href="img/grass-favicon.png" />
    <title>Sharp Cut Lawn Service | Branchburg | NJ | 08876</title>
    <link href="css/main.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" 
          rel="stylesheet" type="text/css"> 
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" 
          rel="stylesheet" type="text/css">
    <?php require_once('templates/analyticstracking.html'); 
          require_once('templates/fb-share.html');?>
    <!-- Google Plus Platform -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div id="fb-root"></div>
    <div class="fb-share"><div class="fb-share-button" data-href="http://www.sharpcutlawns.com" 
                               data-layout="button_count"></div></div>
    <div class="google-plus-one"><div class="g-plusone"></div></div>
    <div class="brand">Sharp Cut Lawn Service</div>
    <div class="address-bar"> Branchburg, NJ 08876 | Somerset County</div>
    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
          <a class="navbar-brand" href="index.php">Sharp Cut Lawn Service</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li>
              <a href="index.php">Home</a>
            </li>
            <li>
              <a href="view/services.php">Services</a>
            </li>
            <li>
              <a href="view/articles.php">Articles</a>
            </li>
            <li>
              <a href="view/testimonials.php">Testimonials</a>
            </li>
            <li>
              <a href="view/manage-account.php">My Account</a>
            </li>
            <li>
              <a href="view/contact.php">Contact</a>
            </li>
            <?php
              if($_SESSION['loggedIn']){
                echo "<li><a href='php/logout.php'>Log Out</a></li>";
              }
              else{
                echo "<li><a href='view/manage-account.php'>Log In</a></li>";
              }
            ?> 
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <h1 class="brand-before text-center"><small>Providing Lawn &amp; Landscape Solutions Since 2002</small></h1>
            <hr>
            <div class="col-lg-3 text-center">
              <div id="carousel-example-generic" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators hidden-xs">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                  <div class="item active">
                    <img class="img-responsive img-full" src="img/spring-flowers.jpg" alt="Green Grass and Flowers">
                  </div>
                  <div class="item">
                    <img class="img-responsive img-full" src="img/landscape-design.jpg" alt="Landscape Design">
                  </div>
                  <div class="item">
                    <img class="img-responsive img-full" src="img/tree-mulch.jpg" alt="Tree and Mulch Design">
                  </div>
                  <div class="item">
                    <img class="img-responsive img-full" src="img/fresh-cut-grass.jpg" alt="Lawn Care and Maintenance">
                  </div>
                  <div class="item">
                    <img class="img-responsive img-full" src="img/flower-bed.jpg" alt="Flower Bed Design">
                  </div>
                  <div class="item">
                    <img class="img-responsive img-full" src="img/sprinkler-system.jpg" alt="Sprinkler System">
                  </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="icon-next"></span>
                </a>
              </div>
            </div>
            <div class="col-lg-9">
              <hr class="visible-xs">
              <p>Sharp Cut Lawn Service is a family owned, licensed and insured business that operates out of 
                Branchburg NJ.
                Whether you are looking for someone to manage your entire landscape and improve the overall appearance of
                your property, or simply looking for someone to mow the lawn while away on vacation - Sharp Cut has the
                knowledge and experience required to get the job done right. We encourage you to check out our
                <a href="view/testimonials.php">customer reviews</a> to help determine if this is the right company
                to help manage your lawn, or jump to our <a href="view/services.php">Services Page</a> to see how we
                can improve your landscape this year.
              </p>
              <p>With the expertise and honest work from this Branchburg grown family business 
                - you can re-create the appearance of your property from the ground up at an affordable price. 
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <div class="col-lg-6">
              <hr>
              <h2 class="intro-text text-center">Landscape & Lawn Care</h2>
              <hr>
              <hr class="visible-xs">
              <img class="img-responsive img-border img-left" src="img/sprinkler-200.jpg" alt="Sprinkler System">
              <p>What originated as a father and son business, simply cutting grass for a few of the neighbors, has
                quickly evolved into a professional landscape company that offers a variety of lawn services to Somerset
                County New Jersey. Keeping your grass trimmed to the proper height is just the beginning. Proper nutrition 
                and soil aeration will keep your grass fresh and healthy all summer long. Spinkler system installations
                will help you counter the August dry spells. Re-design your flower beds and plant fresh shrubbery to give 
                your home a fresh new look this season. Licensed in pesticide application, Sharp Cut can safely remove any 
                unwanted pests that might have made home in your grass, flower beds, or trees.</p>
              <p>View our <a href="view/services.php">services page</a> for a complete description of what Sharp Cut 
                can do for you and your home or reach out now for a <a href="view/contact.php">free estimate</a>.
              </p>
            </div>
            <div class="col-lg-6">
              <hr>
              <h2 class="intro-text text-center">Off Season Services</h2>
              <hr>
              <hr class="visible-xs">
              <p>Sharp Cut provides a number of off-season services - debris removal, shrubbery care, soil aeration, 
                grass nutrition and flower bed fertilization just to name a few. Maintaining your landscape year round
                and making preparations for each of the seasons is the secret to giving your home the look you've always
                wanted.
              </p>
              <hr>
              <img class="img-responsive img-border img-left" src="img/snow-plow.jpg" alt="Snow plow and 
                                                                                                   ice removal">
              <p>Sharp Cut is equipped to plow and remove snow from residential and commercial properties. Make sure 
                your household is safe this winter and have your sidewalks clean and salted after each snow fall.
                Don't wait until it's too late, <a href="view/contact.php">contact us now</a> to get free snow plowing 
                and snow removal estimates for the winter to come.
              </p>
              <hr>
              <img class="img-responsive img-border img-left" src="img/firewood-sale.jpg" alt="Firewood Sales">
              <p>Save money on gas and electric  - Put your wood burning stove to good use this winter! We will
                deliver firewood that is chopped to perfection and well seasoned to ensure a good burn. Purchase a stack of
                firewood for a cozy weekend at home or save money by buying in bulk and stocking up on wood for the entire 
                winter season.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Weekly Lawn and Landscape Tips</h2>
            <hr>
            <hr class="visible-xs">
               <p><a href="view/articles.php">Visit our Articles Page</a> to discover new ways to better care for your
                 landscape this year. Tips and tricks will include basic lawn care improvements, strategies for
                 planting and protecting shrubs, preparing for the winter snow storms or managing the summer dry
                 spells, fighting off and removing pests that return each year, mulch and flower bed maintenance, 
                 and a variety of ways to improve the appearance and safety of your home. Articles contain simple 
                 do it yourself instructions, but we are available to perform these services if you would
                 prefer. If you have an idea for next week's article, <a href="view/contact.php">Contact Sharp Cut</a>!
          </div>
        </div>
      </div>
       <div class="row">
        <div class="box">
          <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Online Account Management</h2>
            <hr>
            <hr class="visible-xs">
            <div class="col-lg-4">
              <p>Customers can <a href="view/manage-account.php">sign in or register</a> to view their accounts from 
                any computer or mobile device. By registering with our online services, customers will have access
                to all work performed by Sharp Cut. Look up work that was completed in the past to review dates and
                prices, print billing statements, or make secure payments online. <em>Online Payment Coming Soon</em>
            </div>
            <div class="col-lg-8">
                <img class="img-responsive img-border" src="img/sharpcut-statement.jpg" alt="Customer Statement">
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <br><br>
      <div class="container">
        <div class="row">
            <a href="http://www.facebook.com/sharpcutlawns">
              <img class="img-responsive img-border" src="img/facebook-like-us-xs.jpg" alt="Like Sharp Cut on Facebook">
            </a
          <br><br>
          <div class="col-lg-2 text-center">
            <a href="../index.php">Home</a>
          </div>
          <div class="col-lg-2 text-center">
            <a href="../view/services.php">Services</a>
          </div>
          <div class="col-lg-2 text-center">
            <a href="../view/testimonials.php">Testimonials</a>
          </div>
          <div class="col-lg-2 text-center">
            <a href="../view/manage-account.php">Account Management</a>
          </div>
          <div class="col-lg-2 text-center">
            <a href="../view/contact.php">Contact Sharp Cut</a>
          </div>
          <div class="col-lg-2 text-center">
            <a href="../view/manage-account.php">Create Account</a>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>Copyright &copy; 2014 Sharp Cut Lawn Service</p>
          </div>
        </div>
      </div>
    </footer>
    <script src="js/main.js"></script> 
    <script>
      $('.carousel').carousel({
        interval: 5000 //changes the speed
      })
    </script>
  </body>
</html>