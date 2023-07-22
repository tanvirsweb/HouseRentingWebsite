<!-- <div class="container"> -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Message</h3></div>
                <div class="card-body">
                    <form action="" method="POST"> 
                        <input type="hidden" name="post_id" value="<?php if(isset($postdata['post_id'])){ echo $postdata['post_id']; } ?>">                
                        <div class="form-group">
                            <label class="small mb-1" for="user_name">Name</label>
                            <input name="user_name" class="form-control py-4" id="user_name" type="text" placeholder="Enter your name" required/>
                        </div>
                        
                        <div class="form-group">
                            <label class="small mb-1" for="inputEmailAddress">Contact Info</label>
                            <input name="user_email" class="form-control py-4" id="inputEmailAddress" type="text" placeholder="Enter contact info" required/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Text</label>
                            <textarea rows="5" name="user_pass" class="form-control py-4" id="inputPassword" type="text" placeholder="Enter text message" required></textarea>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" value="Submit" name="user_signup" class="btn btn-primary" id="submit">                                                
                        </div>
                    </form>

                </div>                
            </div>
        </div>
    </div>
<!-- </div> -->