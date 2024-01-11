<?php

namespace App\Controllers;

use App\Models\UserProfile;

/**
 * Class User
 * 
 * Controller for User Profile functionality
 * 
 * @author Justin Kendall
 * @todo build this out
 */
class User extends BaseController {

    function getUserProfile($uuid): array {
        $p = new UserProfile();
        return $p->where('ygdb_user_uuid', $uuid)->first();
    }

}
