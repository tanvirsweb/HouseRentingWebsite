<?php 
    include("admin/class/function.php");
    $obj=new adminBlog();
    $getcat=$obj->display_category();        
?>
<?php
  include_once("includes/head.php");
?>
  <body>

    <!-- ***** Preloader Start ***** -->
   <?php
        include_once("includes/preloader.php");
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
    <!-- call to action -->
    <?php
        include_once("includes/cta.php");
    ?>


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