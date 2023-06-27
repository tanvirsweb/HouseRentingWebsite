<?php
    // $posts=$obj->display_distinct_post_tag();
    $posts=$obj->getAllCity();
?>
<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <!-- search -->
            <!-- <?php include_once("search_sidebar.php"); ?> -->
            <!-- recent post -->
            <?php include_once("recentpost.php"); ?>
            <!-- category -->
            <?php                         
            include_once("category.php"); 
            ?>
            
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>City</h2>
                    </div>
                    <div class="content">
                        <ul>
                        <?php while($postdata=mysqli_fetch_assoc($posts)){ ?>
                            <li><a href="#"><?php echo $postdata['city_name']; ?></a></li>
                        <?php } ?>                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>