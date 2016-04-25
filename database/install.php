<?php

//connect to db
include('database-connect.php');

//add tables to db

$db_connection->query("

  CREATE TABLE Post (
  ID INT AUTO_INCREMENT,
  title VARCHAR(255),
  location VARCHAR(255),
  body TEXT,
  category VARCHAR(255),
  price VARCHAR(10),
  image VARCHAR(255),
  user_id VARCHAR(255),
  PRIMARY KEY(ID)
  )

  ");

$db_connection->query("
  CREATE TABLE users(
  ID INT AUTO_INCREMENT,
  username VARCHAR(255),
  password VARCHAR(255),
  profile_image VARCHAR(255),
  role INT DEFAULT '0'
  )


  ");


$admin_username = mysql_real_escape_string('Erick');
$admin_password = password_hash('4pixels', PASSWORD_DEFAULT);

$statement = $db_connection->prepare(

  "INSERT INTO users(username, password, role) VALUES (?, ?, ?)"

  );



$statement->bind_param(
  "ssi",
  $admin_username,
  $admin_password,
  1

  );

$statement->execute();



?>