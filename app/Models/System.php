<?php
namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of System
 *
 * @author justin
 */
class System extends Model{

    protected $table = 'ygdb_systems';
    protected $allowedFields = [
        'system_name',
        'system_banner',
        'system_debut',
        'system_end'
    ];

    public function getSystem($sys = false) {
        if ($sys === false) {
            return false;
        }

        return $this->where(['id' => $sys])->first();
    }

    public function getSystemByName($sys = false) {
        if ($sys === false) {
            return false;
        }

        return $this->where(['system_name' => $sys])->first();
    }

}
