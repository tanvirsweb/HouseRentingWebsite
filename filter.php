<!-- 
CREATE VIEW post_user_view AS
 SELECT post_id, post_title, post_content, post_img, post_date, rent_from, rent_amount, post_status, user_id, user_name, user_email, cat_name, cat_id, posts.city_id, city_name 
 FROM posts JOIN user_info ON posts.post_author=user_info.user_id 
 JOIN category ON posts.post_ctg=category.cat_id 
 JOIN city ON posts.city_id=city.city_id;
); -->

<?php
    class FilterClass{
        private $conn;

        public function __construct(){
            // make connection with databse
            $this->conn = mysqli_connect("localhost","root","","house_renting");
            if(!$this->conn){
                die("Database Connection Error !!");
            } 
        }

        public function filterDateCity($DATA){            
            // ----------For checking input date is clear/set: use EMPTY() ->instead of ISSET() for correct output
            //rent , date , city:  1 1 1
            if(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $city_id= $DATA['city_id'];
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id";                
            }
            //rent, date: 1 1 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent";                
            }
            //rent,city: 1 0 1
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];                
                $city_id= $DATA['city_id'];
                $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id";                
            }
            //rent: 1 0 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];    
                $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent";                
            }
             //date , city:0 1 1  
             elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']!='All')
             {
                 $from_date = $DATA['from_date'];
                 $to_date = $DATA['to_date'];
                 $city_id=$DATA['city_id'];
                 $query = "SELECT * FROM post_user_view WHERE  rent_from BETWEEN '$from_date' AND '$to_date' AND city_id=$city_id";                                
             }
            
            // filter by:date : 0 1 0
            elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']=='All')
            {
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' ";                
            }
           
            // filter by: city: 0 0 1
            elseif((empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && (empty($DATA['from_date']) || empty($DATA['to_date']) ) && $DATA['city_id']!='All'){
                $city_id=$DATA['city_id'];
                $query = "SELECT * FROM post_user_view WHERE city_id=$city_id";                $_SESSION['msg']= "<h1>filter !=date & !=all</h1>";                
            }
            // 0 0 0 & other options
            else{
                $query = "SELECT * FROM post_user_view";                
            }
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
        }
        //end of Filter function

        public function getAllCity(){
            $query = "SELECT * FROM city ORDER BY city_name";
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
        }


    }

    $obj=new FilterClass();  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Date</title>
    <link href="admin/css//bootstrap5.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Search By:</h4>
                    </div>
                    <div class="card-body">
                    
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

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>PostID</th>
                                    <th>Post Title</th>
                                    <th>Rent Amount</th>
                                    <th>Rent From</th>    
                                    <th>City</th>                    
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                // $con = mysqli_connect("localhost","root","","house_renting");
                                if(isset($_POST['from_date']) && isset($_POST['to_date']))
                                {
                                    // $from_date = $_POST['from_date'];
                                    // $to_date = $_POST['to_date'];
                                    // $query = "SELECT * FROM user_post_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' ";
                                    // $query_run = mysqli_query($con, $query);   
                                    $query_run=$obj->filterDateCity($_POST);
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $row)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $row['post_id']; ?></td>
                                                <td><?= $row['post_title']; ?></td>
                                                <td><?= $row['rent_amount']; ?></td>
                                                <td><?= $row['rent_from']; ?></td>
                                                <td><?= $row['city_name']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "No Record Found";
                                    }
                                }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- </body>
</html>