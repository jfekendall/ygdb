<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddGameDimensions extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE `ygdb_games` ADD `game_box_art` TEXT NULL AFTER `game_4_release_date`, ADD `game_box_text` TEXT NULL AFTER `game_box_art`;");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE `ygdb_games` DROP COLUMN `game_box_art`");
        $this->db->query("ALTER TABLE `ygdb_games` DROP COLUMN `game_box_text`");
    }
}
