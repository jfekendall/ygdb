<?php

namespace App\Models;

use CodeIgniter\Model;

class Game extends Model {

    protected $table = 'ygdb_games';
    
    protected $allowedFields = [
        'uuid',
        'game_1_title',
        'game_2_title',
        'game_3_title',
        'game_1_publisher',
        'game_2_publisher',
        'game_3_publisher',
        'game_developer_1',
        'game_developer_2',
        'game_developer_3',
        'game_developer_4',
        'game_1_market',
        'game_2_market',
        'game_3_market',
        'game_genre',
        'game_1_release_date',
        'game_2_release_date',
        'game_3_release_date'];

}
