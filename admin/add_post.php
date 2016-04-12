<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database_connect.php') ?>


<section id="add post">

  <div class="container">


  <!-- image preview of what user will upload -->
   <img id="preview" class="materialboxed" width="250" src="<?php echo BASE_URL; ?>images/food_placeholder.gif">



   <div class="row">
    <form action="<?php echo BASE_URL; ?>forms/add_post.php" method="post" enctype="multipart/form-data">
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


      <!-- price range select -->
      <div class="row">
       <div class="col s12">
         <p class="range-field">
           <!-- <i class="material-icons prefix">attach_money</i> -->
           <label for="price-range">How much did it cost?</label>
           <input name="f_price" type="range" id="price-range" min="0" max="100" />
         </p>
       </div>
     </div>

     <!-- location of post -->

     <div class="row">
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">location_on</i> -->
        <input id="pac-input" name="f_location" placeholder="enter location" type="text" class="validate controls">
        <label for="pac-input">Location</label>
      </div>
    </div>



    <!-- title of post -->

    <div class="row">
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">location_on</i> -->
        <input id="meal-name" name="f_title" placeholder="ex. spicy salmon roll" type="text" class="validate">
        <label for="meal-name">Meal Name</label>
      </div>
    </div>

    <!-- category of post -->
    <div class="row">
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">location_on</i> -->
        <input id="category" name="f_category" placeholder="ex. sushi" type="text" class="validate">
        <label for="tags">Category</label>
      </div>
    </div>

    <div class="row">
      <!-- body for post -->
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">insert_comment</i> -->
        <textarea id="body" name="f_body" class="materialize-textarea" length="120"></textarea>
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

<?php include(ROOT_PATH . 'includes/footer.php') ?>