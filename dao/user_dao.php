<?php

class UserDao
{
    public function add_user($user)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "insert into user (name, surname, email, phone, password, photo) values(?, ?, ?, ?, ?, ?);";
        $stmt = $con->prepare($query);
        $stmt->bind_param(
            "sssss",
            $user->name,
            $user->surname,
            $user->email,
            $user->phone,
            $user->password,
            $user->photo
        );
        $stmt->execute();
        $stmt->close();


        $result = $con->query("select LAST_INSERT_ID() as 'id';");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user->id = $row['id'];
        }

        return $user;
    }

    public function update_user($user)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "update user set name = ?, surname = ?, password = ?, phone = ?, photo = ? where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param(
            "sssssi",
            $user->name,
            $user->surname,
            $user->password,
            $user->phone,
            $user->photo,
            $user->id
        );
        $stmt->execute();
        var_dump($stmt);
        $stmt->close();
    }

    public function deactivate_user($id)
    {
        $this->change_status(0, $id);
    }

    public function activate_user($id)
    {
        $this->change_status(1, $id);
    }

    private function change_status($status, $id)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "update user set status = ? where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ii", $status, $id);

        $stmt->execute();
        $stmt->close();
    }

    public function find_user_by_id($id)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select * from user where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $user = new User();
        return $this->fill_user($user, $row);
    }

    public function find_user_by_email($email)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select * from user where email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $user = new User();
        return $this->fill_user($user, $row);
    }

    private function fill_user($user, $row)
    {
        $user->id = $row['id'];
        $user->name = $row['name'];
        $user->surname = $row['surname'];
        $user->email = $row['email'];
        $user->phone = $row['phone'];
        $user->password = $row['password'];
        $user->photo = $row['photo'];
        $user->rate = $row['rate'];
        $user->rate_count = $row['rate_count'];
        $user->shared_musics = $row['shared_musics'];
        $user->status = $row['status'];

        return $user;
    }

    public function find_user_login_by_email ($email)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select id, password, status from user where email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if (!$row)
            return null;

        $user = new User();
        $user->id = $row['id'];
        $user->password = $row['password'];
        $user->status = $row['status'];
        return $user;
    }

    public function email_exists($email)
    {
        $con = mysqli_connect("localhost", "root", "2002", "yourmusic");

        $query = "select count(id) from user where email = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc()['count(id)'] > 0;
    }
}
