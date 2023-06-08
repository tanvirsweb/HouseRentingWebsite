<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='editimg'){
            $id=$_GET['id'];
            $editimg_name=$_GET['editimg_name'];
        }

        // action="" -> when form of this page is submitted it will redirect to this page.As name of page is not written.
        if(isset($_POST['change_img_btn'])){
            // $msg=$obj->edit_img($_POST);
            $Arr=$obj->edit_img($_POST);                        
            // after updating image: it has new image.If you want to update image again from same page-> using previous imagename error would occur.New image will be uploaded but this one will remain.                        
            $editimg_name=$Arr['imgname'];
            $msg=$Arr['msg'];                            
        }
    }
?>

<div class="shadow m-5 p-5">   
    <div class="text-success text-center bg-light">
        <?php if(isset($msg)){echo $msg."\n";} ?>
    </div> 
    <!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="editimg_id" value="<?php echo $id; ?>" />
        <input type="hidden" name="editimg_name" value="<?php echo $editimg_name; ?>" />
        <!-- when form is submitted value of edit_id will be passed.We don't want to show this value in this form.Hence it's type is 'hidden' -->
        <div class="form-group">
            <label class="mb-1" for="change_img">Change Thumbnail</label>
            <br>
            <input name="change_img" class="py-4" id="change_img" type="file" required/>
        </div>        
        <input type="submit" name="change_img_btn" value="Change Thumbnail" class="btn btn-primary">
    </form>
    <br> 
    <br>
</div>