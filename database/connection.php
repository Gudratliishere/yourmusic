<?php 

    class Connection 
    {
        private $dbhost = "localhost";
        private $dbuser = "root";
        private $dbpassword = "2002";
        private $dbname = "yourmusic";
        private $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);  

        public function get_connection ()
        {
            return $this->$con;
        }
    }
?>