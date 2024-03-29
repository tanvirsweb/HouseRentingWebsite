
<?php
    class adminBlog{
        private $conn;

        public function __construct(){
            #database host, database user , database password , database name
            $dbhost='localhost';
            $dbuser='root';
            $dbpass='';
            $dbname='house_renting';

            // make connection with databse
            $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database Connection Error !!");
            }
            
        }
        //-----------------------------------------
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
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id AND cat_id=$cat_id";                
            }
            //rent, date: 1 1 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && !empty($DATA['from_date']) && !empty($DATA['to_date'])  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date' AND rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
            }
            //rent,city: 1 0 1
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']!='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];                
                $city_id= $DATA['city_id'];
                $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent AND city_id=$city_id  AND cat_id=$cat_id";                
            }
            //rent: 1 0 0
            elseif(!empty($DATA['min_rent']) && !empty($DATA['max_rent']) && (empty($DATA['from_date']) || empty($DATA['to_date']))  &&$DATA['city_id']=='All')
            {
                $min_rent=$DATA['min_rent'];
                $max_rent=$DATA['max_rent'];    
                $query = "SELECT * FROM post_user_view WHERE rent_amount BETWEEN $min_rent AND $max_rent  AND cat_id=$cat_id";                
            }
             //date , city:0 1 1  
             elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']!='All')
             {
                 $from_date = $DATA['from_date'];
                 $to_date = $DATA['to_date'];
                 $city_id=$DATA['city_id'];
                 $query = "SELECT * FROM post_user_view WHERE  rent_from BETWEEN '$from_date' AND '$to_date' AND city_id=$city_id  AND cat_id=$cat_id";                                
             }
            
            // filter by:date : 0 1 0
            elseif( (empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && !empty($DATA['from_date']) && !empty($DATA['to_date']) &&$DATA['city_id']=='All')
            {
                $from_date = $DATA['from_date'];
                $to_date = $DATA['to_date'];
                $query = "SELECT * FROM post_user_view WHERE rent_from BETWEEN '$from_date' AND '$to_date'   AND cat_id=$cat_id";                
            }
           
            // filter by: city: 0 0 1
            elseif((empty($DATA['min_rent']) || empty($DATA['max_rent']) ) && (empty($DATA['from_date']) || empty($DATA['to_date']) ) && $DATA['city_id']!='All'){
                $city_id=$DATA['city_id'];
                $query = "SELECT * FROM post_user_view WHERE city_id=$city_id  AND cat_id=$cat_id";                                
            }
            // 0 0 0 & other options
            else{
                $query = "SELECT * FROM post_user_view  WHERE cat_id=$cat_id";                
            }
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
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
                $query = "SELECT * FROM post_user_view WHERE city_id=$city_id";                                
            }
            // 0 0 0 & other options
            else{
                $query = "SELECT * FROM post_user_view";                
            }
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
        }
        //end of Filter function
        

        public function user_login($data){
            $email=$data['email'];
            $pass=md5($data['pass']);

            $query="SELECT * FROM user_info WHERE user_email='$email' && user_pass='$pass'";

            // query succes?
            if(mysqli_query($this->conn,$query)){
               $user_tuple= mysqli_query($this->conn,$query);
            
               //there is such admin_emai & password ? / null
               if($user_tuple){
                // password & email matched-> go to dashboard.php page
                    header('Location:account_setting.php');  

                    // query returns user_tuple.Convert it in array using mysqli_fetch_assoc($user_tuple) function.
                    // keep query data in an arry
                    $user_data=mysqli_fetch_assoc($user_tuple);                    

                    // before keeping any Information is $_SESSION named super global variable
                    // we need to start session.Otherwise there will be no data in session.
                    session_start();
                    $_SESSION['person']='user';
                    $_SESSION['person_id']=$user_data['user_id'];
                    $_SESSION['person_name']=$user_data['user_name'];
               }
               
            }
        }

        public function admin_login($data){
            $admin_email=$data['email'];
            $admin_pass=md5($data['pass']);

            $query="SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

            // query succes?
            if(mysqli_query($this->conn,$query)){
               $admin_tuple= mysqli_query($this->conn,$query);
            
               //there is such admin_emai & password ? / null
               if($admin_tuple){
                // password & email matched-> go to dashboard.php page
                    header('Location:account_setting.php');  

                    // query returns tuple.Convert it in array using mysqli_fetch_assoc($admin_tuple) function.
                    // keep query data in an arry
                    $admin_data=mysqli_fetch_assoc($admin_tuple);                    

                    // before keeping any Information is $_SESSION named super global variable
                    // we need to start session.Otherwise there will be no data in session.
                    session_start();
                    $_SESSION['person']='admin';
                    $_SESSION['person_id']=$admin_data['admin_id'];
                    $_SESSION['person_name']=$admin_data['admin_name'];
               }
               
            }
        }
        public function get_account_info(){            
            $id=$_SESSION['person_id'];
            if($_SESSION['person']=='admin')
                $query="SELECT * FROM admin_info WHERE admin_id=$id";
            else//user
                $query="SELECT * FROM user_info WHERE user_id=$id";
            // query succes?
            if(mysqli_query($this->conn,$query)){
               $data= mysqli_query($this->conn,$query);
               return $data;
            }
        }
        public function update_account($data){            
            $id=$_SESSION['person_id'];
            $name=$data['name'];
            $email=$data['email'];
            $password=$data['password'];
            $old_password=$data['old_password'];

            if($_SESSION['person']=='admin'){
                $query="SELECT * FROM admin_info WHERE admin_id!=$id AND admin_email='$email' ";
                if($password==$old_password || md5($password)==$old_password)
                    $query_update="UPDATE admin_info SET admin_name='$name',admin_email='$email' WHERE admin_id=$id";
                else{ 
                    $password=md5($password);
                    $query_update="UPDATE admin_info SET admin_name='$name',admin_email='$email',admin_pass='$password' WHERE admin_id=$id";
                }
            }
            else{//user
                $query="SELECT * FROM user_info WHERE user_id!=$id AND user_email='$email' ";                
                if($password==$old_password || md5($password)==$old_password)
                    $query_update="UPDATE user_info SET user_name='$name',user_email='$email' WHERE user_id=$id";
                else{ 
                    $password=md5($password);
                    $query_update="UPDATE user_info SET user_name='$name',user_email='$email',user_pass='$password' WHERE user_id=$id";
                }
            }
            $q=mysqli_query($this->conn,$query);
            if(mysqli_num_rows($q)>0){
                return "This email is already used.Try with another one...";
            }                                    
            elseif(mysqli_query($this->conn,$query_update)){
                    return "Account Updated Successfully !!";                
            }
        }

        public function user_signup($data){
            //mysqli_real_escape_string($this->conn,) = escape /n,/r ctrl+z etc invalid characters
            $user_name= mysqli_real_escape_string($this->conn,$data['user_name']);
            $user_email=mysqli_real_escape_string($this->conn,$data['user_email']);
            $user_pass=md5($data['user_pass']);

            $query="SELECT * FROM user_info where user_email='$user_email'";            
            $q=mysqli_query($this->conn,$query);
            
            if(mysqli_num_rows($q)>0){
                return "This email is already used.Try with another one...";
            }                                    
            else{                
                $query="INSERT INTO user_info ( user_email, user_name, user_pass) VALUES ('$user_email', '$user_name', '$user_pass')";
                if(mysqli_query($this->conn,$query)){
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
            $city_name=mysqli_real_escape_string($this->conn,$data['city_name']);    
            $post_code=mysqli_real_escape_string($this->conn,$data['post_code']);
            $user_id=$_SESSION['person_id'];

            if($_SESSION['person']=='admin')
                $query="INSERT INTO city(city_name,post_code) VALUE('$city_name',$post_code)";
            else
                $query="INSERT INTO city_req(city_name,post_code,user_id) VALUE('$city_name',$post_code,$user_id)";

            if(mysqli_query($this->conn,$query)){
                return "City Added Successfully!!";
            }
            else{
                return "Failed to Add City!!";
            }
        }

        public function delete_city($city_id,$approved){
            if($approved==1)
                $query="DELETE FROM city WHERE city_id=$city_id";
            else
                $query="DELETE FROM city_req WHERE city_id=$city_id";
            if(mysqli_query($this->conn,$query))
                return "City deleted Successfully!!";
        }
        public function approve_city($cityreq_id){  
            $query="SELECT* FROM city_req WHERE city_id=$cityreq_id";
            if(mysqli_query($this->conn,$query)){
                $data=mysqli_query($this->conn,$query);
                $data=mysqli_fetch_assoc($data);
            }          
            $city_name=$data['city_name'];    
            $post_code=$data['post_code'];            
            
            $query="INSERT INTO city(city_name,post_code) VALUE('$city_name',$post_code)";            

            if(mysqli_query($this->conn,$query)){
                $query="DELETE FROM city_req WHERE city_id=$cityreq_id";
                if(mysqli_query($this->conn,$query))
                    return "City Approved Successfully!!";
            }
            else{
                return "Failed to Add City!!";
            }
        }
        public function update_city($data){        
            $city_id=mysqli_real_escape_string($this->conn,$data['city_id']);
            $city_name=mysqli_real_escape_string($this->conn,$data['city_name']);
            $post_code=$data['post_code'];
            
            if($data['approved']==1)
                $query="UPDATE city SET city_name='$city_name',post_code=$post_code WHERE city_id=$city_id ";
            else
                $query="UPDATE city_req SET city_name='$city_name',post_code=$post_code WHERE city_id=$city_id ";
            if(mysqli_query($this->conn,$query)){
                return "City Updated Successfully!!";
            }
        }               

        public function getAllCity(){
            $query = "SELECT * FROM city ORDER BY city_name";//get all Approved city
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
        }
        public function getAllCityReq(){
            $user_id=$_SESSION['person_id'];
            if($_SESSION['person']=='admin')
                $query = "SELECT * FROM city_req ORDER BY city_name";//show all city_req if admin
            else
                $query = "SELECT * FROM city_req WHERE user_id=$user_id ORDER BY city_name";//show city_req if this person requested it.
            $query_run = mysqli_query($this->conn, $query);
            return $query_run;
        }
        public function get_City_byID($id,$approved){
            if($approved==1)
                $query="SELECT * FROM city WHERE city_id=$id";
            else
                $query="SELECT * FROM city_req WHERE city_id=$id";
            if(mysqli_query($this->conn,$query)){
                $city=mysqli_query($this->conn,$query);
                return $city;
            }
        }

        public function add_category($data){
            $person_id=$data['person_id'];
            $cat_name=mysqli_real_escape_string($this->conn,$data['cat_name']);
            $cat_des=mysqli_real_escape_string($this->conn,$data['cat_des']);
            //cat_id must be set AI (primary key & auto increment ) -> otherwise for 1st entry id=0 for other entry also id=0 will be tried...copy primary key
            if($_SESSION['person']=='admin')
                $query="INSERT INTO category(cat_name,cat_des,ctg_author_id) VALUE('$cat_name','$cat_des',$person_id)";
            else 
                $query="INSERT INTO category_req(cat_name,cat_des,ctg_author_id) VALUE('$cat_name','$cat_des',$person_id)";                
            if(mysqli_query($this->conn,$query)){
                return "Category Added Successfully!";
            }
            else{
                return "Failed to Add Category!";
            }
        }
        public function display_category(){            
            $query="SELECT * FROM category ORDER BY cat_name";
            if(mysqli_query($this->conn,$query)){
                $category=mysqli_query($this->conn,$query);
                return $category;
            }
        }
        public function display_category_req(){            
            $query="SELECT * FROM category_req ORDER BY cat_name";
            if(mysqli_query($this->conn,$query)){
                $category=mysqli_query($this->conn,$query);
                return $category;
            }
        }
        
        public function get_category_byID($id,$approved){
            if($approved==1)
                $query="SELECT * FROM category WHERE cat_id=$id";
            else
                $query="SELECT * FROM category_req WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){
                $category=mysqli_query($this->conn,$query);
                return $category;
            }
        }
        public function update_category($data,){
            $cat_id=$data['cat_id'];
            $cat_name=mysqli_real_escape_string($this->conn,$data['cat_name']);
            $cat_des=mysqli_real_escape_string($this->conn,$data['cat_des']);
            
            if($data['approved']==1)
                $query="UPDATE category SET cat_name='$cat_name',cat_des='$cat_des' WHERE cat_id=$cat_id ";
            else
                $query="UPDATE category_req SET cat_name='$cat_name',cat_des='$cat_des' WHERE cat_id=$cat_id ";
            if(mysqli_query($this->conn,$query)){
                return "Category Updated Successfully!!";
            }
        }

        public function delete_category_byID($id,$approved){
            if($approved==1)
                $query="DELETE FROM category WHERE cat_id=$id";
            else//0
                $query="DELETE FROM category_req WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){                
                return "Category Deleted Successfully";
            }
        }
        public function approve_category($id){
            $query="SELECT* FROM category_ req WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){                
                $data=mysqli_fetch_assoc(mysqli_query($this->conn,$query));
            }
            $cat_name=$data['cat_name'];
            $cat_des=$data['cat_des'];
            $ctg_author_id=$data['ctg_author_id'];
            $query="INSERT INTO category (cat_name,cat_des,ctg_author_id) VALUE('$cat_name','$cat_des',$ctg_author_id)";
            if(mysqli_query($this->conn,$query)){ 
                //get ctg data from 'category_req' by id > insert these tuple(row) in 'category' table > delete this row from 'category_req'               
                $query="DELETE FROM category_req WHERE cat_id=$id";
                if(mysqli_query($this->conn,$query))
                    return "Category Approved Successfully!!";        
            }            
        }

        public function add_post($data){
            $post_title=mysqli_real_escape_string($this->conn,$data['post_title']);
            $post_content=mysqli_real_escape_string($this->conn,$data['post_content']);
            
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

            $query="INSERT INTO posts(post_title, post_content, post_img, post_ctg, post_author, post_date, rent_from, rent_amount, city_id, post_status) VALUES('$post_title', '$post_content', '$post_img', $post_category, '$post_author', now(), '$rent_from', $rent_amount, $city_id, $post_status)";

            if(mysqli_query($this->conn,$query)){
                // come out of folder where function.php file is included --> now in root folder-> goto upload folder & upload image as imagename: $post_img
                move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
                return "Post Added Successfully!!";
            }

        }

        // display post for admin (for manage_post_view.php page)
        public function display_post(){ 
            // for both user & admin login there is:$_SESSION['person_id']-> user_id/admin_id respectively           
            $user_id=$_SESSION['person_id']; 
            $query="SELECT * FROM post_user_view WHERE user_id=$user_id ORDER BY post_date DESC,post_id DESC";
            
            if(mysqli_query($this->conn,$query)){
                $posts=mysqli_query($this->conn,$query);
                return $posts;
            }
        }

        
        // display post for public (for blog_posts.php file)
        public function display_post_public(){
            $query="SELECT * FROM post_user_view WHERE post_status=1 ORDER BY post_date DESC,post_id DESC";
            if(mysqli_query($this->conn,$query)){
                $posts=mysqli_query($this->conn,$query);
                return $posts;
            }
        }
        // fileter blog post by category:display posts of a specifiec category only
        public function display_post_public_by_category($cat){
            $query="SELECT * FROM post_user_view WHERE post_status=1 and cat_name='$cat' ORDER BY post_date DESC,post_id DESC";
            if(mysqli_query($this->conn,$query)){
                $posts=mysqli_query($this->conn,$query);
                return $posts;
            }
        }
        public function display_post_public_by_city($city_id){
            $query="SELECT * FROM post_user_view WHERE post_status=1 and city_id='$city_id' ORDER BY post_date DESC,post_id DESC";
            if(mysqli_query($this->conn,$query)){
                $posts=mysqli_query($this->conn,$query);
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

            $query="UPDATE posts SET post_img='$imgname' WHERE post_id=$id";
            if(mysqli_query($this->conn,$query)){
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
            $query="SELECT * FROM post_user_view WHERE post_id=$id";
            if(mysqli_query($this->conn,$query)){
                // $post_info=mysqli_query($this->conn,$query);
                // $post=mysqli_fetch_assoc($post_info);
                $post=mysqli_query($this->conn,$query);
                return $post;
            }
        }

       

        public function delete_post($id,$deleteImg_data){
            // $catch_img="SELECT * FROM posts WHERE post_id=$id";
            // $delete_post_info=mysqli_query($this->conn,$catch_img);
            // $post_infoDel = mysqli_fetch_assoc($delete_post_info);
            // $deleteImg_data=$post_infoDel['post_img']; 
            
            $query="DELETE FROM posts WHERE post_id=$id";
            if(mysqli_query($this->conn,$query)){
                unlink('../upload/'.$deleteImg_data);
                // delete image
                return "Deleted Row Successfully";
            }
        }

        public function edit_post($data){
            $post_id=$data['edit_post_id'];

            $post_title=mysqli_real_escape_string($this->conn,$data['post_title']);
            $post_content=mysqli_real_escape_string($this->conn,$data['post_content']);                                            
            $post_category=$data['post_category'];
            $rent_from=$data['rent_from'];            
            $rent_amount=$data['rent_amount'];            
            $post_status=$data['post_status'];
            // it's tarint->0/1
            $city_id=$data['city'];
            $query="UPDATE posts SET post_title='$post_title', post_content='$post_content', post_ctg= $post_category, rent_from='$rent_from', rent_amount=$rent_amount, city_id= $city_id, post_status=$post_status WHERE post_id=$post_id";

            if(mysqli_query($this->conn,$query)){                
                return "Post Updated Successfully!!";
            }
            else{
                return "Failed to Update Post!!";
            }
        }

        public function add_msg($data){
            $post_id=$data['post_id'];
            $name=mysqli_real_escape_string($this->conn,$data['name']);
            $contact_info=mysqli_real_escape_string($this->conn,$data['contact_info']);
            $msg=mysqli_real_escape_string($this->conn,$data['msg']); 

            $query="INSERT INTO msg(post_id,name,contact_info,msg,msg_time) VALUES($post_id,'$name','$contact_info','$msg',now())";                       
            if(mysqli_query($this->conn,$query)){
                return "Msg added successfully!";
            }
        }
        public function get_msg($post_id){            
            $query="SELECT* FROM MSG WHERE post_id=$post_id ORDER BY msg_time DESC";
            $query_run=mysqli_query($this->conn,$query);                       
            return $query_run;
        }
        public function del_msg($msg_id){            
            $query="DELETE FROM MSG WHERE msg_id=$msg_id";
            $query_run=mysqli_query($this->conn,$query); 
            // if($query_run){
            //     return 'Message deleted successfully!!';
            // }                                 
        }

        public function reply_msg($data){
            $msg_id=$data['msg_id'];            
            $msg_reply=mysqli_real_escape_string($this->conn,$data['msg_reply']); 

            $query="UPDATE msg SET msg_reply='$msg_reply' WHERE msg_id=$msg_id";  
            $query_run=mysqli_query($this->conn,$query);                     
            if($query_run){
                return "Msg replied successfully!";
            }
        }

    }
    // end class

?>