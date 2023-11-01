<?php    
    $data = $obj->get_account_info(); 
    $data = $data[0];

    if(isset($_POST['update_account'])){
        $msg=$obj->update_account($_POST);
        echo '<script type="text/javascript">window.location.href="account_setting.php";</script>';   
    }
?>


<div class="shadow m-5 p-5">
    <h2 class="text-center">Account Info</h2>
    <div class="text-success bg-light text-center">
        <?php if(isset($msg)){echo $msg;} ?>
    </div>
<!-- enctype="multipart/form-data" we will take file input -->
    <form action="" method="POST" enctype="multipart/form-data" class="row">           

        <div class="form-group">
            <label class="mb-1" for="name">Name</label>
            <input name="name" class="form-control py-4" id="name" type="text" value="<?php if($_SESSION['person']=='admin') echo $data['admin_name']; else echo $data['user_name'];?>" required/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="email">Email</label>
            <input name="email" class="form-control py-4" id="email" type="email" value="<?php if($_SESSION['person']=='admin') echo $data['admin_email']; else echo $data['user_email'];?>" required/>
        </div>
        <div class="form-group">
            <input type="hidden" name="old_password" value="<?php if($_SESSION['person']=='admin') echo $data['admin_pass']; else echo $data['user_pass'];?>">
            <label class="mb-1" for="password">Password</label>
            <input name="password" class="form-control py-4" id="inputPassword" type="password" value="<?php if($_SESSION['person']=='admin') echo $data['admin_pass']; else echo $data['user_pass'];?>" required/>
        </div>
        <div class="form-group">            
            <label class="mb-1" for="password">Confirm Password</label>
            <input name="password" class="form-control py-4" id="rinputPassword" type="password" value="<?php if($_SESSION['person']=='admin') echo $data['admin_pass']; else echo $data['user_pass'];?>" required/>
            <div id="rtxt"></div>
        </div>
        
        <div>
            <input type="submit" id="submit" name="update_account" value="Update Account" class="btn btn-primary">
        </div>        
    </form>
</div>
<script>
    var page="account";
</script>
<?php include("includes/user_signup_password_match.php"); ?>