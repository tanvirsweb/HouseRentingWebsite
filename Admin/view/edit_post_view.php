<?php 
    // $categoryName=$obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']='editpost'){
            $id=$_GET['id'];
            $postdata=$obj->get_post_info($id);
            $postdata=mysqli_fetch_assoc($postdata);
            // Fetch a result row as an associative array:
            //convert each tupple from query to 1 associative array each.Here we have only 1 tuple.So we can use it to access info of 1 tuple.Otherwise we need to use it inside WHILE() loop condition
        }
    }

    if(isset($_POST['update_post'])){
        $msg=$obj->update_post($_POST);
    }
?>
<div class="shadow m-5 p-5">
    <h2 class="text-center">Update Post Page</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
<!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data" >  
        <input type="hidden" name="edit_post_id" value="<?php echo $id;?>">      
        <div class="form-group">
            <label class="mb-1" for="change_title">Post Title</label>
            <input name="change_title" class="form-control py-4" id="change_title" type="text" value="<?php echo $postdata['post_title'];?>" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_content">Post Content</label>
            <textarea name="change_content" class="form-control py-4" id="change_content" cols="30" rows="10"  required><?php echo $postdata['post_content'];?></textarea>
        </div>
        <div class="form-group">
            <label for="change_post_status" class="mb-1">Post Status</label>
            <!-- if you use padding in select: selected option will not be shown. -->
            <select name="change_post_status" id="change_post_status" class="form-control" required>
                <option value="1" selected="selected">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
                
        <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </form>
</div>