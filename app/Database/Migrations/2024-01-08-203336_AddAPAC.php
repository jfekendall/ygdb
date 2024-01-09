<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use App\Models\Market;

class AddAPAC extends Migration {

    public function up() {
        $market = new Market();
        $name = [
            'market_name' => 'APAC'
        ];
        $market->save($name);
    }

    public function down() {
        //
    }

}
