
<?php
    include('class/function.php');
    
    // start session to access $_SESSION data
    session_start();
    $id=$_SESSION['adminID'];
    if($id==null){
        // if someone did not log in then don't let them access this page.
        //redirect them to login(index.php) page
        header("location:index.php");
    }
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

                    }
                ?>
                <?php include_once("includes/footer.php"); ?>
            </div>
        </div>
        <?php include_once("includes/script.php");?>
    </body>
</html>
