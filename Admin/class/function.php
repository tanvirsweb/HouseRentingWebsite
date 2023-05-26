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
    }
?>