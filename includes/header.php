<header class="">
    <nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php"><h2>BetterHome<em>.</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav ml-auto">
            <!-- $getcat is initialized in index.php &  single_post.php file -->
        <?php while($category=mysqli_fetch_assoc($getcat)){ 
            if(isset($_GET['status'])){                
                if($_GET['status']=='filterctg' and $_GET['ctg']==$category['cat_name']){
                    echo '<li class="nav-item active">';
                }
                else{
                    echo '<li class="nav-item">';
                }                
            }
            else{
                echo '<li class="nav-item">';
            }
            ?>
            
            <!-- <li class="nav-item"> -->
            <a class="nav-link" href="index.php?status=filterctg&&ctg=<?php echo $category['cat_name']; ?>&&cat_id=<?php echo $category['cat_id']; ?>">
                <?php echo $category['cat_name']; ?>
            </a>
            </li> 
        <?php } ?>
            <li>
            <a class="nav-link" href="Admin/index.php">Sign In</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</header>