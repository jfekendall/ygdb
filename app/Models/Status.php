<?php

namespace App\Models;

/**
 * Status is a table of normalized data linked to collections
 *
 * @author justin
 */
class Status extends BaseModel {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_game_status';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'status_name',
        'status_desc'
    ];

}
