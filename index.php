<?php 
    include("admin/class/function.php");
    $obj=new adminBlog();
    $getcat=$obj->display_category();        
    // inside header.php file we will we $getcat values to show categories in navbar.

    if(isset($_GET['status']) && isset($_GET['ctg'])){
          $posts=$obj->display_post_public_by_category($_GET['ctg']);        
    }
    elseif(isset($_GET['view']) && isset($_GET['id'])){
      if($_GET['view']=='postview'){
          $posts=$obj->get_post_info($_GET['id']);
      }
    }
    else{
      $posts=$obj->display_post_public();
      // inside blogpost.php file we will use $posts to display blog posts.
    }    

?>

<?php
  include_once("includes/head.php");
?>
  <body>

    <!-- ***** Preloader Start ***** -->
   <?php
        // include_once("includes/preloader.php");
   ?>    
    <!-- Header -->
    <?php
        include_once("includes/header.php");
    ?>

    <!-- Page Content -->
    
    <!-- Banner Starts Here(slide) -->
    <?php
        include_once("includes/banner.php");
    ?>
    <!-- call to action  download ..-->

    <?php
        // include_once("includes/cta.php");
    ?>
    <?php 
      if(empty($_GET['view'])){
        include_once('includes/filter_search.php'); 
      }
    ?>
    <br>
    <br>
    <hr>

    

    <section class="blog-posts">
      <div class="container">
        
        <div class="row">
            <!-- all blogpost -->
          <?php include_once("includes/blogpost.php"); ?>
          <!-- sidebar -->
          <?php include_once("includes/sidebar.php"); ?>
        </div>
      </div>
    </section>

    
    <!-- Footer -->
    <?php include_once("includes/footer.php"); ?>

    <!-- scripts -->
    <?php include_once("includes/script.php"); ?>

  </body>
</html>