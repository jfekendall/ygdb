<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangeGameDevColumns extends Migration
{
    public function up()
    {
        
        
        
        
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_1`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_2`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_3`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_10`");
        
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_developer_1` `game_1_developer` INT(11) NOT NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_developer_2` `game_2_developer` INT(11) NOT NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_developer_3` `game_3_developer` INT(11) NOT NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_developer_4` `game_4_developer` INT(11) NOT NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_1_developer` `game_1_developer` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_2_developer` `game_2_developer` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_3_developer` `game_3_developer` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_4_developer` `game_4_developer` INT(11) NULL");
        
        $this->db->query("UPDATE ygdb_games SET game_1_developer = null WHERE game_1_developer = 0");
        $this->db->query("UPDATE ygdb_games SET game_2_developer = null WHERE game_2_developer = 0");
        $this->db->query("UPDATE ygdb_games SET game_3_developer = null WHERE game_3_developer = 0");
        $this->db->query("UPDATE ygdb_games SET game_4_developer = null WHERE game_4_developer = 0");
        
        
        $this->db->query("ALTER TABLE `ygdb_games`
        ADD CONSTRAINT `ygdb_games_ibfk_1` FOREIGN KEY (`game_1_developer`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_2` FOREIGN KEY(`game_2_developer`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_3` FOREIGN KEY(`game_3_developer`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_10` FOREIGN KEY (`game_4_developer`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE");
    }

    public function down()
    {
        echo "Started down of ChangeGameDevColumns";
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_1`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_2`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_3`");
        $this->db->query("ALTER TABLE ygdb_games DROP FOREIGN KEY IF EXISTS `ygdb_games_ibfk_10`");
        echo "Dropped FKs";
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_1_developer` `game_developer_1` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_2_developer` `game_developer_2` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_3_developer` `game_developer_3` INT(11) NULL");
        $this->db->query("ALTER TABLE `ygdb_games` CHANGE `game_4_developer` `game_developer_4` INT(11) NULL");
                      
        $this->db->query("ALTER TABLE `ygdb_games`
        ADD CONSTRAINT `ygdb_games_ibfk_1` FOREIGN KEY (`game_developer_1`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_2` FOREIGN KEY(`game_developer_2`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_3` FOREIGN KEY(`game_developer_3`) REFERENCES `ygdb_developers`(`id`) ON UPDATE CASCADE,
        ADD CONSTRAINT `ygdb_games_ibfk_10` FOREIGN KEY (`game_developer_4`) REFERENCES `ygdb_developers` (`id`) ON UPDATE CASCADE");
    }
}
