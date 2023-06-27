
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
                    header('Location:dashboard.php');  

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
                    header('Location:dashboard.php');  

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

        public function user_signup($data){
            $user_name=$data['user_name'];
            $user_email=$data['user_email'];
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

        public function add_category($data){
            $person_id=$data['person_id'];
            $cat_name=$data['cat_name'];
            $cat_des=$data['cat_des'];

            $query="INSERT INTO category(cat_name,cat_des,ctg_author_id) VALUE('$cat_name','$cat_des',$person_id)";
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
        
        public function display_category_byID($id){
            $query="SELECT * FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){
                $category=mysqli_query($this->conn,$query);
                return $category;
            }
        }
        public function update_category($data){
            $cat_id=$data['cat_id'];
            $cat_name=$data['cat_name'];
            $cat_des=$data['cat_des'];

            $query="UPDATE category SET cat_name='$cat_name',cat_des='$cat_des' WHERE cat_id=$cat_id ";
            if(mysqli_query($this->conn,$query)){
                return "Category Updated Successfully!!";
            }
        }

        public function delete_category_byID($id){
            $query="DELETE FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){                
                return "Category Deleted Successfully";
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
            $post_author=$_SESSION['admin_id'];//"Tanvir Anjom Siddique";
            $post_summery=$data['post_summery'];
            $post_tag=$data['post_tag'];
            $post_status=$data['post_status'];
            // it's tarint->0/1

            $query="INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summery,post_tag,post_status) VALUES('$post_title','$post_content','$post_img',$post_category,'$post_author',now(),3,'$post_summery','$post_tag',$post_status)";

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

        public function update_post($data){
            $post_title=$data['change_title'];
            $post_content=$data['change_content'];
            $post_id=$data['edit_post_id'];
            $post_status=$data['change_post_status'];

            $query="UPDATE posts SET post_title='$post_title',post_content='$post_content',post_status=$post_status WHERE post_id=$post_id ";
            if(mysqli_query($this->conn,$query)){
                return "Post Updated Successfully!!";
            }
        }

    }

?>