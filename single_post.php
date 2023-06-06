<?php 
    include("admin/class/function.php");
    $obj=new adminBlog();
    $getcat=$obj->display_category();    
    
    if(isset($_GET['view'])){
        if($_GET['view']='postview'){
            $id=$_GET['id'];
            $single_post=$obj->get_post_info($id);
        }
    }
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
        // include_once("includes/cta.php");
    ?>


    <section class="blog-posts">
      <div class="container">
        <div class="row">
            <!-- all blogpost -->
          <!-- <?php include_once("includes/blogpost.php"); ?> -->
          
          <div class="col-lg-8">
          <?php if(isset($single_post)){ ?>

            <div class="all-blog-posts">
                <div class="row">                
                    <div class="col-lg-12">
                        <div class="blog-post">
                        <div class="blog-thumb">
                            <img src="upload/<?php echo $single_post['post_img'];?>" alt="">
                        </div>
                        <div class="down-content">
                            <span><?php echo $single_post['cat_name']; ?></span>
                            <a href="single_post.php?view=postview&&id=<?php echo $single_post['post_id'];?>">
                                <h4><?php echo $single_post['post_title']; ?></h4>
                            </a>
                            <ul class="post-info">
                            <li><a href="#"><?php echo $single_post['post_author']; ?></a></li>
                            <li><a href="#"><?php echo $single_post['post_date']; ?></a></li>
                            <li><a href="#"><?php echo $single_post['post_comment_count']; ?></a></li>
                            </ul>
                            <p>
                            <?php echo $single_post['post_content']; ?>
                            </p>
                            <div class="post-options">
                            <div class="row">
                                <div class="col-6">
                                <?php echo $single_post['post_tag']; ?>
                                </div>
                                <div class="col-6">
                                <ul class="post-share">
                                    <li><i class="fa fa-share-alt"></i></li>
                                    <li><a href="#">Facebook</a>,</li>
                                    <li><a href="#"> Twitter</a></li>
                                </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>            
                </div>
            </div>
            <?php } ?>
          </div>          

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