<?php 
namespace App\Models;

use CodeIgniter\Model;

class Publisher extends Model{
	protected $table = 'ygdb_publishers';

	public function getPublisher($pub = false){
		if ($pub === false) {
			return false;
    		}

    		return $this->where(['id' => $pub])->first();
	}

}
