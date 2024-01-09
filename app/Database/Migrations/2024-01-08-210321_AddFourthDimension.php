<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFourthDimension extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE `ygdb_games` ADD `game_4_market` INT NULL AFTER `game_3_market`");
        $this->db->query("ALTER TABLE `ygdb_games` ADD `game_4_release_date` INT NULL AFTER `game_3_release_date`");
    }

    public function down()
    {
        //
    }
}
