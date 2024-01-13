<?php

namespace App\Models;

use CodeIgniter\Model;

class Game extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_games';

    /**
     * @param string $primaryKey Since this table doesn't use id
     */
    protected $primaryKey = 'uuid';

    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = [
        'uuid',
        'system_id',
        'game_1_title',
        'game_2_title',
        'game_3_title',
        'game_1_publisher',
        'game_2_publisher',
        'game_3_publisher',
        'game_1_developer',
        'game_2_developer',
        'game_3_developer',
        'game_4_developer',
        'game_1_market',
        'game_2_market',
        'game_3_market',
        'game_genre',
        'game_1_release_date',
        'game_2_release_date',
        'game_3_release_date',
        'game_box_text'];

}
