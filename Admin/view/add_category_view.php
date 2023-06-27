<?php
    if(isset($_POST['add_cat'])){
        // class object is already created inside template.php file whree this file is included.
        $msg=$obj->add_category($_POST);
    }
?>

<div class="shadow m-5 p-5">
    <h2 class="text-center">Add Category Page</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>    
    
    <form action="" method="POST">
        <input type="hidden" name="person_id" value="<?php echo $_SESSION['person_id']; ?>">
        <div class="form-group">
            <label class="mb-1" for="cat_name">Category Name</label>
            <input name="cat_name" class="form-control py-4" id="cat_name" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="cat_des">Category Description</label>
            <input name="cat_des" class="form-control py-4" id="cat_des" type="text" required/>
        </div>
        <input type="submit" name="add_cat" value="Add Category" class="btn btn-primary">
    </form>
</div>