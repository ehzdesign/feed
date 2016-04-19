

<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include(ROOT_PATH . 'templates/database-connect.php') ?>


<?php
  //query all content
$result = $db_connection->query('SELECT * FROM Post');

?>


<ul>


   <?php while ($item = $result->fetch_assoc()): ?>

    <li><a href="edit.php?id=<?php echo $item['ID']; ?>"></a><?php echo $item['title'] ?></li>

</ul>


<?php include(ROOT_PATH . 'includes/footer.php') ?>