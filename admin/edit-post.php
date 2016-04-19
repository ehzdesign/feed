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

  //$statement->bindParam(1,);


 ?>


<section id="add post">

  <div class="container">


    <!-- add values to input forms to prefill content -->


    <!-- image preview of what user will upload -->
    <img id="preview" class="materialboxed" width="250" src="<?php echo BASE_URL; ?>uploads/food_placeholder.gif">



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
            <!-- <i class="material-icons prefix">location_on</i> -->
            <input id="id" name="f_id" type="hidden" value="<?php echo $item['ID'] ?>">
          </div>
        </div>


        <!-- price range select -->
        <div class="row">
         <div class="col s12">
           <p class="range-field">
             <!-- <i class="material-icons prefix">attach_money</i> -->
             <label for="price-range">How much did it cost?</label>
             <input name="f_price" type="range" value="<?php echo $item['price']; ?> " id="price-range" min="0" max="100" />
           </p>
         </div>
       </div>

       <!-- location of post -->

       <div class="row">
        <div class="input-field col s12">
          <!-- <i class="material-icons prefix">location_on</i> -->
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

</section>








<script>

  var my_var = <?php echo $item['body']; ?>;

  $('materialize-textarea').val('fs');
  $('materialize-textarea').trigger('autoresize');

</script>











<?php include(ROOT_PATH . 'includes/footer.php') ?>