<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddIsAdminColumn extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE `ygdb_users` ADD `is_admin` TINYINT(1) NOT NULL DEFAULT '0' AFTER `ygdb_password`;");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE `ygdb_users` DROP COLUMN `is_admin`");
    }
}
