<?php 
    // $posts=$obj->display_post_public();
?>
<div class="col-lg-8 overflow-hide-scrollbar" style="max-height: 235vh;">
    <div class="all-blog-posts">
        <div class="row">
        <?php foreach($posts as $postdata){ 
            $post_id=$postdata['post_id'];
            ?>
            <div class="col-lg-12">
                <div class="blog-post shadow">
                <div class="blog-thumb">
                    <img src="upload/<?php echo $postdata['post_img'];?>" alt="">
                </div>
                <div class="down-content">
                    <span><?php echo $postdata['cat_name']; ?></span>
                    <!-- <a href="single_post.php?view=postview&&id=<?php echo $postdata['post_id'];?>"> -->
                    <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
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
                            <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
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
