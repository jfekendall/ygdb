<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCustomGameNameField extends Migration
{
    public function up()
    {
        $this->db->query("ALTER TABLE `ygdb_collections` ADD `custom_name` VARCHAR(150) NULL DEFAULT NULL AFTER `user_uuid`");
    }

    public function down()
    {
        //
    }
}
