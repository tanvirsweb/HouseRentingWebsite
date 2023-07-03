
<?php
    include('class/function.php');   
    $obj=new adminBlog(); 
    // start session to access all $_SESSION data passed from function.php file.
    session_start();
    // page where we want to access session data we need to session_start() there.    
    if( empty($_SESSION['person_id']) ){
        // if someone did not log in:adminID don't exist/false: then don't let them access this page.
        //redirect them to login(index.php) page
        header("location:index.php");      
    }

    if(isset($_GET['logout'])){
        if($_GET['logout']=='logout'){
            $obj->logout();
        }
    }
    
    // include("view/manage_category_view.php");
    // header("Refresh:30;");
    //reresh page after every 30 seconds                        
    // header("Refresh:30;url=manage_category.php");                            
?>

<?php include_once("includes/head.php");?>

<body class="sb-nav-fixed">
        <?php include_once("includes/topnav.php"); ?>
        <div id="layoutSidenav">
            <?php include_once("includes/sidenav.php");?>
            <div id="layoutSidenav_content">
                <?php 
                    if(isset($view)){
                        if($view=="dashboard"){
                            include("view/dash_view.php");
                        }
                        elseif($view=="add_category"){
                            include("view/add_category_view.php");
                        }
                        elseif($view=="manage_category"){
                            include("view/manage_category_view.php");                            
                        }
                        elseif($view=="add_post"){
                            include("view/add_post_view.php");
                        }
                        elseif($view=="manage_post"){
                            include("view/manage_post_view.php");
                        }
                        elseif($view=="edit_img"){
                            include("view/edit_img_view.php");
                        }
                        elseif($view=="edit_post"){
                            include("view/edit_post_view.php");
                        }
                        elseif($view=="edit_category"){
                            include("view/edit_category_view.php");
                        }
                        elseif($view=="add_city"){
                            include("view/add_city_view.php");
                        }
                        elseif($view=="manage_city"){
                            include("view/manage_city_view.php");
                        }
                        elseif($view=="edit_city"){
                            include("view/edit_city_view.php");
                        }
                    }
                ?>
                <?php include_once("includes/footer.php"); ?>
            </div>
        </div>
        <?php include_once("includes/script.php");?>
    </body>
</html>
