<?php require_once('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>


<div class="row">

  <div class="col s12">

    <form action="<?php echo BASE_URL; ?>forms/login-action.php" method="post">

      <div class="row">

       <div class="input-field col s12">

        <input id="username" name="f_username" type="text" class="validate">
        <label for="username">*Username</label>

      </div>


    </div>

      <div class="row">

       <div class="input-field col s12">

        <input id="email" name="f_email" type="email" class="validate" required>
        <label for="email">*email</label>

      </div>


    </div>


    <div class="row">

     <div class="input-field col s12">

      <input id="password" name="f_password" type="password" class="validate">
      <label for="password">*Password</label>

    </div>


  </div>

  <div class="row">

  <div class="col s12">
  <button class="btn waves-effect waves-light" type="login" name="action">login</button>

  </div>

  </div>

  <div class="row">
    <a href="register.php">create new account</a>
  </div>



</form>

</div>


</div>







<?php include(ROOT_PATH . 'includes/footer.php') ?>