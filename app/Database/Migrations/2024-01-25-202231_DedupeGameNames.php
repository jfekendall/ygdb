<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DedupeGameNames extends Migration
{
    public function up()
    {
        $this->db->query("UPDATE ygdb_games SET game_2_title = null WHERE game_2_title = game_1_title");
        $this->db->query("UPDATE ygdb_games SET game_3_title = null WHERE game_3_title = game_1_title");
    }

    public function down()
    {
        //
    }
}
