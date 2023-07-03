<?php 
    if(isset($_POST['add_post'])){
        $msg=$obj->add_post($_POST);
    }
?>
<div class="shadow m-5 p-5">
    <h2 class="text-center">Add Post</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
<!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data" class="row">        
        <div class="form-group">
            <label class="mb-1" for="post_title">Post Title</label>
            <input name="post_title" class="form-control py-4" id="post_title" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_content">Post Content</label>
            <textarea name="post_content" class="form-control py-4" id="post_content" cols="30" rows="5" required></textarea>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
            <input name="post_img" class="py-4" id="post_img" type="file" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="rent_amount">Rent Amount</label><br>
            <input name="rent_amount" class="form-control py-4" id="rent_amount" type="number" required/>
        </div>
        
        <div class="form-group col-md-4 col-sm-4">
            <label class="mb-1" for="rent_from">Rent From</label><br>            
            <input name="rent_from" class="form-control py-4" id="rent_from" type="date" required/>             <!-- </div> -->
        </div>
        
        <div class="form-group">
            <label class="mb-1" for="city">City</label>
            <select name="city" class="form-control" id="city" required>
                <?php 
                $allcity=$obj->getAllCity();
                while($city=mysqli_fetch_assoc($allcity)){ ?>
                    <option value="<?php echo $city['city_id']; ?>">
                        <?php echo $city['city_name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_category">Select Post Category</label>
            <select name="post_category" class="form-control" id="post_category" required>
                <?php 
                $categoryName=$obj->display_category();
                while($category=mysqli_fetch_assoc($categoryName)){ ?>
                    <option value="<?php echo $category['cat_id']; ?>">
                        <?php echo $category['cat_name']; ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        
        <div class="form-group">
            <label class="mb-1" for="post_status">Post Status</label>
            <select name="post_status" class="form-control" id="post_status" required>
                <option value="1" selected="selected">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
        <div>
            <input type="submit" name="add_post" value="Add Post" class="btn btn-primary">
        </div>
    </form>
</div>