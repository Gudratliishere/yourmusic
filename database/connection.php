<?php

class Connection
{
    public static function get_connection()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpassword = "2002";
        $dbname = "yourmusic";
        $con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);
        return $con;
    }
}

?>