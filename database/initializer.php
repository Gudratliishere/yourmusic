<?php
    // Still bug exists, Code doesn't create tables
    function createTables() 
    {
        $creater = new TableCreater();
        $creater->create_user_table();
        $creater->create_music_table();
        $creater->create_rate_table();

    }

    class TableCreater 
    {
        function run_query ($query) 
        {
            include "connection.php";
            $con->query($query);
        }

        function create_user_table ()
        {
            $query = "CREATE TABLE IF NOT EXISTS`user`  (
                `id` int NOT NULL AUTO_INCREMENT,
                `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `rate` int NULL DEFAULT NULL,
                `rate_count` int NULL DEFAULT NULL,
                `shared_musics` int NULL DEFAULT NULL,
                `status` int NULL DEFAULT 0,
                PRIMARY KEY (`id`) USING BTREE
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;
              
              SET FOREIGN_KEY_CHECKS = 1;";
              $this->run_query($query);
        }

        function create_music_table()
        {
            $query = "CREATE TABLE IF NOT EXISTS `music`  (
                `id` int NOT NULL AUTO_INCREMENT,
                `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `path` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
                `rate` int NULL DEFAULT NULL,
                `rate_count` int NULL DEFAULT NULL,
                `user` int NULL DEFAULT NULL,
                `publish_date` datetime NULL DEFAULT NULL,
                PRIMARY KEY (`id`) USING BTREE,
                INDEX `user`(`user`) USING BTREE,
                CONSTRAINT `music_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;
              
              SET FOREIGN_KEY_CHECKS = 1;";
              $this->run_query($query);
        }

        function create_rate_table ()
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
              ) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;
              
              SET FOREIGN_KEY_CHECKS = 1;";
              $this->run_query($query);
        }
    }
?>