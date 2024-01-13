<?php

namespace App\Database\Migrations;

use App\Models\Game;
use App\Models\Publisher;
use CodeIgniter\Database\Migration;

class RemovePubDupes extends Migration {

    public function up() {
        $games = new Game();
        $publisher = new Publisher();
        foreach ($publisher->findAll() AS $pub) {
            
            foreach ($games->where(['game_1_publisher' => $pub['id'], 'game_2_publisher' => $pub['id']])->findAll() AS $game) {
                $game['game_2_publisher'] = null;
                if($game['game_3_publisher'] == $pub['id']){
                    $game['game_3_publisher'] = null;
                }
                $revised = new Game();
                $revised->save($game);
            }
        }
    }

    public function down() {
        //No down necessary. Data only
    }

}
