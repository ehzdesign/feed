<?php require_once('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('database/database-connect.php') ?>

<?php

//query your table for all results from posts table
 $result = $db_connection->query('SELECT * FROM Post');

 ?>

<main class="container">
  <div class="row">
<!-- use to gran individual information from each post -->
<?php while ($item = $result->fetch_assoc()): ?>

<!-- PDO WAY -->
  <?php //while($item = $result->fetch(PDO::FETCH_ASSOC)): ?>


 <div class="col s12 m6 l4">
   <div class="card  medium z-depth-1">
    <div class="card-image">

    <?php if(!empty($item['image'])): ?>
      <img src="uploads/<?php echo $item['image']?>" alt="">

    <?php else: ?>

    <img src="uploads/<?php echo $item['thumbnail_Image']?>" alt="">

    <?php endif; ?>


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