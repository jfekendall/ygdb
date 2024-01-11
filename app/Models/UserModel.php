<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_users';

    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = [
        'id',
        'ygdb_username',
        'ygdb_password',
        'ygdb_user_email',
        'last_modified',
        'date_created',
        'user_uuid'
    ];

}
