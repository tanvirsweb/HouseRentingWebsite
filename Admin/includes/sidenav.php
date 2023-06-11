<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                
                <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_category.php">Add Category</a>
                        <a class="nav-link" href="manage_category.php">Manage Category</a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutsx" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayoutsx" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="add_post.php">Add Post</a>
                        <a class="nav-link" href="manage_post.php">Manage Post</a>
                    </nav>
                </div> -->

                <!-- ---------- -->   
                <ul class="list-unstyled">
                    <li class="mb-1 ms-2">
                        <div class="btn
                        text-white
                         btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#category-collapse" aria-expanded="true">
                         Category
                        </div>
                        <div class="collapse" id="category-collapse">
                        <ul class="list-unstyled btn-toggle-nav fw-normal  ms-2 pb-1 small">
                            <li><a class="nav-link" href="add_category.php">Add Category</a></li>
                            <li><a class="nav-link" href="manage_category.php">Manage Category</a></li>                            
                        </ul>
                        </div>
                    </li>
                </ul>
             
                <ul class="list-unstyled">
                    <li class="mb-1 ms-2">
                        <div class="btn
                        text-white
                         btn-toggle align-items-center collapsed" data-bs-toggle="collapse" data-bs-target="#post-collapse" aria-expanded="true">
                         Post
                        </div>
                        <div class="collapse" id="post-collapse">
                        <ul class="list-unstyled btn-toggle-nav fw-normal  ms-2 pb-1 small">
                            <li><a class="nav-link" href="add_post.php">Add Post</a></li>
                            <li><a class="nav-link" href="manage_post.php">Manage Post</a></li>                            
                        </ul>
                        </div>
                    </li>
                </ul>
                <!-- ---------- -->
                             
            </div>
        </div>
        <div class="sb-sidenav-footer">            
            <div class="small">Logged in as:</div>
            <?php 
            if(isset($_SESSION['admin_name'])){ echo $_SESSION['admin_name']; }     
            ?>
        </div>
    </nav>
</div>