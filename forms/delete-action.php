<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>



<?php



$statement = $db_connection->prepare(
    "DELETE FROM Post WHERE ID=?"
    );


//replace ? with the actual id
$statement->bind_param(
    's',
    $_GET['ID']
    );

//run the SQL query
$statement->execute();


 ?>

 <h1>post was deleted successfully</h1>

<?php header("Refresh: 2, URL = ../admin/admin.php") ?>


<?php include(ROOT_PATH . 'includes/footer.php') ?>