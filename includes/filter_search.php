<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mt-5">
                <div class="card-header">
                    <h4>Search:</h4>
                </div>
                <div class="card-body bg-light">
                
                    <form action="" method="POST">
                        <div class="row">
                        <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label>Min Rent</label>                                    
                                    <input type="int" name="min_rent"  value="<?php if(!empty($_POST['min_rent']) && !empty($_POST['max_rent'])){ echo $_POST['min_rent']; } ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label>Max Rent</label>                                        
                                    <input type="int" name="max_rent" value="<?php if(!empty($_POST['min_rent']) && !empty($_POST['max_rent'])){ echo $_POST['max_rent']; } ?>"  class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label>From Date</label>
                                    <input type="date" name="from_date" value="<?php if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){ echo $_POST['from_date']; } ?>" class="form-control">                                        
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label>To Date</label>
                                    <input type="date" name="to_date" value="<?php if(!empty($_POST['from_date']) && !empty($_POST['to_date'])){ echo $_POST['to_date']; } ?>" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label>City</label>
                                    <select name="city_id" class="form-control">
                                        <option value="All">All</option>
                                        <!-- <option value="0" selected="selected">Kalihati</option> -->
                                        <?php
                                            $query_run=$obj->getAllCity();
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row){
                                                if($row['city_id']==$_POST['city_id']){?>
                                                <option selected="selected" value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                        <?php 
                                                }else{ ?>
                                                <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                        <?php   }}}?>                            
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="form-group">
                                    <label></label> <br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                        
            <?php 
                if(!empty($_POST['city_id'])){
                    $posts=$obj->filterDateCity($_POST); 
                }
                                           
            ?>                        
        </div>
    </div>                                      
</section>