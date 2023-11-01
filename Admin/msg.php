<?php 
    if(isset($_POST['submit_msg'])){        
        $obj->reply_msg($_POST); ?>       
        <script type="text/javascript">window.location.href="dashboard.php?view=postview&&id=<?php $post_id ?>;</script>        
<?php
    }    
?>

<?php 
$allmsg=$obj->get_msg($postdata['post_id']);
if( 1 ){ ?>
    <div class="card shadow-lg border-0 rounded-lg mt-5 p-5">
    <div class="row justify-content-center">    
    <div class="col-lg-12">        
        <?php foreach($allmsg as $msg){?>
            <div class="shadow my-3 p-3">
                <div class="text-start">
                    <h3><?php echo $msg['name'];?></h3>
                    <?php echo $msg['msg'];?>
                </div>            
                <div>            
                    <i class="fa-solid fa-reply fa-rotate-180" style="color: #3b7ef1;"></i>
                    <form action="" method="POST" class="form-row"> 
                        <input type="hidden" name="msg_id" value="<?php if(isset($msg['msg_id'])){ echo $msg['msg_id']; } ?>">                
                        <div class="col-10">
                            <!-- <label class="small mb-1" for="msg_reply">Reply</label> -->
                            <input name="msg_reply" class="form-control py-4" id="msg_reply" type="text" placeholder="Reply" value="<?php if(isset($msg['msg_reply'])){ echo $msg['msg_reply'];} ?>" required/>
                        </div>                    
                        <input type="submit" value="Reply" name="submit_msg" class="btn btn-primary mb-2" id="submit">                                                                    
                    </form>                                                    
                </div>
                <div class="text-end">
                    <a href="?status=del&&msg_id=<?php echo $msg['msg_id']?>"><i class="fa-regular fa-trash-can fa-lg"></i></a> 
                </div>
            </div>
        <?php }?>
    </div>
    </div>
    </div>
<?php }
else{
    echo "There Is No Message !!";
}
?>

