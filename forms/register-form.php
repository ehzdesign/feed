<?php
require_once('../includes/config.php');
//check directory path
include(ROOT_PATH . 'database/database_connect.php');


session_start();
$_SESSION["favcolor"] = "green";
$_SESSION["favanimal"] = "cat";

if(isset($_SESSION['user'])!="")
{
 header("Location: index.php");
}

if(isset($_POST['btn-signup']))
{
 $uname = mysql_real_escape_string($_POST['uname']);
 $email = mysql_real_escape_string($_POST['email']);
 $upass = md5(mysql_real_escape_string($_POST['pass']));

 if(mysql_query("INSERT INTO users(username,email,password) VALUES('$uname','$email','$upass')"))
 {
  ?>
        <script>alert('successfully registered ');</script>
        <?php
 }
 else
 {
  ?>
        <script>alert('error while registering you...');</script>
        <?php
 }
}




?>