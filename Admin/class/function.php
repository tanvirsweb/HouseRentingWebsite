
<?php
    class adminBlog{
        private $conn;

        public function __construct()
        {
            #database host, database user , database password , database name
            $dbhost='localhost';
            $dbuser='root';
            $dbpass='';
            $dbname='blogproject';

            // make connection with databse
            $this->conn=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

            if(!$this->conn){
                die("Database Connection Error !!");
            }
            
        }
        public function admin_login($data){
            $admin_email=$data['admin_email'];
            $admin_pass=md5($data['admin_pass']);

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
                    $_SESSION['adminID']=$admin_data['id'];
                    $_SESSION['admin_name']=$admin_data['admin_name'];
               }
               
            }
        }

        public function adminLogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['admin_name']);
            header("location:index.php");
        }

        public function add_category($data){
            $cat_name=$data['cat_name'];
            $cat_des=$data['cat_des'];

            $query="INSERT INTO category(cat_name,cat_des) VALUE('$cat_name','$cat_des')";
            if(mysqli_query($this->conn,$query)){
                return "Category Added Successfully!";
            }
            else{
                return "Failed to Add Category!";
            }
        }

        public function display_category(){
            $query="SELECT * FROM category";
            if(mysqli_query($this->conn,$query)){
                $category=mysqli_query($this->conn,$query);
                return $category;
            }
        }

        public function delete_category_byID($id){
            $query="DELETE FROM category WHERE cat_id=$id";
            if(mysqli_query($this->conn,$query)){                
                return "Category Deleted Successfully";
            }
        }

    }

?>