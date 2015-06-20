<?php
require_once('connect.php');
//variable to detect a successful image upload
$image_success = 1;
//extract testimonial data
$date = strip_tags($_POST['date']);
$title = strip_tags($_POST['title']);
$title = mysqli_real_escape_string($link, $title);
$article = strip_tags($_POST['article']);
$article = mysqli_real_escape_string($link, $article);

//create image data
$tempName = $_FILES['image']['tmp_name'];

if(!($imageName = $_FILES['image']['name'])){
  echo "No Image Found<br>";
  $image_success = 0;
}
else if(!($imageExtension = GetImageExtension($_FILES['image']['type']))){
  echo "Invalid image type entered<br>";
  $image_success = 0;
}
else if($_FILES['image']['size'] > 300000){
  echo "File size is too large<br>";
  $image_success = 0;
}
else if(file_exists($targetPath = "articleimages/".$imageName)){
  echo "This file already exists<br>";
  $image_success = 0;
}
else if(!(move_uploaded_file($tempName, $targetPath))){
  echo "Unable to upload file to server<br>";
  $image_success = 0;
}

//if any of above tests failed - set image path to NULL
//this assumes no image was entered and forces testimonial to upload with no image
if(!$image_success){
  $targetPath = NULL;
}

//we are inserting into the database the path to the image - not the actual image's binary
//another option is to create a blob db variable and store the image binary in the database
$query = "INSERT INTO Articles (date, title, article, imagePath) VALUES
            ('$date', '$title', '$article', '$targetPath');";
mysqli_query($link, $query) or die("Unable to update database<br>");
echo "Article successfully uploaded to Articles table<br>";


mysqli_close($link);


//re-direct to Testimonials page
echo "<meta http-equiv='refresh' content='1; ../view/articles.php'>";



//returns the correct image extension or false if invalid type
function GetImageExtension($imagetype){
  if(empty($imagetype)) return false;
  switch($imagetype){
    case 'image/bmp': return '.bmp';
    case 'image/gif': return '.gif';
    case 'image/jpeg': return '.jpg';
    case 'image/png': return '.png';
    default: return false;
  }
}
?>