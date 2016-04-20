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

  // $db_connection->query("
  //     CREATE TABLE User(
  //       ID INT AUTO_INCREMENT,
  //       name


  //     )


  // ");



 ?>