<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class GameSystem
 * 
 * @todo Remove references
 * @deprecated In favor of System     
 */
class GameSystem extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_systems';

    /**
     * Method getSystem
     * 
     * @param int id
     * @return array
     */
    public function getSystem(int $id = 0): array {
        if ($id === 0) {
            return [];
        }
        return $this->where(['id' => $id])->first();
    }

}
