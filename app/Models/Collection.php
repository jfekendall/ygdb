<?php

namespace App\Models;

use CodeIgniter\Model;

class Collection extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_collections';
    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = [
        'game_uuid',
        'user_uuid',
        'status',
        'physical_media',
        'with_case',
        'in_wrap',
        'with_manual',
        'uuid'
    ];

    /**
     * Method getCollectionsByUser
     * 
     * Collection getter based on user uuid
     * 
     * @author Justin Kendall
     * @param string user
     * @return array
     */
    public function getCollectionsByUser(string $user): array {
        return $this->where(['user_uuid' => $user])->findAll();
    }

    /**
     * Method amountOfCollections
     * 
     * Gets the number of collections per user for the dashboard
     * 
     * @author Justin Kendall
     * @param string user
     * @return int
     */
    public function amountOfCollections(string $user): int {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('system_id');
        $builder->from('ygdb_games');
        $builder->where('game_uuid', 'uuid');
        $builder->where('user_uuid', $user);
        $builder->groupBy('system_id');
        return $builder->countAll();
    }

    /**
     * Method hasGame
     * 
     * Gets whether or not the user has the game
     * 
     * @author Justin Kendall
     * @param string guuid
     * @param string user
     * @return int
     */
    public function hasGame($guuid, $user): int {
        return $this->where('game_uuid', $guuid)->where('user_uuid', $user)->countAllResults();
    }

}
