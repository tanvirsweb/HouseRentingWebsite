<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">tanvirsweb</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>
    <!-- Navbar-->
    
    <ul class="navbar-nav ml-auto ml-md-0">
        <li>
            <!-- Example single danger button -->
            <div class="btn-group">            
            <a role="button" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- <i class="fas fa-user fa-fw"></i> -->
            Action
            </a>            
            <ul class="dropdown-menu  dropdown-menu-end">
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><a class="dropdown-item" href="#">Activity Log</a></li>                
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="?adminlogout=logout">Logout</a></li>
            </ul>
            </div>
        </li>
        <!-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="?adminlogout=logout">Logout</a> -->
                <!-- redirect to this same page with parameter: adminlogout=logout 
                cehck it on template.php file where this file is included
                and redirect to login page(index.php)
                -->
            <!-- </div>
        </li> -->
        
    </ul>
</nav>