<?php

namespace App\Models;

use CodeIgniter\Model;

class Publisher extends Model {

    protected $table = 'ygdb_publishers';
    protected $allowedFields = ['publisher_name'];
    protected $nameColumn = 'publisher_name';
    
    public function getPublisher($pub = false) {
        if ($pub === false) {
            return false;
        }

        return $this->where(['id' => $pub])->first();
    }

}
