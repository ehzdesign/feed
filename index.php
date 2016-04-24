<?php require_once('includes/config.php') ?>
<?php include(ROOT_PATH . 'includes/header.php') ?>
<?php include('database/database-connect.php') ?>

<?php

//query your table for all results from posts table
$result = $db_connection->query('SELECT * FROM Post');

?>
<section id="home">
<div class="row">
    <div class="col s12 banner">
     <!--  <div class="overlay"></div> -->

       <div class="row">
        <h1 class="site-title center-align">FEEDME</h1>
        <h4 class="site-title sub center-align">a collection of wonderful foodie experiences</h4>
      </div>
      </div>
    </div>
  <main class="container main-content">
  <div class="row">
    <h5>recent posts</h5>
  </div>
    <div class="row">
      <!-- use to gran individual information from each post -->
      <?php while ($item = $result->fetch_assoc()): ?>


        <a href="post.php?ID=<?php echo $item['ID'] ?>">

          <div class="col s12 m6 l4 col--home">

           <div class="post-container--home">

            <div class="overlay"></div>


            <?php if(!empty($item['image'])): ?>

              <div class="post--home" style="background-image:url(uploads/<?php echo $item['image']?>)">

              <?php else: ?>

                <div class="post--home" style="background-image:url(images/placeholder.jpg">

                <?php endif; ?>

                <p class="post-title"><?php echo $item['title']; ?></p>

                <?php

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


                <div class="chip grey lighten-4">
                 <img class="responsive-img" src="uploads/user_image/<?php echo $post_user['profile_image']?>" alt="profile image">
                 <?php echo '@' . $post_user['username']; ?>
               </div>


             </div>

           </div>

         </div>

       </a>


     <?php endwhile; ?>
   </div>
 </main>
</section>



<?php include(ROOT_PATH . 'includes/footer.php') ?>