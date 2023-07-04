<?php
    //inside template.php object of Blog is created
    $catdata=$obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']=='delctg'){
            $del_msg=$obj->delete_category_byID($_GET['delid'],1);
        }
        elseif($_GET['status']=='delctgreq'){
            $del_msg=$obj->delete_category_byID($_GET['delid'],0);
        }
        elseif($_GET['status']=='apvctg'){
            $msg=$obj->approve_category($_GET['id']);

        }
                
        //set a header to instruct the browser to call the page every 30 sec
        // header("Refresh: 30;");
                    
        // header("Refresh:0;url=manage_category.php");
        // error occur if you try to access header() from this file

        // it will automatically refresh in 0 seconds, you can change time in refresh
        // hence after deleting a tuple we can see the updated page
        if(!headers_sent()){//if header is not send redirect using php function header();else use JS
            header('Location:manage_category.php');
        }
        else{
            echo '<script type="text/javascript">window.location.href="manage_category.php";</script>';
        }        
    }
?>

<div class="shadow m-5 p-5">
    <h2 class="text-center mb-3">Manage Category</h2>
    <h4 class="text-center text-danger mb-3">
        <?php if(isset($del_msg)){echo $del_msg;} ?>
    </h4>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <?php if($_SESSION['person']=='admin'){?>
                    <th>Action</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
        <!-- take a while loop
        query returns tuples.
        To get each attribute of each tuple in an array use mysqli_fetch_assoc($catdata) -->
            <?php //while($cat=mysqli_fetch_assoc($catdata)){ 
                foreach($catdata as $cat){ ?>
                <tr>
                    <td> <?php echo $cat['cat_id']; ?> </td>
                    <td> <?php echo $cat['cat_name']; ?> </td>
                    <td> <?php echo $cat['cat_des']; ?> </td>
                    <td>
                        <?php if($_SESSION['person']=='admin'){?>
                        <a href="edit_category.php?status=edtctg&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delctg&&delid=<?php echo $cat['cat_id']; ?>" class="btn btn-danger m-1">Delete</a>
                        <?php } ?>
                        
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="shadow m-5 p-5">
    <h2 class="text-center mb-3">Requested Category</h2>
    <h4 class="text-center text-danger mb-3">
        <?php if(isset($del_msg)){echo $del_msg;} ?>
    </h4>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Category Description</th>                
                <th>Action</th>                
            </tr>
        </thead>
        <tbody>       
            <?php 
            $catdata=$obj->display_category_req();
            foreach($catdata as $cat){ ?>
                <tr>
                    <td> <?php echo $cat['cat_id']; ?> </td>
                    <td> <?php echo $cat['cat_name']; ?> </td>
                    <td> <?php echo $cat['cat_des']; ?> </td>
                    <td>
                        <?php if($_SESSION['person']=='admin'){ ?>
                        <a href="?status=apvctg&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-success m-1">Approve</a>                    
                        <?php } ?>
                        <a href="edit_category.php?status=edtctgreq&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delctgreq&&delid=<?php echo $cat['cat_id']; ?>" class="btn btn-danger m-1">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>