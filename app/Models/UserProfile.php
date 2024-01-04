<?php

namespace App\Models;
use CodeIgniter\Model;


class UserProfile extends Model{
    protected $table = 'ygdb_user_profile';
	

    protected $allowedFields = [
        'id',
        'ygdb_user_uuid',
        'profile_pic',
        'profile_tagline'
    ];

}
