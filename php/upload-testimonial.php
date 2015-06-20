<?php
require_once('connect.php');
//variable to detect a successful image upload
$image_success = 1;
//extract testimonial data
$date = strip_tags($_POST['date']);
$name = strip_tags($_POST['name']);
$name = mysqli_real_escape_string($link, $name);
$message = strip_tags($_POST['message']);
$message = mysqli_real_escape_string($link, $message);


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
else if(file_exists($targetPath = "images/".$imageName)){
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
if($_SESSION['loggedIn']){
  $query = "INSERT INTO Testimonials (date, name, message, imagePath) VALUES
            ('$date', '$name', '$message', '$targetPath');";
  mysqli_query($link, $query) or die("Unable to update database<br>");
  echo "Testimonial successfully uploaded to Testimonials table<br>";
}
else{
  echo "<meta http-equiv='refresh' content='=0;../view/manage-account.php' />";
}

mysqli_close($link);


//re-direct to Testimonials page
echo "<meta http-equiv='refresh' content='1; ../view/testimonials.php'>";



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