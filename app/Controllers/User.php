<?php

namespace App\Controllers;

use App\Models\UserProfile;

/**
 * Description of Systems
 *
 * @author justin
 */
class User {

    function getUserProfile($uuid) {
        $p = new UserProfile();
        return $p->where('ygdb_user_uuid', $uuid)->first();
    }

}
