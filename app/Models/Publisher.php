<?php

namespace App\Models;

use CodeIgniter\Model;

class Publisher extends BaseModel {
    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_publishers';
    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = ['publisher_name'];
    
    public function getPublisher($pub = false) {
        if ($pub === false) {
            return false;
        }

        return $this->where(['id' => $pub])->first();
    }

}
