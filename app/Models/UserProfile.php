<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfile extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_user_profile';

    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = [
        'id',
        'ygdb_user_uuid',
        'profile_pic',
        'profile_tagline'
    ];

}
