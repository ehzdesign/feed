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


<a href="post.php?ID=<?php echo $item['ID'] ?>">

<div class="col s12 m6 l4 col--home">

 <div class="post-container--home">

  <div class="overlay"></div>


    <?php if(!empty($item['image'])): ?>

    <div class="post--home" style="background-image:url(uploads/<?php echo $item['image']?>)">

    <?php else: ?>

    <div class="post--home" style="background-image:url(uploads/panda.jpg">

    <?php endif; ?>

    <p class="post-title"><?php echo $item['title']; ?></p>


 </div>

 </div>

 </div>

</a>


<?php endwhile; ?>
  </div>
</main>

<?php include(ROOT_PATH . 'includes/footer.php') ?>