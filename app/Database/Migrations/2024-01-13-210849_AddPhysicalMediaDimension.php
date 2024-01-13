<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhysicalMediaDimension extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE `ygdb_collections` ADD `physical_media` TINYINT(1) NOT NULL DEFAULT '0' AFTER `status`;");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE `ygdb_collections` DROP COLUMN `physical_media`");
    }
}
