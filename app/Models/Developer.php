<?php

namespace App\Models;

use CodeIgniter\Model;

class Developer extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_developers';

    /**
     * @param array $nameColumn Which field has the value
     */
    protected $nameColumn = 'developer_name';

    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = ['developer_name'];

}
