<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
            $delid=$_GET['delid'];
            $del_msg=$obj->delete_category_byID($delid);
            //set a header to instruct the browser to call the page every 30 sec
            // header("Refresh: 30;");
                        
            // header("Refresh:0;url=manage_category.php");
            // error occur if you try to access header() from this file

            // it will automatically refresh in 0 seconds, you can change time in refresh
            // hence after deleting a tuple we can see the updated page
            if(!headers_sent()){//if header is not send redirect using php function header();else use JS
                header('Location:manage_category.php');
            }
            else{
                echo '<script type="text/javascript">window.location.href="manage_category.php";</script>';
            }

//    
        }
    }
?>


<div class="shadow m-5 p-5">
    <h2 class="text-center mb-3">All City</h2>
    <h4 class="text-center text-danger mb-3">
        <?php if(isset($del_msg)){echo $del_msg;} ?>
    </h4>
    
    <table class="table">
        <thead>
            <tr>
                <th>City</th>
                <th>Post/ZIP Code</th>
                <?php if($_SESSION['person']=='admin'){ ?>
                    <th>Action</th>
                <?php } ?>                                      
            </tr>
        </thead>
        <tbody>
        <!-- take a while loop
        query returns tuples.
        To get each attribute of each tuple in an array use mysqli_fetch_assoc($catdata) -->
            <?php 
            $allcity=$obj->getAllCity();
            while($city=mysqli_fetch_assoc($allcity)){ ?>
                <tr>
                    <td> <?php echo $city['city_name']; ?> </td>
                    <td> <?php echo $city['post_code']; ?> </td>  
                    <?php if($_SESSION['person']=='admin'){ ?>
                    <td>
                        <a href="edit_cityegory.php?status=edtcity&&id=<?php echo $city['city_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delete&&delid=<?php echo $city['city_id']; ?>" class="btn btn-danger m-1">Delete</a>                    
                    </td>
                    <?php } ?>                                      
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="shadow m-5 p-5">
    <h2 class="text-center">Requested City</h2>
    <table class="table">
        <thead>
            <tr>
                <th>City</th>
                <th>Post/ZIP Code</th>   
                <th>Action</th>             
            </tr>
        </thead>
        <tbody>
        <!-- take a while loop
        query returns tuples.
        To get each attribute of each tuple in an array use mysqli_fetch_assoc($catdata) -->
            <?php 
            $allcity=$obj->getAllCityReq();
            while($city=mysqli_fetch_assoc($allcity)){ ?>
                <tr>
                    <td> <?php echo $city['city_name']; ?> </td>
                    <td> <?php echo $city['post_code']; ?> </td>    
                    <td> 
                    <?php if($_SESSION['person']=='admin'){ ?>  
                        <a href="?status=aprcity&id=<?php echo $city['city_id']; ?>" class="btn btn-success m-1">Approve</a>                     
                    <?php } ?>
                        <a href="edit_cityegory.php?status=edtcityreq&&id=<?php echo $city['city_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delete&&delreqid=<?php echo $city['city_id']; ?>" class="btn btn-danger m-1">Delete</a>                    
                    </td>                                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

