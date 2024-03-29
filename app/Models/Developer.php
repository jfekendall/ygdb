<?php

namespace App\Models;

use CodeIgniter\Model;

class Developer extends BaseModel {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_developers';

    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = ['developer_name'];

}
