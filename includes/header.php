<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL; ?>dist/style/main.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
 <nav class="main-nav">
  <div class="nav-wrapper">
    <a href="#" class="brand-logo">yumme</a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>

      <?php if (isset($_SESSION['username']) && $_SESSION['username']!=""):?>


      <li><a href="<?php echo BASE_URL; ?>admin/admin.php">Admin</a></li>

       <div class="chip grey lighten-4">
           <img class="responsive-img" src="<?php echo BASE_URL; ?>uploads/profile.png" alt="profile image">
           <?php echo '@'.$_SESSION['username'] ?>
       </div>

      <!-- delay logout until toast message goes away -->
      <li><a onclick="Materialize.toast('see ya later!', 2000,'',function(){location.href = '<?php echo BASE_URL; ?>forms/logout-action.php';})">Logout</a></li>

      <?php else: ?>

        <li><a href="<?php echo BASE_URL; ?>login.php">Login</a></li>

      <?php endif; ?>




    </ul>
    <ul class="side-nav" id="mobile-demo">
       <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>


      <?php if (isset($_SESSION['username']) && $_SESSION['username']!=""):?>

      <li><a href="<?php echo BASE_URL; ?>admin/admin.php">Admin</a></li>

      <div class="chip grey lighten-4">
           <img class="responsive-img" src="uploads/profile.png" alt="profile image">
           <?php echo '@'.$_SESSION['username'] ?>
       </div>

      <li><a href="<?php echo BASE_URL; ?>login.php">Logout</a></li>


        <?php else: ?>

        <li><a href="<?php echo BASE_URL; ?>login.php">Login</a></li>

      <?php endif; ?>

    </ul>
  </div>
</nav>



