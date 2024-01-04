<?php

namespace App\Models;

use CodeIgniter\Model;

class Collection extends Model {

    protected $table = 'ygdb_collections';
    protected $allowedFields = [
        'game_uuid',
        'user_uuid',
        'status',
        'with_case',
        'in_wrap',
        'with_manual',
        'uuid'
    ];

    public function getCollectionsByUser($user = false) {
        if ($user === false) {
            return false;
        }
//return $this->findAll();
        return $this->where(['user_uuid' => $user])->findAll();
    }

    public function amountOfCollections($user) {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        $builder->select('system_id');
        $builder->from('ygdb_games');
        $builder->where('game_uuid', 'uuid');
        $builder->where('user_uuid', $user);
        $builder->groupBy('system_id');
        return $builder->countAll();
    }

    public function hasGame($guuid, $user) {
        return $this->where('game_uuid', $guuid)->where('user_uuid', $user)->countAllResults();
    }

}
