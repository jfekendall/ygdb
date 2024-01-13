<?php

namespace App\Database\Migrations;

use App\Models\Status;
use CodeIgniter\Database\Migration;

class AddGameStatus extends Migration {

    public function up() {
        $this->db->query("CREATE TABLE `ygdb_game_status` (
            `id` int(11) NOT NULL,
            `status_name` varchar(20) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci");

        $this->db->query("ALTER TABLE `ygdb_game_status`
        ADD PRIMARY KEY (`id`),
        ADD UNIQUE KEY `status_name` (`status_name`)");

        $this->db->query("ALTER TABLE `ygdb_game_status`
        MODIFY `id` int(11) NOT NULL AUTO_INCREMENT");

        foreach (['new', 'beaten', 'completed', 'mastered', 'na'] AS $stat) {
            $status = new Status();
            $s = [
                'status_name' => $stat
            ];
            $status->save($s);
        }
        
        $this->db->query("UPDATE ygdb_collections SET status=null WHERE status='0'");
        $this->db->query("UPDATE ygdb_collections SET status=1 WHERE status='N'");
        $this->db->query("UPDATE ygdb_collections SET status=2 WHERE status='B'");
        $this->db->query("UPDATE ygdb_collections SET status=4 WHERE status='M'");
        $this->db->query("ALTER TABLE `ygdb_collections` CHANGE `status` `status` TINYINT(1) NULL DEFAULT NULL");
    }

    public function down() {
        $this->db->query("DROP TABLE ygdb_game_status");
    }

}
