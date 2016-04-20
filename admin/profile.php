<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>



<ul class="nav--admin">
  <li>
    <a href="add-post.php">add post</a>
  </li>
</ul>

<?php

$statement = $db_connection->prepare("SELECT * FROM Post WHERE user_id =?");

$statement->bind_param(
  "s" ,  //Type of data (i = integer, d=decimal, s = string)
  $_SESSION['user_id'] //value to replace ? with
  );

 //run sql query
  $statement->execute();

  $result = $statement->get_result();


?>


<ul>


   <?php while ($item = $result->fetch_assoc()): ?>

    <li><a href="edit-post.php?ID=<?php echo $item['ID']; ?>"><?php echo $item['title']?></a></li>


  <?php endwhile; ?>
</ul>

<li><a href="../forms/logout-action.php">Logout</a></li>

<?php include(ROOT_PATH . 'includes/footer.php') ?>