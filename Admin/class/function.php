
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

                    // before keeping any Information is $_SESSION we need to start session.Otherwise there will be no data in session.
                    session_start();
                    $_SESSION['adminID']=$admin_data['id'];
                    $_SESSION['admin_name']=$admin_data['admin_name'];

               }
               
            }
        }

    }

?>