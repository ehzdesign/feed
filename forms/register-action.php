<?php

include('../includes/config.php');
include(ROOT_PATH . 'database/database-connect.php');




if(isset($_POST['register']))
{
 $f_username = mysql_real_escape_string($_POST['f_username']);
 $f_password = password_hash($_POST['f_password'], PASSWORD_DEFAULT);

 $statement = $db_connection->prepare(

  "INSERT INTO users(username, password) VALUES (?, ?)"

  );



 $statement->bind_param(
  "ss",
  $f_username,
  $f_password

  );

 $statement->execute();

  //load user with matching username
  $statement = $db_connection->prepare(
    "SELECT * FROM users WHERE username =?"
  );

  //replace ? with username
  $statement->bind_param(
    "s",
    $f_username
  );

  //run sql query
  $statement->execute();


  //get the results from sql
  $result = $statement->get_result();




  //user found
  if ($result) {
    # code...
    $user = $result->fetch_assoc();
    session_start();
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];

  }


 header('location:../index.php');
 exit;


}


?>
