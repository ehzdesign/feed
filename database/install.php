<?php

//connect to db
  include('database_connect.php');

//add tables to db

  $db_connection->query("

    CREATE TABLE Post (
      ID INT AUTO_INCREMENT,
      title VARCHAR(255),
      location VARCHAR(255),
      body TEXT,
      category VARCHAR(255),
      price VARCHAR(10),
      thumbnail_Image VARCHAR(255),
      large_Image VARCHAR(255),
      PRIMARY KEY(ID)
    )

  ");

  // $db_connection->query("
  //     CREATE TABLE User(
  //       ID INT AUTO_INCREMENT,
  //       name


  //     )


  // ");



 ?>