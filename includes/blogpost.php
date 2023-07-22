<?php 
    // $posts=$obj->display_post_public();
?>
<div class="col-lg-8">
    <div class="all-blog-posts">
        <div class="row">
        <?php while($postdata=mysqli_fetch_assoc($posts)){ ?>
            <div class="col-lg-12">
                <div class="blog-post shadow">
                <div class="blog-thumb">
                    <img src="upload/<?php echo $postdata['post_img'];?>" alt="">
                </div>
                <div class="down-content">
                    <span><?php echo $postdata['cat_name']; ?></span>
                    <!-- <a href="single_post.php?view=postview&&id=<?php echo $postdata['post_id'];?>"> -->
                    <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                        <h4><?php echo $postdata['post_title']; ?></h4>
                    </a>
                    <ul class="post-info">
                    <li><a href="#"><?php echo $postdata['user_name']; ?></a></li>
                    <li><a href="#"><?php echo $postdata['rent_from']; ?></a></li>
                    <li><a href="#"><?php echo $postdata['rent_amount']; ?>/-</a></li>
                    </ul>
                    <p>
                    <?php echo $postdata['post_content']; ?>
                    </p>
                    <div class="post-options">
                    <div class="row">
                        <div class="col-4">
                        <?php echo $postdata['city_name']; ?>
                        </div>
                        <div class="col-4 text-center">
                        <a href="index.php?view=postview&&id=<?php echo $postdata['post_id'];?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                            </svg>                            
                            Message
                        </a>
                        </div>
                        <div class="col-4">
                        <ul class="post-share">
                            <!-- <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"><i class="bi bi-envelope"> </i> Twitter </a></li> -->
                            <li><a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
                                </svg>                                   
                                <?php echo $postdata['user_email'];?></a> </li>                            
                        </ul>
                        </div>
                    </div>
                    </div>                    
                </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <?php if(isset($_GET['view'])){ include('msg.php');} ?>
</div>
