<?php

include '../database/connection.php';

class MusicDao
{
    public function add_music($music)
    {
        $con = Connection::get_connection();

        $query = "insert into music(name, path, rate, rate_count, user) values (?, ?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssiii",
            $music->name, $music->path, $music->rate, $music->rate, $music->rate_count, $music->user);
        $stmt->execute();
        $stmt->close();

        $result = $con->query("select LAST_INSERT_ID() as 'id';");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $music->id = $row['id'];
        }

        return $music;
    }

    public function find_by_id ($id)
    {
        $con = Connection::get_connection();

        $query = "select * from music where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close;

        $row = $result->fetch_assoc();
        return fill_music($row);
    }

    public function update_music ($music)
    {
        $con = Connection::get_connection();

        $query = "update music set name = ?, path = ?, rate = ?, rate_count = ?, user = ? where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ssiiii",
            $music->name, $music->path, $music->rate, $music->rate_count, $music->user,
            $music->id);
        $stmt->execute();
        $stmt->close();
    }

    private function fill_music ($row)
    {
        $music = new Music();
        $music->id = $row['id'];
        $music->name = $row['name'];
        $music->path = $row['path'];
        $music->rate = $row['rate'];
        $music->rate_count = $row['rate_count'];
        $music->user = $row['user'];
        $music->publish_date = $row['publish_date'];

        return $music;
    }
}
