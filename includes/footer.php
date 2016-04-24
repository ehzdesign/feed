

<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">

  <?php if (basename($_SERVER['PHP_SELF']) == 'index.php'): ?>

    <a href="<?php echo BASE_URL;?>admin/add-post.php " class="btn-floating btn-large waves-light waves-effect grey darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="add post">
      <i class="large material-icons">add</i>
    </a>

  <?php else: ?>

    <a href="<?php echo BASE_URL;?>index.php " class="btn-floating btn-large waves-light waves-effect grey darken-3 tooltipped" data-position="left" data-delay="50" data-tooltip="feed">
      <i class="large material-icons">dashboard</i>
    </a>

    <?endif;?>

  </div>

  <!-- footer -->

   <footer class="page-footer grey darken-2">
          <div class="footer-copyright">
            <div class="container">
            © 2016 4Pixels  -  Erick Hernandez
            </div>
          </div>
        </footer>
  <!-- end of footer -->


  <script type="text/javascript" src="<?php echo BASE_URL; ?>js/bin/materialize.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBpF73qCXwqPRA-wuYhzcHmvxTGDgXJ-c4&libraries=places"></script>

  <script>
    $( document ).ready(function() {
    //make flyout nav work
    $(".button-collapse").sideNav();


      //location autocomplete google places
      var input = document.getElementById('pac-input');
      var autocomplete = new google.maps.places.Autocomplete(input);

      //set preview image of post
      function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#image").change(function(){
        readURL(this);
      });

      //set hover effect on post items on home and admin page
      var elems = $('.col--home');
      elems.on('mouseenter mouseleave', function(e) {
        elems.not(this).stop(true).fadeTo('fast', e.type=='mouseenter'?0.7:1);
      });

      $('.edit-profile-image-modal').leanModal();

    });

    //set value for text area on edit post for body of post

    var my_var = "<?php echo $item['body']; ?>";

    $('.materialize-textarea').val(my_var);
    $('.materialize-textarea').trigger('autoresize');


  </script>

</body>
</html>