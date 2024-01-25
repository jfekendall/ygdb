<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RegionText extends Migration
{
    public function up()
    {
        $this->db->query("UPDATE market SET market_name='north_america' WHERE market_name='North America'");
        $this->db->query("UPDATE market SET market_name='japan' WHERE market_name='Japan'");
        $this->db->query("UPDATE market SET market_name='pal' WHERE market_name='PAL'");
        $this->db->query("UPDATE market SET market_name='eu' WHERE market_name='EU'");
        $this->db->query("UPDATE market SET market_name='apac' WHERE market_name='APAC'");
    }

    public function down()
    {
        //
    }
}
