<?php 
    $posts=$obj->display_post_public();
    if(isset($_GET['status'])){
        if($_GET['status']=='delpost'){
            $id=$_GET['id'];
            $delimg_name=$_GET['deltimg_name'];
            $msg=$obj->delete_post($id,$delimg_name);  
            
            if(!headers_sent()){//if header is not send redirect using php function header();else use JS
                header('Location:dashboard.php');
            }
            else{
                echo '<script type="text/javascript">window.location.href="dashboard.php";</script>';
            }
        }
    }
?>

<main>
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
     
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable(All Posts)
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>Content</th>
                            <th>Thumb</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Post Title</th>
                            <th>Content</th>
                            <th>Thumb</th>
                            <th>Author</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while($postdata=mysqli_fetch_assoc($posts)){ ?>
                        <tr>
                            <td><?php echo $postdata['post_id']; ?></td>
                            <td><?php echo $postdata['post_title']; ?></td>
                            <td><?php echo $postdata['post_content']; ?></td>
                            <td>
                                <img height="100px" src="../upload/<?php echo $postdata['post_img']; ?>" alt="">
                                <br>
                                <?php if($_SESSION['adminID']==$postdata['user_id']){?>
                                    <a href="edit_img.php?status=editimg&&id=<?php echo $postdata['post_id']; ?>&&editimg_name=<?php echo $postdata['post_img']; ?>">Change</a>
                                <?php } ?>                                    
                            </td>
                            <td><?php echo $postdata['user_name']; ?></td>
                            <td><?php echo $postdata['post_date']; ?></td>
                            <td><?php echo $postdata['cat_name']; ?></td>
                            <td><?php echo $postdata['post_status']; ?></td>
                            <td>
                                <?php if($_SESSION['adminID']==$postdata['user_id']){?>
                                    <a class="btn btn-primary m-1" href="edit_post.php?status=editpost&&id=<?php echo $postdata['post_id']; ?>">Edit</a>
                                    <a class="btn btn-danger m-1" href="?status=delpost&&id=<?php echo $postdata['post_id']; ?>&&deltimg_name=<?php echo $postdata['post_img']; ?>">Delete</a>
                                    <!-- reload to this same page.with parameters status,id,delimg_name -->
                                <?php }else{?>
                                    <a class="btn btn-primary m-1 disabled" href="edit_post.php?status=editpost&&id=<?php echo $postdata['post_id']; ?>">Edit</a>
                                    <a class="btn btn-danger m-1 disabled" href="?status=delpost&&id=<?php echo $postdata['post_id']; ?>&&deltimg_name=<?php echo $postdata['post_img']; ?>">Delete</a>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>