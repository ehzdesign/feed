<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>







<?php

if($_SESSION['role'] == 0){


$statement = $db_connection->prepare("SELECT * FROM Post WHERE user_id =?");

$statement->bind_param(
  "s" ,  //Type of data (i = integer, d=decimal, s = string)
  $_SESSION['user_id'] //value to replace ? with
  );

}

else{
  $statement = $db_connection->prepare("SELECT * FROM Post");
}

 //run sql query
$statement->execute();

$result = $statement->get_result();


?>
<?php



  $statement = $db_connection->prepare(

    "SELECT * FROM users WHERE ID =?"
    );

  $statement->bind_param(
     "s" ,  //Type of data (i = integer, d=decimal, s = string)
      $_SESSION['user_id'] //value to replace ? with
  );



$statement->execute();

$user_result = $statement->get_result();

$profile = $user_result->fetch_assoc();


?>


<section id="admin">
  <div class="row">
    <div class="col s12 banner">
      <div class="profile-img"style="background-image:url(../uploads/user_image/<?php echo $profile['profile_image'];?>)">

        <a class="edit-profile-image-modal" href="#profile-modal"><i class="material-icons">photo_camera</i></a>
      </div>
      <div class="overlay"></div>
      <div class="row">
        <h1 class="username">@<?php echo $profile['username']; ?></h1>
      </div>
    </div>
  </div>
  <main class="container admin-main">

   <div class="row">
    <a class="new-post-link" href="add-post.php">+ add new post</a>
  </div>
</div>
<div class="row post-container">


 <?php while ($item = $result->fetch_assoc()): ?>

  <a href="../post.php?ID=<?php echo $item['ID'] ?>">


    <div class="col s12 m6 l4 col--home">

     <div class="post-container--home">

      <div class="overlay"></div>


      <?php if(!empty($item['image'])): ?>

        <div class="post--home" style="background-image:url(../uploads/<?php echo $item['image']?>)">

        <?php else: ?>

          <div class="post--home" style="background-image:url(../uploads/panda.jpg">

          <?php endif; ?>

          <p class="post-title"><?php echo $item['title']; ?></p>

          <?php

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


          <div class="chip grey lighten-4">
           <img class="responsive-img" src="../uploads/user_image/<?php echo $post_user['profile_image']?>" alt="profile image">
           <?php echo '@' . $post_user['username']; ?>
         </div>


       </div>

     </div>
     <div class="post-actions col s12">
      <a href="edit-post.php?ID=<?php echo $item['ID'] ?>"class="waves-effect waves-light btn edit"><i class="material-icons left">mode_edit</i>edit</a>
      <a href="../forms/delete-action.php?ID=<?php echo $item['ID']; ?>"class="waves-effect waves-light btn delete"><i class="material-icons left">delete_forever</i>delete</a>
    </div>

  </div>


</a>




<?php endwhile; ?>



</div>
</main>
</section>

<!-- modal for edit profile image form -->
<div id="profile-modal" class="modal bottom-sheet">
  <div class="modal-content">
    <div class="container">
     <form  action="<?php echo BASE_URL; ?>forms/edit-profile-action.php" method="post" enctype="multipart/form-data">
      <!-- upload image for post -->
      <div class="file-field input-field">
        <div class="btn">
          <span>image</span>
          <input id="image" name="f_image" type="file" accept="image/*" placeholder="upload your food image" required>
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload your profile pic!">
        </div>
      </div>

      <button class="btn waves-effect waves-light" type="submit" name="action">Submit
        <i class="material-icons right">send</i>
      </button>

    </form>
  </div>

</div>

</div>



<?php include(ROOT_PATH . 'includes/footer.php') ?>