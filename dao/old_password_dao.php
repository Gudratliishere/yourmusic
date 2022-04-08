<?php


class OldPasswordDao
{
    function add($old_password)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "insert into old_password (user, password) values (?, ?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param("is", $old_password->user, $old_password->password);
        $stmt->execute();
        $stmt->close();

        $result = $con->query("select LAST_INSERT_ID() as 'id';");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $old_password->id = $row['id'];
        }

        return $old_password;
    }

    function password_exists ($user, $password) {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select count(id) as count from old_password where user = ? and password = ?;";
        $stmt = $con->prepare($query);
        $stmt->bind_param("is", $user, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return $row['count'] > 0;
    }
}