<?php require_once('../includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('login-check.php') ?>
<?php include(ROOT_PATH . 'database/database-connect.php') ?>


<section id="add-post" class="main-content">

  <div class="container">


  <!-- image preview of what user will upload -->
   <img id="preview" class="materialboxed" width="250" src="<?php echo BASE_URL; ?>images/placeholder.png">



   <div class="row">
    <form class="col s12 m6 offset-m3" action="<?php echo BASE_URL; ?>forms/add-action.php" method="post" enctype="multipart/form-data">
      <!-- upload image for post -->
      <div class="file-field input-field">
        <div class="btn">
          <span>image</span>
          <input id="image" name="f_image" type="file" accept="image/*" placeholder="upload your food image!" required>
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Upload your foodie image!">
        </div>
      </div>


      <!-- price range select -->
      <div class="row">
       <div class="col s12">
          <label for="price-range">How much did it cost? (do not include '$')</label>
              <input name="f_price" class="validate" type="text"  id="price-range"/>
       </div>
     </div>

     <!-- location of post -->

     <div class="row">
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">location_on</i> -->
        <input id="pac-input" name="f_location" placeholder="enter location" type="text" class="validate controls" required>
        <label for="pac-input">Location</label>
      </div>
    </div>



    <!-- title of post -->

    <div class="row">
      <div class="input-field col s12">
        <!-- <i class="material-icons prefix">location_on</i> -->
        <input id="meal-name" name="f_title" placeholder="ex. spicy salmon roll" type="text" class="validate" required>
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
        <textarea id="body" name="f_body" class="materialize-textarea" length="120" required></textarea>
        <label for="body">Share your experience!</label>
      </div>
    </div>

      <div class="row">
          <div class="input-field col s12">
            <!-- <i class="material-icons prefix">location_on</i> -->
            <input id="id" name="f_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>">
          </div>
        </div>

   <button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>

  </form>
</div>
</div>


</section>

<?php include(ROOT_PATH . 'includes/footer.php') ?>