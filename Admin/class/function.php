
<?php
    class adminBlog{
        // private $conn;

        protected function connect() {
            try{
                //code..for XAMPP
                $username="root";
                $password="";
                $pdo = new PDO('mysql:host=localhost;dbname=house_renting',$username,$password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
            }
            catch(PDOException $e){
                print "Error!: ".$e->getMessage()."<br>";
                die();
            }
            
        }

        public function filterDateCityCtg($DATA,$cat_id){            
            // ----------For checking input date is clear/set: use EMPTY() ->instead of ISSET() for correct output
            //rent , date , city:  1 1 1
            if(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $city_id= $DATA['city_id'];
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ? AND rent_amount BETWEEN ? AND  AND city_id=? AND cat_id=?;");
                if( $stmt->execute(array($from_date, $to_date, $min_rent, $max_rent, $city_id, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent, date: 1 1 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ? AND rent_amount BETWEEN ? AND ?  AND cat_id=?");
                if( $stmt->execute(array($from_date, $to_date, $min_rent, $max_rent, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent,city: 1 0 1
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];                
                $city_id= $DATA['city_id'];
                // $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_amount BETWEEN ? AND ? AND city_id=?  AND cat_id=?;");
                if( $stmt->execute(array($min_rent, $max_rent, $city_id, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent: 1 0 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];    
                // $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_amount BETWEEN ? AND ?  AND cat_id=?;");
                if( $stmt->execute(array($min_rent, $max_rent, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
             //date , city:0 1 1  
             elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']!='All')
             {
                 $from_date = $DATA['from_date'];
                 $to_date = $DATA['to_date'];
                 $city_id=$DATA['city_id'];
                //  $query = "SELECT * FROM post_user_view WHERE  rent_from BETWEEN '$from_date' AND '$to_date' AND city_id=$city_id  AND cat_id=$cat_id";                                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE  rent_from BETWEEN ? AND ? AND city_id=?  AND cat_id=?;");
                if( $stmt->execute(array($from_date, $to_date, $city_id, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
             }
            
            // filter by:date : 0 1 0
            elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']=='All')
            {
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date'   AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ?   AND cat_id=?;");
                if( $stmt->execute(array($from_date, $to_date, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
           
            // filter by: city: 0 0 1
            elseif((empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && (empty($DATA['from_date']) || empty($DATA['to_date']) ) && $DATA['city_id']!='All'){
                $city_id=$DATA['city_id'];
                // $query = "SELECT * FROM post_user_view WHERE city_id=$city_id  AND cat_id=$cat_id";                                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE city_id=?  AND cat_id=?;");
                if( $stmt->execute(array($city_id, $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            // 0 0 0 & other options
            else{
                // $query = "SELECT * FROM post_user_view  WHERE cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view  WHERE cat_id=?;");
                if( $stmt->execute(array( $cat_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }            
            return $query_result;
        }
        //end of Filter function

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
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ? AND rent_amount BETWEEN ? AND  AND city_id=?;");
                if( $stmt->execute(array($from_date, $to_date, $min_rent, $max_rent, $city_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent, date: 1 1 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ? AND rent_amount BETWEEN ? AND ?;");
                if( $stmt->execute(array($from_date, $to_date, $min_rent, $max_rent)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent,city: 1 0 1
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];                
                $city_id= $DATA['city_id'];
                // $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_amount BETWEEN ? AND ? AND city_id=?;");
                if( $stmt->execute(array($min_rent, $max_rent, $city_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            //rent: 1 0 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];    
                // $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_amount BETWEEN ? AND ?;");
                if( $stmt->execute(array($min_rent, $max_rent)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
             //date , city:0 1 1  
             elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']!='All')
             {
                 $from_date = $DATA['from_date'];
                 $to_date = $DATA['to_date'];
                 $city_id=$DATA['city_id'];
                //  $query = "SELECT * FROM post_user_view WHERE  rent_from BETWEEN '$from_date' AND '$to_date' AND city_id=$city_id  AND cat_id=$cat_id";                                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE  rent_from BETWEEN ? AND ? AND city_id=?;");
                if( $stmt->execute(array($from_date, $to_date, $city_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
             }
            
            // filter by:date : 0 1 0
            elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']=='All')
            {
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                // $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date'   AND cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE rent_from BETWEEN ? AND ?;");
                if( $stmt->execute(array($from_date, $to_date)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
           
            // filter by: city: 0 0 1
            elseif((empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && (empty($DATA['from_date']) || empty($DATA['to_date']) ) && $DATA['city_id']!='All'){
                $city_id=$DATA['city_id'];
                // $query = "SELECT * FROM post_user_view WHERE city_id=$city_id  AND cat_id=$cat_id";                                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE city_id=?;");
                if( $stmt->execute(array($city_id)) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }
            // 0 0 0 & other options
            else{
                // $query = "SELECT * FROM post_user_view  WHERE cat_id=$cat_id";                
                $stmt=$this->connect()->prepare("SELECT * FROM post_user_view;");
                if( $stmt->execute(array()) )                
                    $query_result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                else{ 
                    $stmt=null; 
                    exit(); 
                }
            }            
            return $query_result;
        }
        //end of Filter function        

        public function user_login($data){
            $email=$data['email'];
            $pass=md5($data['pass']);
            $stmt = $this->connect()->prepare("SELECT * FROM user_info WHERE user_email='$email' && user_pass='$pass';");
            $stmt=$this->connect()->prepare("SELECT * FROM user_info WHERE user_email=? && user_pass=?;");
            if( $stmt->execute(array($email, $pass)) ){                                            
               //there is such admin_emai & password ? / null
               if( $stmt->rowCount()>0 ){
                // password & email matched-> go to dashboard.php page
                    header('Location:account_setting.php');  
                    // query returns user_tuple.Convert it in array using mysqli_fetch_assoc($user_tuple) function.
                    // keep query data in an arry
                    $user_info = $stmt->fetchAll(PDO::FETCH_ASSOC);                     
                    // before keeping any Information is $_SESSION named super global variable
                    // we need to start session.Otherwise there will be no data in session.
                    session_start();
                    foreach($user_info as $user_data){
                        $_SESSION['person']='user';
                        $_SESSION['person_id']=$user_data['user_id'];
                        $_SESSION['person_name']=$user_data['user_name'];
                    }
               }
               
            }
            else{
                $stmt = null;
                exit();
            }
        }

        public function admin_login($data){
            $admin_email=$data['email'];
            $admin_pass=md5($data['pass']);

            $stmt = $this->connect()->prepare("SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass';");
            $stmt=$this->connect()->prepare("SELECT * FROM admin_info WHERE admin_email=? && admin_pass=?;");
            if( $stmt->execute(array($admin_email, $admin_pass)) ){                                            
               //there is such admin_emai & password ? / null
               if( $stmt->rowCount()>0 ){
                // password & email matched-> go to dashboard.php page
                    header('Location:account_setting.php');  
                    // query returns tuple.Convert it in array using mysqli_fetch_assoc($admin_tuple) function.
                    // keep query data in an arry
                    $admin_info = $stmt->fetchAll(PDO::FETCH_ASSOC);                     

                    // before keeping any Information is $_SESSION named super global variable
                    // we need to start session.Otherwise there will be no data in session.
                    session_start();
                    foreach($admin_info as $admin_data){
                        $_SESSION['person']='admin';
                        $_SESSION['person_id']=$admin_data['admin_id'];
                        $_SESSION['person_name']=$admin_data['admin_name'];
                    }
               }
               
            }
            else{
                $stmt = null;
                exit();
            }
        }

        public function get_account_info(){            
            $id=$_SESSION['person_id'];
            if($_SESSION['person']=='admin')
                $stmt=$this->connect()->prepare("SELECT * FROM admin_info WHERE admin_id=?;");
            else//user
                $stmt=$this->connect()->prepare("SELECT * FROM user_info WHERE user_id=?;");
            // query succes?            
            if( $stmt->execute(array($id)) ){                                                           
               if( $stmt->rowCount()>0 ){        
                    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);                                 
                    return $data;
               }               
            }
            else{
                $stmt = null;
                exit();
            }
        }

        public function update_account($data){            
            $id=$_SESSION['person_id'];
            $name=$data['name'];
            $email=$data['email'];
            $password=$data['password'];
            $old_password=$data['old_password'];

            // account update for ADMIN
            if($_SESSION['person']=='admin'){                
                $stmt = $this->connect()->prepare("SELECT * FROM admin_info WHERE admin_id!=? AND admin_email=?;");                
                // if no other (admin_id != ) account has same email--> no of row with different ID & Same Email = 0 --> then update info -- name,email,password etc
                if( $stmt->execute(array($id, $email)) && $stmt->rowCount()==0 ){
                    if($password==$old_password || md5($password)==$old_password){
                        $stmt = $this->connect()->prepare("UPDATE admin_info SET admin_name=?,admin_email=? WHERE admin_id=?;");
                        if( $stmt->execute(array($name, $email, $id)) ){
                            $_SESSION['person_name']=$name;//update User/admin name for Showing in Side Navaigation bar
                            return "Account Updated Successfully !!"; 
                        }
                        else {
                            $stmt = null;
                            exit();
                        }             
                    }                        
                    else{                                               
                        $stmt = $this->connect()->prepare("UPDATE admin_info SET admin_name=?,admin_email=?,admin_pass=? WHERE admin_id=?;");
                        if( $stmt->execute(array($name, $email, md5($password), $id)) )
                            return "Account Updated Successfully !!";  
                        else {
                            $stmt = null;
                            exit();
                        }          
                    }
                } 
                else 
                    return "This email is already used.Try with another one...";               
            }// account update for USER
            else{//user
                $stmt = $this->connect()->prepare("SELECT * FROM user_info WHERE user_id!=? AND user_email=?;");                
                // Email Used in another account ?
                if( $stmt->execute(array($id, $email)) && $stmt->rowCount()==0 ){
                    // pass not changed?
                    if($password==$old_password || md5($password)==$old_password){
                        $stmt = $this->connect()->prepare("UPDATE user_info SET user_name=?,user_email=? WHERE user_id=?");
                        if( $stmt->execute(array($name, $email, $id)) ){
                            $_SESSION['person_name']=$name;//update User/admin name for Showing in Side Navaigation bar
                            return "Account Updated Successfully !!"; 
                        }
                        else {
                            $stmt = null;
                            exit();
                        }                         
                    }                        
                    else{ //pass changed ?                     
                        $stmt = $this->connect()->prepare("UPDATE user_info SET user_name=?,user_email=?,user_pass=? WHERE user_id=?;");
                        if( $stmt->execute(array($name, $email, md5($password), $id)) )
                            return "Account Updated Successfully !!"; 
                        else {
                            $stmt = null;
                            exit();
                        }          

                    }
                }
                else 
                    return "This email is already used.Try with another one...";               
            }            
        }
        
        public function user_signup($data){
            // ) = escape /n,/r ctrl+z etc invalid charactes
            $user_name=  $data['user_name'];
            $user_email= $data['user_email'];
            $user_pass=md5($data['user_pass']);

            $stmt = $this->connect()->prepare("SELECT * FROM user_info where user_email=?;");        
            if( $stmt->execute(array($user_email)) && $stmt->rowCount()>0 ){
                return "This email is already used.Try with another one...";
            }                                    
            else{                
                $stmt = $this->connect()->prepare("INSERT INTO user_info ( user_email, user_name, user_pass) VALUES (?, ?, ?);");
                if( $stmt->execute(array($user_email, $user_name, $user_pass)) ){
                    return "Account Created Successfully !!";
                }
            }
        
        }
        
        public function logout(){ 
            unset($_SESSION['person']);           
            unset($_SESSION['person_id']);
            unset($_SESSION['person_name']);

            header("location:index.php");
        }
        
        public function add_city($data){            
            $city_name= $data['city_name'];   
            $post_code= $data['post_code'];
            $user_id=$_SESSION['person_id'];

            if($_SESSION['person']=='admin'){
                $stmt = $this->connect()->prepare("INSERT INTO city(city_name,post_code) VALUE(?, ?);");
                if( $stmt->execute(array($city_name,$post_code)) )
                    return "City Added Successfully!!";
                else 
                    return "Failed to Add City!!";
            }                
            else{
                $stmt = $this->connect()->prepare("INSERT INTO city_req(city_name,post_code,user_id) VALUE(?, ?, ?);");
                if( $stmt->execute(array($city_name,$post_code,$user_id)) )
                    return "City Added Successfully!!";
                else 
                    return "Failed to Add City!!";
            }                
            
        }

        public function delete_city($city_id,$approved){
            if($approved==1){
                $stmt = $this->connect()->prepare("DELETE FROM city WHERE city_id=?;");
                if( $stmt->execute(array($city_id)) )
                    return "City deleted Successfully!!";
                else{
                    $stmt = null;
                    return "Failed to delete City!!";
                }
            }            
            else{                          
                $stmt = $this->connect()->prepare("DELETE FROM city_req WHERE city_id=?;");
                if( $stmt->execute(array($city_id)) )
                    return "City deleted Successfully!!";
                else{
                    $stmt = null;
                    return "Failed to delete City!!";
                }
            }
                
        }
        
        public function approve_city($cityreq_id){  
            $stmt = $this->connect()->prepare("SELECT* FROM city_req WHERE city_id=?;");
            if( $stmt->execute(array($cityreq_id)) ){                
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }                
            $city_name=$data[0]['city_name'];    
            $post_code=$data[0]['post_code'];            
        
            $stmt = $this->connect()->prepare("INSERT INTO city(city_name,post_code) VALUE(?, ?);");           

            if( $stmt->execute( array($city_name, $post_code)) ){
                $stmt = $this->connect()->prepare("DELETE FROM city_req WHERE city_id=?;");
                if( $stmt->execute(array($cityreq_id)) )
                    return "City Approved Successfully!!";
            }
            else{
                return "Failed to Add City!!";
            }
        }

        public function update_city($data){        
            $city_id= $data['city_id'];
            $city_name= $data['city_name'];
            $post_code=$data['post_code'];
            
            if($data['approved']==1)
                $stmt = $this->connect()->prepare("UPDATE city SET city_name=?,post_code=? WHERE city_id=?;");
            else
                $stmt = $this->connect()->prepare("UPDATE city_req SET city_name=?, post_code=? WHERE city_id=?;");
            if( $stmt->execute(array($city_name, $post_code, $city_id)) ){
                return "City Updated Successfully!!";
            }
        }               

        public function getAllCity(){
            //get all Approved city
            $stmt=$this->connect()->prepare("SELECT * FROM city ORDER BY city_name;");
            if( ( !$stmt->execute(array()) ) || ($stmt->rowCount() == 0) ){
                $stmt=null;
                // error=stmtfailed / no row found
                exit();
            } 
            $query_run =$stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt=null;           
            return $query_run;
        }

        public function getAllCityReq(){
            $user_id=$_SESSION['person_id'];
            if($_SESSION['person']=='admin'){
                $stmt = $this->connect()->prepare("SELECT * FROM city_req ORDER BY city_name;");//show all city_req if admin
                if( !$stmt->execute(array()) )
                    exit();
            }
                
            else{
                $stmt = $this->connect()->prepare("SELECT * FROM city_req WHERE user_id=? ORDER BY city_name;");//show city_req if this person requested it.
                if( !$stmt->execute(array($user_id)) )
                    exit();
            }      
            $query_run = $stmt->fetchAll(PDO::FETCH_ASSOC);                      
            return $query_run;
        }

        public function get_City_byID($id,$approved){
            if($approved==1){
                $stmt = $this->connect()->prepare("SELECT * FROM city WHERE city_id=?;");
                if( !$stmt->execute(array($id)) )
                    exit();
            }
            else{
                $stmt = $this->connect()->prepare("SELECT * FROM city_req WHERE city_id=?;");
                if( !$stmt->execute(array($id)) )
                    exit();
            }            
                $city = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $city;
            
        }

        public function add_category($data){
            $person_id=$data['person_id'];
            $cat_name= $data['cat_name'];
            $cat_des= $data['cat_des'];
            //cat_id must be set AI (primary key & auto increment ) -> otherwise for 1st entry id=0 for other entry also id=0 will be tried...copy primary key
            if($_SESSION['person']=='admin')
                $stmt =$this->connect()->prepare("INSERT INTO category(cat_name,cat_des,ctg_author_id) VALUE(?, ?, ?);");
            else 
                $stmt =$this->connect()->prepare("INSERT INTO category_req(cat_name,cat_des,ctg_author_id) VALUE(?, ?, ?);");               
                 
            if( $stmt->execute(array($cat_name, $cat_des, $person_id)) ){
                return "Category Added Successfully!";
            }
            else{
                return "Failed to Add Category!";
            }
        }

        public function display_category(){            
            $stmt=$this->connect()->prepare("SELECT * FROM category ORDER BY cat_name;");
            if( ( !$stmt->execute(array()) ) || ($stmt->rowCount() == 0) ){
                $stmt=null;
                // error=stmtfailed / no row found
                exit();
            }                         
            $category =$stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt=null;                       
            return $category;            
        }
        
        public function display_category_req(){            
            $stmt=$this->connect()->prepare("SELECT * FROM category_req ORDER BY cat_name;");
            if( ( !$stmt->execute(array()) ) || ($stmt->rowCount() == 0) ){
                $stmt=null;
                // error=stmtfailed / no row found
                exit();
            }                         
            $category =$stmt->fetchAll(PDO::FETCH_ASSOC); 
            $stmt=null;                       
            return $category;            
        }
        
        public function get_category_byID($id,$approved){
            if($approved==1){
                $stmt = $this->connect()->prepare("SELECT * FROM category WHERE cat_id=?;");
                if( !$stmt->execute(array($id)) )
                    exit();
            }
            else{
                $stmt = $this->connect()->prepare("SELECT * FROM category_req WHERE cat_id=?;");
                if( !$stmt->execute(array($id)) )
                    exit();
            }            
                $city = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $city;
            
        }

        public function update_category($data,){
            $cat_id= $data['cat_id'];
            $cat_name= $data['cat_name'];
            $cat_des= $data['cat_des'];
            
            if($data['approved']==1)
                $stmt = $this->connect()->prepare("UPDATE category SET cat_name=?,cat_des=? WHERE cat_id=?;");
            else
                $stmt = $this->connect()->prepare("UPDATE category_req SET cat_name=?,cat_des=? WHERE cat_id=?;");
            if( $stmt->execute(array($cat_name, $cat_des, $cat_id)) ){
                return "Category Updated Successfully!!";
            }
            else 
                exit();
        }

        public function delete_category_byID($id,$approved){
            if($approved==1)
                $stmt = $this->connect()->prepare("DELETE FROM category WHERE cat_id=?;");
            else//0
                $stmt = $this->connect()->prepare("DELETE FROM category_req WHERE cat_id=?;");
            if( $stmt->execute(array($id)) ){                
                return "Category Deleted Successfully";
            }
            else 
                exit();
        }
        public function approve_category($id){
            $stmt = $this->connect()->prepare("SELECT* FROM category_req WHERE cat_id=?;");
            if( $stmt->execute(array($id)) ){                
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $data = $data[0];
            }
            $cat_name=$data['cat_name'];
            $cat_des=$data['cat_des'];
            $ctg_author_id=$data['ctg_author_id'];
            $stmt = $this->connect()->prepare("INSERT INTO category (cat_name,cat_des,ctg_author_id) VALUE(?, ?, ?);");
            if( $stmt->execute(array($cat_name,$cat_des,$ctg_author_id)) ){ 
                //get ctg data from 'category_req' by id > insert these tuple(row) in 'category' table > delete this row from 'category_req'               
                $stmt = $this->connect()->prepare("DELETE FROM category_req WHERE cat_id=?;");
                if( $stmt->execute(array($id)) )
                    return "Category Approved Successfully!!";
                else         
                    return "Failed to  Approve Category!!";
            }            
        }
        
        public function add_post($data){
            $post_title=$data['post_title'];
            $post_content=$data['post_content'];
            
            $post_img=$_FILES['post_img']['name'];  
            // convert string to array.Divide by '.' character.
            $temp = explode(".",$post_img);
            // pick a random name with same image extension
            $post_img =round(microtime(true)) . '.' . end($temp);  

            $post_img_tmp=$_FILES['post_img']['tmp_name'];
                        
            $post_category=$data['post_category'];
            $post_author=$_SESSION['person_id'];//"Tanvir Anjom Siddique";
            // $post_summery=$data['post_summery'];
            // $post_tag=$data['post_tag'];
            $rent_from=$data['rent_from'];            
            $rent_amount=$data['rent_amount'];            
            $post_status=$data['post_status'];
            $city_id=$data['city'];
            // it's tarint->0/1

            $stmt = $this->connect()->prepare("INSERT INTO posts(post_title, post_content, post_img, post_ctg, post_author, post_date, rent_from, rent_amount, city_id, post_status) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

            if( $stmt->execute(array($post_title, $post_content, $post_img, $post_category, $post_author, now(), $rent_from, $rent_amount, $city_id, $post_status)) ){
                // come out of folder where function.php file is included --> now in root folder-> goto upload folder & upload image as imagename: $post_img
                move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
                return "Post Added Successfully!!";
            }

        }

        // display post for admin (for manage_post_view.php page)
        public function display_post(){ 
            // for both user & admin login there is:$_SESSION['person_id']-> user_id/admin_id respectively           
            $user_id=$_SESSION['person_id']; 
            $stmt = $this->connect()->prepare("SELECT * FROM post_user_view WHERE user_id=? ORDER BY post_date DESC,post_id DESC;");
            
            if( $stmt->execute(array($user_id)) ){
                $posts= $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $posts;
            }
        }
        
        // display post for public (for blog_posts.php file)
        public function display_post_public(){            
            $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE post_status=? ORDER BY post_date DESC,post_id DESC;");
            if( !$stmt->execute(array(1)) ){
                $stmt=null;
                // error=stmtfailed / no row found
                exit();
            } 
            $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);                                    
            return $posts; 
        }

        // fileter blog post by category:display posts of a specifiec category only
        public function display_post_public_by_category($cat){
            $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE post_status=? and cat_name=? ORDER BY post_date DESC,post_id DESC;");
            if( $stmt->execute(array(1, $cat)) ){
                $posts= $stmt->fetchAll(PDO::FETCH_ASSOC);                                    
                return $posts;
            }
        }
        public function display_post_public_by_city($city_id){
            $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE post_status=? and city_id=? ORDER BY post_date DESC,post_id DESC;");
            if( $stmt->execute(array(1, $city_id)) ){
                $posts= $stmt->fetchAll(PDO::FETCH_ASSOC);                                    
                return $posts;
            }
        }

        public function edit_img($data){
            $id=$data['editimg_id'];
            $previousImg=$data['editimg_name'];

            $imgname=$_FILES['change_img']['name'];
            $temp = explode(".",$imgname);//break string into an array wherever '.' found
            $imgname =round(microtime(true)) . '.' . end($temp);//generate a random number and concatenate it with file name extension of the image.             
            $tmp_name=$_FILES['change_img']['tmp_name'];

            $stmt= $this->connect()->prepare("UPDATE posts SET post_img=? WHERE post_id=?;");
            if($stmt->execute(array($imgname, $id))){
                // delete previous image
                unlink('../upload/'.$previousImg);
                // upload new image
                move_uploaded_file($tmp_name,'../upload/'.$imgname);
                $Arr['msg']="Thumbnail Updated Successfully!!";
                $Arr['imgname']=$imgname;
                return $Arr;
            }
        }

        public function get_post_info($id){
            $stmt=$this->connect()->prepare("SELECT * FROM post_user_view WHERE post_id=?;");
            if($stmt->execute(array($id))){
                // $post_info=$stmt->execute(array(1));
                // $post=mysqli_fetch_assoc($post_info);
                $post= $stmt->fetchAll(PDO::FETCH_ASSOC);                                    
                return $post;
            }
        }

        public function delete_post($id,$deleteImg_data){            
            $stmt=$this->connect()->prepare("DELETE FROM posts WHERE post_id=?;");
            if($stmt->execute(array($id))){
                unlink('../upload/'.$deleteImg_data);
                // delete image
                return "Deleted Post Successfully";
            }
        }

        public function edit_post($data){
            $post_id=$data['edit_post_id'];

            $post_title=$data['post_title'];
            $post_content=$data['post_content'];                                           
            $post_category=$data['post_category'];
            $rent_from=$data['rent_from'];            
            $rent_amount=$data['rent_amount'];            
            $post_status=$data['post_status'];
            // it's tarint->0/1
            $city_id=$data['city'];
            $stmt=$this->connect()->prepare("UPDATE posts SET post_title=?, post_content=?, post_ctg= ?, rent_from=?, rent_amount=?, city_id=?, post_status=? WHERE post_id=?;");

            if( $stmt->execute(array($post_title, $post_content, $post_category, $rent_from, $rent_amount, $city_id, $post_status, $post_id)) ){                
                return "Post Updated Successfully!!";
            }
            else{
                return "Failed to Update Post!!";
            }
        }

        public function add_msg($data){
            $post_id=$data['post_id'];
            $name=$data['name'];
            $contact_info=$data['contact_info'];
            $msg=$data['msg'];

            $stmt=$this->connect()->prepare("INSERT INTO msg(post_id,name,contact_info,msg,msg_time) VALUES(?, ?, ?, ?, ?);");                      
            if( $stmt->execute(array($post_id,$name,$contact_info,$msg,now() )) ){
                return "Msg added successfully!";
            }
        }
        public function get_msg($post_id){            
            $stmt=$this->connect()->prepare("SELECT* FROM MSG WHERE post_id=? ORDER BY msg_time DESC;");
            if($stmt->execute(array($post_id))){
                $query_run=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $query_run;
            }            
        }
        public function del_msg($msg_id){            
            $stmt=$this->connect()->prepare("DELETE FROM MSG WHERE msg_id=?;");            ; 
            if( $stmt->execute(array($msg_id)) ){
                return 'Message deleted successfully!!';
            }                                 
        }

        public function reply_msg($data){
            $msg_id=$data['msg_id'];            
            $msg_reply=$data['msg_reply'];

            $stmt=$this->connect()->prepare("UPDATE msg SET msg_reply=? WHERE msg_id=?;"); 
            $query_run=$stmt->execute(array($msg_reply, $msg_id));                     
            if($query_run){
                return "Msg replied successfully!";
            }
        }

    }
?>