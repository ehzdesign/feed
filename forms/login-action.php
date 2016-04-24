<?php
  include('../includes/config.php');
  include(ROOT_PATH . 'database/database-connect.php');
   // include('../admin/login-check.php');




  //load user with matching username
  $statement = $db_connection->prepare(
    "SELECT * FROM users WHERE username =?"
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



    // //check if password is correct
    if (password_verify($_POST['f_password'],$user['password'])) {
      # code...
      //set flag in session
      header('location:../index.php');
      session_start();

      $_SESSION['username'] = $user['username'];
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['role'] = $user['role'];


      //redirect to admin
       header('location:../index.php');
       exit;
    }
  }

  //Check if username and password are correct


//back to the login
header('location:../register.php');



 ?>

