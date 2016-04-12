<?php require_once('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('database/database_connect.php') ?>

<?php

//query your table for all results from posts table
 $result = $db_connection->query('SELECT * FROM Post');

 ?>
<a href="admin/admin.php">admin</a>


<?php //echo 'favorite color is ' . $_SESSION["username"]; ?>
<main class="container">
  <div class="row">
<!-- use to gran individual information from each post -->
 <?php while ($item = $result->fetch_assoc()): ?>

 <div class="col s12 m6 l4">
   <div class="card  medium z-depth-1">
    <div class="card-image">
      <img src="uploads/<?php echo $item['thumbnail_Image']?>" alt="">
    </div>
    <div class="card-action">
      <a href="post.php?ID=<?php echo $item['ID'] ?>"><small>view</small></a>
    </div>
      <p class=""><?php echo $item['title']; ?></p>
      <p><?php echo $item['location']; ?></p>
      <p><?php echo $item['category']; ?></p>
      <p>$<?php echo $item['price']; ?></p>
      <p><?php echo $item['body']; ?></p>
      <a href="single-page.php?id=<?php echo $item['ID'] ?>"> </a>
    </div>
 </div>




<?php endwhile; ?>
  </div>
</main>

<?php include(ROOT_PATH . 'includes/footer.php') ?>