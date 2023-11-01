<div class="col-lg-12">
    <div class="sidebar-item categories">
        <div class="sidebar-heading">
            <h2>Categories</h2>
        </div>
        <div class="content">
            <ul>                  
                <?php 
                // $allcat=$getcat; will set $allcat to null why??because it used "mysqli_fetch_assos() once.
                $allcat=$obj->display_category();
                foreach($allcat as $category){ 
                ?>
                    <li><a href="index.php?status=filterctg&&ctg=<?php echo $category['cat_name']; ?>">- <?php echo $category['cat_name']; ?> </a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>