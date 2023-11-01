<?php 
    // $categoryName=$obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']='editpost'){
            $id=$_GET['id'];
            $postdata=$obj->get_post_info($id);
            $postdata= $postdata[0];
            // Fetch a result row as an associative array:
            //convert each tupple from query to 1 associative array each.Here we have only 1 tuple.So we can use it to access info of 1 tuple.Otherwise we need to use it inside WHILE() loop condition
        }
    }

    if(isset($_POST['update_post'])){
        $msg=$obj->edit_post($_POST);
        $postdata=$obj->get_post_info($id);
        $postdata= $postdata[0];
    }
?>


<div class="shadow m-5 p-5">
    <h2 class="text-center">Update Post</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
<!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data" class="row"> 
    <input type="hidden" name="edit_post_id" value="<?php echo $id;?>">          
        <div class="form-group">
            <label class="mb-1" for="post_title">Post Title</label>
            <input name="post_title" class="form-control py-4" id="post_title" type="text" value="<?php echo $postdata['post_title'];?>" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_content">Post Content</label>
            <textarea name="post_content" class="form-control py-4" id="post_content" cols="30" rows="5" required> <?php echo $postdata['post_content'];?> </textarea>
        </div>
        <!-- <div class="form-group">
            <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
            <input name="post_img" class="py-4" id="post_img" type="file" required/>
        </div> -->
        <div class="form-group">
            <label class="mb-1" for="rent_amount">Rent Amount</label><br>
            <input name="rent_amount" class="form-control py-4" id="rent_amount" type="number" value="<?php echo $postdata['rent_amount'];?>" required/>
        </div>
        
        <div class="form-group col-md-4 col-sm-4">
            <label class="mb-1" for="rent_from">Rent From</label><br>            
            <input name="rent_from" class="form-control py-4" id="rent_from" type="date" value="<?php echo $postdata['rent_from'];?>" required/>             <!-- </div> -->
        </div>
        
        <div class="form-group">
            <label class="mb-1" for="city">City</label>
            <select name="city" class="form-control" id="city" required>
                <?php 
                $allcity=$obj->getAllCity();
                foreach($allcity as $city){ 
                    if($postdata['city_id']==$city['city_id']){ ?>
                        <option value="<?php echo $city['city_id']; ?>" selected>
                    <?php } else{?>
                        <option value="<?php echo $city['city_id']; ?>">
                        <?php } echo $city['city_name']; ?>
                        </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_category">Select Post Category</label>
            <select name="post_category" class="form-control" id="post_category" required>
                <?php
                $categoryName=$obj->display_category();
                foreach($categoryName as $category){ 
                     if($postdata['cat_id']==$category['cat_id']){ ?>
                        <option value="<?php echo $category['cat_id']; ?>" selected>
                    <?php } else{ ?>
                        <option value="<?php echo $category['cat_id']; ?>">                    
                            <?php } echo $category['cat_name']; ?>
                        </option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label class="mb-1" for="post_status">Post Status</label>
            <select name="post_status" class="form-control" id="post_status" required>
                <?php if($postdata['post_status']==1){ ?>
                    <option value="1" selected="selected">Published</option>
                    <option value="0">Unpublished</option>
                <?php }else{ ?>
                    <option value="1">Published</option>
                    <option value="0" selected="selected">Unpublished</option>
                <?php } ?>
            </select>
        </div>
        <div>
            <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
        </div>
    </form>
</div>