<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='delcity'){                        
            $msg=$obj->delete_city($_GET['id'],1);                        
        }
        elseif($_GET['status']=='delcityreq'){                        
            $msg=$obj->delete_city($_GET['id'],0);                        
        }
        elseif($_GET['status']=='apvcity'){
            $msg=$obj->approve_city((int)$_GET['id']);
        }
        //after delete/approve reload page
        if(!headers_sent())
                header('Location:manage_city.php');            
        else
            echo '<script type="text/javascript">window.location.href="manage_city.php";</script>';
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
            // while($city=mysqli_fetch_assoc($allcity)){ 
                foreach($allcity as $city){                
                ?>
                <tr>
                    <td> <?php echo $city['city_name']; ?> </td>
                    <td> <?php echo $city['post_code']; ?> </td>  
                    <?php if($_SESSION['person']=='admin'){ ?>
                    <td>
                        <a href="edit_city.php?status=edtcity&&id=<?php echo $city['city_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delcity&&id=<?php echo $city['city_id']; ?>" class="btn btn-danger m-1">Delete</a>                    
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
            // while($city=mysqli_fetch_assoc($allcity)){ 
            //when mysqli_fetch_assoc() is called $allcity is changed...after while loop it will be null...one time use
            //when foreach is used array $alllcity is not changed.So we can use this array multiple times
            foreach($allcity as $city){   
               ?>
                <tr>
                    <td> <?php echo $city['city_name']; ?> </td>
                    <td> <?php echo $city['post_code']; ?> </td>    
                    <td> 
                    <?php if($_SESSION['person']=='admin'){ ?>  
                        <a href="?status=apvcity&id=<?php echo $city['city_id']; ?>" class="btn btn-success m-1">Approve</a>                     
                    <?php } ?>
                        <a href="edit_city.php?status=edtcityreq&&id=<?php echo $city['city_id']; ?>" class="btn btn-primary m-1">Edit</a>
                        <a href="?status=delcityreq&&id=<?php echo $city['city_id']; ?>" class="btn btn-danger m-1">Delete</a>                    
                    </td>                                    
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

