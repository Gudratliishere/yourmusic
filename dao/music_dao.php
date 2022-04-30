<?php

include '../database/connection.php';

class MusicDao
{
    public function add_music($music)
    {
        $con = Connection::get_connection();

        $query = "insert into music(name, path, lyrics, user) values (?, ?, ?, ?)";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssi",
            $music->name, $music->path, $music->lyrics, $music->user);
        $stmt->execute();
        $stmt->close();

        $result = $con->query("select LAST_INSERT_ID() as 'id';");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $music->id = $row['id'];
        }

        return $music;
    }

    public function find_all()
    {
        $con = Connection::get_connection();

        $query = "select * from music order by publish_date desc";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $musics = array();
        while ($row = $result->fetch_assoc())
            array_push($musics, $this->fill_music($row));

        return $musics;
    }

    public function find_all_by_user($id)
    {
        $con = Connection::get_connection();

        $query = "select * from music where user = ? order by publish_date desc";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $musics = array();
        while ($row = $result->fetch_assoc())
            array_push($musics, $this->fill_music($row));

        return $musics;
    }

    public function find_random_music()
    {
        $con = Connection::get_connection();

        $query = "SELECT * FROM music ORDER BY RAND() LIMIT 1;";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = $result->fetch_assoc();

        return $this->fill_music($row);
    }

    public function find_by_id($id)
    {
        $con = Connection::get_connection();

        $query = "select * from music where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        $row = $result->fetch_assoc();

        if (!$row)
            return null;

        return $this->fill_music($row);
    }

    public function update_music($music)
    {
        $con = Connection::get_connection();

        $query = "update music set name = ?, path = ?, lyrics = ? where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("sssi",
            $music->name, $music->path, $music->lyrics, $music->id);
        $stmt->execute();
        $stmt->close();
    }

    private function fill_music($row)
    {
        $music = new Music();
        $music->id = $row['id'];
        $music->name = $row['name'];
        $music->path = $row['path'];
        $music->lyrics = $row['lyrics'];
        $music->rate = $row['rate'];
        $music->rate_count = $row['rate_count'];
        $music->user = $row['user'];
        $music->publish_date = $row['publish_date'];

        return $music;
    }

    public function delete_music ($id)
    {
        $con = Connection::get_connection();

        $query = "delete from music where id = ?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
