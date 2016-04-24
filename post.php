<?php include('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php  include('admin/login-check.php'); ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>

<?php

//query for specific id

$statement = $db_connection->prepare(

    "SELECT * FROM Post WHERE ID =?"
  );

$statement->bind_param(
  "i" ,  //Type of data (i = integer, d=decimal, s = string)
  $_GET['ID'] //value to replace ? with
);

$statement->execute();

$result = $statement->get_result();

//Load first row

$item = $result->fetch_assoc();

$statement = $db_connection->prepare(

    "SELECT * FROM users WHERE ID =?"
  );

$statement->bind_param(
  "s" ,  //Type of data (i = integer, d=decimal, s = string)
  $item['user_id'] //value to replace ? with
);

$statement->execute();

$user_result = $statement->get_result();

$post_user = $user_result->fetch_assoc();




?>

<!-- get title of post -->


<main class="container main-content single-post">
  <div class="row">
    <div class="col s12 l6">
    <div class="chip grey lighten-4">
           <img class="responsive-img" src="uploads/user_image/<?php echo $post_user['profile_image']?>" alt="profile image">
           <?php echo '@' . $post_user['username']; ?>
         </div>
      <img src="uploads/<?php echo $item['image']?>" alt="">
    </div>
    <div class="col s12 l6">
      <div class="post-details">
        <h1><?php echo $item['title']; ?></h1>
        <p class="location"><?php echo $item['location']; ?></p>
        <p class="price">$<?php echo $item['price']; ?></p>
        <p class="body"><?php echo $item['body'] ?></p>

      </div>
  </div>
</main>

<?php include(ROOT_PATH . 'includes/footer.php') ?>