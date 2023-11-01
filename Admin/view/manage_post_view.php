<?php
    $posts=$obj->display_post();

    if(isset($_GET['status'])){
        if($_GET['status']=='delpost'){
            $id=$_GET['id'];
            $delimg_name=$_GET['deltimg_name'];
            $msg=$obj->delete_post($id,$delimg_name);  
            
            if(!headers_sent()){//if header is not send redirect using php function header();else use JS
                header('Location:manage_post.php');
            }
            else{
                echo '<script type="text/javascript">window.location.href="manage_post.php";</script>';
            }
        }
    }
?>

<div class="shadow m-5 p-5">
    <h2 class="text-center">Manage Post</h2>
    <!-- CREATE VIEW post_with_ctg AS SELECT post_id,post_title,post_content,post_img,post_author,post_date,post_comment_count,post_summery,post_tag,post_status,cat_id,cat_name FROM posts INNER JOIN category ON posts.post_ctg=category.cat_id; -->
    <div class="table-responsive">
        <table class="table">
        <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Thumb</th>
                    <th>Author</th>
                    <th>Rent From</th>
                    <th>Post Date</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($posts as $postdata){ ?>
                    <tr>
                        <td><?php echo $postdata['post_id']; ?></td>
                        <td><?php echo $postdata['post_title']; ?></td>
                        <td><?php echo $postdata['post_content']; ?></td>
                        <td>
                            <img height="100px" src="../upload/<?php echo $postdata['post_img']; ?>" alt="">
                            <br>
                            <a href="edit_img.php?status=editimg&&id=<?php echo $postdata['post_id']; ?>&&editimg_name=<?php echo $postdata['post_img']; ?>">Change</a>
                        </td>
                        <td><?php echo $postdata['user_name']; ?></td>
                        <td><?php echo $postdata['rent_from']; ?></td>
                        <td><?php echo $postdata['post_date']; ?></td>
                        <td><?php echo $postdata['cat_name']; ?></td>
                        <td><?php if( $postdata['post_status']==1) echo 'Published'; else echo 'Unpublished'; ?></td>
                        <td>
                            <a class="btn btn-primary m-1" href="edit_post.php?status=editpost&&id=<?php echo $postdata['post_id']; ?>">Edit</a><br>
                            <a class="btn btn-danger m-1" href="?status=delpost&&id=<?php echo $postdata['post_id']; ?>&&deltimg_name=<?php echo $postdata['post_img']; ?>">Delete</a>
                            <!-- reload to this same page.with parameters status,id,delimg_name -->
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>