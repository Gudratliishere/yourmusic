<?php


class OldPasswordDao
{
    function add($user, $password)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "insert into old_password (user, password) values (?, ?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param("is", $user, $password);
        $stmt->execute();
        $stmt->close();
    }

    function get_old_passwords ($user) {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select * from old_password where user = ?;";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $user);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $array = array();
        while ($row = $result->fetch_assoc())
        {
            array_push($array, $row['password']);
        }

        return $array;
    }
}