<?php 
namespace App\Models;

use CodeIgniter\Model;

class GameSystem extends Model{

	protected $table = 'ygdb_systems';

	public function getSystem($id = false){
		if ($id === false) {
			return false;
    		}
    		return $this->where(['id' => $id])->first();
	}

}
