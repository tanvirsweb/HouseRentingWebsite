<?php 

    if(isset($_GET['view']) && isset($_GET['id'])){
        if($_GET['view']=='postview'){
            $posts=$obj->get_post_info($_GET['id']);
            // $posts=$obj->display_post_public();
        }
    }
    else{
        $posts=$obj->display_post();
        // inside blogpost.php file we will use $posts to display blog posts.
    } 

    if(isset($_GET['status'])){
        if($_GET['status']=='del'){
            $obj->del_msg($_GET['msg_id']);            
        }
    }

?>
<section class="blog-posts">
<div class="container">    
<div class="row">
    <div class="all-blog-posts col-11 col-md-10 mx-auto">

        <div class="row">
        <?php         
        if( empty($posts[0]) ){
            echo '<h2 class="text-center">You have not posted anything</h2>';
        }
        foreach($posts as $postdata){ 
            $post_id=$postdata['post_id'];
            ?>
            <div class="col-lg-12">
                <div class="blog-post shadow">
                <div class="blog-thumb">
                    <img src="../upload/<?php echo $postdata['post_img'];?>" alt="">
                </div>
                <div class="down-content">
                    <span><?php echo $postdata['cat_name']; ?></span>
                    <!-- <a href="single_post.php?view=postview&&id=<?php echo $postdata['post_id'];?>"> -->
                    <a href="dashboard.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                        <h4><?php echo $postdata['post_title']; ?></h4>
                    </a>
                    <ul class="post-info">
                    <li><a href="#"><?php echo $postdata['user_name']; ?></a></li>
                    <li><a href="#"><?php echo $postdata['rent_from']; ?></a></li>
                    <li><a href="#"><?php echo $postdata['rent_amount']; ?>/-</a></li>
                    </ul>
                    <p>
                    <?php echo $postdata['post_content']; ?>
                    </p>
                    <div class="post-options">
                    <div class="row">
                        <div class="col-4">
                        <?php echo $postdata['city_name']; ?>
                        </div>
                        <div class="col-4 text-center">
                            <a id="msg_click" href="dashboard.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                            <i class="fa-regular fa-message fa-lg"></i> Message
                            </a>
                        </div>
                        <div class="col-4 text-end">
                            <a href=""><i class="fa-solid fa-envelope fa-lg"></i> <?php echo $postdata['user_email'];?></a> 
                        <!-- <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"><i class="bi bi-envelope"> </i> Twitter </a></li>                          
                        </ul> -->
                        </div>
                    </div>
                    </div>                    
                </div>
                </div>
            </div>
            <div class="col-lg-12">
                <?php if(isset($_GET['view'])){ include('msg.php');} ?>
            </div>
        <?php } ?>
        </div>
    </div>    
</div>
</div>
</section>
