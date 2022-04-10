<?php


class OldPasswordDao
{
    public function add($user, $password)
    {
        $con = Connection::get_connection();

        $query = "insert into old_password (user, password) values (?, ?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param("is", $user, $password);
        $stmt->execute();
        $stmt->close();
    }

    public function get_old_passwords ($user) {
        $con = Connection::get_connection();

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