<?php 
    if(isset($_POST['submit_msg'])){
        $obj->add_msg($_POST);
    }
    $allmsg=$obj->get_msg($postdata['post_id']);
?>
<!-- <div class="container"> -->
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Message</h3></div>
                <div class="card-body">
                    <form action="" method="POST"> 
                        <input type="hidden" name="post_id" value="<?php if(isset($postdata['post_id'])){ echo $postdata['post_id']; } ?>">                
                        <div class="form-group">
                            <label class="small mb-1" for="name">Name</label>
                            <input name="name" class="form-control py-4" id="name" type="text" placeholder="Enter your name" required/>
                        </div>
                        
                        <div class="form-group">
                            <label class="small mb-1" for="contact_info">Contact Info</label>
                            <input name="contact_info" class="form-control py-4" id="contact_info" type="text" placeholder="Enter contact info" required/>
                        </div>
                        <div class="form-group">
                            <label class="small mb-1" for="msg">Text</label>
                            <textarea rows="5" name="msg" class="form-control py-4" id="msg" type="text" placeholder="Enter text message" required></textarea>
                        </div>
                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                            <input type="submit" value="Submit" name="submit_msg" class="btn btn-primary" id="submit">                                                
                        </div>
                    </form>

                </div>                
            </div>
        </div>
    </div>

    <?php if( !empty($allmsg[0]) ){ ?>
    <div class="card shadow-lg border-0 rounded-lg mt-5 p-5">
    <div class="row justify-content-center">    
        <div class="col-lg-12">        
            <?php foreach($allmsg as $msg){?>
                <div class="shadow my-3 p-2">
                <div class="text-start">
                    <h3><?php echo $msg['name'];?></h3>
                    <?php echo $msg['msg'];?>
                </div>
                <!-- <div class="text-end"> -->
                <div>
                <?php if(isset($msg['msg_reply'])){?>
                    <i class="fa-solid fa-reply fa-rotate-180" style="color: #3b7ef1;"></i>
                    <?php echo $msg['msg_reply'];
                }?>
                </div>
                </div>
            <?php }?>
        </div>
    </div>
    </div>
    <?php } ?>
<!-- </div> -->