
<?php
    // $posts_banner= $obj->display_post_public();
?>
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
        <?php foreach($posts as $postdata){ ?>
            <div class="item">
                <img src="upload/<?php echo $postdata['post_img']; ?>" alt="" style="height:60vh">
                <div class="item-content">
                    <div class="main-content">
                    <div class="meta-category">
                        <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                            <span><?php echo $postdata['post_title']; ?></span>
                        </a>
                    </div>                    
                    <!-- <h4>Morbi dapibus condimentum</h4>                     -->
                    <ul class="post-info">
                        <li><a href="#"><?php echo $postdata['user_name']; ?></a></li>
                        <li><a href="#"><?php echo $postdata['post_date']; ?></a></li>
                        <li><a href="#"><?php echo $postdata['rent_amount']; ?>/-</a></li>
                    </ul>
                    </div>
                </div>
            </div>
            <?php } ?>

    <!--
        <div class="item">
        <img src="assets/images/banner-item-01.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Fashion</span>
            </div>
            <a href="post-details.html"><h4>Morbi dapibus condimentum</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 12, 2023</a></li>
                <li><a href="#">12 Comments</a></li>
            </ul>
            </div>
        </div>
        </div>

        <div class="item">
        <img src="assets/images/banner-item-02.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Nature</span>
            </div>
            <a href="post-details.html"><h4>Donec porttitor augue at velit</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 14, 2023</a></li>
                <li><a href="#">24 Comments</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="item">
        <img src="assets/images/banner-item-03.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Lifestyle</span>
            </div>
            <a href="post-details.html"><h4>Best HTML Templates on TemplateMo</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 16, 2023</a></li>
                <li><a href="#">36 Comments</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="item">
        <img src="assets/images/banner-item-04.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Fashion</span>
            </div>
            <a href="post-details.html"><h4>Responsive and Mobile Ready Layouts</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 18, 2023</a></li>
                <li><a href="#">48 Comments</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="item">
        <img src="assets/images/banner-item-05.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Nature</span>
            </div>
            <a href="post-details.html"><h4>Cras congue sed augue id ullamcorper</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 24, 2023</a></li>
                <li><a href="#">64 Comments</a></li>
            </ul>
            </div>
        </div>
        </div>
        <div class="item">
        <img src="assets/images/banner-item-06.jpg" alt="">
        <div class="item-content">
            <div class="main-content">
            <div class="meta-category">
                <span>Lifestyle</span>
            </div>
            <a href="post-details.html"><h4>Suspendisse nec aliquet ligula</h4></a>
            <ul class="post-info">
                <li><a href="#">Admin</a></li>
                <li><a href="#">May 26, 2023</a></li>
                <li><a href="#">72 Comments</a></li>
            </ul>
            </div>
        </div>
        </div> -->
    </div>
    </div>
</div>