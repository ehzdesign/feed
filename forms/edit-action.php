<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include(ROOT_PATH . 'database/database_connect.php') ?>


<?php
  //Prepare an UPDATE sql statement
  $statement = $db_connection->prepare(
    "UPDATE Post SET title=?, body=?, price=?, location=? WHERE id=?"
  );

  // replace ?
  $statement->prepare(
    's,s,s,s,i',
    $_POST['f_title'],
    $_POST['f_body'],
    $_POST['f_price'],
    $_POST['f_location'],
    $_POST['f_body'],
    $_POST['f_id']

  );

  $statement->execute();


 ?>


<?php include(ROOT_PATH . 'includes/footer.php') ?>