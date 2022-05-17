<?php
function init_database ()
{
    $con = Connection::get_connection_without_database();
    $query = "create database if not exists yourmusic";
    $con->query($query);

    create_tables();
}

function create_tables()
{
    $creater = new TableCreater();
    $creater->create_user_table();
    $creater->create_music_table();
    $creater->create_rate_table();
    $creater->create_old_passwords_table();

}

include "connection.php";

class TableCreater
{
    function run_query($query)
    {
        $con = Connection::get_connection();
        $con->query($query);
    }

    function create_user_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS`user`  (
                  `id` int NOT NULL AUTO_INCREMENT,
                  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                  `rate` int NULL DEFAULT 0,
                  `rate_count` int NULL DEFAULT 0,
                  `shared_musics` int NULL DEFAULT 0,
                  `status` int NULL DEFAULT 1,
                  `photo` mediumblob NULL,
                  `banned` int NULL DEFAULT 0,
                  PRIMARY KEY (`id`) USING BTREE
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";
        $this->run_query($query);
    }

    function create_music_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS `music`  (
                `id` int NOT NULL AUTO_INCREMENT,
                `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `path` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `rate` int NULL DEFAULT 0,
                `rate_count` int NULL DEFAULT 0,
                `user` int NULL DEFAULT NULL,
                `publish_date` datetime NULL DEFAULT CURRENT_TIMESTAMP,
                PRIMARY KEY (`id`) USING BTREE,
                INDEX `user`(`user`) USING BTREE,
                CONSTRAINT `music_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";
        $this->run_query($query);
    }

    function create_rate_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS `rate`  (
                `id` int NOT NULL AUTO_INCREMENT,
                `user` int NULL DEFAULT NULL,
                `music` int NULL DEFAULT NULL,
                `rate` int NULL DEFAULT NULL,
                PRIMARY KEY (`id`) USING BTREE,
                INDEX `user`(`user`) USING BTREE,
                INDEX `music`(`music`) USING BTREE,
                CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
                CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`music`) REFERENCES `music` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";
        $this->run_query($query);
    }

    function create_old_passwords_table()
    {
        $query = "CREATE TABLE IF NOT EXISTS `old_password`  (
                  `id` int NOT NULL AUTO_INCREMENT,
                  `user` int NULL DEFAULT NULL,
                  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                  PRIMARY KEY (`id`) USING BTREE,
                  INDEX `user`(`user`) USING BTREE,
                  CONSTRAINT `old_password_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
                ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;";
        $this->run_query($query);
    }
}
