<?php 
    $categoryName=$obj->display_category();
?>

<?php 
    if(isset($_POST['add_post'])){
        $msg=$obj->add_post($_POST);
    }
?>
<div class="shadow m-5 p-5">
    <h2 class="text-center">Add Post Page</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
<!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data" >        
        <div class="form-group">
            <label class="mb-1" for="post_title">Post Title</label>
            <input name="post_title" class="form-control py-4" id="post_title" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_content">Post Content</label>
            <textarea name="post_content" class="form-control py-4" id="post_content" cols="30" rows="10" required></textarea>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
            <input name="post_img" class="py-4" id="post_img" type="file" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_category">Select Post Category</label>
            <select name="post_category" class="form-control py-4" id="post_category" required>
                <?php while($category=mysqli_fetch_assoc($categoryName)){ ?>
                <option value="<?php echo $category['cat_id']; ?>">
                    <?php echo $category['cat_name']; ?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_summery">Post Summary</label>
            <input name="post_summery" class="form-control py-4" id="post_summery" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_tag">Post Tags</label>
            <input name="post_tag" class="form-control py-4" id="post_tag" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_status">Post Status</label>
            <select name="post_status" class="form-control py-4" id="post_status" required>
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
        <input type="submit" name="add_post" value="Add Post" class="btn btn-primary">
    </form>
</div>