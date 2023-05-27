<?php
    //inside template.php object of Blog is created
    $catdata=$obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
            $delid=$_GET['delid'];
            $del_msg=$obj->delete_category_byID($delid);
            //set a header to instruct the browser to call the page every 30 sec
            // header("Refresh: 30;");
                        
            // header("Refresh:0;url=manage_category.php");
            // error occur if you try to access header() from this file

            // it will automatically refresh in 0 seconds, you can change time in refresh
            // hence after deleting a tuple we can see the updated page

//    
        }
    }
?>


<div class="container">
    <h2 class="text-center mb-3">Manage Category Page</h2>
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
        <!-- take a while loop
        query returns tuples.
        To get each attribute of each tuple in an array use mysqli_fetch_assoc($catdata) -->
            <?php while($cat=mysqli_fetch_assoc($catdata)){ ?>
                <tr>
                    <td> <?php echo $cat['cat_id']; ?> </td>
                    <td> <?php echo $cat['cat_name']; ?> </td>
                    <td> <?php echo $cat['cat_des']; ?> </td>
                    <td>
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="?status=delete&&delid=<?php echo $cat['cat_id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>