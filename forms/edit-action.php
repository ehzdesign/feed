<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>


<?php
  //Prepare an UPDATE sql statement
$statement = $db_connection->prepare(
  "UPDATE Post SET title=?, body=?, price=?, location=? WHERE id=?"
  );

  // replace ?
$statement->bind_param(
  "ssssi",
  $_POST['f_title'],
  $_POST['f_body'],
  $_POST['f_price'],
  $_POST['f_location'],
  $_POST['f_id']

  );

$statement->execute();


  //update thumbnail
if(!empty($_FILES['f_image']['name'])){

  move_uploaded_file(

    $_FILES['f_image']['tmp_name'],
    '../uploads' . $_FILES['f_image']['name']
    );

  $statement = $db_connection->prepare(
    "UPDATE Post SET image=? WHERE id=?"
    );

  //   //replace?
  // $statement->bindParam(1, $_FILES['f_image']['name']);
  // $statement->bindParam(2, $_POST['f_id'],PDO::PARAM_INT);


  $statement->bind_param(
    "si",
    $_FILES['f_image']['name'],
    $_POST['f_id']

    );

    //execute
  $statement->execute();


}


?>

<h1>post was edited successfully</h1>

<?php header("Refresh: 2, URL = ../admin/admin.php") ?>


<?php include(ROOT_PATH . 'includes/footer.php') ?>