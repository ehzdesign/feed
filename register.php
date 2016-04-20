<?php require_once('includes/config.php') ?>
<?php require_once(ROOT_PATH . 'includes/header.php') ?>




<main class="container main-content">

  <div class="row">


    <div class="col s12 l4">

      <p>Create an account</p>

      <form  method="post" action="<?php echo BASE_URL; ?>forms/register-action.php">

        <div class="row">

         <div class="input-field col s12">

          <input id="username" name="f_username" type="text" class="validate" required>
          <label for="username">*username</label>

        </div>


      </div>

    <div class="row">

     <div class="input-field col s12">

      <input id="password" name="f_password" type="password" class="validate" required>
      <label for="password">*password</label>

    </div>


  </div>

  <div class="row">

    <div class="col s12">

      <button class="btn waves-effect waves-light" type="login" name="register">create an account</button>

    </div>

  </div>



</form>

</div>

<div class="col s12 offset-l3 l4">

      <p>I have an account</p>


      <a href="login.php"><button class="btn waves-effect waves-light" type="" name="login">SIGN IN</button>
      </a>
    </div>

  </div>




</form>

</div>


</div>



</main>







<?php include(ROOT_PATH . 'includes/footer.php') ?>