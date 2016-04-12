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
      <a href="#" class="brand-logo">FEEDME</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="<?php echo BASE_URL; ?>index.php">Home</a></li>
        <li><a href="<?php echo BASE_URL; ?>admin/admin.php">Admin</a></li>
        <li><a href="<?php echo BASE_URL; ?>login.php">Login</a></li>
      </ul>
       <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Home</a></li>
        <li><a href="badges.html">Admin</a></li>
        <li><a href="collapsible.html">Login</a></li>
      </ul>
    </div>
  </nav>

