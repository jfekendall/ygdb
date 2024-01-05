<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed1Init extends Seeder {

    public function run() {
        $this->db->disableForeignKeyChecks();

        $this->db->query("CREATE TABLE `market` (`id` int(11) NOT NULL,`market_name` varchar(20) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        $this->db->query("INSERT INTO `market` (`id`, `market_name`) VALUES (1, 'North America'), (2, 'Japan'), (3, 'PAL'), (4, 'EU');");

        $this->db->query("CREATE TABLE `ygdb_collections` (   `id` int(11) NOT NULL,   `game_uuid` varchar(40) NOT NULL,   `user_uuid` varchar(40) NOT NULL,   `status` varchar(1) DEFAULT '0',   `with_case` tinyint(1) DEFAULT '0',   `in_wrap` tinyint(1) DEFAULT '0',   `with_manual` tinyint(1) DEFAULT '0',   `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,   `uuid` varchar(40) NOT NULL ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $this->db->query("CREATE TABLE `ygdb_developers` (
            `id` int(11) NOT NULL,
            `developer_name` varchar(150) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $this->db->query("CREATE TABLE `ygdb_games` (
            `uuid` varchar(40) NOT NULL,
            `system_id` int(11) NOT NULL,
            `game_1_title` varchar(200) NOT NULL,
            `game_2_title` varchar(200) DEFAULT NULL,
            `game_3_title` varchar(200) DEFAULT NULL,
            `game_1_publisher` int(11) NOT NULL,
            `game_2_publisher` int(11) DEFAULT NULL,
            `game_3_publisher` int(11) DEFAULT NULL,
            `game_developer_1` int(11) NOT NULL,
            `game_developer_2` int(11) DEFAULT NULL,
            `game_developer_3` int(11) DEFAULT NULL,
            `game_developer_4` int(11) DEFAULT NULL,
            `game_1_market` int(11) NOT NULL,
            `game_2_market` int(11) DEFAULT NULL,
            `game_3_market` int(11) DEFAULT NULL,
            `game_genre` varchar(50) DEFAULT NULL,
            `game_1_release_date` date NOT NULL,
            `game_2_release_date` date DEFAULT NULL,
            `game_3_release_date` date DEFAULT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

        $this->db->query("CREATE TABLE `ygdb_publishers` (
        `id` int(11) NOT NULL,
        `publisher_name` varchar(255) NOT NULL
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;");

        $this->db->query("CREATE TABLE `ygdb_systems` (
        `id` int(11) NOT NULL,
        `system_name` varchar(50) NOT NULL,
        `system_banner` varchar(40) DEFAULT NULL,
        `system_debut` varchar(30) NOT NULL,
        `system_end` varchar(30) NOT NULL
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;");

        $this->db->query("INSERT INTO `ygdb_systems` (`id`, `system_name`, `system_banner`, `system_debut`, `system_end`) VALUES
        (1, 'Virtual Boy', '/img/banners/virtual_boy.jpg', 'August 14, 1995', '1996'),
        (2, 'Super Nintendo Entertainment System', NULL, 'September 9, 1991', '1999'),
        (3, 'Nintendo 64', '/img/banners/n64.jpg', 'September 29, 1996', 'April 30, 2002'),
        (4, 'Sony Playstation', NULL, '', ''),
        (5, 'Sony Playstation 3', NULL, 'November 11, 2011', 'May 29, 2017'),
        (6, 'Sony Playstation 4', NULL, '', ''),
        (7, 'Nintendo Entertainment System', NULL, '', ''),
        (8, 'Microsoft XBox', NULL, '', ''),
        (9, 'Sega Genesis', NULL, '', ''),
        (10, 'Gameboy', NULL, '', ''),
        (11, 'GameCube', NULL, '', '');");

        $this->db->query("CREATE TABLE `ygdb_users` (
        `id` int(11) NOT NULL,
        `ygdb_username` varchar(30) NOT NULL,
        `ygdb_password` text NOT NULL,
        `ygdb_user_email` varchar(255) NOT NULL,
        `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
        `user_uuid` varchar(40) NOT NULL
        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;");

        $this->db->query("CREATE TABLE `ygdb_user_profile`(
        `id` int(11) NOT NULL,
        `ygdb_user_uuid` varchar(40) NOT NULL,
        `profile_pic` varchar(150) NOT NULL DEFAULT '/img/placeholders/photos/no-photo.png',
        `profile_tagline` varchar(40) NOT NULL
        )ENGINE = InnoDB DEFAULT CHARSET = utf8;");

        $this->db->query("ALTER TABLE `market`
        ADD PRIMARY KEY(`id`);");

        $this->db->query("ALTER TABLE `ygdb_collections`
        ADD PRIMARY KEY (`id`),
        ADD KEY `game_uuid` (`game_uuid`),
        ADD KEY `user_uuid` (`user_uuid`);");

        $this->db->query("ALTER TABLE `ygdb_developers`
        ADD PRIMARY KEY(`id`);");

        $this->db->query("ALTER TABLE `ygdb_games`
        ADD PRIMARY KEY (`uuid`),
        ADD UNIQUE KEY `system_id_2` (`system_id`, `game_1_title`),
        ADD KEY `game_1_publisher` (`game_1_publisher`),
        ADD KEY `game_2_publisher` (`game_2_publisher`),
        ADD KEY `game_3_publisher` (`game_3_publisher`),
        ADD KEY `game_developer_1` (`game_developer_1`),
        ADD KEY `game_developer_2` (`game_developer_2`),
        ADD KEY `game_developer_3` (`game_developer_3`),
        ADD KEY `game_developer_4` (`game_developer_4`),
        ADD KEY `game_1_market` (`game_1_market`),
        ADD KEY `game_2_market` (`game_2_market`),
        ADD KEY `game_3_market` (`game_3_market`),
        ADD KEY `system_id` (`system_id`);");

        $this->db->query("ALTER TABLE `ygdb_publishers`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `publisher_name` (`publisher_name`);");

        $this->db->query("ALTER TABLE `ygdb_systems`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `system_name` (`system_name`);");

        $this->db->query("ALTER TABLE `ygdb_users`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `ygdb_username` (`ygdb_username`);");

        $this->db->query("ALTER TABLE `ygdb_user_profile`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `ygdb_user_uuid` (`ygdb_user_uuid`);");

        $this->db->query("ALTER TABLE `market`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 5;");

        $this->db->query("ALTER TABLE `ygdb_collections`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `ygdb_developers`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `ygdb_publishers`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `ygdb_systems`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT = 12;");

        $this->db->query("ALTER TABLE `ygdb_users`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `ygdb_user_profile`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

        $this->db->query("ALTER TABLE `ygdb_collections`
        ADD CONSTRAINT `ygdb_collections_ibfk_1` FOREIGN KEY (`game_uuid`) REFERENCES `ygdb_games` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE;");

        $this->db->query("ALTER TABLE `ygdb_games`
        ADD CONSTRAINT `ygdb_games_ibfk_1` FOREIGN KEY (`game_developer_1`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_10` FOREIGN KEY (`game_developer_4`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_11` FOREIGN KEY (`system_id`) REFERENCES `ygdb_systems` (`id`),
        ADD CONSTRAINT `ygdb_games_ibfk_2` FOREIGN KEY(`game_developer_2`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_3` FOREIGN KEY(`game_developer_3`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_4` FOREIGN KEY(`game_1_market`) REFERENCES `market`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_5` FOREIGN KEY(`game_2_market`) REFERENCES `market`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_6` FOREIGN KEY(`game_3_market`) REFERENCES `market`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_7` FOREIGN KEY(`game_1_publisher`) REFERENCES `ygdb_publishers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_8` FOREIGN KEY(`game_2_publisher`) REFERENCES `ygdb_publishers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_9` FOREIGN KEY(`game_3_publisher`) REFERENCES `ygdb_publishers`(`id`)ON UPDATE CASCADE;");

        $this->db->enableForeignKeyChecks();
    }

}
