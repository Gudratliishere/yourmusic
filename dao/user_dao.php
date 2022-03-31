<?php
class UserDao
{
    public function add_user($user)
    {
        include '../database/connection.php';
        include '../entity/user.php';
        $query = "insert into user (name, surname, email, phone, password) values(?, ?, ?, ?, ?)";
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");
var_dump($con);
        $stmt = $con->prepare($query);

        $stmt->bind_param("sssss", $user->name, $user->surname, $user->email, $user->phone, $user->password);
        $stmt->execute();
        $stmt->close();
    }

    public function update_user ($user) 
    {

    }

    public function deactivate_user ($user)
    {

    }

    public function activate_user ($user)
    {
        
    }

    public function find_user_by_id ($id)
    {

    }

    public function find_user_by_email ($email)
    {

    }
}
