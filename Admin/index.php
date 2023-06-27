<?php
    include_once("class/function.php");
    $obj=new adminBlog();

    if(isset( $_POST['login'] ) ){  
        if($_POST['signin_as']=='admin'){
            $obj->admin_login($_POST);  
        } 
        elseif($_POST['signin_as']=='user'){
            $obj->user_login($_POST);  
        }                     
    }    
    // start session to access data in $_SESSION passed from function.php file which is included here.
    session_start();        
    // A variable is considered empty if it does not exist or if its value equals false.
    //  empty() does not generate a warning if the variable does not exist.
    if( !empty($_SESSION['admin_id']) ){        
        //after loged in >if someone wants to stay in login(index.php) page 
        //it won't allow you to go to index.php page again
        // redirect to dashboard.php page after coming to this login(index.php) page
        header("location:dashboard.php");
    }
?>

<?php
    include_once("includes/head.php");
?>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg my-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">LogIn</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="pass" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="sign_in_as">As</label>
                                                <select name="signin_as" class="form-control" id="sign_in_as" required>
                                                    <option value="admin">Admin</option>
                                                    <option value="user" selected>User</option>                                                    
                                                </select>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" value="Log In" name="login" class="btn btn-primary">                                                
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="user_signup.php">Need an account? SignUp!</a></div>
                                        <div class="small"><a href="../index.php">Home Page</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
            <?php include_once("includes/footer.php");?>           
        </div>
       <?php include_once("includes/script.php");?>
    </body>
</html>
