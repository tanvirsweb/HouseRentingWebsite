<?php
    include_once("class/function.php");
    $obj=new adminBlog();

    if(isset( $_POST['user_signup'] ) ){         
        $rmsg=$obj->user_signup($_POST);        
    }    

    // start session to access data in $_SESSION passed from function.php file which is included here.
    session_start();        
    // A variable is considered empty if it does not exist or if its value equals false.
    //  empty() does not generate a warning if the variable does not exist.
    if( !empty($_SESSION['person_id']) ){        
        //after loged in >if someone wants to stay in login(index.php) page 
        //it won't allow you to go to index.php page again
        // redirect to dashboard.php page after coming to this login(index.php) page
        header("location:account_setting.php");
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
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">SignUp</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="user_name">Name</label>
                                                <input name="user_name" class="form-control py-4" id="user_name" type="text" placeholder="Enter your name" required/>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input name="user_email" class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input name="user_pass" class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="rinputPassword">Confirm Password</label>
                                                <input name="ruser_pass" class="form-control py-4" id="rinputPassword" type="password" placeholder="Enter password" required/>
                                                <div id="rtxt"></div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div> -->
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <input type="submit" value="Sign Up" name="user_signup" class="btn btn-primary" id="submit">                                                
                                            </div>
                                        </form>

                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="text-success"><?php if(isset($rmsg)){ echo $rmsg;}?></div>
                                        <div class="small"><a href="index.php">Already have an account? SignIn!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <br>
                <br>                
            </div>
            
            <?php include_once("includes/footer.php");?>
            
        </div>
       <?php include_once("includes/script.php");?>
        <script>var page="signup"; </script>
       <?php include("includes/user_signup_password_match.php"); ?>
    <!-----------------Match Password-------------->
    <!-- <script>        
        const passwordReInput = document.getElementById('rinputPassword');
        const passwordInput=document.getElementById('inputPassword');
        
        const submitBtn=document.getElementById("submit");
        submitBtn.disabled = true;

        // check if password matches
        passwordReInput.addEventListener('input', function(event) {
        // Handle the input event here
            let v1=event.target.value;
            let v2=passwordInput.value;
            document.getElementById('rinputPassword').style.visibility='visible';
            if(v1==v2)
            {                
                document.getElementById('rtxt').innerHTML="";
                submitBtn.disabled = false;
            }
            else{                                
                document.getElementById('rtxt').innerHTML="pass word did not matched !!";
                submitBtn.disabled = true;
            }
                        
        });
    </script> -->

    </body>
</html>
