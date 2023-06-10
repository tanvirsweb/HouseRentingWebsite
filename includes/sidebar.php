<?php
    $posts=$obj->display_distince_post_tag();
?>
<div class="col-lg-4">
    <div class="sidebar">
        <div class="row">
            <!-- search -->
            <?php include_once("search.php"); ?>
            <!-- recent post -->
            <?php include_once("recentpost.php"); ?>
            <!-- category -->
            <?php                         
            include_once("category.php"); 
            ?>
            
            <div class="col-lg-12">
                <div class="sidebar-item tags">
                    <div class="sidebar-heading">
                        <h2>Tag Clouds</h2>
                    </div>
                    <div class="content">
                        <ul>
                        <?php while($postdata=mysqli_fetch_assoc($posts)){ ?>
                            <li><a href="#"><?php echo $postdata['post_tag']; ?></a></li>
                        <?php } ?>
                            <!-- <li><a href="#">#Apartment</a></li>
                            <li><a href="#">#Girls Hostel</a></li>
                            <li><a href="#">#Hostel</a></li>
                            <li><a href="#">#Land</a></li>                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>