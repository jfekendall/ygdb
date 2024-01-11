<?php 
namespace App\Models;

use CodeIgniter\Model;

class Developer extends Model{
	protected $table = 'ygdb_developers';
        protected $nameColumn = 'developer_name';
        protected $allowedFields = ['developer_name'];
        
        //TODO: figure out what the hell this is
	public function getDevelopers($dev1 = false, $dev2 = false, $dev3 = false, $dev4 = false){

		if (!$dev1 && !$dev2 && !$dev3 && !$dev4) {
			return false;
    		}

//    		return $this->where_in('id',[$dev1, $dev2, $dev3, $dev4])->findAll();
	}

}
