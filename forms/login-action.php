<?php


  //load user with matching username
  $statement = $db_connection->prepare(
    "SELECT * FROM User WHERE username =?"
  );

  //replace ? with username
  $statement->bind_param(
    "s",
    $_POST['f_username']
  );

  //run sql query
  $statement->execute();


  //get the results from sql
  $result = $statement->get_result();


  //user found
  if ($result) {
    # code...
    $user = $result->fetch_assoc();

    //check if password is correct
    if (password_verify($_POST['f_password'],$user['password'])) {
      # code...
      //set flag in session
      session_start();
      $_SESSION['flag'] == TRUE;

      //redirect to admin
      header("location:index.php");

    }
  }

  //Check if username and password are correct

if ($_POST['username'] == 'admin' && $_POST['password'] == 'password') {
  # code...
  # set flag in session
  session_start();
  $_SESSION['flag'] == TRUE;

  //redirect to index
  header('location:index.php');
  exit;
}

//back to the login
header('location:login.php');


 ?>