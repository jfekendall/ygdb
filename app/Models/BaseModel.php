<?php

namespace App\Models;

use CodeIgniter\Model;

abstract class BaseModel extends Model {
    
    public function getNameColumn(){
        foreach($this->allowedFields AS $field){
            if(strstr($field, '_name')){
                return $field;
            }
        }
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
        return $system[$this->getNameColumn()];
    }

}
