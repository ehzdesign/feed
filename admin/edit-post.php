<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>

<?php
  //query for specific post

$statement = $db_connection->prepare(

  "SELECT * FROM Post WHERE ID =?"
  );


$statement->bind_param(
  "i" ,  //Type of data (i = integer, d=decimal, s = string)
  $_GET['ID'] //value to replace ? with
  );

  //run the sql query
$statement->execute();

  //get the results back
$result = $statement->get_result();

  //load first row
$item = $result->fetch_assoc();

?>

<?php

//query user table
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


<section id="edit post">

  <main class="container main-content single-post">
    <div class="row">
      <div class="col s12 l6">
        <div class="chip grey lighten-4">
         <img class="responsive-img" src="../uploads/user_image/<?php echo $post_user['profile_image']?>" alt="profile image">
         <?php echo '@' . $post_user['username']; ?>
       </div>
       <img id="preview" class="materialboxed" src="../uploads/<?php echo $item['image']?>" alt="">
     </div>
     <div class="col s12 l5 offset-l1">
      <div class="row">
        <form action="<?php echo BASE_URL; ?>forms/edit-action.php" method="post" enctype="multipart/form-data">
          <!-- upload image for post -->
          <div class="file-field input-field">
            <div class="btn">
              <span>image</span>
              <input id="image" name="f_image" type="file" accept="image/*" placeholder="upload your food image">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text" placeholder="Upload your foodie image!">
            </div>
          </div>

          <div class="row">
            <div class="input-field col s12">

              <input id="id" name="f_id" type="hidden" value="<?php echo $item['ID'] ?>">
            </div>
          </div>


          <!-- price range select -->
          <div class="row">
           <div class="col s12">


               <label for="price-range">How much did it cost?</label>
              <input name="f_price" class="validate" type="text" value="<?php echo $item['price']; ?> " id="price-range"/>

           </div>
         </div>

         <!-- location of post -->

         <div class="row">
          <div class="input-field col s12">
            <input id="pac-input" name="f_location" placeholder="enter location" value="<?php echo $item['location']; ?> " type="text" class="validate controls">
            <label for="pac-input">Location</label>
          </div>
        </div>



        <!-- title of post -->

        <div class="row">
          <div class="input-field col s12">
            <!-- <i class="material-icons prefix">location_on</i> -->
            <input id="meal-name" name="f_title" placeholder="ex. spicy salmon roll" value="<?php echo $item['title']; ?> " type="text" class="validate">
            <label for="meal-name">Meal Name</label>
          </div>
        </div>

        <!-- category of post -->
        <div class="row">
          <div class="input-field col s12">
            <!-- <i class="material-icons prefix">location_on</i> -->
            <input id="category" name="f_category" placeholder="ex. sushi" value="<?php echo $item['category']; ?> " type="text" class="validate">
            <label for="tags">Category</label>
          </div>
        </div>

        <div class="row">
          <!-- body for post -->
          <div class="input-field col s12">
            <!-- <i class="material-icons prefix">insert_comment</i> -->
            <textarea id="body" name="f_body" class="materialize-textarea"  length="120" ></textarea>
            <label for="body">Share your experience!</label>
          </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit" name="action">Submit
          <i class="material-icons right">send</i>
        </button>

      </form>
    </div>

  </div>
</div>
</main>



</section>




















<?php include(ROOT_PATH . 'includes/footer.php') ?>