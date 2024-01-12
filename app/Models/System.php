<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Description of System
 *
 * @author justin
 */
class System extends Model {

    /**
     * @param string $table Base table for this Model
     */
    protected $table = 'ygdb_systems';
    protected $nameColumn = 'system_name';
    /**
     * @param array $allowedFields Dictates what fields can be modified
     */
    protected $allowedFields = [
        'system_name',
        'system_banner',
        'system_debut',
        'system_end'
    ];

    /**
     * Method getSystemByName
     *
     * Gets system based on name
     * 
     * @author Justin Kendall
     * @param string sys
     * @return array
     */
    public function getSystemByName(string $sys): array {
        return $this->where(['system_name' => $sys])->first();
    }

    /**
     * Method translateToEnglish
     *
     * Gets a human readable name from the normalized id
     * 
     * @author Justin Kendall
     * @param int id
     * @return string
     * @todo refactor this into a BaseModel
     */
    public function translateToEnglish(int $id): string {
        $system =  $this->find($id);
        return $system[$this->nameColumn];
    }

}
