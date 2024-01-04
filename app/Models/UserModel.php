<?php 

namespace App\Models;  
use CodeIgniter\Model;

  
class UserModel extends Model{
    protected $table = 'ygdb_users';
    
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
