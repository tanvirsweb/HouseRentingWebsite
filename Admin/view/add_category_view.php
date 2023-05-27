<?php
    if(isset($_POST['add_cat'])){
        // class object is already created inside template.php file whree this file is included.
        $return_msg=$obj->add_category($_POST);
    }
?>

<h2 class="text-center">Add Category Page</h2>
<h4 class="text-center text-primary">
    <?php if(isset($return_msg)){ echo $return_msg; } ?>
</h4>

<form action="" method="POST" class="container">
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input name="cat_name" class="form-control py-4" id="cat_name" type="text" required/>
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category Description</label>
        <input name="cat_des" class="form-control py-4" id="cat_des" type="text" required/>
    </div>
    <input type="submit" name="add_cat" value="Add Category" class="form-control btn btn-primary">
</form>