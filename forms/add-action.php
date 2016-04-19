<?php
require_once('../includes/config.php');
//check directory path
include(ROOT_PATH . 'database/database-connect.php');

$target_path = getcwd() . '/uploads/';
$target_path = $target_path . basename( $_FILES['f_image']['name']);

//check if image submitted
if(!empty($_FILES['f_image']['name'])) {

  //move uploaded image form temp folder to uploads
  //
  //random filename
  $filename = rand(0, 100000) . '.jpg';
  move_uploaded_file(
    $_FILES['f_image']['tmp_name'],
    // $target_path
    '../uploads/' . $_FILES['f_image']['name']
    // '../uploads/' . $filename
  );

  echo('file uploaded');

}


// $target_path = getcwd() . '/uploads/';

// $target_path = $target_path . basename( $_FILES['f_image']['name']);

// if(move_uploaded_file($_FILES['f_image']['tmp_name'], $target_path)) {
//     echo "The file ".  basename( $_FILES['f_image']['name']).
//     " has been uploaded";
// } else{
//     echo "There was an error uploading the file, please try again!";
// }

// $f_price = $_POST['f_price'];
// $f_location = $_POST['f_location'];
// $f_title = $_POST['f_title'];
// $f_category = $_POST['f_category'];
// $f_body = $_POST['f_body'];



$statement = $db_connection->prepare(

  "INSERT INTO Post(title, location, body, category, price) VALUES (?, ?, ?, ?, ?)"

);



$statement->bind_param(
  "sssss",
  $_POST['f_title'],
  $_POST['f_location'],
  $_POST['f_body'],
  $_POST['f_category'],
  $_POST['f_price']

);


$statement-bindParam(1, $_POST['f_title']);
$statement-bindParam(2, $_POST['f_location']);
$statement-bindParam(3, $_POST['f_body']);
$statement-bindParam(4, $_POST['f_catgory']);
$statement-bindParam(5, $_POST['f_price']);
// $statement-bindParam(6, $_POST['f_image']);

$statement->execute();


 ?>

 <!-- give confirm message -->

 <h1>you have added post successfully</h1>

 <!-- return back to main page -->
 <a href="index.php"></a>



