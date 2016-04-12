<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database_connect.php') ?>



<ul class="nav--admin">
  <li>
    <a href="add_post.php">add post</a>
  </li>
</ul>

<?php
  //query all content
$result = $db_connection->query('SELECT * FROM Post');

?>


<ul>


   <?php while ($item = $result->fetch_assoc()): ?>

    <li><a href="edit.php?id=<?php echo $item['ID']; ?>"><?php echo $item['title'] ?></a></li>


  <?php endwhile; ?>
</ul>

<li><a href="logout.php">Logout</a></li>

<?php include(ROOT_PATH . 'includes/footer.php') ?>