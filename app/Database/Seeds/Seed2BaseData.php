<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Seed2BaseData extends Seeder {

    public function run() {
        $thedata = [
            'devs' => 'ygdb_developers',
            'publishers' => 'ygdb_publishers',
            'games' => 'ygdb_games'
        ];
        foreach ($thedata AS $k => $v) {
            foreach (require_once "$k.php"  AS $data) {
                $this->db->table($v)->insert($data);
            }
        }
    }

}
