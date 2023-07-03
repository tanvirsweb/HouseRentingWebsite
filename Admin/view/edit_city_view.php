<?php
    if(isset($_POST['update_city'])){
        // class object is already created inside template.php file whree this file is included.        
        $msg=$obj->update_city($_POST);
    }
    if( isset($_GET['status']) && isset($_GET['id']) ){        
        if($_GET['status']=='edtcity')          
            $approved=1;        
        else //if($_GET['status']=='edtcityreq'){   
            $approved=0;                    
        $ctgdata=mysqli_fetch_assoc( $obj->get_City_byID($_GET['id'],$approved) );
    }
?>

<div class="shadow m-5 p-5">
    <h2 class="text-center">Update City</h2>
    <div class="container text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>    
    
    <form action="" method="POST">
        <input type="hidden" name="city_id" value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">
        <input type="hidden" name="approved" value="<?php echo $approved ?>">
        <!-- tell if city/city_req table is to be modified? approved==1 -> city , ==0 -> city_req -->
        <div class="form-group">
            <label class="mb-1" for="city_name" >City Name</label>
            <input name="city_name" class="form-control py-4" id="city_name" type="text" value="<?php if(isset($ctgdata['city_name'])){echo $ctgdata['city_name'];} ?>" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="post_code">Post/ZIP Code</label>
            <input name="post_code" class="form-control py-4" id="post_code" type="text" value="<?php if(isset($ctgdata['post_code'])){echo $ctgdata['post_code'];} ?>" required/>
        </div>
        <input type="submit" name="update_city" value="Update City" class="btn btn-primary">
        
    </form>
</div>