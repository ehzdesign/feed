<?php require_once('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>



<?php


include(ROOT_PATH . 'database/database_connect.php');

if(isset($_SESSION['user'])!="")
{
 header("Location: index.php");
}


if(isset($_POST['register']))
{
 $f_username = mysql_real_escape_string($_POST['f_username']);
 $f_email = mysql_real_escape_string($_POST['f_email']);
 $f_password = md5(mysql_real_escape_string($_POST['f_password']));

 $statement = $db_connection->prepare(

  "INSERT INTO users(username, password, email) VALUES (?, ?, ?)"

  );


 $statement->bind_param(
  "sss",
  $_POST['f_username'],
  $_POST['f_password'],
  $_POST['f_email']

  );

 $statement->execute();


}


?>

<main class="container main-content">

  <div class="row">


    <div class="col s12 l4">

      <p>Create an account</p>

      <form  method="post">

        <div class="row">

         <div class="input-field col s12">

          <input id="username" name="f_username" type="text" class="validate" required>
          <label for="username">*username</label>

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