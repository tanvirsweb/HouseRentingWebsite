<?php
    if(isset($_POST['update_cat'])){
        // class object is already created inside template.php file whree this file is included.
        $msg=$obj->update_category($_POST);
    }

    if( isset($_GET['status']) && isset($_GET['id']) ){
        if($_GET['status']=='edtctg'){
            $approved=1;//get category from table category   
        }
        else{//edtctgreq
            $approved=0;//get category from category_req       
        }
        $ctgdata = $obj->get_category_byID($_GET['id'],$approved);
        $ctgdata = $ctgdata[0];
            //convert each tupple from query to an associative array each.Here we have only 1 tuple.So we don't need to use it inside while loop condition
    }
    
?>



<div class="shadow m-5 p-5">
    <h2 class="text-center">Update Category</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>    
    
    <form action="" method="POST">
        <input type="hidden" name="cat_id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">
        <input type="hidden" name="approved" value="<?php echo $approved ?>">
        <!-- approved=1-> update table 'category' , =0 -> update table 'category_req' -->

        <div class="form-group">
            <label class="mb-1" for="cat_name" >Category Name</label>
            <input name="cat_name" class="form-control py-4" id="cat_name" type="text" value="<?php if(isset($ctgdata['cat_name'])){echo $ctgdata['cat_name'];} ?>" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="cat_des">Category Description</label>
            <input name="cat_des" class="form-control py-4" id="cat_des" type="text" value="<?php if(isset($ctgdata['cat_des'])){echo $ctgdata['cat_des'];} ?>" required/>
        </div>
        <input type="submit" name="update_cat" value="Update Category" class="btn btn-primary">
    </form>
</div>