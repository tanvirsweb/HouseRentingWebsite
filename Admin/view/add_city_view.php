<?php
    if(isset($_POST['add_city'])){
        // class object is already created inside template.php file whree this file is included.
        $msg=$obj->add_city($_POST);
    }
?>

<div class="shadow m-5 p-5">
    <h2 class="text-center">Add City</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>    
    
    <form action="" method="POST">
        <input type="hidden" name="person_id" value="<?php echo $_SESSION['person_id']; ?>">
        <div class="form-group">
            <label class="mb-1" for="city_name">City Name</label>
            <input name="city_name" class="form-control py-4" id="city_name" type="text" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_code">Post/ZIP Code</label>
            <input name="post_code" class="form-control py-4" id="post_code" type="number" required/>
        </div>
        <input type="submit" name="add_city" value="Add City" class="btn btn-primary">
    </form>
</div>