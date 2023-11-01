<?php 
    $posts_recent=$obj->display_post_public();
?>
<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
            <h2>Recent Posts</h2>
        </div>
        <div class="content overflow-hide-scrollbar" style="max-height: 120vh;">
            <ul>
            <?php foreach($posts_recent as $postdata){ ?>
                <li>
                    <!-- <a href="single_post.php?view=postview&&id=<?php echo $postdata['post_id'];?>"> -->
                    <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                        <h5><?php echo $postdata['post_title']; ?></h5>
                        <span><?php echo $postdata['post_date']; ?></span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>